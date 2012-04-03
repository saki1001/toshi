<?php 
session_start();
  
if( isset($_POST['captchaVal'])) 
{
   if( $_SESSION['security_code'] == $_POST['captchaVal'] && !empty($_SESSION['security_code'] ) ) {
        // Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
        //echo 'Thank you. Your message said "'.$_POST['message'].'"';
        header('Content-type: application/json');
        echo '{"status": "SUCCESS"}';
        unset($_SESSION['security_code']);
   } else {
        // Insert your code for showing an error message here
        //echo 'Sorry, you have provided an invalid security code';
        header('Content-type: application/json');
        echo '{"status": "INVALID"}';
   }
} 
?> 