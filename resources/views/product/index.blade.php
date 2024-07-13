<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3e5f5; /* light purple background */
            color: #333; /* default text color */
        }
        .container {
            background-color: #fff; /* white background for the form container */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #7e57c2; /* light purple button */
            border-color: #7e57c2;
        }
        .btn-primary:hover {
            background-color: #6a1b9a; /* darker purple for hover effect */
            border-color: #6a1b9a;
        }
        .form-control {
            border-radius: 5px;
        }
        .alert-success {
            background-color: #ffebee;
            border-color: #ffebee;
            color: #c62828;
        }
        .img-thumbnail {
            max-width: 100px;
        }
        .showPhoto {
            width: 100px;
            height: 100px;
        }
        .showPhoto #imagePreview {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            border: 2px solid #7e57c2; /* light purple border for image preview */
        }
    </style>
    <title>Product List</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-4">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Create a Product</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Initial Price</th>
                    <th>Last Rented Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->initial_price }}</td>
                        <td>{{ $product->last_rented_price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>            
                            <img src="{{ asset($product->image) }}" style="width: 80px; height:100px;" alt="Img" />
                        </td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('product.delete', ['product' => $product]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
