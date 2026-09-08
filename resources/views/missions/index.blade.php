<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes missions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    {{-- Message de succès --}}
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">

                        <h3 class="text-lg font-semibold">
                            Mes missions
                        </h3>

                        <a href="{{ route('missions.create') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            + Créer une mission
                        </a>

                    </div>

                    @if($missions->count())

                        <div class="space-y-4">

                            @foreach($missions as $mission)

                                <div class="border rounded-lg p-5">

                                    <div class="flex justify-between items-start">

                                        <div>

                                            <h4 class="text-xl font-semibold mb-2">
                                                {{ $mission->titre }}
                                            </h4>

                                            <p class="text-gray-600 mb-3">
                                                {{ $mission->description }}
                                            </p>

                                        </div>

                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded">
                                            {{ $mission->statut }}
                                        </span>

                                    </div>

                                    <div class="grid grid-cols-2 gap-3 text-sm mb-5">

                                        <p>
                                            <strong>Spécialité :</strong>
                                            {{ $mission->specialite_recherchee }}
                                        </p>

                                        <p>
                                            <strong>Ville :</strong>
                                            {{ $mission->ville }}
                                        </p>

                                        <p>
                                            <strong>Budget :</strong>
                                            {{ $mission->budget }} DH
                                        </p>

                                        <p>
                                            <strong>Postes :</strong>
                                            {{ $mission->nombre_de_postes }}
                                        </p>

                                        <p>
                                            <strong>Date début :</strong>
                                            {{ $mission->date_debut->format('d/m/Y') }}
                                        </p>

                                        <p>
                                            <strong>Date fin :</strong>
                                            {{ $mission->date_fin->format('d/m/Y') }}
                                        </p>

                                        <p>
                                            <strong>Expérience :</strong>
                                            {{ $mission->niveau_d_experience }}
                                        </p>

                                    </div>

                                    <div class="flex gap-3">

                                        <a href="{{ route('missions.show', $mission) }}"
                                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                            Voir
                                        </a>

                                        <a href="{{ route('missions.edit', $mission) }}"
                                           class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                            Modifier
                                        </a>

                                        <form method="POST"
                                              action="{{ route('missions.destroy', $mission) }}"
                                              onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                Supprimer
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        <div class="mt-6">
                            {{ $missions->links() }}
                        </div>

                    @else

                        <div class="text-center py-8">

                            <p class="text-gray-600 mb-4">
                                Vous n'avez aucune mission pour le moment.
                            </p>

                            <a href="{{ route('missions.create') }}"
                               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                + Créer ma première mission
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>