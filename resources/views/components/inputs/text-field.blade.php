@props(['label', 'fieldName', 'fieldType', 'placeholder' => null])

<div class="mb-4">
    <label for="{{ $fieldName }}">{{ ucfirst($label) }}</label>
    <input 
        type="{{ $fieldType }}" 
        name="{{ $fieldName }}"
        @if($placeholder)
        placeholder="{{$placeholder}}"
        @endif
        class="input border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 px-3 py-2 w-full
        @error($fieldName) ring-offset-1 ring ring-red-500 @enderror"
        {{ $attributes }}
    >
    @error($fieldName)
        <p class="p-2 font-medium text-red-500">{{ $message }}</p>
    @enderror
</div>