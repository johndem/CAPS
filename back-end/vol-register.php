<?php

include 'create-link.php';

mysqli_set_charset($link, "utf8");

$query = "INSERT INTO user (firstname,lastname,username,email,password,phone,address,str_number,zip,city,date,picture) VALUES ('$first', '$last','$username','$email','$pass','$phone','$address','$str','$zip','Thessaloniki', '$date', '../images/profile-pics/profile.png')";
mysqli_query($link,$query);

$query = "SELECT id FROM user WHERE username = '$user'";
$results = mysqli_query($link,$query);
$row = mysqli_fetch_row($results);
$user_id = $row[0];
$not_id = '1';

$query = "INSERT INTO notifications (user_id,not_id,role) VALUES ('$user_id','$not_id','0')";
mysqli_query($link,$query);

@mysqli_close($link); 

echo "OK";

?>