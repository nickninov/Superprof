<?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

$errors = 0;

// Check if name field is empty
if ($_POST['name'] == '') {
	$errors++;
	$_SESSION['errorName'] = "Please enter your name";
}

// Check if email empty
if ($_POST['email'] == '') {

	$_SESSION['errorEmail'] = "Please enter your email";
	$errors++;
}

// Check if phone field is empty
if ($_POST['phone'] == '') {

	$_SESSION['errorPhone'] = "Please enter your phone number";
	$errors++;
}

// Check if messages field is empty
if ($_POST['msg'] == '') {

	$_SESSION['errorMessages'] = "Please enter your message";
	$errors++;
}

// echo $_POST['phone'];

// Check if there are any errors
if ($errors > 0) {
	header("Location: ../index.php#contact-section");
}
else {

	session_destroy();

	// Send email
	$mail = new PHPMailer;

	// Set mailer to use SMTP
	$mail->isSMTP();

	// Specify main and backup SMTP servers                       
	$mail->Host = 'smtp.gmail.com';

	// Enable SMTP authentication
	$mail->SMTPAuth = true;

	// SMTP username
	$mail->Username = 'markquotes100@gmail.com';

	// SMTP password
	$mail->Password = 'Markup121';

	// Enable TLS encryption, `ssl` also accepted
	$mail->SMTPSecure = 'tls';  

	// TCP port to connect to    
	$mail->Port = 587;

	// Who is the sender and their name
	$mail->setFrom('markquotes100@gmail.com', 'Quote Beater');

	// Who is receiving the email
	$mail->addAddress('markquotes100@gmail.com'); // markquotes11
	$mail->addAddress('kaleemnaeem35@gmail.com'); // kaleem's email

	// Set email format to HTML
	$mail->isHTML(true);

	// Body Content
	$bodyContent = "
			<span style='font-size: 1.2em;'>
			Name: {$_POST['name']} <br>
			Email: {$_POST['email']} <br>
			Phone number: {$_POST['phone']} <br>
			Message: {$_POST['msg']} <br>
			</span>";

	// Email's subject
	$mail->Subject = 'Flight details';

	// Attach body content to $mail 
	$mail->Body = $bodyContent;

	// Check if message was sent
	
	if(!$mail->send()) {
	    $_SESSION['message'] = 'Message could not be sent. Please contact us - arimas8smira@gmail.com';
	    
	} else {
	    $_SESSION['message'] = 'Details have been sent thank you';
	}

	header("Location: ../index.php#contact-section");
}
?>