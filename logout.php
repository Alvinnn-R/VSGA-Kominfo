<?php
// logout.php
include 'includes/auth.php';

session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit();
