@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
    <div class="wrapper lg:px-20">
        <div class="relative h-screen">
            <div class="relative inset-x-0 top-0 z-50">
                <x-navbar type="welcome" is-login="{{ Auth::check() }}"></x-navbar>
            </div>

            <div class="relative isolate px-6 pt-14 lg:px-8">
                <div class="flex flex-col justify-center items-center gap-10">
                    <div class="sm:mb-8 sm:flex sm:justify-center">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_175_652" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="-5" y="-5"
                                width="70" height="70">
                                <rect width="60" height="60" fill="#D9D9D9" />
                                <rect x="-2.5" y="-2.5" width="65" height="65" stroke="#FFC436" stroke-opacity="0.2"
                                    stroke-width="5" />
                            </mask>
                            <g mask="url(#mask0_175_652)">
                                <path
                                    d="M17.5 52.5V47.5H27.5V39.75C25.4583 39.2917 23.6354 38.4271 22.0312 37.1562C20.4271 35.8854 19.25 34.2917 18.5 32.375C15.375 32 12.7604 30.6354 10.6562 28.2812C8.55208 25.9271 7.5 23.1667 7.5 20V17.5C7.5 16.125 7.98958 14.9479 8.96875 13.9688C9.94792 12.9896 11.125 12.5 12.5 12.5H17.5V7.5H42.5V12.5H47.5C48.875 12.5 50.0521 12.9896 51.0312 13.9688C52.0104 14.9479 52.5 16.125 52.5 17.5V20C52.5 23.1667 51.4479 25.9271 49.3438 28.2812C47.2396 30.6354 44.625 32 41.5 32.375C40.75 34.2917 39.5729 35.8854 37.9688 37.1562C36.3646 38.4271 34.5417 39.2917 32.5 39.75V47.5H42.5V52.5H17.5ZM17.5 27V17.5H12.5V20C12.5 21.5833 12.9583 23.0104 13.875 24.2812C14.7917 25.5521 16 26.4583 17.5 27ZM42.5 27C44 26.4583 45.2083 25.5521 46.125 24.2812C47.0417 23.0104 47.5 21.5833 47.5 20V17.5H42.5V27Z"
                                    fill="#FFC436" />
                                <path
                                    d="M15 52.5V55H17.5H42.5H45V52.5V47.5V45H42.5H35V41.6254C36.6359 41.0413 38.1468 40.2046 39.5212 39.1159C41.0884 37.8743 42.3276 36.3692 43.2264 34.621C46.3433 33.9588 49.0262 32.388 51.2077 29.9473C53.7228 27.1334 55 23.7793 55 20V17.5C55 15.4567 54.2433 13.6453 52.799 12.201C51.3548 10.7567 49.5433 10 47.5 10H45V7.5V5H42.5H17.5H15V7.5V10H12.5C10.4567 10 8.64525 10.7567 7.20098 12.201C5.75672 13.6453 5 15.4567 5 17.5V20C5 23.7793 6.27719 27.1334 8.79228 29.9473C10.9739 32.388 13.6567 33.9588 16.7736 34.621C17.6724 36.3692 18.9116 37.8743 20.4788 39.1158C21.8532 40.2046 23.3641 41.0413 25 41.6254V45H17.5H15V47.5V52.5Z"
                                    stroke="#FFC436" stroke-opacity="0.2" stroke-width="5" />
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <h1 class="text-4xl lg:text-5xl font-semibold tracking-tight text-sky-950">
                            Ayo Eksplorasi
                            <br>
                            untuk tingkatkan
                            <span class="text-yellow-400 drop-shadow-sm">
                                Prestasi.
                            </span>
                        </h1>
                        <p class="mt-6 text-sm lg:text-base leading-4 lg:leading-8 text-sky-950/40">
                            Temukan berbagai lomba atau kompetisi. Raih peluang prestasi dan kembangkan bakatmu sekarang
                            juga!
                        </p>
                        <div class="w-full mt-10 px-4">
                            <a href="#"
                                class="btn w-full lg:btn-wide border-none outline-none bg-sky-500 text-lg font-semibold text-white hover:bg-sky-400 shadow-sm hover:shadow-lg shadow-sky-300 hover:shadow-sky-200 transition-all duration-300">
                                Mulai Sekarang!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Decor --}}
            {{-- <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#22d3ee] to-[#fbbf24] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#fbbf24] to-[#22d3ee] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div> --}}
        </div>
    </div>
@endsection
