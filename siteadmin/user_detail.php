<?php
	include_once("admin.config.inc.php");
	include("admin.cookie.php");
	include("connect.php"); 
	$mlevel=3;
	$id=$_GET["id"];
	$seli="select * from users where id='$id'";
	$runi=mysql_query($seli);
	$geti=mysql_fetch_object($runi);
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<title> <?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<HEAD>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="demo.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>
 <script language="javascript" type="text/javascript">
 	function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
 </script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
</HEAD>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE cellSpacing=10 cellPadding=0  border=0 width="98%" align="center">
	<TBODY>
		<TR>
		  <TD width="100%" class="form_back" height="25"><span class="form111"><? echo ucfirst(stripslashes($geti->firstname)." ".stripslashes($geti->lastname)); ?>'s Details</span></TD>
		</TR>
		<TR><TD background="images/vdots.gif"><IMG height=1 src="images/spacer.gif" width=1 border=0></TD></TR>
		<TR>
			<TD>			  
				<FORM name="form2" action="#" method="post" enctype="multipart/form-data">        
					<TABLE width="100%" border=0 cellSpacing=0 cellpadding="0" class="t-b">
						<TR> 
						  <TD colspan="2" height="30" class="form_back" align="right"><a href="#" onClick="javascript:window.close();">Close</a></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Email:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->email); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Password:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->password); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Information</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>First Name:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->firstname); ?>&nbsp;</td>
				 	  	</TR>						
						<tr>
						  <TD width="32%" align="right"><strong>Last Name:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->lastname); ?>&nbsp;</td>
				 	  	</TR> 	
						<tr>
						  <TD width="32%" align="right"><strong>DOB:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->dob); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Gender:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->gender); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Height:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->height); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Weight:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->weight); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Genre:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->genre); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Label:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->labeltype); ?>&nbsp;</td>
				 	  	</TR>
											
					</TABLE>
				</FORM></TD>
		</TR>		
	</TBODY>
</TABLE>
</BODY>
</HTML>