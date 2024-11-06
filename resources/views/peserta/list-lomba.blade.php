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
            <form method="get" action="{{ route('pesertaListLombaRoute') }}" class="flex justify-end">
                <input type="text" name="cari" id="cari"
                    class="block w-full md:w-1/2 rounded-md border-0 px-4 py-3 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 placeholder:text-sm"
                    placeholder="Cari Lomba atau Kompetisi..." value="{{ request('cari') }}">
                <button type="submit" class="ml-2 p-3 text-white bg-sky-700 rounded-md hover:bg-sky-800">
                    <span class="material-symbols-rounded">search</span>
                </button>
            </form>
        </div>
        <div class="w-full h-2 bg-gradient-to-r from-30% from-sky-950 to-sky-500"></div>
        <div class="py-8 px-14 grid grid-cols-1 gap-4 sm:grid-cols-1"> <!-- Mengubah dari sm:grid-cols-2 menjadi sm:grid-cols-1 -->
            {{-- Lomba Saya --}}

            <div class="p-4 rounded bg-gray-100 w-full"> <!-- Memastikan div ini menggunakan w-full -->
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error: </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

                <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg">
                    <p class="material-symbols-rounded text-sky-500">stacked_inbox</p>
                    <h4 class="text-sky-950 font-semibold">Partisipasi Lomba</h4>
                </div>

                @if (!empty($noLombaMessage))
                    <p class="mt-4 text-center text-red-500">{{ $noLombaMessage }}</p>
                @endif

                @if (!empty($noResultsMessage))
                    <p class="mt-4 text-center text-sky-500">{{ $noResultsMessage }}</p>
                @endif

                <div class="wrapper mt-5 flex flex-col divide-y-2 max-h-128 overflow-y-auto w-full">
                    @if ($lomba->count() > 0)
                        @foreach ($lomba as $lombaItem)
                            <div class="w-full flex items-center py-4 gap-x-2">
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
                                    <p class="text-sm {{ $textColor }}">Batas Daftar &nbsp;&nbsp;&nbsp;&nbsp;: {{ $lombaItem->lomba_tanggal }}</p>
                                </div>
                                <div class="flex justify-between justify-self-end">
                                    <!-- Kolom Action -->
                                    <form 
                                        action="{{ route('showFormFeedback', ['lombaId' => $lombaItem->lomba_id]) }}" 
                                        method="GET">
                                        <button type="submit"
                                            class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                                            Beri Feedback
                                        </button>
                                    </form>
                                    
                                    @if (\Carbon\Carbon::parse($lombaItem->lomba_tanggal)->isPast())
                                        <a href="#" class="flex items-center p-2 gap-2 rounded-md bg-sky-500 text-sm font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
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
</body>

</html>
