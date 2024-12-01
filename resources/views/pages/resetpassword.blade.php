@extends('main')

@section('content')
    <div class="container mb-96 mt-52">
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                <img src="https://wp.pepijncolenbrander.com/wp-content/uploads/2024/12/DALL_E_2024-12-01_16.29.46_-_A_simple__minimalistic_image_of_an_arrow_pointing_towards_the_inside_of_a_house._The_house_is_depicted_as_a_basic_outline_of_a_door_with_no_complex_de-removebg.png" alt="Login" class="w-2/5 mx-auto">
            </div>
            <div class="p-2 rounded-sm">
                <h1 class="text-3xl font-thin">Reset Password</h1>
                <div class="h-px w-full bg-slate-600 mx-auto"></div>
                <div>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4 mt-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="border border-slate-600 rounded-sm p-2">
                        </div>
                        <div class="flex flex-col gap-4 mt-4">
                            <x-button.secondary type="submit">
                                Send Reset Email
                            </x-button.secondary>
                            <div class="flex justify-between">
                                <a href="/login" class="text-slate-600 hover:text-slate-700 text-sm">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
