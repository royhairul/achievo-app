<!-- <div class="col-span-2 lg:col-span-1">
    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">
        Nama Lomba
    </label>
    <input id="nama" name="nama" type="text" autocomplete="nama" value="{{ old('nama') }}"
        placeholder="Masukkan Nama Lomba..." class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6 
                                @error('nama') ring-rose-600 @enderror">
    @error('nama')
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div> -->

<div class="col-span-2 lg:col-span-1">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
    </label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type ?? 'text' }}" autocomplete="{{ $autocomplete ?? $name }}"
        value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder }}" class="block w-full rounded-md border-0 py-1.5 px-3 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6 
            @error($name) ring-rose-600 @enderror">
    @error($name)
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div>