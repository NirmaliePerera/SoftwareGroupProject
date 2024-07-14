<!-- resources/views/partials/sidebar.blade.php -->
<div class="w-1/4 h-screen bg-purple-700 text-white p-4">
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Shirona Salon</h2>
    </div>
    <nav>
        <ul>
            <li class="mb-4">
                <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-purple-800">Dashboard</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('register.employee') }}" class="block p-2 rounded hover:bg-purple-800">Employee Register</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('product.index') }}" class="block p-2 rounded hover:bg-purple-800">Products</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('appointments.index') }}" class="block p-2 rounded hover:bg-purple-800">Appointments</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('profile.edit') }}" class="block p-2 rounded hover:bg-purple-800">Profile</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('logout') }}" class="block p-2 rounded hover:bg-purple-800"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
