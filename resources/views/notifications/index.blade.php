<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notifications
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    @forelse($notifications as $notification)

                        <div class="p-4 mb-3 bg-gray-50 rounded border">

                            <p class="text-gray-800">
                                {{ $notification->data['message'] ?? 'Nouvelle notification' }}
                            </p>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $notification->created_at->format('d/m/Y H:i') }}
                            </p>

                        </div>

                    @empty

                        <p class="text-gray-500">
                            Aucune notification.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>
    </div>

</x-app-layout>