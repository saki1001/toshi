<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=6;
$Message="";
if($_REQUEST['VDid']>0)
{
	$Did=trim(mysql_real_escape_string($_REQUEST['VDid']));
	$delpuic=mysql_query("delete from events_videos where id='$Did' and eventid='".$_REQUEST['id']."'");
	header("location:add_event_step5.php?msg=Your video has been deleted successfully.&id=".$_REQUEST['id']."");			
	exit;
}
if($_REQUEST['PDid']>0)
{
	$Did=trim(mysql_real_escape_string($_REQUEST['PDid']));
	$delpuic=mysql_query("delete from events_pictures where id='$Did' and eventid='".$_REQUEST['id']."'");
	header("location:add_event_step5.php?msg=Your picture has been deleted successfully.&id=".$_REQUEST['id']."");			
	exit;
}

if($_REQUEST['id']==""){header("location:add_event_step1.php");exit;}

if($_REQUEST['Did']>0)
{
	$query1="Delete from events_timeslots where id='".trim($_REQUEST['Did'])."' and eventid='".$_REQUEST['id']."' ";
	$res=mysql_query($query1);
	header("location:add_event_step4.php?id=".$_REQUEST['id']."");
	exit;
}

if($_POST['HidRegUser']=="1")
{
	header("location:manage_events.php?msgs=1");			
	exit;
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from events where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
}
else
{
	$Buttitle="Add";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<link href="main.css" name=text/css rel=stylesheet />
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<script language=javascript src="body.js"></script>
<script language="Javascript" name="text/JavaScript" src="calendar.js"></script>
<script type="text/javascript" src="ajax_validation.js"></script>
<script type="text/javascript" src="../js/flowplayer-3.2.6.min.js"></script>
<table align="left" width="100%" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="75"><? include ("top.php"); ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table cellspacing="0" cellpadding="0" width="100%" border=0>
        <tbody >
          <tr>
            <td width="20%"  valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
            </td>
            <td width="80%" valign="top" align="center"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
                <tr>
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Photos &amp; Videos </td>
                </tr>
				<tr>
                  <td height="35"><input type="button" name="Step1" value="Step 1" onClick="window.location.href='add_event.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step2" value="Price Levels" onClick="window.location.href='add_event_step2.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step3" value="Delivery Methods" onClick="window.location.href='add_event_step3.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />  <input type="button" name="Step4" value="Time Slots" onClick="window.location.href='add_event_step4.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />   <input type="button" name="Step5" value="Photos & Videos" onClick="window.location.href='add_event_step5.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /></td>
                </tr>
                <tr>
                  <td height="222" class="formbg" valign="top">
				  	<table width="100%" border="0" cellspacing="0" cellpadding="" class="t-b">
					  <tr><td align="left" colspan="5"><input type="button" class="bttn-a"  onClick="javascript:window.open('uploadpics.php?id=<? echo $_REQUEST['id']?>','','width=1000,height=400,resizable=1,scrollbars=1');return false;"  value="Upload Photos"></td></tr>
					  <tr>
						  <td align="left">
						  <table  border="0" cellspacing="3" cellpadding="2" style="PADDING-RIGHT: 0px;PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; BORDER-LEFT: #cccccc 0px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #cccccc 0px solid">
								<?
									$GetTotalPictureQry="SELECT * FROM events_pictures WHERE eventid='".trim($_REQUEST['id'])."' order by id desc";
									$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
									$TotGetTotalPicture=mysql_affected_rows();
									if($TotGetTotalPicture>0)
									{
										for($F=0;$F<$TotGetTotalPicture;$F++)
										{
											$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
											if($F%5==0 && $F!=0){echo "</tr><tr><td height='25' colspan='5'>&nbsp;</td></tr><tr>";}
											?>
											<td width="145" align="center" height="155" valign="top" >
												<table border='0' cellpadding='0' cellspacing='0'  width="145" style="background-color:#999999;" >
												  <tr>
													<td align='center' width="145" height="135"><a href="#" onClick="javascript:window.open('<? echo "../Events/".$GetTotalPictureQryRow['picture'];?>', '','width=650,height=500');return false;"><img src="<? echo "../Events/thumb/".$GetTotalPictureQryRow['picture'];?>"  border="0" /></a></td>
												  </tr>
												  <? if(trim($GetTotalPictureQryRow['caption'])!="") { ?>
												  <tr>
													<td align='center' style="font-size:11px;color:#FFFFFF;" ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
												  </tr>	
												  <? } ?>
												  <tr>
													<td align='center' height="25" valign="bottom" ><a  href='#' class="button1" style="float:none;font-size:11px;" onClick="javascript:document.location.href='add_event_step5.php?PDid=<? echo $GetTotalPictureQryRow['id']; ?>&id=<? echo $_REQUEST['id']; ?>';">Delete</a></td>
												  </tr>	
												</table>
											  </td>
											<?
										}
									}
									else
									{
										echo "<tr><td>No Photos.</td></tr>";
									}
								?>
								</table>
						  </td>
					  </tr>
					  
					  <tr><td align="left" colspan="5"><input type="button" class="bttn-a"  onClick="javascript:window.open('uploadvideo.php?id=<? echo $_REQUEST['id']?>','','width=1000,height=400,resizable=1,scrollbars=1');return false;"  value="Upload Videos"></td></tr>
					  <tr>
						  <td align="left">
						  <table  border="0" cellspacing="3" cellpadding="0" style="PADDING-RIGHT: 0px;PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; BORDER-LEFT: #cccccc 0px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #cccccc 0px solid">
								<?
									$GetTotalPictureQry="SELECT * FROM events_videos WHERE eventid='".trim($_REQUEST['id'])."' order by id desc";
									$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
									$TotGetTotalPicture=mysql_affected_rows();
									if($TotGetTotalPicture>0)
									{
										for($F=0;$F<$TotGetTotalPicture;$F++)
										{
											$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
											if($F%3==0 && $F!=0){echo "</tr><tr><td height='25' colspan='2'>&nbsp;</td></tr><tr>";}
											?>
											<td   align="center" valign="top" >
												<table border='0' cellpadding='0' cellspacing='0'  width="250" style="background-color:#999999;" >
												  <tr>
													<td align='center'  >
													<? if($GetTotalPictureQryRow['video']!=""){?>
														<? echo str_replace("<iframe","<iframe style='width:220px;height:175px;'",stripslashes($GetTotalPictureQryRow['video'])); ?>
													<? }else if($GetTotalPictureQryRow['videofile']!=""){?>	
														<div  align="center">
														<a  href="<?=$SITE_URL;?>/Videos/<?=stripslashes($GetTotalPictureQryRow['videofile']);?>" style="display:block;width:220px;height:175px"  id="player"></a> 
														<script language="javascript1.1">flowplayer("player", "flowplayer-3.2.7.swf");</script>
														</div>
													<? } ?>	
													</td>
												  </tr>	
												  <tr>
													<td align='center' style="color:#FFFFFF;"  ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
												  </tr>	
												  <tr>
													<td align='center' height="25" valign="bottom" ><a  href='#' class="button1" style="float:none;font-size:11px;" onClick="javascript:document.location.href='add_event_step5.php?VDid=<? echo $GetTotalPictureQryRow['id']; ?>&id=<? echo $_REQUEST['id']; ?>';">Delete</a></td>
												  </tr>	
												</table>
											  </td>
											<?
										}
									}
									else
									{
										echo "<tr><td>No Videos.</td></tr>";
									}
								?>
								</table>
						  </td>
					  </tr>
					  
					 	<tr>
							<td style="padding:5px;" colspan="5">
							<form name="AddeventForm2" id="AddeventForm2" enctype="multipart/form-data" method="post">
							<input type="hidden" name="HidRegUser" id="HidRegUser" value="" />
								<input type="button" class="bttn-a"  onClick="return valid();" value="Continue & Complete"  style="background-color:#FF0000;">
							</form>
							</td>
						</tr>
					 
					</table></td>
                </tr>
              </table></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
</table>
<script language="javascript" type="text/javascript">
function valid()
{
	form=document.AddeventForm2;
	document.AddeventForm2.HidRegUser.value='1';
	document.AddeventForm2.submit();
	return  true;    
}
</script>
</body>
</html>