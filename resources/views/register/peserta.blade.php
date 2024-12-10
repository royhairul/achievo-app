@extends('layouts.app')

@section('title', 'Register Peserta')

@section('content')
    <div class="container flex">
        <div class="p-20 bg-sky-950 w-1/3 h-screen lg:flex flex-col justify-between hidden">
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
                <h1 class="text-3xl font-bold leading-9 tracking-tight text-sky-500">Registrasi</h1>
                <h2 class="text-base text-sky-950">Daftar sebagai <b>Peserta</b></h2>
            </div>

            <div class="mt-10 w-full lg:w-3/4">
                <form class="grid grid-cols-2 gap-5" action="{{ route('registerPostPesertaRoute') }}" method="POST">
                    @csrf
                    <div class="col-span-2 lg:col-span-1">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                            Nama Lengkap
                        </label>
                        <div>
                            <input id="name" name="name" type="name" autocomplete="name"
                                value="{{ old('name') }}" placeholder="Masukkan Nama Anda..."
                                class="block bg-white w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('name')
                                    ring-rose-600
                                @enderror">
                        </div>
                        @error('name')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Jenis
                            Kelamin</label>
                        <div>
                            <select name="gender" id="gender"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('gender')
                                    ring-rose-600
                                @enderror">">
                                <option disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                                <option value="Pria" {{ old('gender') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </div>
                        @error('gender')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="birthdate" class="block text-sm font-medium leading-6 text-gray-900">
                            Tanggal Lahir
                        </label>
                        <div>
                            <input datepicker datepicker-format="dd-mm-yyyy" id="birthdate" name="birthdate"
                                value="{{ old('birthdate') }}" type="birthdate" autocomplete="birthdate"
                                placeholder="DD-MM-YYYY"
                                class="block bg-white w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('birthdate')
                                    ring-rose-600
                                @enderror">
                        </div>
                        @error('birthdate')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="study" class="block text-sm font-medium leading-6 text-gray-900">Pendidikan</label>
                        <div>
                            <select name="study" id="study"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('study')ring-rose-600 @enderror">
                                <option disabled {{ old('study') ? '' : 'selected' }}>Pilih Pendidikan Anda</option>
                                <option value="SD" {{ old('study') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('study') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('study') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="PT" {{ old('study') == 'PT' ? 'selected' : '' }}>Perguruan Tinggi
                                </option>
                            </select>
                        </div>
                        @error('study')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div>
                            <input id="email" name="email" type="text" autocomplete="email"
                                value="{{ old('email') }}" placeholder="email@mail.com"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('email')
                                    ring-rose-600
                                @enderror">
                        </div>
                        @error('email')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2 lg:col-span-1">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor
                            Telepon</label>
                        <div>
                            <input id="phone" name="phone" type="phone" autocomplete="phone" placeholder="+62..."
                                value="{{ old('phone') }}"
                                class="block bg-white w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('phone')
                                    ring-rose-500
                                @enderror">
                        </div>
                        @error('phone')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
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
                                value="{{ old('pasasword') }}" placeholder="Buat kata sandi..."
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
                            class="flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Buat Akun
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('loginRoute') }}" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">
                        Masuk Sekarang!
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

@endsection
