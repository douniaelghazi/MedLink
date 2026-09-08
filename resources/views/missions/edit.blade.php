<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold">
                ESPACE HÔPITAL
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Modifier une mission
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-500
                        rounded-3xl
                        shadow-lg
                        p-8
                        mb-8
                        text-white">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16
                                bg-white/20
                                rounded-2xl
                                flex items-center justify-center
                                text-3xl">
                        ✏️
                    </div>

                    <div>

                        <p class="text-blue-100 text-sm font-medium">
                            Gestion des missions
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            Modifier la mission
                        </h1>

                        <p class="text-blue-50 mt-2">
                            Modifiez les informations de votre mission médicale.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Erreurs --}}
            @if ($errors->any())

                <div class="mb-6
                            bg-red-50
                            border border-red-200
                            text-red-700
                            p-4
                            rounded-xl">

                    <p class="font-semibold mb-2">
                        Veuillez corriger les erreurs suivantes :
                    </p>

                    <ul class="list-disc list-inside text-sm">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Formulaire --}}
            <div class="bg-white
                        rounded-3xl
                        shadow-sm
                        border border-sky-100
                        p-6 sm:p-8">

                <form method="POST"
                      action="{{ route('missions.update', $mission) }}">

                    @csrf
                    @method('PUT')


                    {{-- Informations --}}
                    <div class="mb-8">

                        <h2 class="text-xl font-bold text-blue-950 mb-1">
                            Informations de la mission
                        </h2>

                        <p class="text-sm text-gray-500">
                            Modifiez les informations principales de la mission.
                        </p>

                    </div>


                    {{-- Titre --}}
                    <div class="mb-6">

                        <label for="titre"
                               class="block text-sm font-semibold text-gray-700">
                            Titre
                        </label>

                        <input id="titre"
                               type="text"
                               name="titre"
                               value="{{ old('titre', $mission->titre) }}"
                               class="mt-2 block w-full rounded-xl border-gray-200
                                      focus:border-blue-500 focus:ring-blue-500"
                               required>

                        @error('titre')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="mb-6">

                        <label for="description"
                               class="block text-sm font-semibold text-gray-700">
                            Description
                        </label>

                        <textarea id="description"
                                  name="description"
                                  rows="5"
                                  class="mt-2 block w-full rounded-xl border-gray-200
                                         focus:border-blue-500 focus:ring-blue-500"
                                  required>{{ old('description', $mission->description) }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Spécialité --}}
                    <div class="mb-6">

                        <label for="specialite_recherchee"
                               class="block text-sm font-semibold text-gray-700">
                            Spécialité recherchée
                        </label>

                        <select id="specialite_recherchee"
                                name="specialite_recherchee"
                                class="mt-2 block w-full rounded-xl border-gray-200
                                       focus:border-blue-500 focus:ring-blue-500"
                                required>

                            <option value="">
                                -- Choisir une spécialité --
                            </option>

                            @foreach ($specialites as $specialite)

                                <option value="{{ $specialite->nom }}"
                                    {{ old('specialite_recherchee', $mission->specialite_recherchee) == $specialite->nom ? 'selected' : '' }}>

                                    {{ $specialite->nom }}

                                </option>

                            @endforeach

                        </select>

                        @error('specialite_recherchee')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Budget + Ville --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">

                        <div>

                            <label for="budget"
                                   class="block text-sm font-semibold text-gray-700">
                                Budget (DH)
                            </label>

                            <input id="budget"
                                   type="number"
                                   name="budget"
                                   value="{{ old('budget', $mission->budget) }}"
                                   min="0"
                                   step="0.01"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('budget')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        <div>

                            <label for="ville"
                                   class="block text-sm font-semibold text-gray-700">
                                Ville
                            </label>

                            <input id="ville"
                                   type="text"
                                   name="ville"
                                   value="{{ old('ville', $mission->ville) }}"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('ville')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- Dates --}}
                    <div class="border-t border-gray-100
                                pt-8 mt-8 mb-8">

                        <h2 class="text-xl font-bold text-blue-950 mb-1">
                            Période de la mission
                        </h2>

                        <p class="text-sm text-gray-500">
                            Modifiez les dates de la mission.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">

                        <div>

                            <label for="date_debut"
                                   class="block text-sm font-semibold text-gray-700">
                                Date de début
                            </label>

                            <input id="date_debut"
                                   type="date"
                                   name="date_debut"
                                   value="{{ old('date_debut', $mission->date_debut->format('Y-m-d')) }}"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('date_debut')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        <div>

                            <label for="date_fin"
                                   class="block text-sm font-semibold text-gray-700">
                                Date de fin
                            </label>

                            <input id="date_fin"
                                   type="date"
                                   name="date_fin"
                                   value="{{ old('date_fin', $mission->date_fin->format('Y-m-d')) }}"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('date_fin')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- Profil recherché --}}
                    <div class="border-t border-gray-100
                                pt-8 mt-8 mb-8">

                        <h2 class="text-xl font-bold text-blue-950 mb-1">
                            Profil recherché
                        </h2>

                        <p class="text-sm text-gray-500">
                            Modifiez le profil du médecin recherché.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">

                        {{-- Postes --}}
                        <div>

                            <label for="nombre_de_postes"
                                   class="block text-sm font-semibold text-gray-700">
                                Nombre de postes
                            </label>

                            <input id="nombre_de_postes"
                                   type="number"
                                   name="nombre_de_postes"
                                   value="{{ old('nombre_de_postes', $mission->nombre_de_postes) }}"
                                   min="1"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('nombre_de_postes')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Expérience --}}
                        <div>

                            <label for="niveau_d_experience"
                                   class="block text-sm font-semibold text-gray-700">
                                Niveau d'expérience
                            </label>

                            <select id="niveau_d_experience"
                                    name="niveau_d_experience"
                                    class="mt-2 block w-full rounded-xl border-gray-200
                                           focus:border-blue-500 focus:ring-blue-500"
                                    required>

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
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- Statut --}}
                    <div class="mb-8">

                        <label for="statut"
                               class="block text-sm font-semibold text-gray-700">
                            Statut de la mission
                        </label>

                        <select id="statut"
                                name="statut"
                                class="mt-2 block w-full rounded-xl border-gray-200
                                       focus:border-blue-500 focus:ring-blue-500"
                                required>

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
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Buttons --}}
                    <div class="border-t border-gray-100
                                pt-6
                                flex flex-col sm:flex-row
                                gap-3 sm:justify-end">

                        <a href="{{ route('missions.index') }}"
                           class="px-6 py-3
                                  text-center
                                  bg-gray-100
                                  text-gray-700
                                  rounded-xl
                                  font-semibold
                                  hover:bg-gray-200
                                  transition">

                            Annuler

                        </a>

                        <button type="submit"
                                class="px-6 py-3
                                       bg-blue-600
                                       text-white
                                       rounded-xl
                                       font-semibold
                                       hover:bg-blue-700
                                       transition
                                       shadow-md">

                            Enregistrer les modifications

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>