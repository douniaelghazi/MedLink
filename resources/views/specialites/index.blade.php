<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-5">

                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Admin
                </p>

                <h1 class="text-2xl font-bold text-slate-900 mt-1">
                    Gestion des spécialités
                </h1>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-7xl mx-auto px-6 py-8">

            {{-- Message succès --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Top section --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                <div>
                    <h2 class="text-xl font-bold text-slate-900">
                        Liste des spécialités
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Gérez les spécialités médicales disponibles sur MedLink.
                    </p>
                </div>

                <a
                    href="{{ route('specialites.create') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm"
                >
                    + Ajouter une spécialité
                </a>

            </div>


            {{-- Table --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>
                            <tr class="bg-sky-50 border-b border-sky-100">

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Nom
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Description
                                </th>

                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                                    Actions
                                </th>

                            </tr>
                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse ($specialites as $specialite)

                                <tr class="hover:bg-sky-50/50 transition">

                                    {{-- ID --}}
                                    <td class="px-6 py-4 text-sm text-slate-500">
                                        #{{ $specialite->id_specialite }}
                                    </td>


                                    {{-- Nom --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-lg">
                                                🩺
                                            </div>

                                            <span class="font-semibold text-slate-900">
                                                {{ $specialite->nom }}
                                            </span>

                                        </div>

                                    </td>


                                    {{-- Description --}}
                                    <td class="px-6 py-4 text-sm text-slate-600 max-w-md">
                                        {{ $specialite->description ?? '-' }}
                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-center items-center gap-2">

                                            <a
                                                href="{{ route('specialites.show', $specialite) }}"
                                                class="px-3 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-200 transition"
                                            >
                                                Voir
                                            </a>

                                            <a
                                                href="{{ route('specialites.edit', $specialite) }}"
                                                class="px-3 py-2 bg-blue-100 text-blue-700 rounded-lg text-sm font-semibold hover:bg-blue-200 transition"
                                            >
                                                Modifier
                                            </a>

                                            <form
                                                action="{{ route('specialites.destroy', $specialite) }}"
                                                method="POST"
                                                onsubmit="return confirm('Supprimer cette spécialité ?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="px-3 py-2 bg-red-100 text-red-700 rounded-lg text-sm font-semibold hover:bg-red-200 transition"
                                                >
                                                    Supprimer
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="px-6 py-12 text-center">

                                        <div class="flex flex-col items-center">

                                            <div class="w-14 h-14 rounded-2xl bg-sky-100 flex items-center justify-center text-2xl mb-4">
                                                🩺
                                            </div>

                                            <h3 class="font-semibold text-slate-900">
                                                Aucune spécialité
                                            </h3>

                                            <p class="text-sm text-slate-500 mt-1">
                                                Aucune spécialité médicale n'a encore été ajoutée.
                                            </p>

                                            <a
                                                href="{{ route('specialites.create') }}"
                                                class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-700"
                                            >
                                                + Ajouter une spécialité
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                @if($specialites->hasPages())

                    <div class="px-6 py-4 border-t border-slate-100">
                        {{ $specialites->links() }}
                    </div>

                @endif

            </div>

        </main>

    </div>

</x-app-layout>