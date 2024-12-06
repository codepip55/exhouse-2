@extends('main')

@section('content')
    <div class="container mt-5">
        <h1 class="text-4xl">Huizen</h1>
        <p>Op deze pagina vind je alle huizen die te huur staan.</p>
        <div class="h-px w-full bg-slate-600 mx-auto"></div>
        <div class="grid grid-cols-3 gap-5">
            @foreach($huizen as $huis)
                <div class="relative rounded-lg group mt-4 cursor-pointer">
                    <a href="{{ route('huis', $huis->huis_id) }}">
                        <div class="flex flex-col">
                            <div class="flex">
                                <img class="object-cover w-full h-full transition-all duration-200 rounded-lg sm:h-44 group-hover:shadow-lg" src="data:image/jpeg;charset=utf-8;base64,{{ $huis->fotos[0] }}">
                            </div>
                            <div class="flex flex-col items-start justify-center w-full h-full py-6">
                                <div class="flex flex-col items-start justify-center h-full space-y-3 transform">
                                    <h1 class="text-2xl font-semibold leading-none">
                                        <a class="dark:text-slate-100" href="{{ route('huis', $huis->huis_id) }}">{{ $huis->naam }}</a>
                                    </h1>
                                    <p class="text-sm text-gray-500 dark:text-slate-300 line-5">{{ $huis->omschrijving }}</p>
                                    <div>
                                        <p class="text-sm dark:text-slate-400">€{{ $huis->prijs_per_week }}</p>
                                        <p class="text-xs font-light dark:text-slate-300">
                                            <span>{{ $huis->straatnaam }} {{ $huis->huisnummer . $huis->toevoeging }}</span>
                                            <span class="mx-1">{{ $huis->postcode }} {{ $huis->plaats }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
