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
        <div class="py-8 px-14 grid grid-cols-1 gap-4 sm:grid-cols-1">
            <a href="{{ url()->previous() }}"
                class="mb-4 flex items-center gap-2 text-sm font-semibold text-sky-500">
                <p class="material-symbols-rounded text-xl">arrow_back</p>
                Kembali
            </a>
            <div class="p-4 rounded bg-gray-50 border border-gray-200/50 w-full">

                <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg mb-4">
                    <p class="material-symbols-rounded text-sky-500">trophy</p>
                    <h4 class="text-sky-950 font-semibold">Tambahkan Prestasi Baru</h4>
                </div>

                <form action="{{ route('pesertaPrestasiStoreRoute') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <!-- Input Nama lomba -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Perlombaan</label>
                            <input type="text" name="nama" id="nama"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm
                                @error('nama') border-rose-600 @enderror"
                                value=" {{ old('nama') }}">
                            @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Nama Penyelenggara lomba -->
                        <div class="mb-4">
                            <label for="penyelenggara" class="block text-sm font-medium text-gray-700">Penyelenggara
                                Perlombaan</label>
                            <input type="text" name="penyelenggara" id="penyelenggara"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm
                                @error('penyelenggara') border-rose-600 @enderror"
                                value=" {{ old('penyelenggara') }}">
                            @error('penyelenggara')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input kategori lomba -->
                        <div class="mb-4">
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori
                                Perlombaan</label>
                            <select id="kategori" name="kategori" autocomplete="kategori"
                                class="block w-full rounded-md py-1.5 px-3 border-gray-300 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('kategori') border-rose-600 @enderror">
                                <option value="" disabled selected>Pilih Bidang...</option>
                                <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik
                                </option>
                                <option value="Non-Akademik" {{ old('kategori') == 'Non-Akademik' ? 'selected' : '' }}>
                                    Non-Akademik</option>
                            </select>
                            @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input tanggal lomba -->
                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Perlombaan</label>
                            <input datepicker datepicker-format="dd-mm-yyyy" id="tanggal" name="tanggal" type="text"
                                datepicker-max-date="{{ today()->format('d-m-Y') }}"
                                autocomplete="birthdate" placeholder="DD/MM/YYYY"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6"
                                value="{{ old('tanggal') }}">
                            @error('tanggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Nomor Sertifikat -->
                        <div class="mb-4">
                            <label for="nomor" class="block text-sm font-medium text-gray-700">Nomor Sertifikat</label>
                            <input type="text" name="nomor" id="nomor"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm
                                @error('nomor') ring-rose-600 @enderror""
                                value=" {{ old('nomor') }}">
                            @error('nomor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Nominasi -->
                        <div class="mb-4">
                            <label for="nominasi" class="block text-sm font-medium text-gray-700">Nominasi</label>
                            <select name="nominasi" id="nominasi"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm
                                @error('nominasi') ring-rose-600 @enderror"">
                                <option value="" disabled selected>Pilih Nominasi Peserta...</option>
                                <option value=" Partisipan">Partisipan</option>
                                <option value="Juara 1">Juara 1</option>
                                <option value="Juara 2">Juara 2</option>
                                <option value="Juara 3">Juara 3</option>
                                <option value="Juara 4-10">Juara 4-10</option>
                                <option value="Juara 11-20">Juara 11-20</option>
                            </select>
                            @error('nominasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Sertifikat -->
                        <div class="mb-4">
                            <label for="sertifikat" class="block text-sm font-medium text-gray-700">Upload
                                Sertifikat</label>
                            <input type="file" name="sertifikat" id="sertifikat"
                                class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @error('sertifikat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full lg:w-max mt-4 inline-block rounded-md bg-sky-500 px-6 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                        Tambah Prestasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>