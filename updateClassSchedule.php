<?php
session_start();

// Check if the admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<?php


echo"<h1>This page is under construction</h1>";
echo"<a href=ClassSchedule.php>Class Schedule</a>";


?>