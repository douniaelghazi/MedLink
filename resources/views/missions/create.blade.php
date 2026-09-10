<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-4">

                <p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Hôpital
                </p>

                <h1 class="text-xl font-bold text-slate-900 mt-1">
                    Créer une mission
                </h1>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-4xl mx-auto px-6 py-6">

            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-6 sm:p-8">

                {{-- Intro --}}
                <div class="mb-7">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-lg">
                            📋
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-slate-900">
                                Informations de la mission
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Renseignez les informations principales de la mission.
                            </p>
                        </div>

                    </div>

                </div>


                <form method="POST" action="{{ route('missions.store') }}">

                    @csrf


                    {{-- Titre --}}
                    <div class="mb-5">

                        <label for="titre" class="block text-sm font-semibold text-slate-700">
                            Titre
                        </label>

                        <input
                            id="titre"
                            type="text"
                            name="titre"
                            value="{{ old('titre') }}"
                            placeholder="Ex : Médecin généraliste pour service d'urgence"
                            class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            required
                        >

                        @error('titre')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="mb-5">

                        <label for="description" class="block text-sm font-semibold text-slate-700">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            placeholder="Décrivez la mission, les responsabilités et les besoins..."
                            class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            required
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Spécialité --}}
                    <div class="mb-5">

                        <label for="specialite_recherchee" class="block text-sm font-semibold text-slate-700">
                            Spécialité recherchée
                        </label>

                        <select
                            id="specialite_recherchee"
                            name="specialite_recherchee"
                            class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            required
                        >

                            <option value="">
                                -- Choisir une spécialité --
                            </option>

                            @foreach($specialites as $specialite)

                                <option
                                    value="{{ $specialite->nom }}"
                                    {{ old('specialite_recherchee') == $specialite->nom ? 'selected' : '' }}
                                >
                                    {{ $specialite->nom }}
                                </option>

                            @endforeach

                        </select>

                        @error('specialite_recherchee')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Budget + Ville --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                        <div>

                            <label for="budget" class="block text-sm font-semibold text-slate-700">
                                Budget (DH)
                            </label>

                            <input
                                id="budget"
                                type="number"
                                name="budget"
                                value="{{ old('budget') }}"
                                min="0"
                                step="0.01"
                                placeholder="Ex : 6000"
                                class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >

                            @error('budget')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror

                        </div>


                        <div>

                            <label for="ville" class="block text-sm font-semibold text-slate-700">
                                Ville
                            </label>

                            <input
                                id="ville"
                                type="text"
                                name="ville"
                                value="{{ old('ville') }}"
                                placeholder="Ex : Béni Mellal"
                                class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >

                            @error('ville')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>


                    {{-- Dates --}}
                    <div class="border-t border-slate-100 pt-6 mt-6">

                        <h2 class="text-lg font-bold text-slate-900">
                            Période de la mission
                        </h2>

                        <p class="text-sm text-slate-500 mt-1 mb-5">
                            Indiquez les dates prévues pour la mission.
                        </p>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>

                                <label for="date_debut" class="block text-sm font-semibold text-slate-700">
                                    Date de début
                                </label>

                                <input
                                    id="date_debut"
                                    type="date"
                                    name="date_debut"
                                    value="{{ old('date_debut') }}"
                                    class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >

                                @error('date_debut')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>


                            <div>

                                <label for="date_fin" class="block text-sm font-semibold text-slate-700">
                                    Date de fin
                                </label>

                                <input
                                    id="date_fin"
                                    type="date"
                                    name="date_fin"
                                    value="{{ old('date_fin') }}"
                                    class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >

                                @error('date_fin')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- Profil recherché --}}
                    <div class="border-t border-slate-100 pt-6 mt-6">

                        <h2 class="text-lg font-bold text-slate-900">
                            Profil recherché
                        </h2>

                        <p class="text-sm text-slate-500 mt-1 mb-5">
                            Précisez le profil du médecin recherché.
                        </p>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>

                                <label for="nombre_de_postes" class="block text-sm font-semibold text-slate-700">
                                    Nombre de postes
                                </label>

                                <input
                                    id="nombre_de_postes"
                                    type="number"
                                    name="nombre_de_postes"
                                    value="{{ old('nombre_de_postes', 1) }}"
                                    min="1"
                                    class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >

                                @error('nombre_de_postes')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>


                            <div>

                                <label for="niveau_d_experience" class="block text-sm font-semibold text-slate-700">
                                    Niveau d'expérience
                                </label>

                                <select
                                    id="niveau_d_experience"
                                    name="niveau_d_experience"
                                    class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >

                                    <option value="">-- Choisir --</option>

                                    <option value="Débutant"
                                        {{ old('niveau_d_experience') === 'Débutant' ? 'selected' : '' }}>
                                        Débutant
                                    </option>

                                    <option value="Intermédiaire"
                                        {{ old('niveau_d_experience') === 'Intermédiaire' ? 'selected' : '' }}>
                                        Intermédiaire
                                    </option>

                                    <option value="Expérimenté"
                                        {{ old('niveau_d_experience') === 'Expérimenté' ? 'selected' : '' }}>
                                        Expérimenté
                                    </option>

                                </select>

                                @error('niveau_d_experience')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- Statut --}}
                    <div class="border-t border-slate-100 pt-6 mt-6">

                        <label for="statut" class="block text-sm font-semibold text-slate-700">
                            Statut de la mission
                        </label>

                        <select
                            id="statut"
                            name="statut"
                            class="mt-2 block w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            required
                        >

                            <option value="ouverte"
                                {{ old('statut', 'ouverte') === 'ouverte' ? 'selected' : '' }}>
                                Ouverte
                            </option>

                            <option value="fermee"
                                {{ old('statut') === 'fermee' ? 'selected' : '' }}>
                                Fermée
                            </option>

                            <option value="annulee"
                                {{ old('statut') === 'annulee' ? 'selected' : '' }}>
                                Annulée
                            </option>

                        </select>

                        @error('statut')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- Buttons --}}
                    <div class="border-t border-slate-100 pt-6 mt-6 flex flex-col sm:flex-row gap-3 sm:justify-end">

                        <a
                            href="{{ route('missions.index') }}"
                            class="px-5 py-2.5 text-center bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                        >
                            Annuler
                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm"
                        >
                            Créer la mission
                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>

</x-app-layout>