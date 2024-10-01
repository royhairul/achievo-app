<!doctype html>
<html>

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Achievo | Eksplorasi Lomba</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-white">
        <header>
            <nav class="flex items-center justify-between p-6 lg:px-8 pt-10" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">Achievo</span>
                        <img class="h-5 w-auto" src="{{ asset('storage/achievo-logo.svg') }}" alt="">
                    </a>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('welcomeRoute') }}"
                        class="text-sm font-semibold leading-6 text-sky-950 hover:text-sky-500 transition-all">Beranda</a>
                    <a href="{{ route('pencarianRoute') }}"
                        class="text-sm font-semibold leading-6 text-sky-500 hover:text-sky-500 transition-all">Eksplorasi</a>
                    <a href="{{ route('tentangRoute') }}"
                        class="text-sm font-semibold leading-6 text-sky-950 hover:text-sky-500 transition-all">Tentang</a>
                </div>
                <div class="lg:flex lg:flex-1 lg:justify-end gap-2">
                    <a href="{{ route('registerRoute') }}"
                        class="rounded-md bg-sky-100 px-6 py-2 text-sm font-semibold text-sky-500 hover:bg-sky-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 hover:shadow-lg shadow-sky-400 transition-all">
                        Register
                    </a>
                    <a href="{{ route('loginRoute') }}"
                        class="rounded-md bg-sky-500 px-6 py-2 text-sm font-semibold text-white hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 hover:shadow-lg shadow-sky-400 transition-all">
                        Login
                    </a>
                </div>
            </nav>
        </header>

        <div class="px-6 mt-10 py-10 bg-gradient-to-r from-75% from-sky-950 to-sky-700">
            <h2 class="text-2xl font-semibold text-white">Ayo Eksplorasi!</h2>

            <form class="relative">
                <input type="text" name="cari" id="cari"
                    class="block w-full my-5 rounded-md border-0 px-4 py-3 pl-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 placeholder:text-sm"
                    placeholder="Cari Lomba atau Kompetisi...">
                <div class="absolute top-3 right-5 flex space-x-2">
                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none" aria-label="Search">
                        <span class="material-symbols-rounded">
                            search
                        </span>
                    </button>
                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none" aria-label="Filter">
                        <span class="material-symbols-rounded">
                            tune
                        </span>
                    </button>
                </div>
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
            <h2 class="text-xl font-semibold text-sky-950">Rekomendasi Buat Kamu</h2>

            <div>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0 justify-start">
                    <div class="group relative">
                        <div
                            class="relative h-50 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                            <img src="https://rm.id/images/berita/med/sambut-hut-ke78-ri-ganjar-sejati-gelar-kompetisi-sepak-bola-antardesa-di-kabupaten-indramayu_183088.jpg"
                                alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                class="h-full w-full object-cover object-center">
                            <div
                                class="absolute z-40 right-0 bottom-0 text-sky-950 bg-sky-500 p-4 rounded-tl-lg flex items-center gap-4">
                                <p class="block material-symbols-rounded text-3xl">event</p>
                                <div>
                                    <p class="text-xs">
                                        Batas Pendaftaran
                                    </p>
                                    <p class="text-base font-bold">
                                        20 Januari 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href="#"
                                class="my-2 inline-flex items-center rounded-md bg-sky-500/20 py-1 px-4 text-xs font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                                Football
                            </a>
                        </p>
                        <a href="/detail" class="text-base font-semibold text-sky-950">Liga Sepak Bola Pelajar
                            se-Provinsi</a>
                        <p class="text-sm font-semibold text-sky-500">PSSI</p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
