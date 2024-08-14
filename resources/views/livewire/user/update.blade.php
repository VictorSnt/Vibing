<x-authentication-card>
    <x-slot name="logo">
        <x-logo.animated-mark />
    </x-slot>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            Atualizar Perfil do
            <span class="text-blue-500">{{ explode(' ', $user->name)[0] }}</span>!
        </h1>
    </div>
    <form wire:submit.prevent="confirm_update">

        <div class="mb-4">
            <x-inputs.text-field wire:model="updateForm.name" label="{{ __('local.Name') }}" fieldName="updateForm.name"
                fieldType="text" />
        </div>

        <div class="mb-4">
            <x-inputs.text-field wire:model="updateForm.email" label="{{ __('local.Email') }}"
                placeholder="{{ $user->email }}" fieldName="updateForm.email" fieldType="text" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-inputs.button class="ms-4">
                {{ __('Atualizar') }}
            </x-inputs.button>
        </div>
    </form>
</x-authentication-card>
