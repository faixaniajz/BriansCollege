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

$alert_message = ""; // Variable to hold the alert message
$alert_type = ""; // Variable for alert type (success or error)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'approve') {
        // Fetch the assignment details
        $sql = "SELECT * FROM pending_assignments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $course = $row['course'];
            $student_id = $row['student_id'];
            $student_email = $row['Email'];
            $assignment_name = $row['assignment_name'];
            $assignment_file = $row['assignment_file'];

            // Insert into the course table
            $sql_insert = "INSERT INTO $course (student_id, Email, assignment_name, assignment_file) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("isss", $student_id, $student_email, $assignment_name, $assignment_file);

            if ($stmt_insert->execute()) {
                // Delete from pending_assignments
                $sql_delete = "DELETE FROM pending_assignments WHERE id = ?";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bind_param("i", $id);
                $stmt_delete->execute();

                $alert_message = "Assignment approved successfully.";
                $alert_type = "success";
            } else {
                $alert_message = "Error: " . $stmt_insert->error;
                $alert_type = "danger";
            }
        }
        $stmt->close();
    } elseif ($action == 'decline') {
        // Fetch the file path before deletion
        $sql_file = "SELECT assignment_file FROM pending_assignments WHERE id = ?";
        $stmt_file = $conn->prepare($sql_file);
        $stmt_file->bind_param("i", $id);
        $stmt_file->execute();
        $result_file = $stmt_file->get_result();

        if ($result_file->num_rows > 0) {
            $file_row = $result_file->fetch_assoc();
            $file_path = $file_row['assignment_file'];

            // Delete the physical file
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // Delete the record from pending_assignments
        $sql_delete = "DELETE FROM pending_assignments WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);

        if ($stmt_delete->execute()) {
            $alert_message = "Assignment declined and file deleted successfully.";
            $alert_type = "success";
        } else {
            $alert_message = "Error: " . $conn->error;
            $alert_type = "danger";
        }
        $stmt_file->close();
        $stmt_delete->close();  
    }
}

// Fetch all pending assignments
$sql = "SELECT * FROM pending_assignments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Assignments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <?php if ($alert_message): ?>
        <div class="alert alert-<?= $alert_type ?> alert-dismissible fade show" role="alert">
            <?= $alert_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h1 class="text-center">Pending Assignments</h1>
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
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
                            <form method="POST">
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
        <p class="text-center">No pending assignments for approval.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
