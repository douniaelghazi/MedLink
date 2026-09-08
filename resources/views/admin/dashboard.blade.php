<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-blue-600">
                ESPACE ADMIN
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Dashboard
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex items-center justify-between gap-5">

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            Administration MedLink
                        </p>

                        <h1 class="text-3xl md:text-4xl font-bold mt-1">
                            Bienvenue, Administrateur 👋
                        </h1>

                        <p class="text-blue-50 mt-3">
                            Gérez les utilisateurs et les spécialités de la plateforme.
                        </p>
                    </div>

                    <div class="hidden sm:flex w-16 h-16 bg-white/20 rounded-2xl items-center justify-center text-3xl">
                        ⚙️
                    </div>

                </div>

            </div>


            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                {{-- Total utilisateurs --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Total utilisateurs
                            </p>

                            <p class="text-3xl font-bold text-blue-950 mt-2">
                                {{ $totalUsers }}
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                            👥
                        </div>

                    </div>

                </div>


                {{-- Hôpitaux --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Hôpitaux
                            </p>

                            <p class="text-3xl font-bold text-blue-950 mt-2">
                                {{ $totalHopitals }}
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-sky-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                            🏥
                        </div>

                    </div>

                </div>


                {{-- Médecins --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Médecins
                            </p>

                            <p class="text-3xl font-bold text-blue-950 mt-2">
                                {{ $totalMedecins }}
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-sky-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                            👨‍⚕️
                        </div>

                    </div>

                </div>


                {{-- Admins --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Administrateurs
                            </p>

                            <p class="text-3xl font-bold text-blue-950 mt-2">
                                {{ $totalAdmins }}
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-sky-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                            🛡️
                        </div>

                    </div>

                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 p-6 mb-8">

                <div class="mb-5">

                    <h2 class="text-xl font-bold text-blue-950">
                        Actions rapides
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Accédez rapidement aux fonctionnalités d'administration.
                    </p>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <a href="{{ route('admin.users.index') }}"
                       class="group p-5 bg-sky-50 rounded-xl hover:bg-blue-50 transition border border-transparent hover:border-blue-200">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                                👥
                            </div>

                            <div>
                                <h3 class="font-bold text-blue-950">
                                    Gérer les utilisateurs
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Voir et gérer les comptes.
                                </p>
                            </div>

                        </div>

                    </a>


                    <a href="{{ route('specialites.index') }}"
                       class="group p-5 bg-sky-50 rounded-xl hover:bg-blue-50 transition border border-transparent hover:border-blue-200">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                                🩺
                            </div>

                            <div>
                                <h3 class="font-bold text-blue-950">
                                    Gérer les spécialités
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Ajouter et modifier les spécialités.
                                </p>
                            </div>

                        </div>

                    </a>

                </div>

            </div>


            {{-- Derniers utilisateurs --}}
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">

                <div class="p-6 border-b border-gray-100">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                        <div>
                            <h2 class="text-xl font-bold text-blue-950">
                                Derniers utilisateurs
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Les derniers comptes inscrits sur MedLink.
                            </p>
                        </div>

                        <a href="{{ route('admin.users.index') }}"
                           class="text-blue-600 font-semibold hover:text-blue-800">
                            Voir tous →
                        </a>

                    </div>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-sky-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Nom
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Rôle
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Date
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @forelse($users as $user)

                                <tr class="hover:bg-sky-50/50 transition">

                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->id }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <p class="font-semibold text-blue-950">
                                            {{ $user->name }}
                                        </p>

                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($user->role === 'admin')

                                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold">
                                                Admin
                                            </span>

                                        @elseif($user->role === 'hopital')

                                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                                Hôpital
                                            </span>

                                        @else

                                            <span class="px-3 py-1 bg-sky-100 text-blue-700 rounded-full text-xs font-semibold">
                                                Médecin
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex flex-wrap gap-2">

                                            <a href="{{ route('admin.users.show', $user) }}"
                                               class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">
                                                Voir
                                            </a>

                                            <a href="{{ route('admin.users.edit', $user) }}"
                                               class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                                                Modifier
                                            </a>

                                            @if($user->id !== auth()->id())

                                                <form method="POST"
                                                      action="{{ route('admin.users.destroy', $user) }}"
                                                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="px-3 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-semibold hover:bg-red-100 transition">
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
                                        class="px-6 py-12 text-center text-gray-500">

                                        Aucun utilisateur trouvé.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                <div class="p-6">
                    {{ $users->links() }}
                </div>

            </div>

        </div>

    </div>

</x-app-layout>