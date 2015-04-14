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
			$results = $results . "<li> Username not available! </li>";
            $error = true;
	}
	
	
	$query = "SELECT email FROM user WHERE email = '$email'";

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
        
        include "vol-register.php";
           
    }

	

	
	
	
	/*
    if(isset($_POST["username"]))
	{
	
		//check if its an ajax request, exit if not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die();
		}
		
		//trim username
		$username = trim($_POST["username"]); 
    
		//sanitize username
		$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		
		$query = "SELECT username FROM user WHERE username = '$username'";
   
		$result = mysqli_query($link, $query);

		//return total count
		$username_exist = mysqli_num_rows($result); //total records
		
		//if value is more than 0, username is not available
		if ($username_exist > 0) {
			echo "0";
		} else {
			echo "1";
		}
		
	}
	*/

?>