<?php

$fnameErr = $lnameErr = $addrErr = $emailErr = $phoneErr = $dobErr = $pstateErr = $companyErr = $highschoolErr = $undergradErr = $postgradErr = $keyskillsErr = $projectsErr = $refersErr = " ";

$fname = $lname = $addr = $email = $phone = $dob = $pstate = $company = $highschool = $undergrad = $postgrad = $keyskills = $projects = $refers = " ";

function cryp($info){
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    return $info;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
    } else {
        $fname = cryp($_POST["fname"]);
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
    } else {
        $lname = cryp($_POST["lname"]);
    }
    if (empty($_POST["addr"])) {
        $addrErr = "Address is required";
    } else {
        $addr = cryp($_POST["addr"]);
    }
    if (empty($_POST["email"])) {
        $emailErr = "E-mail is required";
    } else {
        $email = cryp($_POST["email"]);
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = cryp($_POST["phone"]);
    }
    if (empty($_POST["skills"])) {
        $skillsErr = "This field is required";
    } else {
        $skills = cryp($_POST["skills"]);
    }
    if (empty($_POST["projects"])) {
        $projectsErr = "This field is required";
    } else {
        $projects = cryp($_POST["projects"]);
    }
}

$connection = mysqli_connect ('localhost','root') or die("CONNECTION ERROR");

mysqli_select_db($connection, 'hackstone');

$data = "INSERT INTO datastore (fname, lname, addr, email, phone, skills, projects) values ('$fname', '$lname','$addr','$email','$phone','$skills','$projects');";

mysqli_query($connection, $data);
header('location:faq.html'); //needs to be changed to adminview
?>