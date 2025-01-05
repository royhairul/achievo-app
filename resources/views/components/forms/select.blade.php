<!-- <div class="col-span-2 lg:col-span-1">
    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
        Kategori
    </label>
    <select id="category" name="category" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error('category') ring-rose-600 @enderror">
        <option value="" disabled selected>Pilih Kategori Lomba</option>
        <option value="Akademik" {{ old('category') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
        <option value="Non-Akademik" {{ old('category') == 'Non-Akademik' ? 'selected' : '' }}>
            Non-Akademik</option>
    </select>
    @error('category')
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div> -->

<div class="col-span-2 lg:col-span-1">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
    </label>
    <select id="{{ $name }}" name="{{ $name }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6 
            @error($name) ring-rose-600 @enderror">
        <option value="" disabled selected>{{ $placeholder }}</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>{{ $text }}</option>
        @endforeach
    </select>
    @error($name)
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div>