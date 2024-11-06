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
    <div class="bg-white mb-10">
        <x-navbar isLogin='true' data-user="{{ $dataPeserta }}"></x-navbar>

        <div class="flex flex-col gap-2 py-8 px-14 mt-10 bg-sky-950 text-white">
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
            <form method="get" action="{{ route('pesertaListPrestasiRoute') }}" class="flex justify-end">
                <input type="text" name="cari" id="cari"
                    class="block w-full md:w-1/2 rounded-md border-0 px-4 py-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 placeholder:text-sm"
                    placeholder="Cari Lomba atau Kompetisi..." value="{{ request('cari') }}">
                <button type="submit" class="ml-2 p-3 text-white bg-sky-700 rounded-md hover:bg-sky-800">
                    <span class="material-symbols-rounded">search</span>
                </button>
            </form>
            <a href="{{ route('showFormPrestasi') }}" style="width: 200px; text-align: center;"
                class="inline-block mt-4 rounded-md bg-sky-500 px-4 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all w-auto">
                Tambahkan Prestasi
            </a>
        </div>
        <div class="w-full h-2 bg-gradient-to-r from-30% from-sky-950 to-sky-500"></div>
        <div class="py-8 px-14 grid grid-cols-1 gap-4 sm:grid-cols-1"> <!-- Mengubah dari sm:grid-cols-2 menjadi sm:grid-cols-1 -->
            {{-- Lomba Saya --}}

            <div class="p-4 rounded bg-gray-100 w-full"> <!-- Memastikan div ini menggunakan w-full -->
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Gagal: </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil: </strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

                <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg">
                    <p class="material-symbols-rounded text-sky-500">trophy</p>
                    <h4 class="text-sky-950 font-semibold">Prestasi Saya</h4>
                </div>

                @if (!empty($noPrestasiMessage))
                    <p class="mt-4 text-center text-red-500">{{ $noPrestasiMessage }}</p>
                @endif

                @if (!empty($noResultsMessage))
                    <p class="mt-4 text-center text-sky-500">{{ $noResultsMessage }}</p>
                @endif

                <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-128 overflow-y-auto"> 
                <!-- Membatasi tampilan dan memungkinkan scroll -->
                @foreach ($prestasi->take(50) as $prestasi) 
                <!-- Menampilkan maksimal 50 prestasi -->
                    <div class="w-full flex items-center py-4 gap-x-2">
                        <x-medal class="{{ $prestasi->prestasi_nominasi == 'Juara 1' ? 'fill-amber-400' : ($prestasi->prestasi_nominasi == 'Juara 2' ? 'fill-slate-400' : 'fill-amber-900') }}"></x-medal>
                        <div class="grow">
                            <h3 class="text-base font-bold">{{ $prestasi->prestasi_nominasi }}</h3>
                            

                            <p class="text-sm text-blue-500">{{ $prestasi->prestasi_judul ?: 'Nama Kompetisi tidak tersedia' }}</p>
                            <p class="text-sm">{{ $prestasi->prestasi_tanggal ?? 'Tanggal tidak tersedia' }}</p>
                            <p class="text-sm">{{ $prestasi->prestasi_penyelenggara ?? 'Penyelenggara tidak tersedia' }}</p>
                        </div>
                        <div class="justify-self-end flex gap-2">
                            @if($prestasi->prestasi_lomba)
                            <a href="#" onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)"
                                class="relative flex items-center p-2 gap-2 rounded-md bg-green-300 text-sm font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200 hover:shadow-lg shadow-gray-400 transition-all">
                                <span class="material-symbols-rounded">sweep</span>
                                <!-- Balon teks yang muncul di atas ikon -->
                                <div class="tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                    Didapat melalui Achievo
                                </div>
                            </a>
                            @endif
                            <a onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)" href="{{ asset('images/prestasi/' . $prestasi['prestasi_nama']) }}" download class="relative flex items-center p-2 gap-2 rounded-md bg-sky-300 text-sm font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200 hover:shadow-lg shadow-gray-400 transition-all">
                                <span class="material-symbols-rounded">download</span>
                                <div class=" text-center tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                    Download File
                                </div>
                            </a>
                            <form 
                                action="{{ route('deletePrestasiRoute', ['prestasi_id' => $prestasi['prestasi_id']]) }}" 
                                method="GET" onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">
                                <button type="submit" onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)"
                                    class="px-2 py-2 rounded bg-red-500 text-white hover:bg-gray-600 focus:outline-none focus:ring focus:ring-blue-200">
                                    <span class="material-symbols-rounded">delete</span>
                                </button>
                            </form>
                            
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
                    </div>
                @endforeach
            </div>



                
            </div>
        </div>
    </div>
</body>

</html>
