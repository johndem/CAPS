<?php
    
    include 'create-link.php';

    $id = $_GET["id"];

    $query = "SELECT * FROM events WHERE id = '$id'";
    $results = mysqli_query($link,$query);
    $row = mysqli_fetch_row($results);

    $query = "SELECT * FROM organisations WHERE org_id = '$row[1]'";
    $results = mysqli_query($link,$query);
    $org = mysqli_fetch_row($results);

    @mysqli_close($link);

?>