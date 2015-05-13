<?php

    session_start();

	$results = " ";
    $error = false;

    $tmp_name = $_FILES['picture']['tmp_name'];
    $name = $_FILES['picture']['name'];
    $size = $_FILES['picture']['size'];
    $type = $_FILES['picture']['type'];

    $fileExists = false;
    if (is_uploaded_file($tmp_name)) {
        //A file was selected for upload
        $fileExists = true;
        $whitelist = array(".jpg", ".jpeg", ".png");
        $black = true;
        foreach ($whitelist as $item) {
            if (substr($name, strrpos($name, ".")) == $item) {
                $black = false;
                break;
           }
        }

        if ($black == true) {
            $results = $results . "<li> We do not allow uploading this kind of file! </li>";
            $error = true;
        }
    }

    if ($error) {
        echo $results;
    }
    else {
        if ($fileExists == true) {
            move_uploaded_file($_FILES['picture']['tmp_name'], "images/" . $name);
        }
        
        if (isset($_SESSION['org'])){
            include "edit-org.php";
        }
        else if (isset($_SESSION['user'])){
            include "edit-vol.php";
        }
    }

?>