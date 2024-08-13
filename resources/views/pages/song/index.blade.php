<x-layout.app>

    <livewire:song.show />

    <!-- Modal -->
    <x-modal.primary title="Registrar Musica" modalId="create::song">
        <livewire:song.register />
    </x-modal.primary>

    <x-modal.primary title="Atualizar Musica" modalId="update::song::modal">
        <livewire:song.update />
    </x-modal.primary>
    {{-- Componentes --}}
    <livewire:song.delete />

</x-layout.app>
