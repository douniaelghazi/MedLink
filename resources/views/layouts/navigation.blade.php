<nav x-data="{ open: false }"
     class="bg-white border-b border-sky-100 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-20">

            {{-- ================= LEFT ================= --}}
            <div class="flex items-center">

                {{-- Logo MedLink --}}
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}">

                        <img src="{{ asset('images/logo.png') }}"
                             alt="MedLink"
                             class="w-44 h-auto">

                    </a>

                </div>


                {{-- ================= DESKTOP MENU ================= --}}
                <div class="hidden sm:flex items-center ml-10 gap-6">

                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                       class="text-sm font-semibold
                              {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                        Dashboard
                    </a>


                    {{-- ADMIN --}}
                    @if(auth()->user()->role === 'admin')

                        <a href="{{ route('admin.users.index') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('admin.users.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Utilisateurs
                        </a>

                        <a href="{{ route('specialites.index') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('specialites.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Spécialités
                        </a>

                    @endif


                    {{-- HOPITAL --}}
                    @if(auth()->user()->role === 'hopital')

                        <a href="{{ route('missions.index') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('missions.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Mes missions
                        </a>

                        <a href="{{ route('missions.create') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('missions.create') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Créer une mission
                        </a>

                        <a href="{{ route('hopital.candidatures.index') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('hopital.candidatures.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Candidatures
                        </a>

                    @endif


                    {{-- MEDECIN --}}
                    @if(auth()->user()->role === 'medecin')

                        <a href="{{ route('medecin.missions.index') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('medecin.missions.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Missions
                        </a>

                        <a href="{{ route('candidatures.index') }}"
                           class="text-sm font-semibold
                                  {{ request()->routeIs('candidatures.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Mes candidatures
                        </a>

                    @endif

                </div>

            </div>


            {{-- ================= RIGHT ================= --}}
            <div class="hidden sm:flex items-center gap-5">


                {{-- Notifications --}}
                <a href="{{ route('notifications.index') }}"
                   class="relative text-gray-500 hover:text-blue-600 transition">

                    <span class="text-xl">
                        🔔
                    </span>

                    @if(auth()->user()->unreadNotifications->count() > 0)

                        <span class="absolute -top-2 -right-2
                                     min-w-[20px] h-5
                                     px-1
                                     flex items-center justify-center
                                     bg-red-500
                                     text-white
                                     text-xs
                                     font-bold
                                     rounded-full">

                            {{ auth()->user()->unreadNotifications->count() }}

                        </span>

                    @endif

                </a>


                {{-- User Dropdown --}}
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center gap-2
                                   px-4 py-2
                                   border border-sky-100
                                   rounded-xl
                                   text-sm font-semibold
                                   text-gray-600
                                   bg-white
                                   hover:bg-sky-50
                                   hover:text-blue-600
                                   transition">

                            <span>
                                {{ Auth::user()->name }}
                            </span>

                            <svg class="fill-current h-4 w-4"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">

                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        {{-- Role --}}
                        <div class="px-4 py-3 border-b border-gray-100">

                            <p class="text-xs text-gray-400 uppercase">
                                Compte
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ ucfirst(Auth::user()->role) }}
                            </p>

                        </div>


                        {{-- Profile --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            Mon profil
                        </x-dropdown-link>


                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                         this.closest('form').submit();">

                                Déconnexion

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            {{-- ================= MOBILE BUTTON ================= --}}
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center
                           p-2 rounded-lg
                           text-gray-500
                           hover:bg-sky-50
                           hover:text-blue-600">

                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- ================= MOBILE MENU ================= --}}
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-sky-100">

        <div class="pt-3 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                Dashboard

            </x-responsive-nav-link>


            {{-- Admin --}}
            @if(auth()->user()->role === 'admin')

                <x-responsive-nav-link
                    :href="route('admin.users.index')">

                    👥 Utilisateurs

                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="route('specialites.index')">

                    🩺 Spécialités

                </x-responsive-nav-link>

            @endif


            {{-- Hôpital --}}
            @if(auth()->user()->role === 'hopital')

                <x-responsive-nav-link
                    :href="route('missions.index')">

                    📋 Mes missions

                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="route('missions.create')">

                    ➕ Créer une mission

                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="route('hopital.candidatures.index')">

                    📝 Candidatures

                </x-responsive-nav-link>

            @endif


            {{-- Médecin --}}
            @if(auth()->user()->role === 'medecin')

                <x-responsive-nav-link
                    :href="route('medecin.missions.index')">

                    🔎 Missions

                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="route('candidatures.index')">

                    📝 Mes candidatures

                </x-responsive-nav-link>

            @endif


            {{-- Notifications --}}
            <x-responsive-nav-link
                :href="route('notifications.index')">

                🔔 Notifications

            </x-responsive-nav-link>

        </div>


        {{-- User --}}
        <div class="pt-4 pb-3 border-t border-sky-100">

            <div class="px-4">

                <div class="font-semibold text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>

                <div class="text-xs text-blue-600 font-semibold mt-1">
                    {{ ucfirst(Auth::user()->role) }}
                </div>

            </div>


            <div class="mt-3 space-y-1">

                <x-responsive-nav-link
                    :href="route('profile.edit')">

                    👤 Mon profil

                </x-responsive-nav-link>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                                 this.closest('form').submit();">

                        🚪 Déconnexion

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>