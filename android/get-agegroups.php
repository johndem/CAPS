<?php

include 'create-link.php';

mysqli_set_charset($link, "utf8");

$query = "SELECT title FROM agegroups";
$results = mysqli_query($link,$query);

//WHERE id = '$id'
//$query = "SELECT * FROM agegroups WHERE id='$id'";
//$results = mysqli_query($link,$query);

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