<div class="min-h-screen p-6 bg-gray-900">
    <div class="max-w-4xl mx-auto">
        <!-- Título da Página -->
        <div class="mb-6">
            @if(isset($title) && !empty($title))
                <h1 class="text-3xl font-bold text-white">{{ $title }}</h1>
            @else
                <h1 class="text-3xl font-bold text-white">Pesquisa de Músicas</h1>
            @endif
        </div>

        <!-- Input de pesquisa -->
        <div class="mb-6">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Pesquisar músicas..."
                class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Container para a lista de músicas com rolagem interna -->
        <div class="max-h-screen p-4 overflow-auto bg-gray-800 rounded-lg shadow-lg scroll-container" style="max-height: 60vh;">
            @forelse ($searchedSongs as $foundedSong)
                <div wire:key="{{ $foundedSong->id }}" class="p-4 mb-4 bg-gray-700 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <!-- Imagem do artista -->
                        @if ($foundedSong->artist->image)
                            <img
                                src="{{ asset('storage/' . $foundedSong->artist->image) }}"
                                alt="Imagem do Artista"
                                class="object-cover w-12 h-12 mr-4 rounded-full"
                            >
                        @else
                            <x-user-icon-svg class="w-12 h-12 mr-4 rounded-full" />
                        @endif

                        <!-- Informações da música -->
                        <div class="flex-1">
                            <div class="text-lg font-semibold text-white">{{ $foundedSong->title }}</div>
                            <div class="text-sm text-gray-300">{{ $foundedSong->artist->name }}</div>
                            <div class="mt-1 text-sm text-gray-500">
                                {{ number_format($foundedSong->duration / 60, 2) }} Minutos
                            </div>
                        </div>

                        <!-- Botão de curtir -->
                        <div class="ml-4">
                            <x-song.like-button title="{{ $foundedSong->title }}" songId="{{ $foundedSong->id }}" />
                        </div>
                    </div>
                </div>
            @empty
                @if ($search !== '')
                    <span class="text-gray-400">Nenhuma música encontrada para "{{ $search }}"</span>
                @endif
            @endforelse
        </div>
    </div>
</div>
