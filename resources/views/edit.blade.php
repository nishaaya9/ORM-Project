<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div><a href="{{route('student.index')}}" class="btn btn-primary">Back</a></div>
    <form action="{{route('student.update',$student->stud_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$student->stud_name ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">City</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="city" value="{{$student->stud_city ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contact</label>
            <input type="contact" class="form-control" id="exampleInputPassword1" name="contact" value="{{$student->stud_contact ?? ''}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <img src="/Images/{{$student->stud_image}}" height="50px" width="70px">
            <input type="text" name="hiddenimg" value="{{$student->stud_image}}">
            <input type="file" class="form-control" id="exampleInputPassword1" name="image" value="{{$student->stud_image ?? ''}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
</body>

</html>