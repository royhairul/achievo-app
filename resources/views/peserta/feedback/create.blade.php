<!doctype html>
<html>

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Achievo | Eksplorasi Lomba</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-white mb-10">
        <x-navbar is-login="{{ Auth::check() }}"></x-navbar>
        <div class="px-6">
            <div class="p-4 rounded-lg mt-4 gap-3">
                <a href="{{ redirect()->back() }}"
                    class="mb-4 flex items-center gap-2 text-sm font-semibold text-sky-500">
                    <p class="material-symbols-rounded text-xl">arrow_back</p>
                    Kembali
                </a>
                <div class="flex items-center justify-between">
                    <div>
                        <div class="mb-2">
                            <h2 class="text-sky-800 font-bold text-xl">FeeBack</h2>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-sky-950 opacity-60">
                                Isikan formulir berikut untuk umpan balik pada {{ $getLomba->lomba_nama }}.
                            </p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('pesertaStoreFeedbackRoute', $getLomba->lomba_id) }}"
                    enctype="multipart/form-data" class="grid sm:grid-cols-2 grid-cols-1 gap-5 mt-5">
                    @csrf

                    <input type="hidden" name="lomba_id" value="{{ $getLomba->lomba_id }}">
                    <input type="hidden" name="peserta_id" value="{{ Auth::user()->user_id }}">

                    <div>
                        <label for="pesan" class="block text-sm font-medium leading-6 text-sky-950">
                            Bagaimana pendapatmu mengenai {{ $getLomba->lomba_nama }}?
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

                    <div>
                        <label for="rating" class="block text-sm font-medium leading-6 text-sky-950">
                            Berapa rating untuk {{ $getLomba->lomba_nama }}? (1-5)
                        </label>
                        <div class="mt-2">
                            <input id="rating" name="rating" type="text" autocomplete="rating"
                                value="{{ old('rating') }}" placeholder="Masukkan 1 sampai 5..."
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                        @error('rating')
                                            ring-rose-600
                                        @enderror">
                        </div>
                        @error('rating')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium leading-6 text-sky-950">
                            Deskripsikan mengenai {{ $getLomba->lomba_nama }}?
                        </label>
                        <div class="mt-2">
                            <textarea name="deskripsi" id="deskripsi" autocomplete="deskripsi"
                                class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('deskripsi')
                                    ring-rose-600
                                @enderror""
                                value="{{ old('deskripsi') }}" cols="30" rows="5"></textarea>
                        </div>
                        @error('deskripsi')
                            <p class="absolute text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <button type="submit"
                            class="mt-10 flex w-full justify-center rounded-md bg-sky-500 py-2 text-base font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 transition-all ease-in-out duration-100">
                            Kirim Feedback
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
