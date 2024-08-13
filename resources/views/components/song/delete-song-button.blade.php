@props(['songId'])

<div x-data="{ 
    handleConfirm(event) {
        console.log('Evento recebido:', event.detail.songId);

        // Mostra o alerta de confirmação
        Swal.fire({
            title: 'Deletar Musica',
            text: 'Esta ação não pode ser desfeita!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se confirmado, despacha o evento Livewire
                Livewire.dispatch('delete::song::confirmed', { songId: event.detail.songId });
            }
        });
    }
}"
x-init="
    window.addEventListener('confirm:delete:song:confirmed', handleConfirm);
">  
    <button 
        x-on:click="
            $dispatch('confirm:delete:song:confirmed', { songId: '{{ $songId }}' })
        " 
        type="button" 
        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Excluir
    </button>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>