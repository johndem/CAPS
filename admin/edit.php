<?php 

	session_start();
    
	if (isset($_SESSION['admin'])) {
        

		include "create-link.php";

		$type = $_POST['type'];
		$id = $_POST['id'];
		$new_value = $_POST['newvalue'];

		if ($type == 'category') {
			$query = "UPDATE categories SET title='$new_value' WHERE id='$id' ";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'dist') {
			$query = "UPDATE districts SET title='$new_value' WHERE id='$id'";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'skill') {
			$query = "UPDATE skills SET skill='$new_value' WHERE skill_id='$id'";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'agegroup') {
			$query = "UPDATE agegroups SET title='$new_value' WHERE id='$id'";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
        elseif ($type == 'approve') {
			$query = "UPDATE events SET status='$new_value' WHERE id='$id'";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
        elseif ($type == 'reject') {
			$query = "UPDATE events SET status='$new_value' WHERE id='$id'";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
        elseif ($type == 'suspend') {
			$query = "UPDATE events SET status='$new_value' WHERE id='$id'";
            $q = "DELETE FROM apply WHERE eventID='$id'";

			if (mysqli_query($link, $query) && mysqli_query($link, $q)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
	}
	else {
		echo "Permission denied";
	}


?>