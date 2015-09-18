<?php

    include 'create-link.php';

    $first = mysqli_real_escape_string($link,$_POST['first']);
    $first = htmlspecialchars($first, ENT_QUOTES);

    $last = mysqli_real_escape_string($link,$_POST['last']);
    $last = htmlspecialchars($last, ENT_QUOTES);

    $user = mysqli_real_escape_string($link,$_POST['username']);
    $user = htmlspecialchars($user, ENT_QUOTES);
    $user = trim($user);

    $email = mysqli_real_escape_string($link,$_POST['email']);
    $email = htmlspecialchars($email, ENT_QUOTES);

    $pass = mysqli_real_escape_string($link,$_POST['password']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);

    $phone = mysqli_real_escape_string($link,$_POST['phone']);
    $phone = htmlspecialchars($phone, ENT_QUOTES);

    $address = mysqli_real_escape_string($link,$_POST['address']);
    $address = htmlspecialchars($address, ENT_QUOTES);

    $str = mysqli_real_escape_string($link,$_POST['str']);
    $str = htmlspecialchars($str, ENT_QUOTES);

    $zip = mysqli_real_escape_string($link,$_POST['zip']);
    $zip = htmlspecialchars($zip, ENT_QUOTES);

    $date = mysqli_real_escape_string($link,$_POST['birth']);
    $date = htmlspecialchars($date, ENT_QUOTES);

    $query = "INSERT INTO user (firstname,lastname,username,email,password,phone,address,str_number,zip,city,date,picture) VALUES ('$first', '$last','$user','$email','$pass','$phone','$address','$str','$zip','Thessaloniki', '$date', 'images/profile.png')";
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