<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-blue-600">
                ESPACE ADMIN
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Gestion des utilisateurs
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        👥
                    </div>

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            Administration MedLink
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            Gestion des utilisateurs
                        </h1>

                        <p class="text-blue-50 mt-2">
                            Consultez et gérez les comptes des utilisateurs de MedLink.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Messages --}}
            @if(session('success'))

                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>

            @endif


            @if(session('error'))

                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    {{ session('error') }}
                </div>

            @endif


            {{-- Liste --}}
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">

                <div class="p-6 border-b border-gray-100">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                        <div>
                            <h2 class="text-xl font-bold text-blue-950">
                                Liste des utilisateurs
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Gestion des comptes MedLink
                            </p>
                        </div>

                        <div class="px-4 py-2 bg-sky-50 text-blue-700 rounded-xl text-sm font-semibold">
                            {{ $users->total() }} utilisateur(s)
                        </div>

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
                                    Inscription
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @forelse($users as $user)

                                <tr class="hover:bg-sky-50/50 transition">

                                    {{-- ID --}}
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->id }}
                                    </td>


                                    {{-- Nom --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                                                @if($user->role === 'hopital')
                                                    🏥
                                                @elseif($user->role === 'medecin')
                                                    👨‍⚕️
                                                @else
                                                    🛡️
                                                @endif
                                            </div>

                                            <div>
                                                <p class="font-semibold text-blue-950">
                                                    {{ $user->name }}
                                                </p>
                                            </div>

                                        </div>

                                    </td>


                                    {{-- Email --}}
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->email }}
                                    </td>


                                    {{-- Rôle --}}
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


                                    {{-- Date --}}
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-center flex-wrap gap-2">

                                            {{-- Voir --}}
                                            <a
                                                href="{{ route('admin.users.show', $user) }}"
                                                class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">
                                                Voir
                                            </a>


                                            {{-- Modifier --}}
                                            <a
                                                href="{{ route('admin.users.edit', $user) }}"
                                                class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                                                Modifier
                                            </a>


                                            {{-- Supprimer --}}
                                            @if($user->id !== auth()->id())

                                                <form
                                                    action="{{ route('admin.users.destroy', $user) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
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

                                    <td colspan="6" class="px-6 py-12 text-center">

                                        <div class="text-4xl mb-3">
                                            👥
                                        </div>

                                        <p class="text-gray-500">
                                            Aucun utilisateur trouvé.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                <div class="p-6 border-t border-gray-100">
                    {{ $users->links() }}
                </div>

            </div>

        </div>

    </div>

</x-app-layout>