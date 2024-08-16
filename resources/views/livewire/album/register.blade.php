<!-- resources/views/livewire/artist-form.blade.php -->

<div class="p-6 mx-auto space-y-4 bg-white shadow-md max-w-xl1 rounded-xl">
    <!-- Header -->
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800">
            @if (isset($artist))
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Criar novo album <span class="text-blue-500"> {{ $artist->name }} </span>!
                </h1>
            @else
                Adicionar Artista

                <div class="p-6">
                    <h3 class="mb-4 text-lg font-semibold">Faça a busca do cantor desejado</h3>

                    <!-- Campo de Pesquisa -->
                    <div class="relative mb-6">
                        <input wire:model.live.debounce.300ms="search" type="text" id="artist-search"
                            class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Pesquisar artistas" />
                    </div>
                    @if ($search)
                        <!-- Tabela de Artistas -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 rounded-lg shadow-sm">
                                <thead class="text-white bg-gray-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">
                                            Imagem</th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">
                                            Nome</th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">
                                            Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @forelse (App\Models\Artist::search($search)->paginate(2) as $artist)
                                        <tr wire:key="{{ $artist->id }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($artist->image)
                                                <x-artist.icon :link="$artist->image" />
                                                @else
                                                    <x-user-icon-svg />
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                                {{ $artist->name }}
                                            </td>
                                            <td class="flex px-6 py-4 space-x-2 whitespace-nowrap">
                                                <button wire:click="setFields({{ $artist->id }})" type="button"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                    Selecionar
                                                </button>
                                                <!-- Adicionar outros botões se necessário -->
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Nenhum
                                                artista encontrado.</td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            @endif
        </h2>
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
                placeholder="Digite o nome do Album" />
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
