<x-layout.app bgcolor="bg-gray-900 h-[100vh]">

    @if (isset($title, $idColumn, $idValue))
        <livewire:song.search idColumn="{{$idColumn}}" idValue="{{$idValue}}"  title="{{$title}}" />
    @else
        <livewire:song.search />
    @endif
    <x-modal.primary title="Adicionar a Playlist" modalId="add::to::playlist">
        <div>
            Opa papai
        </div>
    </x-modal.primary>
    <livewire:like.update />
    <livewire:playlist.delete />

</x-layout.app>
