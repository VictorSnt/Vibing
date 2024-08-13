@props(['albums'])

<div class="flex flex-col p-4 h-3/4">
    <!-- Tabela -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 rounded-lg shadow-md">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Álbum</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Cantor</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Adicionar Músicas</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Excluir Álbum</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($albums as $album)
                    <tr>
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
                            <button type="button" 
                                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Adicionar Músicas
                            </button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-album.delete-album-button albumId="{{ $album->id }}" />
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
</div>
