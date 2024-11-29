@extends('main')

@section('content')
<style>
    .sharp-text-gradient {
        background: linear-gradient(to bottom, black 38%, white 38%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
</style>
<div class="w-3/5 mx-auto">
    <h1 class="text-9xl font-thin text-transparent sharp-text-gradient z-10 ml-12 uppercase">Over Ons</h1>
    <div class="relative -mt-20 -z-50">
        <img class="w-[60%] absolute left-0 top-0" src="{{ Vite::asset('resources/assets/img/house-1.jpg') }}">
        <img class="absolute right-0 top-5 w-[50%]" src="{{ Vite::asset('resources/assets/img/house-2.jpg') }}">
    </div>

    <div class="mt-[30rem] ml-3 w-[32rem] flex flex-col space-y-5 text-lg">
        <p>Welkom bij ExHouse, een toonaangevend bedrijf in de vastgoedsector, gespecialiseerd in het exploiteren en beheren van woningen. Ons doel is om huurders een comfortabele en veilige woonomgeving te bieden, terwijl we huiseigenaren ontzorgen door hun vastgoed op professionele wijze te beheren.</p>

        <p>Sinds onze oprichting hebben we ons gepositioneerd als een betrouwbare en klantgerichte speler in de vastgoedmarkt. We begrijpen dat de zoektocht naar een woning een belangrijke stap in iemands leven is, en we doen er alles aan om deze ervaring zo soepel en aangenaam mogelijk te maken. Bij ExHouse staan de wensen van onze huurders en de belangen van onze vastgoedpartners altijd centraal.</p>
    </div>
    <div class="mt-5 ml-3 w-full flex flex-col space-y-5 text-lg">
        <p>Onze woningportefeuille bestaat uit diverse woningen die zorgvuldig zijn geselecteerd op basis van locatie, kwaliteit en prijs. We zorgen ervoor dat elk huis dat we beheren goed onderhouden is en voldoet aan de hoogste standaarden van comfort en veiligheid. Of het nu gaat om een eengezinswoning, appartement of studio, wij bieden woningen die passen bij de verschillende behoeften van onze huurders.</p>

        <p>Naarst het aanbieden van woningen voor verhuur, bieden we huiseigenaren een uitgebreide service voor vastgoedbeheer. Van het onderhouden van woningen tot het regelen van administratieve zaken en het zoeken van betrouwbare huurders: bij ExHouse nemen we alle zorgen uit handen. Onze ervaren medewerkers zorgen ervoor dat uw woning in goede handen is, zodat u zich kunt concentreren op andere belangrijke zaken.</p>

        <p>Wat ons onderscheidt, is onze persoonlijke benadering. Wij geloven in open communicatie, transparantie en een lange termijn relatie met zowel huurders als verhuurders. Wij zorgen ervoor dat al onze klanten zich gewaardeerd voelen en bieden hen altijd de steun die ze nodig hebben. Wij zijn pas tevreden wanneer onze klanten dat ook zijn.</p>

        <p>Of u nu op zoek bent naar een woning om te huren of op zoek bent naar een betrouwbare partner voor vastgoedbeheer, ExHouse biedt u de expertise en service die u zoekt. We zijn trots op de huizen die we exploiteren en beheren, en we blijven ons inzetten om van elk huis een plek te maken waar mensen zich thuis voelen.</p>

        <p>Neem gerust contact met ons op voor meer informatie over onze diensten of als u vragen heeft. Wij staan voor u klaar!</p>
    </div>
</div>
@endsection
