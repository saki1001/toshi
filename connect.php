<?php
// ERROR REPORTING
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

session_start();
$_SESSION['UsErId'];
$_SESSION["ELXCartID"] = session_id();
include ("include/config.inc.php");
// include ("include/template_inheritance_helper.php");
include ("include/functions.php");
include ("include/functions2.php");
include ("include/prs_function.php");
include ("include/gtg_functions.php");
include_once("include/class.phpmailer.php");
include_once("include/class.smtp.php");
include_once("include/sendmail.php");
include_once("include/encryption.php");
// $db=mysql_connect($DBSERVER, $USERNAME, $PASSWORD) or die(mysql_error());

$db=mysql_connect($DBSERVER, $USERNAME, $PASSWORD);

if (!$db){

$output = 'Unable to connect to database.';
echo $output;

exit();
}
if (!mysql_set_charset('utf8', $db)){

$output = 'Unable to set database connection encoding.';
echo $output;

exit();
}
if (!mysql_select_db($DATABASENAME, $db)){

$output = 'Unable to locate database.';
echo $output;

exit();
}

// mysql_select_db($DATABASENAME,$db);
// $linkpath="http://".$_SERVER['HTTP_HOST']."/".$folder."/index.php";
?>
