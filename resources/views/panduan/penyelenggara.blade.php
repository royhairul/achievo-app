@extends('layouts.app')

@section('title', 'Panduan Penggunaan Achievo untuk Penyelenggara')

@section('content')
<div class="wrapper">
    <div class="relative">
        <div class="relative inset-x-0 top-0 z-50">
            <x-navbar type="welcome" is-login="{{ Auth::check() }}"></x-navbar>
        </div>

        <div class="page-padding pt-14 mb-4">
            <h1 class="text-3xl font-semibold tracking-tight text-sky-950">
                Panduan Penyelenggara
            </h1>
            <p class="text-sm lg:text-base leading-4 lg:leading-8 text-sky-950/40">
                Pelajari cara menggunakan Achievo untuk mengelola lomba, peserta, dan memberikan sertifikat kepada
                peserta.
            </p>
        </div>

        {{-- Create Competition Step --}}
        <div class="py-20 bg-sky-950 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Membuat Lomba Baru</h2>
                    <p class="text-sm font-normal leading-6 text-white/60">
                        Sebagai penyelenggara, kamu bisa membuat lomba baru di platform Achievo. Ikuti langkah-langkah
                        berikut.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="">
                        Masuk ke tab <strong>Lomba</strong> pada menu navigasi utama.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="">
                        Klik tombol <strong>Tambah Lomba</strong> untuk membuat lomba baru.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="">
                        Isi <strong>formulir pembuatan lomba</strong> dengan informasi lengkap tentang lomba, seperti
                        nama lomba, kategori, dan tanggal.
                    </x-guide.step>
                    <!-- Step 4 -->
                    <x-guide.step id="4" image="">
                        Klik tombol <strong>Terbitkan</strong> untuk mempublikasikan lomba yang telah kamu buat.
                    </x-guide.step>
                </div>
            </div>
        </div>

        {{-- View Participants Step --}}
        <div class="py-20 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Melihat Daftar Peserta</h2>
                    <p class="text-sm font-normal leading-6 text-sky-950/60">
                        Setelah lomba terdaftar, kamu bisa melihat daftar peserta yang mendaftar. Ikuti langkah-langkah
                        berikut.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="">
                        Masuk ke halaman detail lomba yang telah dibuat.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="">
                        Klik pada tab <strong>Peserta</strong> untuk melihat peserta yang telah mendaftar.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="">
                        Kamu bisa melihat status peserta dan melakukan verifikasi atau pengecekan lainnya.
                    </x-guide.step>
                </div>
            </div>
        </div>

        {{-- Award Certificates Step --}}
        <div class="py-20 bg-sky-950 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Memberikan Sertifikat</h2>
                    <p class="text-sm font-normal leading-6 text-white/60">
                        Setelah lomba selesai, kamu dapat memberikan sertifikat kepada peserta. Ikuti langkah-langkah
                        berikut.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="">
                        Masuk ke halaman detail lomba yang telah selesai.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="">
                        Pilih peserta yang memenuhi syarat untuk diberikan sertifikat.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="">
                        Klik tombol <strong>Berikan Sertifikat</strong> pada peserta yang dipilih.
                    </x-guide.step>
                    <!-- Step 4 -->
                    <x-guide.step id="4" image="">
                        Unduh atau kirim sertifikat secara otomatis melalui platform ke peserta.
                    </x-guide.step>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection