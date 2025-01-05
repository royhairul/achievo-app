<div class="col-span-2 lg:col-span-1">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
    </label>
    <div>
        <input datepicker datepicker-autohide datepicker-format="dd-mm-yyyy" id="{{ $name }}" name="{{ $name }}"
            datepicker-min-date="{{ $minDate ?? '' }}" datepicker-max-date="{{ $maxDate ?? '' }}"
            value="{{ old($name) }}" type="text" autocomplete="{{ $name }}" placeholder="DD-MM-YYYY" class="block bg-white w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6
                                @error($name)
                                    ring-rose-600
                                @enderror">
    </div>
    @error($name)
        <p class="absolute text-xs text-rose-600">{{ $message }}</p>
    @enderror
</div>