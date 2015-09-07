<?php

	$results = " ";
    $error = false;

    $fileExists = false;

    $tmp_name = $_FILES['news-picture']['tmp_name'];
    $name = $_FILES['news-picture']['name'];
    $size = $_FILES['news-picture']['size'];
    $type = $_FILES['news-picture']['type'];

    
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
            move_uploaded_file($_FILES['news-picture']['tmp_name'], "../images/" . $name);
            $image = "images/" . $name;
        }
        
        
        $btn = $_POST['button'];
        
        if ($btn == 'Submit')
            include "add-news.php";
        else
            include "edit-news.php";
        
    }

?>