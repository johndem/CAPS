<?php 

include 'create-link.php';

$eventId = $_POST["event_id"];
$skill = $_POST["skill"];
$volID = $_POST["vol_id"];

$jsonData = '0';

$query = "SELECT value FROM skills WHERE skill = '$skill'";
$result = mysqli_query($link,$query);
$skill = mysqli_fetch_row($result);
$skill_value = $skill[0];

$query = "INSERT INTO apply (eventID, volunteerID,skill_id) VALUES ('$eventId', '$volID','$skill_value')";
$result = mysqli_query($link,$query);

if ($result) {
    $jsonData = '1';
    
    $query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$volID','5','0','$eventId')";
    mysqli_query($link,$query);
}

echo json_encode($jsonData);

@mysqli_close($link);
    
?>