<div class="note-container">
    <a href="/" class="note-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-12 h-12 vibrate-animation animation-delay-0">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
        </svg>
    </a>
    <a href="/" class="note-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-12 h-12 vibrate-animation animation-delay-200">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
        </svg>
    </a>
    <a href="/" class="note-item">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-12 h-12 vibrate-animation animation-delay-400">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
        </svg>
    </a>
</div>


<style>
    .note-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        /* Espaçamento entre ícones */
        margin-top: 2rem;
        /* Ajuste conforme necessário */
    }

    .note-item {
        display: inline-block;
    }

    @keyframes vibrate {
        0% {
            transform: translate(0, 0);
        }

        20% {
            transform: translate(0, -5px);
        }

        40% {
            transform: translate(0, 5px);
        }

        60% {
            transform: translate(0, -5px);
        }

        80% {
            transform: translate(0, 5px);
        }

        100% {
            transform: translate(0, 0);
        }
    }

    .vibrate-animation {
        animation: vibrate 1s infinite;
    }

    .animation-delay-0 {
        animation-delay: 0s;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
    }
</style>
