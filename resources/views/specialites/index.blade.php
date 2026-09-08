<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des spécialités
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Message succès --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">

                <h3 class="text-lg font-semibold">
                    Liste des spécialités
                </h3>

                <a href="{{ route('specialites.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Ajouter une spécialité
                </a>

            </div>

            {{-- Tableau --}}
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">

                <div class="p-6 overflow-x-auto">

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
                                    Description
                                </th>

                                <th class="border p-3 text-center">
                                    Actions
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($specialites as $specialite)

                                <tr class="hover:bg-gray-50">

                                    <td class="border p-3">
                                        {{ $specialite->id_specialite }}
                                    </td>

                                    <td class="border p-3 font-medium">
                                        {{ $specialite->nom }}
                                    </td>

                                    <td class="border p-3">
                                        {{ $specialite->description ?? '-' }}
                                    </td>

                                    <td class="border p-3">

                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('specialites.show', $specialite) }}"
                                               class="bg-gray-500 text-white px-3 py-1 rounded">
                                                Voir
                                            </a>

                                            <a href="{{ route('specialites.edit', $specialite) }}"
                                               class="bg-yellow-500 text-white px-3 py-1 rounded">
                                                Modifier
                                            </a>

                                            <form action="{{ route('specialites.destroy', $specialite) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Supprimer cette spécialité ?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="bg-red-600 text-white px-3 py-1 rounded">
                                                    Supprimer
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4"
                                        class="p-6 text-center text-gray-500">
                                        Aucune spécialité trouvée.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $specialites->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>