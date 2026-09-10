<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-4">

                <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Hôpital
                </p>

                <h1 class="text-xl font-bold text-slate-900 mt-1">
                    Mon espace
                </h1>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-7xl mx-auto px-6 py-6">

            {{-- Welcome --}}
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 mb-6">

                <div class="flex items-center justify-between gap-5">

                    <div>

                        <p class="text-sm text-blue-600 font-medium mb-1">
                            Bienvenue dans votre espace
                        </p>

                        <h2 class="text-2xl font-bold text-slate-900">
                            Bonjour, {{ auth()->user()->name }} 👋
                        </h2>

                        <p class="text-sm text-slate-600 mt-2 max-w-xl">
                            Gérez vos missions médicales et consultez les candidatures reçues.
                        </p>

                    </div>

                    <div class="hidden sm:flex w-14 h-14 rounded-xl bg-white border border-blue-100 items-center justify-center text-2xl">
                        🏥
                    </div>

                </div>

            </div>


            {{-- Statistiques --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">

                {{-- Total missions --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                Total missions
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $totalMissions }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Missions créées
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-lg">
                            📋
                        </div>

                    </div>

                </div>


                {{-- Missions ouvertes --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                Missions ouvertes
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $missionsOuvertes }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Actuellement disponibles
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-sky-50 flex items-center justify-center text-lg">
                            🔓
                        </div>

                    </div>

                </div>


                {{-- Candidatures --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                Candidatures reçues
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $totalCandidatures }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Toutes vos missions
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-lg">
                            👨‍⚕️
                        </div>

                    </div>

                </div>

            </div>


            {{-- Actions rapides --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6">

                <div class="mb-5">

                    <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                        Actions rapides
                    </p>

                    <h2 class="text-xl font-bold text-slate-900 mt-1">
                        Gérez votre activité
                    </h2>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    {{-- Mes missions --}}
                    <a
                        href="{{ route('missions.index') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            📋
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Mes missions
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Consulter et gérer vos missions
                        </p>

                    </a>


                    {{-- Créer une mission --}}
                    <a
                        href="{{ route('missions.create') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            +
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Créer une mission
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Publier une nouvelle opportunité
                        </p>

                    </a>


                    {{-- Candidatures --}}
                    <a
                        href="{{ route('hopital.candidatures.index') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            👨‍⚕️
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Candidatures
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Consulter les candidatures reçues
                        </p>

                    </a>


                    {{-- Profil --}}
                    <a
                        href="{{ route('hopital.profile.edit') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            👤
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Mon profil
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Modifier les informations
                        </p>

                    </a>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>