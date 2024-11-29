@extends('main')

@section('content')
    <div class="container mt-5 mb-96">
        <div class="text-8xl mt-[20%] relative inline-block">
            <h1>Op Huizenjacht?</h1>
            <h1 class=" text-8xl font-thin">ExHouse heeft het voor jou!</h1>
            <span class="absolute left-0 bottom-0 h-[4px] bg-black w-[60%]"></span>
        </div>

        <div class="mt-6 max-w-sm flex flex-col justify-start items-start gap-4 sm:flex-row md:mt-8 lg:mt-10">
            <x-button.secondary class="w-full sm:w-auto" href="/huizen">
                Vind jouw huis!
            </x-button.secondary>
        </div>
    </div>
@endsection
