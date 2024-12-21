@extends('layouts.app')

@php
    $user = Auth::user()->username
@endphp

@section('title', "$user")

@section('content')
<div class="bg-white ">
    <x-navbar isLogin='true' data-user="{{ $dataPeserta }}"></x-navbar>

    <div class="flex flex-col gap-2 py-8 px-8 lg:px-16 mt-10 bg-sky-950 text-white">
        <p>Welcome,</p>
        <h1 class="text-2xl font-semibold text-cyan-300">{{ $dataPeserta->peserta_nama }}</h1>
        <p class="mt-2 opacity-60 font-normal text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, porro?
        </p>
        <div class="mt-4 grid sm:grid-cols-2 gap-4 grid-cols-1">
            <div class="flex gap-2 text-sm items-center text-sky-50">
                <p class="text-sky-500 material-symbols-rounded">email</p>
                <p class="font-medium">
                    {{ $dataPeserta->peserta_email }}
                </p>
            </div>
            <div class="flex gap-2 text-sm items-center">
                <p class="text-sky-500 material-symbols-rounded">contacts</p>
                <p class="font-medium">
                    {{ $dataPeserta->peserta_telepon }}
                </p>
            </div>
        </div>
    </div>
    <div class="w-full h-2 bg-gradient-to-r from-30% from-sky-950 to-sky-500"></div>
    <div class="py-8 px-8 lg:px-16 grid grid-cols-1 gap-8 sm:grid-cols-2">
        <!-- Prestasi Saya -->
        <div class="p-4 rounded bg-gray-100">
            <div class="flex">
                <div class="grow w-full flex items-center gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg">
                    <p class="material-symbols-rounded text-sky-500">trophy</p>
                    <h4 class="text-sky-950 font-semibold">Prestasi Saya</h4>
                </div>
                @if ($prestasiPeserta->isNotEmpty())
                    <a href="{{ route('pesertaListPrestasiRoute') }}" style="width: 200px; text-align: center;"
                        class="justify-self-end self-end w-full flex gap-1 justify-end items-center text-sky-500">
                        <p class="font-medium">Selengkapnya</p>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                @endif
            </div>
            <div class="wrapper mt-5 flex flex-col divide-y-2">
                @if ($prestasiPeserta->isEmpty())
                    <div
                        class="flex items-center justify-center border-2 rounded border-gray-300 border-dashed bg-gray-50 h-36">
                        <p class="text-gray-400/80">Belum Ada Prestasi</p>
                    </div>
                @else
                    <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-64 overflow-y-auto">
                        @foreach ($prestasiPeserta->take(10) as $prestasi)
                            <div
                                class="w-full rounded-md flex items-center p-4 gap-x-2 bg-white border-gray-300/50 border-[1px]">
                                <x-medal
                                    class="{{ $prestasi->prestasi_nominasi == 'Juara 1' ? 'fill-amber-400' : ($prestasi->prestasi_nominasi == 'Juara 2' ? 'fill-slate-400' : 'fill-amber-900') }}">
                                </x-medal>
                                <div class="grow">
                                    <h3 class="text-base text-sky-950 font-bold">{{ $prestasi->prestasi_nominasi }}</h3>
                                    <p class="text-sm">{{ $prestasi->lomba->lomba_nama ?? 'Nama Kompetisi tidak tersedia' }}</p>
                                </div>
                                <div class="justify-self-end flex gap-2">
                                    @if ($prestasi->prestasi_lomba)
                                        <a href="#" onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)"
                                            class="relative flex items-center p-2 gap-2 rounded-md bg-green-300 text-sm font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200 hover:shadow-lg shadow-gray-400 transition-all">
                                            <span class="material-symbols-rounded">sweep</span>
                                            <div
                                                class="tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                                Didapat melalui Achievo
                                            </div>
                                        </a>
                                    @endif
                                    <a href="{{ asset('images/prestasi/' . $prestasi['prestasi_nama']) }}" download
                                        onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)"
                                        class="relative flex items-center p-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                                        <span class="material-symbols-rounded">download</span>
                                        <div
                                            class="tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                            Download File
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="mt-4 flex justify-between gap-2">
                    <a href="{{ route('pesertaPrestasiCreateRoute') }}"
                        class="inline-block mt-4 rounded-md bg-sky-500 px-4 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                        Tambahkan Prestasi
                    </a>
                </div>
            </div>
        </div>

        <!-- Partisipasi Lomba -->
        <div class="p-4 rounded bg-gray-100">
            <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg">
                <p class="material-symbols-rounded text-sky-500">stacked_inbox</p>
                <h4 class="text-sky-950 font-semibold">Partisipasi Lomba</h4>
            </div>
            @if ($lombaDiikuti->isEmpty())
                <div
                    class="mt-5 flex items-center justify-center border-2 rounded border-gray-300 border-dashed bg-gray-50 h-36">
                    <p class="text-gray-400/80 text-center">
                        Anda belum mendaftar untuk lomba manapun.
                        <br>
                        <a href="{{ route('pencarianRoute') }}" class="text-sky-500 font-medium">Cari Lomba</a> sekarang
                        juga.
                    </p>
                </div>
            @else
                    <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-64 overflow-y-auto">
                        @foreach ($lombaDiikuti->take(10) as $lomba)
                                    <div class="w-full flex-col items-center gap-x-2 rounded-md">
                                        <div
                                            class="w-full flex flex-col lg:flex-row lg:items-center p-4 gap-4 bg-white rounded-md border-gray-300/50 border-[1px]">
                                            <div class="grow text-sky-950">
                                                <h3 class="text-base font-bold">{{ $lomba->lomba_nama }}</h3>
                                                <p class="text-sm font-semibold text-sky-500">
                                                    {{ $lomba->penyelenggara->penyelenggara_nama }}
                                                </p>
                                                @php
                                                    $today = \Carbon\Carbon::today();
                                                    $lombaDate = \Carbon\Carbon::parse($lomba->lomba_tanggal);
                                                    $textColor = '';
                                                    if ($lombaDate->isPast()) {
                                                        $textColor = 'text-red-500';
                                                    } elseif ($lombaDate->greaterThanOrEqualTo($today) && $lombaDate->lessThanOrEqualTo($today->addDays(7))) {
                                                        $textColor = 'text-yellow-500';
                                                    } elseif ($lombaDate->greaterThan($today->addDays(7))) {
                                                        $textColor = 'text-green-500';
                                                    }
                                                @endphp
                                                <p class="mt-2 text-sm {{ $textColor }}">{{ $lombaDate->format('d F Y') }}</p>
                                            </div>
                                            <div>
                                                <div
                                                    class="px-4 border-2 flex justify-center items-center rounded-lg bg-emerald-500/10 text-emerald-500 border-emerald-600/10 gap-2">
                                                    <span class="material-symbols-outlined text-lg">task_alt</span>
                                                    <span class="font-semibold">Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                    </div>
                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('pesertaListLombaRoute') }}"
                            class="mt-4 flex w-max items-center px-4 py-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                            <span class="material-symbols-rounded">info</span>
                            <span>Lihat Selengkapnya</span>
                        </a>
                    </div>
            @endif
        </div>
    </div>

    <script>
        function showTooltip(element) {
            const tooltip = element.querySelector('.tooltip');
            tooltip.classList.remove('hidden');
        }

        function hideTooltip(element) {
            const tooltip = element.querySelector('.tooltip');
            tooltip.classList.add('hidden');
        }
    </script>
    @endsection