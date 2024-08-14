<main>
    <div class="overflow-x-auto rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Nome</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">E-mail
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Data de
                        Criação</th>
                    {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Ações
                    </th> --}}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr wire:key="{{ $user->id }}">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->translatedFormat('d \d\e F \d\e Y') }}</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                            <button class="mr-3 text-blue-500 transition hover:text-blue-600">Editar</button>
                            <button class="text-red-500 transition hover:text-red-600">Excluir</button>
                        </td> --}}
                    </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                        Nenhum usuario encontrado
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Paginação -->
    <div class="mt-4">
        {{ $users->links('vendor.pagination.app-pagination')  }}
    </div>
</main>
