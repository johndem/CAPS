<?php

    include 'create-link.php';

    $first = mysqli_real_escape_string($link,$_POST['first']);
    $first = htmlspecialchars($first, ENT_QUOTES);

    $last = mysqli_real_escape_string($link,$_POST['last']);
    $last = htmlspecialchars($last, ENT_QUOTES);

    $phone = mysqli_real_escape_string($link,$_POST['phone']);
    $phone = htmlspecialchars($phone, ENT_QUOTES);

    $address = mysqli_real_escape_string($link,$_POST['address']);
    $address = htmlspecialchars($address, ENT_QUOTES);

    $str = mysqli_real_escape_string($link,$_POST['str']);
    $str = htmlspecialchars($str, ENT_QUOTES);

    $zip = mysqli_real_escape_string($link,$_POST['zip']);
    $zip = htmlspecialchars($zip, ENT_QUOTES);

    $date = mysqli_real_escape_string($link,$_POST['date']);
    $date = htmlspecialchars($date, ENT_QUOTES);

    $user = $_SESSION['user'];

    if ($fileExists == true) {
        $image = "images/" . $name;
        $query = "UPDATE user SET firstname = '$first', lastname = '$last', phone = '$phone', address = '$address', str_number = '$str', zip = '$zip', date = '$date', picture = '$image' WHERE username = '$user'";
    }
    else {
        $query = "UPDATE user SET firstname = '$first', lastname = '$last', phone = '$phone', address = '$address', str_number = '$str', zip = '$zip', date = '$date' WHERE username = '$user'";
    }

	$result = mysqli_query($link, $query);
    @mysqli_close($link); 

    echo "OK";
?>