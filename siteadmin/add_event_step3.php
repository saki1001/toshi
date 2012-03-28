<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=6;
$Message="";

if($_REQUEST['id']==""){header("location:add_event_step1.php");exit;}

if($_POST['HidRegUser']=="1")
{
		$delivery_mobile_startdate=mdy_to_ymd($_POST['delivery_mobile_startdate']);
		$delivery_mobile_enddate=mdy_to_ymd($_POST['delivery_mobile_enddate']);
		$delivery_printathome_startdate=mdy_to_ymd($_POST['delivery_printathome_startdate']);
		$delivery_printathome_enddate=mdy_to_ymd($_POST['delivery_printathome_enddate']);
		$delivery_willcall_startdate=mdy_to_ymd($_POST['delivery_willcall_startdate']);
		$delivery_willcall_enddate=mdy_to_ymd($_POST['delivery_willcall_enddate']);
		
		$AddUserQry="UPDATE events SET
						delivery_mobile_type='".addslashes($_POST['delivery_mobile_type'])."',						
						delivery_mobile_extrainfo='".addslashes($_POST['delivery_mobile_extrainfo'])."',						
						delivery_mobile_startdate='".addslashes($delivery_mobile_startdate)."',
						delivery_mobile_startdate_hour='".addslashes($_POST['delivery_mobile_startdate_hour'])."',
						delivery_mobile_startdate_minute='".addslashes($_POST['delivery_mobile_startdate_minute'])."',
						delivery_mobile_startdate_ampm='".addslashes($_POST['delivery_mobile_startdate_ampm'])."',
						delivery_mobile_enddate='".addslashes($delivery_mobile_enddate)."',
						delivery_mobile_enddate_hour='".addslashes($_POST['delivery_mobile_enddate_hour'])."',
						delivery_mobile_enddate_minute='".addslashes($_POST['delivery_mobile_enddate_minute'])."',
						delivery_mobile_enddate_ampm='".addslashes($_POST['delivery_mobile_enddate_ampm'])."',
						delivery_printathome_type='".addslashes($_POST['delivery_printathome_type'])."',
						delivery_printathome_extrainfo='".addslashes($_POST['delivery_printathome_extrainfo'])."',
						delivery_printathome_startdate='".addslashes($delivery_printathome_startdate)."',
						delivery_printathome_startdate_hour='".addslashes($_POST['delivery_printathome_startdate_hour'])."',
						delivery_printathome_startdate_minute='".addslashes($_POST['delivery_printathome_startdate_minute'])."',
						delivery_printathome_startdate_ampm='".addslashes($_POST['delivery_printathome_startdate_ampm'])."',
						delivery_printathome_enddate='".addslashes($delivery_printathome_enddate)."',
						delivery_printathome_enddate_hour='".addslashes($_POST['delivery_printathome_enddate_hour'])."',
						delivery_printathome_enddate_minute='".addslashes($_POST['delivery_printathome_enddate_minute'])."',
						delivery_printathome_enddate_ampm='".addslashes($_POST['delivery_printathome_enddate_ampm'])."',
						delivery_willcall_type='".addslashes($_POST['delivery_willcall_type'])."',
						delivery_willcall_extrainfo='".addslashes($_POST['delivery_willcall_extrainfo'])."',
						delivery_willcall_startdate='".addslashes($delivery_willcall_startdate)."',
						delivery_willcall_startdate_hour='".addslashes($_POST['delivery_willcall_startdate_hour'])."',
						delivery_willcall_startdate_minute='".addslashes($_POST['delivery_willcall_startdate_minute'])."',
						delivery_willcall_startdate_ampm='".addslashes($_POST['delivery_willcall_startdate_ampm'])."',
						delivery_willcall_enddate='".addslashes($delivery_willcall_enddate)."',
						delivery_willcall_enddate_hour='".addslashes($_POST['delivery_willcall_enddate_hour'])."',
						delivery_willcall_enddate_minute='".addslashes($_POST['delivery_willcall_enddate_minute'])."',
						delivery_willcall_enddate_ampm='".addslashes($_POST['delivery_willcall_enddate_ampm'])."',
						donations_enable='".addslashes($_POST['donations_enable'])."',
						donations_name='".addslashes($_POST['donations_name'])."',
						customfee_enable='".addslashes($_POST['customfee_enable'])."',
						customfee_enable_nameoffee='".addslashes($_POST['customfee_enable_nameoffee'])."',
						customfee_enable_type='".addslashes($_POST['customfee_enable_type'])."',
						customfee_enable_amount='".addslashes($_POST['customfee_enable_amount'])."',
						customfee_enable_applyfee='".addslashes($_POST['customfee_enable_applyfee'])."',
						additional_onlineservicefee='".addslashes($_POST['additional_onlineservicefee'])."',
						additional_boservicefee='".addslashes($_POST['additional_boservicefee'])."',
						additional_ticketnote='".addslashes($_POST['additional_ticketnote'])."',
						additional_ticket_tranlimit='".addslashes($_POST['additional_ticket_tranlimit'])."',
						additional_checkouttimelimit='".addslashes($_POST['additional_checkouttimelimit'])."',
						additional_privateevent='".addslashes($_POST['additional_privateevent'])."' where id='".$_REQUEST['id']."'";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		header("location:add_event_step4.php?id=".trim($_REQUEST['id'])."");			
		exit;
}

$query1="select * from events where id='".trim($_REQUEST['id'])."' ";
$res=mysql_query($query1);
$tot=mysql_affected_rows();
if($tot>0)
{
	$Row=mysql_fetch_array($res);
}
else
{
	header("location:add_event.php");
	exit;
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
<link rel="stylesheet" href="dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
<script type="text/javascript" src="dhtmlgoodies_calendar.js?random=20060118"></script>
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Options</td>
                </tr>
				<tr>
                  <td height="35"><input type="button" name="Step1" value="Step 1" onClick="window.location.href='add_event.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step2" value="Price Levels" onClick="window.location.href='add_event_step2.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step3" value="Delivery Methods" onClick="window.location.href='add_event_step3.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />  <input type="button" name="Step4" value="Time Slots" onClick="window.location.href='add_event_step4.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />   <input type="button" name="Step5" value="Photos & Videos" onClick="window.location.href='add_event_step5.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /></td>
                </tr>
                <tr>
                  <td height="222" class="formbg" valign="top">
				  	<form id="AddeventForm" name="AddeventForm" enctype="multipart/form-data" method="post">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-b">
						  <tr><td height="25" colspan="4" align="left" valign="middle" class="blue"><strong>Delivery Methods</strong></td></tr>
						  <tr>
								<td align="left" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="16%" align="left" valign="top">Mobile</td>
										<td width="84%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="left">
												<input type="radio" name="delivery_mobile_type" id="delivery_mobile_type1" value="Always Available" <? if($Row['delivery_mobile_type']=="Always Available" || $Row['delivery_mobile_type']==""){?>checked="checked"<? } ?> onClick="document.getElementById('delivery_mobile_startdate_ID').style.display='none';"><label for="delivery_mobile_type1">Always Available</label>&nbsp;&nbsp;
												<input type="radio" name="delivery_mobile_type" id="delivery_mobile_type2" value="Never Available" <? if($Row['delivery_mobile_type']=="Never Available"){?>checked="checked"<? } ?> onClick="document.getElementById('delivery_mobile_startdate_ID').style.display='none';"><label for="delivery_mobile_type2">Never Available</label>&nbsp;&nbsp;
												<input type="radio" name="delivery_mobile_type" id="delivery_mobile_type3" value="Set Dates" <? if($Row['delivery_mobile_type']=="Set Dates"){?>checked="checked"<? } ?> onClick="document.getElementById('delivery_mobile_startdate_ID').style.display='inline';"><label for="delivery_mobile_type3">Set Dates</label></td>
											  </tr>
											  <tr>
												<td align="left" nowrap="nowrap"><a href="#" style="font-size:11px;color:#990099;padding:0px;text-align:left;margin:0px;" onClick="document.getElementById('delivery_mobile_extrainfo_ID').style.display='inline';return false;" >ADD A DESCRIPTION</a></td>
											  </tr>
											  <tr>
												<td align="left" id="delivery_mobile_extrainfo_ID" <? if($Row['delivery_mobile_extrainfo']==""){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="21%" align="left">Extra Info</td>
														<td width="79%" align="left"><textarea name="delivery_mobile_extrainfo" id="delivery_mobile_extrainfo" style="width:250px;"><? echo stripslashes($Row['delivery_mobile_extrainfo']);?></textarea></td>
													  </tr>
													</table>
												</td>
											  </tr>
											  <tr>
												<td align="left" id="delivery_mobile_startdate_ID" <? if($Row['delivery_mobile_type']!="Set Dates"){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="21%" align="left">Enable On</td>
														<td width="79%" align="left"><? if($Row['delivery_mobile_startdate']!='' && $Row['delivery_mobile_startdate']!='0000-00-00'){$delivery_mobile_startdate=ymd_to_mdy($Row['delivery_mobile_startdate']);}else{$delivery_mobile_startdate='';}?>
																<input type="text" class="solidinput" name="delivery_mobile_startdate" id="delivery_mobile_startdate" value="<? echo stripslashes($delivery_mobile_startdate);?>" style="width:80px;"   onClick="displayCalendar(document.getElementById('delivery_mobile_startdate'),'mm/dd/yyyy',this);">
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_mobile_startdate_hour">
																	<option value="12" <? if($Row['delivery_mobile_startdate_hour']=="12" || $Row['delivery_mobile_startdate_hour']==''){echo "selected";}?>>12</option>
																	<option value="0" <? if($Row['delivery_mobile_startdate_hour']=="0"){echo "selected";}?>>0</option>
																	<option value="1" <? if($Row['delivery_mobile_startdate_hour']=="1"){echo "selected";}?>>1</option>
																	<option value="2" <? if($Row['delivery_mobile_startdate_hour']=="2"){echo "selected";}?>>2</option>
																	<option value="3" <? if($Row['delivery_mobile_startdate_hour']=="3"){echo "selected";}?>>3</option>
																	<option value="4" <? if($Row['delivery_mobile_startdate_hour']=="4"){echo "selected";}?>>4</option>
																	<option value="5" <? if($Row['delivery_mobile_startdate_hour']=="5"){echo "selected";}?>>5</option>
																	<option value="6" <? if($Row['delivery_mobile_startdate_hour']=="6"){echo "selected";}?>>6</option>
																	<option value="7" <? if($Row['delivery_mobile_startdate_hour']=="7"){echo "selected";}?>>7</option>
																	<option value="8" <? if($Row['delivery_mobile_startdate_hour']=="8"){echo "selected";}?>>8</option>
																	<option value="9" <? if($Row['delivery_mobile_startdate_hour']=="9"){echo "selected";}?>>9</option>
																	<option value="10" <? if($Row['delivery_mobile_startdate_hour']=="10"){echo "selected";}?>>10</option>
																	<option value="11" <? if($Row['delivery_mobile_startdate_hour']=="11"){echo "selected";}?>>11</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_mobile_startdate_minute">
																	<option value="00" <? if($Row['delivery_mobile_startdate_minute']=="00" || $Row['delivery_mobile_startdate_minute']==""){echo "selected";}?>>00</option>
																	<option value="15" <? if($Row['delivery_mobile_startdate_minute']=="15"){echo "selected";}?>>15</option>
																	<option value="30" <? if($Row['delivery_mobile_startdate_minute']=="30"){echo "selected";}?>>30</option>
																	<option value="45" <? if($Row['delivery_mobile_startdate_minute']=="45"){echo "selected";}?>>45</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_mobile_startdate_ampm">
																	<option value="am" <? if($Row['delivery_mobile_startdate_ampm']=="am"){echo "selected";}?>>am</option>
																	<option value="pm"  <? if($Row['delivery_mobile_startdate_ampm']=="pm" || $Row['delivery_mobile_startdate_ampm']==''){echo "selected";}?>>pm</option>
																</select>
														</td>
													  </tr>
													  <tr>
														<td align="left">Disable On</td>
														<td align="left"><? if($Row['delivery_mobile_enddate']!='' && $Row['delivery_mobile_enddate']!='0000-00-00'){$delivery_mobile_enddate=ymd_to_mdy($Row['delivery_mobile_enddate']);}else{$delivery_mobile_enddate='';}?>
																<input type="text" class="solidinput" name="delivery_mobile_enddate" id="delivery_mobile_enddate" style="width:80px;" value="<? echo stripslashes($delivery_mobile_enddate);?>"   onClick="displayCalendar(document.getElementById('delivery_mobile_enddate'),'mm/dd/yyyy',this);">
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_mobile_enddate_hour">
																	<option value="12" <? if($Row['delivery_mobile_enddate_hour']=="12" || $Row['delivery_mobile_enddate_hour']==''){echo "selected";}?>>12</option>
																	<option value="0" <? if($Row['delivery_mobile_enddate_hour']=="0"){echo "selected";}?>>0</option>
																	<option value="1" <? if($Row['delivery_mobile_enddate_hour']=="1"){echo "selected";}?>>1</option>
																	<option value="2" <? if($Row['delivery_mobile_enddate_hour']=="2"){echo "selected";}?>>2</option>
																	<option value="3" <? if($Row['delivery_mobile_enddate_hour']=="3"){echo "selected";}?>>3</option>
																	<option value="4" <? if($Row['delivery_mobile_enddate_hour']=="4"){echo "selected";}?>>4</option>
																	<option value="5" <? if($Row['delivery_mobile_enddate_hour']=="5"){echo "selected";}?>>5</option>
																	<option value="6" <? if($Row['delivery_mobile_enddate_hour']=="6"){echo "selected";}?>>6</option>
																	<option value="7" <? if($Row['delivery_mobile_enddate_hour']=="7"){echo "selected";}?>>7</option>
																	<option value="8" <? if($Row['delivery_mobile_enddate_hour']=="8"){echo "selected";}?>>8</option>
																	<option value="9" <? if($Row['delivery_mobile_enddate_hour']=="9"){echo "selected";}?>>9</option>
																	<option value="10" <? if($Row['delivery_mobile_enddate_hour']=="10"){echo "selected";}?>>10</option>
																	<option value="11" <? if($Row['delivery_mobile_enddate_hour']=="11"){echo "selected";}?>>11</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_mobile_enddate_minute">
																	<option value="00" <? if($Row['delivery_mobile_enddate_minute']=="00" || $Row['delivery_mobile_enddate_minute']==""){echo "selected";}?>>00</option>
																	<option value="15" <? if($Row['delivery_mobile_enddate_minute']=="15"){echo "selected";}?>>15</option>
																	<option value="30" <? if($Row['delivery_mobile_enddate_minute']=="30"){echo "selected";}?>>30</option>
																	<option value="45" <? if($Row['delivery_mobile_enddate_minute']=="45"){echo "selected";}?>>45</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_mobile_enddate_ampm">
																	<option value="am" <? if($Row['delivery_mobile_enddate_ampm']=="am"){echo "selected";}?>>am</option>
																	<option value="pm"  <? if($Row['delivery_mobile_enddate_ampm']=="pm" || $Row['delivery_mobile_enddate_ampm']==''){echo "selected";}?>>pm</option>
																</select>
														</td>
													  </tr>
													</table>
												</td>
											  </tr>
											</table>
										</td>
									  </tr>
									</table>
								</td>
						  </tr>
						  <tr>
								<td align="left" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="16%" align="left" valign="top">Print At Home</td>
										<td width="84%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="left">
												<input type="radio" name="delivery_printathome_type" id="delivery_printathome_type1" value="Always Available" <? if($Row['delivery_printathome_type']=="Always Available" || $Row['delivery_printathome_type']==""){?>checked="checked"<? } ?> onClick="document.getElementById('delivery_printathome_startdate_ID').style.display='none';"><label for="delivery_printathome_type1">Always Available</label>&nbsp;&nbsp;
												<input type="radio" name="delivery_printathome_type" id="delivery_printathome_type2" value="Never Available"  <? if($Row['delivery_printathome_type']=="Never Available"){?>checked="checked"<? } ?> onClick="document.getElementById('delivery_printathome_startdate_ID').style.display='none';"><label for="delivery_printathome_type2">Never Available</label>&nbsp;&nbsp;
												<input type="radio" name="delivery_printathome_type" id="delivery_printathome_type3" value="Set Dates"  <? if($Row['delivery_printathome_type']=="Set Dates"){?>checked="checked"<? } ?> onClick="document.getElementById('delivery_printathome_startdate_ID').style.display='inline';"><label for="delivery_printathome_type3">Set Dates</label></td>
											  </tr>
											  <tr>
												<td align="left" nowrap="nowrap"><a href="#" style="font-size:11px;color:#990099;padding:0px;text-align:left;margin:0px;" onClick="document.getElementById('delivery_printathome_extrainfo_ID').style.display='inline';return false;" >ADD A DESCRIPTION</a></td>
											  </tr>
											  <tr>
												<td align="left" id="delivery_printathome_extrainfo_ID" <? if($Row['delivery_printathome_extrainfo']==""){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="21%" align="left">Extra Info</td>
														<td width="79%" align="left"><textarea name="delivery_printathome_extrainfo" id="delivery_printathome_extrainfo" style="width:250px;"><? echo stripslashes($Row['delivery_printathome_extrainfo']);?></textarea></td>
													  </tr>
													</table>
												</td>
											  </tr>
											  <tr>
												<td align="left" id="delivery_printathome_startdate_ID" <? if($Row['delivery_printathome_type']!="Set Dates"){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="21%" align="left">Enable On</td>
														<td width="79%" align="left"><? if($Row['delivery_printathome_startdate']!='' && $Row['delivery_printathome_startdate']!='0000-00-00'){$delivery_printathome_startdate=ymd_to_mdy($Row['delivery_printathome_startdate']);}else{$delivery_printathome_startdate='';}?>
																<input type="text" class="solidinput" name="delivery_printathome_startdate" id="delivery_printathome_startdate" value="<? echo stripslashes($delivery_printathome_startdate);?>" style="width:80px;"   onClick="displayCalendar(document.getElementById('delivery_printathome_startdate'),'mm/dd/yyyy',this);">
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_printathome_startdate_hour">
																	<option value="12" <? if($Row['delivery_printathome_startdate_hour']=="12" || $Row['delivery_printathome_startdate_hour']==''){echo "selected";}?>>12</option>
																	<option value="0" <? if($Row['delivery_printathome_startdate_hour']=="0"){echo "selected";}?>>0</option>
																	<option value="1" <? if($Row['delivery_printathome_startdate_hour']=="1"){echo "selected";}?>>1</option>
																	<option value="2" <? if($Row['delivery_printathome_startdate_hour']=="2"){echo "selected";}?>>2</option>
																	<option value="3" <? if($Row['delivery_printathome_startdate_hour']=="3"){echo "selected";}?>>3</option>
																	<option value="4" <? if($Row['delivery_printathome_startdate_hour']=="4"){echo "selected";}?>>4</option>
																	<option value="5" <? if($Row['delivery_printathome_startdate_hour']=="5"){echo "selected";}?>>5</option>
																	<option value="6" <? if($Row['delivery_printathome_startdate_hour']=="6"){echo "selected";}?>>6</option>
																	<option value="7" <? if($Row['delivery_printathome_startdate_hour']=="7"){echo "selected";}?>>7</option>
																	<option value="8" <? if($Row['delivery_printathome_startdate_hour']=="8"){echo "selected";}?>>8</option>
																	<option value="9" <? if($Row['delivery_printathome_startdate_hour']=="9"){echo "selected";}?>>9</option>
																	<option value="10" <? if($Row['delivery_printathome_startdate_hour']=="10"){echo "selected";}?>>10</option>
																	<option value="11" <? if($Row['delivery_printathome_startdate_hour']=="11"){echo "selected";}?>>11</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_printathome_startdate_minute">
																	<option value="00" <? if($Row['delivery_printathome_startdate_minute']=="00" || $Row['delivery_printathome_startdate_minute']==""){echo "selected";}?>>00</option>
																	<option value="15" <? if($Row['delivery_printathome_startdate_minute']=="15"){echo "selected";}?>>15</option>
																	<option value="30" <? if($Row['delivery_printathome_startdate_minute']=="30"){echo "selected";}?>>30</option>
																	<option value="45" <? if($Row['delivery_printathome_startdate_minute']=="45"){echo "selected";}?>>45</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_printathome_startdate_ampm">
																	<option value="am" <? if($Row['delivery_printathome_startdate_ampm']=="am"){echo "selected";}?>>am</option>
																	<option value="pm"  <? if($Row['delivery_printathome_startdate_ampm']=="pm" || $Row['delivery_printathome_startdate_ampm']==''){echo "selected";}?>>pm</option>
																</select>
														</td>
													  </tr>
													  <tr>
														<td align="left">Disable On</td>
														<td align="left"><? if($Row['delivery_printathome_enddate']!='' && $Row['delivery_printathome_enddate']!='0000-00-00'){$delivery_printathome_enddate=ymd_to_mdy($Row['delivery_printathome_enddate']);}else{$delivery_printathome_enddate='';}?>
																<input type="text" class="solidinput" name="delivery_printathome_enddate" id="delivery_printathome_enddate" style="width:80px;" value="<? echo stripslashes($delivery_printathome_enddate);?>" onClick="displayCalendar(document.getElementById('delivery_printathome_enddate'),'mm/dd/yyyy',this);">
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_printathome_enddate_hour">
																	<option value="12" <? if($Row['delivery_printathome_enddate_hour']=="12" || $Row['delivery_printathome_enddate_hour']==''){echo "selected";}?>>12</option>
																	<option value="0" <? if($Row['delivery_printathome_enddate_hour']=="0"){echo "selected";}?>>0</option>
																	<option value="1" <? if($Row['delivery_printathome_enddate_hour']=="1"){echo "selected";}?>>1</option>
																	<option value="2" <? if($Row['delivery_printathome_enddate_hour']=="2"){echo "selected";}?>>2</option>
																	<option value="3" <? if($Row['delivery_printathome_enddate_hour']=="3"){echo "selected";}?>>3</option>
																	<option value="4" <? if($Row['delivery_printathome_enddate_hour']=="4"){echo "selected";}?>>4</option>
																	<option value="5" <? if($Row['delivery_printathome_enddate_hour']=="5"){echo "selected";}?>>5</option>
																	<option value="6" <? if($Row['delivery_printathome_enddate_hour']=="6"){echo "selected";}?>>6</option>
																	<option value="7" <? if($Row['delivery_printathome_enddate_hour']=="7"){echo "selected";}?>>7</option>
																	<option value="8" <? if($Row['delivery_printathome_enddate_hour']=="8"){echo "selected";}?>>8</option>
																	<option value="9" <? if($Row['delivery_printathome_enddate_hour']=="9"){echo "selected";}?>>9</option>
																	<option value="10" <? if($Row['delivery_printathome_enddate_hour']=="10"){echo "selected";}?>>10</option>
																	<option value="11" <? if($Row['delivery_printathome_enddate_hour']=="11"){echo "selected";}?>>11</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_printathome_enddate_minute">
																	<option value="00" <? if($Row['delivery_printathome_enddate_minute']=="00" || $Row['delivery_printathome_enddate_minute']==""){echo "selected";}?>>00</option>
																	<option value="15" <? if($Row['delivery_printathome_enddate_minute']=="15"){echo "selected";}?>>15</option>
																	<option value="30" <? if($Row['delivery_printathome_enddate_minute']=="30"){echo "selected";}?>>30</option>
																	<option value="45" <? if($Row['delivery_printathome_enddate_minute']=="45"){echo "selected";}?>>45</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_printathome_enddate_ampm">
																	<option value="am" <? if($Row['delivery_printathome_enddate_ampm']=="am"){echo "selected";}?>>am</option>
																	<option value="pm"  <? if($Row['delivery_printathome_enddate_ampm']=="pm" || $Row['delivery_printathome_enddate_ampm']==''){echo "selected";}?>>pm</option>
																</select>
														</td>
													  </tr>
													</table>
												</td>
											  </tr>
											</table>
										</td>
									  </tr>
									</table>
								</td>
						  </tr>
						  
						  <tr>
								<td align="left" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="16%" align="left" valign="top">Will Call</td>
										<td width="84%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="left">
												<input type="radio" name="delivery_willcall_type" id="delivery_willcall_type1" value="Always Available" <? if($Row['delivery_willcall_type']=="Always Available" || $Row['delivery_willcall_type']==""){?>checked="checked"<? } ?>  onClick="document.getElementById('delivery_willcall_startdate_ID').style.display='none';"><label for="delivery_willcall_type1">Always Available</label>&nbsp;&nbsp;
												<input type="radio" name="delivery_willcall_type" id="delivery_willcall_type2" value="Never Available"  <? if($Row['delivery_willcall_type']=="Never Available" ){?>checked="checked"<? } ?>  onClick="document.getElementById('delivery_willcall_startdate_ID').style.display='none';"><label for="delivery_willcall_type2">Never Available</label>&nbsp;&nbsp;
												<input type="radio" name="delivery_willcall_type" id="delivery_willcall_type3" value="Set Dates"  <? if($Row['delivery_willcall_type']=="Set Dates" ){?>checked="checked"<? } ?>  onClick="document.getElementById('delivery_willcall_startdate_ID').style.display='inline';"><label for="delivery_willcall_type3">Set Dates</label></td>
											  </tr>
											  <tr>
												<td align="left" nowrap="nowrap"><a href="#" style="font-size:11px;color:#990099;padding:0px;text-align:left;margin:0px;" onClick="document.getElementById('delivery_willcall_extrainfo_ID').style.display='inline';return false;" >ADD A DESCRIPTION</a></td>
											  </tr>
											  <tr>
												<td align="left" id="delivery_willcall_extrainfo_ID" <? if($Row['delivery_willcall_extrainfo']==""){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="21%" align="left">Extra Info</td>
														<td width="79%" align="left"><textarea name="delivery_willcall_extrainfo" id="delivery_willcall_extrainfo" style="width:250px;"><? echo stripslashes($Row['delivery_willcall_extrainfo']);?></textarea></td>
													  </tr>
													</table>
												</td>
											  </tr>
											  <tr>
												<td align="left" id="delivery_willcall_startdate_ID" <? if($Row['delivery_willcall_type']!="Set Dates"){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="21%" align="left">Enable On</td>
														<td width="79%" align="left"><? if($Row['delivery_willcall_startdate']!='' && $Row['delivery_willcall_startdate']!='0000-00-00'){$delivery_willcall_startdate=ymd_to_mdy($Row['delivery_willcall_startdate']);}else{$delivery_willcall_startdate='';}?>
																<input type="text" class="solidinput" name="delivery_willcall_startdate" id="delivery_willcall_startdate" style="width:80px;" value="<? echo stripslashes($delivery_willcall_startdate);?>"  onClick="displayCalendar(document.getElementById('delivery_willcall_startdate'),'mm/dd/yyyy',this);">
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_willcall_startdate_hour">
																	<option value="12" <? if($Row['delivery_willcall_startdate_hour']=="12" || $Row['delivery_willcall_startdate_hour']==''){echo "selected";}?>>12</option>
																	<option value="0" <? if($Row['delivery_willcall_startdate_hour']=="0"){echo "selected";}?>>0</option>
																	<option value="1" <? if($Row['delivery_willcall_startdate_hour']=="1"){echo "selected";}?>>1</option>
																	<option value="2" <? if($Row['delivery_willcall_startdate_hour']=="2"){echo "selected";}?>>2</option>
																	<option value="3" <? if($Row['delivery_willcall_startdate_hour']=="3"){echo "selected";}?>>3</option>
																	<option value="4" <? if($Row['delivery_willcall_startdate_hour']=="4"){echo "selected";}?>>4</option>
																	<option value="5" <? if($Row['delivery_willcall_startdate_hour']=="5"){echo "selected";}?>>5</option>
																	<option value="6" <? if($Row['delivery_willcall_startdate_hour']=="6"){echo "selected";}?>>6</option>
																	<option value="7" <? if($Row['delivery_willcall_startdate_hour']=="7"){echo "selected";}?>>7</option>
																	<option value="8" <? if($Row['delivery_willcall_startdate_hour']=="8"){echo "selected";}?>>8</option>
																	<option value="9" <? if($Row['delivery_willcall_startdate_hour']=="9"){echo "selected";}?>>9</option>
																	<option value="10" <? if($Row['delivery_willcall_startdate_hour']=="10"){echo "selected";}?>>10</option>
																	<option value="11" <? if($Row['delivery_willcall_startdate_hour']=="11"){echo "selected";}?>>11</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_willcall_startdate_minute">
																	<option value="00" <? if($Row['delivery_willcall_startdate_minute']=="00" || $Row['delivery_willcall_startdate_minute']==""){echo "selected";}?>>00</option>
																	<option value="15" <? if($Row['delivery_willcall_startdate_minute']=="15"){echo "selected";}?>>15</option>
																	<option value="30" <? if($Row['delivery_willcall_startdate_minute']=="30"){echo "selected";}?>>30</option>
																	<option value="45" <? if($Row['delivery_willcall_startdate_minute']=="45"){echo "selected";}?>>45</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_willcall_startdate_ampm">
																	<option value="am" <? if($Row['delivery_willcall_startdate_ampm']=="am"){echo "selected";}?>>am</option>
																	<option value="pm"  <? if($Row['delivery_willcall_startdate_ampm']=="pm" || $Row['delivery_willcall_startdate_ampm']==''){echo "selected";}?>>pm</option>
																</select>
														</td>
													  </tr>
													  <tr>
														<td align="left">Disable On</td>
														<td align="left"><? if($Row['delivery_willcall_enddate']!='' && $Row['delivery_willcall_enddate']!='0000-00-00'){$delivery_willcall_enddate=ymd_to_mdy($Row['delivery_willcall_enddate']);}else{$delivery_willcall_enddate='';}?>
																<input type="text" class="solidinput" name="delivery_willcall_enddate" id="delivery_willcall_enddate" style="width:80px;" value="<? echo stripslashes($delivery_willcall_enddate);?>"  onClick="displayCalendar(document.getElementById('delivery_willcall_enddate'),'mm/dd/yyyy',this);">
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_willcall_enddate_hour">
																	<option value="12" <? if($Row['delivery_willcall_enddate_hour']=="12" || $Row['delivery_willcall_enddate_hour']==''){echo "selected";}?>>12</option>
																	<option value="0" <? if($Row['delivery_willcall_enddate_hour']=="0"){echo "selected";}?>>0</option>
																	<option value="1" <? if($Row['delivery_willcall_enddate_hour']=="1"){echo "selected";}?>>1</option>
																	<option value="2" <? if($Row['delivery_willcall_enddate_hour']=="2"){echo "selected";}?>>2</option>
																	<option value="3" <? if($Row['delivery_willcall_enddate_hour']=="3"){echo "selected";}?>>3</option>
																	<option value="4" <? if($Row['delivery_willcall_enddate_hour']=="4"){echo "selected";}?>>4</option>
																	<option value="5" <? if($Row['delivery_willcall_enddate_hour']=="5"){echo "selected";}?>>5</option>
																	<option value="6" <? if($Row['delivery_willcall_enddate_hour']=="6"){echo "selected";}?>>6</option>
																	<option value="7" <? if($Row['delivery_willcall_enddate_hour']=="7"){echo "selected";}?>>7</option>
																	<option value="8" <? if($Row['delivery_willcall_enddate_hour']=="8"){echo "selected";}?>>8</option>
																	<option value="9" <? if($Row['delivery_willcall_enddate_hour']=="9"){echo "selected";}?>>9</option>
																	<option value="10" <? if($Row['delivery_willcall_enddate_hour']=="10"){echo "selected";}?>>10</option>
																	<option value="11" <? if($Row['delivery_willcall_enddate_hour']=="11"){echo "selected";}?>>11</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_willcall_enddate_minute">
																	<option value="00" <? if($Row['delivery_willcall_enddate_minute']=="00" || $Row['delivery_willcall_enddate_minute']==""){echo "selected";}?>>00</option>
																	<option value="15" <? if($Row['delivery_willcall_enddate_minute']=="15"){echo "selected";}?>>15</option>
																	<option value="30" <? if($Row['delivery_willcall_enddate_minute']=="30"){echo "selected";}?>>30</option>
																	<option value="45" <? if($Row['delivery_willcall_enddate_minute']=="45"){echo "selected";}?>>45</option>
																</select>
																<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="delivery_willcall_enddate_ampm">
																	<option value="am" <? if($Row['delivery_willcall_enddate_ampm']=="am"){echo "selected";}?>>am</option>
																	<option value="pm"  <? if($Row['delivery_willcall_enddate_ampm']=="pm" || $Row['delivery_willcall_enddate_ampm']==''){echo "selected";}?>>pm</option>
																</select>
														</td>
													  </tr>
													</table>
												</td>
											  </tr>
											</table>
										</td>
									  </tr>
									</table>
								</td>
						  </tr>
						  
						  
						  <tr><td height="25" colspan="4" align="left" valign="middle" class="blue"><strong>Donations</strong></td></tr>
						  <tr>
								<td align="left" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="16%" align="left" valign="top">Enable</td>
										<td width="84%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="left">
												<input type="radio" name="donations_enable" id="donations_enable1" value="Yes" <? if($Row['donations_enable']=="Yes"){?>checked="checked"<? } ?> onClick="document.getElementById('donations_enable_ID').style.display='inline';"><label for="donations_enable1">Yes</label>&nbsp;&nbsp;
												<input type="radio" name="donations_enable" id="donations_enable2" value="No" <? if($Row['donations_enable']=="No" || $Row['donations_enable']==""){?>checked="checked"<? } ?>  onClick="document.getElementById('donations_enable_ID').style.display='none';"><label for="donations_enable2">No</label>&nbsp;&nbsp;</td>
											  </tr>
											  
											  <tr>
												<td align="left" id="donations_enable_ID" <? if($Row['donations_name']==""){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="20%" align="left">Donation Name</td>
														<td width="80%" align="left"><input type="text" name="donations_name" class="solidinput" value="<? echo stripslashes($Row['donations_name']);?>" id="donations_name"/></td>
													  </tr>
													</table>
												</td>
											  </tr>
											  
											</table>
										</td>
									  </tr>
									</table>
								</td>
						  </tr>
						  
						  <tr><td height="25" colspan="4" align="left" valign="middle" class="blue"><strong>Custom Fee</strong></td></tr>
						  <tr>
								<td align="left" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="16%" align="left" valign="top">Enable</td>
										<td width="84%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="left">
												<input type="radio" name="customfee_enable" id="customfee_enable1" value="Yes"  <? if($Row['customfee_enable']=="Yes"){?>checked="checked"<? } ?>  onClick="document.getElementById('customfee_enable_ID').style.display='inline';"><label for="customfee_enable1">Yes</label>&nbsp;&nbsp;
												<input type="radio" name="customfee_enable" id="customfee_enable2" value="No"  <? if($Row['customfee_enable']=="No" || $Row['customfee_enable']==""){?>checked="checked"<? } ?>  onClick="document.getElementById('customfee_enable_ID').style.display='none';"><label for="customfee_enable2">No</label>&nbsp;&nbsp;</td>
											  </tr>
											  <tr>
												<td align="left" id="customfee_enable_ID" <? if($Row['customfee_enable']!="Yes"){?>style="display:none;"<? } ?>>
													<table width="90%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="19%" align="left">Name of Fee</td>
														<td width="81%" align="left"><input type="text" name="customfee_enable_nameoffee" class="solidinput" id="customfee_enable_nameoffee" value="<? echo stripslashes($Row['customfee_enable_nameoffee']);?>" style="width:150px;"/></td>
													  </tr>
													  <tr>
														<td width="19%" align="left">Type</td>
														<td width="81%" align="left">
															<select name="customfee_enable_type" id="customfee_enable_type" style="width:160px;padding:1px 2px;font:11px;height:20px"><option value="Fixed Amount" <? if($Row['customfee_enable_type']=="Fixed Amount"){echo "selected";} ?>>Fixed Amount</option><option value="Percentage" <? if($Row['customfee_enable_type']=="Percentage"){echo "selected";} ?>>Percentage</option></select>
														</td>
													  </tr>
													  <tr>
														<td width="19%" align="left">Amount(%)</td>
														<td width="81%" align="left"><input type="text" name="customfee_enable_amount" class="solidinput" id="customfee_enable_amount"  value="<? echo stripslashes($Row['customfee_enable_amount']);?>" style="width:150px;"/></td>
													  </tr>
													  <tr>
														<td width="19%" align="left">Apply Fee</td>
														<td width="81%" align="left">
															<select name="customfee_enable_applyfee" id="customfee_enable_applyfee" style="width:160px;padding:1px 2px;font:11px;height:20px"><option value="Before Discounts" <? if($Row['customfee_enable_applyfee']=="Before Discounts"){echo "selected";} ?>>Before Discounts</option><option value="After Discounts" <? if($Row['customfee_enable_applyfee']=="After Discounts"){echo "selected";} ?>>After Discounts</option></select>
														</td>
													  </tr>
													</table>
												</td>
											  </tr>
											  
											</table>
										</td>
									  </tr>
									</table>
								</td>
						  </tr>
						  
						  
						  <tr><td height="25" colspan="4" align="left" valign="middle" class="blue"><strong>Additional Settings</strong></td></tr>
						  <tr>
								<td align="left" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="16%" align="left" valign="top">Online Service Fee</td>
										<td width="84%" align="left" valign="top"><input type="text" name="additional_onlineservicefee" class="solidinput" id="additional_onlineservicefee" style="width:50px;" value="<? echo stripslashes($Row['additional_onlineservicefee']);?>"/> % covered</td>
									  </tr>
									  <tr>
										<td width="16%" align="left" valign="top">Box Office Service Fee</td>
										<td width="84%" align="left" valign="top"><input type="text" name="additional_boservicefee" class="solidinput" id="additional_boservicefee" style="width:50px;" value="<? echo stripslashes($Row['additional_boservicefee']);?>"/> % covered</td>
									  </tr>
									  <tr>
										<td width="16%" align="left" valign="top">Ticket Note</td>
										<td width="84%" align="left" valign="top"><input type="text" name="additional_ticketnote" class="solidinput" id="additional_ticketnote" style="width:250px;" value="<? echo stripslashes($Row['additional_ticketnote']);?>"/> </td>
									  </tr>
									  <tr>
										<td width="16%" align="left" valign="top">Ticket Trans. Limit</td>
										<td width="84%" align="left" valign="top"><input type="text" name="additional_ticket_tranlimit" class="solidinput" id="additional_ticket_tranlimit" style="width:50px;" value="<? echo stripslashes($Row['additional_ticket_tranlimit']);?>"/></td>
									  </tr>
									  <tr>
										<td width="16%" align="left" valign="top">Checkout Time Limit</td>
										<td width="84%" align="left" valign="top">
										<select type="text" name="additional_checkouttimelimit"   id="additional_checkouttimelimit"  style="width:160px;padding:1px 2px;font:11px;height:20px">
										<? for($MM=5;$MM<=20;$MM++){?>
											<option value="<? echo $MM;?>" <? if($Row['additional_checkouttimelimit']==$MM){echo "selected";}?>><? echo $MM;?> minute</option>
										<? }  ?>	
										</select>
									    </td>
									  </tr>
									  <tr>
										<td width="16%" align="left" valign="top">Private Event</td>
										<td width="84%" align="left" valign="top"><input type="radio" name="additional_privateevent"  id="additional_privateevent1"  value="Yes" <? if($Row['additional_privateevent']=="Yes" || $Row['additional_privateevent']==""){echo "checked";}?>/> Yes&nbsp;&nbsp;<input type="radio" name="additional_privateevent"  id="additional_privateevent2"  value="No" <? if($Row['additional_privateevent']=="No"){echo "checked";}?>/> No</td>
									  </tr>
									  <tr>
										<td colspan="2">
										<input type="hidden" name="HidRegUser" id="HidRegUser" value="" />
										<input type="button"   class="bttn-a"  onClick="return valid();" value="Save & Continue" ></td>
									  </tr>
									</table>
								</td>
						  </tr>
						</table>
						</form></td>
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
	form=document.AddeventForm;
	document.AddeventForm.HidRegUser.value='1';
	document.AddeventForm.submit();
	return  true;    
}
</script>
</body>
</html>