<!-- resources/views/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record</title>
</head>
<body>
    <h1>Upload Image and Name</h1>
    
    <form action="{{ route('results.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="roll_number">Roll Number:</label>
        <input type="text" name="roll_number" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="image">Course</label>
        <input type="file" name="image" required><br>

        <label for="pdf">Attendance Marks</label>
        <input type="file" name="pdf" required><br>

        <label for="pdf">Result Marks</label>
        <input type="file" name="pdf" required><br>
        
        <label for="pdf">Assignment Marks</label>
        <input type="file" name="pdf" required><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
