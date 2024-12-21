@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="wrapper">
    <div class="h-screen">
        <div class="relative inset-x-0 top-0 z-50">
            <x-navbar type="tentang" is-login="{{ Auth::check() }}"></x-navbar>
        </div>

        <div class="page-padding pt-14 w-full lg:w-1/2 flex flex-col gap-4">
            <h2 class="text-2xl text-sky-950 font-semibold">Tentang Kami</h2>

            <img src="{{ asset('storage/assets/achievo-logo.svg') }}" alt="Logo Achievo" class="w-max my-4">

            <p class="text-base text-sky-950/60 leading-6">
                Selamat datang di Achievo, portal inovatif yang dirancang untuk membantu pelajar Indonesia meraih
                prestasi terbaiknya!
            </p>
            <p class="text-base text-sky-950/60 leading-6">
                Achievo adalah platform web yang berfokus pada penyediaan informasi lomba terkini serta manajemen
                pencapaian prestasi bagi pelajar. Kami percaya bahwa setiap pelajar memiliki potensi untuk menjadi yang
                terbaik, dan kami hadir untuk mendukung perjalanan tersebut.
            </p>
            <div class="flex flex-col gap-2">
                <a href="" class="flex items-center gap-2 text-sky-500 font-medium p-2 bg-sky-500/10 rounded-md">
                    <span class="material-symbols-outlined">
                        developer_guide
                    </span>
                    <span>Panduan untuk Peserta</span>
                </a>
                <a href="" class="flex items-center gap-2 text-amber-500 font-medium p-2 bg-amber-500/10 rounded-md">
                    <span class="material-symbols-outlined">
                        developer_guide
                    </span>
                    <span>Panduan untuk Penyelenggara</span>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection