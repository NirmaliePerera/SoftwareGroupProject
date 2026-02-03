<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add employee</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .header {
            background-color: #6f42c1;
            color: #fff;
            padding: 20px;
            text-align:center;
        }
        .btn-cutom {
            background-color: rgb(20, 110, 255);
            color: blanchedalmond;
        }
        .form-control:focus {
            border-color: #6f42c1; /* Purple color for the border */
            box-shadow: 0 0 0 0.25rem rgba(209, 59, 255, 0.692); /* Purple shadow */
        }
        .form-select:focus {
            border-color: #6f42c1; /* Purple color for the border */
            box-shadow: 0 0 0 0.25rem rgba(209, 59, 255, 0.692); /* Purple shadow */
        }
        .avatar-upload {
        position: relative;
        max-width: 205px;
        }
        .avatar-upload .avatar-preview {
            width: 67%;
            height: 147px;
            position: relative;
            border-radius: 3%;
            border: 6px solid #F8F8F8;
        }
        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 3%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body>
        <div class="header">
            <h1 class="mb-4">Add a New Employee</h1>
        </div>
        @section('main.content')
        <div class="container mt-5">
        @if($errors->any()) <!--if there is any error-->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error) <!-- for all errors-->
                        <li>{{$error}}</li> <!-- we printout each error-->
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="emp_name" class="form-label">Employee name: </label>
                    <input type="text" name="emp_name" class="form-control" id="emp_name">  
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="birthday" class="form-label">Birthday: </label>
                    <input type="date" name="birthday" class="form-control" id="birthday">    
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender: </label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="blank"></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone number: </label>
                    <input type="string" name="phone" maxlength="10" class="form-control" id="phone">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="address" class="form-label">Home Address: </label>
                    <input type="text" name="address" class="form-control" id="address">    
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address: </label>
                    <input type="string" name="email" class="form-control" id="email">    
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="joined_date" class="form-label">Joined Date: </label>
                    <input type="date" name="joined_date" class="form-control" id="joined_date">    
                </div>
            </div>

    <div class="form-group">
                <label for="image">Employee Image:</label>
                <input type="file" class="form-control" name="image">
               
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    </div>
</div>


            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Employee') }}
                </button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function previewImage(input){
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Add an event listener to the file input to call the previewImage function
    /*$(document).ready(function() {
        $("#imageUpload").change(function() {
            previewImage(this);
        });
    });*/
    </script>
   
</body>
</html>