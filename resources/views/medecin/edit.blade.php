<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil Médecin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    {{-- Message de succès --}}
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Message d'erreur --}}
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Erreurs de validation --}}
                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('medecin.profile.update') }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Nom complet
                            </label>

                            <input type="text"
                                   name="nom_complet"
                                   value="{{ old('nom_complet', $medecin?->nom_complet) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', $medecin?->email) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Téléphone
                            </label>

                            <input type="text"
                                   name="telephone"
                                   value="{{ old('telephone', $medecin?->telephone) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Ville
                            </label>

                            <input type="text"
                                   name="ville"
                                   value="{{ old('ville', $medecin?->ville) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Expérience
                            </label>

                            <input type="text"
                                   name="experience"
                                   value="{{ old('experience', $medecin?->experience) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Diplôme
                            </label>

                            <input type="text"
                                   name="diplome"
                                   value="{{ old('diplome', $medecin?->diplome) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                CV
                            </label>

                            <input type="text"
                                   name="CV"
                                   value="{{ old('CV', $medecin?->CV) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Spécialité
                            </label>

                            <select name="id_specialite"
                                    class="w-full mt-1 border-gray-300 rounded-md"
                                    required>

                                @foreach($specialites as $specialite)
                                    <option value="{{ $specialite->id_specialite }}"
                                        {{ old('id_specialite', $medecin?->id_specialite) == $specialite->id_specialite ? 'selected' : '' }}>
                                        {{ $specialite->nom }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Disponibilité
                            </label>

                            <select name="disponibilite"
                                    class="w-full mt-1 border-gray-300 rounded-md"
                                    required>

                                <option value="1"
                                    {{ old('disponibilite', $medecin?->disponibilite) == 1 ? 'selected' : '' }}>
                                    Disponible
                                </option>

                                <option value="0"
                                    {{ old('disponibilite', $medecin?->disponibilite) == 0 ? 'selected' : '' }}>
                                    Non disponible
                                </option>

                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">
                                Description professionnelle
                            </label>

                            <textarea name="description_professionnelle"
                                      rows="5"
                                      class="w-full mt-1 border-gray-300 rounded-md">{{ old('description_professionnelle', $medecin?->description_professionnelle) }}</textarea>
                        </div>

                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Enregistrer
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>