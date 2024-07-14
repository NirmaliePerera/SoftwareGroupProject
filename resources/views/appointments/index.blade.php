<!DOCTYPE html>
<html>

<head>
    <title>Appointment Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-primary" style="font-family: verdana; font-size: 200%;">Appointment Details</h1>

        <div class="container mt-3">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ $appointment->service }}</td>
                        <td>{{ $appointment->message }}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary btn-edit"
                                style="margin-left: 20px;">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete"
                                    style="margin-left: 20px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
