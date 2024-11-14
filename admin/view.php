<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments Gallery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .media-container {
            position: relative;
            width: 310px; /* Set the width for each media container */
            height: 310px; /* Set the height for each media container to make it a square */
            overflow: hidden;
        }
        .media-container img, .media-container video {
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100%;
            width: auto;
            transform: translate(-50%, -50%);
        }
        .media-container img.portrait, .media-container video.portrait {
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
$username = "u712188004_junaidsubhani7";
$password = "BrainsJunaid@0404014.";
$dbname = "u712188004_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['course'])) {
    $course = $_GET['course'];

    $valid_courses = ['web', 'it', 'python', 'graphics', 'autocad', '3dsmax', 'shopify'];
    if (in_array($course, $valid_courses)) {
        $sql = "SELECT student_id, assignment_name, assignment_file, upload_date FROM $course";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1 align='center'><font face='Poppins'>Assignments for " . ucfirst($course) . " Course</font></h1>";
            echo "<div class='gallery'>";
            
            while ($row = $result->fetch_assoc()) {
                $file_ext = strtolower(pathinfo($row['assignment_file'], PATHINFO_EXTENSION));
                echo "<div class='media-container'>";
                if (in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
                    echo "<a href='" . $row['assignment_file'] . "' data-lightbox='image-1' ><img src='" . $row['assignment_file'] . "' alt='" . $row['assignment_name'] . "' data-lightbox='image-1' data-title='" . $row['assignment_name'] . "'></a>";
                } elseif ($file_ext == 'mp4') {
                    echo "<video controls muted>
                            <source src='" . $row['assignment_file'] . "' type='video/mp4'>
                            Your browser does not support the video tag.
                          </video>";
                }
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<script>
            alert('No assignments found for this course.');
            window.location.href='../index';
            </script>";
        }
    } else {
        echo "<script>
            alert('Invalid course selected.');
            window.location.href='../index';
            </script>";
    }
} else {
    echo "<script>
            alert('No course selected.');
            window.location.href='../index';
            </script>";
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
