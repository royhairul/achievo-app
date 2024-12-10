@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container h-screen overflow-hidden flex">
        <div class="p-20 bg-sky-950 w-1/3 h-screen hidden lg:flex flex-col justify-between">
            <div class="logo">
                <a href="/">
                    <img class="h-5 w-auto" src="{{ asset('storage/achievo-logo.svg') }}" alt="">
                </a>
            </div>
            <div class="headline text-white">
                <h4 class="text-xl">Ayo Daftar</h4>
                <h4 class="text-4xl font-semibold italic">Sekarang!</h4>
            </div>
            <h4 class="font-semibold text-sky-500">#Jad1Juara</h4>
        </div>
        <div class="flex w-full lg:w-2/3 flex-col px-6 py-4 lg:py-0 lg:px-8">
            <div class="mt-10 sm:w-full sm:max-w-sm">
                <h1 class="text-2xl lg:text-3xl font-bold leading-9 tracking-tight text-sky-950">Pilih Pendaftaran Akun</h1>
            </div>
            <div>
                <div class="mt-8 mx-auto max-w-2xl rounded-xl lg:mx-0 lg:flex lg:max-w-none ring-1 ring-gray-200">
                    <div class="p-8 sm:p-10 lg:flex-auto rounded-xl bg-gradient-to-r from-sky-100">
                        <h3 class="text-xl font-bold tracking-tight text-sky-500">Sebagai Peserta</h3>
                        <p class="mt-6 text-xs lg:text-sm text-gray-600">
                            Bergabunglah sebagai peserta lomba untuk mengasah
                            keterampilan, berkompetisi, dan berkesempatan memenangkan hadiah menarik.
                        </p>
                        <div class="mt-10 flex items-center gap-x-4">
                            <div class="h-px flex-auto bg-gray-100"></div>
                        </div>
                        <a href="{{ route('registerPesertaRoute') }}"
                            class="flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Daftar
                        </a>
                    </div>
                </div>
                <div class="mx-auto max-w-2xl rounded-xl mt-4 lg:mx-0 lg:flex lg:max-w-none ring-1 ring-gray-200">
                    <div class="p-8 sm:p-10 lg:flex-auto rounded-xl bg-gradient-to-r from-amber-100">
                        <h3 class="text-xl font-bold tracking-tight text-amber-500">Sebagai Penyelenggara</h3>
                        <p class="mt-6 text-xs lg:text-sm text-gray-600">Daftarkan diri Anda sebagai penyelenggara lomba
                            untuk
                            meningkatkan reputasi, membangun jaringan, dan memberikan kontribusi positif kepada
                            komunitas.</p>
                        <div class="mt-10 flex items-center gap-x-4">
                            <div class="h-px flex-auto bg-gray-100"></div>
                        </div>
                        <a href="{{ route('registerPenyelenggaraRoute') }}"
                            class="flex w-full justify-center rounded-md bg-amber-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600 transition-all ease-in-out duration-100">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
@endsection
