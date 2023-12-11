<?php
if (isset($_POST['update'])) {
    $facultyid = $_POST['user'];
    $firstname = $_POST['fstname'];
    $lastname = $_POST['lstname'];
    $gender = $_POST['gender'];
    $dob = $_POST['DoB'];
    $bloodgrp = $_POST['bg'];
    $fathername=$_POST['fname'];
    $mothername=$_POST['mname'];
    $nid = $_POST['nid'];
    $ssc = $_POST['ssc_gpa'];
    $hsc = $_POST['hsc_gpa'];
    $bsc = $_POST['bsc_cgpa'];
    $msc = $_POST['msc_cgpa'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];
    $faculty = $_POST['faculty'];
    $religion=$_POST['religion'];
    echo $religion;
    echo $nid;

    $conn = mysqli_connect('localhost', 'root', '', 'admincontrol');
    $sql = "update faculty set First_Name = '$firstname', Last_Name = '$lastname', Gender = '$gender',DateOfBirth='$dob',Blood_Group='$bloodgrp',Religion='$religion',NID='$nid',Father_name='$fathername',Mother_name='$mothername',SSC_gpa='$ssc',HSC_gpa='$hsc',BSc_cgpa='$bsc',Msc_cgpa='$msc',Email='$email',Password_='$pass',Faculty='$faculty' where User_ID = '$facultyid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Update Successful";
    }else{
        echo "Failed";
    }
}
