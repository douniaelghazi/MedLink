<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'utilisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-6">
                    {{ $user->name }}
                </h3>

                <div class="space-y-4">

                    <div>
                        <span class="font-semibold">ID :</span>
                        {{ $user->id }}
                    </div>

                    <div>
                        <span class="font-semibold">Nom :</span>
                        {{ $user->name }}
                    </div>

                    <div>
                        <span class="font-semibold">Email :</span>
                        {{ $user->email }}
                    </div>

                    <div>
                        <span class="font-semibold">Rôle :</span>

                        @if($user->role === 'admin')
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded">
                                Admin
                            </span>
                        @elseif($user->role === 'client')
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">
                                Client
                            </span>
                        @else
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded">
                                Freelance
                            </span>
                        @endif
                    </div>

                    <div>
                        <span class="font-semibold">Inscrit le :</span>
                        {{ $user->created_at->format('d/m/Y H:i') }}
                    </div>

                </div>

                <div class="mt-8 flex gap-3">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                    >
                        ← Retour
                    </a>

                    <a
                        href="{{ route('admin.users.edit', $user) }}"
                        class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                    >
                        Modifier
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>