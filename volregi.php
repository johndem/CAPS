<?php

include 'create-link.php';

$username = $_POST['username'];
$email = $_POST['email'];

$results = "<ul>";
$results2 = "";

$query = "SELECT username FROM user WHERE username = '$username'";
   
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "<li> Username not available </li>";
        $results2 =  $results2 . "<script> document.getElementById('username').style.border = 'solid 1px red'; </script>";
}

$query = "SELECT email FROM user WHERE email = '$email'";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "<li> Email already in use </li>";
        $results2 =  $results2 . "<script> document.getElementById('email').style.border = 'solid 1px red'; </script>";
}

mysqli_close($link);

$results = $results . "</ul>" . $results2;

echo $results;
 

?>