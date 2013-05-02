<?php
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
			$email = $_POST['e-mail'];
			$descr = $_POST['description'];

			echo "Firstname is $firstName";
			echo "Lastname is $lastName";
			echo "Email is $email";
			echo "Description is $descr";




			
}



?>