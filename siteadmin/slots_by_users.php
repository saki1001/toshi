<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php"); 
$mlevel=3;

if($_REQUEST['Did']>0)
{
	$Did=trim(mysql_real_escape_string($_REQUEST['Did']));
	$delpuic=mysql_query("delete from events_timeslots_selected where id='$Did'");
	header("location:slots_by_users.php?msg=Slot slection has been deleted successfully.&id=".$_REQUEST['id']."");			
	exit;
}

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
		  <TD width="100%" class="form_back" height="25"><span class="form111">Slot Selected By Users</span></TD>
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
						  		<table width="100%" border="0" cellspacing="0" cellpadding="" class="t-b">
								  <?
									$SelPricelevelQry="SELECT * FROM events_timeslots_selected WHERE timeslotid='".$_REQUEST['id']."'";
									$SelPricelevelQryRs=mysql_query($SelPricelevelQry);
									$TOtSelPricelevel=mysql_affected_rows();
									if($TOtSelPricelevel>0)
									{
										for($VV=0;$VV<$TOtSelPricelevel;$VV++)
										{
											$SelPricelevelQryRow=mysql_fetch_array($SelPricelevelQryRs);
											if($VV==0)
											{
								  ?>
												  <tr>
													<td width="46%" style="padding:5px;"><strong>Time Slot </strong></td>
													<td width="28%" style="padding:5px;"><strong>Status</strong></td>
													<td width="28%" style="padding:5px;"><strong>User</strong></td>
													<td width="26%" style="padding:5px;"><strong>Manage</strong></td>
												  </tr>
										 <? } ?>
												<tr>
													<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['slot_hour']);?>:<? echo stripslashes($SelPricelevelQryRow['slot_minute']);?> <? echo stripslashes($SelPricelevelQryRow['slot_ampm']);?> | <? echo stripslashes($SelPricelevelQryRow['slot_duration']);?> Minutes</td>
													<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['status']);?></td>
													<td style="padding:5px;"><a href="#" title="Click to view detail" class="folder_linkn" onClick="javascript:openWin('../user_detail.php?id=<?=$SelPricelevelQryRow['userid'];?>', 'usersDetail<?=$SelPricelevelQryRow['userid'];?>', 1024,1200, 'yes','yes');"><? echo stripslashes(GetName1("users","firstname","id",$SelPricelevelQryRow['userid']));?> <? echo stripslashes(GetName1("users","lastname","id",$SelPricelevelQryRow['userid']));?></a></td>
													<td style="padding:5px;">
													<input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete this time slot selection. \n','slots_by_users.php?Did=<? echo stripslashes($SelPricelevelQryRow['id']);?>&id=<? echo stripslashes($_REQUEST['id']);?>');" value="Delete" class="bttn-s">
													</td>
												  </tr>		  
									<? } ?>  
								 <? } else{?>	  
									<tr>
										<td style="padding:5px;" class="a">
											No time slot selection by any users.
										</td>
									  </tr>
								 <? } ?>
								 
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