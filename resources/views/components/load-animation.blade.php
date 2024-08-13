<div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
    <svg class="loading-spinner" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="none" />
    </svg>
</div>

<style>
    .loading-spinner {
        animation: rotate 2s linear infinite;
    }

    .loading-spinner circle {
        stroke-dasharray: 251;
        stroke-dashoffset: 251;
        animation: dash 1.5s ease-in-out infinite;
    }

    @keyframes rotate {
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes dash {
        0% {
            stroke-dashoffset: 251;
        }

        50% {
            stroke-dashoffset: 125;
        }

        100% {
            stroke-dashoffset: 251;
        }
    }
</style>
