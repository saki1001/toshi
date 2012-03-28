<?
$Get_Users_Session=mysql_query("select id from users where id='".$_SESSION['UsErId']."'");
if((!$_SESSION["UsErId"]) || (mysql_num_rows($Get_Users_Session)<=0))
{	
	$_SESSION["UsErId"]=='';
	header("location:login.php");
	exit;
}
?>
