<x-layout.app>
    <livewire:artist.show />
    

    <!-- Modals -->
    <x-modal.primary title="Registrar artista" modalId="register::artist::modal">
        <livewire:artist.register />
    </x-modal.primary>

    <x-modal.primary title="Criar Album" modalId="create::artist::album::modal">
        <livewire:album.register />
    </x-modal.primary>
    
    <x-modal.primary title="Editar Artista" modalId="update::artist::modal">
        <livewire:artist.update />
    </x-modal.primary>

    <!-- Components -->
    <livewire:artist.delete />
    
</x-layout.app>
