@extends('main')

@section('content')
    <div class="container">
        <div class="mt-5">
            <h1 class="text-3xl font-thin mb-1">Uw Reservering</h1>
            <div class="h-px w-full bg-slate-600 mx-auto"></div>
            <div class="mt-5 bg-white p-5">
                <div>
                    <h3 class="text-lg">Huis:</h3>
                    <p class="text-sm">{{ $huis->naam }}</p>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg">Boeking Gegevens:</h3>
                    <p class="text-sm">{{ date('D d M Y', strtotime($reservering->start_datum)) }} - {{ date('D d M Y', strtotime($reservering->eind_datum)) }}</p>
                    <p class="text-sm">Aantal personen: {{ $reservering->aantal_personen }}</p>
                    <p class="text-sm">Opmerkingen:<br> {{ $reservering->opmerkingen }}</p>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg">Persoonlijke Gegevens:</h3>
                    <p class="text-sm">Naam: {{ $user->name }}</p>
                    <p class="text-sm">Email: {{ $user->email }}</p>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg">Prijs:</h3>
                    <p class="text-sm">€{{ $huis->prijs_per_week }} per persoon per week</p>
                    <p class="text-sm">Totaal: €{{ $reservering->totaal_prijs }}</p>
                </div>
                <form action="{{ route('huizen.reserveren') }}" method="POST" class="mt-5">
                    @csrf
                    <input type="hidden" name="huis_id" value="{{ $huis->huis_id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="start_datum" value="{{ $reservering->start_datum }}">
                    <input type="hidden" name="eind_datum" value="{{ $reservering->eind_datum }}">
                    <input type="hidden" name="aantal_personen" value="{{ $reservering->aantal_personen }}">
                    <input type="hidden" name="totaal_prijs" value="{{ $reservering->totaal_prijs }}">
                    <input type="hidden" name="opmerkingen" value="{{ $reservering->opmerkingen }}">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Er is iets misgegaan!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><span class="block sm:inline">{{ $error }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <x-button.secondary class="mt-5 w-full">
                        Reservering Bevestigen
                    </x-button.secondary>
                </form>
            </div>
        </div>
    </div>
@endsection
