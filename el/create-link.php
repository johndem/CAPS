<?php

$servername = "localhost";
$username = "admin";
$password = "caps";
$dbname = "caps";

$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Connection failed");
}

?>