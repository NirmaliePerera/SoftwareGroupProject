<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Appointment Information</title>
    <link rel="icon" href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        Edit Appointment Information
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('appointments.update', $appointment) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">

                                <label for="date" class="form-label">Appointment Date</label>
                                <input type="string" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" name="time" value="{{ $appointment->time }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $appointment->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="service" class="form-label">Service</label>
                                <input type="service" class="form-control" id="service" name="service" value="{{ $appointment->service }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Done" {{ $appointment->status == 'Done' ? 'selected' : '' }}>Done</option>                                    
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
