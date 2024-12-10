@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container h-screen flex">
        <div class="p-20 bg-sky-950 w-1/3 h-screen hidden lg:flex flex-col justify-between">
            <div class="logo">
                <a href="/">
                    <img class="h-5 w-auto" src="{{ asset('storage/achievo-logo.svg') }}" alt="">
                </a>
            </div>
            <div class="headline text-white">
                <h4 class="text-xl">Selamat Datang</h4>
                <h4 class="text-4xl">Sang <b class="italic">Juara</b></h4>
            </div>
            <h4 class="font-semibold text-sky-500">#Jad1Juara</h4>
        </div>
        <div class="flex min-h-full w-full lg:w-2/3 flex-col justify-center px-6 py-12 lg:px-8 bg-rose">
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="text-3xl font-bold leading-9 tracking-tight text-sky-500">Login</h1>
                <h2 class="text-lg font-semibold text-sky-950">Masuk dengan Akunmu!</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('loginPostRoute') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium leading-6 text-sky-950">
                            Username
                        </label>
                        <div>
                            <input id="username" name="username" type="text" value="{{ old('username') }}"
                                class=" relative block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('username') ring-rose-500 @enderror">
                            @error('username')
                                <p class="absolute text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-sky-950">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-sky-400 hover:text-sky-500">Lupa
                                    password?</a>
                            </div>
                        </div>
                        <div>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                value="{{ old('password') }}"
                                class="relative block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('password') ring-rose-500 @enderror">
                            @error('password')
                                <p class="absolute text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-sky-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                            Masuk
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-sm text-sky-950">
                    Belum punya akun?
                    <a href="{{ route('registerRoute') }}" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">
                        Daftar Dulu!
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
