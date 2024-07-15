<!DOCTYPE html>
<html>
<head>
    <title>Shirona Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>@yield('title', 'Shirona Salon and Bridal')</title>
    <!--Bootstrap CSS-->
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
            
            <a href="{{ route('products.list') }}" class="btn btn-custom">Products</a>    
            <a href="{{ route('collection.list') }}" class="btn btn-custom">Favourites</a>
            <a href="{{ route('appointments.create') }}" class="btn btn-custom">Schedule Appointment</a>
            <a href="{{ route('customer.profile') }}" class="btn btn-custom">Profile</a>
                <a href="{{ route('logout') }}" class="btn btn-custom"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            
        </div>
    </nav>

<div class="container mt-5">
    
    <p>Select your favourite designs.</p>
    <p>Note:Only 3 designs would be allowed for trying on</p>
        
    @php
    $totalQuantity = 0;
    @endphp
    
    @if(session('collection'))
    @foreach(session('collection') as $item)
        @php
        $totalQuantity += $item['quantity'];
        @endphp
    @endforeach
    @endif

    <div class="col-12">
        <div class="dropdown" >
            <a class="btn btn-outline-dark" href="{{ url('collection-list') }}">
               <i class="fa fa-favourite-collection" aria-hidden="true"></i> Favourites <span class="badge text-bg-danger" id="collection-quantity">{{ $totalQuantity }}</span>
            </a>
        </div>
    </div>
</div>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    @yield('content')
</div>
  
@yield('scripts')
</body>
</html>