<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Hôpital
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-xl font-semibold mb-2">
                        Bienvenue Hôpital 🏥
                    </h3>

                    <p class="text-gray-600 mb-6">
                        Bienvenue dans votre espace de gestion.
                    </p>

                    <div class="flex gap-3">

                        <a href="{{ route('missions.index') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Mes missions
                        </a>

                        <a href="{{ route('hopital.candidatures.index') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Candidatures reçues
                        </a>

                        <a href="{{ route('hopital.profile.edit') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Mon profil
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>