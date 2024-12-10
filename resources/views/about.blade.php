@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="wrapper bg-white lg:px-20">
        <div class="h-screen ">
            <div class="relative inset-x-0 top-0 z-50">
                <x-navbar type="tentang" is-login="{{ Auth::check() }}"></x-navbar>
            </div>

            <div class="relative isolate px-6 pt-14 lg:px-8 w-full lg:w-1/2">
                <h2 class="text-2xl text-sky-500 font-semibold">Tentang Kami</h2>

                <img src="{{ asset('storage/achievo-logo.svg') }}" alt="Logo Achievo" class="my-8">

                <p class="mt-5 text-base text-sky-950/60 leading-4">
                    Selamat datang di Achievo, portal inovatif yang dirancang untuk membantu pelajar Indonesia meraih
                    prestasi terbaiknya!
                </p>
                <p class="mt-5 text-base text-sky-950/60 leading-6">
                    Achievo adalah platform web yang berfokus pada penyediaan informasi lomba terkini serta manajemen
                    pencapaian prestasi bagi pelajar. Kami percaya bahwa setiap pelajar memiliki potensi untuk menjadi yang
                    terbaik, dan kami hadir untuk mendukung perjalanan tersebut.
                </p>

            </div>
        </div>
    </div>
@endsection
