<x-layout.app bgcolor="...">
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo.animated-mark />
        </x-slot>

        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('local.App-Greeting') }} <span class="text-blue-500">Vibing</span>!
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                {{ __('local.Sing-up-invite') }}
            </p>
        </div>
        <livewire:auth.login />
    </x-authentication-card>
</x-layout.app>
