<ol class="flex items-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
    <li
        class="flex md:w-full items-center {{ $type == 1 ? 'text-sky-600' : '' }}  sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span
            class="flex rounded items-center {{ $type == 1 ? 'bg-sky-100' : '' }} p-2 after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <span class="flex me-2">1</span>
            Infomasi <span class="hidden sm:inline-flex sm:ms-2">Lomba</span>
        </span>
    </li>
    <li class="flex md:w-full items-center {{ $type == 2 ? 'text-sky-600' : '' }} ">
        <span class="flex rounded items-center {{ $type == 2 ? 'bg-sky-100' : '' }} p-2">
            <span class="me-2">2</span>
            Formulir <span class="hidden sm:inline-flex sm:ms-2">Lomba</span>
        </span>
    </li>
</ol>
