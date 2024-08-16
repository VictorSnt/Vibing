<div class="p-6 mx-auto space-y-4 bg-white shadow-md max-w-xl1 rounded-xl">
    <!-- Header -->
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800">
            @if ($artist && $artist->albums()->find($album_id))
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Adicionar Música ao Álbum <span class="text-blue-500">{{ $artist->albums()->find($album_id)->name }}</span>!
                </h1>
            @else
                Buscar Álbum de origem da música

                <div class="p-6">
                    <h3 class="mb-4 text-lg font-semibold">Faça a busca do álbum</h3>

                    <!-- Campo de Pesquisa -->
                    <div class="relative mb-6">
                        <input wire:model.live.debounce.300ms="search" type="text" id="artist-search"
                            class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Pesquisar álbuns" />
                    </div>
                    @if ($search)
                        <!-- Tabela de Álbuns -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 rounded-lg shadow-sm">
                                <thead class="text-white bg-gray-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">Álbum</th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">Imagem</th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">Nome</th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left uppercase">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse (App\Models\Album::search($search)->paginate(2) as $album)
                                        <tr wire:key="{{ $album->id }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $album->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($album->artist->image)
                                                    <x-artist.icon :link="$album->artist->image" />
                                                @else
                                                    <x-user-icon-svg />
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                                {{ $album->artist->name }}
                                            </td>
                                            <td class="flex px-6 py-4 space-x-2 whitespace-nowrap">
                                                <button wire:click="setFields({{ $album->id }})" type="button"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                    Selecionar
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum álbum encontrado.</td>
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

    @if ($artist)
        <!-- Formulário -->
        <form wire:submit.prevent="store" class="max-w-lg p-4 mx-auto space-y-6 bg-white rounded-md shadow-md">
            <!-- Campo Título -->
            <div>
                <label for="Songname" class="block text-sm font-medium text-gray-700">
                    Título da Música
                </label>
                <input type="text" id="Songname" wire:model="title"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Digite o título da música" />
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
                    Criar Música
                </button>
            </div>
        </form>
        
        <!-- Botão de Troca de Álbum -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('admin-song-index') }}" wire:navigate
                class="px-4 py-2 text-white bg-red-600 rounded-md shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                Trocar Álbum
            </a>
        </div>
    @endif
</div>
