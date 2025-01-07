<div class="group relative flex flex-col justify-between">
    <!-- Poster Lomba -->
    <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
        class="relative w-full h-48 overflow-hidden rounded-lg bg-white border-4 border-gray-300/50">
        @php
            $posterUrl = filter_var($item->lomba_poster, FILTER_VALIDATE_URL)
                ? $item->lomba_poster
                : asset('images/' . $item->lomba_poster);
        @endphp

        <img src="{{ $posterUrl }}" class="h-full w-full object-cover">
        <div
            class="rounded-tl-lg absolute bottom-0 right-0 text-white bg-sky-500 px-4 py-2 border-t-2 border-l-2 border-sky-900/50">
            <p class="text-xs leading-4">Batas Pendaftaran</p>
            <p class="tracking-tight text-base lg:text-lg font-semibold lg:font-bold leading-4">
                {{ \Carbon\Carbon::parse($item->lomba_tanggal)->translatedFormat('d F Y') }}
            </p>
        </div>
    </a>

    <!-- Deskripsi -->
    <div class="mt-2">
        <p class="text-xs rounded-md text-white bg-sky-700 w-max px-1">{{ $item->lomba_jenjang }}</p>
        <a href="{{ route('lombaDetailRoute', ['id' => $item->lomba_id]) }}"
            class="block text-lg lg:text-xl font-semibold text-sky-500 tracking-tight leading-6">{{ $item->lomba_nama }}</a>
        <p class="text-sm text-sky-950">{{ $item->penyelenggara_nama }}</p>
    </div>
</div>