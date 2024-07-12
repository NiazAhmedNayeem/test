@extends('backend.include.master')
@section('title')
    Manage Class
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
        
        <h1>ClassList</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Class Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <td>
                            @if ($class->image)
                                <img src="{{ $class->image_show }}" alt="class Image" width="50">
                                {{-- @else
                                    <img src="{{ asset('images/default_student_image.png') }}" alt="Default Image" width="50"> --}}
                            @endif
                        </td>
                        <td>{{ $class->name }}</td>
                        <td>
                            <a href="{{ route('admin.class.edit',  $class->id) }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.class.delete',  $class->id) }}"><i class="fa fa-trash" style="color:red"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection