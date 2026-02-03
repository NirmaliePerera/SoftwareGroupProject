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
   
   <!-- Add your dashboard content here -->             

    <div class="flex">
        <!-- Side Navigation Bar -->
        <div class="w-1/4 h-screen bg-purple-700 text-white">
            <div class="p-6">
                <h3 class="text-lg font-semibold">Navigation</h3>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a href="{{ route('register.employee') }}" class="block p-2 bg-purple-800 hover:bg-purple-900 rounded">
                            Employee Register
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.employee.index') }}" class="block p-2 bg-purple-800 hover:bg-purple-900 rounded">
                            Employee Details
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
                    
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile.edit') }}" class="block p-2 bg-purple-800 hover:bg-purple-900 rounded">
                            Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
