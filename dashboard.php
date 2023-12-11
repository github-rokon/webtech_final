<?php
session_start();

// Check if the admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <center>
    <h1>Welcome to the Dashboard</h1>
    <form method="post" action="admin_login.php">
    <a href="FacultyManagement.php">Faculty Management</a><br><br>
    <a href="StudentManagement.php">Student Management</a><br><br>
    <a href="StuffManagement.php">Stuff Management</a><br><br>

        <input type="submit" name="submit" value="Log Out">
    </form>
    </center>
</body>
</html>
