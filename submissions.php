
<?php

//initalizations
require("lib/phpMailer/class.phpmailer.php");

define('TO', 'eddiemasseyiii@gmail.com');

set_time_limit(0);

if($_POST['formSubmit'] == "Submit")
{			
			//Validate the form


			$errorMessage = ""; //string for list of errors
			

			if(empty($_POST['firstname']))
			{
				$errorMessage .= "<li>No first name provided.</li>";
			}			
			
			if(empty($_POST['lastname']))
			{
				$errorMessage .= "<li>No last name provided.</li>";
			}

			if(empty($_POST['e-mail']))
			{
				$errorMessage .= "<li>No e-mail address provided.</li>";
			}

			if(!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL))
			{						
				$errorMessage .= "<li>The email address is invalid. Ex: me@domain.com</li>";
			}else
			{
				//DO NOTHING
			}

			if(empty($_POST['description']))
			{
			$errorMessage .= "<li>No description provided.</li>";
			}

			if(!empty($errorMessage)) 
			  {			
			      echo("<p>There was an error with your form:</p>\n");
			      echo("<ul>" . $errorMessage . "</ul>\n");
			  } 			      

			//Parse data
			$firstName = $_POST['firstname'];
			$lastName = $_POST['lastname'];
			$fullName = $firstName . $lastName;
			$email = $_POST['e-mail'];
			$request = $_POST['description'];
			$subject = "New GRID Submssion";
			sendEmail(TO, $email, $fullName, $subject, $request);

}

/*
*@desc Sends the form data
*@param form submitter email
*@parma form submitter name
*@param subject
*@param message body
*/ 

function sendEmail($to, $from, $fromName, $subject, $body)
{
	/* Get user name 
	and password */

	$lines = file("login"); //read the file called login into an array	
	$userName = $lines[0];
	$password = $lines[1];

	 global $error;
	 $mail = new PHPMailer();  // create a new object
	 $mail->IsSMTP(); // enable SMTP
	 $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	 $mail->SMTPAuth = true;  // authentication enabled
	 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	 $mail->Host = 'smtp.gmail.com';
	 $mail->Port = 465; 
	 $mail->Username = $userName;  
	 $mail->Password = $password;           
	 $mail->SetFrom($from, $fromName);
	 $mail->Subject = $subject;
	 $mail->Body = $body;
	 $mail->AddAddress($to);
	 if(!$mail->Send()) {
	 		    $error = 'Mail error: '.$mail->ErrorInfo; 
			    	   return false;
				   } else {
				     $error = 'Message sent!';
				     	    return true;
					    }
}

	




?>