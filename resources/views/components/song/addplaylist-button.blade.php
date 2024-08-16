@props(['songId'])

<button x-on:click="$dispatch('open-modal', {modalId: 'add::to::playlist', playlistAddSongId: '{{ $songId }}' })"
    id="{{ $songId }}" class="mt-2 text-white hover:text-gray-900 focus:outline-none">
    <div class="flex items-center justify-center w-6 h-6">
        <svg id="add-icon-{{ $songId }}" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
        </svg>
    </div>
</button>
