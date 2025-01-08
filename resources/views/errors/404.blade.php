@extends('layouts.app')

@section('title', 'Not Found')

@section('content')
<div class="wrapper">
    <div class="min-h-screen flex flex-col justify-center items-center text-sky-950 text-lg">
        <img class="w-1/2 lg:w-1/4" src="{{ asset('storage/assets/error-not-found.png') }}" alt="" srcset="">
        <h1 class="text-4xl font-bold">404</h1>
        <p class="italic font-semibold text-sky-500">Not Found</p>
    </div>
</div>
@endsection