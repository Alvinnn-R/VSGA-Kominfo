<?php
// delete_image.php
include 'includes/auth.php';
include 'includes/db_config.php';

$id = $_GET['id'];

$sql = "DELETE FROM activities WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: view_artikel.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Image</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">
        <h1>Delete Image</h1>
        <p>Are you sure you want to delete this image?</p>
        <form method="POST">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>
</html>
