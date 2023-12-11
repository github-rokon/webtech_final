<?php
session_start();

// Check if the admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admincontrol";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }