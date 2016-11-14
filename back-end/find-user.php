<?php

include 'create-link.php';

mysqli_set_charset($link, "utf8");

if(isset($_SESSION['org_id'])) {
    $user = $_SESSION['user'];
    $query = "SELECT * FROM organisations WHERE username = '$user'";
}
else if(isset($_SESSION['vol_id'])) {
    $user = $_SESSION['vol_id'];
    $query = "SELECT * FROM user WHERE id = $user";
}

$results = mysqli_query($link,$query);
$row = mysqli_fetch_row($results);

@mysqli_close($link);

?>
