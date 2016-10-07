<?php

session_start();

$string = $_POST['name'];
$token = strtok($string, " ");

if ($token) {

	$_SESSION['user'] = $token;

}
else {
	$_SESSION['user'] = $string;
}
?>