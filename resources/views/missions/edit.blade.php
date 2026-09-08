<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier la mission
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                {{-- Erreurs --}}
                @if ($errors->any())

                    <div class="mb-6 bg-red-100 text-red-700 p-4 rounded-md">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif


                <form method="POST"
                      action="{{ route('missions.update', $mission) }}">

                    @csrf
                    @method('PUT')


                    {{-- Titre --}}
                    <div class="mb-4">

                        <label for="titre" class="block font-medium mb-1">
                            Titre
                        </label>

                        <input
                            type="text"
                            id="titre"
                            name="titre"
                            value="{{ old('titre', $mission->titre) }}"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('titre')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Spécialité recherchée --}}
                    <div class="mb-4">

                        <label for="specialite_recherchee"
                               class="block font-medium mb-1">
                            Spécialité recherchée
                        </label>

                        <select
                            id="specialite_recherchee"
                            name="specialite_recherchee"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                            <option value="">
                                -- Choisir une spécialité --
                            </option>

                            @foreach ($specialites as $specialite)

                                <option
                                    value="{{ $specialite->nom }}"
                                    {{ old('specialite_recherchee', $mission->specialite_recherchee) == $specialite->nom ? 'selected' : '' }}
                                >
                                    {{ $specialite->nom }}
                                </option>

                            @endforeach

                        </select>

                        @error('specialite_recherchee')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="mb-4">

                        <label for="description"
                               class="block font-medium mb-1">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >{{ old('description', $mission->description) }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Budget --}}
                    <div class="mb-4">

                        <label for="budget"
                               class="block font-medium mb-1">
                            Budget (DH)
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            id="budget"
                            name="budget"
                            value="{{ old('budget', $mission->budget) }}"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('budget')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Ville --}}
                    <div class="mb-4">

                        <label for="ville"
                               class="block font-medium mb-1">
                            Ville
                        </label>

                        <input
                            type="text"
                            id="ville"
                            name="ville"
                            value="{{ old('ville', $mission->ville) }}"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('ville')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Date début --}}
                    <div class="mb-4">

                        <label for="date_debut"
                               class="block font-medium mb-1">
                            Date de début
                        </label>

                        <input
                            type="date"
                            id="date_debut"
                            name="date_debut"
                            value="{{ old('date_debut', $mission->date_debut->format('Y-m-d')) }}"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('date_debut')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Date fin --}}
                    <div class="mb-4">

                        <label for="date_fin"
                               class="block font-medium mb-1">
                            Date de fin
                        </label>

                        <input
                            type="date"
                            id="date_fin"
                            name="date_fin"
                            value="{{ old('date_fin', $mission->date_fin->format('Y-m-d')) }}"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('date_fin')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Nombre de postes --}}
                    <div class="mb-4">

                        <label for="nombre_de_postes"
                               class="block font-medium mb-1">
                            Nombre de postes
                        </label>

                        <input
                            type="number"
                            id="nombre_de_postes"
                            name="nombre_de_postes"
                            value="{{ old('nombre_de_postes', $mission->nombre_de_postes) }}"
                            min="1"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                        @error('nombre_de_postes')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Niveau d'expérience --}}
                    <div class="mb-4">

                        <label for="niveau_d_experience"
                               class="block font-medium mb-1">
                            Niveau d'expérience
                        </label>

                        <select
                            id="niveau_d_experience"
                            name="niveau_d_experience"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                            <option value="Débutant"
                                {{ old('niveau_d_experience', $mission->niveau_d_experience) == 'Débutant' ? 'selected' : '' }}>
                                Débutant
                            </option>

                            <option value="Intermédiaire"
                                {{ old('niveau_d_experience', $mission->niveau_d_experience) == 'Intermédiaire' ? 'selected' : '' }}>
                                Intermédiaire
                            </option>

                            <option value="Expérimenté"
                                {{ old('niveau_d_experience', $mission->niveau_d_experience) == 'Expérimenté' ? 'selected' : '' }}>
                                Expérimenté
                            </option>

                        </select>

                        @error('niveau_d_experience')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Statut --}}
                    <div class="mb-6">

                        <label for="statut"
                               class="block font-medium mb-1">
                            Statut
                        </label>

                        <select
                            id="statut"
                            name="statut"
                            class="w-full border-gray-300 rounded-md"
                            required
                        >

                            <option value="ouverte"
                                {{ old('statut', $mission->statut) == 'ouverte' ? 'selected' : '' }}>
                                Ouverte
                            </option>

                            <option value="fermee"
                                {{ old('statut', $mission->statut) == 'fermee' ? 'selected' : '' }}>
                                Fermée
                            </option>

                            <option value="annulee"
                                {{ old('statut', $mission->statut) == 'annulee' ? 'selected' : '' }}>
                                Annulée
                            </option>

                        </select>

                        @error('statut')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Buttons --}}
                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700"
                        >
                            Enregistrer les modifications
                        </button>

                        <a
                            href="{{ route('missions.index') }}"
                            class="bg-gray-500 text-white px-5 py-2 rounded-md hover:bg-gray-600"
                        >
                            Annuler
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>