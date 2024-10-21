<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        </style>
        <style>
.gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .image-container {
            position: relative;
            width: 310px; /* Set the width for each image container */
            height: 310px; /* Set the height for each image container to make it a square */
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            width: auto;
            transform: translate(-50%, -50%);
        }

        .image-container img.portrait {
            width: 100%;
            height: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="lightbox.css">
</head>
<body>
   

<?php
// Database connection
$servername = "localhost";
$username = "whxpykvf_brains1";
$password = "brainskhan786";
$dbname = "whxpykvf_assignment_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['course'])) {
    $course = $_GET['course'];

    // Validate the course name to prevent SQL injection
    $valid_courses = ['web', 'it', 'python', 'graphics', 'autocad', '3dsmax'];
    if (in_array($course, $valid_courses)) {
        $sql = "SELECT student_id, assignment_name, assignment_file, upload_date FROM $course";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1 align='center'><font face='Poppins'>Assignments for " . ucfirst($course) . " Course</font></h1>";
            echo "<div class='gallery'>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<div class='image-container'>";
                echo "<a href='" . $row['assignment_file'] . "' data-lightbox='image-1' ><img src='" . $row['assignment_file'] . "' alt='" . $row['assignment_name'] . "' data-lightbox='image-1' data-title='" . $row['assignment_name'] . "'></a>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "
            <script>
            alert('No assignments found for this course.');
            window.location.href='../index.html';
            </script>
            ";
        }
    } else {
        echo "
            <script>
            alert('Invalid course selected.');
            window.location.href='../index.html';
            </script>
            ";
    }
} else {
    echo "
            <script>
            alert('No course selected.');
            window.location.href='../index.html';
            </script>
            ";
}

$conn->close();
?>

<script src="lightbox.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 500,
        'wrapAround': true
    });
</script>


</body>
</html>


