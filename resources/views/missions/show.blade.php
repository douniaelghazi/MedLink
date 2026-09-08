<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold">
                ESPACE HÔPITAL
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Détail de la mission
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


            {{-- Header mission --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-500
                        rounded-3xl
                        shadow-lg
                        p-8
                        mb-8
                        text-white">

                <div class="flex flex-col md:flex-row
                            md:items-start
                            md:justify-between
                            gap-5">

                    <div>

                        <p class="text-blue-100 text-sm font-medium mb-2">
                            Mission médicale
                        </p>

                        <h1 class="text-3xl md:text-4xl font-bold">
                            {{ $mission->titre }}
                        </h1>

                        <p class="mt-3 text-blue-50">
                            📍 {{ $mission->ville }}
                        </p>

                    </div>


                    {{-- Statut --}}
                    <div>

                        @if($mission->statut === 'ouverte')

                            <span class="inline-block
                                         px-4 py-2
                                         bg-white
                                         text-green-600
                                         rounded-full
                                         font-bold">

                                Ouverte

                            </span>

                        @elseif($mission->statut === 'fermee')

                            <span class="inline-block
                                         px-4 py-2
                                         bg-white
                                         text-gray-600
                                         rounded-full
                                         font-bold">

                                Fermée

                            </span>

                        @else

                            <span class="inline-block
                                         px-4 py-2
                                         bg-white
                                         text-red-600
                                         rounded-full
                                         font-bold">

                                Annulée

                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- Contenu --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                {{-- Informations principales --}}
                <div class="lg:col-span-2
                            bg-white
                            rounded-2xl
                            shadow-sm
                            border border-sky-100
                            p-6 sm:p-8">

                    <h2 class="text-xl font-bold text-blue-950 mb-6">
                        Informations de la mission
                    </h2>


                    {{-- Description --}}
                    <div class="mb-8">

                        <p class="text-sm font-semibold text-gray-500 mb-2">
                            Description
                        </p>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $mission->description }}
                        </p>

                    </div>


                    {{-- Spécialité --}}
                    <div class="mb-6">

                        <p class="text-sm text-gray-500">
                            Spécialité recherchée
                        </p>

                        <p class="text-lg font-semibold text-blue-950 mt-1">
                            {{ $mission->specialite_recherchee }}
                        </p>

                    </div>


                    {{-- Dates --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">

                        <div class="bg-sky-50 rounded-xl p-4">

                            <p class="text-sm text-gray-500">
                                Date de début
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                {{ $mission->date_debut->format('d/m/Y') }}
                            </p>

                        </div>


                        <div class="bg-sky-50 rounded-xl p-4">

                            <p class="text-sm text-gray-500">
                                Date de fin
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                {{ $mission->date_fin->format('d/m/Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- Profil recherché --}}
                    <div class="border-t border-gray-100 pt-6">

                        <h3 class="font-bold text-blue-950 mb-4">
                            Profil recherché
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>

                                <p class="text-sm text-gray-500">
                                    Nombre de postes
                                </p>

                                <p class="font-semibold text-blue-950 mt-1">
                                    {{ $mission->nombre_de_postes }}
                                </p>

                            </div>


                            <div>

                                <p class="text-sm text-gray-500">
                                    Niveau d'expérience
                                </p>

                                <p class="font-semibold text-blue-950 mt-1">
                                    {{ $mission->niveau_d_experience }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Résumé --}}
                <div class="bg-white
                            rounded-2xl
                            shadow-sm
                            border border-sky-100
                            p-6
                            h-fit">

                    <h2 class="text-xl font-bold text-blue-950 mb-6">
                        Résumé
                    </h2>


                    <div class="space-y-5">

                        <div>

                            <p class="text-sm text-gray-500">
                                Budget
                            </p>

                            <p class="text-2xl font-bold text-blue-600 mt-1">
                                {{ $mission->budget }} DH
                            </p>

                        </div>


                        <div>

                            <p class="text-sm text-gray-500">
                                Ville
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                📍 {{ $mission->ville }}
                            </p>

                        </div>


                        <div>

                            <p class="text-sm text-gray-500">
                                Postes disponibles
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                {{ $mission->nombre_de_postes }}
                            </p>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="border-t border-gray-100 mt-6 pt-6 space-y-3">

                        <a href="{{ route('missions.edit', $mission) }}"
                           class="block w-full
                                  text-center
                                  px-5 py-3
                                  bg-blue-600
                                  text-white
                                  rounded-xl
                                  font-semibold
                                  hover:bg-blue-700
                                  transition">

                            Modifier la mission

                        </a>


                        <form method="POST"
                              action="{{ route('missions.destroy', $mission) }}"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="w-full
                                           px-5 py-3
                                           bg-red-50
                                           text-red-600
                                           rounded-xl
                                           font-semibold
                                           hover:bg-red-100
                                           transition">

                                Supprimer la mission

                            </button>

                        </form>


                        <a href="{{ route('missions.index') }}"
                           class="block w-full
                                  text-center
                                  px-5 py-3
                                  bg-gray-100
                                  text-gray-700
                                  rounded-xl
                                  font-semibold
                                  hover:bg-gray-200
                                  transition">

                            ← Retour à mes missions

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>