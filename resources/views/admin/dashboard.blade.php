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

                {{-- Total Users --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">
                        Total utilisateurs
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalUsers }}
                    </p>
                </div>


                {{-- Clients --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">
                        Clients
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalClients }}
                    </p>
                </div>


                {{-- Freelances --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">
                        Freelances
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalFreelances }}
                    </p>
                </div>


                {{-- Admins --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">
                        Admins
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalAdmins }}
                    </p>
                </div>

            </div>


            {{-- Users Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="flex justify-between items-center mb-5">

                        <h3 class="text-lg font-semibold text-gray-800">
                            Derniers utilisateurs
                        </h3>

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
                                        Date
                                    </th>

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

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="p-6 text-center text-gray-500">
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

