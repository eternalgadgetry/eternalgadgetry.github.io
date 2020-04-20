<?php
$error    = ''; // error message
$name     = ''; // sender's name
$email    = ''; // sender's email address
$subject  = ''; // subject
$message  = ''; // the message itself

if(isset($_POST['email']))
{
	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$subject  = $_POST['subject'];
	$message  = $_POST['message'];


    function died($error) {
        echo $error;
        die();
    }

	// validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

	if($error == '')
	{
		if(get_magic_quotes_gpc())
		{ $message = stripslashes($message); }

		// the email will be sent here
		// make sure to change this to be your e-mail
		$to      = "markos.skoulatos@gmail.com";

		// the mail message ( add any additional information if you want )
		$msg     = "From : $name <br />E-Mail : $email <br />Subject : $subject <br /><br />" . "Message : <br />$message";
		
		$subject = '[EternalGadgetry Contact Form] : ' . $subject;
		
		$headers = array
		(
			'Content-Type: text/html; charset="UTF-8";',
			'From: ' . $email,
			'Reply-To: ' . $email,
			'Return-Path: ' . $email,
		);

		mail($to, $subject, $msg, implode("\n", $headers));
	}
}

?>
