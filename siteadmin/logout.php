<?php
	ini_set('session.use_trans_sid', true);
	session_start();
  	setcookie("UsErOfAdMiN","");
  	$UsErOfAdMiN="";
  	setcookie("UsErTyPe","");
  	$UsErTyPe="";
	setcookie("UsErIdAdMiN","");
  	$UsErIdAdMiN="";
  
  
	session_unregister("CartId");
	$CartId="";
	session_unregister("MCartId");
	$MCartId="";
	session_unregister("UsErOfAdMiN");
	session_unregister("UsErTyPe");
	session_unregister("UsErIdAdMiN");
	
 
  header("Location:index.php");
?>



