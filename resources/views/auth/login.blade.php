<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - MedLink</title>

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
                Bienvenue sur<br>
                MedLink
            </h1>

            {{-- Description --}}
            <p class="text-xs lg:text-sm leading-5 text-blue-50 mb-4">
                Connectez-vous à votre espace et retrouvez vos
                missions, candidatures et opportunités médicales.
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

                    <span class="text-xs font-semibold">
                        Connectez-vous avec les hôpitaux
                    </span>

                </div>


                {{-- Médecins --}}
                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 shrink-0 rounded-lg
                                bg-white/20
                                flex items-center justify-center
                                text-base">
                        👨‍⚕️
                    </div>

                    <span class="text-xs font-semibold">
                        Trouvez des missions médicales
                    </span>

                </div>


                {{-- Candidatures --}}
                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 shrink-0 rounded-lg
                                bg-white/20
                                flex items-center justify-center
                                text-base">
                        📋
                    </div>

                    <span class="text-xs font-semibold">
                        Gérez vos candidatures facilement
                    </span>

                </div>

            </div>

        </div>


        {{-- ================= RIGHT ================= --}}
        <div class="px-7 py-5 flex flex-col justify-center">

            <div class="w-full max-w-sm mx-auto">

                {{-- Title --}}
                <div class="mb-4">

                    <h2 class="text-2xl lg:text-3xl font-bold text-slate-800">
                        Connexion
                    </h2>

                    <p class="text-slate-500 text-xs mt-1">
                        Connectez-vous à votre compte MedLink
                    </p>

                </div>


                {{-- ================= FORM ================= --}}
                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="space-y-3"
                >

                    @csrf


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
                            autofocus
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
                            autocomplete="current-password"

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


                    {{-- Remember + Forgot password --}}
                    <div class="flex items-center justify-between">

                        <label class="flex items-center gap-2 text-xs text-slate-600">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded
                                       border-slate-300
                                       text-blue-600
                                       focus:ring-blue-500"
                            >

                            <span>
                                Se souvenir de moi
                            </span>

                        </label>


                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-xs
                                       text-blue-600
                                       hover:text-blue-700"
                            >
                                Mot de passe oublié ?
                            </a>

                        @endif

                    </div>


                    {{-- Button --}}
                    <button
                        type="submit"

                        class="w-full h-10
                               rounded-lg
                               bg-blue-600
                               hover:bg-blue-700
                               text-white
                               text-xs
                               font-semibold
                               transition"
                    >
                        Se connecter
                    </button>

                </form>


                {{-- ================= REGISTER ================= --}}
                <div class="border-t border-slate-100
                            mt-3 pt-3
                            text-center">

                    <p class="text-xs text-slate-500">
                        Vous n'avez pas encore de compte ?
                    </p>

                    <a
                        href="{{ route('register') }}"
                        class="inline-block mt-0.5
                               text-xs
                               text-blue-600
                               font-semibold
                               hover:text-blue-800"
                    >
                        Créer un compte →
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>