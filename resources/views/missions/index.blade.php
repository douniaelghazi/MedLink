<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold">
                ESPACE HÔPITAL
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Mes missions
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


            {{-- ================= HEADER ================= --}}
            <div class="bg-white rounded-3xl shadow-sm border border-sky-100 p-6 mb-8">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>
                        <p class="text-blue-600 text-sm font-semibold uppercase">
                            Gestion des missions
                        </p>

                        <h1 class="text-3xl font-bold text-blue-950 mt-1">
                            Mes missions
                        </h1>

                        <p class="text-gray-500 mt-2">
                            Gérez les missions médicales publiées par votre hôpital.
                        </p>
                    </div>

                    <a href="{{ route('missions.create') }}"
                       class="inline-flex items-center justify-center
                              px-5 py-3
                              bg-blue-600
                              text-white
                              rounded-xl
                              font-semibold
                              hover:bg-blue-700
                              transition
                              shadow-md">

                        + Créer une mission

                    </a>

                </div>

            </div>


            {{-- ================= SUCCESS ================= --}}
            @if(session('success'))

                <div class="mb-6
                            p-4
                            bg-green-50
                            border border-green-200
                            text-green-700
                            rounded-xl">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ================= MISSIONS ================= --}}
            @if($missions->count())

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    @foreach($missions as $mission)

                        <div class="bg-white
                                    rounded-2xl
                                    shadow-sm
                                    border border-sky-100
                                    p-6
                                    hover:shadow-md
                                    transition">


                            {{-- Title + Status --}}
                            <div class="flex justify-between items-start gap-4 mb-4">

                                <div>

                                    <p class="text-sm text-blue-600 font-medium mb-1">
                                        Mission médicale
                                    </p>

                                    <h3 class="text-xl font-bold text-blue-950">
                                        {{ $mission->titre }}
                                    </h3>

                                </div>


                                {{-- Statut --}}
                                @if($mission->statut === 'ouverte')

                                    <span class="shrink-0
                                                 px-3 py-1
                                                 text-sm font-semibold
                                                 bg-green-100
                                                 text-green-700
                                                 rounded-full">

                                        Ouverte

                                    </span>

                                @elseif($mission->statut === 'fermee')

                                    <span class="shrink-0
                                                 px-3 py-1
                                                 text-sm font-semibold
                                                 bg-gray-100
                                                 text-gray-600
                                                 rounded-full">

                                        Fermée

                                    </span>

                                @else

                                    <span class="shrink-0
                                                 px-3 py-1
                                                 text-sm font-semibold
                                                 bg-red-100
                                                 text-red-600
                                                 rounded-full">

                                        Annulée

                                    </span>

                                @endif


                            </div>


                            {{-- Description --}}
                            <p class="text-gray-600 text-sm leading-relaxed mb-5">
                                {{ $mission->description }}
                            </p>


                            {{-- Informations --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">


                                <div class="bg-sky-50 rounded-xl p-3">

                                    <p class="text-xs text-gray-500">
                                        Spécialité
                                    </p>

                                    <p class="font-semibold text-blue-950 mt-1">
                                        {{ $mission->specialite_recherchee }}
                                    </p>

                                </div>


                                <div class="bg-sky-50 rounded-xl p-3">

                                    <p class="text-xs text-gray-500">
                                        Ville
                                    </p>

                                    <p class="font-semibold text-blue-950 mt-1">
                                        📍 {{ $mission->ville }}
                                    </p>

                                </div>


                                <div class="bg-sky-50 rounded-xl p-3">

                                    <p class="text-xs text-gray-500">
                                        Budget
                                    </p>

                                    <p class="font-semibold text-blue-950 mt-1">
                                        {{ $mission->budget }} DH
                                    </p>

                                </div>


                                <div class="bg-sky-50 rounded-xl p-3">

                                    <p class="text-xs text-gray-500">
                                        Nombre de postes
                                    </p>

                                    <p class="font-semibold text-blue-950 mt-1">
                                        {{ $mission->nombre_de_postes }}
                                    </p>

                                </div>


                                <div class="bg-sky-50 rounded-xl p-3">

                                    <p class="text-xs text-gray-500">
                                        Date de début
                                    </p>

                                    <p class="font-semibold text-blue-950 mt-1">
                                        {{ $mission->date_debut->format('d/m/Y') }}
                                    </p>

                                </div>


                                <div class="bg-sky-50 rounded-xl p-3">

                                    <p class="text-xs text-gray-500">
                                        Date de fin
                                    </p>

                                    <p class="font-semibold text-blue-950 mt-1">
                                        {{ $mission->date_fin->format('d/m/Y') }}
                                    </p>

                                </div>


                            </div>


                            {{-- Experience --}}
                            <div class="flex items-center gap-2 mb-6 text-sm">

                                <span class="text-gray-500">
                                    Niveau d'expérience :
                                </span>

                                <span class="font-semibold text-blue-950">
                                    {{ $mission->niveau_d_experience }}
                                </span>

                            </div>


                            {{-- Actions --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-100">


                                <a href="{{ route('missions.show', $mission) }}"
                                   class="px-4 py-2
                                          bg-blue-50
                                          text-blue-700
                                          rounded-xl
                                          font-semibold
                                          hover:bg-blue-100
                                          transition">

                                    Voir

                                </a>


                                <a href="{{ route('missions.edit', $mission) }}"
                                   class="px-4 py-2
                                          bg-yellow-50
                                          text-yellow-700
                                          rounded-xl
                                          font-semibold
                                          hover:bg-yellow-100
                                          transition">

                                    Modifier

                                </a>


                                <form method="POST"
                                      action="{{ route('missions.destroy', $mission) }}"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-4 py-2
                                                   bg-red-50
                                                   text-red-600
                                                   rounded-xl
                                                   font-semibold
                                                   hover:bg-red-100
                                                   transition">

                                        Supprimer

                                    </button>

                                </form>


                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $missions->links() }}
                </div>


            @else

                {{-- Empty state --}}
                <div class="bg-white
                            rounded-3xl
                            shadow-sm
                            border border-sky-100
                            p-12
                            text-center">

                    <div class="w-20 h-20
                                mx-auto
                                bg-sky-100
                                text-blue-600
                                rounded-2xl
                                flex items-center justify-center
                                text-3xl
                                mb-5">

                        📋

                    </div>

                    <h3 class="text-2xl font-bold text-blue-950">
                        Aucune mission
                    </h3>

                    <p class="text-gray-500 mt-2 mb-6">
                        Vous n'avez aucune mission publiée pour le moment.
                    </p>

                    <a href="{{ route('missions.create') }}"
                       class="inline-flex
                              px-5 py-3
                              bg-blue-600
                              text-white
                              rounded-xl
                              font-semibold
                              hover:bg-blue-700
                              transition">

                        + Créer ma première mission

                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>