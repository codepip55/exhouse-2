@extends('main')

@section('content')
    <div class="container mt-5">
        <h1 class="text-7xl">Contact</h1>
        <div class="h-px w-full bg-slate-600 mx-auto"></div>
        @if(session('sent') === 'success')
            <p class="mt-5">Your message has been sent!</p>
            <x-button.secondary href="/" class="mt-5 mb-96">
                Return home
            </x-button.secondary>
        @else
            @auth
                <form action="/contact" method="POST">
                    @csrf
                    <div class="flex flex-col gap-4 mt-4">
                        <label for="name">Name</label>
                        <input readonly type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="border border-slate-600 rounded-sm p-2 bg-gray-100">
                    </div>
                    <div class="flex flex-col gap-4 mt-4">
                        <label for="email">Email</label>
                        <input readonly type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="border border-slate-600 rounded-sm p-2 bg-gray-100">
                    </div>
                    <div class="flex flex-col gap-4 mt-4">
                        <label for="contact_message">Message</label>
                        <textarea name="contact_message" id="contact_message" class="border border-slate-600 rounded-sm p-2"></textarea>
                    </div>
                    @if($errors->any())
                        <div class="flex flex-col gap-4 mt-4">
                            @foreach($errors->all() as $error)
                                <p class="text-red-500 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex flex-col gap-4 mt-4">
                        <x-button.primary type="submit" class="w-fit">
                            Send
                        </x-button.primary>
                    </div>
                </form>
            @else
                <div class="flex flex-col gap-4 mt-4">
                    <p>You must be logged in to contact us.</p>
                    <x-button.primary href="/login">
                        Login
                    </x-button.primary>
                </div>
            @endauth
        @endif
    </div>
@endsection
