<?php

include 'create-link.php';

$id = $_POST["id"];
$role = $_POST["role"];

mysqli_set_charset($link, "utf8");

$query = "SELECT notifications.date, messages.text ,notifications.id,events.title,events.id FROM notifications, messages, events WHERE notifications.user_id='$id' AND notifications.role='$role' AND notifications.not_id = messages.id AND notifications.event_id = events.id ORDER BY notifications.id DESC";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["notifications"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $query = "SELECT * FROM events WHERE id = '$row[4]'";
        $eventResults = mysqli_query($link,$query);
        $event = mysqli_fetch_row($eventResults);
        
        $queryOrg = "SELECT name FROM organisations WHERE org_id = '$event[1]'";
        $orgResults = mysqli_query($link,$queryOrg);
        $org = mysqli_fetch_row($orgResults);
        
        $jsonRow = array();
        
        $query = "SELECT skills.skill FROM skills, skill_req WHERE skill_req.event_id='$event[0]' AND skill_req.skill_id = skills.value";
        $result = mysqli_query($link,$query);
        
        $skill = mysqli_fetch_row($result);
        $skills = $skill[0];
        while ($skill = mysqli_fetch_row($result)) {
            $skills = $skills . "," . $skill[0];
        }
        
        $jsonRow["date"] = $row[0];
        $jsonRow["message"] = $row[1];
        $jsonRow["title"] = $row[3];
        $jsonRow["id"] = $event[0];
        $jsonRow["creator"] = $org[0];
        $jsonRow["category"] = $event[3];
        $jsonRow["address"] = $event[4];
        $jsonRow["street"] = $event[5];
        $jsonRow["zipcode"] = $event[6];
        $jsonRow["area"] = $event[7];
        $jsonRow["day"] = $event[8];
        $jsonRow["time"] = $event[9];
        $jsonRow["agegroup"] = $event[10];
        $jsonRow["skills"] = $skills;
        $jsonRow["sdesc"] = $event[12];
        $jsonRow["ddesc"] = $event[13];
        $jsonRow["image1"] = $event[14];
        $jsonRow["image2"] = $event[15];
        $jsonRow["image3"] = $event[16];
        
        array_push($jsonData["notifications"], $jsonRow);
    }
}

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($jsonData));
fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>