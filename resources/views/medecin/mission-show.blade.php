<x-app-layout>

    {{-- Header --}}
    <div class="bg-white border-b border-sky-100">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                Espace Médecin
            </p>

            <h1 class="text-xl font-bold text-slate-900 mt-1">
                Détail de la mission
            </h1>

        </div>
    </div>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-5xl mx-auto px-6 py-6">

            {{-- Mission principale --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6 mb-5">

                <div class="flex items-start justify-between gap-5">

                    <div>

                        <span class="inline-flex px-2.5 py-1 bg-green-50 text-green-700 border border-green-100 rounded-full text-xs font-semibold">
                            Mission ouverte
                        </span>

                        <h2 class="text-2xl font-bold text-slate-900 mt-3">
                            {{ $mission->titre }}
                        </h2>

                        <p class="text-sm text-slate-500 mt-2">
                            Une opportunité médicale disponible sur MedLink.
                        </p>

                    </div>

                    <div class="hidden sm:flex w-11 h-11 rounded-xl bg-blue-50 items-center justify-center text-lg">
                        🩺
                    </div>

                </div>

            </div>


            {{-- Contenu --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                {{-- Présentation --}}
                <div class="lg:col-span-2 bg-white rounded-2xl border border-sky-100 shadow-sm p-6">

                    <h2 class="text-lg font-bold text-slate-900 mb-5">
                        Présentation de la mission
                    </h2>


                    {{-- Description --}}
                    <div class="mb-6">

                        <p class="text-sm font-semibold text-slate-700 mb-2">
                            Description
                        </p>

                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ $mission->description }}
                        </p>

                    </div>


                    {{-- Informations --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                        {{-- Spécialité --}}
                        <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Spécialité recherchée
                            </p>

                            <p class="text-sm font-semibold text-slate-900 mt-1">
                                🩺 {{ $mission->specialite_recherchee }}
                            </p>

                        </div>


                        {{-- Ville --}}
                        <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Ville
                            </p>

                            <p class="text-sm font-semibold text-slate-900 mt-1">
                                📍 {{ $mission->ville }}
                            </p>

                        </div>


                        {{-- Date début --}}
                        <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Date de début
                            </p>

                            <p class="text-sm font-semibold text-slate-900 mt-1">
                                📅 {{ $mission->date_debut->format('d/m/Y') }}
                            </p>

                        </div>


                        {{-- Date fin --}}
                        <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Date de fin
                            </p>

                            <p class="text-sm font-semibold text-slate-900 mt-1">
                                📅 {{ $mission->date_fin->format('d/m/Y') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Résumé --}}
                <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6">

                    <h2 class="text-lg font-bold text-slate-900 mb-5">
                        Informations
                    </h2>


                    {{-- Budget --}}
                    <div>

                        <p class="text-xs text-slate-500">
                            Budget
                        </p>

                        <p class="text-lg font-bold text-blue-600 mt-1">
                            {{ $mission->budget }} DH
                        </p>

                    </div>


                    {{-- Postes --}}
                    <div class="border-t border-slate-100 pt-4 mt-4">

                        <p class="text-xs text-slate-500">
                            Nombre de postes
                        </p>

                        <p class="text-sm font-semibold text-slate-900 mt-1">
                            👥 {{ $mission->nombre_de_postes }}
                        </p>

                    </div>


                    {{-- Expérience --}}
                    <div class="border-t border-slate-100 pt-4 mt-4">

                        <p class="text-xs text-slate-500">
                            Niveau d'expérience
                        </p>

                        <p class="text-sm font-semibold text-slate-900 mt-1">
                            🎓 {{ $mission->niveau_d_experience }}
                        </p>

                    </div>


                    {{-- Actions --}}
                    <div class="border-t border-slate-100 pt-5 mt-5">

                        <a
                            href="{{ route('candidatures.create', ['id_mission' => $mission->id_mission]) }}"
                            class="block w-full text-center px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                        >
                            Postuler à cette mission
                        </a>

                        <a
                            href="{{ route('medecin.missions.index') }}"
                            class="block w-full text-center mt-3 px-5 py-2.5 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                        >
                            Retour aux missions
                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>