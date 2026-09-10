<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MedLink - Plateforme médicale</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900">

    {{-- ================= NAVBAR ================= --}}
    <nav class="bg-white shadow-sm border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-24 flex items-center justify-between">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="MedLink"
                         class="w-56 h-auto">
                </a>

                {{-- Menu --}}
                <div class="hidden lg:flex items-center gap-8 text-sm">

                    <a href="#accueil"
                       class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-2">
                        Accueil
                    </a>

                    <a href="#apropos"
                       class="text-gray-600 hover:text-blue-600 transition">
                        À propos
                    </a>

                    <a href="#fonctionnalites"
                       class="text-gray-600 hover:text-blue-600 transition">
                        Fonctionnalités
                    </a>

                    <a href="#hopitaux"
                       class="text-gray-600 hover:text-blue-600 transition">
                        Pour les hôpitaux
                    </a>

                    <a href="#medecins"
                       class="text-gray-600 hover:text-blue-600 transition">
                        Pour les médecins
                    </a>

                    <a href="#contact"
                       class="text-gray-600 hover:text-blue-600 transition">
                        Contact
                    </a>

                </div>

                {{-- Auth --}}
                <div class="flex items-center gap-3">

                    @auth

                        <a href="{{ route('dashboard') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">
                            Mon espace
                        </a>

                    @else

                        <a href="{{ route('login') }}"
                           class="px-6 py-3 text-blue-600 font-semibold hover:text-blue-800">
                            Connexion
                        </a>

                        <a href="{{ route('register') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 shadow-sm">
                            Inscription
                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </nav>


    {{-- ================= HERO ================= --}}
    <section id="accueil"
             class="bg-gradient-to-br from-sky-50 via-white to-blue-50 overflow-hidden">

        <div class="max-w-7xl mx-auto px-6 py-16 lg:py-20">

            <div class="grid lg:grid-cols-2 gap-10 items-center">

                {{-- LEFT --}}
                <div>

                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2
                                bg-white
                                border border-sky-100
                                shadow-sm
                                rounded-full
                                px-5 py-2.5
                                mb-6">

                        <span class="text-blue-600 text-xl">
                            〽
                        </span>

                        <span class="text-blue-600 font-semibold text-sm">
                            Plateforme médicale professionnelle
                        </span>

                    </div>


                    {{-- Title --}}
                    <h1 class="text-5xl lg:text-6xl
                               font-bold
                               leading-tight
                               text-blue-950">

                        Connecter les

                        <span class="text-blue-600">
                            hôpitaux
                        </span>

                        aux

                        <span class="text-sky-500">
                            médecins
                        </span>

                        qualifiés.

                    </h1>


                    {{-- Description --}}
                    <p class="mt-6
                              text-lg
                              text-gray-600
                              leading-relaxed
                              max-w-xl">

                        MedLink facilite la recherche de missions médicales,
                        la publication d'opportunités et la gestion des
                        candidatures entre hôpitaux et médecins au Maroc.

                    </p>


                    {{-- Buttons --}}
                    <div class="flex flex-wrap gap-4 mt-8">

                        @guest

                            <a href="{{ route('register') }}"
                               class="px-7 py-4
                                      bg-blue-600
                                      text-white
                                      rounded-xl
                                      font-semibold
                                      shadow-lg
                                      hover:bg-blue-700
                                      transition">

                                Créer un compte
                                <span class="ml-3">→</span>

                            </a>

                            <a href="#fonctionnalites"
                               class="px-7 py-4
                                      bg-white
                                      text-blue-600
                                      border border-blue-300
                                      rounded-xl
                                      font-semibold
                                      hover:bg-blue-50
                                      transition">

                                <span class="mr-2">▶</span>
                                Découvrir la plateforme

                            </a>

                        @else

                            <a href="{{ route('dashboard') }}"
                               class="px-7 py-4
                                      bg-blue-600
                                      text-white
                                      rounded-xl
                                      font-semibold">

                                Accéder à mon espace →

                            </a>

                        @endguest

                    </div>


                    {{-- Statistics --}}
                    <div class="grid grid-cols-3
                                mt-12
                                max-w-xl">

                        <div>

                            <p class="text-3xl font-bold text-blue-600">
                                +500
                            </p>

                            <p class="text-gray-500 mt-1 text-sm">
                                Missions publiées
                            </p>

                        </div>


                        <div class="border-l border-gray-200 pl-6">

                            <p class="text-3xl font-bold text-blue-600">
                                +300
                            </p>

                            <p class="text-gray-500 mt-1 text-sm">
                                Médecins inscrits
                            </p>

                        </div>


                        <div class="border-l border-gray-200 pl-6">

                            <p class="text-3xl font-bold text-blue-600">
                                +100
                            </p>

                            <p class="text-gray-500 mt-1 text-sm">
                                Hôpitaux partenaires
                            </p>

                        </div>

                    </div>

                </div>


                {{-- RIGHT : IMAGE --}}
                <div class="relative">

                    <div class="absolute
                                -top-10
                                -right-10
                                w-80
                                h-80
                                bg-sky-200
                                rounded-full
                                blur-3xl
                                opacity-40">
                    </div>

                    <img src="{{ asset('images/hero medlink.png') }}"
                         alt="Médecins MedLink"
                         class="relative
                                w-full
                                h-auto
                                object-contain
                                rounded-3xl
                                shadow-xl">

                </div>

            </div>

        </div>

    </section>


    {{-- ================= FEATURES ================= --}}
    <section id="fonctionnalites"
             class="bg-white py-20">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-4 gap-0">


                {{-- Hôpitaux --}}
                <div class="px-7 py-4 border-r border-gray-200">

                    <div class="w-16 h-16
                                bg-blue-100
                                rounded-2xl
                                flex items-center justify-center
                                text-2xl
                                mb-5">
                        🏥
                    </div>

                    <h3 class="text-xl font-bold text-blue-950 mb-3">
                        Pour les hôpitaux
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        Publiez vos missions et trouvez des médecins
                        qualifiés rapidement.
                    </p>

                </div>


                {{-- Médecins --}}
                <div class="px-7 py-4 border-r border-gray-200">

                    <div class="w-16 h-16
                                bg-sky-100
                                rounded-2xl
                                flex items-center justify-center
                                text-2xl
                                mb-5">
                        👨‍⚕️
                    </div>

                    <h3 class="text-xl font-bold text-blue-950 mb-3">
                        Pour les médecins
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        Recherchez des missions adaptées à votre
                        spécialité et à votre expérience.
                    </p>

                </div>


                {{-- Gestion --}}
                <div class="px-7 py-4 border-r border-gray-200">

                    <div class="w-16 h-16
                                bg-blue-100
                                rounded-2xl
                                flex items-center justify-center
                                text-2xl
                                mb-5">
                        📋
                    </div>

                    <h3 class="text-xl font-bold text-blue-950 mb-3">
                        Gestion simplifiée
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        Suivez vos candidatures et vos missions
                        en toute simplicité.
                    </p>

                </div>


                {{-- Sécurité --}}
                <div class="px-7 py-4">

                    <div class="w-16 h-16
                                bg-sky-100
                                rounded-2xl
                                flex items-center justify-center
                                text-2xl
                                mb-5">
                        🛡️
                    </div>

                    <h3 class="text-xl font-bold text-blue-950 mb-3">
                        Une plateforme sécurisée
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        Vos données sont protégées et traitées
                        en toute confidentialité.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ================= ABOUT ================= --}}
    <section id="apropos"
             class="bg-sky-50 py-16">

        <div class="max-w-5xl mx-auto px-6 text-center">

            <p class="text-blue-600 font-semibold uppercase tracking-wider">
                À propos de MedLink
            </p>

            <h2 class="text-3xl lg:text-4xl
                       font-bold
                       text-blue-950
                       mt-3">

                Une connexion simple entre
                hôpitaux et médecins

            </h2>

            <p class="mt-5
                      text-gray-600
                      text-lg
                      leading-relaxed">

                MedLink est une plateforme dédiée aux professionnels
                de santé permettant de publier, rechercher et gérer
                des missions médicales.

            </p>

        </div>

    </section>


    {{-- ================= HOPITAUX / MEDECINS ================= --}}
    <section class="bg-white py-20">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-2 gap-8">


                {{-- Hôpital --}}
                <div id="hopitaux"
                     class="bg-sky-50
                            border border-sky-100
                            rounded-3xl
                            p-8">

                    <div class="text-4xl mb-5">
                        🏥
                    </div>

                    <h2 class="text-2xl
                               font-bold
                               text-blue-950
                               mb-3">

                        Pour les hôpitaux

                    </h2>

                    <p class="text-gray-600
                              leading-relaxed
                              mb-6">

                        Publiez vos missions médicales, recevez les
                        candidatures des médecins et gérez vos recrutements
                        facilement.

                    </p>

                    @guest

                        <a href="{{ route('register') }}"
                           class="inline-block
                                  px-6 py-3
                                  bg-blue-600
                                  text-white
                                  rounded-xl
                                  font-semibold
                                  hover:bg-blue-700">

                            Rejoindre comme hôpital →

                        </a>

                    @endguest

                </div>


                {{-- Médecin --}}
                <div id="medecins"
                     class="bg-blue-50
                            border border-blue-100
                            rounded-3xl
                            p-8">

                    <div class="text-4xl mb-5">
                        👨‍⚕️
                    </div>

                    <h2 class="text-2xl
                               font-bold
                               text-blue-950
                               mb-3">

                        Pour les médecins

                    </h2>

                    <p class="text-gray-600
                              leading-relaxed
                              mb-6">

                        Trouvez des missions correspondant à votre
                        spécialité, votre expérience et votre disponibilité.

                    </p>

                    @guest

                        <a href="{{ route('register') }}"
                           class="inline-block
                                  px-6 py-3
                                  bg-sky-500
                                  text-white
                                  rounded-xl
                                  font-semibold
                                  hover:bg-sky-600">

                            Rejoindre comme médecin →

                        </a>

                    @endguest

                </div>

            </div>

        </div>

    </section>


    

    {{-- ================= FOOTER ================= --}}
    <footer class="bg-[#1e2d5b] text-white">
    <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row items-center justify-between gap-8">

        <!-- Logo -->
        <div>
            <img src="{{ asset('images/logo.png') }}"
                 alt="MedLink"
                 class="h-20 w-auto">
        </div>

        <!-- Contact -->
        <div class="text-center md:text-left">
            <h3 class="text-lg font-semibold mb-3">Contact</h3>

            <p class="text-blue-100">
                📧 contact@medlink.ma
            </p>

            <p class="text-blue-100">
                📞 +212 506 80 23 01
            </p>

            <p class="text-blue-100">
                📍 Maroc
            </p>
        </div>

        <!-- Copyright -->
        <div class="text-blue-100 text-sm text-center">
            © {{ date('Y') }} MedLink. Tous droits réservés.
        </div>

    </div>
</footer>

</body>

</html>