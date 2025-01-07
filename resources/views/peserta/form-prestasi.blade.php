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
        <div class="page-padding min-h-screen">
            <x-breadcrumbs :items="[
                ['label' => 'Dashboard', 'url' => route('pesertaIndexRoute')],
                ['label' => 'Tambah Prestasi', 'url' => ''],
            ]" />
            <div class="p-4 rounded bg-gray-50 border border-gray-200/50 w-full">

                <div class="flex items-center w-max gap-2 rounded-md pl-1 bg-gradient-to-r from-sky-200 text-lg mb-4">
                    <p class="material-symbols-rounded text-sky-500">trophy</p>
                    <h4 class="text-sky-950 font-semibold">Tambahkan Prestasi Baru</h4>
                </div>

                <form action="{{ route('pesertaPrestasiStoreRoute') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <!-- Input Nama lomba -->
                        <x-forms.input label="Nama Perlombaan" name="nama" placeholder="Masukkan Nama Perlombaan..."/>

                        <!-- Input Nama Penyelenggara lomba -->
                        <x-forms.input label="Penyelenggara Perlombaan" name="penyelenggara" placeholder="Masukkan Penyelenggara Perlombaan..."/>

                        <!-- Input kategori lomba -->
                        <x-forms.select label="Kategori" name="kategori" placeholder="Pilih Kategori Lomba"
                        :options="['Akademik' => 'Akademik', 'Non-Akademik' => 'Non-Akademik']" />

                        <!-- Input tanggal lomba -->
                        <x-forms.datepicker label="Tanggal Perlombaan" name="tanggal"/>

                        <!-- Input Nomor Sertifikat -->
                        <x-forms.input label="Nomor Sertifikat" name="nomor" placeholder="Masukkan Nomor Sertifikat..."/>

                        <!-- Input Nominasi -->
                        <x-forms.select label="Nominasi" name="nominasi" placeholder="Pilih Nominasi Peserta..."
                        :options="['Partisipan' => 'Partisipan', 'Juara 1' => 'Juara 1', 'Juara 2' => 'Juara 2', 'Juara 3' => 'Juara 3', 'Juara 4-10' => 'Juara 4-10', 'Juara 11-20' => 'Juara 11-20']" />

                        <!-- Input Sertifikat -->
                        <x-forms.file label="Upload Sertifikat" name="sertifikat"/>
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