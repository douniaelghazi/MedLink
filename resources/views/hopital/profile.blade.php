<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil Hôpital
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('hopital.profile.update') }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Nom
                            </label>

                            <input type="text"
                                   name="nom"
                                   value="{{ old('nom', $hopital?->nom) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Type
                            </label>

                            <input type="text"
                                   name="type"
                                   value="{{ old('type', $hopital?->type) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Adresse
                            </label>

                            <input type="text"
                                   name="adresse"
                                   value="{{ old('adresse', $hopital?->adresse) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Logo
                            </label>

                            <input type="text"
                                   name="logo"
                                   value="{{ old('logo', $hopital?->logo) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="5"
                                      class="w-full mt-1 border-gray-300 rounded-md">{{ old('description', $hopital?->description) }}</textarea>
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