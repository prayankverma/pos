<?php
// Retrieve form data
$name = $_POST['name'];
$fromemail = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// User Define
$toemail = "surajdevelope@gmail.com";

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

  <h2>Support Form Submission</h2>
  
  <table>
    <tr>
      <th>Field</th>
      <th>Value</th>
    </tr>
    <tr>
      <td>Name</td>
      <td>$name</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>$fromemail</td>
    </tr>
    <tr>
      <td>Subject</td>
      <td>$subject</td>
    </tr>
    
  </table>
  <br>
  <strong>Message:</strong>
  <p>$message</p>
</body>
</html>
";

// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

// Concatenate the "From" header
$headers .= "From: no-reply@thenimbusinsurance.com" . "\r\n";

$result = mail($toemail, $subject, $htmlMessage, $headers);

// Check the result and handle it as needed
if ($result) {
    echo "Email sent successfully!";
} else {
    echo "Email sending failed. Error: " . error_get_last()['message'];
}
?>
