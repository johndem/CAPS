<?php
    
include 'create-link.php';

$id = $_GET["mailToOrganization"];

mysqli_set_charset($link, "utf8");

$query = "SELECT email FROM organisations WHERE org_id = '$id'";
$results = mysqli_query($link,$query);
$email = mysqli_fetch_row($results);

@mysqli_close($link);

?>