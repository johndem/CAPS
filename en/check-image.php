<?php

session_start();

$results = " ";
$error = false;

$tmp_name = $_FILES['picture']['tmp_name'];
$title = $_FILES['picture']['name'];
$size = $_FILES['picture']['size'];
$type = $_FILES['picture']['type'];

mysqli_set_charset($link, "utf8");

$fileExists = false;
if (is_uploaded_file($tmp_name)) {
    //A file was selected for upload
    $fileExists = true;
    $whitelist = array(".jpg", ".jpeg", ".png");
    $black = true;
    foreach ($whitelist as $item) {
        if (substr($title, strrpos($title, ".")) == $item) {
            $black = false;
            break;
       }
    }

    if ($black == true) {
        $results = $results . "<li> This image type is not permitted! </li>";
        $error = true;
    }
}

if ($error) {
    echo $results;
}
else {
    if ($fileExists == true) {
        move_uploaded_file($_FILES['picture']['tmp_name'], "../images/profile-pics/" . $title);
    }

    if (isset($_SESSION['org_id'])){
        include "../back-end/edit-org.php";
    }
    else if (isset($_SESSION['user'])){
        include "../back-end/edit-vol.php";
    }
}

?>