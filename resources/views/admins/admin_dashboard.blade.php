<!-- resources/views/admin_dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Side Navigation Bar -->
        @include('profile.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Place your dashboard content here -->
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold mb-4">Dashboard Content</h3>
                <p>Welcome to the Admin Dashboard!</p>
            </div>
        </div>
    </div>
</x-app-layout>
