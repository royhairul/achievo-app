@extends('layouts.app')

@php
    $user = Auth::user()->username
@endphp

@section('title', "List Lomba - $user")

@section('content')
<div class="bg-white mb-10">
    <x-navbar isLogin='true' data-user="{{ $dataPeserta }}"></x-navbar>

    <div class="page-padding py-8 grid grid-cols-1 gap-4 sm:grid-cols-1">
        <h2 class="text-3xl font-bold text-sky-950 tracking-tight leading-relaxed">Daftar Partisipasi Lomba</h2>
        <!-- Mengubah dari sm:grid-cols-2 menjadi sm:grid-cols-1 -->
        {{-- Lomba Saya --}}

        <div class="p-4 rounded bg-gray-100 w-full"> <!-- Memastikan div ini menggunakan w-full -->
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error: </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if (!empty($noLombaMessage))
                <p class="mt-4 text-center text-red-500">{{ $noLombaMessage }}</p>
            @endif

            @if (!empty($noResultsMessage))
                <p class="mt-4 text-center text-sky-500">{{ $noResultsMessage }}</p>
            @endif

            <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-128 overflow-y-auto w-full">
                @if ($lomba->count() > 0)
                            @foreach ($lomba as $lombaItem)
                                        <div class="w-full bg-white flex items-center py-4 gap-x-2">
                                            <p class="material-symbols-rounded text-sky-500 text-4xl">event</p>
                                            <div class="grow">
                                                <h3 class="text-base font-bold">{{ $lombaItem->lomba_nama }}</h3>
                                                <p class="text-sm">Penyelenggara : {{ $lombaItem->penyelenggara->penyelenggara_nama }}</p>
                                                @php
                                                    $today = \Carbon\Carbon::today();
                                                    $lombaDate = \Carbon\Carbon::parse($lombaItem->lomba_tanggal);
                                                    $textColor = '';

                                                    if ($lombaDate->isPast()) {
                                                        // Tanggal lomba sudah lewat
                                                        $textColor = 'text-red-500';
                                                    } elseif ($lombaDate->greaterThanOrEqualTo($today) && $lombaDate->lessThanOrEqualTo($today->addDays(7))) {
                                                        // Tanggal lomba antara hari ini hingga 7 hari ke depan
                                                        $textColor = 'text-yellow-500';
                                                    } elseif ($lombaDate->greaterThan($today->addDays(7))) {
                                                        // Tanggal lomba lebih dari 7 hari ke depan
                                                        $textColor = 'text-green-500';
                                                    }
                                                @endphp
                                                <p class="text-sm {{ $textColor }}">Batas Daftar &nbsp;&nbsp;&nbsp;&nbsp;:
                                                    {{ $lombaItem->lomba_tanggal }}
                                                </p>
                                            </div>
                                            <div class="flex justify-between justify-self-end">
                                                <!-- Kolom Action -->
                                                <form action="{{ route('showFormFeedback', ['lombaId' => $lombaItem->lomba_id]) }}"
                                                    method="GET">
                                                    <button type="submit"
                                                        class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                                                        Beri Feedback
                                                    </button>
                                                </form>

                                                @if (\Carbon\Carbon::parse($lombaItem->lomba_tanggal)->isPast())
                                                    <a href="#"
                                                        class="flex items-center p-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                                                        <span class="material-symbols-rounded">sweep</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                            @endforeach
                @else
                    <p class="text-center text-gray-500">Tidak ada lomba yang ditemukan.</p>
                @endif
            </div>



        </div>
    </div>
</div>
@endsection