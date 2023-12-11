<?php
session_start();

// Check if the admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}
?>