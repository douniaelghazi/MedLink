<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter une spécialité
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('specialites.store') }}" method="POST">

                    @csrf

                    {{-- Nom --}}
                    <div class="mb-5">

                        <label for="nom"
                               class="block font-medium text-gray-700 mb-2">
                            Nom
                        </label>

                        <input type="text"
                               id="nom"
                               name="nom"
                               value="{{ old('nom') }}"
                               class="w-full border-gray-300 rounded-lg"
                               placeholder="Ex: Cardiologie">

                        @error('nom')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- Description --}}
                    <div class="mb-5">

                        <label for="description"
                               class="block font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea id="description"
                                  name="description"
                                  rows="5"
                                  class="w-full border-gray-300 rounded-lg"
                                  placeholder="Description de la spécialité">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-3">

                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                            Ajouter
                        </button>

                        <a href="{{ route('specialites.index') }}"
                           class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">
                            Annuler
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>