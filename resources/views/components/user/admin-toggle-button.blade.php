@props(['userId', 'is_admin'])

<div x-data="{
    isChecked: {{ $is_admin }},
    handleConfirm(event) {
        Swal.fire({
            title: 'Mudar Permissões do usuario?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se confirmado, despacha o evento Livewire
                Livewire.dispatch('admin::toggle::confirmed', { userId: event.detail.userId });
            } else {
                // Reverte o estado do checkbox para checado
                this.isChecked = true;
            }
        });
    }
}" x-init="window.addEventListener('confirm:admin:toggle:confirmed', handleConfirm);">

    <div class="flex items-center">
        <input type="checkbox" x-model="isChecked"
            x-on:click.prevent="$dispatch('confirm:admin:toggle:confirmed', { userId: '{{ $userId }}' });"
            :checked="isChecked"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            id="adminCheckbox">
        <label for="adminCheckbox" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">
            admin
        </label>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>
