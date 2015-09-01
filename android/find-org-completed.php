<?php

include 'create-link.php';

$org_id = $_POST["id"];

$query = "SELECT * FROM events WHERE org_id = '$org_id' AND status = '1' ORDER BY id desc";
$results = mysqli_query($link,$query);

//WHERE id = '$id'
//$query = "SELECT * FROM agegroups WHERE id='$id'";
//$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["completed"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $jsonRow = array();
        
        $jsonRow["title"] = $row[2];
        $jsonRow["category"] = $row[3];
        $jsonRow["address"] = $row[4];
        $jsonRow["street"] = $row[5];
        $jsonRow["zipcode"] = $row[6];
        $jsonRow["area"] = $row[7];
        $jsonRow["day"] = $row[8];
        $jsonRow["time"] = $row[9];
        $jsonRow["agegroup"] = $row[10];
        $jsonRow["skills"] = $row[11];
        $jsonRow["sdesc"] = $row[12];
        $jsonRow["ddesc"] = $row[13];
        $jsonRow["image1"] = $row[14];
        $jsonRow["image2"] = $row[15];
        $jsonRow["image3"] = $row[16];
        
        array_push($jsonData["completed"], $jsonRow);
    }
}

//$fp = fopen('results.json', 'w');
//fwrite($fp, json_encode($jsonData));
//fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>