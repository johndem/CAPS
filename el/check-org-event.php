<?php 
	
mysqli_set_charset($link, "utf8");
$flag = false;

if (isset($_SESSION['org_id'])) {

    include 'create-link.php';
    $eventid = $_GET['id'];
    $org_id = $_SESSION['org_id'];

    $query = "SELECT title FROM events WHERE id= $eventid  AND org_id= $org_id ";

    $resultss = mysqli_query($link,$query);     
    @mysqli_close($link); 
    
    if (mysqli_num_rows($resultss) >= 1) {
        $flag = true;
    }

}

?>