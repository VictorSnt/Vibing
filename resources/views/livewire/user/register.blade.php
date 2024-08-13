<form wire:submit.prevent="store">

    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="registerForm.name"
            label="{{ __('local.Name') }}"
            fieldName="registerForm.name"
            fieldType="text"
        />
    </div>

    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="registerForm.email"
            label="{{ __('local.Email') }}"
            fieldName="registerForm.email"
            fieldType="text"
        />
    </div>

    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="registerForm.password"
            label="{{ __('local.Password') }}"
            fieldName="registerForm.password"
            fieldType="password"
        />
    </div>

    <div class="mb-4">
        <x-inputs.text-field 
            wire:model="registerForm.password_confirmation"
            label="{{ __('local.Confirm-Password') }}"
            fieldName="registerForm.password_confirmation"
            fieldType="password"
        />
    </div>
            
    <div class="flex items-center justify-end mt-4">
        @guest
        <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
                href="{{ route('login') }}"
                wire:navigate
        >
            {{ __('local.Registered?') }}
        </a>
        @endguest
        <x-inputs.button class="ms-4">
            {{ __('local.Register') }}
        </x-inputs.button>
    </div>
</form>