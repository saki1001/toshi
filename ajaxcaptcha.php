<?php 
session_start();
  
if( isset($_POST['recaptcha_response_field2'])) 
{
   if( $_SESSION['security_code'] == $_POST['recaptcha_response_field2'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
		//echo 'Thank you. Your message said "'.$_POST['message'].'"';
		$error1="";
		unset($_SESSION['security_code']);
   } else {
		// Insert your code for showing an error message here
		//echo 'Sorry, you have provided an invalid security code';
		$error1="notvalid";
   }
} 
echo $error1;
?> 