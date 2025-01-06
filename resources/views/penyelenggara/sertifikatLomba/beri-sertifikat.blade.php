@extends('layouts.penyelenggara')

@section('title', 'Penyelenggara')

@section('content')
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<div class="p-4 sm:ml-64">
    <div class="p-4 pt-8 rounded-lg mt-14 gap-8">
        <div class="mb-2">
            <h2 class="text-sky-500 font-semibold text-2xl">Pemberian Sertifikat</h2>
        </div>

        <div class="mb-4">
            <p class="text-sm text-sky-950 opacity-80">
                Berikut adalah data peserta:
            </p>
            <div class="p-4 flex flex-col gap-4 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <!-- Menampilkan Data Peserta dan Lomba -->
                <p><strong>Nama Peserta:</strong> {{ $peserta->peserta_nama }}</p>
                <p><strong>Email Peserta:</strong> {{ $peserta->peserta_email }}</p>
                <p><strong>Nama Lomba:</strong> {{ $lomba->lomba_nama }}</p>
                <p><strong>Kategori Lomba:</strong> {{ $lomba->lomba_kategori }}</p>
                <p><strong>Tanggal Lomba:</strong> {{ $lomba->lomba_tanggal }}</p>
            </div>
        </div>

        <form action="{{ route('BeriSertifikatPeserta') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Input Nomor Sertifikat -->
            <div class="mb-4">
                <label for="nomor" class="block text-sm font-medium text-gray-700">Nomor Sertifikat</label>
                <input type="text" name="nomor" id="nomor"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm"
                    required>
            </div>

            <!-- Input Nominasi -->
            <div class="mb-4">
                <label for="nominasi" class="block text-sm font-medium text-gray-700">Nominasi</label>
                <select name="nominasi" id="nominasi"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm"
                    required>
                    <option value="" disabled selected>Pilih Nomoniasi Peserta...</option>
                    <option value="Partisipan">Partisipan</option>
                    <option value="Juara 1">Juara 1</option>
                    <option value="Juara 2">Juara 2</option>
                    <option value="Juara 3">Juara 3</option>
                    <option value="Juara 4-10">Juara 4-10</option>
                    <option value="Juara 11-20">Juara 11-20</option>
                    <option value="Juara 21-50">Juara 21-50</option>
                    <option value="Juara 51-99">Juara 51-99</option>
                    <option value="Juara 100+">Juara 100+</option>
                </select>
            </div>

            <!-- Input Sertifikat -->
            <div class="mb-4">
                <label for="sertifikat" class="block text-sm font-medium text-gray-700">Upload Sertifikat</label>
                <input type="file" name="sertifikat" id="sertifikat"
                    class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    required>
            </div>

            <input type="hidden" name="peserta_id" value="{{ $peserta->peserta_id }}">
            <input type="hidden" name="lomba_id" value="{{ $lomba->lomba_id }}">

            <!-- Submit Button -->
            <button type="submit"
                class="mt-4 inline-block rounded-md bg-sky-500 px-6 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                Beri Sertifikat
            </button>
        </form>
    </div>
</div>
@endsection