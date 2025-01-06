@extends('layouts.penyelenggara')

@section('title', 'Penyelenggara | Daftar Lomba Kamu')

@section('content')
<div class="min-h-screen p-4 sm:ml-64">
    <div class="p-4 pt-8 rounded-lg mt-14 gap-8">
        <div class="mb-2">
            <h2 class="text-sky-500 font-semibold text-2xl">Daftar Lomba</h2>
        </div>
        <div class="mb-4">
            <p class="text-sm text-sky-950 opacity-80">
                Berikut adalah daftar lomba yang telah dibuat.
            </p>
            <a href="{{ route('penyelenggaraCreateLombaRoute') }}"
                class="inline-block mt-4 rounded-md bg-sky-500 px-6 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                Buat Lomba Baru
            </a>
        </div>
        <div class="p-4 flex flex-col gap-4 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <div class="flex justify-end mb-4">
                <form method="GET" action="{{ route('penyelenggaraLombaRoute') }}"
                    class="flex w-full md:w-1/2 lg:w-1/3">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                            <span class="block material-symbols-rounded">commit</span>
                        </div>
                        <input type="text" name="keyword"
                            class="pl-10 bg-gray-50 border border-gray-300 text-sky-950 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                            placeholder="Cari Lomba..." value="{{ request('keyword') }}" />
                    </div>
                    <button type="submit"
                        class="p-2 ms-2 text-sm font-medium text-white bg-sky-700 rounded-lg border border-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300">
                        <span class="block material-symbols-rounded">search</span>
                    </button>
                </form>
            </div>

            <!-- Jika ada keyword tetapi tidak ada hasil pencarian -->
            @if ($showAllLomba)
                <p class="mt-4 text-center text-gray-500">
                    Menampilkan semua lomba karena tidak ada lomba yang sesuai pencarian "{{ request('keyword') }}".
                </p>
            @endif

            <!-- Jika tidak ada keyword dan tidak ada lomba -->
            @if ($listLomba->isEmpty() && !request('keyword'))
                <p class="mt-4 text-center text-gray-500">
                    Tidak ada lomba yang ditemukan.
                </p>
            @endif
            <div class="flex flex-col gap-2">
                @if (isset($listLomba) && $listLomba->count() > 0)
                    <div class="flex flex-col gap-4"> <!-- Menambahkan max-height dan overflow -->
                        @foreach ($listLomba as $lomba)
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
                @else
                    <div
                        class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                        <p class="text-gray-300">Tidak Ada Lomba</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
</div>
@endsection