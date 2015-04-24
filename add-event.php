<?php

    session_start();

    include 'create-link.php';

    $title = mysqli_real_escape_string($link,$_POST['title']);
    $title = htmlspecialchars($title, ENT_QUOTES);

    $category = mysqli_real_escape_string($link,$_POST['category']);
    $category = htmlspecialchars($category, ENT_QUOTES);

    $day = mysqli_real_escape_string($link,$_POST['day']);
    $day = htmlspecialchars($day, ENT_QUOTES);

    $time = mysqli_real_escape_string($link,$_POST['time']);
    $time = htmlspecialchars($time, ENT_QUOTES);

    $desc = mysqli_real_escape_string($link,$_POST['desc']);
    $desc = htmlspecialchars($desc, ENT_QUOTES);

    $ddesc = mysqli_real_escape_string($link,$_POST['ddesc']);
    $ddesc = htmlspecialchars($ddesc, ENT_QUOTES);

    $agegroup = mysqli_real_escape_string($link,$_POST['agegroup']);
    $agegroup = htmlspecialchars($agegroup, ENT_QUOTES);

    $address = mysqli_real_escape_string($link,$_POST['address']);
    $address = htmlspecialchars($address, ENT_QUOTES);

    $str = mysqli_real_escape_string($link,$_POST['str']);
    $str = htmlspecialchars($str, ENT_QUOTES);

    $zip = mysqli_real_escape_string($link,$_POST['zip']);
    $zip = htmlspecialchars($zip, ENT_QUOTES);

    $area = mysqli_real_escape_string($link,$_POST['area']);
    $area = htmlspecialchars($area, ENT_QUOTES);

    $skills = mysqli_real_escape_string($link,$_POST['skills']);
    $skills = htmlspecialchars($skills, ENT_QUOTES);

    $org_id = $_SESSION['org'];

    $query = "INSERT INTO events (org_id,title,category,address,str_num,zipcode,area,day,time,agegroup,skills,sdesc,ddesc) VALUES ('$org_id','$title',                 '$category','$address','$str','$zip','$area','$day','$time','$agegroup','$skills','$desc','$ddesc')";
    
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