<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Missions disponibles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
    Missions ouvertes
</h3>

<form method="GET" action="{{ route('medecin.missions.index') }}"
      class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">

    <input
        type="text"
        name="recherche"
        value="{{ request('recherche') }}"
        placeholder="Titre, spécialité ou ville"
        class="border-gray-300 rounded-lg"
    >

    <input
        type="text"
        name="ville"
        value="{{ request('ville') }}"
        placeholder="Ville"
        class="border-gray-300 rounded-lg"
    >

    <input
        type="text"
        name="specialite"
        value="{{ request('specialite') }}"
        placeholder="Spécialité"
        class="border-gray-300 rounded-lg"
    >

    <div class="flex gap-2">
        <button
            type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Rechercher
        </button>

        <a
            href="{{ route('medecin.missions.index') }}"
            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
            Réinitialiser
        </a>
    </div>

</form>
                    @if($missions->count())

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            @foreach($missions as $mission)

                                <div class="border rounded-lg p-5">

                                    <h4 class="text-xl font-semibold mb-2">
                                        {{ $mission->titre }}
                                    </h4>

                                    <p class="text-gray-600 mb-4">
                                        {{ $mission->description }}
                                    </p>

                                    <div class="space-y-2 text-sm mb-5">

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
                                            <strong>Date début :</strong>
                                            {{ $mission->date_debut->format('d/m/Y') }}
                                        </p>

                                        <p>
                                            <strong>Date fin :</strong>
                                            {{ $mission->date_fin->format('d/m/Y') }}
                                        </p>

                                        <p>
                                            <strong>Postes :</strong>
                                            {{ $mission->nombre_de_postes }}
                                        </p>

                                        <p>
                                            <strong>Expérience :</strong>
                                            {{ $mission->niveau_d_experience }}
                                        </p>

                                    </div>

                                    <div class="flex gap-3">

                                        <a href="{{ route('medecin.missions.show', $mission) }}"
                                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                            Voir
                                        </a>

                                        <a href="{{ route('candidatures.create', ['id_mission' => $mission->id_mission]) }}"
                                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                            Postuler
                                        </a>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        <div class="mt-6">
                            {{ $missions->links() }}
                        </div>

                    @else

                        <p class="text-gray-600">
                            Aucune mission ouverte disponible pour le moment.
                        </p>

                    @endif

                </div>

            </div>

        </div>
    </div>

</x-app-layout>