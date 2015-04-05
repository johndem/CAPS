<?php

    include 'create-link.php';

    if(isset($_POST["email"]))
	{
	
		//check if its an ajax request, exit if not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die();
		}
		
		//trim email
		$email =  trim($_POST["email"]); 
    
		//sanitize email
		//$email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		
		$query = "SELECT email FROM user WHERE email = '$email'";
   
		$result = mysqli_query($link, $query);

		//return total count
		$email_exist = mysqli_num_rows($result); //total records
		
		//if value is more than 0, username is not available
		if ($email_exist > 0) {
			echo "<img src='X.jpg'>";
		} else {
			echo "<img src='check.jpg'>";
		}
		
	}

?>