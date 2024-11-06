<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
    <title>Achievo | Kirim Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-white mb-10">
        <x-navbar isLogin='true' data-user="{{ $dataPeserta }}"></x-navbar>

        <div class="py-8 px-14 mt-10 bg-sky-950 text-white">
            <div class="flex items-center">
            <p class="material-symbols-rounded text-sky-500">stacked_inbox</p>
            <h1 class="text-2xl font-semibold text-cyan-300">Kirim Feedback untuk Lomba</h1>
            </div>
            
            <p class="mt-2">Lomba &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $lomba->lomba_nama }}</p>
            <p class="mt-2">Batas Daftar &nbsp;&nbsp;&nbsp;&nbsp;: {{ $lomba->lomba_tanggal }}</p>
            <p class="mt-2">Penyelenggara : {{ $penyelenggara->penyelenggara_nama }}</p>
        </div>

        <div class="w-full h-2 bg-gradient-to-r from-sky-950 to-sky-500"></div>

        <div class="py-8 px-14">
            <div class="p-4 bg-gray-100 rounded w-full">
                <form action="{{ route('kirimFeedback', $lomba->lomba_id) }}" method="POST" class="grid grid-cols-1 gap-5">
                    @csrf

                    <!-- Input Rating -->
                    <div>
                        <label for="feedback_rating" class="block text-sm font-medium text-gray-900">Rating (1-5)</label>
                        <select id="feedback_rating" name="feedback_rating" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-sky-600 sm:text-sm sm:leading-6">
                            <option value="" disabled selected>Pilih Rating...</option>
                            @for ($i = 1; $i <= 5; $i += 0.5)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('feedback_rating')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Isi Feedback -->
                    <div>
                        <label for="feedback_isi" class="block text-sm font-medium text-gray-900">Isi Feedback</label>
                        <textarea id="feedback_isi" name="feedback_isi" rows="4" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-sky-600 sm:text-sm sm:leading-6" placeholder="Masukkan feedback Anda..."></textarea>
                        @error('feedback_isi')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-medium py-2 px-4 rounded-md">Kirim Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
