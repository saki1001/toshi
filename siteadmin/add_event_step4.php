<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=6;
$Message="";

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
	header("location:add_event_step5.php?id=".$_REQUEST['id']."");			
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Time Slots </td>
                </tr>
				<tr>
                  <td height="35"><input type="button" name="Step1" value="Step 1" onClick="window.location.href='add_event.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step2" value="Price Levels" onClick="window.location.href='add_event_step2.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step3" value="Delivery Methods" onClick="window.location.href='add_event_step3.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />  <input type="button" name="Step4" value="Time Slots" onClick="window.location.href='add_event_step4.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />   <input type="button" name="Step5" value="Photos & Videos" onClick="window.location.href='add_event_step5.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /></td>
                </tr>
                <tr>
                  <td height="222" class="formbg" valign="top">
				  	<table width="100%" border="0" cellspacing="0" cellpadding="" class="t-b">
					  <tr><td align="right" colspan="5"><input type="button" class="bttn-a"  onClick="javascript:window.open('addtimeslot.php?id=<? echo $_REQUEST['id']?>','','width=500,height=200');return false;"  value="Add a time slot"></td></tr>
					  <?
						$SelPricelevelQry="SELECT * FROM events_timeslots WHERE eventid='".$_REQUEST['id']."'";
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
										<td width="26%" style="padding:5px;"><strong>Manage</strong></td>
									  </tr>
							 <? } ?>
									<tr>
										<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['slot_hour']);?>:<? echo stripslashes($SelPricelevelQryRow['slot_minute']);?> <? echo stripslashes($SelPricelevelQryRow['slot_ampm']);?> | <? echo stripslashes($SelPricelevelQryRow['slot_duration']);?> Minutes</td>
										<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['status']);?></td>
										<td style="padding:5px;">
										<?
											$SelPricelevelQry2="SELECT * FROM events_timeslots_selected WHERE 	timeslotid='".$SelPricelevelQryRow['id']."'";
											$SelPricelevelQryRs2=mysql_query($SelPricelevelQry2);
											$TOtSelPriceleve2=mysql_affected_rows();
										?>
										<input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete this time slot. \n','add_event_step4.php?Did=<? echo stripslashes($SelPricelevelQryRow['id']);?>&id=<? echo stripslashes($_REQUEST['id']);?>');" value="Delete" class="bttn-s">
										<input name="button2" type="button" onClick="javascript:openWin('slots_by_users.php?id=<?=$SelPricelevelQryRow['id'];?>', 'slots<?=$SelPricelevelQryRow['id'];?>', 800,500, 'yes','yes');" value="Slot Selected By User [<? echo $TOtSelPriceleve2;?>]" class="bttn-s">
										</td>
									  </tr>		  
						<? } ?>  
					 <? } else{?>	  
						<tr>
							<td style="padding:5px;" class="a">
								You haven't added any time slots yet. <input type="button" class="bttn-a"  onClick="javascript:window.open('addtimeslot.php?id=<? echo $_REQUEST['id']?>','','width=500,height=200');return false;"  value="Add a time slot">
							</td>
						  </tr>
					 <? } ?>
					 
						<tr>
							<td style="padding:5px;" colspan="5">
							<form name="AddeventForm2" id="AddeventForm2" enctype="multipart/form-data" method="post">
							<input type="hidden" name="HidRegUser" id="HidRegUser" value="" />
								<input type="button" class="bttn-a"  onClick="return valid();" value="Continue" >
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