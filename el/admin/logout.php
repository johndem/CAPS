<?php

session_start();

mysqli_set_charset($link, "utf8");

if($_POST['action'] == "unsetsession") {
	unset($_SESSION['user']);
    unset($_SESSION['admin']);
}

?>