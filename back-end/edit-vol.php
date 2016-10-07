<?php

include 'create-link.php';

$first = urldecode($_POST['first']);
$first = mysqli_real_escape_string($link,$first);
$first = htmlspecialchars($first, ENT_QUOTES);

$last = urldecode($_POST['last']);
$last = mysqli_real_escape_string($link,$last);
$last = htmlspecialchars($last, ENT_QUOTES);

$phone = urldecode($_POST['phone']);
$phone = mysqli_real_escape_string($link,$phone);
$phone = htmlspecialchars($phone, ENT_QUOTES);

$address = urldecode($_POST['address']);
$address = mysqli_real_escape_string($link,$address);
$address = htmlspecialchars($address, ENT_QUOTES);

$str = urldecode($_POST['str']);
$str = mysqli_real_escape_string($link,$str);
$str = htmlspecialchars($str, ENT_QUOTES);

$zip = urldecode($_POST['zip']);
$zip = mysqli_real_escape_string($link,$zip);
$zip = htmlspecialchars($zip, ENT_QUOTES);

$date = urldecode($_POST['date']);
$date = mysqli_real_escape_string($link,$date);
$date = htmlspecialchars($date, ENT_QUOTES);

$user = $_SESSION['user'];

mysqli_set_charset($link, "utf8");

if ($fileExists == true) {
    $image = "../images/profile-pics/" . $title;
    $query = "UPDATE user SET firstname = '$first', lastname = '$last', phone = '$phone', address = '$address', str_number = '$str', zip = '$zip', date = '$date', picture = '$image' WHERE username = '$user'";
}
else {
    $query = "UPDATE user SET firstname = '$first', lastname = '$last', phone = '$phone', address = '$address', str_number = '$str', zip = '$zip', date = '$date' WHERE username = '$user'";
}

$result = mysqli_query($link, $query);
@mysqli_close($link); 

echo "OK";

?>