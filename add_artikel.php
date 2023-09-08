<?php
// add_image.php
include 'includes/auth.php';
include 'includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $edit_by = $_POST['edit_by'];
    $image_path = 'uploads/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

    $sql = "INSERT INTO activities (title, image_path, content, edit_by) VALUES ('$title', '$image_path','$content','$edit_by')";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_artikel.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Artikel</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="row mt-4">
        <div class="card col-lg-6 container">
            <h3 class="mb-4">Form Tambah Artikel</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Gambar :</label>
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Judul :</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label>Content Artikel :</label>
                    <div class="form-floating">
                        <textarea name="content" id="content" class="form-control"></textarea>
                        <!-- <input type="text" class="form-control" name="content" required> -->
                    </div>
                </div>
                <div class="form-group">
                    <label>Edit By:</label>
                    <input type="text" class="form-control" name="edit_by" required>
                </div>


                <button type="submit" class="btn btn-primary mt-3 mb-3">Add</button>
            </form>
        </div>
    </div>
</body>

</html>