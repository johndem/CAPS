<?php

session_start();

include 'create-link.php';

$title = urldecode($_POST['title']);
$title = mysqli_real_escape_string($link,$title);
$title = htmlspecialchars($title, ENT_QUOTES);

$desc = urldecode($_POST['description']);
$desc = mysqli_real_escape_string($link,$desc);
$desc = htmlspecialchars($desc, ENT_QUOTES);

$body = urldecode($_POST['body']);
$body = mysqli_real_escape_string($link,$body);
$body = htmlspecialchars($body, ENT_QUOTES);

mysqli_set_charset($link, "utf8");

$news_id = $_SESSION['news_id'];
unset($_SESSION['news_id']);

$query = "SELECT image FROM news title = '$title'";
$results = mysqli_query($link,$query);
$row = mysqli_fetch_row($results);

if ($image == '')
    $image = $row[0];


$query = "UPDATE news SET title = '$title', description = '$desc', image = '$image', body = '$body' WHERE id = '$news_id'";

$result =  mysqli_query($link,$query);

if(!$result){
    echo "Database problem" . mysqli_error() ;
    mysqli_close($link); 
}

else {
    mysqli_close($link); 
    echo "OK";
}
    
?>