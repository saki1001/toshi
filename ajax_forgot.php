<?php include("connect.php"); 

$username = $_POST['email'];

$query1="select * from users where email='".addslashes($_POST['email'])."'";
	$res=mysql_query($query1);
	$tot=mysql_affected_rows();
	if($tot>0)
	{
		$Row=mysql_fetch_object($res);
		$password=stripslashes($Row->password);	
		$firstname=stripslashes($Row->firstname);	
		
		$toemail=addslashes($_POST['email']);
		
		$subject1="Your Password Request from ".ucfirst($SITE_NAME)."";
		$from1=$ADMIN_MAIL;
		$mailcontent1="
		<html>
			<body>
				<table cellpadding=\"3\" cellspacing=\"3\">
					<tr>
						<Td align=\"left\" colspan=\"2\">Dear $firstname,</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\"></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">This email is being sent to you in response to your request for a forgotten password.</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\"></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Email Address: ".$_POST['email']."</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Your password is: ".$password."</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\"></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Use this information to access your account at the ".ucfirst($SITE_NAME)." website at: <a href='$SITE_URL' target='_blank'>$SITE_URL</a></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\"></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Thank you.</td>
					</tr>
			</table>
			</body>
		</html>";


		//echo $mailcontent1;exit;
		if($_SERVER['HTTP_HOST']!="plus")
			HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);			
		echo "Your password has been emailed to ".($_POST['email']).".";		
	}
	else
	{
		 echo "Sorry, we can't find '".$_POST["email"]."' in our records. <br />Try entering your email address again.";			
	}

?> 