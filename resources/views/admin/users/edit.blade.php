<x-app-layout>

    <div class="min-h-screen bg-sky-50">

        {{-- Header --}}
        <div class="bg-white border-b border-sky-100">
            <div class="max-w-7xl mx-auto px-6 py-5">

                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                    Espace Admin
                </p>

                <h1 class="text-2xl font-bold text-slate-900 mt-1">
                    Modifier l'utilisateur
                </h1>

            </div>
        </div>


        {{-- Main --}}
        <main class="max-w-3xl mx-auto px-6 py-8">

            <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">

                {{-- Card header --}}
                <div class="bg-gradient-to-r from-blue-600 to-sky-500 px-6 py-6">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-2xl">
                            @if($user->role === 'admin')
                                👨‍💼
                            @elseif($user->role === 'hopital')
                                🏥
                            @else
                                👨‍⚕️
                            @endif
                        </div>

                        <div class="text-white">

                            <h2 class="text-xl font-bold">
                                {{ $user->name }}
                            </h2>

                            <p class="text-blue-100 text-sm mt-1">
                                Modifier le rôle de cet utilisateur
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="p-6">

                    <form method="POST"
                          action="{{ route('admin.users.update', $user) }}">

                        @csrf
                        @method('PUT')


                        {{-- Nom --}}
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Nom
                            </label>

                            <input
                                type="text"
                                value="{{ $user->name }}"
                                disabled
                                class="w-full rounded-xl border-slate-200 bg-slate-100 text-slate-500 cursor-not-allowed"
                            >

                        </div>


                        {{-- Email --}}
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                value="{{ $user->email }}"
                                disabled
                                class="w-full rounded-xl border-slate-200 bg-slate-100 text-slate-500 cursor-not-allowed"
                            >

                        </div>


                        {{-- Role --}}
                        <div class="mb-6">

                            <label
                                for="role"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Rôle
                            </label>

                            <select
                                name="role"
                                id="role"
                                class="w-full rounded-xl border-sky-200 focus:border-blue-500 focus:ring-blue-500"
                            >

                                <option value="hopital"
                                    {{ $user->role === 'hopital' ? 'selected' : '' }}>
                                    Hôpital
                                </option>

                                <option value="medecin"
                                    {{ $user->role === 'medecin' ? 'selected' : '' }}>
                                    Médecin
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
                        <div class="pt-5 border-t border-slate-100 flex flex-wrap gap-3">

                            <a
                                href="{{ route('admin.users.index') }}"
                                class="px-5 py-2.5 bg-slate-100 text-slate-700 rounded-xl font-semibold hover:bg-slate-200 transition"
                            >
                                ← Annuler
                            </a>

                            <button
                                type="submit"
                                class="px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm"
                            >
                                Enregistrer les modifications
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>