<?php

include 'create-link.php';

$org_id = $_POST["id"];
$event_id = $_POST["event-id"];

mysqli_set_charset($link, "utf8");

$query ="SELECT user.id, user.username, user.firstname, user.lastname, user.email, skills.skill, apply.selected FROM user, apply, skills,events WHERE user.id = apply.volunteerID AND skills.value = apply.skill_id AND apply.eventID = '$event_id' AND events.id = '$event_id' AND events.org_id = '$org_id'" ;
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["applicants"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $jsonRow = array();
        
        $jsonRow["id"] = $row[0];
        $jsonRow["username"] = $row[1];
        $jsonRow["firstname"] = $row[2];
        $jsonRow["lastname"] = $row[3];
        $jsonRow["skill"] = $row[5];
        $jsonRow["selected"] = $row[6];
        
        array_push($jsonData["applicants"], $jsonRow);
    }
}

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($jsonData));
fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>