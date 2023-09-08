<?php
// edit_image.php
include 'includes/db_config.php';
include 'includes/auth.php';

requireLogin(); // Memastikan pengguna telah login

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $edit_by = $_POST['edit_by'];

    // Handle the uploaded image
    $newImagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageFile = $_FILES['image'];
        $newImagePath = 'uploads/' . time() . '_' . $imageFile['name'];
        move_uploaded_file($imageFile['tmp_name'], $newImagePath);
    }

    $sql = "UPDATE activities SET title = '$title', content = '$content', edit_by = '$edit_by', image_path = '$newImagePath' WHERE id = $id";
    if (!$conn->query($sql)) {
        echo $conn->error;
        die();
    }

    header("Location: view_artikel.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM activities WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Image</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="row mt-4">
        <div class="card col-lg-6 container">
            <h3 class="mb-4">Edit Artikel</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <label for="title">Title : </label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
                </div>
                <div class="form-group mt-1">
                    <label for="image">Image : </label><br>
                    <img src="<?php echo $row['image_path']; ?>" alt="Current Image" style="max-width: 300px;">
                </div>
                <div class="form-group mt-1">
                    <label>Edit Image :</label>
                    <input type="file" class="form-control" name="image" id="new_image">
                </div>
                <div class="form-group mt-1">
                    <label for="content">Content : </label>
                    <div class="form-floating">
                        <textarea id="content" name="content" class="form-control"><?php echo $row['content']; ?>"</textarea>
                        <!-- <input type="text" class="form-control" name="content" required> -->
                    </div>
                    <!-- <input type="text" class="form-control" id="content" name="content" value="<?php echo $row['content']; ?>" required> -->
                </div>
                <div class="form-group mt-1">
                    <label for="edit_by">Edit By : </label>
                    <input type="text" class="form-control" id="edit_by" name="edit_by" value="<?php echo $row['edit_by']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary mb-3 mt-3">Save Changes</button>
            </form>
        </div>
    </div>
</body>

</html>