<?php

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

$query = "INSERT INTO news(title,description,image,body) VALUES ('$title','$desc','$image','$body')";
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