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
    </div>
</body>

</html>