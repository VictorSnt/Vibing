@props(['title', 'modalId'])

<div
    x-data="{ show: false, modalId: '{{ $modalId }}' }"
    x-show="show"
    @open-modal.window="show = ($event.detail.modalId === modalId)"
    @close-modal.window="show = false"
    @keydown.window.escape="show = false"
    class="fixed inset-0 z-50 flex items-center justify-center"
    style="display: none;"
>
    <!-- Overlay -->
    <div
        x-show="show"
        @click="show = false"
        class="fixed inset-0 w-full h-full transition-opacity bg-opacity-50 bg-slate-300"
    ></div>
    
    <!-- Modal -->
    <div
        x-show="show"
        @click.stop
        class="relative w-[70vw] h-[70vh] p-6 bg-white bg-opacity-95 rounded-lg shadow-lg dark:bg-gray-400 dark:bg-opacity-90"
    >
        <!-- Modal content -->
        <div class="flex flex-col h-full">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $title ?? 'Modal Title' }}
                </h3>
                <button
                    type="button"
                    @click="show = false"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex items-center justify-center flex-1 overflow-auto bg-white shadow-lg">
                {{ $slot }}
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end p-4 border-t dark:border-gray-600">
                <button
                    @click="show = false"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                >
                    {{__('local.Close')}}
                </button>
            </div>
        </div>
    </div>
</div>
