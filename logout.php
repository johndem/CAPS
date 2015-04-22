<?php

session_start();

if($_POST['action'] == "unsetsession") {
	unset($_SESSION['user']);
    unset($_SESSION['org']);
}

?>