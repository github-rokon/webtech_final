<?php
session_start();
$admin = 001;
$adminpass = 12345;

if (isset($_POST['login'])) {
    $id = $_POST['ID'];
    $pass = $_POST['pass'];

    if ($id == $admin && $pass == $adminpass) {
        // Store admin information in the session
        $_SESSION['admin_id'] = $id;
        header('Location: dashboard.php');
        exit(); // Always exit after a header redirect to prevent further script execution
    } else {
        $error_message = "Wrong info.";
    }
}
?>

<html>
<head>
    <title>Admin LOGIN</title>
</head>
<body>
    <center>
    <h1> Admin Login</h1>

    <form method="post">
        <input type="number" name="ID" placeholder="ID" required><br>
        <br>
        <input type="password" name="pass" placeholder="Password" required><br>
        <br>
        <input type="submit" name="login" value="Login"> <br>
    </form>
    </center>

    <?php
    if (isset($error_message)) {
        echo $error_message;
    }
    ?>

</body>
</html>
