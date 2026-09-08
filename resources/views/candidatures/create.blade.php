<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Postuler à une mission
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    {{-- Message erreur --}}
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('candidatures.store') }}">
                        @csrf

                        {{-- Mission --}}
                        <div class="mb-4">
                            <label for="id_mission"
                                   class="block font-medium text-sm text-gray-700">
                                Mission
                            </label>

                            <select name="id_mission"
                                    id="id_mission"
                                    class="w-full mt-1 border-gray-300 rounded-md"
                                    required>

                                <option value="">
                                    -- Choisir une mission --
                                </option>

                                @foreach($missions as $mission)
                                    <option value="{{ $mission->id_mission }}"
                                        {{ old('id_mission', $id_mission) == $mission->id_mission ? 'selected' : '' }}>

                                        {{ $mission->titre }} - {{ $mission->ville }}

                                    </option>
                                @endforeach

                            </select>

                            @error('id_mission')
                                <p class="text-red-600 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Nom --}}
                        <div class="mb-4">
                            <label for="nom"
                                   class="block font-medium text-sm text-gray-700">
                                Nom
                            </label>

                            <input type="text"
                                   name="nom"
                                   id="nom"
                                   value="{{ old('nom') }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>

                            @error('nom')
                                <p class="text-red-600 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- CV --}}
                        <div class="mb-4">
                            <label for="CV"
                                   class="block font-medium text-sm text-gray-700">
                                CV
                            </label>

                            <input type="text"
                                   name="CV"
                                   id="CV"
                                   value="{{ old('CV') }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   placeholder="Nom ou chemin du CV">

                            @error('CV')
                                <p class="text-red-600 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div class="mb-4">
                            <label for="message"
                                   class="block font-medium text-sm text-gray-700">
                                Message
                            </label>

                            <textarea name="message"
                                      id="message"
                                      rows="5"
                                      class="w-full mt-1 border-gray-300 rounded-md">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="text-red-600 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Date --}}
                        <div class="mb-6">
                            <label for="date_candidature"
                                   class="block font-medium text-sm text-gray-700">
                                Date de candidature
                            </label>

                            <input type="date"
                                   name="date_candidature"
                                   id="date_candidature"
                                   value="{{ old('date_candidature', date('Y-m-d')) }}"
                                   class="w-full mt-1 border-gray-300 rounded-md"
                                   required>

                            @error('date_candidature')
                                <p class="text-red-600 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Boutons --}}
                        <div class="flex items-center gap-3">

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Envoyer ma candidature
                            </button>

                            <a href="{{ route('candidatures.index') }}"
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