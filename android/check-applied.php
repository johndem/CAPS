<?php

include 'create-link.php';

$event_id = $_POST["event_id"];
$vol_id = $_POST["vol_id"];

mysqli_set_charset($link, "utf8");

$query = "SELECT skill_id FROM apply WHERE eventID='$event_id' AND volunteerID='$vol_id'";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    $jsonData["results"] = array();
    $jsonRow = array();
    
    $row = mysqli_fetch_row($results);
    $query = "SELECT skill FROM skills WHERE value='$row[0]'";
    $result = mysqli_query($link,$query);
    $skill = mysqli_fetch_row($result);
//    $jsonData = $skill[0];
    
    $jsonRow["title"] = $skill[0];
    array_push($jsonData["results"], $jsonRow);
}

$fp = fopen('results2.json', 'w');
fwrite($fp, json_encode($jsonData));
fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>