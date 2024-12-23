@extends('layouts.app')

@section('title', 'Panduan Penggunaan Achievo')

@section('content')
<div class="wrapper">
    <div class="relative">
        <div class="relative inset-x-0 top-0 z-50">
            <x-navbar type="welcome" is-login="{{ Auth::check() }}"></x-navbar>
        </div>

        <div class="page-padding pt-14 mb-4">
            <h1 class="text-3xl font-semibold tracking-tight text-sky-950">
                Panduan Peserta
            </h1>
            <p class="text-sm lg:text-base leading-4 lg:leading-8 text-sky-950/40">
                Pelajari cara menggunakan Achievo untuk menemukan lomba, mengelola prestasi, dan memaksimalkan
                pengalaman Lomba.
            </p>
        </div>

        {{-- Login Step --}}
        <div class="py-20 bg-sky-950 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Login Akunmu</h2>
                    <p class="text-sm font-normal leading-6 text-white/60">
                        Untuk mengakses fitur Achievo, silakan login terlebih dahulu menggunakan akun kamu. Ikuti
                        langkah-langkah berikut untuk memulai.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="login-1.png">
                        Klik tombol <strong>Login</strong> yang ada di pojok kanan atas halaman utama.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="login-2.png">
                        Masukkan <strong>username</strong> dan <strong>password</strong> yang telah terdaftar di form
                        login.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="login-3.png">
                        Klik tombol <strong>Masuk</strong> untuk memulai sesi kamu.
                    </x-guide.step>
                    <!-- Step 4 -->
                    <x-guide.step id="4" image="login-4.png">
                        Setelah login berhasil, kamu akan diarahkan ke <strong>dashboard</strong> utama Achievo untuk
                        mengakses semua fitur.
                    </x-guide.step>
                </div>
            </div>
        </div>


        {{-- Register Step --}}
        <div class="py-20 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Daftar Akun Baru</h2>
                    <p class="text-sm font-normal leading-6 text-sky-950/60">
                        Untuk mulai menggunakan fitur Achievo, kamu perlu membuat akun terlebih dahulu. Ikuti
                        langkah-langkah berikut untuk mendaftar akun baru.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="register-1.png" is-dark="true">
                        Klik tombol <strong>Register</strong> di pojok kanan atas halaman utama.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="register-2.png" is-dark="true">
                        Klik pilihan <strong>Daftar sebagai Peserta</strong>.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="register-3.png" is-dark="true">
                        Isi <strong>formulir pendaftaran</strong> dengan informasi yang benar.
                    </x-guide.step>
                    <!-- Step 4 -->
                    <x-guide.step id="4" image="register-3.png" is-dark="true">
                        Klik tombol <strong>Daftar</strong> untuk menyelesaikan proses pendaftaran.
                    </x-guide.step>
                    <!-- Step 5 -->
                    <x-guide.step id="5" image="login-2.png" is-dark="true">
                        Setelah <strong>Register</strong> berhasil, kamu dapat login ke akun baru dan mulai menggunakan
                        Achievo.
                    </x-guide.step>
                </div>
            </div>
        </div>

        {{-- Search Competition Step --}}
        <div class="py-20 bg-sky-950 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Cari Lomba</h2>
                    <p class="text-sm font-normal leading-6 text-white/60">
                        Temukan Lomba yang sesuai dengan minat dan bakatmu. Ikuti langkah-langkah berikut untuk
                        memulai pencarian.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="">
                        Masuk ke tab <strong>pencarian</strong> di menu navigasi utama.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="">
                        Gunakan fitur <strong>Search</strong> atau filter untuk menemukan Lomba
                        berdasarkan kategori, tingkat, atau jadwal.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="">
                        Klik pada Lomba yang menarik untuk melihat detail dan persyaratan.
                    </x-guide.step>
                </div>
            </div>
        </div>

        {{-- Join Competition Step --}}
        <div class="py-20 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Mengikuti Lomba</h2>
                    <p class="text-sm font-normal leading-6 text-sky-950/60">
                        Setelah menemukan Lomba yang sesuai, ikuti langkah-langkah berikut untuk mendaftar.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="" is-dark="true">
                        Klik tombol <strong>Ikuti</strong> di halaman detail Lomba.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="" is-dark="true">
                        Isi formulir pendaftaran dengan informasi yang diperlukan.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="" is-dark="true">
                        Selesaikan pembayaran jika diperlukan dan konfirmasi pendaftaran.
                    </x-guide.step>
                </div>
            </div>
        </div>

        {{-- Manage Achievement Step --}}
        <div class="py-20 bg-sky-950 h-max flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full overflow-hidden">
                <div class="page-padding">
                    <h2 class="text-xl font-semibold text-sky-400 tracking-tight">Manajemen Prestasi</h2>
                    <p class="text-sm font-normal leading-6 text-white/60">
                        Kelola dan pantau prestasi Lombamu melalui fitur manajemen prestasi. Berikut adalah
                        langkah-langkahnya.
                    </p>
                </div>
                <div class="px-8 lg:px-20 w-full carousel carousel-center space-x-4 py-4">
                    <!-- Step 1 -->
                    <x-guide.step id="1" image="">
                        Masuk ke tab <strong>Prestasi</strong> pada menu navigasi.
                    </x-guide.step>
                    <!-- Step 2 -->
                    <x-guide.step id="2" image="">
                        Tambahkan detail Lomba, pencapaian, dan sertifikat yang diperoleh.
                    </x-guide.step>
                    <!-- Step 3 -->
                    <x-guide.step id="3" image="">
                        Gunakan fitur ekspor untuk mencetak laporan prestasi dalam format PDF.
                    </x-guide.step>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection