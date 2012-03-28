<? 
	include("connect.php");
	
	if(isset($_GET['MU']))
	{
		$MU=$_GET['MU'];
		$MId=$_GET['MId'];
		$Uid=$_GET['Uid'];
		
		///// Update Music Rank /////
		$upsql=mysql_query("UPDATE community_usermusic SET rank=rank+1, todaysplay= todaysplay +1  WHERE id='$MId' AND userid!='".$_SESSION["UsErIdSeSsIoN"]."'");
		
		///// Update User Rank /////
		$upsql=mysql_query("UPDATE community_users SET music_rank=music_rank+1 , todaysplay= todaysplay +1 WHERE id='$Uid' AND id!='".$_SESSION["UsErIdSeSsIoN"]."'");
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<LINK href="<? echo  prdCSSPATH; ?>styles.css" type=text/css rel=stylesheet>
<LINK href="<? echo  prdCSSPATH; ?>prdCss.css" type=text/css rel=stylesheet>
<head>
<title><? echo prdWEBSITETITLE?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<table border="0" cellpadding="5" cellspacing="10" width="100%" align="center">
	<TR>
		<TD height="100" align="center">
			<embed autostart="true" src="<? echo $MU;?>"> 
		</TD>
	</TR>
	<TR>
		<TD align="right"><a href="javascript:window.close()" class="mainmenu">Close</a></TD>
	</TR>
</table>
</body>
</html>
