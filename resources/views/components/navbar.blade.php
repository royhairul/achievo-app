<header>
    <nav class="navbar flex items-center justify-between p-6 lg:px-8 pt-10" aria-label="Global">
        {{-- Logo --}}
        <div class="navbar-start flex lg:flex-1">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>

                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-white rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li>
                        <a href="{{ route('welcomeRoute') }}"
                            class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == 'welcome' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pencarianRoute') }}"
                            class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == 'eksplorasi' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                            Eksplorasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aboutRoute') }}"
                            class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == 'tentang' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                            Tentang
                        </a>
                    </li>
                    @if (!$isLogin)
                        <li>
                            <a href="{{ route('registerRoute') }}"
                                class="mt-2 btn btn-active border-none outline-none bg-sky-100 px-6 py-2 text-sm font-semibold text-sky-600 hover:bg-sky-50 ">
                                Register
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('loginRoute') }}"
                                class="mt-2 btn btn-active border-none outline-none bg-sky-400 px-6 py-2 text-sm font-semibold text-white hover:bg-sky-600">
                                Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Achievo</span>
                <img class="h-5 w-auto" src="{{ asset('storage/assets/achievo-logo.svg') }}" alt="">
            </a>
        </div>

        {{-- Navbar Item --}}
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="{{ route('welcomeRoute') }}"
                        class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == 'welcome' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('pencarianRoute') }}"
                        class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == 'eksplorasi' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                        Eksplorasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('aboutRoute') }}"
                        class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == 'tentang' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                        Tentang
                    </a>
                </li>
            </ul>
        </div>

        @if ($isLogin)
            <div class="navbar-end lg:hidden">
                <div id="avatarButton" type="button" data-dropdown-toggle="userDropdownMobile"
                    data-dropdown-placement="bottom-start"
                    class="w-10 h-10 bg-gray-400 ring-4 ring-gray-200 rounded-full cursor-pointer" alt="User dropdown">
                </div>

                <!-- Dropdown menu -->
                <div id="userDropdownMobile"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{ $dataUser }}</div>
                        <div class="font-medium truncate">name@flowbite.com</div>
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
        @endif

        <div class="navbar-end hidden lg:flex flex-1 justify-end gap-2">
            @if (!$isLogin)
                <a href="{{ route('registerRoute') }}"
                    class="btn btn-active border-none outline-none bg-sky-100 px-6 py-2 text-sm font-semibold text-sky-600 hover:bg-sky-50 ">
                    Register
                </a>
                <a href="{{ route('loginRoute') }}"
                    class="btn btn-active border-none outline-none bg-sky-400 px-6 py-2 text-sm font-semibold text-white hover:bg-sky-600">
                    Login
                </a>
            @else
                <div id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                    data-dropdown-placement="bottom-start"
                    class="w-10 h-10 bg-gray-400 ring-4 ring-gray-200 rounded-full cursor-pointer" alt="User dropdown">
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
            @endif
        </div>
    </nav>
</header>
