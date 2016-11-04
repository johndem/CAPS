<?php

session_start();

$eventid = $_POST['eventid'];
$orgid = $_SESSION['org_id'];
$participants = $_POST['participant'];

include 'create-link.php';

mysqli_set_charset($link, "utf8");

foreach ($participants as $participant) {
    $query = "INSERT INTO participation (event_id,volunteer_id) VALUES ('$eventid','$participant')";
    mysqli_query($link, $query);

    $query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$participant','7','0','$eventid')";
    mysqli_query($link,$query);

    $points = 50;

    $query = "SELECT points FROM user WHERE id='$participant'";
    $results = mysqli_query($link,$query);
    $row = mysqli_fetch_row($results);
    $points = $points + $row[0];

    $query = "UPDATE user SET points='$points' WHERE id='$participant'";
    mysqli_query($link,$query);

}

$query = "UPDATE events SET status='2' WHERE id='$eventid'";
mysqli_query($link, $query);

$query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$orgid','12','1','$eventid')";
mysqli_query($link,$query);

$query = "DELETE FROM apply WHERE eventID=$eventid";
mysqli_query($link,$query);

header('Location: en/index.php');

mysqli_close($link);

?>
