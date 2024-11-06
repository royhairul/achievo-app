<header>
    <nav class="flex items-center justify-between p-6 lg:px-8 pt-10" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Achievo</span>
                <img class="h-5 w-auto" src="{{ asset('storage/achievo-logo.svg') }}" alt="">
            </a>
        </div>
        <div class="flex gap-x-12">
            <a href="{{ route('welcomeRoute') }}"
                class="text-sm font-semibold leading-6 transition-all {{ $type == 'welcome' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }} ">Beranda</a>
            <a href="{{ route('pencarianRoute') }}"
                class="text-sm font-semibold leading-6 transition-all {{ $type == 'eksplorasi' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">Eksplorasi</a>
            <a href="{{ route('tentangRoute') }}"
                class="text-sm font-semibold leading-6 transition-all {{ $type == 'tentang' ? 'text-sky-500 hover:text-sky-500' : 'text-sky-950 hover:text-sky-500' }}">Tentang</a>
        </div>
        <div class="flex flex-1 justify-end gap-2">

            @if (!$isLogin)
                <a href="{{ route('registerRoute') }}"
                    class="rounded-md bg-sky-100 px-6 py-2 text-sm font-semibold text-sky-500 hover:bg-sky-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 hover:shadow-lg shadow-sky-400 transition-all">
                    Register
                </a>
                <a href="{{ route('loginRoute') }}"
                    class="rounded-md bg-sky-500 px-6 py-2 text-sm font-semibold text-white hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 hover:shadow-lg shadow-sky-400 transition-all">
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
