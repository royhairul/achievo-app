<!-- <div class="col-span-2 lg:col-span-1">
    <label for="desc" class="block text-sm font-medium text-gray-900">
        Deskripsi
    </label>
    <textarea id="desc" name="desc" autocomplete="desc" cols="30" rows="5"
        placeholder="Masukkan deskripsi lomba serta benefitnya..." class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6 
                                    @error('desc') ring-rose-600 @enderror">{{ old('desc') }}</textarea>
    @error('desc')
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div> -->

<div class="col-span-2 lg:col-span-1">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-900">
        {{ $label }}
    </label>
    <textarea id="{{ $name }}" name="{{ $name }}" autocomplete="{{ $name }}" cols="30" rows="5"
        placeholder="{{ $placeholder }}" class="w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6 
        @error($name) ring-rose-600 @enderror">{{ old($name, $value ?? '') }}</textarea>
    @error($name)
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div>