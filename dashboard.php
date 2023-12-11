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
    <h1>Welcome to the Dashboard</h1>
    
    <a href="FacultyManagement.php">Faculty Management</a><br>
    <a href="StudentManagement.php">Student Management</a><br>
    <a href="StuffManagement.php">Stuff Management</a><br>

    <form method="post" action="admin_login.php">
        <input type="submit" name="submit" value="Log Out">
    </form>
</body>
</html>
