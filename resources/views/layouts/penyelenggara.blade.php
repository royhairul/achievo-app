@extends('layouts.base')

@section('body')
@yield('content')

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-6 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/" class="flex ms-2 md:me-24">
                    <img src="{{ asset('storage/assets/achievo-logo.svg') }}" class="h-6 m-2" alt="Achievo Logo" />
                </a>
            </div>
            <div class="navbar-end w-max ml-4">
                <div class="lg:hidden">
                    <button id="avatarButton" type="button" data-dropdown-toggle="userDropdownMobile"
                        data-dropdown-placement="bottom-start"
                        class="w-10 h-10 bg-amber-300 ring-4 ring-amber-200/50 rounded-full cursor-pointer">
                        <p class="block material-symbols-rounded text-amber-600">
                            face_2
                        </p>
                    </button>

                    <div id="userDropdownMobile"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <div class="px-4 py-3 text-sm text-gray-900">
                            <div class="font-medium truncate text-amber-500">{{ Auth::user()->username }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="{{ route('pesertaIndexRoute') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                        </ul>
                        <div class="py-1">
                            <form method="POST" action="{{ route('logoutRoute') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex justify-start px-4 py-2 text-sm text-rose-700 hover:bg-rose-100">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-max hidden lg:flex flex-1 justify-end gap-2">
                    <button id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start"
                        class="flex pl-4 gap-4 items-center bg-amber-500/10 rounded-xl">
                        <p class="text-amber-400">
                            Hi, <span class="font-semibold">{{ Auth::user()->username }}</span>
                        </p>
                        <div class="p-1 bg-amber-300 ring-4 flex ring-amber-200 rounded-full cursor-pointer">
                            <p class="block material-symbols-rounded text-amber-500">
                                face_2
                            </p>
                        </div>
                    </button>

                    <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <div class="px-4 py-3 text-sm text-gray-900">
                            <div class="font-medium truncate text-amber-500">{{ Auth::user()->username }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="{{ route('pesertaIndexRoute') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                        </ul>
                        <div class="py-1">
                            <form method="POST" action="{{ route('logoutRoute') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex justify-start px-4 py-2 text-sm text-rose-700 hover:bg-rose-100">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pt-6 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('penyelenggaraIndexRoute') }}"
                    class="flex items-center p-2 text-sky-500 bg-sky-50:text-sky-950 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-rounded">grid_view</span>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('penyelenggaraLombaRoute') }}"
                    class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="material-symbols-rounded">dns</span>
                    <span class="flex-1 ms-3 whitespace-nowrap">Daftar Lomba</span>
                    @if (isset($totalLomba))
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                            {{ $totalLomba > 9 ? '9+' : $totalLomba }}
                        </span>
                    @endif
                </a>
            </li>
            <!-- <li>
                <a href=""
                    class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-950 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <a href=""
                    class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-950 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                </a>
            </li> -->
        </ul>
    </div>
</aside>
@isset($slot)
    {{ $slot }}
@endisset

@endsection