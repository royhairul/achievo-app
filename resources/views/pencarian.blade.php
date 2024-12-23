@extends('layouts.app')

@section('title', 'Eksplorasi')

@section('content')
<div class="wrapper">
    <div class="">
        <x-navbar type='eksplorasi' is-login="{{ Auth::check() }}"></x-navbar>
    </div>

    <div
        class="page-padding mt-5 lg:mt-10 py-10 bg-gradient-to-r from-75% from-sky-950 to-sky-700 flex flex-col gap-y-4">
        <h2 class="text-2xl font-semibold text-white">Ayo Eksplorasi!</h2>

        <form method="get" action="{{ route('pencarianRoute') }}" class="flex gap-4">
            <input type="text" name="cari"
                class="input border-none bg-white block w-full md:w-1/2 rounded-md border-0 px-4 py-3 pl-5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 placeholder:text-sm"
                placeholder="Cari Lomba atau Kompetisi..." value="{{ $keyword }}">
            <button type="submit"
                class="btn btn-square border-none text-white text-xl bg-sky-700 rounded-md hover:bg-sky-800">
                <span class="material-symbols-rounded">search</span>
            </button>
        </form>

        <div class="w-full flex-wrap flex gap-2">
            <span class="w-max text-xs lg:text-sm px-2 rounded-md bg-sky-900 text-sky-500">
                Lomba Catur
            </span>

            <span class="text-xs lg:text-sm px-2 rounded-md bg-sky-900 text-sky-500">
                Kompetisi Matematika
            </span>
            <span class="text-xs lg:text-sm px-2 rounded-md bg-sky-900 text-sky-500">
                Esports Competition
            </span>
        </div>

    </div>

    <div class="page-padding py-5 lg:py-10">

        {{-- After Pencarian --}}
        @if (isset($keyword))
            <h2 class="text-xl font-semibold text-sky-950 mt-10">Hasil Pencarian Lomba</h2>
            <p class="text-sm text-sky-950">
                Anda mencari
                <span class="font-semibold text-sky-500 font-italic">{{ $keyword }}</span>
            </p>
            <div
                class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                <p class="text-gray-300">Tidak Ada Hasil</p>
            </div>
        @endif

        {{-- Starter --}}
        <h2 class="text-xl font-semibold text-sky-950 mt-10">Daftar Lomba</h2>
        <div>
            @if ($daftarLomba->count() > 0)
                <div class="max-h-100 overflow-y-auto">
                    <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0 justify-start">
                        @foreach ($daftarLomba as $item)
                            <div class="group relative flex flex-col justify-between">
                                <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
                                    class="relative w-full h-48 overflow-hidden rounded-lg bg-white">
                                    <img src="{{ asset('images/' . $item->lomba_poster) }}" class="h-full w-full object-cover"
                                        style="object-fit: cover;">
                                    <div class="rounded-tl-lg absolute bottom-0 right-0 text-white bg-sky-500 p-4">
                                        <p class="text-xs">Batas Pendaftaran</p>
                                        <p class="lg:text-lg font-bold">
                                            {{ \Carbon\Carbon::parse($item->lomba_tanggal)->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </a>
                                <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
                                    class="block text-lg font-bold text-sky-500">{{ $item->lomba_nama }}</a>
                                <p class="text-sm">{{ $item->penyelenggara_nama }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div
                    class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                    <p class="text-gray-300">Tidak Ada Lomba</p>
                </div>
            @endif
        </div>

        <!-- Bagian Rekomendasi -->
        @if (Auth::check())
            @if (isset($recommendationLomba) && $recommendationLomba->count() > 0)
                <h2 class="text-xl font-semibold text-sky-950">Rekomendasi Buat Kamu</h2>
                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0 justify-start">
                    @foreach ($recommendationLomba as $item)
                        <div class="group relative flex flex-col justify-between h-72">
                            <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
                                class="relative w-full h-48 overflow-hidden rounded-lg bg-white">
                                <img src="{{ asset('images/' . $item->lomba_poster) }}" class="h-full w-full object-cover"
                                    style="object-fit: cover;">
                                <div class="absolute bottom-0 right-0 text-white bg-sky-500 p-4">
                                    <p class="text-xs">Batas Pendaftaran</p>
                                    <p class="text-lg font-bold">
                                        {{ \Carbon\Carbon::parse($item->lomba_tanggal)->format('d F Y') }}
                                    </p>
                                </div>
                            </a>
                            <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
                                class="my-1 block text-lg font-bold text-sky-500">{{ $item->lomba_nama }}</a>
                            <p class="text-sm">{{ $item->penyelenggara_nama }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center text-gray-500">Anda perlu login untuk mengakses fitur ini</p>
        @endif

        <!-- Bagian Lomba yang Dicari -->
        {{-- <h2 class="text-xl font-semibold text-sky-950 mt-10">Lomba yang Dicari</h2>
        @if ($showAllLomba && !empty($keyword))
        <p class="text-center text-gray-500">
            Tidak ada yang cocok dengan
            pencarian"{{ $keyword }}"
        </p>
        @endif --}}
        {{--
        <div class="max-h-100 overflow-y-auto">
            @if ($lomba->count() > 0)
            <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0 justify-start">
                @foreach ($lomba as $item)
                <div class="group relative flex flex-col justify-between h-72">
                    <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
                        class="relative w-full h-48 overflow-hidden rounded-lg bg-white">
                        <img src="{{ asset('images/' . $item->lomba_poster) }}" class="h-full w-full object-cover"
                            style="object-fit: cover;">
                        <div class="absolute bottom-0 right-0 text-white bg-sky-500 p-4">
                            <p class="text-xs">Batas Pendaftaran</p>
                            <p class="text-lg font-bold">
                                {{ \Carbon\Carbon::parse($item->lomba_tanggal)->format('d F Y') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
                        class="my-1 block text-lg font-bold text-sky-500">{{ $item->lomba_nama }}</a>
                    <p class="text-sm">{{ $item->penyelenggara_nama }}</p>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-gray-500">Tidak ada lomba yang ditemukan</p>
            @endif
        </div> --}}
    </div>
</div>
@endsection