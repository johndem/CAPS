<?php 
    session_start();

    include 'create-link.php';

     $eventId = mysqli_real_escape_string($link,$_POST['eventID']);
    $eventId = htmlspecialchars($eventId, ENT_QUOTES);

    $volID = $_SESSION['vol_id'];

    $query = "DELETE FROM apply WHERE eventID='$eventId' AND volunteerID = '$volID'";
    
    $result = mysqli_query($link,$query);
    @mysqli_close($link); 

    if ($result) {
        echo "OK";
    }
    else {
        echo "NOTOK";
    }

    
?>