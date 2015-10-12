<?php

    include 'create-link.php';

    $results = "";
    $error = false;
	
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$username = htmlspecialchars($username, ENT_QUOTES);
	$username = trim($username);


	if (!ctype_alnum($username) OR strlen($username)<5 OR strlen($username)>50) {
		$results = $results . "username ";
        $error = true;
	}


	$email = mysqli_real_escape_string($link,$_POST['email']);
   	$email = htmlspecialchars($email, ENT_QUOTES);
   	$email = trim($email);

   	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   		$results = $results . "email ";
        $error = true;
   	}

   	 $first = mysqli_real_escape_string($link,$_POST['first']);
    $first = htmlspecialchars($first, ENT_QUOTES);
    $first = trim($first);


    if (preg_match('[^0-9]+', $first) OR strlen($first) < 1 OR strlen($first) > 50 ) {
    	$results = $results . "first ";
        $error = true;
    }


    $last = mysqli_real_escape_string($link,$_POST['last']);
    $last = htmlspecialchars($last, ENT_QUOTES);
    $last = trim($last);

    if (preg_match('[^0-9]+', $last) OR strlen($last) < 1 OR strlen($last) > 50 ) {
    	$results = $results . "last ";
        $error = true;
    }


    $pass = mysqli_real_escape_string($link,$_POST['password']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);
    $pass= trim($pass);

    if (strlen($pass)<10 OR strlen($pass) > 50) {
    	$results = $results . "pass ";
        $error = true;
    }

    $phone = mysqli_real_escape_string($link,$_POST['phone']);
    $phone = htmlspecialchars($phone, ENT_QUOTES);
    $phone = trim($phone);

    if ($phone!='' AND (!is_numeric($phone) OR substr($phone, 0, 1) == '0')){
    	$results = $results . "phone ";
        $error = true;
    }

    $address = mysqli_real_escape_string($link,$_POST['address']);
    $address = htmlspecialchars($address, ENT_QUOTES);
    $address = trim($address);

    if ($address!='' AND (preg_match('[^0-9]+', $first) OR strlen($address)>50)) {
    	$results = $results . "address ";
        $error = true;
    }


    $str = mysqli_real_escape_string($link,$_POST['str']);
    $str = htmlspecialchars($str, ENT_QUOTES);
    $str = trim($str);

    if ($str!='' AND (!is_numeric($str) OR strlen($str) > 4)) {
    	$results = $results . "str ";
        $error = true;
    }

    $zip = mysqli_real_escape_string($link,$_POST['zip']);
    $zip = htmlspecialchars($zip, ENT_QUOTES);

    if ($zip!='' AND (!is_numeric($zip) OR !(strlen($zip)==5))) {
    	$results = $results . "zip ";
        $error = true;
    }

    $date = mysqli_real_escape_string($link,$_POST['birth']);
    $date = htmlspecialchars($date, ENT_QUOTES);

    if ($date == "") {
    	$results = $results . "dob ";
        $error = true;
    }


    if ($error) {
        echo $results;
    }
    else {

      $query = "SELECT username FROM user WHERE username = '$username'";
	   
		$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "notuser ";
        $error = true;
	}
	
	
	$query = "SELECT email FROM user WHERE email = '$email'";

	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) >= 1) {
        mysqli_free_result($result);
        $results = $results . "notemail ";
        $error = true;
	}

	mysqli_close($link);
    
    
    if ($error) {
        echo $results;
    }
    else {
        include "vol-register.php";   
    }
}

?>