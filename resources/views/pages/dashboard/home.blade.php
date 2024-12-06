@extends('main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-5xl">Dashboard</h1>
            <div class="h-px w-full bg-slate-600 mx-auto"></div>
            <p class="mt-5">Welkom, {{ auth()->user()->name }}!</p>
        </div>
    </div>
</div>
@endsection
