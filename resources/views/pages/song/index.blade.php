<x-layout.app>

    <livewire:song.admin.show :albumId="$albumId"/>

    <!-- Modal -->
    <x-modal.primary title="Registrar Musica" modalId="create::song">
        <livewire:song.admin.register />
    </x-modal.primary>

    <x-modal.primary title="Atualizar Musica" modalId="update::song::modal">
        <livewire:song.admin.update />
    </x-modal.primary>
    {{-- Componentes --}}
    <livewire:song.admin.delete />

</x-layout.app>
