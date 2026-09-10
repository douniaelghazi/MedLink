<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                Espace Hôpital
            </p>

            <h2 class="text-xl font-bold text-slate-900 mt-1">
                Mes missions
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-7xl mx-auto px-6 py-6">

            {{-- En-tête de la page --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                <div>
                    <h1 class="text-lg font-bold text-slate-900">
                        Gestion des missions
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Gérez les missions médicales publiées par votre hôpital.
                    </p>
                </div>

                <a
                    href="{{ route('missions.create') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                    + Créer une mission
                </a>

            </div>


            {{-- Message succès --}}
            @if(session('success'))

                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>

            @endif


            {{-- Missions --}}
            @if($missions->count())

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    @foreach($missions as $mission)

                        <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-5 hover:shadow-md transition">

                            {{-- Titre + statut --}}
                            <div class="flex justify-between items-start gap-4 mb-5">

                                <div>

                                    <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                                        Mission médicale
                                    </p>

                                    <h3 class="text-lg font-bold text-slate-900 mt-1">
                                        {{ $mission->titre }}
                                    </h3>

                                </div>


                                {{-- Statut --}}
                                @if($mission->statut === 'ouverte')

                                    <span class="shrink-0 px-3 py-1 bg-green-50 text-green-700 border border-green-100 rounded-full text-xs font-semibold">
                                        Ouverte
                                    </span>

                                @elseif($mission->statut === 'fermee')

                                    <span class="shrink-0 px-3 py-1 bg-slate-50 text-slate-600 border border-slate-100 rounded-full text-xs font-semibold">
                                        Fermée
                                    </span>

                                @else

                                    <span class="shrink-0 px-3 py-1 bg-red-50 text-red-600 border border-red-100 rounded-full text-xs font-semibold">
                                        Annulée
                                    </span>

                                @endif

                            </div>


                            {{-- Description --}}
                            <p class="text-sm text-slate-600 leading-relaxed mb-5">
                                {{ $mission->description }}
                            </p>


                            {{-- Informations --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-5">

                                {{-- Spécialité --}}
                                <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                    <p class="text-xs text-slate-500">
                                        Spécialité
                                    </p>

                                    <p class="font-semibold text-slate-900 mt-1">
                                        {{ $mission->specialite_recherchee }}
                                    </p>

                                </div>


                                {{-- Ville --}}
                                <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                    <p class="text-xs text-slate-500">
                                        Ville
                                    </p>

                                    <p class="font-semibold text-slate-900 mt-1">
                                        📍 {{ $mission->ville }}
                                    </p>

                                </div>


                                {{-- Budget --}}
                                <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                    <p class="text-xs text-slate-500">
                                        Budget
                                    </p>

                                    <p class="font-semibold text-slate-900 mt-1">
                                        {{ $mission->budget }} DH
                                    </p>

                                </div>


                                {{-- Nombre de postes --}}
                                <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                    <p class="text-xs text-slate-500">
                                        Nombre de postes
                                    </p>

                                    <p class="font-semibold text-slate-900 mt-1">
                                        {{ $mission->nombre_de_postes }}
                                    </p>

                                </div>


                                {{-- Date début --}}
                                <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                    <p class="text-xs text-slate-500">
                                        Date de début
                                    </p>

                                    <p class="font-semibold text-slate-900 mt-1">
                                        {{ $mission->date_debut->format('d/m/Y') }}
                                    </p>

                                </div>


                                {{-- Date fin --}}
                                <div class="bg-sky-50 border border-sky-100 rounded-xl p-3">

                                    <p class="text-xs text-slate-500">
                                        Date de fin
                                    </p>

                                    <p class="font-semibold text-slate-900 mt-1">
                                        {{ $mission->date_fin->format('d/m/Y') }}
                                    </p>

                                </div>

                            </div>


                            {{-- Niveau d'expérience --}}
                            <div class="flex items-center gap-2 text-sm mb-5">

                                <span class="text-slate-500">
                                    Niveau d'expérience :
                                </span>

                                <span class="font-semibold text-slate-900">
                                    {{ $mission->niveau_d_experience }}
                                </span>

                            </div>


                            {{-- Actions --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-100">

                                <a
                                    href="{{ route('missions.show', $mission) }}"
                                    class="px-4 py-2 bg-blue-50 text-blue-700 rounded-xl font-semibold hover:bg-blue-100 transition">
                                    Voir
                                </a>


                                <a
                                    href="{{ route('missions.edit', $mission) }}"
                                    class="px-4 py-2 bg-sky-50 text-blue-700 border border-sky-100 rounded-xl font-semibold hover:bg-sky-100 transition">
                                    Modifier
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('missions.destroy', $mission) }}"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-semibold hover:bg-red-100 transition">
                                        Supprimer
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Pagination --}}
                <div class="mt-7">
                    {{ $missions->links() }}
                </div>


            @else

                {{-- Aucun mission --}}
                <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-10 text-center">

                    <div class="w-14 h-14 mx-auto bg-sky-50 border border-sky-100 rounded-xl flex items-center justify-center text-2xl">
                        📋
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mt-4">
                        Aucune mission
                    </h3>

                    <p class="text-sm text-slate-500 mt-2">
                        Vous n'avez aucune mission publiée pour le moment.
                    </p>

                    <a
                        href="{{ route('missions.create') }}"
                        class="inline-flex mt-5 px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                        + Créer ma première mission
                    </a>

                </div>

            @endif

        </main>

    </div>

</x-app-layout>