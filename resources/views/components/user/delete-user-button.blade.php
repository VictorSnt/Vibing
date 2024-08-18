@props(['userId'])

<div x-data="{ 
    handleConfirm(event) {
         

        // Mostra o alerta de confirmação
        Swal.fire({
            title: 'Deletar Usuario',
            text: 'Esta ação não pode ser desfeita!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se confirmado, despacha o evento Livewire
                Livewire.dispatch('admin::delete::user::confirmed', { userId: event.detail.userId });
            }
        });
    }
}"
x-init="
    window.addEventListener('confirm:admin:delete:user:confirmed', handleConfirm);
">  
    <button 
        x-on:click="
            $dispatch('confirm:admin:delete:user:confirmed', { userId: '{{ $userId }}' })
        " 
        type="button" 
        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
        Desativar
    </button>
</div>