<div class="inline-flex items-center">
    
    <a @if (Auth::user() && (Auth::user()->is_admin || Auth::user()->is_superuser)) href="{{route('listusers-index')}}"  @else href="{{route('vibing-index')}}"  @endif  class="inline-flex items-center note-item"">
        <div class="inline-flex items-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                <span class="text-blue-500">Vibing</span>
            </h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
            </svg>
        </div>
    </a>
</div>