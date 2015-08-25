<?php

include 'create-link.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
$birthday = $_POST["birthday"];

$jsonData = '0';

$query = "INSERT INTO user (firstname,lastname,username,email,password,date,picture) VALUES ('$firstname', '$lastname','$username','$email','$password','$birthday','images/profile.png')";

if ($results = mysqli_query($link,$query))
    $jsonData = '1';

//if (mysqli_num_rows($results) > 0) {
//    $row = mysqli_fetch_row($results);
//    $jsonData = $row[0];
//}
//
//if ($jsonData == '0') {
//    
//    $query = "SELECT org_id FROM organisations WHERE username = '$username' AND password = '$password'";
//    $results = mysqli_query($link,$query);
//
//    if (mysqli_num_rows($results) > 0) {
//        $row = mysqli_fetch_row($results);
//        $jsonData = $row[0];
//    }
//    
//}

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($firstname . ' ' . $username . ' ' . $email . ' ' . $birthday));
fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>