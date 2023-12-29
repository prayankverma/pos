<?php
include('smtp/PHPMailerAutoload.php');

// Example usage:




function smtp_mailer($senderEmail, $to, $subject, $msg) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "surajdevelope@gmail.com"; // Replace with your Gmail email
    $mail->Password = "ivxy dlhm svvj dwmb";       // Replace with your Gmail password
    $mail->SetFrom("surajdevelope@gmail.com"); // Set your Gmail address as the "From" address
	$mail->addReplyTo($senderEmail); // Add the sender's email as the Reply-To address
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));

    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
?>
