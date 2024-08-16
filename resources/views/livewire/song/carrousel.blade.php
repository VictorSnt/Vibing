<div>
    <div class="justify-around ml-4">
        <h1 class="text-4xl font-semibold text-white dark:text-white">{{ $title }}</h1>
    </div>
    <div class="flex items-center justify-center p-4">
        <div class="relative w-full max-w-full">
            <div class="relative flex overflow-hidden snap-x snap-mandatory" id="song-carousel-{{ $title }}">
                @foreach ($songs as $song)
                    
                    <div wire:key="song-{{ $title }}-{{ $song->id }}"
                        class="carousel-item flex-shrink-0 px-6 py-4 mx-4 text-white transition-transform duration-300 ease-in-out transform min-w-[80%] md:min-w-[45%] lg:min-w-[30%] bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl snap-start hover:scale-105">
                        <div class="flex items-center mb-4">
                            
                            @if ($song->artist->image)
                                <x-artist.icon :link="$song->artist->image" />
                            @else
                                <x-user-icon-svg />
                            @endif
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold">{{ $song->title }}</h3>
                                <a href="{{ route('artist-song-index', ['artistId' => $song->artist->id]) }}">
                                    <p class="text-sm transition-colors duration-300 hover:text-white hover:underline">
                                        Artista: {{ $song->artist->name }}
                                    </p>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('album-song-index', ['albumId' => $song->album->id]) }}"
                            class="block text-sm text-gray-300 transition-colors duration-300 hover:text-white hover:underline">
                            <p class="m-0">Álbum: {{ $song->album->name }}</p>
                        </a>

                        <p class="text-sm text-gray-300">Duração: {{ number_format($song->duration / 60, 2) }} minutos
                        </p>

                        <div class="flex items-center m-0">
                            <!-- Botão de Curtir -->
                            <x-song.like-button title="{{ $title }}" songId="{{ $song->id }}" />

                            <!-- Botão de Adicionar à Playlist -->
                            <x-song.addplaylist-button songId="{{ $song->id }}" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="absolute left-0 transform -translate-y-1/2 top-1/2">
                <button id="prevBtn-{{ $title }}"
                    class="p-2 text-white bg-gray-700 rounded-full hover:bg-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
            <div class="absolute right-0 transform -translate-y-1/2 top-1/2">
                <button id="nextBtn-{{ $title }}"
                    class="p-2 text-white bg-gray-700 rounded-full hover:bg-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <script>
        function initializeCarousel(title) {
            const carousel = document.getElementById(`song-carousel-${title}`);
            const prevBtn = document.getElementById(`prevBtn-${title}`);
            const nextBtn = document.getElementById(`nextBtn-${title}`);

            if (!carousel || !prevBtn || !nextBtn) {
                console.error(`Carousel or buttons not found for title: ${title}`);
                return;
            }

            function calculateScrollOffset() {
                const carouselItem = carousel.querySelector('.carousel-item');
                if (!carouselItem) return 0;

                const carouselItemWidth = carouselItem.offsetWidth;
                const carouselWidth = carousel.offsetWidth;
                const itemsVisible = Math.floor(carouselWidth / carouselItemWidth);
                return carouselItemWidth * itemsVisible;
            }

            let isScrolling = false;

            function smoothScrollBy(distance) {
                if (isScrolling) return;

                isScrolling = true;

                const start = carousel.scrollLeft;
                const end = start + distance;
                const duration = 500; 
                let startTime = null;

                function step(timestamp) {
                    if (!startTime) startTime = timestamp;
                    const progress = Math.min((timestamp - startTime) / duration, 1);
                    const easing = progress < 0.5 ? 2 * progress * progress : -1 + (4 - 2 * progress) * progress;
                    carousel.scrollLeft = start + (end - start) * easing;

                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        isScrolling = false; 
                    }
                }

                window.requestAnimationFrame(step);
            }

            prevBtn.addEventListener('click', () => {
                smoothScrollBy(-calculateScrollOffset());
            });

            nextBtn.addEventListener('click', () => {
                smoothScrollBy(calculateScrollOffset());
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const carousels = document.querySelectorAll('.relative.flex.overflow-hidden.snap-x.snap-mandatory');
            carousels.forEach(carousel => {
                const title = carousel.id.split('-').pop();
                initializeCarousel(title);
            });
        });
    </script>

    <style>
        /* Carousel container styling */
        .relative.flex.overflow-hidden.snap-x.snap-mandatory {
            scroll-behavior: smooth;
            overflow-x: auto;
            display: flex;
            scrollbar-width: none;
        }

        .relative.flex.overflow-hidden.snap-x.snap-mandatory::-webkit-scrollbar {
            display: none;
        }

        /* Navigation button styling */
        #prevBtn-{{ $title }},
        #nextBtn-{{ $title }} {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }

        #prevBtn-{{ $title }} {
            left: 10px;
        }

        #nextBtn-{{ $title }} {
            right: 10px;
        }
    </style>
</div>
