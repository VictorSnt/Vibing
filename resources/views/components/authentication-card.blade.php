<div class="flex-col items-center flex-1 pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
    <div>
        {{ $logo }}
    </div>

    <div class="flex-1 w-full px-6 py-4 m-auto mt-6 overflow-hidden bg-white shadow-md sm:max-w-lg dark:bg-gray-800 sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
