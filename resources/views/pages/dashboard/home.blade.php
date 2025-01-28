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
        @if(auth()->user()->email == 'janvansteen@pepijncolenbrander.com')
            <button id="init_database">
                Initialize Database
            </button>
        @endif
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('init_database').addEventListener('click', function() {
            @php
                use App\Models\Huizen;
                $house1 = new Huizen();
                $house1->naam = 'Ericaweg';
                $house1->plaats = 'Holten';
                $house1->straatnaam = 'Ericaweg';
                $house1->huisnummer = '6';
                $house1->toevoeging = '';
                $house1->postcode = '7451JJ';
                $house1->omschrijving = 'Dit charmante vakantiehuis aan de Ericaweg in Holten biedt ruimte voor maximaal 8 personen. Het huis heeft 2 verdiepingen en een eigen tuin waar je heerlijk kunt ontspannen. Geniet van de rust in een natuurlijke omgeving, terwijl je toch dicht bij alle voorzieningen bent. Dit huis is perfect voor gezinnen en vriendengroepen die samen quality time willen doorbrengen.';
                $house1->prijs_per_week = '600';
                $house1->aantal_personen = '8';
                $house1->totaal_aantal_kamers = '8';
                $house1->aantal_slaapkamers = '4';
                $house1->aantal_badkamers = '2';
                $house1->aantal_toiletten = '2';
                $house1->aantal_verdiepingen = '2';
                $house1->voorzieningen = '';
                $house1->beschikbaar = '1';
                $house1->heeft_tuin = '1';
                $house1->heeft_balkon = '1';
                $house1->heeft_garage = '1';
                $house1->garage_capaciteit = '1';
                // Loop over all .jpg files in the public/assets/img/ericaweg folder and add base64 encoded images to the database
                $files = glob(public_path('assets/img/ericaweg/*.jpg'));
                $images = [];
                foreach ($files as $file) {
                    $images[] = base64_encode(file_get_contents($file));
                }
                $house1->fotos = json_encode($images);

                $house2 = new Huizen();
                $house2->naam = 'Korhoenderweg';
                $house2->plaats = 'Holten';
                $house2->straatnaam = 'Korhoenderweg';
                $house2->huisnummer = '2';
                $house2->toevoeging = '';
                $house2->postcode = '7451HB';
                $house2->omschrijving = 'Beleef luxe aan de Korhoenderweg! Dit ruime huis voor 9 personen heeft maar liefst 4 verdiepingen en is voorzien van een sauna en een zwembad. Het biedt een perfect verblijf voor grote groepen die op zoek zijn naar ontspanning én vermaak. De groene tuin biedt extra mogelijkheden om samen van de zon te genieten. De privégarage met ruimte voor twee auto’s maakt het geheel compleet.';
                $house2->prijs_per_week = '700';
                $house2->aantal_personen = '9';
                $house2->totaal_aantal_kamers = '9';
                $house2->aantal_slaapkamers = '5';
                $house2->aantal_badkamers = '3';
                $house2->aantal_toiletten = '4';
                $house2->aantal_verdiepingen = '4';
                $house2->voorzieningen = 'sauna, zwembad';
                $house2->beschikbaar = '1';
                $house2->heeft_tuin = '1';
                $house2->heeft_balkon = '0';
                $house2->heeft_garage = '1';
                $house2->garage_capaciteit = '2';
                // Loop over all .jpg files in the public/assets/img/korhoenderweg folder and add base64 encoded images to the database
                $files = glob(public_path('assets/img/korhoenderweg/*.jpg'));
                $images = [];
                foreach ($files as $file) {
                    $images[] = base64_encode(file_get_contents($file));
                }
                $house2->fotos = json_encode($images);

                $house3 = new Huizen();
                $house3->naam = 'Buizerdweg';
                $house3->plaats = 'Holten';
                $house3->straatnaam = 'Buizerdweg';
                $house3->huisnummer = '12';
                $house3->toevoeging = '';
                $house3->postcode = '7451HP';
                $house3->omschrijving = 'Kom volledig tot rust in dit luxe huis aan de Buizerdweg. Geniet van de sauna, stoomcabine en whirlpool, en blijf koel op warme dagen dankzij de airconditioning. Met ruimte voor 7 personen en een moderne indeling is dit vakantiehuis ideaal voor families of kleine groepen. De tuin biedt privacy en comfort voor lange zomeravonden. Een toplocatie voor wie van luxe houdt!';
                $house3->prijs_per_week = '800';
                $house3->aantal_personen = '7';
                $house3->totaal_aantal_kamers = '7';
                $house3->aantal_slaapkamers = '4';
                $house3->aantal_badkamers = '2';
                $house3->aantal_toiletten = '3';
                $house3->aantal_verdiepingen = '2';
                $house3->voorzieningen = 'sauna, stoomcabine, whirlpool, airconditioning';
                $house3->beschikbaar = '1';
                $house3->heeft_tuin = '1';
                $house3->heeft_balkon = '0';
                $house3->heeft_garage = '1';
                $house3->garage_capaciteit = '1';
                // Loop over all .jpg files in the public/assets/img/buizerdweg folder and add base64 encoded images to the database
                $files = glob(public_path('assets/img/buizerdweg/*.jpg'));
                $images = [];
                foreach ($files as $file) {
                    $images[] = base64_encode(file_get_contents($file));
                }
                $house3->fotos = json_encode($images);

                $house4 = new Huizen();
                $house4->naam = 'Drostenstraat';
                $house4->plaats = 'Holten';
                $house4->straatnaam = 'Drostenstraat';
                $house4->huisnummer = '15';
                $house4->toevoeging = '';
                $house4->postcode = '7451AJ';
                $house4->omschrijving = 'Dit knusse huisje aan de Drostenstraat is ideaal voor kleinere gezelschappen van 4 personen. Het huis heeft een mooie tuin waar je kunt relaxen, en met 3 verdiepingen is er genoeg ruimte voor iedereen. Een budgetvriendelijke keuze voor wie een gezellig, eenvoudig verblijf zoekt in het hart van Holten.';
                $house4->prijs_per_week = '500';
                $house4->aantal_personen = '4';
                $house4->totaal_aantal_kamers = '4';
                $house4->aantal_slaapkamers = '3';
                $house4->aantal_badkamers = '1';
                $house4->aantal_toiletten = '2';
                $house4->aantal_verdiepingen = '3';
                $house4->voorzieningen = '';
                $house4->beschikbaar = '1';
                $house4->heeft_tuin = '1';
                $house4->heeft_balkon = '0';
                $house4->heeft_garage = '0';
                $house4->garage_capaciteit = '0';
                // Loop over all .jpg files in the public/assets/img/drostenstraat folder and add base64 encoded images to the database
                $files = glob(public_path('assets/img/drostenstraat/*.jpg'));
                $images = [];
                foreach ($files as $file) {
                    $images[] = base64_encode(file_get_contents($file));
                }
                $house4->fotos = json_encode($images);

                if (auth()->user()->email == 'janvansteen@pepijncolenbrander.com') {
                    $house1->save();
                    $house2->save();
                    $house3->save();
                    $house4->save();

                    flash()->success('successful!');
                }
            @endphp
        })
    })
</script>
@endsection
