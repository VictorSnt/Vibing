<form wire:submit.prevent="savePassword">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('local.Reset-Password') }} <span class="text-blue-500">Vibing</span>!
        </h1>
        <p class="mt-2 text-gray-600 dark:text-gray-400 text-lg">
            {{ __('local.Ask-Creds') }}
        </p>
    </div>
    <x-inputs.text-field 
        label="Senha" 
        fieldType="password" 
        fieldName="passwordResetForm.password" 
        wire:model="passwordResetForm.password" 
    />
    <x-inputs.text-field 
        fieldType="password"
        label="Confirmar senha"
        fieldName="passwordResetForm.password_confirmation" 
        wire:model="passwordResetForm.password_confirmation"
    />
    <x-inputs.button>{{ __('local.Reset-Password') }}</x-inputs.button>
</form>