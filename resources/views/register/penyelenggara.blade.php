@extends('layouts.app')

@section('title', 'Register Penyelenggara')

@section('content')
    <div class="container flex">
        <div class="p-20 bg-sky-950 w-1/3 h-screen hidden lg:flex flex-col justify-between">
            <div class="logo"><img class="h-5 w-auto" src="{{ asset('storage/achievo-logo.svg') }}" alt="">
            </div>
            <div class="headline text-white">
                <h4 class="text-xl">Ayo Daftar</h4>
                <h4 class="text-4xl font-semibold italic">Sekarang!</h4>
            </div>
            <h4 class="font-semibold text-sky-500">#Jad1Juara</h4>
        </div>
        <div class="flex min-h-full w-full lg:w-2/3 flex-col px-6 py-12 lg:px-8">
            <div class="mt-10 sm:w-full sm:max-w-sm">
                <h1 class="text-3xl font-bold leading-9 tracking-tight text-amber-500">Registrasi</h1>
                <h2 class="text-base text-sky-950">Daftar sebagai <b>Pengelola Lomba</b></h2>
            </div>

            <div class="mt-10 w-full lg:w-3/4">
                <form class="grid grid-cols-2 gap-5" action="{{ route('registerPostPenyelenggaraRoute') }}" method="POST">
                    @csrf
                    <div class="col-span-2 lg:col-span-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama
                            Organisasi/Instansi</label>
                        <div>
                            <input id="name" name="name" type="text" autocomplete="name"
                                value="{{ old('name') }}" placeholder="Masukkan Nama..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('name') ring-rose-600 @enderror">
                            @error('name')
                                <p class="absolute text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                        <div>
                            <input id="address" name="address" type="text" autocomplete="address"
                                value="{{ old('address') }}" placeholder="Masukkan Alamat..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('address') ring-rose-600 @enderror">
                            @error('address')
                                <p class="absolute text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="birthdate" class="block text-sm font-medium leading-6 text-gray-900">Tahun
                            Berdiri</label>
                        <div>
                            <input datepicker datepicker-format="dd-mm-yyyy" id="birthdate" name="birthdate" type="text"
                                autocomplete="birthdate" value="{{ old('birthdate') }}" placeholder="DD/MM/YYYY"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('birthdate') ring-rose-600 @enderror">
                            @error('birthdate')
                                <p class="absolute text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="bidang" class="block text-sm font-medium leading-6 text-gray-900">Bidang</label>
                        <div>
                            <select id="bidang" name="bidang" autocomplete="bidang"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('bidang') ring-rose-600 @enderror">
                                <option value="" disabled {{ old('bidang') ? '' : 'selected' }}>Pilih Bidang...
                                </option>
                                <option value="Akademik" {{ old('bidang') == 'Akademik' ? 'selected' : '' }}>Akademik
                                </option>
                                <option value="Non-Akademik" {{ old('bidang') == 'Non-Akademik' ? 'selected' : '' }}>
                                    Non-Akademik</option>
                            </select>
                        </div>
                        @error('bidang')
                            <p class="absolute text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div>
                            <input id="email" name="email" type="email" autocomplete="email"
                                value="{{ old('email') }}" placeholder="email@mail.com"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('email') ring-rose-600 @enderror">
                            @error('email')
                                <p class="absolute text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor
                            Telepon</label>
                        <div>
                            <input id="phone" name="phone" type="text" autocomplete="phone"
                                value="{{ old('phone') }}" placeholder="+62..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('phone') ring-rose-600 @enderror">
                            @error('phone')
                                <p class="absolute text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div>
                            <input id="username" name="username" type="text" autocomplete="username"
                                value="{{ old('username') }}" placeholder="Buat username..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('username')
                                    ring-rose-600
                                @enderror">
                        </div>
                        @error('username')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div>
                            <input id="password" name="password" type="password" autocomplete="password"
                                value="{{ old('password') }}" placeholder="Buat kata sandi..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('password')
                                    ring-rose-600
                                @enderror">
                        </div>
                        @error('password')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-2 mt-4">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-amber-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Buat Akun
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('loginRoute') }}"
                        class="font-semibold leading-6 text-amber-500 hover:text-amber-600">
                        Masuk Sekarang!
                    </a>
                </p>
            </div>
        </div>
    </div>

@endsection
