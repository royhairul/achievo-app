<nav class="flex my-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach ($items as $key => $item)
            <li @if ($loop->last) aria-current="page" @endif>
                <div class="flex items-center">
                    @if (!$loop->first)
                        <span class="material-symbols-rounded">
                            chevron_right
                        </span>
                    @endif
                    @if ($loop->first)
                        <a href="{{ $item['url'] }}"
                            class="flex gap-2 justify-center items-center text-sm font-medium text-gray-700 hover:text-sky-500">
                            <!-- Logo/Icon -->
                            <span class="material-symbols-rounded text-xl" style="font-variation-settings:'FILL' 1;">
                                home
                            </span>
                            <p class="hidden md:block">
                                {{$item['label']}}
                            </p>
                        </a>
                    @elseif ($loop->last)
                        <span
                            class="ms-1 text-sm font-semibold text-sky-500 md:ms-2 dark:text-gray-400">{{ $item['label'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-sky-650">
                            {{$item['label']}}
                        </a>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>