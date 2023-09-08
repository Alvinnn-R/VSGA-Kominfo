<?php
// view_images.php
include 'includes/auth.php';
include 'includes/db_config.php';

$sql = "SELECT * FROM activities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">
        <!-- <h1>Welcome to the Image CRUD App</h1>
        <p>This is a simple CRUD app for managing images.</p>
        <?php if (isUserLoggedIn()) : ?>
            <a href="add_artikel.php" class="btn btn-primary">Add Image</a>
            <a href="view_artikel.php" class="btn btn-secondary">View Images</a>
        <?php endif; ?> -->

        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="card mb-4 mt-4">
                <h5 class="card-title m-3"><?php echo $row['title']; ?></h5>
                <img height="300px" width="900px" class="mx-auto d-block m-3" src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?php echo $row['content']; ?></p>
                    <p class="card-text"><small class="text-muted">Edit By : <?php echo $row['edit_by']; ?></small></p>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</body>

</html>