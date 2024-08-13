<div class="flex flex-col items-center justify-center p-6">
    <!-- Logo Slot -->
    <div class="flex justify-center w-full mb-6">
        <x-logo.animated-mark />
    </div>

    <!-- Title -->
    <div class="w-full mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            Cadastrar novo <span class="text-blue-500">Artista</span>
        </h1>
    </div>

    <!-- Registration Form -->
    <div class="w-full max-w-md">
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="mb-4">
                <x-inputs.text-field wire:model="name" label="{{ __('local.Name') }}" fieldName="name"
                    fieldType="text" />
            </div>

            <div class="mb-4">
                <x-inputs.file-upload wire:model="image" label="{{ __('Imagem') }}" fieldName="image" />
            </div>

            <x-inputs.button class="ms-8">
                {{ __('local.Save') }}
            </x-inputs.button>
        </form>
    </div>
</div>
