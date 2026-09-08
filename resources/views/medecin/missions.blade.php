<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-blue-600">ESPACE MÉDECIN</p>
            <h2 class="font-bold text-2xl text-blue-950">
                Missions disponibles
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- En-tête --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>
                        <p class="text-blue-100 text-sm font-medium uppercase">
                            Opportunités médicales
                        </p>

                        <h1 class="text-3xl font-bold mt-2">
                            Trouvez votre prochaine mission
                        </h1>

                        <p class="mt-3 text-blue-50 max-w-2xl">
                            Découvrez les missions médicales disponibles
                            et trouvez celle qui correspond à votre profil.
                        </p>
                    </div>

                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        🩺
                    </div>

                </div>

            </div>


            {{-- Recherche --}}
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 p-6 mb-8">

                <div class="mb-5">
                    <h3 class="text-lg font-bold text-blue-950">
                        Rechercher une mission
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Utilisez les filtres pour trouver une mission adaptée.
                    </p>
                </div>

                <form method="GET"
                      action="{{ route('medecin.missions.index') }}"
                      class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    {{-- Recherche --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Recherche
                        </label>

                        <input
                            type="text"
                            name="recherche"
                            value="{{ request('recherche') }}"
                            placeholder="Titre, spécialité..."
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    {{-- Ville --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Ville
                        </label>

                        <input
                            type="text"
                            name="ville"
                            value="{{ request('ville') }}"
                            placeholder="Ex : Béni Mellal"
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    {{-- Spécialité --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Spécialité
                        </label>

                        <input
                            type="text"
                            name="specialite"
                            value="{{ request('specialite') }}"
                            placeholder="Ex : Cardiologie"
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    {{-- Boutons --}}
                    <div class="flex items-end gap-2">

                        <button
                            type="submit"
                            class="flex-1 px-4 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Rechercher
                        </button>

                        <a
                            href="{{ route('medecin.missions.index') }}"
                            class="px-4 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition">
                            Reset
                        </a>

                    </div>

                </form>

            </div>


            {{-- Titre résultats --}}
            <div class="flex items-center justify-between mb-5">

                <div>
                    <h2 class="text-2xl font-bold text-blue-950">
                        Missions ouvertes
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Les opportunités actuellement disponibles
                    </p>
                </div>

                @if($missions->count())
                    <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                        {{ $missions->total() }} mission(s)
                    </span>
                @endif

            </div>


            @if($missions->count())

                {{-- Cards --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    @foreach($missions as $mission)

                        <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden hover:shadow-lg transition">

                            {{-- Header card --}}
                            <div class="p-6 border-b border-gray-100">

                                <div class="flex items-start justify-between gap-4">

                                    <div>
                                        <span class="inline-flex px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                            Mission ouverte
                                        </span>

                                        <h3 class="text-xl font-bold text-blue-950 mt-3">
                                            {{ $mission->titre }}
                                        </h3>
                                    </div>

                                    <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-xl">
                                        🏥
                                    </div>

                                </div>

                                <p class="text-gray-600 mt-4 line-clamp-2">
                                    {{ $mission->description }}
                                </p>

                            </div>


                            {{-- Informations --}}
                            <div class="p-6">

                                <div class="grid grid-cols-2 gap-4">

                                    {{-- Spécialité --}}
                                    <div class="bg-sky-50 rounded-xl p-4">
                                        <p class="text-xs text-gray-500">
                                            Spécialité
                                        </p>

                                        <p class="font-semibold text-blue-950 mt-1">
                                            🩺 {{ $mission->specialite_recherchee }}
                                        </p>
                                    </div>

                                    {{-- Ville --}}
                                    <div class="bg-sky-50 rounded-xl p-4">
                                        <p class="text-xs text-gray-500">
                                            Ville
                                        </p>

                                        <p class="font-semibold text-blue-950 mt-1">
                                            📍 {{ $mission->ville }}
                                        </p>
                                    </div>

                                    {{-- Budget --}}
                                    <div class="bg-sky-50 rounded-xl p-4">
                                        <p class="text-xs text-gray-500">
                                            Budget
                                        </p>

                                        <p class="font-semibold text-blue-950 mt-1">
                                            💰 {{ $mission->budget }} DH
                                        </p>
                                    </div>

                                    {{-- Postes --}}
                                    <div class="bg-sky-50 rounded-xl p-4">
                                        <p class="text-xs text-gray-500">
                                            Postes disponibles
                                        </p>

                                        <p class="font-semibold text-blue-950 mt-1">
                                            👥 {{ $mission->nombre_de_postes }}
                                        </p>
                                    </div>

                                </div>


                                {{-- Dates --}}
                                <div class="mt-4 flex flex-wrap gap-3 text-sm">

                                    <span class="px-3 py-2 bg-gray-100 rounded-lg text-gray-700">
                                        📅
                                        {{ $mission->date_debut->format('d/m/Y') }}
                                        →
                                        {{ $mission->date_fin->format('d/m/Y') }}
                                    </span>

                                    <span class="px-3 py-2 bg-gray-100 rounded-lg text-gray-700">
                                        🎓
                                        {{ $mission->niveau_d_experience }}
                                    </span>

                                </div>


                                {{-- Actions --}}
                                <div class="flex gap-3 mt-6">

                                    <a
                                        href="{{ route('medecin.missions.show', $mission) }}"
                                        class="flex-1 text-center px-4 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                                        Voir les détails
                                    </a>

                                    <a
                                        href="{{ route('candidatures.create', ['id_mission' => $mission->id_mission]) }}"
                                        class="px-5 py-3 bg-sky-100 text-blue-700 rounded-xl font-semibold hover:bg-sky-200 transition">
                                        Postuler
                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $missions->links() }}
                </div>


            @else

                {{-- Aucun résultat --}}
                <div class="bg-white rounded-2xl shadow-sm border border-blue-100 p-12 text-center">

                    <div class="w-20 h-20 mx-auto bg-sky-100 rounded-full flex items-center justify-center text-4xl">
                        🔍
                    </div>

                    <h3 class="text-xl font-bold text-blue-950 mt-5">
                        Aucune mission trouvée
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Aucune mission ouverte ne correspond à votre recherche.
                    </p>

                    <a
                        href="{{ route('medecin.missions.index') }}"
                        class="inline-block mt-5 px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                        Voir toutes les missions
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>