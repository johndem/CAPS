<?php 

	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['text'];

	$message = wordwrap($message, 70, "\r\n");

	echo $to . ' ' . $subject . ' ' . $message;

	if (mail($to, $subject, $message) ) {
		header("Location: mailto-form.php?sucess=1");
	}
	else {
		header("Location: mailto-form.php?sucess=0");
	}


?>

