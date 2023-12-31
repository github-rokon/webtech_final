<?php
session_start();
// Check if the admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="js/regFac.js"></script> 
</head>
<body>

<h1>Faculty Management</h1>

<form method="post" action="dashboard.php">
    <input type="submit" name="submit" value="Go to Dashboard">
</form>

<form method="post" action="admin_login.php">
    <input type="submit" name="submit" value="Log Out">
</form>

<table align="center" cellpadding="25" cellspacing="0" width="auto" border="1" >

<tr>
    <th>User ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Date of Birth</th>
    <th>Blood Group</th>
    <th>Religion</th>
    <th>NID</th>
    <th>Father's Name</th>
    <th>Mother's Name</th>
    <th>SSC gpa</th>
    <th>HSC gpa</th>
    <th>BSc cgpa</th>
    <th>MSc cgpa</th>
    <th>Email</th>
    <th>Password</th>
    <th>Faculty</th>
    <th>Action</th>
</tr>
    
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

$sql = "SELECT User_ID, First_Name,Last_Name, Gender, DateOfBirth, Blood_Group, Religion, NID, Father_Name, Mother_Name, SSC_gpa, HSC_gpa, BSc_cgpa, MSc_cgpa, Email, Password_, Faculty FROM faculty";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["User_ID"]."</td><td>". $row["First_Name"]."</td><td>". $row["Last_Name"]."</td><td>". $row["Gender"]."</td><td>". $row["DateOfBirth"]."</td><td>". $row["Blood_Group"]."</td><td>". $row["Religion"]."</td><td>". $row["NID"]."</td><td>". $row["Father_Name"]."</td><td>". $row["Mother_Name"]."</td><td>". $row["SSC_gpa"]."</td><td>". $row["HSC_gpa"]."</td><td>". $row["BSc_cgpa"]."</td><td>". $row["MSc_cgpa"]."</td><td>". $row["Email"]."</td><td>". $row["Password_"]."</td><td>". $row["Faculty"]."</td>";
        echo "<td><a href=\"updateFac.php?User_ID=$row[User_ID]\">Edit</a> | 
        <a href=\"delFac.php?User_ID=$row[User_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
} 
echo"</table>";
}
else {
    echo "0 results";
}



$fstname = $lstname = $gender = $DoB = $bg = $religion = $nid = $fname = $mname = $ssc_gpa = $hsc_gpa = $bsc_cgpa = $msc_cgpa = $email = $pwd = $faculty =  "";
$fstnameErr = $lstnameErr = $genderErr = $DoBErr = $bgErr = $religionErr = $nidErr = $fnameErr = $mnameErr = $ssc_gpaErr = $hsc_gpaErr = $bsc_cgpaErr = $msc_cgpaErr = $emailErr = $pwdErr = $facultyErr =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate the first name
        $fstname = test_input($_POST["fstname"]);
        if (empty($fstname)) {
            $fstnameErr = "First name is required";
        }
    
        // Validate the last name
        $lstname = test_input($_POST["lstname"]);
        if (empty($lstname)) {
            $lstnameErr = "Last name is required";
        }
    
        // Validate the gender
        $gender = test_input($_POST["gender"]);
        if (empty($gender)) {
            $genderErr = "Gender is required";
        }
    
        // Validate the Date of Birth
        $DoB = test_input($_POST["DoB"]);
        if (empty($DoB)) {
            $DoBErr = "Date of Birth is required";
        }
    
        // Validate the Blood Group
        $bg = test_input($_POST["bg"]);
        if (empty($bg)) {
            $bgErr = "Blood Group is required";
        }
    
        // Validate the Religion
        $religion = test_input($_POST["religion"]);
        if (empty($religion)) {
            $religionErr = "Religion is required";
        }
    
        // Validate the NID
        $nid = test_input($_POST["nid"]);
        if (empty($nid)) {
            $nidErr = "NID no is required";
        }
    
        // Validate the Father's name
        $fname = test_input($_POST["fname"]);
        if (empty($fname)) {
            $fnameErr = "Father's name is required";
        }
    
        // Validate the Mother's name
        $mname = test_input($_POST["mname"]);
        if (empty($mname)) {
            $mnameErr = "Mother's name is required";
        }
    
        // Validate the SSC result
        $ssc_gpa = test_input($_POST["ssc_gpa"]);
        if (empty($ssc_gpa)) {
            $ssc_gpaErr = "SSC result is required";
        }
    
        // Validate the HSC result
        $hsc_gpa = test_input($_POST["hsc_gpa"]);
        if (empty($hsc_gpa)) {
            $hsc_gpaErr = "HSC result is required";
        }
    
        // Validate the BSc result
        $bsc_cgpa = test_input($_POST["bsc_cgpa"]);
        if (empty($bsc_cgpa)) {
            $bsc_cgpaErr = "BSc result is required";
        }
    
        // Validate the MSc result
        $msc_cgpa = test_input($_POST["msc_cgpa"]);
        if (empty($msc_cgpa)) {
            $msc_cgpaErr = "MSc result is required";
        }
    
        // Validate the email
        $email = test_input($_POST["email"]);
        if (empty($email)) {
            $emailErr = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    
        // Validate the password 
        $pwd = test_input($_POST["pwd"]);
        if (empty($pwd)) {
            $pwdErr = "Password is required";
        }
    
        // Validate the Faculty
        $faculty = test_input($_POST["faculty"]);
        if (empty($faculty)) {
            $facultyErr = "Faculty is required";
        }
    
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>

</table>
<br><br>
<table>
    <fieldset>
<legend>Insert Faculty Information</legend>
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return registration()">

  <label for="fstname">First name:</label>
  <input type="text" name="fstname" id="fstname" value="<?php echo $fstname; ?>">
  <span class="error"><?php echo $fstnameErr; ?></span>
  <br><br>

  <label for="lstname">Last name:</label>
  <input type="text" name="lstname" id="lstname" value="<?php echo $lstname; ?>">
  <span class="error"><?php echo $lstnameErr; ?></span>
  <br><br>
  <p><b>Gender : </b></p>
  <input type="radio" id="Male" name="gender" value="Male" <?php if ($gender === "Male") echo "checked"; ?>>
  <label for="Male">Male</label><br>
  <input type="radio" id="Female" name="gender" value="Female" <?php if ($gender === "Female") echo "checked"; ?>>
  <label for="Female">Female</label><br>
  <input type="radio" id="Others" name="gender" value="Others" <?php if ($gender === "Others") echo "checked"; ?>>
  <label for="Others">Others</label><br>
  <span class="error"><?php echo $genderErr; ?></span>
  <br><br>

  <label for="date">Date of birth:</label>
  <input type="date" name="DoB" id="DoB" value="<?php echo $DoB; ?>">
  <span class="error"><?php echo $DoBErr; ?></span>
  <br><br>

  <label for="bg">Blood Group: </label>
    <select name="bg" id="bg" placeholder="Select..." required>
    <option value="" selected>Select Blood Group</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O-">O-</option>
    <option value="O+">0+</option>
    </select><br>
    <br>
  <label for="Religion">Religion :</label>
    <select id="religion" name="religion" placeholder="Select..." required>
    <option value="" selected>Select Religion</option>
    <option value="Muslim">Muslim</option>
    <option value="Hindu">Hindu</option>
    <option value="Christian">Christian</option>
    <option value="Buddha">Buddha</option>
    <option value="Others">Others</option>
    </select>
    <br><br>

  <label for="nid">NID :</label>&nbsp;<input type="number" name="nid" id="nid" value="<?php echo $nid; ?>">
  <span class="error"><?php echo $nidErr; ?></span>
  <br><br>

  <label for="fname">Father's name:</label>
  <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">
  <span class="error"><?php echo $fnameErr; ?></span>
  <br><br>

  <label for="mname">Mother's name:</label>
  <input type="text" name="mname" id="mname" value="<?php echo $mname; ?>">
  <span class="error"><?php echo $mnameErr; ?></span>
  <br><br>

  <label for="ssc_gpa">SSC Result:</label>
  <input type="text" name="ssc_gpa" id="ssc_gpa" value="<?php echo $ssc_gpa; ?>">
  <span class="error"><?php echo $ssc_gpaErr; ?></span>
  <br><br>

  <label for="hsc_gpa">HSC Result:</label>
  <input type="text" name="hsc_gpa" id="hsc_gpa" value="<?php echo $hsc_gpa; ?>">
  <span class="error"><?php echo $hsc_gpaErr; ?></span>
  <br><br>

  <label for="bsc_cgpa">BSc Result:</label>
  <input type="text" name="bsc_cgpa" id="bsc_cgpa" value="<?php echo $bsc_cgpa; ?>">
  <span class="error"><?php echo $bsc_cgpaErr; ?></span>
  <br><br>

  <label for="msc_cgpa">MSc Result:</label>
  <input type="text" name="msc_cgpa" id="msc_cgpa" value="<?php echo $msc_cgpa; ?>">
  <span class="error"><?php echo $msc_cgpaErr; ?></span>
  <br><br>

  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo $email; ?>">
  <span class="error"><?php echo $emailErr; ?></span>
  <br><br>

  <label for="pwd">Password:</label>
  <input type="password" name="pwd" id="pwd" value="<?php echo $pwd; ?>">
  <span class="error"><?php echo $pwdErr; ?></span>
  <br><br>

  <label for="Faculty">Faculty :</label>
    <select id="faculty" name="Faculty" placeholder="Select..." required>
    <option value="" selected>Select Faculty</option>
    <option value="FACULTY OF SCIENCE & TECHNOLOGY">FACULTY OF SCIENCE & TECHNOLOGY</option>
    <option value="FACULTY OF BUSINESS ADMINISTRATION">FACULTY OF BUSINESS ADMINISTRATION</option>
    <option value="FACULTY OF ENGINEERING">FACULTY OF ENGINEERING</option>
    <option value="FACULTY OF ARTS & SOCIAL SCIENCES">FACULTY OF ARTS & SOCIAL SCIENCES</option>
    </select><br><br>


    <input type="submit" name="submit" value="Insert Faculty">
    </form>
    </table>
    </fieldset>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $fstnameErr == "" && $lstnameErr == "" && $genderErr == "" && $DoBErr == "" && $bgErr == "" && $religionErr == "" && $nidErr == "" && $fnameErr == "" && $mnameErr == "" && $ssc_gpaErr == "" && $hsc_gpaErr == "" && $bsc_cgpaErr == "" && $msc_cgpaErr == "" && $emailErr == "" && $pwdErr == "" && $facultyErr == "") {

        // Insert data into the database
        $sql = "INSERT INTO faculty ( First_Name,Last_Name, Gender, DateOfBirth, Blood_Group, Religion, NID, Father_Name, Mother_Name, SSC_gpa, HSC_gpa, BSc_cgpa, MSc_cgpa, Email, Password_, Faculty) VALUES ('$fstname', '$lstname', '$gender', '$DoB', '$bg', '$religion', '$nid', '$fname', '$mname', '$ssc_gpa', '$hsc_gpa', '$bsc_cgpa', '$msc_cgpa', '$email', '$pwd', '$faculty')";
        if ($conn->query($sql) === true) {
            echo "Data inserted successfully";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</table>
</body>
</html>
