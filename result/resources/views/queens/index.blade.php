@extends('layouts.app')

@section('content')

<h1 class="text-right my-4">Result By Queens Road Branch</h1>

<!-- Alert Message for Deletion -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- Bootstrap Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered shadow-lg">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Roll Number</th>
                <th scope="col">Course</th>
                <th scope="col">Teacher Name</th>
                <th scope="col">Month</th>
                <th scope="col">Timing</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <th>{{ $loop->iteration + ($results->currentPage() - 1) * $results->perPage() }}</th>
                <td>{{ $result->stname }}</td>
                <td>{{ $result->rollno }}</td>
                <td>{{ $result->course }}</td>
                <td>{{ $result->tname }}</td>
                <td>{{ $result->month }}</td>
                <td>{{ $result->cltime }}</td>
                <td>
                    <a href="{{ route('queens.destroy', $result->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this result?');">Delete</a>
                    <a href="{{ route('queens.edit', $result->id) }}" class="btn btn-warning btn-sm">Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination Links -->
<div class="d-flex justify-content-right mt-4">
    {{ $results->links('pagination::bootstrap-4') }}
</div>

@endsection
