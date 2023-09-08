<?php
// register.php
include 'includes/db_config.php';
include 'includes/auth.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $conn->query($sql);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <h2>Register</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 mt-3">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>