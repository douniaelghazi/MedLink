<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                Espace Hôpital
            </p>

            <h2 class="text-xl font-bold text-slate-900 mt-1">
                Détail de la mission
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-7xl mx-auto px-6 py-6">

            {{-- Informations principales --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6 mb-6">

                {{-- Titre + statut --}}
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-lg">
                            📋
                        </div>

                        <div>

                            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                                Mission médicale
                            </p>

                            <h1 class="text-xl font-bold text-slate-900 mt-1">
                                {{ $mission->titre }}
                            </h1>

                            <p class="text-sm text-slate-500 mt-1">
                                📍 {{ $mission->ville }}
                            </p>

                        </div>

                    </div>


                    {{-- Statut --}}
                    @if($mission->statut === 'ouverte')

                        <span class="self-start px-3 py-1 bg-green-50 text-green-700 border border-green-100 rounded-full text-xs font-semibold">
                            Ouverte
                        </span>

                    @elseif($mission->statut === 'fermee')

                        <span class="self-start px-3 py-1 bg-slate-50 text-slate-600 border border-slate-100 rounded-full text-xs font-semibold">
                            Fermée
                        </span>

                    @else

                        <span class="self-start px-3 py-1 bg-red-50 text-red-600 border border-red-100 rounded-full text-xs font-semibold">
                            Annulée
                        </span>

                    @endif

                </div>

            </div>


            {{-- Contenu --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Informations --}}
                <div class="lg:col-span-2 bg-white rounded-2xl border border-sky-100 shadow-sm p-6">

                    <h2 class="text-lg font-bold text-slate-900 mb-6">
                        Informations de la mission
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


                    {{-- Spécialité --}}
                    <div class="bg-sky-50 border border-sky-100 rounded-xl p-4 mb-5">

                        <p class="text-xs text-slate-500">
                            Spécialité recherchée
                        </p>

                        <p class="font-semibold text-slate-900 mt-1">
                            {{ $mission->specialite_recherchee }}
                        </p>

                    </div>


                    {{-- Dates --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">

                        <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Date de début
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $mission->date_debut->format('d/m/Y') }}
                            </p>

                        </div>


                        <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Date de fin
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $mission->date_fin->format('d/m/Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- Profil recherché --}}
                    <div class="border-t border-slate-100 pt-6">

                        <h3 class="text-lg font-bold text-slate-900 mb-4">
                            Profil recherché
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                                <p class="text-xs text-slate-500">
                                    Nombre de postes
                                </p>

                                <p class="font-semibold text-slate-900 mt-1">
                                    {{ $mission->nombre_de_postes }}
                                </p>

                            </div>


                            <div class="bg-sky-50 border border-sky-100 rounded-xl p-4">

                                <p class="text-xs text-slate-500">
                                    Niveau d'expérience
                                </p>

                                <p class="font-semibold text-slate-900 mt-1">
                                    {{ $mission->niveau_d_experience }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Résumé --}}
                <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6 h-fit">

                    <h2 class="text-lg font-bold text-slate-900 mb-6">
                        Résumé
                    </h2>


                    <div class="space-y-5">

                        {{-- Budget --}}
                        <div>

                            <p class="text-xs text-slate-500">
                                Budget
                            </p>

                            <p class="text-2xl font-bold text-blue-600 mt-1">
                                {{ $mission->budget }} DH
                            </p>

                        </div>


                        {{-- Ville --}}
                        <div class="border-t border-slate-100 pt-5">

                            <p class="text-xs text-slate-500">
                                Ville
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                📍 {{ $mission->ville }}
                            </p>

                        </div>


                        {{-- Postes --}}
                        <div class="border-t border-slate-100 pt-5">

                            <p class="text-xs text-slate-500">
                                Postes disponibles
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $mission->nombre_de_postes }}
                            </p>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="border-t border-slate-100 mt-6 pt-6 space-y-3">

                        <a
                            href="{{ route('missions.edit', $mission) }}"
                            class="block w-full text-center px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Modifier la mission
                        </a>


                        <form
                            method="POST"
                            action="{{ route('missions.destroy', $mission) }}"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full px-5 py-3 bg-red-50 text-red-600 rounded-xl font-semibold hover:bg-red-100 transition">
                                Supprimer la mission
                            </button>

                        </form>


                        <a
                            href="{{ route('missions.index') }}"
                            class="block w-full text-center px-5 py-3 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition">
                            ← Retour à mes missions
                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>