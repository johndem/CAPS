<?php
    
include 'create-link.php';

$id = $_GET["mailToVolunteer"];

mysqli_set_charset($link, "utf8");

$query = "SELECT email FROM user WHERE id = '$id'";
$results = mysqli_query($link,$query);
$email = mysqli_fetch_row($results);

@mysqli_close($link);

?>