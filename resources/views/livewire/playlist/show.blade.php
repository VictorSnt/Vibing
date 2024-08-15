<main class="w-full min-h-[90vh] align-middle overflow-hidden">
    <div class="object-center w-1/2 m-auto rounded-lg h-[80vh] mt-8">
        <label for="playlist-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-1/2 m-auto">
            <div class="mb-6">
                <input type="text" wire:model.live.debounce.500ms="search" placeholder="Pesquisar músicas..."
                    class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    @if (isset($song))
                    placeholder="Pesquisar playlist para {{ $song->title }}" 
                    @else
                    placeholder="Pesquisar playlist" 
                @endif
                    >
            </div>
            
        </div>

        <div class="flex flex-col h-3/4">
            <!-- Tabela -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded shadow-md">
                    <thead class="text-white bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Playlist
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Musicas
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Excluir Playlist
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($playlists as $playlist)
                            <tr wire:key="{{ $playlist->id . $playlist->created_at }}">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $playlist->name }}</td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center">
                                        <a href="{{ route('playlist-song-index',  ['playlistId' => $playlist->id]) }}"
                                            class="text-white bg-gradient-to-r from-purple-400 
                                                via-purple-500 to-purple-600 hover:bg-gradient-to-br 
                                                focus:ring-4 focus:outline-none focus:ring-purple-300 
                                                dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 
                                                py-2.5 text-center me-2 mb-2">                                            
                                            Musicas
                                        </a>
                                    </div>   
                                </td> 

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center">
                                        <x-playlist.delete-playlist-button playlistId="{{ $playlist->id }}" />
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Nenhuma playlist encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Botão Novo Album -->
                <div class="flex items-center justify-between mt-4">
                    <button x-on:click="$dispatch('open-modal', {modalId: 'create::user::playlist'})" type="button"
                        class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        + Nova Playlist
                    </button>
                </div>

            </div>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $playlists->links('vendor.pagination.app-pagination') }}
        </div>
    </div>
</main>
