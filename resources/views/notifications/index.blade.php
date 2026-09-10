<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                MedLink
            </p>

            <h2 class="text-xl font-bold text-slate-900 mt-1">
                Notifications
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-4xl mx-auto px-6 py-6">

            {{-- En-tête --}}
            <div class="flex items-center gap-3 mb-6">

                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-lg">
                    🔔
                </div>

                <div>
                    <h1 class="text-lg font-bold text-slate-900">
                        Mes notifications
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Consultez les dernières notifications de votre espace MedLink.
                    </p>
                </div>

            </div>


            {{-- Notifications --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-5">

                @forelse($notifications as $notification)

                    <div class="flex items-start gap-4 p-4 mb-3 bg-sky-50 border border-sky-100 rounded-xl">

                        {{-- Icône --}}
                        <div class="w-10 h-10 shrink-0 bg-white rounded-lg flex items-center justify-center text-lg">
                            🔔
                        </div>


                        {{-- Contenu --}}
                        <div class="flex-1">

                            <p class="text-sm font-semibold text-slate-800">
                                {{ $notification->data['message'] ?? 'Nouvelle notification' }}
                            </p>

                            <p class="text-xs text-slate-500 mt-2">
                                {{ $notification->created_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>

                    </div>

                @empty

                    {{-- État vide --}}
                    <div class="text-center py-10">

                        <div class="w-14 h-14 mx-auto bg-sky-50 border border-sky-100 rounded-xl flex items-center justify-center text-2xl">
                            🔔
                        </div>

                        <h3 class="text-lg font-bold text-slate-900 mt-4">
                            Aucune notification
                        </h3>

                        <p class="text-sm text-slate-500 mt-2">
                            Vous n'avez aucune nouvelle notification pour le moment.
                        </p>

                    </div>

                @endforelse

            </div>

        </main>

    </div>

</x-app-layout>