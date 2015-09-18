<?php

    include 'create-link.php';
	
	$username = $_POST['username'];
	$email = $_POST['email'];
    $username = trim($username);

	$results = " ";
    $error = false;
	
	$query = "SELECT username FROM user WHERE username = '$username'";
	   
	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "<li> Το όνομα χρήστη δεν ειναι διαθέσιμο </li>";
        $error = true;
	}
	
	
	$query = "SELECT email FROM user WHERE email = '$email'";

	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "<li> Το email χρησιμοποείται ήδη </li>";
        $error = true;
	}

	mysqli_close($link);
    
    if ($error) {
        echo $results;
    }
    else {
        include "vol-register.php";   
    }

?>