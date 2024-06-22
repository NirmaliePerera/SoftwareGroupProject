<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit details</title>
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
    </style>
</head>
<body>
    <div class="header">
        <h1 class="mb-4">Edit Employee Details</h1>
    </div>
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
    <form method="post" action="{{ route('employee.update', ['employee' => $employee]) }}">
        @csrf
        @method('put')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="emp_name" class="form-label">Employee name: </label>
                <input type="text" name="emp_name" class="form-control" value="{{$employee->emp_name}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="birthday" class="form-label">Birthday: </label>
                <input type="date" name="birthday" class="form-control" value="{{$employee->birthday}}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender: </label>
                <input type="string" name="gender" class="form-control" value="{{$employee->gender}}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone number: </label>
                <input type="string" name="phone" maxlength="10" class="form-control" value="{{$employee->phone}}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="address" class="form-label">Home Address: </label>
                <input type="text" name="address" class="form-control" value="{{$employee->address}}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email Address: </label>
                <input type="string" name="email" class="form-control" value="{{$employee->email}}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="joined_date" class="form-label">Joined Date: </label>
                <input type="date" name="joined_date" class="form-control" value="{{$employee->joined_date}}">
            </div>
        </div>
        
        <div>
            <p>Check all the details before saving changes.</p>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary" style="background-color:rgb(20, 110, 255); color:blanchedalmond">
                {{ __('Save Changes') }}
            </button>
        </div>
        
    </form>
</body>
</html>