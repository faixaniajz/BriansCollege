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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = $_POST['course'];
    $student_id = 1; // Replace with actual student ID from your session or authentication system
    $assignment_name = $_FILES['assignment']['name'];
    $assignment_tmp_name = $_FILES['assignment']['tmp_name'];
    $assignment_size = $_FILES['assignment']['size'];
    $assignment_error = $_FILES['assignment']['error'];
    $assignment_type = $_FILES['assignment']['type'];

    $assignment_ext = explode('.', $assignment_name);
    $assignment_actual_ext = strtolower(end($assignment_ext));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($assignment_actual_ext, $allowed)) {
        if ($assignment_error === 0) {
            if ($assignment_size < 5000000) { // File size less than 5MB
                $assignment_new_name = uniqid('', true) . "." . $assignment_actual_ext;
                $assignment_destination = 'uploads/' . $assignment_new_name;

                if (move_uploaded_file($assignment_tmp_name, $assignment_destination)) {
                    $sql = "INSERT INTO $course (student_id, assignment_name, assignment_file) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("iss", $student_id, $assignment_name, $assignment_destination);

                    if ($stmt->execute()) {
                        echo "
            <script>
            alert('Assignment uploaded successfully.');
            window.location.href='home.php';
            </script>
            ";
                    } else {
                        echo "Error: " . $stmt->error;
                        
                    }

                    $stmt->close();
                } else {
                   
                    echo "
            <script>
            alert('Error moving file.');
            window.location.href='home.php';
            </script>
            ";
                }
            } else {
                
                echo "
                <script>
                alert('Your file is too big.');
                window.location.href='home.php';
                </script>
                ";
            }
        } else {
           
            echo "
            <script>
            alert('There was an error uploading your file.');
            window.location.href='home.php';
            </script>
            ";
        }
    } else {
        
        echo "
        <script>
        alert('You cannot upload files of this type.');
        window.location.href='home.php';
        </script>
        ";
    }
}

$conn->close();
?>
