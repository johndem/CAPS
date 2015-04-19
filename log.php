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

    @mysqli_close($link); 

    if ($match == true) {
        echo "OK";
    }
    else {
        echo "<li> Your credentials don't match! </li>";
    }

?>