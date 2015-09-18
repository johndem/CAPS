<?php

	$results = " ";
    $error = false;

    $fileExists = false;

    $tmp_name = $_FILES['event-picture']['tmp_name'];
    $name = $_FILES['event-picture']['name'];
    $size = $_FILES['event-picture']['size'];
    $type = $_FILES['event-picture']['type'];

    
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


    $file2Exists = false;

    $tmp_name2 = $_FILES['event-picture2']['tmp_name'];
    $name2 = $_FILES['event-picture2']['name'];
    $size2 = $_FILES['event-picture2']['size'];
    $type2 = $_FILES['event-picture2']['type'];

    
    if (is_uploaded_file($tmp_name2)) {
        //A file was selected for upload
        $file2Exists = true;
        $whitelist = array(".jpg", ".jpeg", ".png");
        $black = true;
        foreach ($whitelist as $item) {
            if (substr($name2, strrpos($name2, ".")) == $item) {
                $black = false;
                break;
           }
        }

        if ($black == true) {
            $results = $results . "<li> We do not allow uploading this kind of file! </li>";
            $error = true;
        }
    }


    $file3Exists = false;

    $tmp_name3 = $_FILES['event-picture3']['tmp_name'];
    $name3 = $_FILES['event-picture3']['name'];
    $size3 = $_FILES['event-picture3']['size'];
    $type3 = $_FILES['event-picture3']['type'];

    
    if (is_uploaded_file($tmp_name3)) {
        //A file was selected for upload
        $file3Exists = true;
        $whitelist = array(".jpg", ".jpeg", ".png");
        $black = true;
        foreach ($whitelist as $item) {
            if (substr($name3, strrpos($name3, ".")) == $item) {
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
            move_uploaded_file($_FILES['event-picture']['tmp_name'], "images/" . $name);
            $image = "images/" . $name;
        }
        if ($file2Exists == true) {
            move_uploaded_file($_FILES['event-picture2']['tmp_name'], "images/" . $name2);
            $image2 = "images/" . $name2;
        }
        if ($file3Exists == true) {
            move_uploaded_file($_FILES['event-picture3']['tmp_name'], "images/" . $name3);
            $image3 = "images/" . $name3;
        }
        
        
        $btn = $_POST['button'];
        
        
        if ($btn == 'Post')
            include "add-event.php";
        else
            include "edit-event.php";
        
    }

?>