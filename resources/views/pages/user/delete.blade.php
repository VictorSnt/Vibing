<x-layout.user>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- // --}}
        </x-slot>
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                <span class="text-red-500">Excluir Conta</span>
                <span class="text-blue-500">Vibing</span>!
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                Ao deletar sua conta perdera todos os dados e não 
                sera mais possivel recuperar caso mude de ideia
            </p>
        </div>
        <div class="flex items-center justify-center w-full m-auto">
            <livewire:user.delete />
        </div>        
    </x-authentication-card>
</x-layout.user>