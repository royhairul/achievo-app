@extends('layouts.penyelenggara')

@section('title', 'Penyelenggara')

@section('content')
<div class="min-h-screen p-4 sm:ml-64">
    <div class="p-4 pt-8 flex flex-col gap-8 rounded-lg mt-14">
        <div class="">
            <div class="flex w-max gap-2 rounded-md px-2 bg-gradient-to-r from-sky-100">
                <p class="material-symbols-rounded text-sky-500">key</p>
                <h4 class="text-sky-950 font-semibold">Welcome, Admin</h4>
            </div>
            <h2 class="text-sky-600 font-semibold text-2xl">{{ $dataPenyelenggara->penyelenggara_nama }}</h2>
        </div>
        <!-- <div class="">
            <p class="text-sm text-sky-950">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab nam sequi odio cumque voluptatibus
                distinctio? Dicta, voluptatem a provident quis delectus magni corrupti reiciendis magnam labore ab
                nisi unde itaque molestias neque minus tenetur culpa facere mollitia id, ratione velit ad nulla
                maxime excepturi! Odio, ea quasi voluptatem iste quod maiores dolorum in placeat adipisci, fuga quae
                provident cumque quisquam molestias ab minus nobis ullam.
            </p>
        </div> -->
        <div class="grid sm:grid-cols-2 gap-4 grid-cols-1">
            <div class="flex gap-2 text-sm items-center">
                <p class="text-sky-500 material-symbols-rounded">ads_click</p>
                <p class="text-sky-950 font-medium">
                    Berdiri pada
                    <span class="font-bold">{{ $dataPenyelenggara->penyelenggara_tahunberdiri }}</span>
                </p>
            </div>
            <div class="flex gap-2 text-sm items-center">
                <p class="text-sky-500 material-symbols-rounded">distance</p>
                <p class="text-sky-950 font-medium">
                    <span class="font-bold">{{ $dataPenyelenggara->penyelenggara_alamat }}</span>
                </p>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-4 grid-cols-1">
            <!-- Menampilkan jumlah lomba yang telah dibuat -->
            <div class="p-4 rounded bg-sky-50">
                <p class="text-base font-medium md:text-sm">Lomba yang telah dibuat</p>
                <p class="mt-1 text-3xl font-bold text-sky-500">
                    {{ $totalLombaAll }}
                </p>
            </div>
            <!-- Menampilkan jumlah peserta yang telah mendaftar -->
            <div class="p-4 rounded bg-sky-50">
                <p class="text-base text-sky-950 font-medium md:text-sm">Peserta yang terdaftar</p>
                <p class="mt-1 text-3xl font-bold text-sky-500">
                    {{ $totalPeserta }}
                    <span class="text-sm font-normal italic text-sky-950 opacity-50">Orang</span>
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="flex w-max gap-2 rounded-md px-2 bg-gradient-to-r from-sky-100">
                <p class="material-symbols-rounded text-sky-500">flag</p>
                <h4 class="text-sky-950 font-semibold">Event berlangsung</h4>
            </div>

            {{-- Lomba yang berlangsung --}}
            @if ($lombaBerlangsung->isEmpty())
                <div
                    class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                    <p class="text-gray-300">Tidak Ada Lomba</p>
                </div>
            @else
                <div class="mt-5 grid gap-4">
                    <!-- @foreach ($lombaBerlangsung as $lomba)
                                <div class="p-4 rounded bg-white shadow-sm border-[1px]">
                                    <h3 class="text-base font-semibold text-sky-600">{{ $lomba->lomba_nama }}</h3>
                                    <p class="text-sm text-gray-600">Kategori: {{ $lomba->lomba_kategori }}</p>
                                    <p class="text-sm text-gray-600">Batas Pendaftaran:
                                        {{ \Carbon\Carbon::parse($lomba->lomba_tanggal)->format('d M Y') }}
                                    </p>
                                </div>
                            @endforeach -->
                    @foreach ($lombaBerlangsung as $lomba)
                        <div class="w-full p-4 bg-sky-50 flex justify-between items-center border-2 rounded border-sky-100">
                            <div>
                                <h3 class="text-lg font-semibold text-sky-600">{{ $lomba->lomba_nama }}</h3>
                                <div class="mt-2 flex gap-2">
                                    <p
                                        class="inline-flex items-center rounded-md bg-sky-500/20 py-1 px-4 text-xs font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                                        {{ $lomba->lomba_kategori }}
                                    </p>
                                    <p
                                        class="inline-flex justify-center gap-x-2 items-center rounded-md bg-sky-500/20 px-4 text-xs font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                                        <span class="material-symbols-rounded text-lg">
                                            event
                                        </span>
                                        {{ \Carbon\Carbon::parse($lomba->lomba_tanggal)->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('penyelenggaraDetailLombaRoute', $lomba->lomba_id) }}"
                                class="flex rounded-md bg-sky-500 p-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                                <p class="material-symbols-rounded">
                                    open_in_new
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection