<?php
// includes/db_config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "16_alvin-rama-saputra";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
