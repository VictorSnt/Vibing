<!-- resources/views/livewire/artist-form.blade.php -->

<div class="p-6 mx-auto space-y-4 bg-white shadow-md max-w-xl1 rounded-xl">
    @if (isset($album))
    <!-- Header -->
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800">
            
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Atualizar album <span class="text-blue-500"> {{ $album->name }} </span>!
                </h1>
        </h2>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="update" class="space-y-4">
        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Nome
            </label>
            <input type="text" id="name" wire:model="name"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Digite o nome do Album" />
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Atualizar
            </button>
        </div>
    </form>
    @endif
</div>
