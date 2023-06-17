<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div><a href="{{route('student.create')}}" class="btn btn-primary">Add New Student</a></div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->stud_id}}</td>
                        <td>{{$student->stud_name}}</td>
                        <td>{{$student->stud_city}}</td>
                        <td>{{$student->stud_contact}}</td>
                        <td><img src="{{Storage::url($student->image_path) }}" class="card-img-top"></td>
                        <td>
                            <form action="{{route('student.destroy',$student->stud_id)}}" method="post">
                            <a href="{{route('student.edit',$student->stud_id)}}" class="btn btn-success">Edit</a>
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <center>
        <h1>Welcome {{$employee['name'] ?? ''}}</h1>
    </center> --}}

</body>

</html>