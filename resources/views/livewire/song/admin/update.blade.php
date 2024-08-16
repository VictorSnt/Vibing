<div class="p-6 mx-auto space-y-4 bg-white shadow-md max-w-xl1 rounded-xl">
    @if ($song)
        <!-- Header -->
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">

                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Atualizar <span class="text-blue-500">{{ $song->title }}</span> do Álbum <span class="text-blue-500">{{ $song->album->name }}</span>!
                </h1>
            </h2>
        </div>


        <!-- Formulário -->
        <form wire:submit.prevent="update" class="max-w-lg p-4 mx-auto space-y-6 bg-white rounded-md shadow-md">
            <!-- Campo Título -->
            <div>
                <label for="Songname" class="block text-sm font-medium text-gray-700">
                    Título da Música
                </label>
                <input type="text" id="Songname" wire:model="title"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="{{ $song->title }}" />
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Duração -->
            <div>
                <label for="Songduration" class="block text-sm font-medium text-gray-700">
                    Duração (segundos)
                </label>
                <input type="number" id="Songduration" wire:model="duration"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Duração em segundos" />
                @error('duration')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Envio -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-white bg-indigo-600 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Salvar
                </button>
            </div>
        </form>

    @endif
</div>
