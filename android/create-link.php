<?php
    $servername = "webpagesdb.it.auth.gr";
    $username = "Yanis";
    $password = "password";
    $dbname = "caps";

    $link = mysqli_connect($servername, $username, $password, $dbname);

    if (!$link) {
        die("Connection failed");
    }
?>