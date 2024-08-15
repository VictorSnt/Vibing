<main class="w-full min-h-[90vh] align-middle overflow-hidden">
    <div class="object-center max-w-fit m-auto rounded-lg h-[80vh] mt-8">
        <label for="users-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-1/2 m-auto">
            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:key="search" wire:model.live.debounce.500ms="search" type="search" id="users-search"
                class="block w-full p-4 my-2 text-sm text-gray-900 border rounded-lg border-slate-600 ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pesquisar Usuarios" required />
        </div>

        <div class="flex flex-col h-3/4">
            <!-- Tabela -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded shadow-md">
                    <thead class="text-white bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Admin
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Editar
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                Cadstrado em
                            </th>
                            @if (Auth::user()->is_superuser)
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                    Mudar permissões
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">
                                    Desativar
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr wire:key="{{ $user->id }}">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button
                                        x-on:click="$dispatch('open-modal', {modalId: 'update::user::modal', updateUserId: '{{ $user->id }}' })"
                                        class="text-white bg-slate-500 hover:bg-slate-700 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 focus:outline-none dark:focus:ring-slate-800">
                                        Editar
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->created_at->translatedFormat('d \d\e F \d\e Y') }}</td>
                                </td>
                                @if (Auth::user()->is_superuser)
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <x-user.admin-toggle-button userId="{{ $user->id }}"
                                            is_admin="{{ $user->is_admin }}" />
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <x-user.delete-user-button userId="{{ $user->id }}" />
                                    </td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        Nenhum usuario encontrado
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Botão Novo User -->
                    <div class="flex items-center justify-between mt-4">
                        <button x-on:click="$dispatch('open-modal', {modalId: 'register::user::modal' })" type="button"
                            class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            + Novo Usuario
                        </button>
                    </div>

                    <!-- Modal -->
                    <livewire:user.admin.delete />
                    <livewire:user.admin.update />
                </div>

            </div>

            <!-- Paginação -->
            <div class="mt-4">
                {{ $users->links('vendor.pagination.app-pagination') }}
            </div>
        </div>
        </div>
        </div>
    </main>
