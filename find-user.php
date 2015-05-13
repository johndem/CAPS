<?php
    
    include 'create-link.php';
	
	if(isset($_SESSION['org'])) {
        $user = $_SESSION['user'];
	    $query = "SELECT * FROM organisations WHERE username = '$user'";
	}
	else if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
	    $query = "SELECT * FROM user WHERE username = '$user'";
	}

    $results = mysqli_query($link,$query);
    $row = mysqli_fetch_row($results);



    @mysqli_close($link);

?>