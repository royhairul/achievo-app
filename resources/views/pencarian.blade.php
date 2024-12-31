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
            <div class="mb-10">
                <h2 class="text-xl font-semibold text-sky-950">Hasil Pencarian Lomba</h2>
                <p class="text-sm text-sky-950">
                    Anda mencari
                    <span class="font-semibold text-sky-500 italic">{{ $keyword }}</span>
                </p>
                @if ($cariLomba->count() > 0)
                    <div class="max-h-100 overflow-y-auto">
                        <div class="mt-2 space-y-8 lg:grid lg:grid-cols-3 lg:gap-6 lg:space-y-0 justify-start">
                            @foreach ($cariLomba as $item)
                                <x-lomba-card :item="$item" />
                            @endforeach
                        </div>
                    </div>
                @else
                    <div
                        class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                        <p class="text-gray-300">Tidak Ada Hasil</p>
                    </div>
                @endif
                <hr class="my-10">
            </div>
        @endif

        <!-- Bagian Rekomendasi -->
        <h2 class="text-xl font-semibold text-sky-950 flex items-center gap-2">
            <span class="material-symbols-outlined">
                editor_choice
            </span>
            <span>
                Rekomendasi Buat Kamu!
            </span>
        </h2>
        @if (Auth::check())
            @if (isset($recommendationLomba) && $recommendationLomba->count() > 0)
                <div class="mt-2 space-y-8 lg:grid lg:grid-cols-3 lg:gap-6 lg:space-y-0 justify-start">
                    @foreach ($recommendationLomba as $item)
                        <x-lomba-card :item="$item" />
                    @endforeach
                </div>
            @endif
        @else
            <div
                class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 py-2">
                <p class="text-gray-400 text-sm">
                    Anda perlu
                    <a href="{{ route('loginRoute') }}" class="text-sky-500 font-semibold">login</a>
                    untuk mengakses fitur ini
                </p>
            </div>
        @endif

        {{-- Starter --}}
        <h2 class="text-xl font-semibold text-sky-950 mt-10">Daftar Lomba</h2>
        <div>
            @if ($daftarLomba->count() > 0)
                <div class="max-h-100 overflow-y-auto">
                    <div class="mt-2 space-y-8 lg:grid lg:grid-cols-3 lg:gap-6 lg:space-y-0 justify-start">
                        @foreach ($daftarLomba as $item)
                            <x-lomba-card :item="$item" />
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
    </div>
</div>
@endsection