<?php

include 'create-link.php';

$id = $_POST["event_id"];

$query = "SELECT skills.skill, skills.value FROM skills, skill_req WHERE skill_req.event_id='$id' AND skill_req.skill_id = skills.value";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["results"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $jsonRow = array();
        
        $jsonRow["title"] = $row[0];
        array_push($jsonData["results"], $jsonRow);
    }
}

// $fp = fopen('results.json', 'w');
// fwrite($fp, json_encode($jsonData));
// fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>