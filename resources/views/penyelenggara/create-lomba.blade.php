<!DOCTYPE html>
<html lang="en">
{{-- Penyelenggara Lomba --}}

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyelenggara | Daftar Lomba Kamu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include jQuery UI CSS and JS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-6 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
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
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
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
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
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
            <div class="mb-1">
                <h2 class="text-sky-500 font-semibold text-2xl">Buat Lomba</h2>
            </div>
            <div class="mb-4">
                <p class="text-sm text-sky-950 opacity-80">
                    Isikan formulir berikut untuk membuat lomba.
                </p>
            </div>
            <div class="mt-5 w-3/4">
                <form class="grid grid-cols-1 sm:grid-cols-2 gap-4" action="{{ route('penyelenggaraStoreLombaRoute') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">
                            Nama Lomba
                        </label>
                        <input id="nama" name="nama" type="text" autocomplete="nama"
                            value="{{ old('nama') }}" placeholder="Masukkan Nama Lomba..."
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('nama')
                                    ring-rose-600
                                @enderror">
                        @error('nama')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
                            Kategori
                        </label>
                        <select id="category" name="category"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('category') ring-rose-600 @enderror">
                            <option value="" disabled selected>Pilih Kategori Lomba</option>
                            <option value="Akademik" {{ old('category') == 'Akademik' ? 'selected' : '' }}>
                                Akademik</option>
                            <option value="Non-Akademik" {{ old('category') == 'Non-Akademik' ? 'selected' : '' }}>
                                Non-Akademik</option>
                        </select>
                        @error('category')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium leading-6 text-gray-900">
                            Batas Pendaftaran
                        </label>

                        <input datepicker datepicker-format="dd-mm-yyyy" id="date" name="date"
                            value="{{ old('date') }}" type="text" autocomplete="date" placeholder="DD-MM-YYYY"
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('date')
                                    ring-rose-600
                                @enderror"
                            min="{{ \Carbon\Carbon::now()->addDays(2)->format('Y-m-d') }}">

                        @error('date')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-medium leading-6 text-gray-900">
                            Lokasi
                        </label>

                        <input id="lokasi" name="lokasi" type="text" autocomplete="lokasi"
                            value="{{ old('lokasi') }}" placeholder="Masukkan lokasi..."
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                    @error('lokasi')
                                        ring-rose-600
                                    @enderror">

                        @error('lokasi')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="capacity" class="block text-sm font-medium leading-6 text-gray-900">Jumlah
                            Peserta</label>

                        <input id="capacity" name="capacity" type="number" autocomplete="capacity"
                            value="{{ old('capacity') }}" placeholder="Masukkan jumlah peserta..."
                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                    @error('capacity')
                                        ring-rose-600
                                    @enderror">

                        @error('capacity')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-sky-900 dark:text-white"
                            for="file-upload">Upload file</label>
                        <input
                            class="block w-full text-sm text-sky-900 border border-sky-300 rounded-lg cursor-pointer bg-sky-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file-upload_help" id="poster-lomba" name="poster-lomba" type="file"
                            value="{{ old('image') }}">
                        @error('image')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="desc"
                            class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                        <textarea name="desc" id="desc" autocomplete="desc"
                            class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('desc')
                                    ring-rose-600
                                @enderror""
                            cols="30" rows="5">
                        </textarea>

                        @error('desc')
                            <p class="absolute text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Buat Lomba
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            // Calculate the minimum date (2 days from now)
            var today = new Date();
            today.setDate(today.getDate() + 2);
            var minDate = today.toISOString().split('T')[0]; // Format YYYY-MM-DD

            // Initialize the datepicker with the minimum date
            $("#date").datepicker({
                minDate: minDate,
                dateFormat: "dd-mm-yy", // Set the format you want for the date picker
            });
        });
    </script>
</body>

</html>
