<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: approval");
    exit;
}

$servername = "localhost";
$username = "u712188004_junaidsubhani7";
$password = "BrainsJunaid@0404014.";
$dbname = "u712188004_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = intval($_POST['id']);

    if ($action == 'approve') {
        $sql = "SELECT * FROM pending_assignments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $course = $conn->real_escape_string($row['course']);
            $student_id = $row['student_id'];
            $student_email = $row['Email'];
            $assignment_name = $row['assignment_name'];
            $assignment_file = $row['assignment_file'];

            $sql_insert = "INSERT INTO $course (student_id, Email, assignment_name, assignment_file) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("isss", $student_id, $student_email, $assignment_name, $assignment_file);

            if ($stmt_insert->execute()) {
                $sql_delete = "DELETE FROM pending_assignments WHERE id = ?";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bind_param("i", $id);
                $stmt_delete->execute();

                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Approved!',
                            text: 'Assignment approved successfully.',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'admin_review.php';
                        });
                      </script>";
            } else {
                echo "Error: " . $stmt_insert->error;
            }
        }
        $stmt->close();
    } elseif ($action == 'decline') {
        $sql_select = "SELECT assignment_file FROM pending_assignments WHERE id = ?";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $file_path = $row['assignment_file'];

            if (file_exists($file_path)) {
                unlink($file_path); // Delete the file from the server
            }

            $sql_delete = "DELETE FROM pending_assignments WHERE id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id);

            if ($stmt_delete->execute()) {
                echo "<script>
                        Swal.fire({
                            icon: 'info',
                            title: 'Declined',
                            text: 'Assignment declined successfully and file deleted.',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'admin_review.php';
                        });
                      </script>";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        $stmt_select->close();
    }
}

$sql = "SELECT * FROM pending_assignments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Review</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pending Assignments</h1>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Assignment Name</th>
                        <th>File</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['student_id']) ?></td>
                            <td><?= htmlspecialchars($row['Email']) ?></td>
                            <td><?= htmlspecialchars($row['course']) ?></td>
                            <td><?= htmlspecialchars($row['assignment_name']) ?></td>
                            <td><a href="<?= htmlspecialchars($row['assignment_file']) ?>" target="_blank">View File</a></td>
                            <td><?= htmlspecialchars($row['upload_date']) ?></td>
                            <td>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                                    <button type="submit" name="action" value="decline" class="btn btn-danger btn-sm">Decline</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                No pending assignments for approval.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
