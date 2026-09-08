<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion - MedLink</title>


    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-blue-50">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">

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

                {{-- Logo --}}
                <img src="{{ asset('images/logo.png') }}"
                     alt="MedLink"
                     class="w-60 h-auto mb-12">

                <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                    Bienvenue sur
                    <br>
                    MedLink
                </h1>

                <p class="mt-6 text-lg text-blue-50 leading-relaxed">
                    Connectez-vous à votre espace et retrouvez
                    vos missions, candidatures et opportunités médicales.
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

                        <p class="font-medium">
                            Connectez-vous avec les hôpitaux
                        </p>

                    </div>


                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    bg-white/20
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl">
                            👨‍⚕️
                        </div>

                        <p class="font-medium">
                            Trouvez des missions médicales
                        </p>

                    </div>


                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    bg-white/20
                                    rounded-xl
                                    flex items-center justify-center
                                    text-xl">
                            📋
                        </div>

                        <p class="font-medium">
                            Gérez vos candidatures facilement
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================= RIGHT ================= --}}
            <div class="p-8 sm:p-12 lg:p-14 flex items-center">

                <div class="w-full max-w-md mx-auto">


                    {{-- Title --}}
                    <div class="mb-8">

                        <h2 class="text-3xl lg:text-4xl
                                   font-bold
                                   text-blue-950">
                            Connexion
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Connectez-vous à votre compte MedLink
                        </p>

                    </div>


                    {{-- Session --}}
                    @if (session('status'))

                        <div class="mb-5 p-4
                                    bg-green-50
                                    text-green-700
                                    rounded-xl">
                            {{ session('status') }}
                        </div>

                    @endif


                    {{-- FORM --}}
                    <form method="POST" action="{{ route('login') }}">

                        @csrf


                        {{-- Email --}}
                        <div>

                            <label for="email"
                                   class="block text-sm
                                          font-semibold
                                          text-gray-700">
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


                        {{-- Password --}}
                        <div class="mt-5">

                            <label for="password"
                                   class="block text-sm
                                          font-semibold
                                          text-gray-700">
                                Mot de passe
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
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


                        {{-- Remember --}}
                        <div class="mt-5 flex items-center">

                            <input
                                id="remember"
                                type="checkbox"
                                name="remember"
                                class="rounded
                                       border-gray-300
                                       text-blue-600
                                       focus:ring-blue-500">

                            <label for="remember"
                                   class="ml-2 text-sm text-gray-600">
                                Se souvenir de moi
                            </label>

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

                            Se connecter

                        </button>


                        {{-- Forgot password --}}
                        @if (Route::has('password.request'))

                            <div class="text-center mt-5">

                                <a href="{{ route('password.request') }}"
                                   class="text-sm
                                          text-blue-600
                                          hover:text-blue-800">

                                    Mot de passe oublié ?

                                </a>

                            </div>

                        @endif

                    </form>


                    {{-- Register --}}
                    <div class="mt-8 pt-6
                                border-t border-gray-100
                                text-center">

                        <p class="text-sm text-gray-500">
                            Vous n'avez pas encore de compte ?
                        </p>

                        <a href="{{ route('register') }}"
                           class="inline-block mt-2
                                  text-blue-600
                                  font-semibold
                                  hover:text-blue-800">

                            Créer un compte →

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>