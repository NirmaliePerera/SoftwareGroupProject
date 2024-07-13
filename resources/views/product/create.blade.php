<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        .alert-danger {
            background-color: #ffebee;
            border-color: #ffebee;
            color: #c62828;
        }
        #imagePreview {
            width: 100%;
            height: 150px;
            background-size: cover;
            background-position: center;
            border: 2px solid #7e57c2; /* light purple border for image preview */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create Your Product</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter product category">
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Enter product color">
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="Enter product size">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter product quantity">
            </div>

            <div class="form-group">
                <label for="initial_price">Initial Price:</label>
                <input type="text" class="form-control" id="initial_price" name="initial_price" placeholder="Enter initial price">
            </div>

            <div class="form-group">
                <label for="last_rented_price">Last Rented Price:</label>
                <input type="text" class="form-control" id="last_rented_price" name="last_rented_price" placeholder="Enter last rented price">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter product description"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control" name="image">
               
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
