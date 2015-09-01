<?php 

$eventid = $_POST['eventid'];
$volid = $_POST['volid'];

include 'create-link.php';

$query = "UPDATE apply SET selected=1 WHERE eventID='$eventid' AND volunteerID='$volid'";

if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  			 echo "Error";
	}

mysqli_close($link);









?>