<x-layout.app bgcolor="...">
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo.animated-mark />
        </x-slot>
        <div class="max-w-screen-sm mx-auto card">
            <livewire:auth.reset-password :$token :$email />
        </div>
    </x-authentication-card>
</x-layout.app>