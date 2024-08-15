<div>
    <div class="justify-around ml-4">
        <h1 class="text-4xl font-semibold text-white dark:text-white">{{ $title }}</h1>
    </div>
    <div class="flex items-center justify-center p-4">
        <div class="relative w-full max-w-full">
            <div class="relative flex overflow-hidden snap-x snap-mandatory" id="song-carousel-{{ $title }}">
                @foreach ($songs as $song)
                    <div wire:key="song-{{ $title }}-{{ $song->id }}"
                        class="flex-shrink-0 px-6 py-4 mx-4 text-white transition-transform duration-300 ease-in-out transform min-w-[80%] md:min-w-[45%] lg:min-w-[30%] bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl snap-start hover:scale-105">
                        <div class="flex items-center mb-4">
                            <!-- Image and Song Details -->
                            @if ($song->artist->image)
                                <img src="{{ asset('storage/' . $song->artist->image) }}"
                                    class="object-cover w-24 h-24 rounded-full">
                            @else
                                <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11.5a3.5 3.5 0 10-7 0 3.5 3.5 0 007 0zM12 14.5a5.5 5.5 0 00-5.5 5.5h11A5.5 5.5 0 0012 14.5z">
                                    </path>
                                </svg>
                            @endif
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold">{{ $song->title }}</h3>
                                <p class="text-sm">Artista: {{ $song->artist->name }}</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-300">Álbum: {{ $song->album->name }}</p>
                        <p class="text-sm text-gray-300">Duração: {{ number_format($song->duration / 60, 2) }} minutos
                        </p>

                        <button id="like-button-{{ $title }}-{{ $song->id }}"
                            class="mt-4 text-red-500 hover:text-red-500 focus:outline-none {{ $song->likes->where('user_id', Auth::user()->id)->count() ? 'underline' : '' }}"
                            onclick="toggleLike('{{ $title }}', {{ $song->id }})">
                            <div class="flex items-center">
                                <svg id="like-icon-{{ $title }}-{{ $song->id }}"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="{{ $song->likes->where('user_id', Auth::user()->id)->count() ? 'currentColor' : 'none' }}"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </div>
                        </button>

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

            prevBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: -carousel.offsetWidth * 0.8, // Scroll by 80% of the carousel width
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: carousel.offsetWidth * 0.8, // Scroll by 80% of the carousel width
                    behavior: 'smooth'
                });
            });
        }

        function toggleLike(title, songId) {
            const icon = document.getElementById(`like-icon-${title}-${songId}`);
            if (!icon) {
                console.error(`Icon with id "like-icon-${title}-${songId}" not found`);
                return;
            }
            const isLiked = icon.getAttribute('fill') === 'currentColor';
            icon.setAttribute('fill', isLiked ? 'none' : 'currentColor');
            Livewire.dispatch('song::liked', {
                songId: songId
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
