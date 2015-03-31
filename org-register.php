<?php

    include 'create-link.php';
    
    $user = mysqli_real_escape_string($link,$_POST['user']);
    $user = htmlspecialchars($user, ENT_QUOTES);

    $email = mysqli_real_escape_string($link,$_POST['email']);
    $email = htmlspecialchars($email, ENT_QUOTES);

    $pass = mysqli_real_escape_string($link,$_POST['pass']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);

    $con_pass = mysqli_real_escape_string($link,$_POST['con-pass']);
    $con_pass = htmlspecialchars($con_pass, ENT_QUOTES);

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

    $query = "INSERT INTO organisations (username,email,password,name,website,facebook,twitter,other,description) VALUES ('$user', '$email','$pass','$name','$website','$facebook','$twitter', '$other','$description')";
    mysqli_query($link,$query);
    @mysqli_close($link);
    echo "<script> window.open('confirm.html','_self')</script>";

?>