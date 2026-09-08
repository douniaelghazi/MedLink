<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-blue-600">
                ESPACE MÉDECIN
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Profil Médecin
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-sky-50 py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl p-8 mb-8 text-white shadow-lg">

                <div class="flex items-center gap-5">

                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        👨‍⚕️
                    </div>

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            Mon espace professionnel
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            Mon profil
                        </h1>

                        <p class="text-blue-50 mt-2">
                            Gérez vos informations professionnelles et votre disponibilité.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Messages --}}
            @if(session('success'))

                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>

            @endif


            @if(session('error'))

                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    {{ session('error') }}
                </div>

            @endif


            @if($errors->any())

                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">

                    <p class="font-semibold mb-2">
                        Veuillez corriger les erreurs suivantes :
                    </p>

                    <ul class="list-disc list-inside text-sm space-y-1">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Formulaire --}}
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">

                <div class="p-6 sm:p-8">

                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-blue-950">
                            Informations professionnelles
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Mettez à jour votre profil pour mieux correspondre aux missions disponibles.
                        </p>
                    </div>


                    <form method="POST"
                          action="{{ route('medecin.profile.update') }}">

                        @csrf
                        @method('PUT')


                        {{-- Informations personnelles --}}
                        <div class="mb-8">

                            <h3 class="text-lg font-bold text-blue-950 mb-5">
                                Informations personnelles
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                {{-- Nom --}}
                                <div>
                                    <label for="nom_complet"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nom complet
                                    </label>

                                    <input
                                        type="text"
                                        name="nom_complet"
                                        id="nom_complet"
                                        value="{{ old('nom_complet', $medecin?->nom_complet) }}"
                                        required
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('nom_complet')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Email --}}
                                <div>
                                    <label for="email"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email', $medecin?->email) }}"
                                        required
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Téléphone --}}
                                <div>
                                    <label for="telephone"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Téléphone
                                    </label>

                                    <input
                                        type="text"
                                        name="telephone"
                                        id="telephone"
                                        value="{{ old('telephone', $medecin?->telephone) }}"
                                        required
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('telephone')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Ville --}}
                                <div>
                                    <label for="ville"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Ville
                                    </label>

                                    <input
                                        type="text"
                                        name="ville"
                                        id="ville"
                                        value="{{ old('ville', $medecin?->ville) }}"
                                        required
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('ville')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                        </div>


                        {{-- Informations professionnelles --}}
                        <div class="mb-8">

                            <h3 class="text-lg font-bold text-blue-950 mb-5">
                                Informations professionnelles
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                {{-- Spécialité --}}
                                <div>
                                    <label for="id_specialite"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Spécialité
                                    </label>

                                    <select
                                        name="id_specialite"
                                        id="id_specialite"
                                        required
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                        @foreach($specialites as $specialite)

                                            <option
                                                value="{{ $specialite->id_specialite }}"
                                                {{ old('id_specialite', $medecin?->id_specialite) == $specialite->id_specialite ? 'selected' : '' }}>

                                                {{ $specialite->nom }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('id_specialite')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Expérience --}}
                                <div>
                                    <label for="experience"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Expérience
                                    </label>

                                    <input
                                        type="text"
                                        name="experience"
                                        id="experience"
                                        value="{{ old('experience', $medecin?->experience) }}"
                                        placeholder="Ex : 5 ans"
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('experience')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Diplôme --}}
                                <div>
                                    <label for="diplome"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Diplôme
                                    </label>

                                    <input
                                        type="text"
                                        name="diplome"
                                        id="diplome"
                                        value="{{ old('diplome', $medecin?->diplome) }}"
                                        placeholder="Ex : Doctorat en médecine"
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('diplome')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- CV --}}
                                <div>
                                    <label for="CV"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        CV
                                    </label>

                                    <input
                                        type="text"
                                        name="CV"
                                        id="CV"
                                        value="{{ old('CV', $medecin?->CV) }}"
                                        placeholder="Nom ou chemin du CV"
                                        class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    @error('CV')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                        </div>


                        {{-- Disponibilité --}}
                        <div class="mb-8">

                            <h3 class="text-lg font-bold text-blue-950 mb-5">
                                Disponibilité
                            </h3>

                            <div class="max-w-md">

                                <label for="disponibilite"
                                       class="block text-sm font-semibold text-gray-700 mb-2">
                                    État de disponibilité
                                </label>

                                <select
                                    name="disponibilite"
                                    id="disponibilite"
                                    required
                                    class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">

                                    <option value="1"
                                        {{ old('disponibilite', $medecin?->disponibilite) == 1 ? 'selected' : '' }}>
                                        Disponible
                                    </option>

                                    <option value="0"
                                        {{ old('disponibilite', $medecin?->disponibilite) == 0 ? 'selected' : '' }}>
                                        Non disponible
                                    </option>

                                </select>

                                @error('disponibilite')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Description --}}
                        <div class="mb-8">

                            <h3 class="text-lg font-bold text-blue-950 mb-5">
                                Présentation professionnelle
                            </h3>

                            <label for="description_professionnelle"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Description professionnelle
                            </label>

                            <textarea
                                name="description_professionnelle"
                                id="description_professionnelle"
                                rows="6"
                                placeholder="Présentez votre parcours, vos compétences et votre expérience professionnelle..."
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">{{ old('description_professionnelle', $medecin?->description_professionnelle) }}</textarea>

                            @error('description_professionnelle')
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
                                href="{{ route('medecin.dashboard') }}"
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