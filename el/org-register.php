<?php

include 'create-link.php';

$user = mysqli_real_escape_string($link,$_POST['username']);
$user = htmlspecialchars($user, ENT_QUOTES);

$email = mysqli_real_escape_string($link,$_POST['email']);
$email = htmlspecialchars($email, ENT_QUOTES);

$pass = mysqli_real_escape_string($link,$_POST['password']);
$pass = htmlspecialchars($pass, ENT_QUOTES);

$name = mysqli_real_escape_string($link,$_POST['name']);
$name = htmlspecialchars($name, ENT_QUOTES);

$website = mysqli_real_escape_string($link,$_POST['website']);
$website = htmlspecialchars($website, ENT_QUOTES);

$facebook = mysqli_real_escape_string($link,$_POST['facebook']);
$facebook = htmlspecialchars($facebook, ENT_QUOTES);

$twitter = mysqli_real_escape_string($link,$_POST['twitter']);
$twitter = htmlspecialchars($twitter, ENT_QUOTES);

$other = mysqli_real_escape_string($link,$_POST['other']);
$other = htmlspecialchars($other, ENT_QUOTES);

$description = mysqli_real_escape_string($link,$_POST['description']);
$description = htmlspecialchars($description, ENT_QUOTES);

mysqli_set_charset($link, "utf8");

$query = "INSERT INTO organisations (username,email,password,name,website,facebook,twitter,other,description,picture) VALUES ('$user', '$email','$pass','$name','$website','$facebook','$twitter', '$other','$description', 'images/profile.png')";
mysqli_query($link,$query);

$query = "SELECT org_id FROM organisations WHERE username = '$user'";
$results = mysqli_query($link,$query);
$row = mysqli_fetch_row($results);
$user_id = $row[0];
$not_id = '1';

$query = "INSERT INTO notifications (user_id,not_id,role) VALUES ('$user_id','$not_id','1')";
mysqli_query($link,$query);

@mysqli_close($link);

echo "OK";

?>