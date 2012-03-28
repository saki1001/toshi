<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php"); 
$mlevel=3;

if($_REQUEST['Did']>0)
{
	$Did=trim(mysql_real_escape_string($_REQUEST['Did']));
	$delpuic=mysql_query("delete from users_pictures where id='$Did'  ");
	header("location:user_pictures.php?msg=Your picture has been deleted successfully.&id=".$_REQUEST['id']."");			
	exit;
}

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
		  <TD width="100%" class="form_back" height="25"><span class="form111"><? echo ucfirst(stripslashes($geti->firstname)." ".stripslashes($geti->lastname)); ?>'s Pictures</span></TD>
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
						  <TD align="center" colspan="2">
						  		<table width="100%"border="0" cellspacing="5" cellpadding="0">
												<?
													$GetTotalPictureQry="SELECT * FROM users_pictures WHERE userid='".trim($id)."' order by id desc";
													$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
													$TotGetTotalPicture=mysql_affected_rows();
													if($TotGetTotalPicture>0)
													{
														for($F=0;$F<$TotGetTotalPicture;$F++)
														{
															$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
															if($F%5==0){echo "</tr><tr><td height='25'>&nbsp;</td></tr><tr>";}
															?>
															<td width="145" height="155" valign="top" >
																<table border='0' cellpadding='0' cellspacing='0'  width="145" style="background-color:#999999;" >
																  <tr>
																	<td align='center' width="145" height="135"><img src="<? echo "../Users/thumb/".$GetTotalPictureQryRow['picture'];?>"  border="0" /></td>
																  </tr>
																  <? if(trim($GetTotalPictureQryRow['caption'])!="") { ?>
																  <tr>
																	<td align='center' style="font-size:11px;color:#FFFFFF;" ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
																  </tr>	
																  <? } ?>
																  <tr>
																	<td align='center' height="25" valign="bottom" ><a  href='#' class="button1" style="float:none;font-size:11px;" onClick="javascript:document.location.href='user_pictures.php?Did=<? echo $GetTotalPictureQryRow['id']; ?>&id=<? echo $_REQUEST['id']; ?>';">Delete</a></td>
																  </tr>	
																</table>
															  </td>
															<?
														}
													}
													else
													{
														echo "<tr><td>No Pictures</td></tr>";
													}
												?>
												</table>
						  </td>
				 	  	</TR>
											
					</TABLE>
				</FORM></TD>
		</TR>		
	</TBODY>
</TABLE>
</BODY>
</HTML>