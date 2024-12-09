@extends('main')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('huizen') }}" class="text-sm text-slate-600 hover:text-slate-800">
            <i class="fa-solid fa-arrow-left"></i> Terug naar overzicht
        </a>
        <h1 class="text-3xl font-thin mb-1">{{ $huis->naam }}</h1>
        <div class="h-px w-full bg-slate-600 mx-auto"></div>
        <div class="grid grid-cols-2 gap-5 mt-5">
            <div class="col-span-1">
                <div class="relative w-full h-full flex overflow-hidden">
                    @foreach($huis->fotos as $index => $foto)
                        <img src="data:image/jpeg;charset=utf-8;base64,{{ $foto }}" alt="{{ $huis->naam }}" class="w-full h-full object-cover z-0 transition-transform duration-200 ease-in-out rounded-md" style="transform: translateX(0)">
                    @endforeach
                    <div class="z-10 absolute top-[50%] right-5 group cursor-pointer">
                        <button id="nextButton" class="bg-white/70 p-2 rounded-md transform group-hover:translate-x-3 transition-all duration-200 ease-out">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="z-10 absolute top-[50%] left-5 group cursor-pointer">
                        <button id="prevButton" class="bg-white/70 p-2 rounded-md transform group-hover:-translate-x-3 transition-all duration-200 ease-out">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <h1 class="text-2xl font-thin mb-1">{{ $huis->naam }}</h1>
                @if($huis->beschikbaar)
                    <p class="text-sm"><i class="fa-solid fa-check"></i> Beschikbaar</p>
                @else
                    <p class="text-sm"><i class="fa-solid fa-xmark"></i> Niet beschikbaar</p>
                @endif
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($huis->straatnaam . ' ' . $huis->huisnummer . $huis->toevoeging . ', ' . $huis->postcode . ' ' . $huis->plaats) }}" target="_blank">
                    <span>{{ $huis->straatnaam }} {{ $huis->huisnummer . $huis->toevoeging }}, {{ $huis->postcode }} {{ $huis->plaats }}</span>
                </a>
                <div class="h-px w-full bg-slate-600 mx-auto"></div>
                <div class="mt-5">
                    <p class="text-sm line-5">{{ $huis->omschrijving }}</p>
                </div>
                <div class="mt-2">
                    <h3 class="text-lg font-thin">Informatie:</h3>
                    <ul class="text-sm">
                        <li class="mt-1"><i class="fa-solid fa-person"></i> Geschikt voor: {{ $huis->aantal_personen }} personen</li>
                        <li class="mt-1"><i class="fa-solid fa-bed"></i> Aantal slaapkamers: {{ $huis->aantal_slaapkamers }}</li>
                        <li class="mt-1"><i class="fa-solid fa-shower"></i> Aantal badkamers: {{ $huis->aantal_badkamers }}</li>
                        <li class="mt-1"><i class="fa-solid fa-restroom"></i> Aantal toiletten: {{ $huis->aantal_toiletten }}</li>
                        <li class="mt-1"><i class="fa-solid fa-stairs"></i> Aantal verdiepingen: {{ $huis->aantal_verdiepingen }}</li>
                        @if($huis->voorzieningen)
                            <li class="mt-1"><i class="fa-solid fa-star"></i> Bijzondere voorzieningen: {{ $huis->voorzieningen }}</li>
                        @endif
                        <li class="mt-1"><i class="fa-solid fa-tree"></i> Tuin: {{ $huis->heeft_tuin ? 'Ja' : 'Nee' }}</li>
                        <li class="mt-1"><i class="fa-solid fa-house"></i> Balkon: {{ $huis->heeft_balkon ? 'Ja' : 'Nee' }}</li>
                        <li class="mt-1"><i class="fa-solid fa-square-parking"></i> Garage: {{ $huis->heeft_garage ? 'Ja' : 'Nee' }}</li>
                        <li class="mt-1"><i class="fa-solid fa-car"></i> Garage capaciteit: {{ $huis->garage_capaciteit }} auto(s)</li>
                    </ul>

                    <p class="mt-5">Prijs: €{{ $huis->prijs_per_week }} per week</p>
                    <x-button.primary class="mt-5 w-full">
                        Reserveren
                    </x-button.primary>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let translate = 0;
            const images = document.querySelectorAll('.object-cover');
            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');

            nextButton.addEventListener('click', function () {
                if (translate < images.length - 1) {
                    translate++;
                    updateImages();
                }
            });

            prevButton.addEventListener('click', function () {
                if (translate > 0) {
                    translate--;
                    updateImages();
                }
            });

            function updateImages() {
                images.forEach((img, index) => {
                    img.style.transform = `translateX(-${translate * 100}%)`;
                });

                // Hide or show buttons based on the translate value
                prevButton.style.display = translate === 0 ? 'none' : 'block';
                nextButton.style.display = translate === images.length - 1 ? 'none' : 'block';
            }

            updateImages()
        });
    </script>
@endsection
