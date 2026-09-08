<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold">
                ESPACE HÔPITAL
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Dashboard
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


            {{-- ================= WELCOME ================= --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-500
                        rounded-3xl
                        shadow-lg
                        p-8
                        mb-8
                        text-white">

                <div class="flex flex-col md:flex-row
                            md:items-center
                            md:justify-between
                            gap-6">

                    <div>

                        <p class="text-blue-100 text-sm font-medium mb-2">
                            Bienvenue dans votre espace
                        </p>

                        <h1 class="text-3xl md:text-4xl font-bold">
                            Bonjour, {{ auth()->user()->name }} 👋
                        </h1>

                        <p class="mt-3 text-blue-50 max-w-xl">
                            Gérez vos missions médicales et consultez
                            les candidatures reçues depuis votre espace.
                        </p>

                    </div>


                    <div class="hidden md:flex
                                w-24 h-24
                                bg-white/15
                                rounded-3xl
                                items-center
                                justify-center
                                text-5xl">

                        🏥

                    </div>

                </div>

            </div>


            {{-- ================= STATISTICS ================= --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">


                {{-- Total missions --}}
                <div class="bg-white
                            rounded-2xl
                            shadow-sm
                            border border-sky-100
                            p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Total missions
                            </p>

                            <p class="text-4xl font-bold text-blue-950 mt-2">
                                {{ $totalMissions }}
                            </p>

                            <p class="text-sm text-gray-400 mt-2">
                                Missions créées
                            </p>

                        </div>

                        <div class="w-14 h-14
                                    bg-blue-100
                                    text-blue-600
                                    rounded-2xl
                                    flex items-center justify-center
                                    text-2xl">

                            📋

                        </div>

                    </div>

                </div>


                {{-- Missions ouvertes --}}
                <div class="bg-white
                            rounded-2xl
                            shadow-sm
                            border border-sky-100
                            p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Missions ouvertes
                            </p>

                            <p class="text-4xl font-bold text-blue-950 mt-2">
                                {{ $missionsOuvertes }}
                            </p>

                            <p class="text-sm text-gray-400 mt-2">
                                Actuellement disponibles
                            </p>

                        </div>

                        <div class="w-14 h-14
                                    bg-sky-100
                                    text-sky-600
                                    rounded-2xl
                                    flex items-center justify-center
                                    text-2xl">

                            🔓

                        </div>

                    </div>

                </div>


                {{-- Candidatures --}}
                <div class="bg-white
                            rounded-2xl
                            shadow-sm
                            border border-sky-100
                            p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Candidatures reçues
                            </p>

                            <p class="text-4xl font-bold text-blue-950 mt-2">
                                {{ $totalCandidatures }}
                            </p>

                            <p class="text-sm text-gray-400 mt-2">
                                Toutes vos missions
                            </p>

                        </div>

                        <div class="w-14 h-14
                                    bg-blue-100
                                    text-blue-600
                                    rounded-2xl
                                    flex items-center justify-center
                                    text-2xl">

                            👨‍⚕️

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= ACTIONS ================= --}}
            <div class="bg-white
                        rounded-2xl
                        shadow-sm
                        border border-sky-100
                        p-6 mb-8">

                <div class="mb-6">

                    <p class="text-blue-600 text-sm font-semibold uppercase">
                        Actions rapides
                    </p>

                    <h2 class="text-2xl font-bold text-blue-950 mt-1">
                        Gérez votre activité
                    </h2>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


                    {{-- Mes missions --}}
                    <a href="{{ route('missions.index') }}"
                       class="group
                              p-5
                              rounded-2xl
                              bg-sky-50
                              border border-sky-100
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <div class="w-12 h-12
                                    bg-white
                                    text-blue-600
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl
                                    mb-4
                                    shadow-sm">

                            📋

                        </div>

                        <h3 class="font-bold text-lg">
                            Mes missions
                        </h3>

                        <p class="text-sm text-gray-500 group-hover:text-blue-100 mt-1">
                            Consulter et gérer vos missions
                        </p>

                    </a>


                    {{-- Créer --}}
                    <a href="{{ route('missions.create') }}"
                       class="group
                              p-5
                              rounded-2xl
                              bg-blue-50
                              border border-blue-100
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <div class="w-12 h-12
                                    bg-white
                                    text-blue-600
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl
                                    mb-4
                                    shadow-sm">

                            +

                        </div>

                        <h3 class="font-bold text-lg">
                            Créer une mission
                        </h3>

                        <p class="text-sm text-gray-500 group-hover:text-blue-100 mt-1">
                            Publier une nouvelle opportunité
                        </p>

                    </a>


                    {{-- Candidatures --}}
                    <a href="{{ route('hopital.candidatures.index') }}"
                       class="group
                              p-5
                              rounded-2xl
                              bg-sky-50
                              border border-sky-100
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <div class="w-12 h-12
                                    bg-white
                                    text-blue-600
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl
                                    mb-4
                                    shadow-sm">

                            👨‍⚕️

                        </div>

                        <h3 class="font-bold text-lg">
                            Candidatures
                        </h3>

                        <p class="text-sm text-gray-500 group-hover:text-blue-100 mt-1">
                            Consulter les candidatures reçues
                        </p>

                    </a>


                    {{-- Profil --}}
                    <a href="{{ route('hopital.profile.edit') }}"
                       class="group
                              p-5
                              rounded-2xl
                              bg-blue-50
                              border border-blue-100
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <div class="w-12 h-12
                                    bg-white
                                    text-blue-600
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl
                                    mb-4
                                    shadow-sm">

                            👤

                        </div>

                        <h3 class="font-bold text-lg">
                            Mon profil
                        </h3>

                        <p class="text-sm text-gray-500 group-hover:text-blue-100 mt-1">
                            Modifier les informations de l'hôpital
                        </p>

                    </a>

                </div>

            </div>


            {{-- ================= BOTTOM ================= --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


                {{-- Notifications --}}
                <div class="bg-white
                            rounded-2xl
                            shadow-sm
                            border border-sky-100
                            p-6">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    bg-yellow-100
                                    text-yellow-600
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl">

                            🔔

                        </div>

                        <div>

                            <h3 class="font-bold text-blue-950">
                                Notifications
                            </h3>

                            <p class="text-sm text-gray-500">
                                Consultez vos dernières notifications.
                            </p>

                        </div>

                    </div>

                    <a href="{{ route('notifications.index') }}"
                       class="inline-block mt-5
                              text-blue-600
                              font-semibold
                              hover:text-blue-800">

                        Voir mes notifications →

                    </a>

                </div>


                {{-- Information --}}
                <div class="bg-blue-600
                            rounded-2xl
                            p-6
                            text-white">

                    <h3 class="text-xl font-bold">
                        Trouvez les bons médecins
                    </h3>

                    <p class="text-blue-100 mt-2 leading-relaxed">
                        Publiez vos missions médicales et gérez les
                        candidatures des médecins depuis une seule plateforme.
                    </p>

                    <a href="{{ route('missions.create') }}"
                       class="inline-block mt-5
                              px-5 py-2.5
                              bg-white
                              text-blue-700
                              rounded-xl
                              font-semibold
                              hover:bg-sky-50">

                        Publier une mission →

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>