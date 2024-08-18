@props(['artistId'])

<div x-data="{ 
    handleConfirm(event) {
        Swal.fire({
            title: 'Deletar Artista',
            text: 'Esta ação não pode ser desfeita!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete::artist::confirmed', { artistId: event.detail.artistId });
            }
        });
    }
}"
x-init="
    window.addEventListener('confirm:delete:artist:confirmed', handleConfirm);
">  
    <button 
        x-on:click="
            $dispatch('confirm:delete:artist:confirmed', { artistId: '{{ $artistId }}' })
        " 
        type="button" 
        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Excluir
    </button>
</div>
