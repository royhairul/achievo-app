@extends('layouts.app')

@php
    $user = Auth::user()->username
@endphp

@section('title', "$user")

@section('content')
<div class="bg-white mb-10">
    <x-navbar isLogin='true' data-user="{{ $dataPeserta }}"></x-navbar>

    <div class="page-padding min-h-screen flex flex-col gap-2 py-8 mt-10">
    <x-breadcrumbs :items="[
        ['label' => 'Beranda', 'url' => route('pencarianRoute')],
        ['label' => 'Daftar Prestasi', 'url' => ''],
    ]" />
        <h2 class="text-3xl font-bold text-sky-950 tracking-tight">Daftar Prestasi</h2>
        <p class="text-sm text-sky-950 opacity-60">
                        Berikut daftar prestasi anda.
                    </p>
        <a href="" style="width: 200px; text-align: center;"
            class="inline-block mt-4 rounded-md bg-sky-500 px-4 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all w-auto">
            Tambahkan Prestasi
        </a>

        <div class="wrapper flex flex-col divide-y-2">
            @if ($daftarPrestasi->isEmpty())
                <div
                    class="flex items-center justify-center border-2 rounded border-gray-300 border-dashed bg-gray-50 h-36">
                    <p class="text-gray-400/80">Belum Ada Prestasi</p>
                </div>
            @else
                <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-64 overflow-y-auto">
                    @foreach ($daftarPrestasi->take(10) as $prestasi)
                        <div class="w-full rounded-md flex items-center p-4 gap-x-2 bg-white border-gray-300/50 border-[1px]">
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
        </div>
    </div>
</div>
@endsection