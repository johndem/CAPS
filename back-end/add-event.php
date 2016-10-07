<?php

session_start();

include 'create-link.php';

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

$org_id = $_SESSION['org_id'];

mysqli_set_charset($link, "utf8");


$query = "INSERT INTO events (org_id,title,category,address,str_num,zipcode,area,day,time,agegroup,sdesc,ddesc,image,image2,image3) VALUES ('$org_id','$title','$category','$address','$str','$zip','$area','$day','$time','$agegroup','$desc','$ddesc','$image','$image2','$image3')";

$result =  mysqli_query($link,$query);

if(!$result){
    echo "Database problem" . mysqli_error() ;
    mysqli_close($link); 
}

else {
    $q = "SELECT id FROM events WHERE title='$title'";
    $res = mysqli_query($link,$q);
    $id = mysqli_fetch_row($res);
    $id = $id[0];

    $i = 0;
    $skill = "skill0";
    while (isset($_POST[$skill])) {
        $s = $_POST[$skill];
        $query = "INSERT INTO skill_req (event_id,skill_id) VALUES ('$id','$s') ";
        $result = mysqli_query($link,$query);
        $i = $i + 1;
        $skill = "skill" . $i;
    }

    mysqli_close($link); 
    echo "OK";

}
    
?>