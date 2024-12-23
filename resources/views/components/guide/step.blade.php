<div class="max-w-72 max-h-72 carousel-item rounded-lg overflow-hidden shadow-md
    {{ $isDark ? 'bg-sky-950' : 'bg-white' }}">
    <div class="flex flex-col justify-between gap-2 ">
        <div class="p-5 ">
            <span
                class="flex justify-center items-center w-10 h-10 font-semibold bg-sky-400/20 text-sky-500 text-lg rounded-full">
                {{ $id }}
            </span>
            <p class="mt-2 text-sm {{ $isDark ? 'text-white' : 'text-sky-950/80' }}">
                {{ $slot }}
            </p>
        </div>
        <img src="{{ asset("storage/assets/guide/$image") }}" class="-ml-4 w-full rounded-tr-2xl border-[1px] shadow-2xl 
            {{empty($image) ? 'hidden' : ''}}
            {{$isDark ? 'shadow-sky-400' : 'shadow-black/50'}}">
    </div>
</div>