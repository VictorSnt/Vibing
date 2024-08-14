<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <x-nav-link href="{{ route('vibing-index') }}" wire:navigate>
                        <x-logo.application-mark class="block w-auto h-9" />
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                @auth
                    @if (Auth::user()->is_admin)
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link wire:navigate href="{{ route('listusers-index') }}" :active="request()->routeIs('vibing-index')">
                                Usuarios
                            </x-nav-link>
                            <x-nav-link wire:navigate href="{{ route('artist-index') }}" :active="request()->routeIs('artist-index')">
                                Artistas
                            </x-nav-link>
                            <x-nav-link wire:navigate href="{{ route('album-index') }}" :active="request()->routeIs('playlist-index')">
                                Album
                            </x-nav-link>
                            <x-nav-link wire:navigate href="{{ route('song-index') }}" :active="request()->routeIs('music-index')">
                                Musicas
                            </x-nav-link>
                        </div>
                    @else
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link wire:navigate href="{{ route('vibing-index') }}" :active="request()->routeIs('vibing-index')">
                                Inicio
                            </x-nav-link>
                            <x-nav-link wire:navigate href="{{ route('playlist-index') }}" :active="request()->routeIs('playlist-index')">
                                Playlist
                            </x-nav-link>
                            <x-nav-link wire:navigate href="{{ route('song-index') }}" :active="request()->routeIs('music-index')">
                                Musicas
                            </x-nav-link>
                        </div>
                    @endif

                @endauth

            </div>


            @if (Auth::user())
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Settings Dropdown -->
                    <div class="relative ms-3">
                        <x-dropdown align="right" width="48">

                            <x-slot name="trigger">
                                <livewire:dropdown-trigger />
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <x-dropdown-link href="{{ route('profile-update') }}" wire:navigate>
                                    {{ __('Perfil') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('logout') }}" wire:navigate>
                                    {{ __('local.Log-Out') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative ms-3">
                        <x-dropdown align="right" width="48">

                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700">
                                        Entrar
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Sing in  -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Faça o login
                                </div>

                                <x-dropdown-link href="{{ route('login') }}" wire:navigate>
                                    Logar
                                </x-dropdown-link>

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <x-dropdown-link href="{{ route('register') }}" wire:navigate>
                                    Registrar
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @endif
            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @if (Auth::user())
        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('vibing-index') }}" wire:navigate>
                    {{ __('local.Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="flex items-center px-4">


                    <div>
                        <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                        </div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <x-responsive-nav-link href="{{ route('logout') }}" wire:navigate>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>
    @endif
</nav>
