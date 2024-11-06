<!doctype html>
<html>

<head>
    <title>Achievo | Selamat Datang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-white">
        <div class="absolute inset-x-0 top-0 z-50">
            <x-navbar type="welcome" is-login="{{ Auth::check() }}"></x-navbar>
        </div>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#22d3ee] to-[#fbbf24] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
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
                <div class="text-center flex flex-col">
                    <h1 class="text-5xl font-bold tracking-tight text-sky-950">Ayo Eksplorasi untuk tingkatkan <span
                            class="text-yellow-400 gra drop-shadow-sm">Prestasi.</span></h1>
                    <p class="mt-6 text-base leading-8 opacity-60 text-sky-950">Temukan berbagai lomba atau kompetisi.
                        Raih peluang prestasi dan kembangkan bakatmu sekarang juga!</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#"
                            class="rounded-md bg-sky-500 px-10 py-2.5 text-base font-semibold text-white hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 hover:shadow-lg shadow-sky-400 transition-all">
                            Mulai Sekarang!
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#fbbf24] to-[#22d3ee] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>

    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-center text-base/7 font-semibold text-sky-500">Achievo: Portal Lomba dan Manajemen Prestasi
            </h2>
            <p
                class="mx-auto mt-2 max-w-lg text-pretty text-center text-4xl font-medium tracking-tight text-sky-950 sm:text-5xl">
                Wujudkan impianmu sekarang juga!
            </p>
            <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-3 lg:grid-rows-2">
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                        <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-sky-950 max-lg:text-center">Mobile
                                friendly</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-sky-600 max-lg:text-center">Anim aute id magna
                                aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
                        </div>
                        <div
                            class="relative min-h-[30rem] w-full grow [container-type:inline-size] max-lg:mx-auto max-lg:max-w-sm">
                            <div
                                class="absolute inset-x-10 bottom-0 top-10 overflow-hidden rounded-t-[12cqw] border-x-[3cqw] border-t-[3cqw] border-gray-700 bg-gray-900 shadow-2xl">
                                <img class="size-full object-cover object-top"
                                    src="https://tailwindui.com/plus/img/component-images/bento-03-mobile-friendly.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 lg:rounded-l-[2rem]">
                    </div>
                </div>
                <div class="relative max-lg:row-start-1">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                        <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-sky-950 max-lg:text-center">
                                Performance</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-sky-600 max-lg:text-center">Lorem ipsum, dolor sit
                                amet consectetur adipisicing elit maiores impedit.</p>
                        </div>
                        <div
                            class="flex flex-1 items-center justify-center px-8 max-lg:pb-12 max-lg:pt-10 sm:px-10 lg:pb-2">
                            <img class="w-full max-lg:max-w-xs"
                                src="https://tailwindui.com/plus/img/component-images/bento-03-performance.png"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]">
                    </div>
                </div>
                <div class="relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2">
                    <div class="absolute inset-px rounded-lg bg-white"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)]">
                        <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-sky-950 max-lg:text-center">
                                Security</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-sky-600 max-lg:text-center">Morbi viverra dui mi
                                arcu sed. Tellus semper adipiscing suspendisse semper morbi.</p>
                        </div>
                        <div class="flex flex-1 items-center [container-type:inline-size] max-lg:py-6 lg:pb-2">
                            <img class="h-[min(152px,40cqw)] object-cover object-center"
                                src="https://tailwindui.com/plus/img/component-images/bento-03-security.png"
                                alt="">
                        </div>
                    </div>
                    <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5"></div>
                </div>
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]">
                    </div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                        <div class="px-8 pb-3 pt-8 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 text-lg/7 font-medium tracking-tight text-sky-950 max-lg:text-center">
                                Powerful APIs</p>
                            <p class="mt-2 max-w-lg text-sm/6 text-sky-600 max-lg:text-center">Sit quis amet rutrum
                                tellus ullamcorper ultricies libero dolor eget sem sodales gravida.</p>
                        </div>
                        <div class="relative min-h-[30rem] w-full grow">
                            <div
                                class="absolute bottom-0 left-10 right-0 top-10 overflow-hidden rounded-tl-xl bg-gray-900 shadow-2xl">
                                <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                    <div class="-mb-px flex text-sm font-medium leading-6 text-sky-400">
                                        <div
                                            class="border-b border-r border-b-white/20 border-r-white/10 bg-white/5 px-4 py-2 text-white">
                                            NotificationSetting.jsx</div>
                                        <div class="border-r border-gray-600/10 px-4 py-2">App.jsx</div>
                                    </div>
                                </div>
                                <div class="px-6 pb-14 pt-6">
                                    <!-- Your code example -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
