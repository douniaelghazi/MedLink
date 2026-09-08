<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-blue-600">
                {{ auth()->user()->role === 'hopital' ? 'ESPACE HÔPITAL' : 'ESPACE MÉDECIN' }}
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                {{ auth()->user()->role === 'hopital' ? 'Candidatures reçues' : 'Mes candidatures' }}
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        📋
                    </div>

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            {{ auth()->user()->role === 'hopital'
                                ? 'Gestion des candidatures'
                                : 'Suivi de mes candidatures' }}
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            {{ auth()->user()->role === 'hopital'
                                ? 'Candidatures reçues'
                                : 'Mes candidatures' }}
                        </h1>

                        <p class="text-blue-50 mt-2">
                            {{ auth()->user()->role === 'hopital'
                                ? 'Consultez les candidatures reçues pour vos missions.'
                                : 'Consultez le statut de vos candidatures aux missions.' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Messages --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    {{ session('error') }}
                </div>
            @endif


            @if($candidatures->count())

                <div class="mb-5">
                    <p class="text-gray-500 text-sm">
                        {{ auth()->user()->role === 'hopital'
                            ? 'Candidatures trouvées :'
                            : 'Mes candidatures :' }}

                        <span class="font-bold text-blue-600">
                            {{ $candidatures->total() }}
                        </span>
                    </p>
                </div>


                {{-- Liste --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    @foreach($candidatures as $candidature)

                        <div class="bg-white rounded-2xl shadow-sm border border-blue-100 p-6 hover:shadow-lg transition">

                            {{-- Nom + statut --}}
                            <div class="flex justify-between items-start gap-4 mb-5">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                                        👨‍⚕️
                                    </div>

                                    <div>

                                        <h3 class="text-lg font-bold text-blue-950">
                                            @if(auth()->user()->role === 'hopital')
                                                {{ $candidature->nom }}
                                            @else
                                                {{ $candidature->mission->titre }}
                                            @endif
                                        </h3>

                                        <p class="text-sm text-gray-500">
                                            {{ auth()->user()->role === 'hopital'
                                                ? 'Candidature médicale'
                                                : 'Candidature envoyée' }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Statut --}}
                                @if($candidature->statut === 'en_attente')

                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                                        En attente
                                    </span>

                                @elseif($candidature->statut === 'acceptee')

                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                        Acceptée
                                    </span>

                                @elseif($candidature->statut === 'refusee')

                                    <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                                        Refusée
                                    </span>

                                @else

                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">
                                        Annulée
                                    </span>

                                @endif

                            </div>


                            {{-- Mission --}}
                            <div class="bg-sky-50 rounded-xl p-4 mb-5">

                                <p class="text-xs text-gray-500">
                                    Mission
                                </p>

                                <p class="font-semibold text-blue-950 mt-1">
                                    {{ $candidature->mission->titre }}
                                </p>

                            </div>


                            {{-- Hôpital / médecin --}}
                            @if(auth()->user()->role === 'hopital')

                                <div class="mb-5">

                                    <p class="text-sm font-semibold text-gray-700 mb-1">
                                        Candidat
                                    </p>

                                    <p class="text-gray-600">
                                        {{ $candidature->nom }}
                                    </p>

                                </div>

                            @endif


                            {{-- Message --}}
                            <div class="mb-5">

                                <p class="text-sm font-semibold text-gray-700 mb-2">
                                    Message
                                </p>

                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $candidature->message ?? 'Aucun message' }}
                                </p>

                            </div>


                            {{-- Date --}}
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-5">

                                <span>📅</span>

                                <span>
                                    Candidature envoyée le
                                    <strong class="text-gray-700">
                                        {{ $candidature->date_candidature->format('d/m/Y') }}
                                    </strong>
                                </span>

                            </div>


                            {{-- Actions Hôpital --}}
                            @if(auth()->user()->role === 'hopital')

                                @if($candidature->statut === 'en_attente')

                                    <div class="border-t border-gray-100 pt-5 flex gap-3">

                                        <form method="POST"
                                              action="{{ route('hopital.candidatures.statut', $candidature) }}"
                                              class="flex-1">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="statut" value="acceptee">

                                            <button type="submit"
                                                    class="w-full px-4 py-2.5 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition">
                                                ✓ Accepter
                                            </button>
                                        </form>


                                        <form method="POST"
                                              action="{{ route('hopital.candidatures.statut', $candidature) }}"
                                              class="flex-1">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="statut" value="refusee">

                                            <button type="submit"
                                                    class="w-full px-4 py-2.5 bg-red-50 text-red-600 rounded-xl font-semibold hover:bg-red-100 transition">
                                                ✕ Refuser
                                            </button>
                                        </form>

                                    </div>

                                @else

                                    <div class="border-t border-gray-100 pt-4 text-sm text-gray-500">
                                        Cette candidature a déjà été traitée.
                                    </div>

                                @endif


                            {{-- Actions Médecin --}}
                            @else

                                <div class="border-t border-gray-100 pt-5 flex gap-3">

                                    <a href="{{ route('candidatures.show', $candidature) }}"
                                       class="flex-1 text-center px-4 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                                        Voir
                                    </a>

                                    @if($candidature->statut === 'en_attente')

                                        <a href="{{ route('candidatures.edit', $candidature) }}"
                                           class="px-5 py-2.5 bg-sky-100 text-blue-700 rounded-xl font-semibold hover:bg-sky-200 transition">
                                            Modifier
                                        </a>

                                    @endif

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>


                <div class="mt-8">
                    {{ $candidatures->links() }}
                </div>


            @else

                <div class="bg-white rounded-3xl shadow-sm border border-blue-100 p-12 text-center">

                    <div class="w-20 h-20 mx-auto bg-sky-100 text-blue-600 rounded-2xl flex items-center justify-center text-3xl">
                        📋
                    </div>

                    <h3 class="text-2xl font-bold text-blue-950 mt-5">
                        {{ auth()->user()->role === 'hopital'
                            ? 'Aucune candidature'
                            : 'Aucune candidature envoyée' }}
                    </h3>

                    <p class="text-gray-500 mt-2">
                        {{ auth()->user()->role === 'hopital'
                            ? "Vous n'avez reçu aucune candidature pour le moment."
                            : "Vous n'avez pas encore postulé à une mission." }}
                    </p>


                    @if(auth()->user()->role === 'hopital')

                        <a href="{{ route('missions.create') }}"
                           class="inline-flex mt-6 px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            + Créer une mission
                        </a>

                    @else

                        <a href="{{ route('medecin.missions.index') }}"
                           class="inline-flex mt-6 px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Voir les missions
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>

</x-app-layout>