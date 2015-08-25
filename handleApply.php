<?php 
	session_start();

	include 'create-link.php';

	 $eventId = mysqli_real_escape_string($link,$_POST['eventID']);
    $eventId = htmlspecialchars($eventId, ENT_QUOTES);

    $skill_id = mysqli_real_escape_string($link,$_POST['skill']);
    $skill_id = htmlspecialchars($skill_id, ENT_QUOTES);

    $volID = $_SESSION['vol_id'];

    $query = "INSERT INTO apply (eventID, volunteerID,skill_id) VALUES ('$eventId', '$volID','$skill_id')";
    
    $result = mysqli_query($link,$query);
    @mysqli_close($link); 

    if ($result) {
    	echo "OK";
    }
    else {
    	echo "NOTOK";
    }

    
?>