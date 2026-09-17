<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription - MedLink</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-sky-50">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-xl overflow-hidden
                grid grid-cols-1 md:grid-cols-2">

        {{-- ================= LEFT ================= --}}
        <div class="bg-gradient-to-br from-blue-600 to-sky-400
                    text-white px-7 py-5
                    flex flex-col justify-center">

            {{-- Logo --}}
            <img
                src="{{ asset('images/logo.png') }}"
                alt="MedLink"
                class="w-44 h-auto mb-4"
            >

            {{-- Title --}}
            <h1 class="text-2xl lg:text-3xl font-bold leading-tight mb-2">
                Rejoignez<br>
                MedLink
            </h1>

            {{-- Description --}}
            <p class="text-xs lg:text-sm leading-5 text-blue-50 mb-4">
                Créez votre compte et accédez à une plateforme
                dédiée aux professionnels de santé.
            </p>


            {{-- ================= AVANTAGES ================= --}}
            <div class="space-y-2.5">

                {{-- Hôpitaux --}}
                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 shrink-0 rounded-lg
                                bg-white/20
                                flex items-center justify-center
                                text-base">
                        🏥
                    </div>

                    <div>
                        <p class="text-xs font-semibold">
                            Hôpitaux
                        </p>

                        <p class="text-[11px] text-blue-50">
                            Publiez vos missions médicales
                        </p>
                    </div>

                </div>


                {{-- Médecins --}}
                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 shrink-0 rounded-lg
                                bg-white/20
                                flex items-center justify-center
                                text-base">
                        👨‍⚕️
                    </div>

                    <div>
                        <p class="text-xs font-semibold">
                            Médecins
                        </p>

                        <p class="text-[11px] text-blue-50">
                            Trouvez des missions adaptées
                        </p>
                    </div>

                </div>


                {{-- Candidatures --}}
                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 shrink-0 rounded-lg
                                bg-white/20
                                flex items-center justify-center
                                text-base">
                        📋
                    </div>

                    <div>
                        <p class="text-xs font-semibold">
                            Candidatures
                        </p>

                        <p class="text-[11px] text-blue-50">
                            Gérez vos candidatures facilement
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- ================= RIGHT ================= --}}
        <div class="px-7 py-5 flex flex-col justify-center">

            <div class="w-full max-w-sm mx-auto">

                {{-- Title --}}
                <div class="mb-4">

                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-800">
                        Créer un compte
                    </h2>

                    <p class="text-slate-500 text-xs mt-1">
                        Rejoignez la communauté MedLink
                    </p>

                </div>


                {{-- ================= FORM ================= --}}
                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="space-y-2.5"
                > 

                    {{-- Sécuriser le formulaire POST --}}
                    @csrf


                    {{-- Nom --}}
                    <div>

                        <label
                            for="name"
                            class="block text-xs font-semibold text-slate-700 mb-1"
                        >
                            Nom complet
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            {{-- Récupérer l'ancienne saisie --}}
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"

                            class="block w-full h-9
                                   rounded-lg
                                   border border-slate-200
                                   px-3
                                   text-xs
                                   focus:border-blue-500
                                   focus:ring-blue-500"
                        >
                        {{-- Récupérer l'ancienne saisie --}}
                        @error('name')
                            <p class="text-[10px] text-red-600 mt-0.5">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="block text-xs font-semibold text-slate-700 mb-1"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"

                            class="block w-full h-9
                                   rounded-lg
                                   border border-slate-200
                                   px-3
                                   text-xs
                                   focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                        @error('email')
                            <p class="text-[10px] text-red-600 mt-0.5">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Role --}}
                    <div>

                        <label
                            for="role"
                            class="block text-xs font-semibold text-slate-700 mb-1"
                        >
                            Type de compte
                        </label>

                        <select
                            id="role"
                            name="role"
                            required

                            class="block w-full h-9
                                   rounded-lg
                                   border border-slate-200
                                   px-3
                                   text-xs
                                   focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                            <option value="">
                                Sélectionnez votre rôle
                            </option>

                            <option
                                value="hopital"
                                {{ old('role') === 'hopital' ? 'selected' : '' }}
                            >
                                🏥 Hôpital
                            </option>

                            <option
                                value="medecin"
                                {{ old('role') === 'medecin' ? 'selected' : '' }}
                            >
                                👨‍⚕️ Médecin
                            </option>

                        </select>

                        @error('role')
                            <p class="text-[10px] text-red-600 mt-0.5">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Password --}}
                    <div>

                        <label
                            for="password"
                            class="block text-xs font-semibold text-slate-700 mb-1"
                        >
                            Mot de passe
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"

                            class="block w-full h-9
                                   rounded-lg
                                   border border-slate-200
                                   px-3
                                   text-xs
                                   focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                        @error('password')
                            <p class="text-[10px] text-red-600 mt-0.5">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Confirmation --}}
                    <div>

                        <label
                            for="password_confirmation"
                            class="block text-xs font-semibold text-slate-700 mb-1"
                        >
                            Confirmer le mot de passe
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"

                            class="block w-full h-9
                                   rounded-lg
                                   border border-slate-200
                                   px-3
                                   text-xs
                                   focus:border-blue-500
                                   focus:ring-blue-500"
                        >

                    </div>


                    {{-- Button --}}
                    <button
                        type="submit"

                        class="w-full h-10
                               mt-1
                               rounded-lg
                               bg-blue-600
                               hover:bg-blue-700
                               text-white
                               text-xs
                               font-semibold
                               transition"
                    >
                        Créer mon compte
                    </button>

                </form>


                {{-- ================= LOGIN ================= --}}
                <div class="border-t border-slate-100
                            mt-3 pt-3
                            text-center">

                    <p class="text-xs text-slate-500">
                        Vous avez déjà un compte ?
                    </p>

                    <a
                        href="{{ route('login') }}"
                        class="inline-block mt-0.5
                               text-xs
                               text-blue-600
                               font-semibold
                               hover:text-blue-800"
                    >
                        Se connecter →
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>