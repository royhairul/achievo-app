<!doctype html>
<html>

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Achievo | Eksplorasi Lomba</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-white">
        <x-navbar type='eksplorasi' is-login="{{ Auth::check() }}"></x-navbar>

        <div class="px-6 mt-10 py-10 bg-gradient-to-r from-75% from-sky-950 to-sky-700">
            <h2 class="text-2xl font-semibold text-white">Ayo Eksplorasi!</h2>

            <form method="get" action="{{ route('pencarianLombaRoute') }}" class="flex justify-end">
                <input type="text" name="cari" id="cari"
                    class="block w-full md:w-1/2 rounded-md border-0 px-4 py-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 placeholder:text-sm"
                    placeholder="Cari Lomba atau Kompetisi..." value="{{ request('cari') }}">
                <button type="submit" class="ml-2 p-3 text-white bg-sky-700 rounded-md hover:bg-sky-800">
                    <span class="material-symbols-rounded">search</span>
                </button>
            </form>

            <div class="flex gap-2">
                <span
                    class="inline-flex items-center rounded-md bg-sky-900 px-4 py-1 text-sm font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                    Lomba Catur
                </span>

                <span
                    class="inline-flex items-center rounded-md bg-sky-900 px-4 py-1 text-sm font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                    Kompetisi Matematika
                </span>
                <span
                    class="inline-flex items-center rounded-md bg-sky-900 px-4 py-1 text-sm font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                    Esports Competition
                </span>
            </div>

        </div>

        <div class="px-6 py-10">
        <!-- Bagian Rekomendasi -->
        @if(Auth::check())
            @if (isset($recommendationLomba) && $recommendationLomba->count() > 0)
                <h2 class="text-xl font-semibold text-sky-950">Rekomendasi Buat Kamu</h2>
                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0 justify-start">
                    @foreach ($recommendationLomba as $item)
                    <div class="group relative flex flex-col justify-between h-72">
                        <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}" class="relative w-full h-48 overflow-hidden rounded-lg bg-white">
                            <img src="{{ asset('images/' . $item->lomba_poster) }}" class="h-full w-full object-cover" style="object-fit: cover;">
                            <div class="absolute bottom-0 right-0 text-white bg-sky-500 p-4">
                                <p class="text-xs">Batas Pendaftaran</p>
                                <p class="text-lg font-bold">{{ \Carbon\Carbon::parse($item->lomba_tanggal)->format('d F Y') }}</p>
                            </div>
                        </a>
                        <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}" class="my-1 block text-lg font-bold text-sky-500">{{ $item->lomba_nama }}</a>
                        <p class="text-sm">{{ $item->penyelenggara_nama }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">Anda perlu login untuk mengakses fitur ini</p>
            @endif
        @endif

        <!-- Bagian Lomba yang Dicari -->
        <h2 class="text-xl font-semibold text-sky-950 mt-10">Lomba yang Dicari</h2>
        @if ($showAllLomba && !empty($keyword))
            <p class="text-center text-gray-500">Menampilkan semua lomba tersedia karena tidak ada yang cocok dengan pencarian "{{ $keyword }}"</p>
        @endif

        <div class="max-h-100 overflow-y-auto">
            @if ($lomba->count() > 0)
                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0 justify-start">
                    @foreach ($lomba as $item)
                    <div class="group relative flex flex-col justify-between h-72">
                        <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}" class="relative w-full h-48 overflow-hidden rounded-lg bg-white">
                            <img src="{{ asset('images/' . $item->lomba_poster) }}" class="h-full w-full object-cover" style="object-fit: cover;">
                            <div class="absolute bottom-0 right-0 text-white bg-sky-500 p-4">
                                <p class="text-xs">Batas Pendaftaran</p>
                                <p class="text-lg font-bold">{{ \Carbon\Carbon::parse($item->lomba_tanggal)->format('d F Y') }}</p>
                            </div>
                        </a>
                        <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}" class="my-1 block text-lg font-bold text-sky-500">{{ $item->lomba_nama }}</a>
                        <p class="text-sm">{{ $item->penyelenggara_nama }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">Tidak ada lomba yang ditemukan</p>
            @endif
        </div>
    </div>
</body>

</html>
