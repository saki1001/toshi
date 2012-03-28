<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php"); 
$mlevel=3;

if($_GET["Did"])
{	
	$cid=$_GET["Did"];
	$dqry="delete from events where id=$cid";
	mysql_query($dqry);	
	
	$dqry="delete from events_pricelevel where 	eventid=$cid";
	mysql_query($dqry);	
	header("location:user_events.php?id=".$_REQUEST['id']."");
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
<script type="text/javascript" src="../js/flowplayer-3.2.6.min.js"></script>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE cellSpacing=10 cellPadding=0  border=0 width="98%" align="center">
	<TBODY>
		<TR>
		  <TD width="100%" class="form_back" height="25"><span class="form111"><? echo ucfirst(stripslashes($geti->firstname)." ".stripslashes($geti->lastname)); ?>'s Events</span></TD>
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
						  		<table width="100%"border="0" cellspacing="0" cellpadding="0">
									<?
										$GetTotalPictureQry="SELECT * FROM events WHERE userid='".trim($id)."' order by id desc";
										$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
										$TotGetTotalPicture=mysql_affected_rows();
										if($TotGetTotalPicture>0)
										{
											for($F=0;$F<$TotGetTotalPicture;$F++)
											{
												$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
												?>
													  <tr>
														<td align='left'  >
															<strong><? echo ucfirst(stripslashes($GetTotalPictureQryRow['name'])); ?></strong><br>
															<? echo ucfirst(stripslashes(GetName1("event_venues","name","id",$GetTotalPictureQryRow['venueid'])))." ( " .ucfirst(stripslashes(GetName1("event_venues","city","id",$GetTotalPictureQryRow['venueid']))).", ".ucfirst(stripslashes(GetName1("event_venues","state","id",$GetTotalPictureQryRow['venueid'])))." )"; ?>
														</td>
														<td align='center'  >
														<a href="#" title="Click to view detail" class="folder_linkn"  onClick="javascript:openWin('event_detail.php?id=<?=$GetTotalPictureQryRow['id'];?>', 'usersDetail<?=$GetTotalPictureQryRow['id'];?>', 500,1200, 'yes','yes');return false;" >View</a> | 
														<a href="#" title="Click to view detail" class="folder_linkn"  onClick="deleteconfirm('Are you sure you want to delete Event. \n','user_events.php?Did=<?php echo($GetTotalPictureQryRow['id']); ?>&id=<?php echo($_REQUEST['id']); ?>');">Delete</a>
														</td>
													  </tr>	
												<?
											}
										}
										else
										{
											echo "<tr><td>No Events Created.</td></tr>";
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