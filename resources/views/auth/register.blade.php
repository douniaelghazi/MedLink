<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription - MedLink</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-blue-50">

    <div class="min-h-screen flex items-center justify-center px-6 py-10">

        <div class="w-full max-w-5xl
                    bg-white
                    rounded-3xl
                    shadow-2xl
                    overflow-hidden
                    grid grid-cols-1 md:grid-cols-2">


            {{-- ================= LEFT ================= --}}
            <div class="bg-gradient-to-br from-blue-600 to-sky-400
                        p-10 lg:p-14
                        text-white">

                <img src="{{ asset('images/logo.png') }}"
                     alt="MedLink"
                     class="w-60 h-auto mb-12">

                <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                    Rejoignez
                    <br>
                    MedLink
                </h1>

                <p class="mt-6 text-lg text-blue-50 leading-relaxed">
                    Créez votre compte et accédez à une plateforme
                    dédiée aux professionnels de santé.
                </p>


                <div class="mt-10 space-y-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    bg-white/20
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl">
                            🏥
                        </div>

                        <div>
                            <p class="font-semibold">
                                Hôpitaux
                            </p>

                            <p class="text-sm text-blue-50">
                                Publiez vos missions médicales
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    bg-white/20
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl">
                            👨‍⚕️
                        </div>

                        <div>
                            <p class="font-semibold">
                                Médecins
                            </p>

                            <p class="text-sm text-blue-50">
                                Trouvez des missions adaptées
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    bg-white/20
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl">
                            📋
                        </div>

                        <div>
                            <p class="font-semibold">
                                Candidatures
                            </p>

                            <p class="text-sm text-blue-50">
                                Gérez vos candidatures facilement
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= RIGHT ================= --}}
            <div class="p-8 sm:p-12 lg:p-14">

                <div class="max-w-md mx-auto">

                    <div class="mb-7">

                        <h2 class="text-3xl lg:text-4xl
                                   font-bold
                                   text-blue-950">
                            Créer un compte
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Rejoignez la communauté MedLink
                        </p>

                    </div>


                    {{-- FORM --}}
                    <form method="POST" action="{{ route('register') }}">

                        @csrf


                        {{-- Nom --}}
                        <div>

                            <label for="name"
                                   class="block text-sm font-semibold text-gray-700">
                                Nom complet
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                class="block mt-2 w-full
                                       rounded-xl
                                       border-gray-200
                                       focus:border-blue-500
                                       focus:ring-blue-500">

                            @error('name')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Email --}}
                        <div class="mt-5">

                            <label for="email"
                                   class="block text-sm font-semibold text-gray-700">
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                class="block mt-2 w-full
                                       rounded-xl
                                       border-gray-200
                                       focus:border-blue-500
                                       focus:ring-blue-500">

                            @error('email')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Role --}}
                        <div class="mt-5">

                            <label for="role"
                                   class="block text-sm font-semibold text-gray-700">
                                Type de compte
                            </label>

                            <select
                                id="role"
                                name="role"
                                required
                                class="block mt-2 w-full
                                       rounded-xl
                                       border-gray-200
                                       focus:border-blue-500
                                       focus:ring-blue-500">

                                <option value="">
                                    Sélectionnez votre rôle
                                </option>

                                <option value="hopital"
                                    {{ old('role') === 'hopital' ? 'selected' : '' }}>
                                    🏥 Hôpital
                                </option>

                                <option value="medecin"
                                    {{ old('role') === 'medecin' ? 'selected' : '' }}>
                                    👨‍⚕️ Médecin
                                </option>

                            </select>

                            @error('role')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Password --}}
                        <div class="mt-5">

                            <label for="password"
                                   class="block text-sm font-semibold text-gray-700">
                                Mot de passe
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="block mt-2 w-full
                                       rounded-xl
                                       border-gray-200
                                       focus:border-blue-500
                                       focus:ring-blue-500">

                            @error('password')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Confirm Password --}}
                        <div class="mt-5">

                            <label for="password_confirmation"
                                   class="block text-sm font-semibold text-gray-700">
                                Confirmer le mot de passe
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="block mt-2 w-full
                                       rounded-xl
                                       border-gray-200
                                       focus:border-blue-500
                                       focus:ring-blue-500">

                        </div>


                        {{-- Button --}}
                        <button
                            type="submit"
                            class="w-full mt-7
                                   py-3.5
                                   bg-blue-600
                                   text-white
                                   rounded-xl
                                   font-semibold
                                   hover:bg-blue-700
                                   transition
                                   shadow-md">

                            Créer mon compte

                        </button>

                    </form>


                    {{-- Login --}}
                    <div class="mt-7 pt-6
                                border-t border-gray-100
                                text-center">

                        <p class="text-sm text-gray-500">
                            Vous avez déjà un compte ?
                        </p>

                        <a href="{{ route('login') }}"
                           class="inline-block mt-2
                                  text-blue-600
                                  font-semibold
                                  hover:text-blue-800">

                            Se connecter →

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>