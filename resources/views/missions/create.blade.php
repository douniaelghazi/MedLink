<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer une mission
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('missions.store') }}">
                        @csrf

                        {{-- Titre --}}
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Titre
                            </label>

                            <input type="text"
                                   name="titre"
                                   value="{{ old('titre') }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>

                            @error('titre')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="w-full mt-1 border-gray-300 rounded-md"
                                      required>{{ old('description') }}</textarea>

                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Spécialité --}}
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Spécialité recherchée
                            </label>

                            <select name="specialite_recherchee"
                                    class="w-full mt-1 border-gray-300 rounded-md"
                                    required>

                                <option value="">
                                    -- Choisir une spécialité --
                                </option>

                                @foreach($specialites as $specialite)
                                    <option value="{{ $specialite->nom }}"
                                        {{ old('specialite_recherchee') == $specialite->nom ? 'selected' : '' }}>
                                        {{ $specialite->nom }}
                                    </option>
                                @endforeach

                            </select>

                            @error('specialite_recherchee')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Budget --}}
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Budget (DH)
                            </label>

                            <input type="number"
                                   name="budget"
                                   value="{{ old('budget') }}"
                                   min="0"
                                   step="0.01"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>

                            @error('budget')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Ville --}}
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Ville
                            </label>

                            <input type="text"
                                   name="ville"
                                   value="{{ old('ville') }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>

                            @error('ville')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Dates --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label class="block font-medium text-sm text-gray-700">
                                    Date début
                                </label>

                                <input type="date"
                                       name="date_debut"
                                       value="{{ old('date_debut') }}"
                                       class="w-full mt-1 border-gray-300 rounded-md"
                                       required>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">
                                    Date fin
                                </label>

                                <input type="date"
                                       name="date_fin"
                                       value="{{ old('date_fin') }}"
                                       class="w-full mt-1 border-gray-300 rounded-md"
                                       required>
                            </div>

                        </div>

                        {{-- Nombre de postes --}}
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Nombre de postes
                            </label>

                            <input type="number"
                                   name="nombre_de_postes"
                                   value="{{ old('nombre_de_postes', 1) }}"
                                   min="1"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        {{-- Niveau expérience --}}
                        <div>
    <label for="niveau_d_experience" class="block font-medium text-sm text-gray-700">
        Niveau d'expérience
    </label>

    <select name="niveau_d_experience" id="niveau_d_experience"
            class="mt-1 block w-full border-gray-300 rounded-md">
        <option value="">-- Choisir --</option>
        <option value="Débutant">Débutant</option>
        <option value="Intermédiaire">Intermédiaire</option>
        <option value="Expérimenté">Expérimenté</option>
    </select>

    @error('niveau_d_experience')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
                        {{-- Statut --}}
                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">
                                Statut
                            </label>

                            <select name="statut"
                                    class="w-full mt-1 border-gray-300 rounded-md"
                                    required>

                                <option value="ouverte">Ouverte</option>
                                <option value="fermee">Fermée</option>
                                <option value="annulee">Annulée</option>

                            </select>
                        </div>

                        {{-- Boutons --}}
                        <div class="flex gap-3">

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Créer la mission
                            </button>

                            <a href="{{ route('missions.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Annuler
                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>