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
<body>

<h1>Faculty Management</h1>

<form method="post" action="dashboard.php">
    <input type="submit" name="submit" value="Go to Dashboard">
</form>

<form method="post" action="admin_login.php">
    <input type="submit" name="submit" value="Log Out">
</form>

<table>
    <tr>
        <th>Class ID</th>
        <th>Teacher ID</th>
        <th>Time & Date 1</th>
        <th>Time & Date 2</th>
        <th>Student 1</th>
        <th>Student 2</th>
        <th>Student 3</th>
        <th>Student 4</th>
        <th>Student 5</th>
        <th>Student 6</th>
        <th>Student 7</th>
        
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
    
    $sql = "SELECT CourseID , Course_Name,FacultyID , DateTime_1, DateTime_2, Student_1 , Student_2 , Student_3 , Student_4 , Student_5 , Student_6 , Student_7  FROM classtime";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["CourseID"]."</td><td>". $row["Course_Name"]."</td><td>". $row["FacultyID"]."</td><td>". $row["DateTime_1"]."</td><td>". $row["DateTime_2"]."</td><td>". $row["Student_1"]."</td><td>". $row["Student_2"]."</td><td>". $row["Student_3"]."</td><td>". $row["Student_4"]."</td><td>". $row["Student_5"]."</td><td>". $row["Student_6"]."</td><td>". $row["Student_7"]."</td></tr>";
            echo "<td><a href=\"updateClassSchedule.php?CourseID=$row[CourseID]\">Edit</a> | 
			<a href=\"delCourse.php?CourseID=$row[CourseID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        } 
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $CourseID = $Course_Name = $FacultyID = $DateTime_1 = $DateTime_2 = $Student_1 = $Student_2 = $Student_3 = $Student_4 = $Student_5 = $Student_6 = $Student_7 =  "";
    $CourseIDErr = $Course_NameErr = $FacultyIDErr = $DateTime_1Err = $DateTime_2Err = $Student_1Err = $Student_2Err = $Student_3Err = $Student_4Err = $Student_5Err = $Student_6Err = $Student_7Err =  "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

        
        // Validate the Course ID
        $CourseID  = test_input($_POST["CourseID "]);
        if (empty($CourseID )) {
            $CourseIDErr = "Course ID is required";
        }
    
        // Validate the Course Name
        $Course_Name = test_input($_POST["Course_Name"]);
        if (empty($Course_Name)) {
            $Course_NameErr = "Course Name is required";
        }
    
        // Validate the FacultyID
        $FacultyID = test_input($_POST["FacultyID"]);
        if (empty($FacultyID)) {
            $FacultyIDErr = "Faculty ID is required";
        }
    
        // Validate the Date Time_1
        $DateTime_1 = test_input($_POST["DateTime_1"]);
        if (empty($DateTime_1)) {
            $DateTime_1Err = "Date Time_1 is required";
        }
    
        // Validate the Date Time_2
        $DateTime_2 = test_input($_POST["DateTime_2"]);
        if (empty($DateTime_2)) {
            $DateTime_2Err = "Date Time_2 is required";
        }
    
        // Validate the Student_1
        $Student_1 = test_input($_POST["Student_1"]);
        if (empty($Student_1)) {
            $Student_1Err = "Student_1 is required";
        }
    
        // Validate the Student_2
        $Student_2 = test_input($_POST["Student_2"]);
        if (empty($Student_2)) {
            $Student_2Err = "Student_2 is required";
        }
    
        // Validate the Student_3
        $Student_3 = test_input($_POST["Student_3"]);
        if (empty($Student_3)) {
            $Student_3Err = "Student_3 is required";
        }
    
        // Validate the Student_4
        $mname = test_input($_POST["mname"]);
        if (empty($mname)) {
            $mnameErr = "Student_4 is required";
        }
    
        // Validate the Student_5
        $Student_5 = test_input($_POST["Student_5"]);
        if (empty($Student_5)) {
            $Student_5Err = "Student_5 is required";
        }
    
        // Validate the Student_6
        $Student_6 = test_input($_POST["Student_6"]);
        if (empty($Student_6)) {
            $Student_6Err = "Student_6 is required";
        }
    
        // Validate the Student_7
        $Student_7 = test_input($_POST["Student_7"]);
        if (empty($Student_7)) {
            $Student_7Err = "Student_7 is required";
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

<table>
    <fieldset>
        <legend>Insert Faculty Information</legend>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="CourseID ">Course ID:</label>
        <input type="text" name="CourseID " id="CourseID " value="<?php echo $CourseID ; ?>">
        <span class="error"><?php echo $CourseIDErr; ?></span>
        <br><br>

        <label for="Course_Name">Course Name:</label>
        <input type="text" name="Course_Name" id="Course_Name" value="<?php echo $Course_Name; ?>">
        <span class="error"><?php echo $Course_NameErr; ?></span>
        <br><br>

        <p><b>Faculty ID : </b></p>
        <input type="text" name="Faculty_ID" id="Faculty_ID" value="<?php echo $Faculty_ID; ?>">
        <span class="error"><?php echo $Faculty_IDErr; ?></span>
        <br><br>

        <label for="date">Date of birth:</label>
        <input type="date" name="DateTime_1" id="DateTime_1" value="<?php echo $DateTime_1; ?>">
        <span class="error"><?php echo $DateTime_1Err; ?></span>
        <br><br>

        <label for="DateTime_2">Date Time_2: </label>
            <select name="DateTime_2" id="DateTime_2" placeholder="Select..." required>
            <option value="Saturday">Saturday+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O-">O-</option>
            <option value="O+">0+</option>
            </select><br>
        
         <label for="DateTime_2">Date Time_2: </label>
            <select name="DateTime_2" id="DateTime_2" placeholder="Select..." required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O-">O-</option>
            <option value="O+">0+</option>
            </select><br>

        <label for="Student_1"><b>Student_1 :</b></label>
            <select id="Student_1" name="Student_1" placeholder="Select..." required>
            <option value="Muslim">Muslim</option>
            <option value="Hindu">Hindu</option>
            <option value="Christian">Christian</option>
            <option value="Buddha">Buddha</option>
            <option value="Others">Others</option>
            </select>


        <label for="Student_2">Student_2 :</label>
        <input type="number" name="Student_2" id="Student_2" value="<?php echo $Student_2; ?>">
        <span class="error"><?php echo $Student_2Err; ?></span>
        <br><br>

        <label for="Student_3">Student_3:</label>
        <input type="text" name="Student_3" id="Student_3" value="<?php echo $Student_3; ?>">
        <span class="error"><?php echo $Student_3Err; ?></span>
        <br><br>

        <label for="mname">Student_4:</label>
        <input type="text" name="mname" id="mname" value="<?php echo $mname; ?>">
        <span class="error"><?php echo $mnameErr; ?></span>
        <br><br>

        <label for="Student_5">SSC Result:</label>
        <input type="text" name="Student_5" id="Student_5" value="<?php echo $Student_5; ?>">
        <span class="error"><?php echo $Student_5Err; ?></span>
        <br><br>

        <label for="Student_6">HSC Result:</label>
        <input type="text" name="Student_6" id="Student_6" value="<?php echo $Student_6; ?>">
        <span class="error"><?php echo $Student_6Err; ?></span>
        <br><br>

        <label for="Student_7">BSc Result:</label>
        <input type="text" name="Student_7" id="Student_7" value="<?php echo $Student_7; ?>">
        <span class="error"><?php echo $Student_7Err; ?></span>
        <br><br>

       

                    <input type="submit" name="submit" value="Insert Faculty">
        </form>
    </fieldset>




    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $CourseID Err == "" && $Course_NameErr == "" && $FacultyIDErr == "" && $DateTime_1Err == "" && $DateTime_2Err == "" && $Student_1Err == "" && $Student_2Err == "" && $Student_3Err == "" && $mnameErr == "" && $Student_5Err == "" && $Student_6Err == "" && $Student_7Err == "" && $msc_cgpaErr == "" && $emailErr == "" && $pwdErr == "" && $facultyErr == "") {

        // Insert data into the database
        $sql = "INSERT INTO classtime ( First_Name,Last_Name, Faculty ID, DateOfBirth, Blood_Group, Student_1, Student_2, Father_Name, Mother_Name, SSC_gpa, HSC_gpa, BSc_cgpa, MSc_cgpa, Email, Password_, Faculty) VALUES ('$CourseID ', '$Course_Name', '$FacultyID', '$DateTime_1', '$DateTime_2', '$Student_1', '$Student_2', '$Student_3', '$mname', '$Student_5', '$Student_6', '$Student_7', '$msc_cgpa', '$email', '$pwd', '$faculty')";
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
