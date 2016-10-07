<?php
    
include 'create-link.php';

$id = $_GET["id"];

mysqli_set_charset($link, "utf8");

$query = "SELECT * FROM organisations WHERE org_id = '$id'";
$results = mysqli_query($link,$query);
$org = mysqli_fetch_row($results);

@mysqli_close($link);

?>