<?php
    
include 'create-link.php';

$id = $_GET["id"];

mysqli_set_charset($link, "utf8");

$query = "SELECT * FROM events WHERE id = '$id'";
$results = mysqli_query($link,$query);
$row = mysqli_fetch_row($results);

$query = "SELECT * FROM organisations WHERE org_id = '$row[1]'";
$results = mysqli_query($link,$query);
$org = mysqli_fetch_row($results);

$query = "SELECT skills.skill FROM skills, skill_req WHERE skill_req.event_id='$id' AND skill_req.skill_id = skills.value";
$skills = mysqli_query($link,$query);

@mysqli_close($link);

?>