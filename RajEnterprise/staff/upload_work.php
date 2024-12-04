<?php
include '../db/db_connection.php';
session_start();
if ($_SESSION['role'] != 'staff') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_description = $_POST['task_description'];
    $images = $_FILES['images']['name'];
    $upload_dir = '../uploads/';
    move_uploaded_file($_FILES['images']['tmp_name'], $upload_dir . $images);

    $sql = "INSERT INTO tasks (staff_id, task_description, status, images) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $_SESSION['user_id'], $task_description, $status, $images);
    $stmt->execute();
    header('Location: tasks.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/header.php'; ?>
    <title>Upload Work</title>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container mt-5">
        <h2>Upload Work</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="task_description" class="form-label">Task Description</label>
                <textarea name="task_description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Upload Images</label>
                <input type="file" name="images" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
