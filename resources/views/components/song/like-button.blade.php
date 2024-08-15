@props(['title', 'songId',])
<div>

    @php
        $liked = Auth::user()->likedSongs()->where('song_id', $songId)->exists();
    @endphp

    <button id="like-button-{{ $title }}-{{ $songId }}"
        class="mt-4 text-red-500 hover:text-red-500 focus:outline-none {{ $liked ? 'underline' : '' }}"
        onclick="toggleLike('{{ $title }}', {{ $songId }})">
        <div class="flex items-center">
            <svg id="like-icon-{{ $title }}-{{ $songId }}" xmlns="http://www.w3.org/2000/svg"
                fill="{{ $liked ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </div>
    </button>

    <script>
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
    </script>
</div>
