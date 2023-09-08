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
    <title>View Artikel</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">
        <h1>View Artikel</h1>
        <a href="add_artikel.php" class="btn btn-primary mb-3 mt-3">Add Artikel</a>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <!-- <p class="card-text"><?php echo $row['content']; ?></p> -->
                            <a href="edit_artikel.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_artikel.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            <p class="card-text mt-3 mb-0"><small class="text-muted">Edit By : <?php echo $row['edit_by']; ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>