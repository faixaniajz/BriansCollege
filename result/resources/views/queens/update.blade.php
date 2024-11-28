@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">All Student Result</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('queens.update', $result->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Student Name</label>
                <input type="text" name="stname" class="form-control" value="{{ $result->stname }}" placeholder="Enter Student Name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Teacher Name</label>
                <input type="text" name="tname" class="form-control" value="{{ $result->tname }}" placeholder="Enter Teacher Name">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Class Time</label>
                <input type="text" name="cltime" class="form-control" value="{{ $result->cltime }}" placeholder="Enter Class Time">
            </div>
            <div class="col-md-6">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" value="{{ $result->course }}" placeholder="Enter Course">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Month</label>
                <input type="text" name="month" class="form-control" value="{{ $result->month }}" placeholder="Enter Month">
            </div>
            <div class="col-md-6">
                <label class="form-label">Online Marks</label>
                <input type="number" name="online" class="form-control" value="{{ $result->online }}" placeholder="Enter Online Marks">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Assessment Marks</label>
                <input type="number" name="assesment" class="form-control" value="{{ $result->assesment }}" placeholder="Enter Assessment Marks">
            </div>
            <div class="col-md-6">
                <label class="form-label">Attendance Marks</label>
                <input type="number" name="attendance" class="form-control" value="{{ $result->attendance }}" placeholder="Enter Attendance Marks">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
