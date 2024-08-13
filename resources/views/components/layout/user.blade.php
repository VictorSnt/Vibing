<x-layout.app>
    @php
        $links = [
            ['href' => route('profile-update'), 'route' => 'profile-update', 'icon' => 'M15.586 4.414a2 2 0 0 0-2.828 0L8 9.172V12h2.828l4.758-4.758a2 2 0 0 0 0-2.828ZM17 6.586l-1.414-1.414L14.172 6 16 7.828 17 6.586Zm-5 5L9.172 11 4.586 15.586a1 1 0 0 0-.293.707V18h1.707a1 1 0 0 0 .707-.293L11 14.828l1.414 1.414Z', 'text' => 'Editar Perfil'],
            ['href' => route('profile-password'), 'route' => 'profile-password', 'icon' => 'M10 4a4 4 0 0 0-4 4v2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-1V8a4 4 0 0 0-4-4Zm-3 6V8a3 3 0 1 1 6 0v2H7Zm1 4a2 2 0 1 1 4 0 2 2 0 0 1-4 0Z', 'text' => 'Trocar Senha'],
            ['href' => route('profile-delete'), 'route' => 'profile-delete', 'icon' => 'M7 4V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h5ZM4 6v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H4Zm2 2h12v12H6V8Zm2 2v8h2v-8H8Zm4 0v8h2v-8h-2Z', 'text' => 'Apagar conta'],
        ];
    @endphp

    <x-nav.sidebar :links="$links" />
    <!-- Conteúdo Principal -->
    <div class="flex items-center justify-center flex-1 h-screen p-4 m-auto sm:ml-64">
        <div class="flex items-center justify-center m-auto">
            {{ $slot }}
        </div>
    </div>
</x-layout.app>
