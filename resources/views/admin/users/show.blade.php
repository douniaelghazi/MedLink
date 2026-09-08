<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-5">

                <div>
                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                        Espace Admin
                    </p>

                    <h1 class="text-2xl font-bold text-slate-900 mt-1">
                        Détails de l'utilisateur
                    </h1>
                </div>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-4xl mx-auto px-6 py-8">

            {{-- Card --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">

                {{-- Profile header --}}
                <div class="bg-gradient-to-r from-blue-600 to-sky-500 px-6 py-7">

                    <div class="flex items-center gap-4">

                        <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-3xl">
                            @if($user->role === 'admin')
                                👨‍💼
                            @elseif($user->role === 'hopital')
                                🏥
                            @else
                                👨‍⚕️
                            @endif
                        </div>

                        <div class="text-white">

                            <h2 class="text-2xl font-bold">
                                {{ $user->name }}
                            </h2>

                            <p class="text-blue-100 mt-1">
                                {{ $user->email }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Informations --}}
                <div class="p-6">

                    <h3 class="text-lg font-bold text-slate-900 mb-5">
                        Informations du compte
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- ID --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500">
                                ID utilisateur
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                #{{ $user->id }}
                            </p>

                        </div>


                        {{-- Nom --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500">
                                Nom
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $user->name }}
                            </p>

                        </div>


                        {{-- Email --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500">
                                Email
                            </p>

                            <p class="font-semibold text-slate-900 mt-1 break-all">
                                {{ $user->email }}
                            </p>

                        </div>


                        {{-- Rôle --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500 mb-2">
                                Rôle
                            </p>

                            @if($user->role === 'admin')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                    Admin
                                </span>

                            @elseif($user->role === 'hopital')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700">
                                    Hôpital
                                </span>

                            @else

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                    Médecin
                                </span>

                            @endif

                        </div>


                        {{-- Date --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4 md:col-span-2">

                            <p class="text-sm text-slate-500">
                                Inscrit le
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $user->created_at->format('d/m/Y à H:i') }}
                            </p>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="mt-7 pt-6 border-t border-slate-100 flex flex-wrap gap-3">

                        <a
                            href="{{ route('admin.users.index') }}"
                            class="inline-flex items-center px-5 py-2.5 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                        >
                            ← Retour
                        </a>

                        <a
                            href="{{ route('admin.users.edit', $user) }}"
                            class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm"
                        >
                            Modifier
                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>