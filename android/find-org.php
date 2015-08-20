<?php

include 'create-link.php';

$org_id = $_POST["id"];

$query = "SELECT * FROM organisations WHERE id = '$org_id'";
$results = mysqli_query($link,$query);

$jsonData = array();

if (mysqli_num_rows($results) > 0) {
    
    $jsonData["organization"] = array();
    
    while ($row = mysqli_fetch_row($results)) {
        $jsonRow = array();
        
        $jsonRow["username"] = $row[1];
        $jsonRow["email"] = $row[2];
        $jsonRow["name"] = $row[4];
        $jsonRow["website"] = $row[5];
        $jsonRow["facebook"] = $row[6];
        $jsonRow["twitter"] = $row[7];
        $jsonRow["other"] = $row[8];
        $jsonRow["description"] = $row[9];
        $jsonRow["image"] = $row[10];
        
        array_push($jsonData["organization"], $jsonRow);
    }
}

//$fp = fopen('results.json', 'w');
//fwrite($fp, json_encode($jsonData));
//fclose($fp);

echo json_encode($jsonData);

@mysqli_close($link);

?>