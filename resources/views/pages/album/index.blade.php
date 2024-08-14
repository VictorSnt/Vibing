<x-layout.app>
    <livewire:album.show :artistId="$artistId" />

    <!-- Modal -->
    <x-modal.primary title="Criar Album" modalId="create::artist::album">
        <livewire:album.register />
    </x-modal.primary>

    <!-- Modal -->
    <x-modal.primary title="Atualizar Album" modalId="update::artist::album">
        <livewire:album.update />
    </x-modal.primary>


    <x-modal.primary title="Musica Album" modalId="album::create::song::modal">
        <livewire:song.register />
    </x-modal.primary>

    {{-- Componentes --}}
    <livewire:album.delete />
</x-layout.app>
