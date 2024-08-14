<x-layout.app>
    <livewire:user.admin.show />
    <x-modal.primary title="Registrar usuario" modalId="register::user::modal">
        <div class="w-1/2 p-6 m-auto bg-white rounded-lg shadow-lg">
            <livewire:user.register />
        </div>    
    </x-modal.primary>
    <x-modal.primary title="Registrar usuario" modalId="update::user::modal">
        <div class="w-1/2 p-6 m-auto bg-white rounded-lg shadow-lg">
            <livewire:user.update />
        </div>    
    </x-modal.primary>
</x-layout.app>
