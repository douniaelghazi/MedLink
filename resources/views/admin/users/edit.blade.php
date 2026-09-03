<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'utilisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-6">
                    Modifier : {{ $user->name }}
                </h3>

                <form method="POST"
                      action="{{ route('admin.users.update', $user) }}">

                    @csrf
                    @method('PUT')

                    {{-- Nom --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Nom
                        </label>

                        <input
                            type="text"
                            value="{{ $user->name }}"
                            disabled
                            class="w-full border-gray-300 rounded-md bg-gray-100"
                        >
                    </div>

                    {{-- Email --}}
                    <div class="mb-5">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            value="{{ $user->email }}"
                            disabled
                            class="w-full border-gray-300 rounded-md bg-gray-100"
                        >
                    </div>

                    {{-- Role --}}
                    <div class="mb-6">
                        <label
                            for="role"
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            Rôle
                        </label>

                        <select
                            name="role"
                            id="role"
                            class="w-full border-gray-300 rounded-md"
                        >

                            <option value="client"
                                {{ $user->role === 'client' ? 'selected' : '' }}>
                                Client
                            </option>

                            <option value="freelance"
                                {{ $user->role === 'freelance' ? 'selected' : '' }}>
                                Freelance
                            </option>

                            <option value="admin"
                                {{ $user->role === 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                        </select>

                        @error('role')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-3">

                        <a
                            href="{{ route('admin.users.index') }}"
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                        >
                            ← Annuler
                        </a>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                        >
                            Enregistrer
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>