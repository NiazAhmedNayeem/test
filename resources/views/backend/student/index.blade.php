@extends('backend.include.master')
@section('title')
    Manage Student
@endsection
@section('main_content')

    <div class="container">

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

        <h1>Students List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            @if ($student->image)
                                <img src="{{ $student->image_show }}" alt="Student Image" width="50">
                                {{-- @else
                                    <img src="{{ asset('images/default_student_image.png') }}" alt="Default Image" width="50"> --}}
                            @endif
                        </td>
                        <td>{{ $student->name }}</td>
                        <td>{{ @$student->class->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ route('admin.student.edit',  $student->id) }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.student.delete',  $student->id) }}"><i class="fa fa-trash" style="color:red"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>









@endsection