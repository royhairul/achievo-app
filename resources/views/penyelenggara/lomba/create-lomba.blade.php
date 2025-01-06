@extends('layouts.penyelenggara')

@section('title', 'Penyelenggara | Daftar Lomba Kamu')

@section('content')
<div class="p-4 sm:ml-64 min-h-screen">
    <div class="p-4 mt-14">
        <x-breadcrumbs :items="[
            ['label' => 'Daftar Lomba', 'url' => route('penyelenggaraLombaRoute')],
            ['label' => 'Buat Lomba Baru', 'url' => ''],
        ]" />
        <div class="mb-1">
            <h2 class="text-sky-500 font-semibold text-2xl">Buat Lomba</h2>
        </div>
        <div class="mb-4">
            <p class="text-sm text-sky-950 opacity-80">
                Isikan formulir berikut untuk membuat lomba.
            </p>
        </div>
        <div class="mt-2 lg:w-3/4">
            <form class="grid grid-cols-1 lg:grid-cols-2 gap-4" action="{{ route('penyelenggaraStoreLombaRoute') }}"
                enctype="multipart/form-data" method="POST">
                @csrf

                {{-- Nama Lomba --}}
                <x-forms.input label="Nama Lomba" name="nama" placeholder="Masukkan Nama Lomba..." />

                {{-- Kategori --}}
                <x-forms.select label="Kategori" name="category" placeholder="Pilih Kategori Lomba"
                    :options="['Akademik' => 'Akademik', 'Non-Akademik' => 'Non-Akademik']" />

                {{-- Batas Pendaftaran --}}
                <x-forms.datepicker label="Batas Pendaftaran" name="date"
                    minDate="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" />

                {{-- Lokasi --}}
                <x-forms.input label="Lokasi" name="lokasi" placeholder="Masukkan lokasi..." />

                {{-- Jumlah Peserta --}}
                <x-forms.input label="Jumlah Peserta" name="capacity" type="number"
                    placeholder="Masukkan jumlah peserta..." />

                {{-- Jenjang Peserta --}}
                <x-forms.select label="Jenjang Peserta" name="jenjang" placeholder="Pilih Jenjang Peserta"
                    :options="['SD/MI' => 'SD/MI', 'SMP/MTS' => 'SMP/MTS', 'SMA' => 'SMA', 'Mahasiswa' => 'Mahasiswa', 'Umum' => 'Umum']" />

                {{-- Upload File --}}
                <x-forms.file label="Poster Lomba" name="poster-lomba" />

                {{-- Deskripsi --}}
                <x-forms.textarea label="Deskripsi" name="desc"
                    placeholder="Masukkan deskripsi lomba serta benefitnya..." />

                {{-- Submit Button --}}
                <div class="col-span-2 mt-2">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                        Buat Lomba
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection