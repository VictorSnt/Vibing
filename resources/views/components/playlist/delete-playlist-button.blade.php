@props(['playlistId'])

<div x-data="{ 
    handleConfirm(event) {
        Swal.fire({
            title: 'Deletar Playlist',
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
                Livewire.dispatch('delete::playlist::confirmed', { playlistId: event.detail.playlistId });
            }
        });
    }
}"
x-init="
    window.addEventListener('confirm:delete:playlist:confirmed', handleConfirm);
">  
    <button 
        x-on:click="
            $dispatch('confirm:delete:playlist:confirmed', { playlistId: '{{ $playlistId }}' })
        " 
        type="button" 
        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Excluir
    </button>

</div>
