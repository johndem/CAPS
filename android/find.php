<?php

include 'create-link.php';

$id = $_POST["id"];

//WHERE id = '$id'
$query = "SELECT * FROM agegroups WHERE id='$id'";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["agegroups"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $jsonRow = array();
        $jsonRow["id"] = $row[0];
        $jsonRow["title"] = $row[1];
        array_push($jsonData["agegroups"], $jsonRow);
    }
}

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($jsonData));
fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>