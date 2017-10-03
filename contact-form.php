<?php


//define variables and set to empty values
$name = $email = $subject = $comments = "";


//Post the data from the field entries

$name = validate_input 	($_POST['name']);
$email = validate_input	($_POST['email']);
$subject = validate_input ($_POST['subject']);
$comments = validate_input($_POST['comments']);


function validate_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


//Compose a HTML email message


$email_from = "Conways Station <mail@conwaystation.com.au>";
$email_subject = "Conways Station Website Form Submission";
$mailaddress = 'mail.conwaystation.com.au';
$date = date("d/m/Y");


$message = 
"<html>

<h5 style='width: 450px; font-size: 12pt;'>Conways Station Website Form Entries</h5>

<p><strong>Date:</strong></p> $date\r\n 
<p><strong>Subject:</strong></p>$name\r\n
<p><strong>Email:</strong></p>$email\r\n 
<p><strong>Subject:</strong></p>$subject\r\n 
<p><strong>Your Message:</strong></p>$comments\r\n 

</html>

";


//Content type header for HTML Mail
$headers .= 'MIME-Version: 1.0' . "\r\n";  
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  

$headers .= "From: $email_from \r\n"; 
       "X-Mailer: PHP/" . phpversion();



//Send mail

$to = "andrewgnew@gmail.com, doris@viplusdairy.com";

mail($to, $email_subject, $message, $headers);


//Redirect to thank you page
header('Location: https://www.conwaystation.com.au/thankyou'); 


?>

