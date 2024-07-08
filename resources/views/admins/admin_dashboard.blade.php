<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Side Navigation Bar -->
        <div class="w-1/4 h-screen bg-purple-700 text-white">
            <div class="p-6">
                <h3 class="text-lg font-semibold">Navigation</h3>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a href="{{ route('auth.register') }}" class="block p-2 bg-purple-800 hover:bg-purple-900 rounded">
                            Employee Register
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('product.index') }}" class="block p-2 bg-purple-800 hover:bg-purple-900 rounded">
                            Products
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('appointments.index') }}" class="block p-2 bg-purple-800 hover:bg-purple-900 rounded">
                            Appointments
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Main Content -->
        <div class="w-3/4 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
