<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Approved Assignments</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       /* .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .media-container {
            position: relative;
            width: 310px;
            height: 310px;
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
            */ 
           /* Basic Styling */
        body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            padding-top: 30px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Creates responsive grid */
            gap: 15px;
            padding: 20px;
        }

        /* Style for individual media container */
        .media-container {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .media-container:hover {
            transform: scale(1.05); /* Zoom effect on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Ensuring images and videos fit within the container */
        .media-container img, .media-container video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the object fits without cropping */
            object-position: center;
            border-bottom: 1px solid #eee;
        }

        /* Lightbox styling */
        .media-container a {
            display: block;
        }

        /* Responsive behavior */
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Slightly smaller images on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .gallery {
                grid-template-columns: 1fr; /* One column on mobile devices */
            }
        }



    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="lightbox.css">
</head>
<body>

<?php

$servername = "localhost";
$username = "u712188004_junaidsubhani7";
$password = "BrainsJunaid@0404014.";
$dbname = "u712188004_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$course_tables = ['web', 'it', 'python', 'graphics', 'autocad', '3dsmax', 'shopify'];

$all_assignments = [];

foreach ($course_tables as $course) {
    $sql = "SELECT '$course' AS course, assignment_name, assignment_file, upload_date FROM $course ORDER BY upload_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $all_assignments[] = $row;
        }
    }
}

if (count($all_assignments) > 0) {
    echo "<h1 align='center'><font face='Poppins'>Assignments</font></h1>";
    echo "<div class='gallery'>";

    // Display all the approved assignments
    foreach ($all_assignments as $assignment) {
        $file_ext = strtolower(pathinfo($assignment['assignment_file'], PATHINFO_EXTENSION));
        echo "<div class='media-container'>";
        
        if (in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
            echo "<a href='" . $assignment['assignment_file'] . "' data-lightbox='image-1'><img src='" . $assignment['assignment_file'] . "' alt='" . $assignment['assignment_name'] . "' data-lightbox='image-1' data-title='" . $assignment['assignment_name'] . "'></a>";
        } elseif ($file_ext == 'mp4') {
            echo "<video controls muted>
                    <source src='" . $assignment['assignment_file'] . "' type='video/mp4'>
                    Your browser does not support the video tag.
                  </video>";
        }
        
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<script>
    alert('No approved assignments found.');
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
