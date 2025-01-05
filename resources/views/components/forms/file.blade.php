<!-- <div>
    <label for="poster-lomba" class="block text-sm font-medium text-gray-900">
        Upload File
    </label>
    <input id="poster-lomba" name="poster-lomba" type="file" value="{{ old('poster-lomba') }}"
        class="block w-full text-sm text-sky-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none">
    @error('poster-lomba')
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div> -->

<div class="col-span-2 lg:col-span-1">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-900">
        {{ $label }}
    </label>
    <input id="{{ $name }}" name="{{ $name }}" type="file" value="{{ old($name, $value ?? '') }}" class="block w-full text-sm text-sky-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none
        @error($name) ring-rose-600 @enderror">
    @error($name)
        <p class=" absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div>