<?php

    include 'create-link.php';

    $name = urldecode($_POST['name']);
    $name = mysqli_real_escape_string($link,$name);
    $name = htmlspecialchars($name, ENT_QUOTES);

    $website = urldecode($_POST['website']);
    $website = mysqli_real_escape_string($link,$website);
    $website = htmlspecialchars($website, ENT_QUOTES);

    $facebook = urldecode($_POST['facebook']);
    $facebook = mysqli_real_escape_string($link,$facebook);
    $facebook = htmlspecialchars($facebook, ENT_QUOTES);

    $twitter = urldecode($_POST['twitter']);
    $twitter = mysqli_real_escape_string($link,$twitter);
    $twitter = htmlspecialchars($twitter, ENT_QUOTES);

    $other = urldecode($_POST['other']);
    $other = mysqli_real_escape_string($link,$other);
    $other = htmlspecialchars($other, ENT_QUOTES);

    $description = urldecode($_POST['description']);
    $description = mysqli_real_escape_string($link,$description);
    $description = htmlspecialchars($description, ENT_QUOTES);

    $user = $_SESSION['user'];

    if ($fileExists == true) {
        $image = "images/" . $title;
        $query = "UPDATE organisations SET name = '$name', website = '$website', facebook = '$facebook', twitter = '$twitter', other = '$other', description = '$description', picture = '$image' WHERE username = '$user'";
    }
    else {
        $query = "UPDATE organisations SET name = '$name', website = '$website', facebook = '$facebook', twitter = '$twitter', other = '$other', description = '$description' WHERE username = '$user'";
    }

	$result = mysqli_query($link, $query);
    @mysqli_close($link); 

    echo "OK";
?>