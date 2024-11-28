<?php
$servername = "localhost";
$username = "u712188004_junaidsubhani7";
$password = "BrainsJunaid@0404014.";
$dbname = "u712188004_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = $_POST['course'];
    $student_id = 1; // Replace with actual student ID from your session or authentication system
    $email = $_POST['Email'];
    
    // Validate email domain to only allow @gmail.com
    if (preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
        // Check if email exists in the 'user' table
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email exists, proceed with file upload
            $assignment_name = $_FILES['assignment']['name'];
            $assignment_tmp_name = $_FILES['assignment']['tmp_name'];
            $assignment_size = $_FILES['assignment']['size'];
            $assignment_error = $_FILES['assignment']['error'];
            $assignment_type = $_FILES['assignment']['type'];

            $assignment_ext = explode('.', $assignment_name);
            $assignment_actual_ext = strtolower(end($assignment_ext));
            $allowed = array('jpg', 'jpeg', 'png', 'mp4');

            if (in_array($assignment_actual_ext, $allowed)) {
                if ($assignment_error === 0) {
                    if ($assignment_size < 5000000) { 
                        $assignment_new_name = uniqid('', true) . "." . $assignment_actual_ext;
                        $assignment_destination = 'uploads/' . $assignment_new_name;

                        if (move_uploaded_file($assignment_tmp_name, $assignment_destination)) {
                            $sql = "INSERT INTO pending_assignments (student_id, Email, course, assignment_name, assignment_file) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("issss", $student_id, $email, $course, $assignment_name, $assignment_destination);

                            if ($stmt->execute()) {
                                echo "
                                <script>
                                alert('Assignment uploaded successfully and is pending approval.');
                                window.location.href='index';
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
                            window.location.href='index';
                            </script>
                            ";
                        }
                    } else {
                        echo "
                        <script>
                        alert('Your file is too big.');
                        window.location.href='index';
                        </script>
                        ";
                    }
                } else {
                    echo "
                    <script>
                    alert('There was an error uploading your file.');
                    window.location.href='index';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('You cannot upload files of this type.');
                window.location.href='index';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Email is not registered in the system.');
            window.location.href='index';
            </script>
            ";
        }

        $stmt->close();
    } else {
        echo "
        <script>
        alert('Please use a valid Gmail address (e.g., example@gmail.com).');
        window.location.href='index';
        </script>
        ";
    }
}

$conn->close();
?>
