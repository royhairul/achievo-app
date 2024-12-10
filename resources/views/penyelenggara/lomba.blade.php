@extends('layouts.app')

@section('title', 'Penyelenggara | Daftar Lomba Kamu')

@section('content')
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200">
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
                        <img src="{{ asset('storage/achievo-logo.svg') }}" class="h-6 m-2" alt="Achievo Logo" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                            data-dropdown-placement="bottom-start"
                            class="w-10 h-10 bg-amber-300 ring-4 ring-amber-200 rounded-full cursor-pointer flex items-center justify-center"
                            alt="User dropdown">
                            <p class="block material-symbols-rounded text-amber-600">
                                face_2
                            </p>
                        </div>

                        <!-- Dropdown menu -->
                        <div id="userDropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                {{-- <div>{{ $dataUser }}</div>
                            <div class="font-medium truncate">name@flowbite.com</div> --}}
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                                <li>
                                    <a href="{{ route('pesertaIndexRoute') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form method="POST" action="{{ route('logoutRoute') }}" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex justify-start px-4 py-2 text-sm text-rose-700 hover:bg-rose-100">
                                        Sign out
                                    </button>
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
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="material-symbols-rounded">grid_view</span>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penyelenggaraLombaRoute') }}"
                        class="flex items-center p-2 text-sky-500 bg-sky-50:text-sky-950 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
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
                <li>
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
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 pt-8 rounded-lg mt-14 gap-8">
            <div class="mb-2">
                <h2 class="text-sky-500 font-semibold text-2xl">Daftar Lomba</h2>
            </div>
            <div class="mb-4">
                <p class="text-sm text-sky-950 opacity-80">
                    Berikut adalah daftar lomba yang telah dibuat.
                </p>
                <a href="{{ route('penyelenggaraCreateLombaRoute') }}"
                    class="inline-block mt-4 rounded-md bg-sky-500 px-6 py-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                    Buat Lomba Baru
                </a>
            </div>
            <div class="p-4 flex flex-col gap-4 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="flex justify-end mb-4">
                    <form method="GET" action="{{ route('penyelenggaraLombaRoute') }}"
                        class="flex w-full md:w-1/2 lg:w-1/3">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                                <span class="block material-symbols-rounded">commit</span>
                            </div>
                            <input type="text" name="keyword"
                                class="pl-10 bg-gray-50 border border-gray-300 text-sky-950 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                placeholder="Cari Lomba..." value="{{ request('keyword') }}" />
                        </div>
                        <button type="submit"
                            class="p-2 ms-2 text-sm font-medium text-white bg-sky-700 rounded-lg border border-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300">
                            <span class="block material-symbols-rounded">search</span>
                        </button>
                    </form>
                </div>

                <!-- Jika ada keyword tetapi tidak ada hasil pencarian -->
                @if ($showAllLomba)
                    <p class="mt-4 text-center text-gray-500">
                        Menampilkan semua lomba karena tidak ada lomba yang sesuai pencarian "{{ request('keyword') }}".
                    </p>
                @endif

                <!-- Jika tidak ada keyword dan tidak ada lomba -->
                @if ($listLomba->isEmpty() && !request('keyword'))
                    <p class="mt-4 text-center text-gray-500">
                        Tidak ada lomba yang ditemukan.
                    </p>
                @endif
                <div class="flex flex-col gap-2">
                    @if (isset($listLomba) && $listLomba->count() > 0)
                        <div class="max-h-96 overflow-y-auto"> <!-- Menambahkan max-height dan overflow -->
                            @foreach ($listLomba as $lomba)
                                <div
                                    class="w-full p-4 bg-sky-50 flex justify-between items-center border-2 rounded border-sky-100">
                                    <div>
                                        <h3 class="text-lg font-semibold text-sky-600">{{ $lomba->lomba_nama }}</h3>
                                        <p
                                            class="my-2 inline-flex items-center rounded-md bg-sky-500/20 py-1 px-4 text-xs font-medium text-sky-500 ring-1 ring-inset ring-sky-700/10 cursor-pointer">
                                            {{ $lomba->lomba_kategori }}
                                        </p>
                                    </div>
                                    <a href="{{ route('penyelenggaraDetailLombaRoute', $lomba->lomba_id) }}"
                                        class="flex rounded-md bg-sky-500 p-2 text-base font-medium text-white hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-200 hover:shadow-lg shadow-sky-400 transition-all">
                                        <p class="material-symbols-rounded">
                                            open_in_new
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div
                            class="mt-2 flex items-center justify-center border-2 rounded border-gray-200 border-dashed bg-gray-50 h-36">
                            <p class="text-gray-300">Tidak Ada Lomba</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
