<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de ma candidature
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-xl font-semibold mb-6">
                        {{ $candidature->nom }}
                    </h3>

                    <div class="space-y-4">

                        <div>
                            <strong>Mission :</strong>
                            {{ $candidature->mission->titre ?? 'N/A' }}
                        </div>

                        <div>
                            <strong>Ville :</strong>
                            {{ $candidature->mission->ville ?? 'N/A' }}
                        </div>

                        <div>
                            <strong>CV :</strong>
                            {{ $candidature->CV ?? 'Aucun CV' }}
                        </div>

                        <div>
                            <strong>Message :</strong>
                            {{ $candidature->message ?? 'Aucun message' }}
                        </div>

                        <div>
                            <strong>Date de candidature :</strong>
                            {{ $candidature->date_candidature->format('d/m/Y') }}
                        </div>

                        <div>
                            <strong>Statut :</strong>
                            {{ ucfirst(str_replace('_', ' ', $candidature->statut)) }}
                        </div>

                    </div>

                    <div class="mt-6">

                        <a href="{{ route('candidatures.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Retour
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>