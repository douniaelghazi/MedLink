<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Candidatures
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    {{-- Message succès --}}
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Message erreur --}}
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($candidatures->count() > 0)

                        <div class="space-y-4">

                            @foreach($candidatures as $candidature)

                                <div class="border rounded-lg p-5">

                                    <h3 class="text-lg font-semibold">
                                        {{ $candidature->nom }}
                                    </h3>

                                    <p class="text-gray-600 mt-1">
                                        Mission :
                                        {{ $candidature->mission->titre }}
                                    </p>

                                    <p class="mt-2">
                                        Message :
                                        {{ $candidature->message ?? 'Aucun message' }}
                                    </p>

                                    <p class="mt-2">
                                        Date :
                                        {{ $candidature->date_candidature->format('d/m/Y') }}
                                    </p>

                                    <p class="mt-2">
                                        Statut :
                                        <strong>
                                            {{ $candidature->statut }}
                                        </strong>
                                    </p>

                                    {{-- Boutons uniquement pour Hôpital --}}
                                    @if(auth()->user()->role === 'hopital' && $candidature->statut === 'en_attente')

                                        <div class="flex gap-3 mt-4">

                                            {{-- Accepter --}}
                                            <form method="POST"
                                                  action="{{ route('hopital.candidatures.statut', $candidature) }}">
                                                @csrf
                                                @method('PATCH')

                                                <input type="hidden"
                                                       name="statut"
                                                       value="acceptee">

                                                <button type="submit"
                                                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                                    Accepter
                                                </button>
                                            </form>

                                            {{-- Refuser --}}
                                            <form method="POST"
                                                  action="{{ route('hopital.candidatures.statut', $candidature) }}">
                                                @csrf
                                                @method('PATCH')

                                                <input type="hidden"
                                                       name="statut"
                                                       value="refusee">

                                                <button type="submit"
                                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Refuser
                                                </button>
                                            </form>

                                        </div>

                                    @endif

                                </div>

                            @endforeach

                        </div>

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $candidatures->links() }}
                        </div>

                    @else

                        <p class="text-gray-600">
                            Aucune candidature.
                        </p>

                    @endif

                </div>
            </div>

        </div>
    </div>

</x-app-layout>