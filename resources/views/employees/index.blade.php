<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            background-color: rgb(255, 226, 249);
        }
        .header {
            background-color: #6f42c1;
            color: #fff;
            padding: 20px;
            text-align:center;
        }
        .container {
            margin-top:30px;
        }
        .btn-edit {
            background-color: #28a745;
            color:white;
        }
        .btn-delete {
            background-color: #007bff;
            color:white;
        }
        .table th, .table td {
            background-color: #f8d2ff;
            border-width:2px;
            vertical-align: middle;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1 class="mb-4">Employee Details</h1>
    </div>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}} <!-- 'success' from EmployeeController-->
            </div>
        @endif
    </div>
    <div>
        <div class="mb-3">
           <a href="{{route('admin.employee.create')}}" class="btn btn-primary">Add a new employee</a> 
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Home Address</th>
                        <th>Email</th> 
                        <th>Joined Date</th>
                        <th>Photo</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee) <!-- $employees from EmployeeController 'employees', "($employees as $employee)"loops through each employee-->
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->emp_name}}</td>
                            <td>{{$employee->birthday}}</td>
                            <td>{{$employee->gender}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->address}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->joined_date}}</td>
                            <td>            
                            <img src="{{ asset($employee->image) }}" style="width: 80px; height:100px;" alt="Img" />
                        </td>
                            <td>                           <!--This $employee is passed to this 'employee' from route {employee},, "['employee' => $employee]" array -->
                                <a href="{{route('admin.employee.edit', ['employee' => $employee])}}" class="btn btn-edit btn-sm">Edit</a>
                            </td><!-- loop through each iteam and put edit link-->
                            
                            <!--To delete data, use form-->
                            <td> <!--In Laravel, do not create a link directly in action, instead use a route name to generate a link-->
                                <form method="post" action="{{route('admin.employee.destroy', ['employee' => $employee])}}" onsubmit="return confirmDeletion()"> <!-- say what employee you want to delete-->
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-delete btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDeletion() {
        return confirm('Are you sure you want to delete this employee?');
    }
    </script>
</body>
</html>