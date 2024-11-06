<!DOCTYPE html>
<html lang="en">
{{-- Penyelenggara Lomba --}}

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyelenggara | Pemberian Sertifikat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

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
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
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
    </div>
</body>

</html>