<main class="w-full min-h-[90vh] align-middle overflow-hidden">
    <div class="object-center w-3/4 m-auto rounded-lg h-[80vh] mt-8">
        <label for="songs-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-1/2 m-auto">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:key="search" wire:model.live.debounce.500ms="search" type="search" id="songs-search"
                class="block w-full p-4 my-2 text-sm text-gray-900 border rounded-lg border-slate-600 ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                @if (isset($album))
                    placeholder="Pesquisar Musica no Album {{ $album->name }}"
                    @else
                placeholder="Pesquisar Musicas"
                @endif
                
            /> 
        </div>

        <div class="flex flex-col h-3/4">
            <!-- Tabela -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded shadow-md">
                    <thead class="text-white bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Musica</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Album</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Cantor</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Duração</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Editar</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Excluir</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($songs as $song)
                            <tr wire:key="{{ $song->id . $song->created_at }}">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $song->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $song->album->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $song->artist->name }}</span>
                                        @if ($song->artist->image)
                                            <x-artist.icon :link="$song->artist->image" />
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ number_format($song->duration / 60, 2) }} Minutos
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        x-on:click="$dispatch('open-modal', {modalId: 'update::song::modal', songId: '{{ $song->id }}' })"
                                        class="text-white bg-slate-500 hover:bg-slate-700 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800">
                                        Editar
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-song.delete-song-button songId="{{ $song->id }}" />
                                </td>
                            </tr>
                        @empty 
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Nenhuma musica do album @if (isset($album)) {{ $album->name }} @endif encontrada.
                                </td>
                            </tr>   
                        @endforelse
                    </tbody>
                </table>

                <!-- Botão Nova Musica -->
                <div class="flex items-center justify-between mt-4">
                    <button x-on:click="$dispatch('open-modal', {modalId: 'create::song' @if (isset($album)), albumId: '{{ $albumId }}'@endif  })" type="button"
                        class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        @if (isset($album))
                        + Musica no album {{$album->name}}
                        @else
                        + Nova Musica
                        @endif
                    </button>
                </div>

            </div>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $songs->links('vendor.pagination.app-pagination') }}
        </div>
    </div>
</main>
