<main class="w-full min-h-[90vh] align-middle overflow-hidden">
    <div class="object-center w-1/2 m-auto rounded-lg h-[80vh] mt-8">
        <label for="albums-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-1/2 m-auto">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:key="search" wire:model.live.debounce.500ms="search" type="search" id="albums-search"
                class="block w-full p-4 my-2 text-sm text-gray-900 border rounded-lg border-slate-600 ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pesquisar Albums" required />
        </div>

        <div class="flex flex-col h-3/4">
            <!-- Tabela -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded shadow-md">
                    <thead class="text-white bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Album</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Cantor</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Adicionar Musicas </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Atualizar Album </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Excluir Album</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($albums as $album)
                            <tr wire:key="{{ $album->id . $album->created_at }}">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $album->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $album->artist->name }}</span>
                                        @if ($album->artist->image)
                                            <img src="{{ asset('storage/' . $album->artist->image) }}"
                                                class="object-cover w-10 h-10 rounded-xl">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        x-on:click="$dispatch('open-modal', {modalId: 'album::create::song::modal', albumId: '{{ $album->id }}' })"
                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                        Adicionar Musicas
                                    </button>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        x-on:click="$dispatch('open-modal', {modalId: 'update::artist::album', albumId: '{{ $album->id }}' })"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Atualizar Album
                                    </button>
                                </td>



                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-album.delete-album-button albumId="{{ $album->id }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Botão Novo Album -->
                <div class="flex items-center justify-between mt-4">
                    <button x-on:click="$dispatch('open-modal', {modalId: 'create::artist::album' })" type="button"
                        class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        + Novo Album
                    </button>
                </div>

            </div>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $albums->links('vendor.pagination.app-pagination') }}
        </div>
    </div>
</main>
