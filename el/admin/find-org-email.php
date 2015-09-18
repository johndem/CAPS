<?php
    
    include 'create-link.php';

    $id = $_GET["mailToOrganization"];

    $query = "SELECT email FROM organisations WHERE org_id = '$id'";
    $results = mysqli_query($link,$query);
    $email = mysqli_fetch_row($results);

    @mysqli_close($link);

?>