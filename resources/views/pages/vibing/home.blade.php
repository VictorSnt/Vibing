<x-layout.app bgcolor="bg-gray-900 h-[100vh]">

    <div class="items-center block max-w-2xl m-auto text-center text-white">
        <x-logo.animated-mark />
        <h1 class="text-4xl font-semibold text-white dark:text-white">Bem vindo ao <span class="text-blue-500">Vibing</span></h1>
    </div>

    <div class="justify-around mt-4 ml-4">
        <h1 class="text-4xl font-semibold text-white dark:text-white">Sugestões de Albums</h1>
    </div>
    <div class="flex items-center max-w-2xl my-10">
        <x-album.card-grid />
    </div>

    <!-- Carousel Section -->
    <div class="carousels-container">
        <div class="carousel-wrapper">
            <livewire:song.carrousel  title="Sugestões de Musicas" />
        </div>  
    </div>

    <x-modal.primary title="Adicionar a Playlist" modalId="add::to::playlist">
        <livewire:playlist.add-song />
    </x-modal.primary>
    
    <livewire:like.update />
</x-layout.app>
