<form wire:submit.prevent="sendResetLink">

    <div class="block">
        <x-inputs.text-field 
            wire:model="passwordLinkForm.email"
            label="{{ __('auth.email') }}"
            fieldName="passwordLinkForm.email"
            fieldType="text"
        />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-inputs.button>
            {{ __('auth.email_password_reset_link') }}
        </x-inputs.button>
    </div>
</form>