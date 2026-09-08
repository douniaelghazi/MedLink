<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détail de la mission
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-2xl font-semibold mb-6">
                        {{ $mission->titre }}
                    </h3>

                    <div class="space-y-4">

                        <div>
                            <strong>Spécialité recherchée :</strong>
                            {{ $mission->specialite_recherchee }}
                        </div>

                        <div>
                            <strong>Description :</strong>

                            <p class="text-gray-600 mt-1">
                                {{ $mission->description }}
                            </p>
                        </div>

                        <div>
                            <strong>Ville :</strong>
                            {{ $mission->ville }}
                        </div>

                        <div>
                            <strong>Budget :</strong>
                            {{ $mission->budget }} DH
                        </div>

                        <div>
                            <strong>Date de début :</strong>
                            {{ $mission->date_debut->format('d/m/Y') }}
                        </div>

                        <div>
                            <strong>Date de fin :</strong>
                            {{ $mission->date_fin->format('d/m/Y') }}
                        </div>

                        <div>
                            <strong>Nombre de postes :</strong>
                            {{ $mission->nombre_de_postes }}
                        </div>

                        <div>
                            <strong>Niveau d'expérience :</strong>
                            {{ $mission->niveau_d_experience }}
                        </div>

                        <div>
                            <strong>Statut :</strong>
                            {{ ucfirst($mission->statut) }}
                        </div>

                    </div>

                    <div class="mt-8 flex gap-3">

                        <a href="{{ route('candidatures.create', ['id_mission' => $mission->id_mission]) }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Postuler
                        </a>

                        <a href="{{ route('medecin.missions.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Retour
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>