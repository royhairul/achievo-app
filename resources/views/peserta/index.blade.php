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
        </div>
        <div class="w-full h-2 bg-gradient-to-r from-30% from-sky-950 to-sky-500"></div>
        <div class="py-8 px-14 grid grid-cols-1 gap-4 sm:grid-cols-2">
            {{-- Prestasi Saya --}}
            <div class=" p-4 rounded bg-gray-100">
                <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg">
                    <p class="material-symbols-rounded text-sky-500">trophy</p>
                    <h4 class="text-sky-950 font-semibold">Prestasi Saya</h4>
                </div>
                <div class="wrapper mt-5 flex flex-col divide-y-2">
                    @if ($prestasiPeserta->isEmpty())
                        <div
                            class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                            <p class="text-gray-400">Belum Ada Prestasi</p>
                        </div>
                        <a href="{{ route('showFormPrestasi') }}" style="width: 200px; text-align: center;"
                            class="inline-block mt-4 rounded-md bg-sky-500 px-4 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all w-auto">
                            Tambahkan Prestasi
                        </a>
                    @else
                        <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-64 overflow-y-auto">
                            <!-- Membatasi tampilan dan memungkinkan scroll -->
                            @foreach ($prestasiPeserta->take(10) as $prestasi)
                                <!-- Menampilkan maksimal 10 prestasi -->
                                <div class="w-full flex items-center py-4 gap-x-2">
                                    <x-medal
                                        class="{{ $prestasi->prestasi_nominasi == 'Juara 1' ? 'fill-amber-400' : ($prestasi->prestasi_nominasi == 'Juara 2' ? 'fill-slate-400' : 'fill-amber-900') }}"></x-medal>
                                    <div class="grow">
                                        <h3 class="text-base font-bold">{{ $prestasi->prestasi_nominasi }}</h3>
                                        <p class="text-sm">
                                            {{ $prestasi->lomba->lomba_nama ?? 'Nama Kompetisi tidak tersedia' }}</p>
                                    </div>
                                    <div class="justify-self-end flex gap-2">

                                        @if ($prestasi->prestasi_lomba)
                                            <a href="#" onmouseover="showTooltip(this)"
                                                onmouseout="hideTooltip(this)"
                                                class="relative flex items-center p-2 gap-2 rounded-md bg-green-300 text-sm font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200 hover:shadow-lg shadow-gray-400 transition-all">
                                                <span class="material-symbols-rounded">sweep</span>
                                                <!-- Balon teks yang muncul di atas ikon -->
                                                <div
                                                    class="tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                                    Didapat melalui Achievo
                                                </div>
                                            </a>
                                        @endif
                                        <a onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)"
                                            href="{{ asset('images/prestasi/' . $prestasi['prestasi_nama']) }}" download
                                            class="relative flex items-center p-2 gap-2 rounded-md bg-sky-300 text-sm font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200 hover:shadow-lg shadow-gray-400 transition-all">
                                            <span class="material-symbols-rounded">download</span>
                                            <div
                                                class=" text-center tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                                Download File
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 flex justify-center gap-2">
                            <!-- Ubah menjadi flex dengan justify-end untuk sejajar -->

                            <a href="{{ route('pesertaListPrestasiRoute') }}"
                                class="flex w-max items-center px-4 py-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                                <span class="material-symbols-rounded">
                                    info
                                </span>
                                <span>Lihat Selengkapnya</span>
                            </a>
                        </div>

                    @endif
                </div>

            </div>

            <div class="p-4 rounded bg-gray-100">
                <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg">
                    <p class="material-symbols-rounded text-sky-500">stacked_inbox</p>
                    <h4 class="text-sky-950 font-semibold">Partisipasi Lomba</h4>
                </div>

                @if ($lombaDiikuti->isEmpty())
                    <div
                        class="mt-5 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                        <p class="text-gray-400/50 text-center">
                            Anda belum mendaftar untuk lomba manapun.
                            <br>
                            <a href="{{ route('pencarianRoute') }}" class="text-sky-500 font-medium">Cari Lomba</a>
                            sekarang juga.
                        </p>
                    </div>
                @else
                    <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-64 overflow-y-auto">
                        <!-- Menambahkan max-height dan overflow -->
                        @foreach ($lombaDiikuti->take(10) as $lomba)
                            <!-- Menampilkan maksimal 10 lomba -->
                            <div class="w-full flex items-center py-4 gap-x-2">
                                <p class="material-symbols-rounded text-sky-500 text-4xl">event</p>
                                <div class="grow">
                                    <h3 class="text-base font-bold">{{ $lomba->lomba_nama }}</h3>
                                    <p class="text-sm">Penyelenggara : {{ $lomba->penyelenggara->penyelenggara_nama }}
                                    </p>

                                    @php
                                        $today = \Carbon\Carbon::today();
                                        $lombaDate = \Carbon\Carbon::parse($lomba->lomba_tanggal);
                                        $textColor = '';

                                        if ($lombaDate->isPast()) {
                                            // Tanggal lomba sudah lewat
                                            $textColor = 'text-red-500';
                                        } elseif (
                                            $lombaDate->greaterThanOrEqualTo($today) &&
                                            $lombaDate->lessThanOrEqualTo($today->addDays(7))
                                        ) {
                                            // Tanggal lomba antara hari ini hingga 7 hari ke depan
                                            $textColor = 'text-yellow-500';
                                        } elseif ($lombaDate->greaterThan($today->addDays(7))) {
                                            // Tanggal lomba lebih dari 7 hari ke depan
                                            $textColor = 'text-green-500';
                                        }
                                    @endphp

                                    <p class="text-sm {{ $textColor }}">Batas Daftar &nbsp;&nbsp;&nbsp;&nbsp;:
                                        {{ $lombaDate->format('d F Y') }}</p>
                                </div>


                                <div class="justify-self-end relative">
                                    @if (\Carbon\Carbon::parse($lomba->lomba_tanggal)->isPast())
                                        <!-- Cek apakah lomba_tanggal sudah lewat -->
                                        <a href="#" onmouseover="showTooltip(this)" onmouseout="hideTooltip(this)"
                                            class="flex items-center p-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                                            <span class="material-symbols-rounded">check</span>
                                            <div
                                                class=" text-center tooltip hidden absolute -top-2 -left-12 transform -translate-x-1/2 px-7 py-2 text-xs text-white bg-gray-800 rounded-md">
                                                Lomba telah usai
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 flex justify-center">

                        <a href="{{ route('pesertaListLombaRoute') }}"
                            class="flex w-max items-center px-4 py-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                            <span class="material-symbols-rounded">
                                info
                            </span>
                            <span>Lihat Selengkapnya</span></a>
                    </div>

                @endif
            </div>
        </div>
    </div>
    </div>
</body>
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

</html>
