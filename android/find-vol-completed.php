<?php

include 'create-link.php';

$vol_id = $_POST["id"];

$query = "SELECT event_id FROM participation WHERE volunteer_id = '$vol_id'";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["completed"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $query = "SELECT * FROM events WHERE id = '$row[0]'";
        $eventResults = mysqli_query($link,$query);
        $event = mysqli_fetch_row($eventResults);
        
        $queryOrg = "SELECT name FROM organisations WHERE org_id = '$event[1]'";
        $orgResults = mysqli_query($link,$queryOrg);
        $org = mysqli_fetch_row($orgResults);
        
        $jsonRow = array();
        
        $jsonRow["title"] = $event[2];
        $jsonRow["creator"] = $org[0];
        $jsonRow["category"] = $event[3];
        $jsonRow["address"] = $event[4];
        $jsonRow["street"] = $event[5];
        $jsonRow["zipcode"] = $event[6];
        $jsonRow["area"] = $event[7];
        $jsonRow["day"] = $event[8];
        $jsonRow["time"] = $event[9];
        $jsonRow["agegroup"] = $event[10];
        $jsonRow["skills"] = $event[11];
        $jsonRow["sdesc"] = $event[12];
        $jsonRow["ddesc"] = $event[13];
        $jsonRow["image1"] = $event[14];
        $jsonRow["image2"] = $event[15];
        $jsonRow["image3"] = $event[16];
        
        array_push($jsonData["completed"], $jsonRow);
    }
}

//$fp = fopen('results.json', 'w');
//fwrite($fp, json_encode($jsonData));
//fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>