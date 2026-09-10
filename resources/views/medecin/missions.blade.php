<x-app-layout>

    {{-- Header --}}
    <div class="bg-white border-b border-sky-100">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                Espace Médecin
            </p>

            <h1 class="text-xl font-bold text-slate-900 mt-1">
                Missions disponibles
            </h1>

        </div>
    </div>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-7xl mx-auto px-6 py-6">

            {{-- Recherche --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6 mb-6">

                <div class="mb-5">

                    <h2 class="text-lg font-bold text-slate-900">
                        Rechercher une mission
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Utilisez les filtres pour trouver une mission adaptée.
                    </p>

                </div>


                <form
                    method="GET"
                    action="{{ route('medecin.missions.index') }}"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4"
                >

                    {{-- Recherche --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Recherche
                        </label>

                        <input
                            type="text"
                            name="recherche"
                            value="{{ request('recherche') }}"
                            placeholder="Titre, spécialité..."
                            class="w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                        >

                    </div>


                    {{-- Ville --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Ville
                        </label>

                        <input
                            type="text"
                            name="ville"
                            value="{{ request('ville') }}"
                            placeholder="Ex : Béni Mellal"
                            class="w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                        >

                    </div>


                    {{-- Spécialité --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Spécialité
                        </label>

                        <input
                            type="text"
                            name="specialite"
                            value="{{ request('specialite') }}"
                            placeholder="Ex : Cardiologie"
                            class="w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                        >

                    </div>


                    {{-- Boutons --}}
                    <div class="flex items-end gap-2">

                        <button
                            type="submit"
                            class="flex-1 px-4 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                        >
                            Rechercher
                        </button>

                        <a
                            href="{{ route('medecin.missions.index') }}"
                            class="px-4 py-3 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                        >
                            Reset
                        </a>

                    </div>

                </form>

            </div>


            {{-- Résultats --}}
            <div class="flex items-center justify-between mb-5">

                <div>

                    <h2 class="text-xl font-bold text-slate-900">
                        Missions ouvertes
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Les opportunités actuellement disponibles
                    </p>

                </div>

                @if($missions->count())

                    <span class="px-3 py-1.5 bg-blue-50 text-blue-700 border border-blue-100 rounded-full text-sm font-semibold">
                        {{ $missions->total() }} mission(s)
                    </span>

                @endif

            </div>


            @if($missions->count())

                {{-- Cards --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    @foreach($missions as $mission)

                        <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden hover:shadow-md transition">

                            {{-- Card header --}}
                            <div class="p-5 border-b border-slate-100">

                                <div class="flex items-start justify-between gap-4">

                                    <div>

                                        <span class="inline-flex px-2.5 py-1 bg-green-50 text-green-700 border border-green-100 rounded-full text-xs font-semibold">
                                            Mission ouverte
                                        </span>

                                        <h3 class="text-lg font-bold text-slate-900 mt-3">
                                            {{ $mission->titre }}
                                        </h3>

                                    </div>

                                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-lg">
                                        🏥
                                    </div>

                                </div>

                                <p class="text-sm text-slate-600 mt-3 line-clamp-2">
                                    {{ $mission->description }}
                                </p>

                            </div>


                            {{-- Informations --}}
                            <div class="p-5">

                                <div class="grid grid-cols-2 gap-3">

                                    {{-- Spécialité --}}
                                    <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                        <p class="text-xs text-slate-500">
                                            Spécialité
                                        </p>

                                        <p class="text-sm font-semibold text-slate-900 mt-1">
                                            🩺 {{ $mission->specialite_recherchee }}
                                        </p>

                                    </div>


                                    {{-- Ville --}}
                                    <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                        <p class="text-xs text-slate-500">
                                            Ville
                                        </p>

                                        <p class="text-sm font-semibold text-slate-900 mt-1">
                                            📍 {{ $mission->ville }}
                                        </p>

                                    </div>


                                    {{-- Budget --}}
                                    <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                        <p class="text-xs text-slate-500">
                                            Budget
                                        </p>

                                        <p class="text-sm font-semibold text-slate-900 mt-1">
                                            💰 {{ $mission->budget }} DH
                                        </p>

                                    </div>


                                    {{-- Postes --}}
                                    <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                        <p class="text-xs text-slate-500">
                                            Postes disponibles
                                        </p>

                                        <p class="text-sm font-semibold text-slate-900 mt-1">
                                            👥 {{ $mission->nombre_de_postes }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Dates + expérience --}}
                                <div class="mt-4 flex flex-wrap gap-2">

                                    <span class="px-3 py-2 bg-slate-50 border border-slate-100 rounded-lg text-xs text-slate-600">
                                        📅
                                        {{ $mission->date_debut->format('d/m/Y') }}
                                        →
                                        {{ $mission->date_fin->format('d/m/Y') }}
                                    </span>

                                    <span class="px-3 py-2 bg-slate-50 border border-slate-100 rounded-lg text-xs text-slate-600">
                                        🎓 {{ $mission->niveau_d_experience }}
                                    </span>

                                </div>


                                {{-- Actions --}}
                                <div class="flex gap-3 mt-5">

                                    <a
                                        href="{{ route('medecin.missions.show', $mission) }}"
                                        class="flex-1 text-center px-4 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                                    >
                                        Voir les détails
                                    </a>

                                    <a
                                        href="{{ route('candidatures.create', ['id_mission' => $mission->id_mission]) }}"
                                        class="px-5 py-2.5 bg-sky-50 text-blue-700 border border-sky-100 rounded-xl font-semibold hover:bg-sky-100 transition"
                                    >
                                        Postuler
                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Pagination --}}
                <div class="mt-7">
                    {{ $missions->links() }}
                </div>


            @else

                {{-- Aucun résultat --}}
                <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-10 text-center">

                    <div class="w-14 h-14 mx-auto bg-sky-50 border border-sky-100 rounded-xl flex items-center justify-center text-2xl">
                        🔍
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mt-4">
                        Aucune mission trouvée
                    </h3>

                    <p class="text-sm text-slate-500 mt-2">
                        Aucune mission ouverte ne correspond à votre recherche.
                    </p>

                    <a
                        href="{{ route('medecin.missions.index') }}"
                        class="inline-block mt-5 px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                    >
                        Voir toutes les missions
                    </a>

                </div>

            @endif

        </main>

    </div>

</x-app-layout>