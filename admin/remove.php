<?php 

	session_start();

	if (isset($_SESSION['admin'])) {

		include "create-link.php";

		$type = $_POST['type'];
		$id = $_POST['id'];

		if ($type == 'category') {
			$query = "DELETE FROM categories WHERE id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'dist') {
			$query = "DELETE FROM districts WHERE id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'skill') {
			$query = "DELETE FROM skills WHERE skill_id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'agegroup') {
			$query = "DELETE FROM agegroups WHERE id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'org') {
			$query = "DELETE FROM organisations WHERE org_id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'vol') {
			$query = "DELETE FROM user WHERE id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
        elseif ($type == 'news') {
			$query = "DELETE FROM news WHERE id=$id";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
        elseif ($type == 'events') {
			$query = "DELETE FROM events WHERE id=$id";
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