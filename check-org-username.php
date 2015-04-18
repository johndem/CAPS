<?php

    include 'create-link.php';
	
	$username = $_POST['username'];
	$email = $_POST['email'];
    $username = trim($username);

	$results = " ";
    $error = false;
	
	$query = "SELECT username FROM organisations WHERE username = '$username'";
	   
	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "<li> Username not available! </li>";
        $error = true;
	}
	
	
	$query = "SELECT email FROM organisations WHERE email = '$email'";

	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "<li> Email already in use </li>";
        $error = true;
	}

	mysqli_close($link);
    
    if ($error) {
        echo $results;
    }
    else {
        include "org-register.php";   
    }

?>