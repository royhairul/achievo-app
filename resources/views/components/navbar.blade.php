<header class="page-padding">
    <nav class="navbar flex items-center justify-between pt-10 px-0" aria-label="Global">
        {{-- Logo and Dropdown for Mobile --}}
        <div class="navbar-start flex lg:flex-1">
            <div class="dropdown">
                <button tabindex="0" role="button" class="btn btn-ghost ml-0 lg:hidden mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>

                <ul tabindex="0" class="menu menu-sm dropdown-content bg-white rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    @foreach ([['route' => 'welcomeRoute', 'label' => 'Beranda', 'type' => 'welcome'], ['route' => 'pencarianRoute', 'label' => 'Eksplorasi', 'type' => 'eksplorasi'], ['route' => 'aboutRoute', 'label' => 'Tentang', 'type' => 'tentang']] as $menu)
                        <li>
                            <a href="{{ route($menu['route']) }}"
                                class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == $menu['type'] ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                                {{ $menu['label'] }}
                            </a>
                        </li>
                    @endforeach

                    @if (!$isLogin)
                        <li>
                            <a href="{{ route('registerRoute') }}"
                                class="mt-2 btn btn-active border-none outline-none bg-sky-100 px-6 py-2 text-sm font-semibold text-sky-600 hover:bg-sky-50">
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

        {{-- Navbar Links for Desktop --}}
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                @foreach ([['route' => 'welcomeRoute', 'label' => 'Beranda', 'type' => 'welcome'], ['route' => 'pencarianRoute', 'label' => 'Eksplorasi', 'type' => 'eksplorasi'], ['route' => 'aboutRoute', 'label' => 'Tentang', 'type' => 'tentang']] as $menu)
                    <li>
                        <a href="{{ route($menu['route']) }}"
                            class="active:!bg-gray-200/50 !outline-none text-sm font-semibold leading-6 transition-all {{ $type == $menu['type'] ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">
                            {{ $menu['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- User Avatar and Actions --}}
        @if ($isLogin)
            <div class="navbar-end w-max ml-4">
                <div class="lg:hidden">
                    <button id="avatarButton" type="button" data-dropdown-toggle="userDropdownMobile"
                        data-dropdown-placement="bottom-start"
                        class="w-10 h-10 bg-gray-400 ring-4 ring-gray-200 rounded-full cursor-pointer">
                    </button>

                    <div id="userDropdownMobile"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <div class="px-4 py-3 text-sm text-gray-900">
                            <div class="font-medium truncate text-sky-500">{{ Auth::user()->username }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="{{ route('pesertaIndexRoute') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                        </ul>
                        <div class="py-1">
                            <form method="POST" action="{{ route('logoutRoute') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex justify-start px-4 py-2 text-sm text-rose-700 hover:bg-rose-100">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-max hidden lg:flex flex-1 justify-end gap-2">
                    <button id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start"
                        class="flex pl-4 gap-4 items-center bg-sky-500/10 rounded-xl">
                        <p class="text-sky-400">
                            Hi, <span class="font-semibold">{{ Auth::user()->username }}</span>
                        </p>
                        <div class="w-8 h-8 bg-gray-400 ring-4 ring-sky-200 rounded-full cursor-pointer"></div>
                    </button>

                    <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <div class="px-4 py-3 text-sm text-gray-900">
                            <div class="font-medium truncate text-sky-500">{{ Auth::user()->username }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="{{ route('pesertaIndexRoute') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                        </ul>
                        <div class="py-1">
                            <form method="POST" action="{{ route('logoutRoute') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex justify-start px-4 py-2 text-sm text-rose-700 hover:bg-rose-100">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="navbar-end hidden lg:flex flex-1 justify-end gap-2">
                <a href="{{ route('registerRoute') }}"
                    class="btn btn-active border-none outline-none bg-sky-100 px-6 py-2 text-sm font-semibold text-sky-600 hover:bg-sky-50">Register</a>
                <a href="{{ route('loginRoute') }}"
                    class="btn btn-active border-none outline-none bg-sky-400 px-6 py-2 text-sm font-semibold text-white hover:bg-sky-600">Login</a>
            </div>
        @endif
    </nav>
</header>