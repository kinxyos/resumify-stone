<?php
$connection = mysqli_connect ('localhost','root') or die("CONNECTION ERROR");


function cryp($info){
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    return $info;
}

mysqli_select_db($connection, 'authentication');

$username = cryp($_POST['un']);
$password = cryp($_POST['pd']);

$data = "INSERT INTO credentials (username, password) values ('$username', '$password')";

mysqli_query ($connection, $data);
header('location:Login.html');
?>