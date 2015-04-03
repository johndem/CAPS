<?php
	session_start();
	
    include 'create-link.php';

    $user = mysqli_real_escape_string($link,$_POST['user']);
    $user = htmlspecialchars($user, ENT_QUOTES);

    $pass = mysqli_real_escape_string($link,$_POST['pass']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);

    $query = "SELECT * FROM user";
    $results = mysqli_query($link, $query);

    while ($row = mysqli_fetch_row($results)) {
        if ($user == $row[4] && $pass == $row[5]) {
            $_SESSION['username'] = $row[3];
        }
    }

    @mysqli_close($link); 
    echo "<script> window.open('welcome.php','_self')</script>";

?>