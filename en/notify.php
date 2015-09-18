<?php 
	session_start();

	include 'create-link.php';
     $id = 0;
     $role = 0;

     if (isset($_SESSION['vol_id'])) {
           $id = $_SESSION['vol_id'];
      }
     else {
            $id = $_SESSION['org_id'];
            $role = 1;
     }

     $query = "UPDATE notifications SET ok=1 WHERE user_id='$id' AND role='$role'";

     $result = mysqli_query($link,$query);

     if ($result) {
     	echo "OK";
     }
     else {
     	echo "NOTOK";
     }

     @mysqli_close($link);



?>