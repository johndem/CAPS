<?php 

	session_start();

	if (isset($_SESSION['admin'])) {

		include "create-link.php";

		$type = $_POST['type'];
		$new_value = $_POST['value'];

		if ($type == 'category') {
			$query = "INSERT INTO categories (title) VALUES ('$new_value') ";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'dist') {
			$query = "INSERT INTO districts (title) VALUES ('$new_value')";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'skill') {
			$query = "INSERT INTO skills (skill, value) VALUES ('$new_value', 15)";

			if (mysqli_query($link, $query)) {
   				 echo "OK";
			} else {
  				 echo "Error";
			}

			mysqli_close($link);
		}
		elseif ($type == 'agegroup') {
			$query = "INSERT INTO agegroups (title) VALUES ('$new_value')";

			if (mysqli_query($link, $query)) {
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