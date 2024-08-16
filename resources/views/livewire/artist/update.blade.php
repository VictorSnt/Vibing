<div class="flex flex-col items-center justify-center p-6">
    <!-- Logo Slot -->
    <div class="flex justify-center w-full mb-6">
        <x-logo.animated-mark />
    </div>

    <!-- Title -->
    <div class="w-full mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            Atualizar artista<span class="text-blue-500"> {{ $name }} </span>
        </h1>
    </div>

    <!-- Registration Form -->
    <div class="w-full max-w-md">
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="mb-4">
                <x-inputs.text-field wire:model="name" label="{{ __('local.Name') }}" fieldName="name"
                    fieldType="text" />
            </div>

            @if ($currentImagePath)
                <div class="flex items-center space-x-4">
                    <div>
                        <x-artist.icon :link="$currentImagePath" />
                    </div>
                    <div class="flex-shrink-0">
                        <button wire:click="confirm_removeImage" type="button"
                            class="text-white bg-gradient-to-r 
                                from-red-400 via-red-500 
                                to-red-600 hover:bg-gradient-to-br 
                                focus:ring-4 focus:outline-none 
                                focus:ring-red-300 dark:focus:ring-red-800 
                                font-medium rounded-2xl text-xs px-3 py-1.5 text-center ">
                            Remover imagem
                        </button>
                    </div>
                </div>
            @endif
            <div class="flex items-center m-6 space-x-4">
                <x-inputs.file-upload wire:model="image" label="{{ __('Imagem') }}" fieldName="{{ rand() }}" class="flex-shrink-0"/>
                <button type="submit" class="text-white mt-auto bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-700 dark:border-green-700">
                    {{ __('local.Save') }}
                </button>
            </div>

            
            <div wire:loading>
                <span class="text-green-200"></span>
            </div>
        </form>
    </div>
</div>
