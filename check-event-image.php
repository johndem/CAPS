<?php

	$results = " ";
    $error = false;

    $tmp_name = $_FILES['event-picture']['tmp_name'];
    $name = $_FILES['event-picture']['name'];
    $size = $_FILES['event-picture']['size'];
    $type = $_FILES['event-picture']['type'];

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


//echo $_POST['title'] . " AND " . $_POST['category'] . " AND " . $_POST['address'] . " AND " . $_POST['desc'] . " AND " . $_POST['ddesc'];


    if ($error) {
        echo $results;
    }
    else {
        if ($fileExists == true) {
            move_uploaded_file($_FILES['event-picture']['tmp_name'], "images/" . $name);
        }
        
        include "add-event.php";
        
    }

?>