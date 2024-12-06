<?php

namespace App\Http\Controllers;

use App\Models\Huizen;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password' => ['required'],
        ]);

//        if ($credentials['email'] === 'janvansteen@pepijncolenbrander.com' && Auth::attempt($credentials)) {
//            $house1 = new Huizen();
//            $house1->naam = 'Ericaweg';
//            $house1->plaats = 'Holten';
//            $house1->straatnaam = 'Ericaweg';
//            $house1->huisnummer = '6';
//            $house1->toevoeging = '';
//            $house1->postcode = '7451JJ';
//            $house1->omschrijving = 'Dit charmante vakantiehuis aan de Ericaweg in Holten biedt ruimte voor maximaal 8 personen. Het huis heeft 2 verdiepingen en een eigen tuin waar je heerlijk kunt ontspannen. Geniet van de rust in een natuurlijke omgeving, terwijl je toch dicht bij alle voorzieningen bent. Dit huis is perfect voor gezinnen en vriendengroepen die samen quality time willen doorbrengen.';
//            $house1->prijs_per_week = '600';
//            $house1->aantal_personen = '8';
//            $house1->totaal_aantal_kamers = '8';
//            $house1->aantal_slaapkamers = '4';
//            $house1->aantal_badkamers = '2';
//            $house1->aantal_toiletten = '2';
//            $house1->aantal_verdiepingen = '2';
//            $house1->voorzieningen = '';
//            $house1->beschikbaar = '1';
//            $house1->heeft_tuin = '1';
//            $house1->heeft_balkon = '1';
//            $house1->heeft_garage = '1';
//            $house1->garage_capaciteit = '1';
//            // Loop over all .jpg files in the public/assets/img/ericaweg folder and add base64 encoded images to the database
//            $files = glob(public_path('assets/img/ericaweg/*.jpg'));
//            $images = [];
//            foreach ($files as $file) {
//                $images[] = base64_encode(file_get_contents($file));
//            }
//            $house1->fotos = json_encode($images);
//            $house1->save();
//
//            $house2 = new Huizen();
//            $house2->naam = 'Korhoenderweg';
//            $house2->plaats = 'Holten';
//            $house2->straatnaam = 'Korhoenderweg';
//            $house2->huisnummer = '2';
//            $house2->toevoeging = '';
//            $house2->postcode = '7451HB';
//            $house2->omschrijving = 'Beleef luxe aan de Korhoenderweg! Dit ruime huis voor 9 personen heeft maar liefst 4 verdiepingen en is voorzien van een sauna en een zwembad. Het biedt een perfect verblijf voor grote groepen die op zoek zijn naar ontspanning én vermaak. De groene tuin biedt extra mogelijkheden om samen van de zon te genieten. De privégarage met ruimte voor twee auto’s maakt het geheel compleet.';
//            $house2->prijs_per_week = '700';
//            $house2->aantal_personen = '9';
//            $house2->totaal_aantal_kamers = '9';
//            $house2->aantal_slaapkamers = '5';
//            $house2->aantal_badkamers = '3';
//            $house2->aantal_toiletten = '4';
//            $house2->aantal_verdiepingen = '4';
//            $house2->voorzieningen = 'sauna, zwembad';
//            $house2->beschikbaar = '1';
//            $house2->heeft_tuin = '1';
//            $house2->heeft_balkon = '0';
//            $house2->heeft_garage = '1';
//            $house2->garage_capaciteit = '2';
//            // Loop over all .jpg files in the public/assets/img/korhoenderweg folder and add base64 encoded images to the database
//            $files = glob(public_path('assets/img/korhoenderweg/*.jpg'));
//            $images = [];
//            foreach ($files as $file) {
//                $images[] = base64_encode(file_get_contents($file));
//            }
//            $house2->fotos = json_encode($images);
//            $house2->save();
//
//            $house3 = new Huizen();
//            $house3->naam = 'Buizerdweg';
//            $house3->plaats = 'Holten';
//            $house3->straatnaam = 'Buizerdweg';
//            $house3->huisnummer = '12';
//            $house3->toevoeging = '';
//            $house3->postcode = '7451HP';
//            $house3->omschrijving = 'Kom volledig tot rust in dit luxe huis aan de Buizerdweg. Geniet van de sauna, stoomcabine en whirlpool, en blijf koel op warme dagen dankzij de airconditioning. Met ruimte voor 7 personen en een moderne indeling is dit vakantiehuis ideaal voor families of kleine groepen. De tuin biedt privacy en comfort voor lange zomeravonden. Een toplocatie voor wie van luxe houdt!';
//            $house3->prijs_per_week = '800';
//            $house3->aantal_personen = '7';
//            $house3->totaal_aantal_kamers = '7';
//            $house3->aantal_slaapkamers = '4';
//            $house3->aantal_badkamers = '2';
//            $house3->aantal_toiletten = '3';
//            $house3->aantal_verdiepingen = '2';
//            $house3->voorzieningen = 'sauna, stoomcabine, whirlpool, airconditioning';
//            $house3->beschikbaar = '1';
//            $house3->heeft_tuin = '1';
//            $house3->heeft_balkon = '0';
//            $house3->heeft_garage = '1';
//            $house3->garage_capaciteit = '1';
//            // Loop over all .jpg files in the public/assets/img/buizerdweg folder and add base64 encoded images to the database
//            $files = glob(public_path('assets/img/buizerdweg/*.jpg'));
//            $images = [];
//            foreach ($files as $file) {
//                $images[] = base64_encode(file_get_contents($file));
//            }
//            $house3->fotos = json_encode($images);
//            $house3->save();
//
//            $house4 = new Huizen();
//            $house4->naam = 'Drostenstraat';
//            $house4->plaats = 'Holten';
//            $house4->straatnaam = 'Drostenstraat';
//            $house4->huisnummer = '15';
//            $house4->toevoeging = '';
//            $house4->postcode = '7451AJ';
//            $house4->omschrijving = 'Dit knusse huisje aan de Drostenstraat is ideaal voor kleinere gezelschappen van 4 personen. Het huis heeft een mooie tuin waar je kunt relaxen, en met 3 verdiepingen is er genoeg ruimte voor iedereen. Een budgetvriendelijke keuze voor wie een gezellig, eenvoudig verblijf zoekt in het hart van Holten.';
//            $house4->prijs_per_week = '500';
//            $house4->aantal_personen = '4';
//            $house4->totaal_aantal_kamers = '4';
//            $house4->aantal_slaapkamers = '3';
//            $house4->aantal_badkamers = '1';
//            $house4->aantal_toiletten = '2';
//            $house4->aantal_verdiepingen = '3';
//            $house4->voorzieningen = '';
//            $house4->beschikbaar = '1';
//            $house4->heeft_tuin = '1';
//            $house4->heeft_balkon = '0';
//            $house4->heeft_garage = '0';
//            $house4->garage_capaciteit = '0';
//            // Loop over all .jpg files in the public/assets/img/drostenstraat folder and add base64 encoded images to the database
//            $files = glob(public_path('assets/img/drostenstraat/*.jpg'));
//            $images = [];
//            foreach ($files as $file) {
//                $images[] = base64_encode(file_get_contents($file));
//            }
//            $house4->fotos = json_encode($images);
//            $house4->save();
//
//            flash()->success('successful!');
//        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        flash()->success('Logout successful!');
        return redirect('/');
    }
    /**
     * Register a new user.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);
        flash()->success('Registration successful!');
        return redirect('/');
    }
    /**
     * Reset the user's password.
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $status === Password::RESET_LINK_SENT
            ? flash()->success(__($status))
            : flash()->error(__($status));
        return redirect('/login');
    }
    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        $status === Password::PASSWORD_RESET
            ? flash()->success(__($status))
            : flash()->error(__($status));
        return redirect('/login');
    }
}
