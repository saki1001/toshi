<?php
  include_once("admin.config.inc.php");
  include("admin.cookie.php");
  include("connect.php");
  //include("fckeditor/fckeditor.php") ;

	//$mlevel = 5;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<title> <?php echo $ADMIN_MAIN_SITE_NAME; ?></title>
<LINK 
href="main.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>

<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="75"><? include ("top.php"); ?></td>
  </tr>
</table></td></tr>
<tr><td>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY >
  
  <tr>
   <td width="20%"  valign="top" class="rightbdr" >
   	<? include("inner_left_admin.php"); ?>
	</td>
	<td width="80%" valign="top" align="center">
		<TABLE width="100%"  border=0 cellpadding="2" cellspacing="2">
		<TR>
			<TD height="35" class=form111>Welcome Administrator</TD>
		</TR>
		<tr>
		<td height="350" class="formbg" valign="top">
		
</td></tr>
</TABLE></td></tr></TBODY></TABLE></td></tr></table></BODY></HTML>