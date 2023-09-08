<?php
// login.php
include 'includes/db_config.php';
include 'includes/auth.php';

requireGuest(); // Memastikan pengguna belum login

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        header("Location: index.php");
        exit();
    } else {
        $loginError = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card col-md-6">
                <h2>Login</h2>
                <?php if (isset($loginError) && $loginError) : ?>
                    <div class="alert alert-danger">Invalid username or password.</div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Login</button>
                    <button class="btn btn-success mb-3 ml-2"><a class="text-white" href="register.php">Register</a></button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>