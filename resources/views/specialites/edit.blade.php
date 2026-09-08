<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-5">

                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Admin
                </p>

                <h1 class="text-2xl font-bold text-slate-900 mt-1">
                    Modifier la spécialité
                </h1>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-3xl mx-auto px-6 py-8">

            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">

                {{-- Card header --}}
                <div class="bg-gradient-to-r from-blue-600 to-sky-500 px-6 py-6">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-2xl">
                            🩺
                        </div>

                        <div class="text-white">

                            <h2 class="text-xl font-bold">
                                {{ $specialite->nom }}
                            </h2>

                            <p class="text-blue-100 text-sm mt-1">
                                Modifier les informations de cette spécialité.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="p-6">

                    <form
                        action="{{ route('specialites.update', $specialite) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- Nom --}}
                        <div class="mb-6">

                            <label
                                for="nom"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Nom de la spécialité
                            </label>

                            <input
                                type="text"
                                id="nom"
                                name="nom"
                                value="{{ old('nom', $specialite->nom) }}"
                                class="w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            >

                            @error('nom')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Description --}}
                        <div class="mb-6">

                            <label
                                for="description"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Description de la spécialité..."
                                class="w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            >{{ old('description', $specialite->description) }}</textarea>

                            @error('description')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Buttons --}}
                        <div class="pt-5 border-t border-slate-100 flex flex-wrap gap-3">

                            <a
                                href="{{ route('specialites.index') }}"
                                class="px-5 py-2.5 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                            >
                                ← Annuler
                            </a>

                            <button
                                type="submit"
                                class="px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm"
                            >
                                Enregistrer les modifications
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>