@extends('main')

@section('content')
    <div class="container mb-96 mt-40">
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                <img src="https://wp.pepijncolenbrander.com/wp-content/uploads/2025/02/DALL_E_2024-12-01_16.29.46_-_A_simple__minimalistic_image_of_an_arrow_pointing_towards_the_inside_of_a_house._The_house_is_depicted_as_a_basic_outline_of_a_door_with_no_complex_de-removebg.png" alt="Login" class="w-2/5 mx-auto">
            </div>
            <div class="p-2 rounded-sm">
                <h1 class="text-3xl font-thin">Register!</h1>
                <div class="h-px w-full bg-slate-600 mx-auto"></div>
                <div>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4 mt-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="border border-slate-600 rounded-sm p-2">
                        </div>
                        <div class="flex flex-col gap-4 mt-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="border border-slate-600 rounded-sm p-2">
                        </div>
                        <div class="flex flex-col gap-4 mt-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="border border-slate-600 rounded-sm p-2">
                        </div>
                        <div class="flex flex-col gap-4 mt-4">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="border border-slate-600 rounded-sm p-2">
                        </div>
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
                        <div class="flex flex-col gap-4 mt-4">
                            <x-button.primary type="submit">
                                Register
                            </x-button.primary>
                            <div class="flex justify-between">
                                <a href="/login" class="text-slate-600 hover:text-slate-700 text-sm">Already Registered? Login!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
