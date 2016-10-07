<?php 

$eventid = $_POST['eventid'];
$volid = $_POST['volid'];

include 'create-link.php';

mysqli_set_charset($link, "utf8");

$query = "UPDATE apply SET selected=1 WHERE eventID='$eventid' AND volunteerID='$volid'";

if (mysqli_query($link, $query)) {
    
    $query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$volid','6','0','$eventid')";
    mysqli_query($link,$query);
    
    echo "OK";
} else {
    echo "Error";
}

mysqli_close($link);

?>