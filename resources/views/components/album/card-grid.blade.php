<div class="grid grid-cols-1 gap-4 ml-4 md:grid-cols-2 lg:grid-cols-4">
    <!-- Row 1 -->
    <div class="flex flex-wrap gap-4">
        @foreach ($albums as $index => $album)
            @if ($index < 2)
                <div
                    class="relative flex-shrink-0 w-full px-4 py-4 text-white transition-transform duration-300 ease-in-out transform shadow-lg sm:w-1/2 lg:w-1/4 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl hover:scale-105 hover:z-10 hover:shadow-2xl"
                    style="min-width: 25vw;">
                    <h2 class="mb-2 text-xl font-bold">{{ $album->name }}</h2>
                    <div class="flex items-center space-x-4">
                        @if ($album->artist->image)
                            <img src="{{ asset('storage/' . $album->artist->image) }}"
                                class="object-cover w-24 h-24 rounded-full">
                        @else
                            <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11.5a3.5 3.5 0 10-7 0 3.5 3.5 0 007 0zM12 14.5a5.5 5.5 0 00-5.5 5.5h11A5.5 5.5 0 0012 14.5z"></path>
                            </svg>
                        @endif
                        <div>
                            <p class="text-lg font-semibold">{{ $album->artist->name }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Row 2 -->
    <div class="flex flex-wrap gap-4">
        @foreach ($albums as $index => $album)
            @if ($index >= 2)
                <div
                    class="relative flex-shrink-0 w-full px-4 py-4 text-white transition-transform duration-300 ease-in-out transform shadow-lg sm:w-1/2 lg:w-1/4 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl hover:scale-105 hover:z-10 hover:shadow-2xl"
                    style="min-width: 25vw;">
                    <h2 class="mb-2 text-xl font-bold">{{ $album->name }}</h2>
                    <div class="flex items-center space-x-4">
                        @if ($album->artist->image)
                            <img src="{{ asset('storage/' . $album->artist->image) }}"
                                class="object-cover w-24 h-24 rounded-full">
                        @else
                            <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11.5a3.5 3.5 0 10-7 0 3.5 3.5 0 007 0zM12 14.5a5.5 5.5 0 00-5.5 5.5h11A5.5 5.5 0 0012 14.5z"></path>
                            </svg>
                        @endif
                        <div>
                            <p class="text-lg font-semibold">{{ $album->artist->name }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
