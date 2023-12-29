<?php
$name="Suraj Agrawal";
$email="opsurajagrawal@gmail.com";
$mobile="8687881101";
$password="Suraj@5656";
$subject="Congratulations! Your account has been created.";
// function smtp_mailer($name, $email, $mobile, $password) 
// {
    
    // Construct HTML message with a table and a paragraph
    $htmlMessage = "
<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <p>Dear <strong>$name,</strong></p>

  <p>We are excited to inform you that your account has been successfully created.</p>

  <p>Access Details:<p>

  <table>
    <tr>
      <th>Field</th>
      <th>Value</th>
    </tr>
    
    <tr>
      <td>Email</td>
      <td>$email</td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td>$mobile</td>
    </tr>
    <tr>
      <td>password</td>
      <td>$password</td>
    </tr>

    <tr>
      <td>Link</td>
      <td><a href='https://pos.thenimbusinsurance.com/'>https://pos.thenimbusinsurance.com/</a></td>
    </tr>
    
  </table>
  <br>
  <p>
     Please use the provided credentials to log in to your account and explore the exciting features and benefits that await you.
     If you have any questions or need assistance, feel free to reach out to our support team at support team.
    <p><br>

    <p>Thank you for being a valued member of our community. We look forward to serving you better!</p>
  </p>
    <br>  
    Best regards,<br>
    <strong>Nimbus Insurance Team</strong>
</body>
</html>
";

        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        
        // Concatenate the "From" header
        $headers .= "From: no-reply@thenimbusinsurance.com" . "\r\n";
        
        $result = mail($email, $subject, $htmlMessage, $headers);
        
        if (!$mail->Send()) {
                // return $mail->ErrorInfo;
                echo "Error";
            } else {
                // return 'Sent';
                 echo "send";
            }
// }
?>
