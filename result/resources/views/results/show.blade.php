@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="display-4">Roll Number: <span class="text-primary">{{ $result->rollno }}</span></h2>
        <hr class="my-4">
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Student Details</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Name:</strong> {{ $result->stname }}
                </li>
                <li class="list-group-item">
                    <strong>Course:</strong> {{ $result->course }}
                </li>
                <li class="list-group-item">
                    <strong>Month:</strong> {{ $result->month }}
                </li>
                <li class="list-group-item">
                    <strong>Class Time:</strong> {{ $result->cltime }}
                </li>
                <li class="list-group-item">
                    <strong>Teacher Name:</strong> {{ $result->tname }}
                </li>
                <li class="list-group-item">
                    <strong>Assignment Marks:</strong> {{ $result->assesment }}
                </li>
                <li class="list-group-item">
                    <strong>Paper Marks:</strong> {{ $result->online }}
                </li>
                <li class="list-group-item">
                    <strong>Attendance Marks:</strong> {{ $result->attendance }}
                </li>
                <li class="list-group-item">
                    <strong>Total Marks:</strong> 100
                </li>
                <li class="list-group-item">
                    <strong>Obtained Marks:</strong> {{ $totalMarks }}
                </li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('results.index') }}" class="btn btn-secondary btn-lg">Back to Search</a>
    </div>
</div>
@endsection
