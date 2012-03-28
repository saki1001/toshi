<?php 
include("connect.php"); 
if($_GET['email']!="")
{
	$query1subs="select * from subscriber where email='".addslashes($_GET['email'])."'";
	$ressubs=mysql_query($query1subs);
	$totsubs=mysql_affected_rows();
	if($totsubs>0)
	{
		//echo 'Your email address is already subscribed.';
		echo 3;
	}
	else
	{
		$AddUserQry="INSERT INTO subscriber SET email='".addslashes($_GET['email'])."',sdate=now()";	
		mysql_query($AddUserQry);
		//echo 'Your email address has been subscribed.';
		echo 2;
	}
}
else
{
	//echo 'Please enter email address.';
	echo 1;
}
?> 