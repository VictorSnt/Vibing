@props(['label', 'fieldName'])

<div>
    <label for="{{ $fieldName }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="flex items-center mt-1">
        <label for="{{ $fieldName }}" class="px-4 py-2 font-medium text-white bg-black rounded-md shadow-sm cursor-pointer hover:bg-slate-700 focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
            Escolher arquivo
        </label>
        <input 
            type="file" 
            id="{{ $fieldName }}" 
            name="{{ $fieldName }}" 
            class="hidden" 
            {{ $attributes }}

        />
    </div>
    @error($fieldName) 
        <span class="text-sm text-red-600">{{ $message }}</span> 
    @enderror
</div>
