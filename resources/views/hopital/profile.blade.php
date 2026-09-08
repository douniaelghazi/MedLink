<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold">
                ESPACE HÔPITAL
            </p>

            <h2 class="text-2xl font-bold text-blue-950 mt-1">
                Mon profil
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

                        🏥

                    </div>

                    <div>

                        <p class="text-blue-100 text-sm font-medium">
                            Profil de votre établissement
                        </p>

                        <h1 class="text-3xl font-bold mt-1">
                            Profil Hôpital
                        </h1>

                        <p class="text-blue-50 mt-2">
                            Gérez les informations de votre hôpital.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Success --}}
            @if(session('success'))

                <div class="mb-6
                            p-4
                            bg-green-50
                            border border-green-200
                            text-green-700
                            rounded-xl">

                    {{ session('success') }}

                </div>

            @endif


            {{-- Error --}}
            @if(session('error'))

                <div class="mb-6
                            p-4
                            bg-red-50
                            border border-red-200
                            text-red-700
                            rounded-xl">

                    {{ session('error') }}

                </div>

            @endif


            {{-- Formulaire --}}
            <div class="bg-white
                        rounded-3xl
                        shadow-sm
                        border border-sky-100
                        p-6 sm:p-8">

                <form method="POST"
                      action="{{ route('hopital.profile.update') }}">

                    @csrf
                    @method('PUT')


                    {{-- Informations générales --}}
                    <div class="mb-8">

                        <h2 class="text-xl font-bold text-blue-950">
                            Informations générales
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Renseignez les informations de votre hôpital.
                        </p>

                    </div>


                    {{-- Nom + Type --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">


                        {{-- Nom --}}
                        <div>

                            <label for="nom"
                                   class="block text-sm font-semibold text-gray-700">
                                Nom de l'hôpital
                            </label>

                            <input id="nom"
                                   type="text"
                                   name="nom"
                                   value="{{ old('nom', $hopital?->nom) }}"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('nom')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Type --}}
                        <div>

                            <label for="type"
                                   class="block text-sm font-semibold text-gray-700">
                                Type d'hôpital
                            </label>

                            <input id="type"
                                   type="text"
                                   name="type"
                                   value="{{ old('type', $hopital?->type) }}"
                                   placeholder="Ex : Hôpital public"
                                   class="mt-2 block w-full rounded-xl border-gray-200
                                          focus:border-blue-500 focus:ring-blue-500"
                                   required>

                            @error('type')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- Adresse --}}
                    <div class="mb-6">

                        <label for="adresse"
                               class="block text-sm font-semibold text-gray-700">
                            Adresse
                        </label>

                        <input id="adresse"
                               type="text"
                               name="adresse"
                               value="{{ old('adresse', $hopital?->adresse) }}"
                               placeholder="Ex : Béni Mellal"
                               class="mt-2 block w-full rounded-xl border-gray-200
                                      focus:border-blue-500 focus:ring-blue-500"
                               required>

                        @error('adresse')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Logo --}}
                    <div class="mb-6">

                        <label for="logo"
                               class="block text-sm font-semibold text-gray-700">
                            Logo
                        </label>

                        <input id="logo"
                               type="text"
                               name="logo"
                               value="{{ old('logo', $hopital?->logo) }}"
                               placeholder="Nom ou chemin du logo"
                               class="mt-2 block w-full rounded-xl border-gray-200
                                      focus:border-blue-500 focus:ring-blue-500">

                        @error('logo')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="mb-8">

                        <label for="description"
                               class="block text-sm font-semibold text-gray-700">
                            Description
                        </label>

                        <textarea id="description"
                                  name="description"
                                  rows="5"
                                  placeholder="Présentez votre hôpital et ses services..."
                                  class="mt-2 block w-full rounded-xl border-gray-200
                                         focus:border-blue-500 focus:ring-blue-500">{{ old('description', $hopital?->description) }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Boutons --}}
                    <div class="border-t border-gray-100
                                pt-6
                                flex flex-col sm:flex-row
                                gap-3 sm:justify-end">

                        <a href="{{ route('hopital.dashboard') }}"
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