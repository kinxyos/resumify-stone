<?php
    $connection = mysqli_connect('localhost','root');
    mysqli_select_db($connection, 'authentication');
    
    function cryp($info){
        $info = trim($info);
        $info = stripslashes($info);
        $info = htmlspecialchars($info);
        return $info;
    }
    
    $user = cryp($_POST['username']);
    $pass = cryp($_POST['password']);

    $data = "SELECT username FROM credentials where username='$user' and password='$pass'";

    $result = mysqli_query($connection, $data);
    $count = mysqli_num_rows($result);
    
    mysqli_query ($connection, $data);
    header('location:adminview.html');
    ?>