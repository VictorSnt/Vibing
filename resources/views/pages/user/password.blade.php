<x-layout.user>
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo.animated-mark />
        </x-slot>
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                Atualizar Senha <span class="text-blue-500">Vibing</span>!
            </h1>
        </div>
        <livewire:user.password />
    </x-authentication-card>
</x-layout.user>