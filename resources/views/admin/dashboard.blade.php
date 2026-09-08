<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">Total utilisateurs</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalUsers }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">Hôpitaux</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalHopitals }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">Médecins</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalMedecins }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">Admins</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalAdmins }}
                    </p>
                </div>

            </div>

            {{-- Quick Actions --}}
            <div class="bg-white p-6 rounded-lg shadow mb-8">

                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    Actions rapides
                </h3>

                <div class="flex flex-wrap gap-3">

                    <a href="{{ route('admin.users.index') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Gérer les utilisateurs
                    </a>

                    <a href="{{ route('specialites.index') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Gérer les spécialités
                    </a>

                </div>

            </div>

            {{-- Users Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="flex justify-between items-center mb-5">

                        <h3 class="text-lg font-semibold text-gray-800">
                            Derniers utilisateurs
                        </h3>

                        <a href="{{ route('admin.users.index') }}"
                           class="text-blue-600 hover:text-blue-800">
                            Voir tous
                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full border-collapse">

                            <thead>
                                <tr class="bg-gray-100">

                                    <th class="border p-3 text-left">ID</th>
                                    <th class="border p-3 text-left">Nom</th>
                                    <th class="border p-3 text-left">Email</th>
                                    <th class="border p-3 text-left">Role</th>
                                    <th class="border p-3 text-left">Date</th>
                                    <th class="border p-3 text-left">Actions</th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($users as $user)

                                    <tr class="hover:bg-gray-50">

                                        <td class="border p-3">
                                            {{ $user->id }}
                                        </td>

                                        <td class="border p-3">
                                            {{ $user->name }}
                                        </td>

                                        <td class="border p-3">
                                            {{ $user->email }}
                                        </td>

                                        <td class="border p-3">
                                            <span class="px-2 py-1 text-sm rounded bg-gray-100">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>

                                        <td class="border p-3">
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </td>

                                        <td class="border p-3">

                                            <div class="flex gap-2">

                                                {{-- Voir --}}
                                                <a href="{{ route('admin.users.show', $user) }}"
                                                   class="px-3 py-1 bg-gray-600 text-white rounded hover:bg-gray-700">
                                                    Voir
                                                </a>

                                                {{-- Modifier --}}
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                    Modifier
                                                </a>

                                                {{-- Supprimer --}}
                                                @if($user->id !== auth()->id())

                                                    <form method="POST"
                                                          action="{{ route('admin.users.destroy', $user) }}"
                                                          onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                            Supprimer
                                                        </button>

                                                    </form>

                                                @endif

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6"
                                            class="p-6 text-center text-gray-500">
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