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
    <x-sidebar type="lomba" total-lomba="{{ $totalLomba }}"></x-sidebar>
    <div class="p-4 sm:ml-64">
        <div class="p-4 pt-8 rounded-lg mt-14 gap-8">
            <div class="mb-1">
                <h2 class="text-sky-500 font-semibold text-2xl">Upload Sertifikat</h2>
            </div>
            <div class="mb-4">
                <p class="text-sm text-sky-950 opacity-80">
                    Upload Sertifikat untuk Pemenang.
                </p>
            </div>
            <!-- Menampilkan pesan kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger bg-red-100 text-red-700 border border-red-400 p-2 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mt-5 w-3/4">
                <form class="grid grid-cols-1 sm:grid-cols-2 gap-5" action="{{ route('pylStoreSertifikatRoute') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="jawaban_id" value="{{ $idJawaban }}">
                    <div>
                        <label for="peringkat" class="block text-sm font-medium leading-6 text-gray-900">
                            Peringkat
                        </label>
                        <div class="mt-2">
                            <input id="peringkat" name="peringkat" type="text" autocomplete="peringkat"
                                value="{{ old('peringkat') }}" placeholder="Masukkan Juara 1, Juara 2..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('peringkat')
                                    ring-rose-600
                                @enderror">
                        </div>
                        @error('peringkat')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file-upload">Upload Sertifikat</label>
                        <input
                            class="block w-full text-sm text-sky-900 border  rounded-lg cursor-pointer ring-gray-300 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file-upload_help" id="file-upload" name="file" type="file">
                        @error('file')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pesan" class="block text-sm font-medium leading-6 text-gray-900">
                            Pesan Kepada Pemenang
                            <span class="italic font-normal text-gray-400">(Opsional)</span>
                        </label>
                        <div class="mt-2">
                            <textarea name="pesan" id="pesan" autocomplete="pesan"
                                class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('pesan')
                                    ring-rose-600
                                @enderror""
                                value="{{ old('pesan') }}" cols="30" rows="5"></textarea>
                        </div>
                        @error('pesan')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
