@extends('layouts.penyelenggara')

@section('title', 'Penyelenggara | Daftar Lomba Kamu')

@section('content')
<div class="min-h-screen p-4 sm:ml-64">
    <div class="flex p-4 pt-8 rounded-lg mt-14 gap-8  px-6 py-10 items-start">
        <div class="basis-2/3 wrapper flex flex-col gap-6">
            <div>
                <div class="pl-2 flex w-max gap-2 rounded-md bg-gradient-to-r from-sky-200 mb-1">
                    <h4 class="text-sky-950 font-semibold">Nama Lomba</h4>
                </div>
                <h2 class="text-3xl font-semibold text-sky-950">{{ $lomba->lomba_nama }}</h2>
            </div>

            <div id="lomba-deskripsi">
                <div class="pl-2 flex w-max gap-2 rounded-md bg-gradient-to-r from-sky-200 mb-1">
                    <h4 class="text-sky-950 font-semibold">Deskripsi Lomba</h4>
                </div>
                <p class="text-sm font-normal text-sky-950 opacity-80">
                    {{ $lomba->lomba_deskripsi }}
                </p>
            </div>
        </div>

        <div class="basis-1/3 wrapper flex flex-col gap-6">
            <div>
                <div class="pl-2 flex w-max gap-2 rounded-md bg-gradient-to-r from-sky-200 mb-1">
                    <h4 class="text-sky-950 font-semibold">Tanggal Pelaksanaan</h4>
                </div>
                <p class="text-base font-normal text-sky-950 opacity-80">
                    {{ $lomba->lomba_tanggal }}
                </p>
            </div>
            <div>
                <div class="pl-2 flex w-max gap-2 rounded-md bg-gradient-to-r from-sky-200 mb-1">
                    <h4 class="text-sky-950 font-semibold">Jumlah Peserta</h4>
                </div>
                <p class="text-base font-normal text-sky-950 opacity-80">
                    {{ $lomba->lomba_kapasitas }}
                </p>
            </div>
        </div>
    </div>

    <div class="p-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="pl-2 flex w-max gap-2 rounded-md bg-gradient-to-r from-sky-200 mb-2">
            <h4 class="text-sky-950 font-semibold">Data Peserta</h4>
        </div>
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div>
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                    </svg>
                    Last 30 days
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownRadio"
                    class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownRadioButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-1" type="radio" value="" name="filter-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-1"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                    day</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-2"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                    7 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-3" type="radio" value="" name="filter-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-3"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                    30 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-4" type="radio" value="" name="filter-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-4"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                    month</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-5" type="radio" value="" name="filter-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-5"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                    year</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div
                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error: </strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    @foreach ($names as $name => $label)
                        <th scope="col" class="px-6 py-3">
                            {{ $label }}
                        </th>
                    @endforeach
                    <th scope="col" class="px-6 py-3">Action</th> <!-- Tambahkan kolom baru "Action" -->
                </tr>
            </thead>
            <tbody>
                @if (isset($dataJawaban) && count($dataJawaban) > 0)
                    @foreach ($dataJawaban as $data)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            @foreach ($names as $name => $label)
                                <td class="px-6 py-3">
                                    @if (isset($data['jawaban_content'][$name]))
                                        @if (is_array($data['jawaban_content'][$name]))
                                            {!! implode(', ', $data['jawaban_content'][$name]) !!}
                                        @else
                                            @if (strpos($name, 'file') !== false)
                                                <a href="{{ asset('images/peserta/' . $data['jawaban_content'][$name]) }}" download>
                                                    {{ $data['jawaban_content'][$name] }}
                                                </a>
                                            @else
                                                {!! $data['jawaban_content'][$name] !!}
                                            @endif
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                            @endforeach
                            <!-- Kolom Action -->
                            <td class="px-6 py-3">
                                <form
                                    action="{{ route('ShowFormBeriSertifikatPeserta', ['peserta_id' => $data['jawaban_peserta'], 'lomba_id' => $data['jawaban_lomba']]) }}"
                                    method="GET">
                                    <button type="submit"
                                        class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                                        Beri Sertifikat
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="{{ count($names) + 2 }}" class="py-4 text-center border-[1px] border-dashed">
                            Tidak Ada Data Peserta
                        </td>
                        <!-- Tambahkan 1 kolom di sini -->
                    </tr>
                @endif
            </tbody>
        </table>



    </div>
</div>
@endsection