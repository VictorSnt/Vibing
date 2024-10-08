<x-layout.app bgcolor="bg-gray-900 h-[100vh]">

    <livewire:playlist.show />

    
    <x-modal.primary title="Criar nova Playlist" modalId="create::user::playlist">
        <livewire:playlist.register />
    </x-modal.primary>

    <x-modal.primary title="Criar nova Playlist" modalId="update::user::playlist">
        <livewire:playlist.update />
    </x-modal.primary>
    
    <livewire:playlist.delete />
</x-layout.app>
