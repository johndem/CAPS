<?php

	session_start();
	
    include 'create-link.php';

    $user = mysqli_real_escape_string($link,$_POST['username']);
    $user = htmlspecialchars($user, ENT_QUOTES);

    $pass = mysqli_real_escape_string($link,$_POST['password']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);

    $query = "SELECT * FROM admin WHERE username='$user' AND password=$pass";

    $results = mysqli_query($link, $query);

    if (mysqli_num_rows($results) >= 1) {

            $row = mysqli_fetch_row($results);        
   
            $_SESSION['admin'] = $row[0];
			//$_SESSION['user'] = $row[1];
            echo "OK";
      
    }
    else {
        echo "<li> Τα στοιχεία σας δεν είναι σωστά! </li>";
    }

    @mysqli_close($link); 

?>