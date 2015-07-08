<?php 
	session_start();

	include 'create-link.php';

	 $eventId = mysqli_real_escape_string($link,$_POST['eventID']);
    $eventId = htmlspecialchars($eventId, ENT_QUOTES);

    $volID = $_SESSION['vol_id'];

    $query = "INSERT INTO apply (eventID, volunteerID) VALUES ('$eventId', '$volID')";
    
    $result = mysqli_query($link,$query);
    @mysqli_close($link); 

    if ($result) {
    	echo "OK";
    }
    else {
    	echo "NOTOK";
    }

    
?>