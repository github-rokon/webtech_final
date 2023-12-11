<?php
session_start();

// Check if the admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admincontrol";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$faculty_id = null;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['User_ID'])) {
    $faculty_id = $_GET['User_ID'];

    $result = $conn->query("SELECT * FROM faculty WHERE `User_ID` = $faculty_id");


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Faculty not found";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Update data in the database
    $fstname = $_POST["fstname"];
    $lstname = $_POST["lstname"];
    $gender = $_POST["gender"];
    $DoB = $_POST["DoB"];
    $bg = $_POST["bg"];
    $religion = $_POST["religion"];
    $nid = $_POST["nid"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $ssc_gpa = $_POST["ssc_gpa"];
    $hsc_gpa = $_POST["hsc_gpa"];
    $bsc_cgpa = $_POST["bsc_cgpa"];
    $msc_cgpa = $_POST["msc_cgpa"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $faculty = $_POST["faculty"];

    $update_query = "UPDATE faculty SET 
    First_Name='$fstname',
    Last_Name='$lstname',
    Gender='$gender',
    DateOfBirth='$DoB',
    Blood_Group='$bg',
    Religion='$religion',
    NID='$nid',
    Father_Name='$fname',
    Mother_Name='$mname',
    SSC_gpa='$ssc_gpa',
    HSC_gpa='$hsc_gpa',
    BSc_cgpa='$bsc_cgpa',
    MSc_cgpa='$msc_cgpa',
    Email='$email',
    Password_='$pwd',
    Faculty='$faculty'
    WHERE User_ID = $faculty_id";

if ($conn->query($update_query) === true) {
    echo "Data updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Update Faculty Information</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="faculty_id" value="<?php echo $row['User_ID']; ?>">
    
    <!-- Add other input fields for the update form -->
    <!-- Ensure each input field is pre-filled with the existing data -->
    <input type="hidden" name="User_ID" value="<?php echo $row['User_ID']; ?>">


    <label for="fstname">First name:</label>
    <input type="text" name="fstname" id="fstname" value="<?php echo $row['First_Name']; ?>">
    <br><br>

    <label for="lstname">Last name:</label>
    <input type="text" name="lstname" id="lstname" value="<?php echo $row['Last_Name']; ?>">
    <br><br>

    <label>Gender:</label>
    <input type="radio" name="gender" value="Male" <?php echo ($row['Gender'] === 'Male') ? 'checked' : ''; ?>> Male
    <input type="radio" name="gender" value="Female" <?php echo ($row['Gender'] === 'Female') ? 'checked' : ''; ?>> Female
    <input type="radio" name="gender" value="Others" <?php echo ($row['Gender'] === 'Others') ? 'checked' : ''; ?>> Others
    <br><br>

    <label for="DoB">Date of birth:</label>
    <input type="date" name="DoB" id="DoB" value="<?php echo $row['DateOfBirth']; ?>">
    <br><br>

    <label for="bg">Blood Group:</label>
    <select name="bg" id="bg">
        <option value="A+" <?php echo ($row['Blood_Group'] === 'A+') ? 'selected' : ''; ?>>A+</option>
        <option value="A-" <?php echo ($row['Blood_Group'] === 'A-') ? 'selected' : ''; ?>>A-</option>
        <option value="B+" <?php echo ($row['Blood_Group'] === 'B+') ? 'selected' : ''; ?>>B+</option>
        <option value="B-" <?php echo ($row['Blood_Group'] === 'B-') ? 'selected' : ''; ?>>B-</option>
        <option value="AB+" <?php echo ($row['Blood_Group'] === 'AB+') ? 'selected' : ''; ?>>AB+</option>
        <option value="AB-" <?php echo ($row['Blood_Group'] === 'AB-') ? 'selected' : ''; ?>>AB-</option>
        <option value="O-" <?php echo ($row['Blood_Group'] === 'O-') ? 'selected' : ''; ?>>O-</option>
        <option value="O+" <?php echo ($row['Blood_Group'] === 'O+') ? 'selected' : ''; ?>>O+</option>
    </select>

    <label for="religion"><b>Religion :</b></label>
    <select id="religion" name="religion" required>
        <option value="Muslim" <?php echo ($row['Religion'] === 'Muslim') ? 'selected' : ''; ?>>Muslim</option>
        <option value="Hindu" <?php echo ($row['Religion'] === 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
        <option value="Christian" <?php echo ($row['Religion'] === 'Christian') ? 'selected' : ''; ?>>Christian</option>
        <option value="Buddha" <?php echo ($row['Religion'] === 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
        <option value="Others" <?php echo ($row['Religion'] === 'Others') ? 'selected' : ''; ?>>Others</option>
    </select><br><br>

    <label for="nid">NID :</label>
    <input type="number" name="nid" id="nid" value="<?php echo $row['NID']; ?>">
    <br><br>

    <label for="fname">Father's name:</label>
    <input type="text" name="fname" id="fname" value="<?php echo $row['Father_Name']; ?>">
    <br><br>

    <label for="mname">Mother's name:</label>
    <input type="text" name="mname" id="mname" value="<?php echo $row['Mother_Name']; ?>">
    <br><br>

    <label for="ssc_gpa">SSC Result:</label>
    <input type="text" name="ssc_gpa" id="ssc_gpa" value="<?php echo $row['SSC_gpa']; ?>">
    <br><br>

    <label for="hsc_gpa">HSC Result:</label>
    <input type="text" name="hsc_gpa" id="hsc_gpa" value="<?php echo $row['HSC_gpa']; ?>">
    <br><br>

    <label for="bsc_cgpa">BSc Result:</label>
    <input type="text" name="bsc_cgpa" id="bsc_cgpa" value="<?php echo $row['BSc_cgpa']; ?>">
    <br><br>

    <label for="msc_cgpa">MSc Result:</label>
    <input type="text" name="msc_cgpa" id="msc_cgpa" value="<?php echo $row['MSc_cgpa']; ?>">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $row['Email']; ?>">
    <br><br>

    <label for="pwd">Password:</label>
    <input type="text" name="pwd" id="pwd" value="<?php echo $row['Password_']; ?>">
    <br><br>

    <label for="faculty"><b>Faculty :</b></label>
    <select id="faculty" name="faculty" required>
        <option value="FACULTY OF SCIENCE & TECHNOLOGY" <?php echo ($row['Faculty'] === 'FACULTY OF SCIENCE & TECHNOLOGY') ? 'selected' : ''; ?>>FACULTY OF SCIENCE & TECHNOLOGY</option>
        <option value="FACULTY OF BUSINESS ADMINISTRATION" <?php echo ($row['Faculty'] === 'FACULTY OF BUSINESS ADMINISTRATION') ? 'selected' : ''; ?>>FACULTY OF BUSINESS ADMINISTRATION</option>
        <option value="FACULTY OF ENGINEERING" <?php echo ($row['Faculty'] === 'FACULTY OF ENGINEERING') ? 'selected' : ''; ?>>FACULTY OF ENGINEERING</option>
        <option value="FACULTY OF ARTS & SOCIAL SCIENCES" <?php echo ($row['Faculty'] === 'FACULTY OF ARTS & SOCIAL SCIENCES') ? 'selected' : ''; ?>>FACULTY OF ARTS & SOCIAL SCIENCES</option>
    </select><br><br>


    <input type="submit" name="update" value="Update Faculty">
</form>
</fieldset>




    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $fstnameErr == "" && $lstnameErr == "" && $genderErr == "" && $DoBErr == "" && $bgErr == "" && $religionErr == "" && $nidErr == "" && $fnameErr == "" && $mnameErr == "" && $ssc_gpaErr == "" && $hsc_gpaErr == "" && $bsc_cgpaErr == "" && $msc_cgpaErr == "" && $emailErr == "" && $pwdErr == "" && $facultyErr == "") {

        // Insert data into the database
        $sql = "INSERT INTO faculty ( First_Name,Last_Name, Gender, DateOfBirth, Blood_Group, Religion, NID, Father_Name, Mother_Name, SSC_gpa, HSC_gpa, BSc_cgpa, MSc_cgpa, Email, Password_, Faculty) VALUES ('$fstname', '$lstname', '$gender', '$DoB', '$bg', '$religion', '$nid', '$fname', '$mname', '$ssc_gpa', '$hsc_gpa', '$bsc_cgpa', '$msc_cgpa', '$email', '$pwd', '$faculty')";
        if ($conn->query($sql) === true) {
            echo "Data inserted sucessfully";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
          

    }

    ?>
</table>

</body>
</html>
