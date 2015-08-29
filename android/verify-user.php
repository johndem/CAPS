<?php

include 'create-link.php';

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT id FROM user WHERE username = '$username' AND password = '$password'";
$results = mysqli_query($link,$query);

$response = array();
$response["log-state"] = array();
$userId = '0';
$userRole = '';

if (mysqli_num_rows($results) > 0) {
    $row = mysqli_fetch_row($results);
    $userId = $row[0];
    $userRole = 'vol';
}

if ($userId == '0') {
    
    $query = "SELECT org_id FROM organisations WHERE username = '$username' AND password = '$password'";
    $results = mysqli_query($link,$query);
    
    if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_row($results);
        $userId = $row[0];
        $userRole = 'org';
    }
    
}

array_push($response["log-state"], $userId, $userRole);

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

echo json_encode($response);

@mysqli_close($link);

?>