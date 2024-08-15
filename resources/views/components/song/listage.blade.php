<div class="items-center p-4 overflow-x-auto">
    <div class="flex text-center text-white">
        <h1 class="text-xl font-medium">{{$title}}</h1>
    </div>
    <div class="max-w-xl bg-white rounded-lg shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Musica</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Artista</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Imagem</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Duração</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($songs as $song)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $song->title }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $song->artist->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            @if ($song->artist->image)
                                <img src="{{ asset('storage/' . $song->artist->image) }}" alt="Imagem do Artista" class="object-cover w-12 h-12 rounded-full">
                            @else
                                <x-user-icon-svg />
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ number_format($song->duration / 60, 2) }} Minutos</td>
                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                            <x-song.like-button title="{{$song->title}}" songId="{{ $song->id }}" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>