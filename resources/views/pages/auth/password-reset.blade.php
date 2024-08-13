<x-layout.app>
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo.animated-mark />
        </x-slot>
        <div class="mx-auto max-w-screen-sm card">
            <livewire:auth.reset-password :$token :$email />
        </div>
    </x-authentication-card>
</x-layout.app>