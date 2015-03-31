<?php

    include 'create-link.php';

    $first = mysqli_real_escape_string($link,$_POST['first']);
    $first = htmlspecialchars($first, ENT_QUOTES);

    $last = mysqli_real_escape_string($link,$_POST['last']);
    $last = htmlspecialchars($last, ENT_QUOTES);

    $user = mysqli_real_escape_string($link,$_POST['user']);
    $user = htmlspecialchars($user, ENT_QUOTES);

    $email = mysqli_real_escape_string($link,$_POST['email']);
    $email = htmlspecialchars($email, ENT_QUOTES);

    $pass = mysqli_real_escape_string($link,$_POST['pass']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);

    $con_pass = mysqli_real_escape_string($link,$_POST['con-pass']);
    $con_pass = htmlspecialchars($con_pass, ENT_QUOTES);

    $phone = mysqli_real_escape_string($link,$_POST['phone']);
    $phone = htmlspecialchars($phone, ENT_QUOTES);

    $address = mysqli_real_escape_string($link,$_POST['address']);
    $address = htmlspecialchars($address, ENT_QUOTES);

    $date = mysqli_real_escape_string($link,$_POST['date']);
    $date = htmlspecialchars($date, ENT_QUOTES);

    $query = "INSERT INTO user (firstname,lastname,username,email,pasword,phone,address,str_number,zip,city,date) VALUES ('$first', '$last','$user','$email','$pass','$phone','$address',21,54621,'Thessalonki', '$date')";
    mysqli_query($link,$query);
    @mysqli_close($link); 
    echo "<script> window.open('confirm.html','_self')</script>";

?>