@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="text-center --bs-danger mb-4" style=" font-family: Outfit;">BRAINS COLLEGE RESULT</h2>

  @if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <div class="card shadow-sm">
    <div class="card-body">
      <form method="POST" class="form" action="{{ route('results.search') }}">
        @csrf
        <form method="POST" action="{{ route('results.search') }}">
          @csrf
          <div class="form-group mb-3">
            <label for="branch" class="form-label">Branch:</label>
            <select name="branch" id="branch" class="form-control" required>
              <option value="" disabled selected>Select a Branch</option>
              <option value="baghbanpura">Baghbanpura Campus</option>
              <option value="queens">Queen's Road Campus</option>
              <option value="walton">Walton Road Campus</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="rollno" class="form-label">Roll Number:</label>
            <input type="text" name="rollno" id="rollno" class="form-control" required placeholder="Enter Roll Number">
          </div>

          <div class="form-group mb-3">
            <label for="month" class="form-label">Month:</label>
            <select name="month" id="month" class="form-control" required>
              <option value="" disabled selected>Select Month</option>
              <option value="01">January</option>
              <option value="02">February</option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100 mb-4">Search</button>
</form>

      <hr class="my-4">

      <div class="steps-section">
        <h5 class="card-title text-center mb-3">Steps to Pass an Exam and Earn a Certificate</h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <strong>1.</strong> Three monthly tests are conducted at the end of each month.
          </li>
          <li class="list-group-item">
            <strong>2.</strong> All tests are <strong>MCQ-based</strong> and include theory questions, which students must submit to their teachers.
          </li>
          <li class="list-group-item">
            <strong>3.</strong> Passing marks are <strong>75%</strong>, which are mandatory to claim a diploma.
          </li>
          <li class="list-group-item">
            <strong>4.</strong> Grading System:
            <ul class="list-group mt-2">
              <li class="list-group-item"><span class="badge bg-primary">C</span> 75% - 80%</li>
              <li class="list-group-item"><span class="badge bg-info text-dark">B</span> 81% - 90%</li>
              <li class="list-group-item"><span class="badge bg-success">A</span> 91% - 100%</li>
            </ul>
          </li>
          <li class="list-group-item">
            <strong>5.</strong> Since MCQs alone can earn only <strong>75%</strong> marks, students must maintain attendance according to college policies, allowing a maximum of <strong>2 days off per month</strong>.
          </li>
          <li class="list-group-item">
            <strong>6.</strong> With full attendance, students can earn an additional <strong>25%</strong> marks to secure 100%.
          </li>
          <li class="list-group-item">
            <strong>7.</strong> If a student fails any exam, they must reappear mid-month for a retake.
          </li>
        </ul>
      </div>

      <hr class="my-4">

      <div class="program-section">
        <h6 class="text-center text-secondary mb-4">Available Diploma Programs at Brains College:</h6>
        <div class="row">
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Spoken English</li>
              <li class="list-group-item">IELTS Proficiency</li>
              <li class="list-group-item">EFI</li>
              <li class="list-group-item">Graphic Designing</li>
              <li class="list-group-item">Digital Marketing</li>
              <li class="list-group-item">Freelancing</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">SEO (Search Engine Optimization)</li>
              <li class="list-group-item">Web Design & Development (Full Stack)</li>
              <li class="list-group-item">Programming Languages (Laravel, Python, MERN Stack)</li>
              <li class="list-group-item">Microsoft Office</li>
              <li class="list-group-item">E-commerce Branding (Amazon, Shopify, eBay, Daraz, Walmart)</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer text-center text-muted">
      <p style="color: black; font-family: Outfit;">&copy; 2024 <b><span style="color: #C90514; font-weight: bold">Brains</span> College</b>. All Rights Reserved.</p>
    </div>
  </div>
</div>
@endsection