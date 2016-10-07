<?php

session_start();

include '../back-end/create-link.php';

mysqli_set_charset($link, "utf8");

$title = urldecode($_POST['title']);
$title = mysqli_real_escape_string($link,$title);
$title = htmlspecialchars($title, ENT_QUOTES);

$category = urldecode($_POST['category']);
$category = mysqli_real_escape_string($link,$category);
$category = htmlspecialchars($category, ENT_QUOTES);

$day = mysqli_real_escape_string($link,$day);
$day = htmlspecialchars($day, ENT_QUOTES);

$time = mysqli_real_escape_string($link,$_POST['time']);
$time = htmlspecialchars($time, ENT_QUOTES);

$desc = urldecode($_POST['description']);
$desc = mysqli_real_escape_string($link,$desc);
$desc = htmlspecialchars($desc, ENT_QUOTES);

$ddesc = urldecode($_POST['detailed-description']);
$ddesc = mysqli_real_escape_string($link,$ddesc);
$ddesc = htmlspecialchars($ddesc, ENT_QUOTES);

$agegroup = urldecode($_POST['agegroup']);
$agegroup = mysqli_real_escape_string($link,$agegroup);
$agegroup = htmlspecialchars($agegroup, ENT_QUOTES);

$address = urldecode($_POST['address']);
$address = mysqli_real_escape_string($link,$address);
$address = htmlspecialchars($address, ENT_QUOTES);

$str = urldecode($_POST['str']);
$str = mysqli_real_escape_string($link,$str);
$str = htmlspecialchars($str, ENT_QUOTES);

$zip = urldecode($_POST['zip']);
$zip = mysqli_real_escape_string($link,$zip);
$zip = htmlspecialchars($zip, ENT_QUOTES);

$area = urldecode($_POST['area']);
$area = mysqli_real_escape_string($link,$area);
$area = htmlspecialchars($area, ENT_QUOTES);


$event_id = $_SESSION['event_id'];
unset($_SESSION['event_id']);
$org_id = $_SESSION['org_id'];

$query = "SELECT image,image2,image3 FROM events WHERE id = '$event_id'";
$results = mysqli_query($link,$query);
$row = mysqli_fetch_row($results);

if ($image == '')
    $image = $row[0];
if ($image2 == '')
    $image2 = $row[1];
if ($image3 == '')
    $image3 = $row[2];

$query = "UPDATE events SET org_id = '$org_id', title = '$title', category = '$category', address = '$address', str_num = '$str', zipcode = '$zip', area = '$area', day = '$day', time = '$time', agegroup = '$agegroup', sdesc = '$desc', ddesc = '$ddesc', image = '$image', image2 = '$image2', image3 =  '$image3' WHERE id = '$event_id'";

$result =  mysqli_query($link,$query);


if(!$result){
    echo "Database problem occurred " . mysqli_error() ;
    mysqli_close($link); 
}
else {

    $query = "SELECT volunteerID FROM apply WHERE eventID = '$event_id'";
    $results = mysqli_query($link,$query);
    while ($row = mysqli_fetch_row($results)) {
        $vol_id = $row[0];
        $query = "INSERT INTO notifications (user_id,not_id,role,event_id) VALUES ('$vol_id','8','0','$id')";
        mysqli_query($link,$query);
    }

    $q = "DELETE FROM skill_req WHERE event_id='$event_id'";
    $res = mysqli_query($link,$q);
    if ($res) {
        $i = 0;
        $skill = "skill0";
        while (isset($_POST[$skill])) {
            $s = $_POST[$skill];
            $query = "INSERT INTO skill_req (event_id,skill_id) VALUES ('$event_id','$s') ";
            $result = mysqli_query($link,$query);
            $i = $i + 1;
            $skill = "skill" . $i;
        }
        mysqli_close($link); 
        echo "OK";
    }
    else {
        mysqli_close($link); 
        echo "Unable to update skills. Please try again!";

    }

}
    
?>