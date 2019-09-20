<?php
include('manage/connection.php');



// After Submit
if(isset($_POST['submitBtn']))
{

 // namespace foo;

 // vendor/phpmailer/phpmailer/PHPMailer;
 // vendor/phpmailer/phpmailer/Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';



// Instantiation and passing `true` enables exceptions
$mail = new phpmailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'zaidali1002@gmail.com';                     // SMTP username
    $mail->Password   = '03012469293';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sydjaff07@gmail.com', 'jaff');
    $mail->addAddress('siddiquianus28@gmail.com', 'Joe User');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'testing email';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error:' . $mail->ErrorInfo;
}

	
		// require 'PHPMailerAutoload.php';
		// require 'credential.php';

		// $mail = new PHPMailer;

		// $mail->SMTPDebug = 4;                               // Enable verbose debug output

		// $mail->isSMTP();                                      // Set mailer to use SMTP
		// $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth = true;                               // Enable SMTP authentication
		// $mail->Username = EMAIL;                 // SMTP username
		// $mail->Password = PASS;                           // SMTP password
		// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		// $mail->Port = 587;                                    // TCP port to connect to

		// $mail->setFrom(EMAIL, 'zaid');
		// $mail->addAddress($_POST['email']);     // Add a recipient
		// $mail->addReplyTo(EMAIL);
		// // $mail->addCC('cc@example.com');
		// // $mail->addBCC('bcc@example.com');

		// // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		// $mail->isHTML(true);                                  // Set email format to HTML

		// $mail->Subject = $_POST['subject'];
		// $mail->Body    = '<div style="borger:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
		// $mail->AltBody = $_POST['message'];

		// if(!$mail->send()) {
		//     echo 'Message could not be sent.';
		//     echo 'Mailer Error: ' . $mail->ErrorInfo;
		// } else {
		//     echo 'Message has been sent';
		// }
  
  $name = $_POST['name'];
  $email = $_POST['email'];

  $insertquery = mysqli_query($con, "insert into email (name,email) values('$name','$email')");
  
  

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>email shooting</title>
</head>
<body>

	<form action="" method="post">
	Subject: <input type="text" name="subject"><br>
	E-mail: <input type="text" name="email"><br>
	Message: <textarea name="message"></textarea>
	<button type="submit" name="submitBtn">submit</button>
	</form>

</body>
</html>