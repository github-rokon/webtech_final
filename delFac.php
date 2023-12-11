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

// Get id parameter value from URL
$User_ID = $_GET['User_ID'];

// Delete row from the database table
$sql = "DELETE FROM faculty WHERE User_ID = $User_ID";
$result = $conn->query($sql);
//$result = mysqli_query($sql, "DELETE * FROM faculty WHERE User_ID = $User_ID");

// Redirect to the main display page 
header("Location:FacultyManagement.php");