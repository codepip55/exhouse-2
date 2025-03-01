<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReserveringRequest;
use App\Http\Requests\UpdateReserveringRequest;
use App\Models\Huizen;
use App\Models\Reservering;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invoice;

class ReserveringController extends Controller
{
    public function postReservering(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'huis_id' => ['required', 'integer'],
            'start_datum' => ['required', 'date'],
            'eind_datum' => ['required', 'date'],
            'aantal_personen' => ['required', 'integer'],
            'opmerkingen' => ['nullable', 'string'],
            'totaal_prijs' => ['required', 'numeric'],
        ]);

        $reservering = new Reservering();
        $reservering->user = $request->user_id;
        $reservering->huis = $request->huis_id;
        $reservering->start_datum = $request->start_datum;
        $reservering->eind_datum = $request->eind_datum;
        $reservering->aantal_personen = $request->aantal_personen;
        $reservering->totaal_prijs = $request->totaal_prijs;
        $reservering->opmerkingen = $request->opmerkingen;
        $reservering->betaald = false;
        $reservering->betaal_datum = null;
        $reservering->save();

        $huis = Huizen::find($request->huis_id);
        $days = (strtotime($request->eind_datum) - strtotime($request->start_datum)) / 86400;

        try {
            Mail::to(auth()->user()->email)->send(new Invoice(
                $reservering->reservering_id,
                date('d-m-Y'),
                date('d-m-Y', strtotime('+14 days')),
                $huis->naam,
                $days,
                $huis->prijs_per_week,
                $reservering->totaal_prijs
            ));
        } catch (\Exception $e) { }

        return redirect()->route('dashboard.home');
    }

    public function getReserveren(Request $request)
    {
        $request->validate([
            'huis_id' => ['required', 'integer'],
            'start_datum' => ['required', 'date'],
            'eind_datum' => ['required', 'date'],
            'aantal_personen' => ['required', 'integer'],
            'naam' => ['required', 'string'],
            'email' => ['required', 'email'],
            'opmerkingen' => ['nullable', 'string']
        ]);

        $user = User::where('email', $request->email)->where('name', $request->naam)->first();
        if (!$user) {
            return redirect()->route('register');
        }
        if (Auth::user()) {
            $user = Auth::user();
        } else {
            return redirect()->route('login');
        }

        // Check if start date is in future and end date is after start date
        $start = strtotime($request->start_datum);
        $end = strtotime($request->eind_datum);
        if ($start < time() || $end < $start) {
            return redirect()->back()->with('error', 'Ongeldige data');
        }

        // Calculate total price based on house price per week, rounded 2 decimals
        $huis = Huizen::find($request->huis_id);
        $ppw = $huis->prijs_per_week;
        $ppd = $ppw / 7;
        $days = ($end - $start) / 86400;
        $total =  $days * $ppd * $request->aantal_personen;
        $total = round($total, 2);

        $reservering = new Reservering();
        $reservering->user = $user->id;
        $reservering->huis = $request->huis_id;
        $reservering->start_datum = $request->start_datum;
        $reservering->eind_datum = $request->eind_datum;
        $reservering->aantal_personen = $request->aantal_personen;
        $reservering->totaal_prijs = $total;
        $reservering->opmerkingen = $request->opmerkingen;
        $reservering->betaald = false;
        $reservering->betaald_datum = null;

        return view('pages/huizen/reserveren', ['reservering' => $reservering, 'huis' => $huis, 'user' => $user]);
    }
    public function cancelReservering(Request $request)
    {
        $reservering = Reservering::find($request->res_id);
        $reservering->delete();

        return redirect()->route('dashboard.home');
    }
}
