<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-blue-600">
                ESPACE MÉDECIN
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Modifier ma candidature
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        ✏️
                    </div>

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            Gestion de candidature
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            Modifier ma candidature
                        </h1>

                        <p class="text-blue-50 mt-2">
                            Modifiez les informations de votre candidature.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Formulaire --}}
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">

                <div class="p-6 sm:p-8">

                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-blue-950">
                            Informations de candidature
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Vous pouvez modifier votre candidature tant qu'elle est en attente.
                        </p>
                    </div>


                    <form method="POST"
                          action="{{ route('candidatures.update', $candidature) }}">

                        @csrf
                        @method('PUT')


                        {{-- Mission --}}
                        <div class="mb-6">

                            <label for="id_mission"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Mission
                            </label>

                            <select
                                name="id_mission"
                                id="id_mission"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

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
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Nom complet
                            </label>

                            <input
                                type="text"
                                name="nom"
                                id="nom"
                                value="{{ old('nom', $candidature->nom) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                            @error('nom')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- CV --}}
                        <div class="mb-6">

                            <label for="CV"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                CV
                            </label>

                            <input
                                type="text"
                                name="CV"
                                id="CV"
                                value="{{ old('CV', $candidature->CV) }}"
                                placeholder="Nom ou chemin du CV"
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                            @error('CV')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Message --}}
                        <div class="mb-6">

                            <label for="message"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Message
                            </label>

                            <textarea
                                name="message"
                                id="message"
                                rows="6"
                                placeholder="Votre message..."
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">{{ old('message', $candidature->message) }}</textarea>

                            @error('message')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Date --}}
                        <div class="mb-8">

                            <label for="date_candidature"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Date de candidature
                            </label>

                            <input
                                type="date"
                                name="date_candidature"
                                id="date_candidature"
                                value="{{ old('date_candidature', $candidature->date_candidature->format('Y-m-d')) }}"
                                required
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                            @error('date_candidature')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Boutons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-100">

                            <button
                                type="submit"
                                class="flex-1 px-6 py-3.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-md">
                                Enregistrer les modifications
                            </button>

                            <a
                                href="{{ route('candidatures.index') }}"
                                class="px-6 py-3.5 bg-gray-100 text-gray-700 rounded-xl font-semibold text-center hover:bg-gray-200 transition">
                                Annuler
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>