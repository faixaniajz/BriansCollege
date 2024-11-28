@extends('layouts.app')

@section('content')
<div class="container mt-5" style="height: 110vh;">
    <div class="text-left mb-4">
        <h2 class="display-4" style="font-size: 36px;">
            <strong>Student Name:</strong> 
            <span class="text-danger"><b>{{ ucfirst($result->stname) }}</b></span>
        </h2>
        <p class="lead text-muted"><strong>Student Examination Result System</strong></p>
        <hr class="my-4" style="border-top: 2px solid #6c757d;">
    </div>



    <div class="card shadow-sm">
        <div class="card-header bg-light text-dark">
            <h5 class="mb-0">Student Details</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ ucfirst($result->stname) }}</td>
                    </tr>
                    <tr>
                        <th>Course</th>
                        <td>{{ $result->course }}</td>
                    </tr>
                    <tr>
                        <th>Month</th>
                        <td>{{ $result->month }}</td>
                    </tr>
                    <tr>
                        <th>Class Time</th>
                        <td>{{ $result->cltime }}</td>
                    </tr>
                    <tr>
                        <th>Teacher Name</th>
                        <td>{{ $result->tname }}</td>
                    </tr>
                    <tr>
                        <th>Assignment Marks</th>
                        <td>{{ $result->assesment }}</td>
                    </tr>
                    <tr>
                        <th>Paper Marks</th>
                        <td>{{ $result->online }}</td>
                    </tr>
                    <tr>
                        <th>Attendance Marks</th>
                        <td>{{ $result->attendance }}</td>
                    </tr>
                    <tr>
                        <th>Total Marks</th>
                        <td>100</td>
                    </tr>
                    <tr>
                        <th>Obtained Marks</th>
                        <td>{{ $totalMarks }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-left mt-4">
        <a href="{{ route('results.index') }}" class="btn btn-success btn-lg">Back to Search</a>
    </div>
</div>
@endsection
