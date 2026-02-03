<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .welcome-container {
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('{{ asset('img/background.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .welcome-image {
            width: 50%; /* Adjust the width as needed */
            max-width: 400px; /* Maximum width to ensure it doesn't get too large */
            height: auto; /* Maintain aspect ratio */
            margin: 20px 0; /* Add some space around the image */
        }
        .btn-custom {
            background-color: #007bff; /* Primary blue color */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Darker blue for hover effect */
            color: white;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h1 class="display-4 text-gray-900">{{ __("WELCOME!") }}</h1>
        </div>

        <img src="{{ asset('img/welcome_image.png') }}" alt="Welcome Image" class="welcome-image">

        @if (Route::has('login'))
            <nav class="mt-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="btn-custom"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="btn-custom"
                    >
                        Log in
                    </a>
                @endauth
            </nav>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
