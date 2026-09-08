<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-5">

                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Admin
                </p>

                <h1 class="text-2xl font-bold text-slate-900 mt-1">
                    Détails de la spécialité
                </h1>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-3xl mx-auto px-6 py-8">

            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">

                {{-- Card header --}}
                <div class="bg-gradient-to-r from-blue-600 to-sky-500 px-6 py-7">

                    <div class="flex items-center gap-4">

                        <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-3xl">
                            🩺
                        </div>

                        <div class="text-white">

                            <h2 class="text-2xl font-bold">
                                {{ $specialite->nom }}
                            </h2>

                            <p class="text-blue-100 mt-1">
                                Spécialité médicale
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Informations --}}
                <div class="p-6">

                    <div class="grid grid-cols-1 gap-4">

                        {{-- ID --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500">
                                ID de la spécialité
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                #{{ $specialite->id_specialite }}
                            </p>

                        </div>


                        {{-- Nom --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500">
                                Nom
                            </p>

                            <p class="font-semibold text-slate-900 mt-1">
                                {{ $specialite->nom }}
                            </p>

                        </div>


                        {{-- Description --}}
                        <div class="rounded-xl bg-sky-50 border border-sky-100 p-4">

                            <p class="text-sm text-slate-500 mb-2">
                                Description
                            </p>

                            <p class="text-slate-700 leading-relaxed">
                                {{ $specialite->description ?? 'Aucune description.' }}
                            </p>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="mt-7 pt-6 border-t border-slate-100 flex flex-wrap gap-3">

                        <a
                            href="{{ route('specialites.index') }}"
                            class="px-5 py-2.5 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                        >
                            ← Retour
                        </a>

                        <a
                            href="{{ route('specialites.edit', $specialite) }}"
                            class="px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm"
                        >
                            Modifier
                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>