@extends('backend.include.master')
@section('title')
    Edit New Student
@endsection

@section('head')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('main_content')
    <div class="container mt-5">
        <h2>Update student info</h2>


        <!-- Display success message -->
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <!-- Display error messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" >
            </div>
            <div class="form-group">
                <label for="name">Class:</label>
                <select name="class_id" class="form-control">
                    <option value="">Select Class</option>  
                    @foreach ($classes as $class)
                    <option @if ($class->id == $student->class_id) Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
            </div>
            <div class="form-group">
                <label for="age">Date of Birth:</label>
                <input type="date" class="form-control" id="age" name="dob" value="{{ $student->dob }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <img src="{{ $student->image_show }}" alt="Student Image" width="100">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="about">About:</label>
                <textarea class="form-control" id="about" name="about" rows="5" required>{{ $student->about  }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
