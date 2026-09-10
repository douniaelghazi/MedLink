<x-app-layout>

    {{-- Header --}}
    <div class="bg-white border-b border-sky-100">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                {{ auth()->user()->role === 'hopital'
                    ? 'Espace Hôpital'
                    : 'Espace Médecin' }}
            </p>

            <h1 class="text-xl font-bold text-slate-900 mt-1">
                {{ auth()->user()->role === 'hopital'
                    ? 'Candidatures reçues'
                    : 'Mes candidatures' }}
            </h1>

        </div>
    </div>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-7xl mx-auto px-6 py-6">

            {{-- Messages --}}
            @if(session('success'))
                <div class="mb-5 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-5 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    {{ session('error') }}
                </div>
            @endif


            @if($candidatures->count())

                {{-- Count --}}
                <div class="mb-5">

                    <p class="text-sm text-slate-500">
                        {{ auth()->user()->role === 'hopital'
                            ? 'Candidatures trouvées :'
                            : 'Mes candidatures :' }}

                        <span class="font-bold text-blue-600">
                            {{ $candidatures->total() }}
                        </span>
                    </p>

                </div>


                {{-- Liste --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    @foreach($candidatures as $candidature)

                        <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-5 hover:shadow-md transition">

                            {{-- Nom + statut --}}
                            <div class="flex justify-between items-start gap-4 mb-5">

                                <div class="flex items-center gap-3">

                                    <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-lg">
                                        👨‍⚕️
                                    </div>

                                    <div>

                                        <h3 class="text-lg font-bold text-slate-900">

                                            @if(auth()->user()->role === 'hopital')
                                                {{ $candidature->nom }}
                                            @else
                                                {{ $candidature->mission->titre }}
                                            @endif

                                        </h3>

                                        <p class="text-sm text-slate-500">
                                            {{ auth()->user()->role === 'hopital'
                                                ? 'Candidature médicale'
                                                : 'Candidature envoyée' }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Statut --}}
                                @if($candidature->statut === 'en_attente')

                                    <span class="px-3 py-1 bg-yellow-50 text-yellow-700 border border-yellow-100 rounded-full text-xs font-semibold">
                                        En attente
                                    </span>

                                @elseif($candidature->statut === 'acceptee')

                                    <span class="px-3 py-1 bg-green-50 text-green-700 border border-green-100 rounded-full text-xs font-semibold">
                                        Acceptée
                                    </span>

                                @elseif($candidature->statut === 'refusee')

                                    <span class="px-3 py-1 bg-red-50 text-red-700 border border-red-100 rounded-full text-xs font-semibold">
                                        Refusée
                                    </span>

                                @else

                                    <span class="px-3 py-1 bg-slate-50 text-slate-600 border border-slate-100 rounded-full text-xs font-semibold">
                                        Annulée
                                    </span>

                                @endif

                            </div>


                            {{-- Mission --}}
                            <div class="bg-sky-50 border border-sky-100 rounded-xl p-4 mb-5">

                                <p class="text-xs text-slate-500">
                                    Mission
                                </p>

                                <p class="font-semibold text-slate-900 mt-1">
                                    {{ $candidature->mission->titre }}
                                </p>

                            </div>


                            {{-- Candidat --}}
                            @if(auth()->user()->role === 'hopital')

                                <div class="mb-5">

                                    <p class="text-sm font-semibold text-slate-700 mb-1">
                                        Candidat
                                    </p>

                                    <p class="text-sm text-slate-600">
                                        {{ $candidature->nom }}
                                    </p>

                                </div>

                            @endif


                            {{-- Message --}}
                            <div class="mb-5">

                                <p class="text-sm font-semibold text-slate-700 mb-2">
                                    Message
                                </p>

                                <p class="text-sm text-slate-600 leading-relaxed">
                                    {{ $candidature->message ?? 'Aucun message' }}
                                </p>

                            </div>


                            {{-- Date --}}
                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-5">

                                <span>📅</span>

                                <span>
                                    Candidature envoyée le
                                    <strong class="text-slate-700">
                                        {{ $candidature->date_candidature->format('d/m/Y') }}
                                    </strong>
                                </span>

                            </div>


                            {{-- Actions Hôpital --}}
                            @if(auth()->user()->role === 'hopital')

                                @if($candidature->statut === 'en_attente')

                                    <div class="border-t border-slate-100 pt-5 flex gap-3">

                                        {{-- Accepter --}}
                                        <form
                                            method="POST"
                                            action="{{ route('hopital.candidatures.statut', $candidature) }}"
                                            class="flex-1"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="statut"
                                                value="acceptee"
                                            >

                                            <button
                                                type="submit"
                                                class="w-full px-4 py-2.5 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition"
                                            >
                                                ✓ Accepter
                                            </button>

                                        </form>


                                        {{-- Refuser --}}
                                        <form
                                            method="POST"
                                            action="{{ route('hopital.candidatures.statut', $candidature) }}"
                                            class="flex-1"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <input
                                                type="hidden"
                                                name="statut"
                                                value="refusee"
                                            >

                                            <button
                                                type="submit"
                                                class="w-full px-4 py-2.5 bg-red-50 text-red-600 border border-red-100 rounded-xl font-semibold hover:bg-red-100 transition"
                                            >
                                                ✕ Refuser
                                            </button>

                                        </form>

                                    </div>

                                @else

                                    <div class="border-t border-slate-100 pt-4 text-sm text-slate-500">
                                        Cette candidature a déjà été traitée.
                                    </div>

                                @endif


                            {{-- Actions Médecin --}}
                            @else

                                <div class="border-t border-slate-100 pt-5 flex gap-3">

                                    <a
                                        href="{{ route('candidatures.show', $candidature) }}"
                                        class="flex-1 text-center px-4 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                                    >
                                        Voir
                                    </a>

                                    @if($candidature->statut === 'en_attente')

                                        <a
                                            href="{{ route('candidatures.edit', $candidature) }}"
                                            class="px-5 py-2.5 bg-sky-50 text-blue-700 border border-sky-100 rounded-xl font-semibold hover:bg-sky-100 transition"
                                        >
                                            Modifier
                                        </a>

                                    @endif

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>


                {{-- Pagination --}}
                <div class="mt-7">
                    {{ $candidatures->links() }}
                </div>


            @else

                {{-- Empty state --}}
                <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-10 text-center">

                    <div class="w-14 h-14 mx-auto bg-sky-50 border border-sky-100 rounded-xl flex items-center justify-center text-2xl">
                        📋
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mt-4">

                        {{ auth()->user()->role === 'hopital'
                            ? 'Aucune candidature'
                            : 'Aucune candidature envoyée' }}

                    </h3>

                    <p class="text-sm text-slate-500 mt-2">

                        {{ auth()->user()->role === 'hopital'
                            ? "Vous n'avez reçu aucune candidature pour le moment."
                            : "Vous n'avez pas encore postulé à une mission." }}

                    </p>


                    @if(auth()->user()->role === 'hopital')

                        <a
                            href="{{ route('missions.create') }}"
                            class="inline-flex mt-5 px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                        >
                            + Créer une mission
                        </a>

                    @else

                        <a
                            href="{{ route('medecin.missions.index') }}"
                            class="inline-flex mt-5 px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                        >
                            Voir les missions
                        </a>

                    @endif

                </div>

            @endif

        </main>

    </div>

</x-app-layout>