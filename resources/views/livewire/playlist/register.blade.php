<div class="p-6 mx-auto space-y-4 bg-white shadow-md max-w-xl1 rounded-xl">
    <!-- Header -->
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            <span class="text-blue-500"> Criar nova Playlist </span>!
        </h1>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="store" class="space-y-4">
        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Nome
            </label>
            <input type="text" id="name" wire:model="name"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Digite o nome da Playlist" />
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Criar
            </button>
        </div>
    </form>
</div>
