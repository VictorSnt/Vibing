<div class="grid grid-cols-1 gap-4 ml-4 md:grid-cols-2 lg:grid-cols-4">
    <!-- Row 1 -->
    <div class="flex flex-wrap gap-4">
        @foreach ($albums as $index => $album)
            @if ($index < 2)
            <a href="{{ route('album-song-index', ['albumId' => $album->id]) }}">
                    <div class="relative flex-shrink-0 w-full px-4 py-4 text-white transition-transform duration-300 ease-in-out transform shadow-lg sm:w-1/2 lg:w-1/4 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl hover:scale-105 hover:z-10 hover:shadow-2xl"
                        style="min-width: 25vw;">
                        <h2 class="mb-2 text-xl font-bold">{{ $album->name }}</h2>
                        <div class="flex items-center space-x-4">
                            @if ($album->artist->image)
                                <img src="{{ asset('storage/' . $album->artist->image) }}"
                                    class="object-cover w-24 h-24 rounded-full">
                            @else
                                <x-user-icon-svg />
                            @endif
                            <div>
                                <p class="text-lg font-semibold">{{ $album->artist->name }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>

    <!-- Row 2 -->
    <div class="flex flex-wrap gap-4">
        @foreach ($albums as $index => $album)
            @if ($index >= 2)
                <a href="{{ route('album-song-index', ['albumId' => $album->id]) }}">
                    <div class="relative flex-shrink-0 w-full px-4 py-4 text-white transition-transform duration-300 ease-in-out transform shadow-lg sm:w-1/2 lg:w-1/4 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-2xl hover:scale-105 hover:z-10 hover:shadow-2xl"
                        style="min-width: 25vw;">
                        <h2 class="mb-2 text-xl font-bold">{{ $album->name }}</h2>
                        <div class="flex items-center space-x-4">
                            @if ($album->artist->image)
                                <img src="{{ asset('storage/' . $album->artist->image) }}"
                                    class="object-cover w-24 h-24 rounded-full">
                            @else
                                <x-user-icon-svg />
                            @endif
                            <div>
                                <p class="text-lg font-semibold">{{ $album->artist->name }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
