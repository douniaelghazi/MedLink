<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-blue-600">
                ESPACE MÉDECIN
            </p>

            <h2 class="font-bold text-2xl text-blue-950">
                Détail de la mission
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- En-tête --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 text-white shadow-lg mb-8">

                <span class="inline-flex px-3 py-1 bg-white/20 rounded-full text-sm font-semibold">
                    Mission ouverte
                </span>

                <h1 class="text-3xl md:text-4xl font-bold mt-4">
                    {{ $mission->titre }}
                </h1>

                <p class="mt-3 text-blue-50">
                    Une opportunité médicale disponible sur MedLink.
                </p>

            </div>


            {{-- Contenu --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Informations principales --}}
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-blue-100 p-6">

                    <h2 class="text-xl font-bold text-blue-950 mb-5">
                        Présentation de la mission
                    </h2>

                    <div class="mb-7">
                        <p class="text-sm font-semibold text-gray-500 mb-2">
                            Description
                        </p>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $mission->description }}
                        </p>
                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div class="bg-sky-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500">
                                Spécialité recherchée
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                🩺 {{ $mission->specialite_recherchee }}
                            </p>
                        </div>

                        <div class="bg-sky-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500">
                                Ville
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                📍 {{ $mission->ville }}
                            </p>
                        </div>

                        <div class="bg-sky-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500">
                                Date de début
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                📅 {{ $mission->date_debut->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="bg-sky-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500">
                                Date de fin
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                📅 {{ $mission->date_fin->format('d/m/Y') }}
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Résumé --}}
                <div class="bg-white rounded-2xl shadow-sm border border-blue-100 p-6">

                    <h2 class="text-xl font-bold text-blue-950 mb-5">
                        Informations
                    </h2>

                    <div class="space-y-4">

                        <div>
                            <p class="text-xs text-gray-500">
                                Budget
                            </p>

                            <p class="text-lg font-bold text-blue-600 mt-1">
                                {{ $mission->budget }} DH
                            </p>
                        </div>

                        <div class="border-t pt-4">
                            <p class="text-xs text-gray-500">
                                Nombre de postes
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                👥 {{ $mission->nombre_de_postes }}
                            </p>
                        </div>

                        <div class="border-t pt-4">
                            <p class="text-xs text-gray-500">
                                Niveau d'expérience
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                🎓 {{ $mission->niveau_d_experience }}
                            </p>
                        </div>

                    </div>


                    {{-- Postuler --}}
                    <a
                        href="{{ route('candidatures.create', ['id_mission' => $mission->id_mission]) }}"
                        class="block w-full text-center mt-7 px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-md">
                        Postuler à cette mission
                    </a>

                    <a
                        href="{{ route('medecin.missions.index') }}"
                        class="block w-full text-center mt-3 px-5 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition">
                        Retour aux missions
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>