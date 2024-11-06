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
        <x-navbar is-login="{{ Auth::check() }}"></x-navbar>
        <div class="px-6">
            <div class="p-4 rounded-lg mt-4 gap-3">
                <a href="{{ url()->previous() }}"
                    class="mb-4 flex items-center gap-2 text-sm font-semibold text-sky-500">
                    <p class="material-symbols-rounded text-xl">arrow_back</p>
                    Kembali
                </a>
                <div class="flex items-center justify-between">
                    <div>
                        <div class="mb-2">
                            <h2 class="text-sky-800 font-bold text-xl">Tambah Prestasi</h2>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-sky-950 opacity-60">
                                Isikan formulir berikut untuk menambahkan prestasi baru yang anda raih.
                            </p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('pesertaStorePrestasiRoute') }}" enctype="multipart/form-data"
                    class="grid sm:grid-cols-2 grid-cols-1 gap-5 mt-5">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm font-medium leading-6 text-sky-950">
                            Nama Lomba
                        </label>
                        <div class="mt-2">
                            <input id="nama" name="nama" type="text" autocomplete="nama"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Lomba..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                    @error('nama')
                                        ring-rose-600
                                    @enderror">
                        </div>
                        @error('nama')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="peringkat" class="block text-sm font-medium leading-6 text-sky-950">
                            Nomor Peringkat
                        </label>
                        <div class="mt-2">
                            <input id="peringkat" name="peringkat" type="text" autocomplete="peringkat"
                                value="{{ old('peringkat') }}" placeholder="Masukkan Juara 1, Juara 3..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                        @error('peringkat')
                                            ring-rose-600
                                        @enderror">
                        </div>
                        @error('peringkat')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nomor" class="block text-sm font-medium leading-6 text-sky-950">
                            Nomor Sertifikat
                        </label>
                        <div class="mt-2">
                            <input id="nomor" name="nomor" type="text" autocomplete="nomor"
                                value="{{ old('nomor') }}" placeholder="Masukkan Nomor Sertifikat..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                        @error('nomor')
                                            ring-rose-600
                                        @enderror">
                        </div>
                        @error('nomor')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium leading-6 text-sky-950" for="file-upload">Upload Bukti
                            (Sertifikat)</label>
                        <input
                            class="mt-2 block w-full text-sm text-sky-900 border rounded-md cursor-pointer dark:text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file-upload_help" id="file-upload" name="bukti" type="file">
                        @error('bukti')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <button type="submit"
                            class="mt-10 flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Buat Prestasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
