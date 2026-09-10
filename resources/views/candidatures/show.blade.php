<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                Espace Médecin
            </p>

            <h2 class="text-xl font-bold text-slate-900 mt-1">
                Détails de ma candidature
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        {{-- En-tête --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-5xl mx-auto px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-xl">
                        📋
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                            Suivi de candidature
                        </p>

                        <h1 class="text-xl font-bold text-slate-900">
                            Détails de ma candidature
                        </h1>

                        <p class="text-sm text-slate-500 mt-1">
                            Consultez les informations et le statut de votre candidature.
                        </p>
                    </div>

                </div>

            </div>
        </div>


        <main class="max-w-5xl mx-auto px-6 py-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Informations candidature --}}
                <div class="lg:col-span-2 bg-white rounded-2xl border border-sky-100 shadow-sm p-6">

                    {{-- Nom + statut --}}
                    <div class="flex items-start justify-between gap-4 mb-6">

                        <div>
                            <p class="text-sm text-slate-500">
                                Candidat
                            </p>

                            <h2 class="text-xl font-bold text-slate-900 mt-1">
                                {{ $candidature->nom }}
                            </h2>
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
                    <div class="bg-sky-50 border border-sky-100 rounded-xl p-4 mb-6">

                        <p class="text-xs text-slate-500">
                            Mission
                        </p>

                        <h3 class="text-lg font-bold text-slate-900 mt-1">
                            {{ $candidature->mission->titre ?? 'N/A' }}
                        </h3>

                        <p class="text-sm text-slate-600 mt-2">
                            📍 {{ $candidature->mission->ville ?? 'N/A' }}
                        </p>

                    </div>


                    {{-- Message --}}
                    <div class="mb-6">

                        <h3 class="text-sm font-semibold text-slate-700 mb-2">
                            Votre message
                        </h3>

                        <div class="bg-slate-50 border border-slate-100 rounded-xl p-4 text-sm text-slate-600 leading-relaxed">
                            {{ $candidature->message ?? 'Aucun message' }}
                        </div>

                    </div>


                    {{-- CV --}}
                    <div class="mb-6">

                        <h3 class="text-sm font-semibold text-slate-700 mb-2">
                            CV
                        </h3>

                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-100 rounded-xl p-4">

                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                                📄
                            </div>

                            <p class="text-sm text-slate-700">
                                {{ $candidature->CV ?? 'Aucun CV' }}
                            </p>

                        </div>

                    </div>


                    {{-- Date --}}
                    <div>

                        <h3 class="text-sm font-semibold text-slate-700 mb-2">
                            Date de candidature
                        </h3>

                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <span>📅</span>

                            <span>
                                {{ $candidature->date_candidature->format('d/m/Y') }}
                            </span>
                        </div>

                    </div>

                </div>


                {{-- Résumé --}}
                <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6 h-fit">

                    <h2 class="text-lg font-bold text-slate-900 mb-6">
                        Résumé
                    </h2>

                    <div class="space-y-5">

                        {{-- Statut --}}
                        <div>
                            <p class="text-xs text-slate-500">
                                Statut
                            </p>

                            <p class="font-bold text-blue-600 mt-1">
                                {{ ucfirst(str_replace('_', ' ', $candidature->statut)) }}
                            </p>
                        </div>


                        {{-- Mission --}}
                        <div class="border-t border-slate-100 pt-5">

                            <p class="text-xs text-slate-500">
                                Mission
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $candidature->mission->titre ?? 'N/A' }}
                            </p>

                        </div>


                        {{-- Ville --}}
                        <div class="border-t border-slate-100 pt-5">

                            <p class="text-xs text-slate-500">
                                Ville
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                📍 {{ $candidature->mission->ville ?? 'N/A' }}
                            </p>

                        </div>


                        {{-- Date --}}
                        <div class="border-t border-slate-100 pt-5">

                            <p class="text-xs text-slate-500">
                                Date
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $candidature->date_candidature->format('d/m/Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- Retour --}}
                    <a
                        href="{{ route('candidatures.index') }}"
                        class="block w-full text-center mt-7 px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                        ← Retour à mes candidatures
                    </a>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>