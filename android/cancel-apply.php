<?php 

include 'create-link.php';

$eventId = $_POST["event_id"];
$volID = $_POST["vol_id"];

$query = "DELETE FROM apply WHERE eventID='$eventId' AND volunteerID = '$volID'";
$result = mysqli_query($link,$query);

@mysqli_close($link);
    
?>