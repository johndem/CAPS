<?php

include 'create-link.php';

$vol_id = $_POST["id"];

$query = "SELECT * FROM user WHERE id = '$vol_id'";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["volunteer"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $jsonRow = array();
        
        $jsonRow["firstname"] = $row[1];
        $jsonRow["lastname"] = $row[2];
        $jsonRow["username"] = $row[3];
        $jsonRow["email"] = $row[4];
        $jsonRow["phone"] = $row[6];
        $jsonRow["address"] = $row[7];
        $jsonRow["street"] = $row[8];
        $jsonRow["zipcode"] = $row[9];
        $jsonRow["city"] = $row[10];
        $jsonRow["dob"] = $row[11];
        $jsonRow["image"] = $row[12];
        $jsonRow["points"] = $row[13];
        
        array_push($jsonData["volunteer"], $jsonRow);
    }
}

//$fp = fopen('results.json', 'w');
//fwrite($fp, json_encode($jsonData));
//fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>