<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Shirona Salon and Bridal')</title>
    <!--Bootstrap CSS-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #c142bd;
        }
        .btn-custom {
            background-color: #cf48c1;
            color: white;
        }
        .limited-items, .all-items {
            display: none;
        }
        .limited-items.show, .all-items.show {
            display: block;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="#">Shirona Salon & Bridal</a>
        <div class="ml-auto">
            @guest
                <a href="{{ route('login') }}" class="btn btn-custom">Sign In</a>
                <a href="{{ route('register.customer') }}" class="btn btn-custom">Sign Up</a>
            @else
                <a href="{{ route('customer.profile') }}" class="btn btn-custom">Profile</a>
                <a href="{{ route('logout') }}" class="btn btn-custom"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
