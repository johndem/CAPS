<?php

    include 'create-link.php';

    $name = mysqli_real_escape_string($link,$_POST['name']);
    $name = htmlspecialchars($name, ENT_QUOTES);

    $website = mysqli_real_escape_string($link,$_POST['website']);
    $website = htmlspecialchars($website, ENT_QUOTES);

    $facebook = mysqli_real_escape_string($link,$_POST['facebook']);
    $facebook = htmlspecialchars($facebook, ENT_QUOTES);

    $twitter = mysqli_real_escape_string($link,$_POST['twitter']);
    $twitter = htmlspecialchars($twitter, ENT_QUOTES);

    $other = mysqli_real_escape_string($link,$_POST['other']);
    $other = htmlspecialchars($other, ENT_QUOTES);

    $description = mysqli_real_escape_string($link,$_POST['description']);
    $description = htmlspecialchars($description, ENT_QUOTES);

    $user = $_SESSION['user'];

    if ($fileExists == true) {
        $image = "images/" . $name;
        $query = "UPDATE organisations SET name = '$name', website = '$website', facebook = '$facebook', twitter = '$twitter', other = '$other', description = '$description', picture = '$image' WHERE username = '$user'";
    }
    else {
        $query = "UPDATE organisations SET name = '$name', website = '$website', facebook = '$facebook', twitter = '$twitter', other = '$other', description = '$description' WHERE username = '$user'";
    }

	$result = mysqli_query($link, $query);
    @mysqli_close($link); 

    echo "OK";
?>