<?php

include 'create-link.php';

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT id FROM user WHERE username = '$username' AND password = '$password'";
$results = mysqli_query($link,$query);

$userId = '0';

if (mysqli_num_rows($results) > 0) {
    
    $row = mysqli_fetch_row($results);
    $userId = $row[0];
    
}

if ($userId == '0') {
    
    $query = "SELECT org_id FROM organisations WHERE username = '$username' AND password = '$password'";
    $results = mysqli_query($link,$query);
    
    if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_row($results);
        $userId = $row[0];
    }
    
}

//$fp = fopen('results.json', 'w');
//fwrite($fp, json_encode($jsonData));
//fclose($fp);

echo json_encode($userId);

@mysqli_close($link);

?>