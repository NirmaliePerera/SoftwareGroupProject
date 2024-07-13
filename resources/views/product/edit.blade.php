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
        .alert-danger {
            background-color: #ffebee;
            border-color: #ffebee;
            color: #c62828;
        }
        .img-thumbnail {
            max-width: 100px;
        }
        .product-upload {
            position: relative;
            max-width: 205px;
        }
        .product-upload .product-preview {
            width: 100%;
            height: 147px;
            position: relative;
            border-radius: 3%;
            border: 6px solid #f8f8f8;
        }
        .product-upload .product-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 3%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <title>Edit Product</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit a Product</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form method="POST" action="{{route('product.update', ['product'=> $product])}}" enctype="multipart/form-data">
            @csrf 
            @method('put')
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{$product->name}}"/>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <input type="text" name="category" class="form-control" placeholder="category" value="{{$product->category}}"/>
            </div>
            <div class="form-group">
                <label>Color:</label>
                <input type="text" name="color" class="form-control" placeholder="color" value="{{$product->color}}"/>
            </div>
            <div class="form-group">
                <label>Size:</label>
                <input type="text" name="size" class="form-control" placeholder="size" value="{{$product->size}}"/>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="text" name="quantity" class="form-control" placeholder="quantity" value="{{$product->quantity}}"/>
            </div>
            <div class="form-group">
                <label>Initial Price:</label>
                <input type="text" name="initial_price" class="form-control" placeholder="initial price" value="{{$product->initial_price}}"/>
            </div>
            <div class="form-group">
                <label>Last Rented Price:</label>
                <input type="text" name="last_rented_price" class="form-control" placeholder="last rented price" value="{{$product->last_rented_price}}"/>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <input type="text" name="description" class="form-control" placeholder="description" value="{{$product->description}}"/>
            </div>
            <div class="form-group col-md-12 mb-5">
                <label for="">Product Image:</label>
                <input type="file" name="image" class="form-control" />
                
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="submit" value="Update" class="btn btn-primary"/>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
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
