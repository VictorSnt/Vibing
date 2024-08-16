<div class="p-4">
    <main class="w-full p-6 overflow-auto bg-white border shadow-xl">
        <div class="flex flex-col w-full h-full mt-8 rounded-lg">
            <label for="playlist-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative mb-6">
                <input type="text" wire:model.live.debounce.500ms="search" placeholder="Pesquisar playlists..."
                    class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col flex-grow">
                <!-- Tabela -->
                <div class="flex-grow overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 rounded shadow-md">
                        <thead class="text-white bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                    Playlist
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                    Adicionar
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($playlists as $playlist)
                                <tr wire:key="{{ $playlist->id . $playlist->created_at }}">
                                    <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $playlist->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <button wire:click="pushToPlaylist({{ $playlist->id }})" type="button"
                                                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                Adicionar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">Nenhuma playlist encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Botão Novo Album -->
                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('playlist-index') }}"
                            class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            + Nova Playlist
                        </a>
                    </div>
                </div>
            </div>
            <span class="font-medium">Total de playlists {{$playlistcount}}</span>
            
        </div>
    </main>
</div>