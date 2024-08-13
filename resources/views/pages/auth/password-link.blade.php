<x-layout.app>
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo.animated-mark />
        </x-slot>

        <div class="text-center mb-6">

            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                <span class="text-blue-500">Vibing</span>!
            </h1>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                <span>{{ __('local.Forgot-your-password?') }}</span>
            </h1>
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.forgot_password.description') }}
            </div>
        </div>
        <livewire:auth.reset-password-link/>
    </x-authentication-card>
</x-layout.app>
