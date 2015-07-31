<?php 

	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['text'];

	$message = wordwrap($message, 70, "\r\n");

	echo $to . ' ' . $subject . ' ' . $message;

	//mail($to, $subject, $message);



?>

