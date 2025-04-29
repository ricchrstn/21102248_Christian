<?php
session_start();
$valid_username = "Christian";
$valid_password = "123";

if ($_POST['username'] == $valid_username && $_POST['password'] == $valid_password) {
    $_SESSION['username'] = $valid_username;
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
?>