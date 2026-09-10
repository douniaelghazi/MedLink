<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-4">

                <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Médecin
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
                            Trouvez des missions médicales adaptées à votre profil
                            et gérez facilement vos candidatures.
                        </p>

                    </div>

                    <div class="hidden sm:flex w-14 h-14 rounded-xl bg-white border border-blue-100 items-center justify-center text-2xl">
                        👨‍⚕️
                    </div>

                </div>

            </div>


            {{-- Statistiques --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

                {{-- Total --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                Mes candidatures
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $totalCandidatures }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Candidatures envoyées
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-lg">
                            📋
                        </div>

                    </div>

                </div>


                {{-- En attente --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                En attente
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $candidaturesEnAttente }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                En cours de traitement
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center text-lg">
                            ⏳
                        </div>

                    </div>

                </div>


                {{-- Acceptées --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                Acceptées
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $candidaturesAcceptees }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Missions obtenues
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-lg">
                            ✓
                        </div>

                    </div>

                </div>


                {{-- Refusées --}}
                <div class="bg-white rounded-xl border border-sky-100 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-slate-500">
                                Refusées
                            </p>

                            <p class="text-3xl font-bold text-slate-900 mt-1">
                                {{ $candidaturesRefusees }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Candidatures refusées
                            </p>
                        </div>

                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-lg">
                            ×
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

                    {{-- Missions --}}
                    <a
                        href="{{ route('medecin.missions.index') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            🔎
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Voir les missions
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Trouver une mission adaptée
                        </p>

                    </a>


                    {{-- Candidatures --}}
                    <a
                        href="{{ route('candidatures.index') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            📋
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Mes candidatures
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Suivre mes candidatures
                        </p>

                    </a>


                    {{-- Profil --}}
                    <a
                        href="{{ route('medecin.profile.edit') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            👤
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Mon profil
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Gérer mon profil médecin
                        </p>

                    </a>


                    {{-- Notifications --}}
                    <a
                        href="{{ route('notifications.index') }}"
                        class="group rounded-xl border border-sky-100 bg-sky-50 p-4 hover:bg-blue-600 transition"
                    >

                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center text-lg mb-3">
                            🔔
                        </div>

                        <h3 class="font-semibold text-slate-900 group-hover:text-white">
                            Notifications
                        </h3>

                        <p class="text-xs text-slate-500 group-hover:text-blue-100 mt-1">
                            Voir mes notifications
                        </p>

                    </a>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>