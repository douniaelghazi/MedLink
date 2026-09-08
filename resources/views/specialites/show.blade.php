<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de la spécialité
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                {{-- ID --}}
                <div class="mb-5">
                    <p class="text-sm text-gray-500">
                        ID
                    </p>

                    <p class="text-lg font-semibold">
                        {{ $specialite->id_specialite }}
                    </p>
                </div>

                {{-- Nom --}}
                <div class="mb-5">
                    <p class="text-sm text-gray-500">
                        Nom
                    </p>

                    <p class="text-lg font-semibold">
                        {{ $specialite->nom }}
                    </p>
                </div>

                {{-- Description --}}
                <div class="mb-6">
                    <p class="text-sm text-gray-500">
                        Description
                    </p>

                    <p class="text-gray-800">
                        {{ $specialite->description ?? 'Aucune description.' }}
                    </p>
                </div>

                {{-- Actions --}}
                <div class="flex gap-3">

                    <a href="{{ route('specialites.edit', $specialite) }}"
                       class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
                        Modifier
                    </a>

                    <a href="{{ route('specialites.index') }}"
                       class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
                        Retour
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>