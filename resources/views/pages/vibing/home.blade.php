<x-layout.app>

    <div class="justify-around">
        <h1 class="text-4xl font-semibold text-white-900 dark:text-white">Sugestoes de Albums</h1>
    </div>
    <div class="flex items-center max-w-2xl my-10">
        <x-album.card-grid />
    </div>

    <!-- Carousel Section -->
    <div class="carousels-container">
        <div class="carousel-wrapper">
            <livewire:song.carrousel  title="Sugestões de Musicas" :songs="$songs" />
        </div>  
    </div>

</x-layout.app>
