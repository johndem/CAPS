<?php
    
    include 'create-link.php';

    $id = $_GET["id"];

    $query = "SELECT * FROM news WHERE id = '$id'";
    $results = mysqli_query($link,$query);
    $row = mysqli_fetch_row($results);

    @mysqli_close($link);

?>