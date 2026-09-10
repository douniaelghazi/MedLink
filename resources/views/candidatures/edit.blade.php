<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                Espace Médecin
            </p>

            <h2 class="text-xl font-bold text-slate-900 mt-1">
                Modifier ma candidature
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <main class="max-w-5xl mx-auto px-6 py-6">

            {{-- Formulaire --}}
            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm">

                <div class="p-6 sm:p-8">

                    {{-- Introduction --}}
                    <div class="mb-7">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center text-lg">
                                ✏️
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-slate-900">
                                    Informations de candidature
                                </h2>

                                <p class="text-sm text-slate-500 mt-1">
                                    Vous pouvez modifier votre candidature tant qu'elle est en attente.
                                </p>
                            </div>

                        </div>

                    </div>


                    <form method="POST"
                          action="{{ route('candidatures.update', $candidature) }}">

                        @csrf
                        @method('PUT')


                        {{-- Mission --}}
                        <div class="mb-6">

                            <label for="id_mission"
                                   class="block text-sm font-semibold text-slate-700 mb-2">
                                Mission
                            </label>

                            <select
                                name="id_mission"
                                id="id_mission"
                                required
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                                @foreach($missions as $mission)

                                    <option
                                        value="{{ $mission->id_mission }}"
                                        {{ old('id_mission', $candidature->id_mission) == $mission->id_mission ? 'selected' : '' }}>

                                        {{ $mission->titre }} - {{ $mission->ville }}

                                    </option>

                                @endforeach

                            </select>

                            @error('id_mission')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Nom --}}
                        <div class="mb-6">

                            <label for="nom"
                                   class="block text-sm font-semibold text-slate-700 mb-2">
                                Nom complet
                            </label>

                            <input
                                type="text"
                                name="nom"
                                id="nom"
                                value="{{ old('nom', $candidature->nom) }}"
                                required
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                            @error('nom')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- CV --}}
                        <div class="mb-6">

                            <label for="CV"
                                   class="block text-sm font-semibold text-slate-700 mb-2">
                                CV
                            </label>

                            <input
                                type="text"
                                name="CV"
                                id="CV"
                                value="{{ old('CV', $candidature->CV) }}"
                                placeholder="Nom ou chemin du CV"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                            <p class="mt-2 text-xs text-slate-500">
                                Indiquez le nom ou le chemin de votre CV.
                            </p>

                            @error('CV')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Message --}}
                        <div class="mb-6">

                            <label for="message"
                                   class="block text-sm font-semibold text-slate-700 mb-2">
                                Message
                            </label>

                            <textarea
                                name="message"
                                id="message"
                                rows="5"
                                placeholder="Votre message..."
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">{{ old('message', $candidature->message) }}</textarea>

                            @error('message')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Date --}}
                        <div class="mb-8">

                            <label for="date_candidature"
                                   class="block text-sm font-semibold text-slate-700 mb-2">
                                Date de candidature
                            </label>

                            <input
                                type="date"
                                name="date_candidature"
                                id="date_candidature"
                                value="{{ old('date_candidature', $candidature->date_candidature->format('Y-m-d')) }}"
                                required
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                            @error('date_candidature')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Boutons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-slate-100">

                            <button
                                type="submit"
                                class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                                Enregistrer les modifications
                            </button>

                            <a
                                href="{{ route('candidatures.index') }}"
                                class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl font-semibold text-center hover:bg-slate-200 transition">
                                Annuler
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>