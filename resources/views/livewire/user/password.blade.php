<form wire:submit.prevent="confirm_savePassword">

    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="passwordForm.currentPassword"
            label="{{ __('Senha Atual') }}"
            fieldName="passwordForm.currentPassword"
            fieldType="password"
        />
    </div>
    
    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="passwordForm.password"
            label="{{ __('Nova Senha') }}"
            fieldName="passwordForm.password"
            fieldType="password"
        />
    </div>

    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="passwordForm.password_confirmation"
            label="{{ __('Confirmar Nova Senha') }}"
            fieldName="passwordForm.password"
            fieldType="password"
        />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-inputs.button class="ms-4">
            {{ __('local.Confirm') }}
        </x-inputs.button>
    </div>
</form>