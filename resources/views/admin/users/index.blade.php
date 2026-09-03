<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des utilisateurs
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Messages --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif


            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">

                <div class="p-6">

                    <div class="flex justify-between items-center mb-6">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Liste des utilisateurs
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Gestion des comptes MedLink
                            </p>
                        </div>

                    </div>


                    <div class="overflow-x-auto">

                        <table class="w-full border-collapse">

                            <thead>
                                <tr class="bg-gray-100">

                                    <th class="border p-3 text-left">
                                        ID
                                    </th>

                                    <th class="border p-3 text-left">
                                        Nom
                                    </th>

                                    <th class="border p-3 text-left">
                                        Email
                                    </th>

                                    <th class="border p-3 text-left">
                                        Role
                                    </th>

                                    <th class="border p-3 text-left">
                                        Inscription
                                    </th>

                                    <th class="border p-3 text-center">
                                        Actions
                                    </th>

                                </tr>
                            </thead>


                            <tbody>

                                @forelse ($users as $user)

                                    <tr class="hover:bg-gray-50">

                                        <td class="border p-3">
                                            {{ $user->id }}
                                        </td>

                                        <td class="border p-3 font-medium">
                                            {{ $user->name }}
                                        </td>

                                        <td class="border p-3">
                                            {{ $user->email }}
                                        </td>

                                        <td class="border p-3">
                                            <span class="px-3 py-1 rounded-full text-sm bg-gray-100">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>

                                        <td class="border p-3">
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </td>

                                        <td class="border p-3">

                                            <div class="flex justify-center gap-2">

                                                {{-- Voir --}}
                                                <a
                                                    href="{{ route('admin.users.show', $user) }}"
                                                    class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"
                                                >
                                                    Voir
                                                </a>


                                                {{-- Modifier --}}
                                                <a
                                                    href="{{ route('admin.users.edit', $user) }}"
                                                    class="px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700"
                                                >
                                                    Modifier
                                                </a>


                                                {{-- Supprimer --}}
                                                @if ($user->id !== auth()->id())

                                                    <form
                                                        action="{{ route('admin.users.destroy', $user) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                                        >
                                                            Supprimer
                                                        </button>

                                                    </form>

                                                @endif

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td
                                            colspan="6"
                                            class="p-6 text-center text-gray-500"
                                        >
                                            Aucun utilisateur trouvé.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
