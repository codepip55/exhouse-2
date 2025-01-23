@extends('main')

@section('content')
<div class="container mt-5">
    <div class="">
        <div class="flex flex-row justify-between">
            <div>
                <h1 class="text-5xl">Dashboard</h1>
            </div>
            <div>
                <x-button.secondary href="/logout">
                    Logout
                </x-button.secondary>
            </div>
        </div>
        <div class="h-px w-full bg-slate-600 mx-auto"></div>
        <p class="mt-5">Welkom, {{ auth()->user()->name }}!</p>
    </div>
    <div class="mt-5">
        <h1 class="text-3xl">Mijn Reserveringen</h1>
        <div class="h-px w-full bg-slate-600 mx-auto"></div>
        @foreach($reserveringen as $reservering)
            <div class="mt-5 bg-white p-5">
                <div>
                    <h3 class="text-lg">Huis:</h3>
                    <p class="text-sm">{{ $reservering->huis_populated->naam }}</p>
                    <span class="text-sm text-gray-500">{{ $reservering->huis_populated->straatnaam }} {{ $reservering->huis_populated->huisnummer . $reservering->huis_populated->toevoeging }}, {{ $reservering->huis_populated->postcode }} {{ $reservering->huis_populated->plaats }}</span>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg">Boeking Gegevens:</h3>
                    <p class="text-sm"><strong>Van:</strong> {{ date('D d M Y', strtotime($reservering->start_datum)) }}</p>
                    <p class="text-sm"><strong>Tot:</strong> {{ date('D d M Y', strtotime($reservering->eind_datum)) }}</p>
                    <p class="text-sm"><strong>Aantal personen:</strong> {{ $reservering->aantal_personen }}</p>
                    <p class="text-sm"><strong>Opmerkingen:</strong><br> {{ $reservering->opmerkingen }}</p>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg">Persoonlijke Gegevens:</h3>
                    <p class="text-sm"><strong>Naam:</strong> {{ $user->name }}</p>
                    <p class="text-sm"><strong>Email:</strong> {{ $user->email }}</p>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg">Prijs:</h3>
                    <p class="text-sm">€{{ $reservering->huis_populated->prijs_per_week }} per persoon per week</p>
                    <p class="text-sm">Totaal: €{{ $reservering->totaal_prijs }}</p>
                </div>

                <div class="mt-5">
                    <x-button.secondary href="/reserveren/{{ $reservering->reservering_id }}/cancel">
                        Annuleren
                    </x-button.secondary>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
