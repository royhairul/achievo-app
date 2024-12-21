@extends('layouts.app')

@section('title', 'Detail Lomba')

@section('content')
    <div class="wrapper px-6 lg:px-24">
        <x-navbar type="eksplorasi" is-login="{{ Auth::check() }}"></x-navbar>

        <div class="mb-2">
            <a href="{{ url()->previous() }}"
                class="flex items-center gap-2 text-sm font-semibold text-sky-500">
                <p class="material-symbols-rounded text-xl">arrow_back</p>
                Kembali
            </a>
        </div>
        
        <!-- <div class="relative px-6 mt-10 py-24">
            <img src="{{ asset('images/' . $lomba->lomba_poster) }}"
            class="absolute block top-0 left-0 h-full w-full object-cover object-center">
        </div> -->
        <!-- <div class="w-full h-2 bg-gradient-to-r from-75% from-sky-950 to-sky-700"></div> -->
        
        <img src="{{ asset('images/' . $lomba->lomba_poster) }}"
            class="w-full lg:w-1/2 rounded-md border-1 top-0 left-0 object-cover object-center">
        
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="basis-2/3 wrapper py-10">
                <h2 class="text-2xl font-semibold text-sky-950 tracking-tight">{{ $lomba->lomba_nama }}</h2>
                <p class="text-sm text-sky-950">
                    Diselenggarakan oleh 
                    <a href="" class="text-sky-500 font-semibold">{{ $lomba->penyelenggara_nama }}</a>
                </p>

                @if (isset($pesan))
                    <div class="mt-4 p-2 text-sm bg-red-100 text-red-600 border border-red-200 rounded">
                        {{ $pesan }}
                    </div>
                @endif

                <ul class="mt-6 flex flex-wrap text-sm text-center">
                    <li class="me-2">
                        <button id="btn-deskripsi" type="button"
                            class="inline-block px-4 py-2 text-sky-950 font-semibold bg-sky-400 rounded-md active"
                            aria-current="page" onclick="">Deskripsi</button>
                    </li>
                    <li class="me-2">
                        <button id="btn-persyaratan" type="button"
                            class="inline-block px-4 py-2 text-gray-400 bg-gray-200 rounded-md"
                            aria-current="page">Persyaratan</button>
                    </li>

                    <!-- masalah rating -->
                    <li class="me-2">
                        <button id="btn-hadiah" type="button"
                            class="inline-block px-4 py-2 text-gray-400 bg-gray-200 rounded-md"
                            aria-current="page">Rating</button>
                    </li>
                </ul>

                <div>
                    <div id="lomba-deskripsi">
                        <h2 class="mt-10 mb-5 px-2 text-lg font-semibold rounded-l-md text-sky-950 bg-gradient-to-r from-0% from-sky-400/50 to-60% to-transparent">
                            Deskripsi
                        </h2>
                        <p class="text-base font-normal text-sky-950 opacity-80">
                            "{{ $lomba->lomba_deskripsi }}"
                        </p>
                    </div>

                    <div id="lomba-persyaratan" class="hidden">
                        <h2 class="mt-10 mb-5 px-2 text-lg font-semibold rounded-l-md text-sky-950 bg-gradient-to-r from-0% from-sky-400/50 to-60% to-transparent">
                            Persyaratan
                        </h2>

                        <dl class="divide-y divide-sky-950 divide-opacity-10">
                            @foreach ($names as $name => $label)
                                <dt class="text-sky-950 text-base py-2">
                                    {{ $label }}
                                </dt>
                            @endforeach
                            {{-- @php
                                $persyaratan = json_decode($lomba->lomba_persyaratan, true);
                            @endphp
                            @foreach ($persyaratan as $item)
                                <dt class="text-sky-950 text-base py-2">{{ $item }}</dt>
                            @endforeach --}}
                        </dl>

                    </div>

                    <div id="lomba-hadiah" class="hidden">
                        <h2 class="mt-10 mb-5 px-2 text-lg font-semibold rounded-l-md text-sky-950 bg-gradient-to-r from-0% from-sky-400/50 to-60% to-transparent">
                            Rating</h2>

                        <!-- Tampilkan rating bintang -->
                        <div>
                            <span>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($lomba->average_rating >= $i)
                                        <!-- Bintang penuh -->
                                        <span style="color: gold; font-size: 24px;">★</span>
                                    @elseif ($lomba->average_rating >= $i - 0.5)
                                        <!-- Setengah bintang -->
                                        <span
                                            style="position: relative; display: inline-block; color: gold; font-size: 24px;">
                                            <span style="position: absolute; overflow: hidden; width: 50%;">★</span>
                                            <span style="color: gray;">★</span>
                                        </span>
                                    @else
                                        <!-- Bintang kosong -->
                                        <span style="color: gray; font-size: 24px;">★</span>
                                    @endif
                                @endfor
                            </span>
                            <!-- Menampilkan rata-rata rating dalam bentuk angka -->
                            <span> ({{ number_format($lomba->average_rating, 1) }})</span>
                            <span> ({{ $lomba->review_count }} pengulas)</span>
                        </div>

                        <!-- Tampilkan ulasan berdasarkan kata yang sering digunakan -->
                        <h3>Kata yang Paling Sering Digunakan:</h3>
                        @if (!empty($lomba->most_common_words))
                            <ul>
                                @foreach ($lomba->most_common_words as $word => $count)
                                    <li>{{ $word }} ({{ $count }})</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Tidak ada ulasan yang tersedia.</p>
                        @endif
                    </div>

                </div>
            </div>

            <div class="basis-1/3 wrapper py-10">
                <h2 class="text-xl font-semibold text-sky-950">Jadwal Pelaksanaan</h2>

                <ul role="list" class="mt-4 divide-y divide-gray-100 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                        <div class="flex w-0 flex-1 items-center">
                            <span class="text-sky-950 material-symbols-rounded">
                                event
                            </span>
                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                <span class="truncate font-bold text-sky-500">
                                    {{ Carbon\Carbon::parse($lomba->lomba_tanggal)->translatedFormat('l, d F Y') }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                        <div class="flex w-0 flex-1 items-center">
                            <span class="text-sky-950 material-symbols-rounded">
                                distance
                            </span>
                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                <span class="truncate font-bold text-sky-500">
                                    {{ $lomba->lomba_lokasi }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="w-full p-4 flex items-center">
                        <a href="{{ $lomba->lomba_tanggal >= \Carbon\Carbon::today() ? route('lombaShowFormRoute', $lomba->lomba_id) : '#' }}"
                            class="w-full center rounded-md text-center 
                            {{ $lomba->lomba_tanggal >= \Carbon\Carbon::today() ? 'bg-sky-500 hover:bg-sky-400' : 'bg-gray-400 cursor-not-allowed' }} 
                            px-6 py-2 font-semibold text-white 
                            {{ $lomba->lomba_tanggal < \Carbon\Carbon::today() ? 'opacity-50' : 'transition-all' }}"
                            {{ $lomba->lomba_tanggal < \Carbon\Carbon::today() ? 'disabled' : '' }}>
                            Join Lomba
                        </a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>


        <script>
            const btnDeskripsi = document.querySelector('#btn-deskripsi');
            const btnPersyaratan = document.querySelector('#btn-persyaratan');
            const btnHadiah = document.querySelector('#btn-hadiah');

            const lombaDeskripsi = document.querySelector('#lomba-deskripsi');
            const lombaPersyaratan = document.querySelector('#lomba-persyaratan');
            const lombaHadiah = document.querySelector('#lomba-hadiah');

            // Fungsi untuk menampilkan satu konten dan menyembunyikan lainnya
            function showTab(tabToShow) {
                // Menyembunyikan semua konten
                lombaDeskripsi.classList.add('hidden');
                lombaPersyaratan.classList.add('hidden');
                lombaHadiah.classList.add('hidden');

                // Mengatur semua tombol agar tidak aktif
                btnDeskripsi.classList.remove('bg-sky-400', 'text-sky-950', 'font-semibold');
                btnPersyaratan.classList.remove('bg-sky-400', 'text-sky-950', 'font-semibold');
                btnHadiah.classList.remove('bg-sky-400', 'text-sky-950', 'font-semibold');

                btnDeskripsi.classList.add('text-gray-400', 'bg-gray-200');

                // Menampilkan konten yang sesuai dan menambahkan kelas aktif ke tombol yang sesuai
                switch (tabToShow) {
                    case lombaDeskripsi:
                        tabToShow.classList.remove('hidden');
                        btnDeskripsi.classList.add('bg-sky-400', 'text-sky-950', 'font-semibold');
                        break;
                    case lombaPersyaratan:
                        tabToShow.classList.remove('hidden');
                        btnPersyaratan.classList.add('bg-sky-400', 'text-sky-950', 'font-semibold');
                        break;
                    case lombaHadiah:
                        tabToShow.classList.remove('hidden');
                        btnHadiah.classList.add('bg-sky-400', 'text-sky-950', 'font-semibold');
                        break;
                    default:
                        console.error('Tab tidak ditemukan!');
                        break;
                }
            }
            // Event listener untuk tombol deskripsi
            btnDeskripsi.addEventListener('click', () => {
                showTab(lombaDeskripsi);
            });

            // Event listener untuk tombol persyaratan
            btnPersyaratan.addEventListener('click', () => {
                showTab(lombaPersyaratan);
            });

            // Event listener untuk tombol hadiah
            btnHadiah.addEventListener('click', () => {
                showTab(lombaHadiah);
            });
        </script>
    </div>
@endsection
