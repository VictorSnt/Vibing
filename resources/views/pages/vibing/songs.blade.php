<x-layout.app bgcolor="bg-gray-900 h-[100vh]">

    @if (isset($songs, $title) && $songs)
        <livewire:song.search :songs="$songs" :title="$title" />
    @else
        <livewire:song.search />
    @endif
    <livewire:like.update />
</x-layout.app>
