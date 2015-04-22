<?php

	session_start();
	
    include 'create-link.php';

    $user = mysqli_real_escape_string($link,$_POST['username']);
    $user = htmlspecialchars($user, ENT_QUOTES);

    $pass = mysqli_real_escape_string($link,$_POST['password']);
    $pass = htmlspecialchars($pass, ENT_QUOTES);

    $query = "SELECT * FROM user";

    $results = mysqli_query($link, $query);


    $match = false;

    while ($row = mysqli_fetch_row($results)) {
        if (($user == $row[3] || $user == $row[4]) && $pass == $row[5]) {
            //$_SESSION['username'] = $row[3];
            // found user match
            $match = true;
			$_SESSION['user'] = $row[3];
        }
    }
    
    // Search for org
    if ($match == false) {
        
    $query = "SELECT * FROM organisations";

    $results = mysqli_query($link, $query);

    while ($row = mysqli_fetch_row($results)) {
        if (($user == $row[1] || $user == $row[2]) && $pass == $row[3]) {
            //$_SESSION['username'] = $row[3];
            // found user match
            $match = true;
			$_SESSION['user'] = $row[1];
            $_SESSION['org'] = $row[0];
        }
    }
    }

    @mysqli_close($link); 

    if ($match == true) {
        echo "OK";
    }
    else {
        echo "<li> Your credentials don't match! </li>";
    }

?>