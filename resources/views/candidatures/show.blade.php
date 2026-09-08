<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-blue-600">
                ESPACE MÉDECIN
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Détails de ma candidature
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        📋
                    </div>

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            Suivi de candidature
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            Détails de ma candidature
                        </h1>

                        <p class="text-blue-50 mt-2">
                            Consultez les informations et le statut de votre candidature.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Contenu --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Informations candidature --}}
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-blue-100 p-6">

                    <div class="flex items-center justify-between gap-4 mb-6">

                        <div>
                            <p class="text-sm text-gray-500">
                                Candidat
                            </p>

                            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                                {{ $candidature->nom }}
                            </h2>
                        </div>


                        {{-- Statut --}}
                        @if($candidature->statut === 'en_attente')

                            <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
                                En attente
                            </span>

                        @elseif($candidature->statut === 'acceptee')

                            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                                Acceptée
                            </span>

                        @elseif($candidature->statut === 'refusee')

                            <span class="px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
                                Refusée
                            </span>

                        @else

                            <span class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-semibold">
                                Annulée
                            </span>

                        @endif

                    </div>


                    {{-- Mission --}}
                    <div class="bg-sky-50 rounded-xl p-5 mb-6">

                        <p class="text-xs text-gray-500">
                            Mission
                        </p>

                        <h3 class="text-lg font-bold text-blue-950 mt-1">
                            {{ $candidature->mission->titre ?? 'N/A' }}
                        </h3>

                        <p class="text-sm text-gray-600 mt-2">
                            📍 {{ $candidature->mission->ville ?? 'N/A' }}
                        </p>

                    </div>


                    {{-- Message --}}
                    <div class="mb-6">

                        <h3 class="text-sm font-semibold text-gray-700 mb-2">
                            Votre message
                        </h3>

                        <div class="bg-gray-50 rounded-xl p-4 text-gray-600 leading-relaxed">
                            {{ $candidature->message ?? 'Aucun message' }}
                        </div>

                    </div>


                    {{-- CV --}}
                    <div class="mb-6">

                        <h3 class="text-sm font-semibold text-gray-700 mb-2">
                            CV
                        </h3>

                        <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-4">

                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                                📄
                            </div>

                            <p class="text-gray-700">
                                {{ $candidature->CV ?? 'Aucun CV' }}
                            </p>

                        </div>

                    </div>


                    {{-- Date --}}
                    <div>

                        <h3 class="text-sm font-semibold text-gray-700 mb-2">
                            Date de candidature
                        </h3>

                        <div class="flex items-center gap-3 text-gray-600">
                            <span>📅</span>

                            <span>
                                {{ $candidature->date_candidature->format('d/m/Y') }}
                            </span>
                        </div>

                    </div>

                </div>


                {{-- Résumé --}}
                <div class="bg-white rounded-2xl shadow-sm border border-blue-100 p-6 h-fit">

                    <h2 class="text-xl font-bold text-blue-950 mb-6">
                        Résumé
                    </h2>

                    <div class="space-y-5">

                        <div>
                            <p class="text-xs text-gray-500">
                                Statut
                            </p>

                            <p class="font-bold text-blue-600 mt-1">
                                {{ ucfirst(str_replace('_', ' ', $candidature->statut)) }}
                            </p>
                        </div>

                        <div class="border-t border-gray-100 pt-5">

                            <p class="text-xs text-gray-500">
                                Mission
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                {{ $candidature->mission->titre ?? 'N/A' }}
                            </p>

                        </div>

                        <div class="border-t border-gray-100 pt-5">

                            <p class="text-xs text-gray-500">
                                Ville
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
                                📍 {{ $candidature->mission->ville ?? 'N/A' }}
                            </p>

                        </div>

                        <div class="border-t border-gray-100 pt-5">

                            <p class="text-xs text-gray-500">
                                Date
                            </p>

                            <p class="font-semibold text-blue-950 mt-1">
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

        </div>

    </div>

</x-app-layout>