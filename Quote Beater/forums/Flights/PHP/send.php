<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

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
			Full name: {$_POST['name']} 
			<br> Dates: {$_POST['datetimes']} 
			<br> Number of people: {$_POST['people']} 
			<br> Departure: {$_POST['people']} 
			<br> Destination: {$_POST['website']} 
			<br> Website: {$_POST['website']}
		</span>";

// Email's subject
$mail->Subject = 'Flight Details';

// Attach body content to $mail 
$mail->Body = $bodyContent;

// Check if message was sent

if(!$mail->send()) {
	header("Location: ../../../index.html");
} else {
	header("Location: ../../../index.html");
}
 ?>