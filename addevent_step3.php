<? include("connect.php"); 
include("getsess.php");
if($_SESSION['SESSION_STEP1']==""){header("location:addevent_step1.php");exit;}
if($_SESSION['SESSION_STEP2']==""){header("location:addevent_step2.php");exit;}
if($_POST['HidRegUser']=="1")
{
		$AddUserQry="UPDATE events SET
						delivery_mobile_type='".addslashes($_POST['delivery_mobile_type'])."',						
						delivery_mobile_extrainfo='".addslashes($_POST['delivery_mobile_extrainfo'])."',						
						delivery_mobile_startdate='".addslashes($_POST['delivery_mobile_startdate'])."',
						delivery_mobile_startdate_hour='".addslashes($_POST['delivery_mobile_startdate_hour'])."',
						delivery_mobile_startdate_minute='".addslashes($_POST['delivery_mobile_startdate_minute'])."',
						delivery_mobile_startdate_ampm='".addslashes($_POST['delivery_mobile_startdate_ampm'])."',
						delivery_mobile_enddate='".addslashes($_POST['delivery_mobile_enddate'])."',
						delivery_mobile_enddate_hour='".addslashes($_POST['delivery_mobile_enddate_hour'])."',
						delivery_mobile_enddate_minute='".addslashes($_POST['delivery_mobile_enddate_minute'])."',
						delivery_mobile_enddate_ampm='".addslashes($_POST['delivery_mobile_enddate_ampm'])."',
						delivery_printathome_type='".addslashes($_POST['delivery_printathome_type'])."',
						delivery_printathome_extrainfo='".addslashes($_POST['delivery_printathome_extrainfo'])."',
						delivery_printathome_startdate='".addslashes($_POST['delivery_printathome_startdate'])."',
						delivery_printathome_startdate_hour='".addslashes($_POST['delivery_printathome_startdate_hour'])."',
						delivery_printathome_startdate_minute='".addslashes($_POST['delivery_printathome_startdate_minute'])."',
						delivery_printathome_startdate_ampm='".addslashes($_POST['delivery_printathome_startdate_ampm'])."',
						delivery_printathome_enddate='".addslashes($_POST['delivery_printathome_enddate'])."',
						delivery_printathome_enddate_hour='".addslashes($_POST['delivery_printathome_enddate_hour'])."',
						delivery_printathome_enddate_minute='".addslashes($_POST['delivery_printathome_enddate_minute'])."',
						delivery_printathome_enddate_ampm='".addslashes($_POST['delivery_printathome_enddate_ampm'])."',
						delivery_willcall_type='".addslashes($_POST['delivery_willcall_type'])."',
						delivery_willcall_extrainfo='".addslashes($_POST['delivery_willcall_extrainfo'])."',
						delivery_willcall_startdate='".addslashes($_POST['delivery_willcall_startdate'])."',
						delivery_willcall_startdate_hour='".addslashes($_POST['delivery_willcall_startdate_hour'])."',
						delivery_willcall_startdate_minute='".addslashes($_POST['delivery_willcall_startdate_minute'])."',
						delivery_willcall_startdate_ampm='".addslashes($_POST['delivery_willcall_startdate_ampm'])."',
						delivery_willcall_enddate='".addslashes($_POST['delivery_willcall_enddate'])."',
						delivery_willcall_enddate_hour='".addslashes($_POST['delivery_willcall_enddate_hour'])."',
						delivery_willcall_enddate_minute='".addslashes($_POST['delivery_willcall_enddate_minute'])."',
						delivery_willcall_enddate_ampm='".addslashes($_POST['delivery_willcall_enddate_ampm'])."',
						donations_enable='".addslashes($_POST['donations_enable'])."',
						donations_name='".addslashes($_POST['v'])."',
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
						additional_privateevent='".addslashes($_POST['additional_privateevent'])."' where id='".$_SESSION['SESSION_STEP1']."'";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		header("location:myaccount.php?msg=Event has been created.");			
		exit;
}

$query1="select * from users where id='".trim($_SESSION['UsErId'])."' ";
$res=mysql_query($query1);
$tot=mysql_affected_rows();
if($tot>0)
{
	$Row=mysql_fetch_array($res);
}
else
{
	header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Account | <? echo $SITE_NAME;?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="ajax_validation.js"></script>

</head>
<script language="javascript">
function closeshadow()
{
	venuedropdown('venuedropdown_ID');
}
</script>
<link rel="stylesheet" href="dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
<script type="text/javascript" src="dhtmlgoodies_calendar.js?random=20060118"></script>
<body id="page5">
<div class="body1">
	<div class="main">
<!-- header -->
		<? include("top.php");?>
		<div class="ic"><div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div></div>
<!-- / header -->
<!-- content -->
		<article id="content">
			
			<div class="wrapper">
				<div class="pad_left2 relative">
					<h4 class="color3"><span>Welcome <? echo ucfirst(stripslashes($Row['firstname']));?> <? echo ucfirst(stripslashes($Row['lastname']));?></span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" style="width:830px;">
								<h2><strong style="width:130px;">Options</strong></h2>
								<div class="pad_bot1">
									<figure>
									<form id="AddeventForm" name="AddeventForm" enctype="multipart/form-data" method="post">
										<table width="100%" border="0" cellspacing="3" cellpadding="2">
										  <tr><td align="left" style="padding:5px;">
												<div class="wrapper" style="border-bottom:1px solid;border-color:#999999;"><strong>Delivery Methods</strong></div>
												<div class="wrapper" style="height:8px;"></div>
										  </td></tr>
										  <tr>
										  		<td align="left" style="padding:5px;">
										  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="25%" align="left" valign="top">Mobile</td>
														<td width="75%" align="left" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tr>
																<td align="left">
																<input type="radio" name="delivery_mobile_type" id="delivery_mobile_type1" value="Always Available" checked="checked" onClick="document.getElementById('delivery_mobile_startdate_ID').style.display='none';"><label for="delivery_mobile_type1">Always Available</label>&nbsp;&nbsp;
																<input type="radio" name="delivery_mobile_type" id="delivery_mobile_type2" value="Never Available" onClick="document.getElementById('delivery_mobile_startdate_ID').style.display='none';"><label for="delivery_mobile_type2">Never Available</label>&nbsp;&nbsp;
																<input type="radio" name="delivery_mobile_type" id="delivery_mobile_type3" value="Set Dates" onClick="document.getElementById('delivery_mobile_startdate_ID').style.display='inline';"><label for="delivery_mobile_type3">Set Dates</label></td>
															  </tr>
															  <tr>
																<td align="left" nowrap="nowrap"><a href="#" style="font-size:11px;color:#990099;padding:0px;text-align:left;margin:0px;" onClick="document.getElementById('delivery_mobile_extrainfo_ID').style.display='inline';return false;" >ADD A DESCRIPTION</a></td>
															  </tr>
															  <tr>
																<td align="left" id="delivery_mobile_extrainfo_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="21%" align="left">Extra Info</td>
																		<td width="79%" align="left"><textarea name="delivery_mobile_extrainfo" id="delivery_mobile_extrainfo" style="width:250px;"></textarea></td>
																	  </tr>
																	</table>
																</td>
															  </tr>
															  <tr>
																<td align="left" id="delivery_mobile_startdate_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="21%" align="left">Enable On</td>
																		<td width="79%" align="left">
																				<input type="text" class="input" name="delivery_mobile_startdate" id="delivery_mobile_startdate" style="width:80px;"   onClick="displayCalendar(document.getElementById('delivery_mobile_startdate'),'yyyy-mm-dd',this);">
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_mobile_startdate_hour">
																					<option value="12">12</option>
																					<option value="0">0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																					<option value="8">8</option>
																					<option value="9">9</option>
																					<option value="10">10</option>
																					<option value="11">11</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_mobile_startdate_minute">
																					<option value="00">00</option>
																					<option value="15">15</option>
																					<option value="30">30</option>
																					<option value="45">45</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_mobile_startdate_ampm">
																					<option value="am">am</option>
																					<option value="pm" selected="selected">pm</option>
																				</select>
																		</td>
																	  </tr>
																	  <tr>
																		<td align="left">Disable On</td>
																		<td align="left">
																				<input type="text" class="input" name="delivery_mobile_enddate" id="delivery_mobile_enddate" style="width:80px;"   onClick="displayCalendar(document.getElementById('delivery_mobile_enddate'),'yyyy-mm-dd',this);">
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_mobile_enddate_hour">
																					<option value="12">12</option>
																					<option value="0">0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																					<option value="8">8</option>
																					<option value="9">9</option>
																					<option value="10">10</option>
																					<option value="11">11</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_mobile_enddate_minute">
																					<option value="00">00</option>
																					<option value="15">15</option>
																					<option value="30">30</option>
																					<option value="45">45</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_mobile_enddate_ampm">
																					<option value="am">am</option>
																					<option value="pm" selected="selected">pm</option>
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
														<td width="25%" align="left" valign="top">Print At Home</td>
														<td width="75%" align="left" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tr>
																<td align="left">
																<input type="radio" name="delivery_printathome_type" id="delivery_printathome_type1" value="Always Available" checked="checked" onClick="document.getElementById('delivery_printathome_startdate_ID').style.display='none';"><label for="delivery_printathome_type1">Always Available</label>&nbsp;&nbsp;
																<input type="radio" name="delivery_printathome_type" id="delivery_printathome_type2" value="Never Available" onClick="document.getElementById('delivery_printathome_startdate_ID').style.display='none';"><label for="delivery_printathome_type2">Never Available</label>&nbsp;&nbsp;
																<input type="radio" name="delivery_printathome_type" id="delivery_printathome_type3" value="Set Dates" onClick="document.getElementById('delivery_printathome_startdate_ID').style.display='inline';"><label for="delivery_printathome_type3">Set Dates</label></td>
															  </tr>
															  <tr>
																<td align="left" nowrap="nowrap"><a href="#" style="font-size:11px;color:#990099;padding:0px;text-align:left;margin:0px;" onClick="document.getElementById('delivery_printathome_extrainfo_ID').style.display='inline';return false;" >ADD A DESCRIPTION</a></td>
															  </tr>
															  <tr>
																<td align="left" id="delivery_printathome_extrainfo_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="21%" align="left">Extra Info</td>
																		<td width="79%" align="left"><textarea name="delivery_printathome_extrainfo" id="delivery_printathome_extrainfo" style="width:250px;"></textarea></td>
																	  </tr>
																	</table>
																</td>
															  </tr>
															  <tr>
																<td align="left" id="delivery_printathome_startdate_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="21%" align="left">Enable On</td>
																		<td width="79%" align="left">
																				<input type="text" class="input" name="delivery_printathome_startdate" id="delivery_printathome_startdate" style="width:80px;"   onClick="displayCalendar(document.getElementById('delivery_printathome_startdate'),'yyyy-mm-dd',this);">
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_printathome_startdate_hour">
																					<option value="12">12</option>
																					<option value="0">0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																					<option value="8">8</option>
																					<option value="9">9</option>
																					<option value="10">10</option>
																					<option value="11">11</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_printathome_startdate_minute">
																					<option value="00">00</option>
																					<option value="15">15</option>
																					<option value="30">30</option>
																					<option value="45">45</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_printathome_startdate_ampm">
																					<option value="am">am</option>
																					<option value="pm" selected="selected">pm</option>
																				</select>
																		</td>
																	  </tr>
																	  <tr>
																		<td align="left">Disable On</td>
																		<td align="left">
																				<input type="text" class="input" name="delivery_printathome_enddate" id="delivery_printathome_enddate" style="width:80px;" onClick="displayCalendar(document.getElementById('delivery_printathome_enddate'),'yyyy-mm-dd',this);">
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_printathome_enddate_hour">
																					<option value="12">12</option>
																					<option value="0">0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																					<option value="8">8</option>
																					<option value="9">9</option>
																					<option value="10">10</option>
																					<option value="11">11</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_printathome_enddate_minute">
																					<option value="00">00</option>
																					<option value="15">15</option>
																					<option value="30">30</option>
																					<option value="45">45</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_printathome_enddate_ampm">
																					<option value="am">am</option>
																					<option value="pm" selected="selected">pm</option>
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
														<td width="25%" align="left" valign="top">Will Call</td>
														<td width="75%" align="left" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tr>
																<td align="left">
																<input type="radio" name="delivery_willcall_type" id="delivery_willcall_type1" value="Always Available" checked="checked" onClick="document.getElementById('delivery_willcall_startdate_ID').style.display='none';"><label for="delivery_willcall_type1">Always Available</label>&nbsp;&nbsp;
																<input type="radio" name="delivery_willcall_type" id="delivery_willcall_type2" value="Never Available" onClick="document.getElementById('delivery_willcall_startdate_ID').style.display='none';"><label for="delivery_willcall_type2">Never Available</label>&nbsp;&nbsp;
																<input type="radio" name="delivery_willcall_type" id="delivery_willcall_type3" value="Set Dates" onClick="document.getElementById('delivery_willcall_startdate_ID').style.display='inline';"><label for="delivery_willcall_type3">Set Dates</label></td>
															  </tr>
															  <tr>
																<td align="left" nowrap="nowrap"><a href="#" style="font-size:11px;color:#990099;padding:0px;text-align:left;margin:0px;" onClick="document.getElementById('delivery_willcall_extrainfo_ID').style.display='inline';return false;" >ADD A DESCRIPTION</a></td>
															  </tr>
															  <tr>
																<td align="left" id="delivery_willcall_extrainfo_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="21%" align="left">Extra Info</td>
																		<td width="79%" align="left"><textarea name="delivery_willcall_extrainfo" id="delivery_willcall_extrainfo" style="width:250px;"></textarea></td>
																	  </tr>
																	</table>
																</td>
															  </tr>
															  <tr>
																<td align="left" id="delivery_willcall_startdate_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="21%" align="left">Enable On</td>
																		<td width="79%" align="left">
																				<input type="text" class="input" name="delivery_willcall_startdate" id="delivery_willcall_startdate" style="width:80px;"  onClick="displayCalendar(document.getElementById('delivery_willcall_startdate'),'yyyy-mm-dd',this);">
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_willcall_startdate_hour">
																					<option value="12">12</option>
																					<option value="0">0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																					<option value="8">8</option>
																					<option value="9">9</option>
																					<option value="10">10</option>
																					<option value="11">11</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_willcall_startdate_minute">
																					<option value="00">00</option>
																					<option value="15">15</option>
																					<option value="30">30</option>
																					<option value="45">45</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_willcall_startdate_ampm">
																					<option value="am">am</option>
																					<option value="pm" selected="selected">pm</option>
																				</select>
																		</td>
																	  </tr>
																	  <tr>
																		<td align="left">Disable On</td>
																		<td align="left">
																				<input type="text" class="input" name="delivery_willcall_enddate" id="delivery_willcall_enddate" style="width:80px;"  onClick="displayCalendar(document.getElementById('delivery_willcall_enddate'),'yyyy-mm-dd',this);">
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_willcall_enddate_hour">
																					<option value="12">12</option>
																					<option value="0">0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																					<option value="8">8</option>
																					<option value="9">9</option>
																					<option value="10">10</option>
																					<option value="11">11</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_willcall_enddate_minute">
																					<option value="00">00</option>
																					<option value="15">15</option>
																					<option value="30">30</option>
																					<option value="45">45</option>
																				</select>
																				<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="delivery_willcall_enddate_ampm">
																					<option value="am">am</option>
																					<option value="pm" selected="selected">pm</option>
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
										  
										  
										  <tr><td align="left" style="padding:5px;">
												<div class="wrapper" style="height:8px;"></div>
												<div class="wrapper" style="border-bottom:1px solid;border-color:#999999;"><strong>Donations</strong></div>
												
										  </td></tr>
										  <tr>
										  		<td align="left" style="padding:5px;">
										  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="25%" align="left" valign="top">Enable</td>
														<td width="75%" align="left" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tr>
																<td align="left">
																<input type="radio" name="donations_enable" id="donations_enable1" value="Yes" onClick="document.getElementById('donations_enable_ID').style.display='inline';"><label for="donations_enable1">Yes</label>&nbsp;&nbsp;
																<input type="radio" name="donations_enable" id="donations_enable2" value="No" checked="checked" onClick="document.getElementById('donations_enable_ID').style.display='none';"><label for="donations_enable2">No</label>&nbsp;&nbsp;</td>
															  </tr>
															  
															  <tr>
																<td align="left" id="donations_enable_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="40%" align="left">Donation Name</td>
																		<td width="60%" align="left"><input type="text" name="donations_name" class="input" id="donations_name"/></td>
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
										  
										  <tr><td align="left" style="padding:5px;">
												<div class="wrapper" style="height:8px;"></div>
												<div class="wrapper" style="border-bottom:1px solid;border-color:#999999;"><strong>Custom Fee</strong></div>
												
										  </td></tr>
										  <tr>
										  		<td align="left" style="padding:5px;">
										  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="25%" align="left" valign="top">Enable</td>
														<td width="75%" align="left" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tr>
																<td align="left">
																<input type="radio" name="customfee_enable" id="customfee_enable1" value="Yes" onClick="document.getElementById('customfee_enable_ID').style.display='inline';"><label for="customfee_enable1">Yes</label>&nbsp;&nbsp;
																<input type="radio" name="customfee_enable" id="customfee_enable2" value="No" checked="checked" onClick="document.getElementById('customfee_enable_ID').style.display='none';"><label for="customfee_enable2">No</label>&nbsp;&nbsp;</td>
															  </tr>
															  <tr>
																<td align="left" id="customfee_enable_ID" style="display:none;">
																	<table width="90%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="40%" align="left">Name of Fee</td>
																		<td width="60%" align="left"><input type="text" name="customfee_enable_nameoffee" class="input" id="customfee_enable_nameoffee" style="width:150px;"/></td>
																	  </tr>
																	  <tr>
																		<td width="40%" align="left">Type</td>
																		<td width="60%" align="left">
																			<select name="customfee_enable_type" id="customfee_enable_type" style="width:160px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px"><option value="Fixed Amount">Fixed Amount</option><option value="Percentage">Percentage</option></select>
																		</td>
																	  </tr>
																	  <tr>
																		<td width="40%" align="left">Amount(%)</td>
																		<td width="60%" align="left"><input type="text" name="customfee_enable_amount" class="input" id="customfee_enable_amount" value="0.00" style="width:150px;"/></td>
																	  </tr>
																	  <tr>
																		<td width="40%" align="left">Apply Fee</td>
																		<td width="60%" align="left">
																			<select name="customfee_enable_applyfee" id="customfee_enable_applyfee" style="width:160px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px"><option value="Before Discounts">Before Discounts</option><option value="After Discounts">After Discounts</option></select>
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
										  
										  
										  <tr><td align="left" style="padding:5px;">
												<div class="wrapper" style="height:8px;"></div>
												<div class="wrapper" style="border-bottom:1px solid;border-color:#999999;"><strong>Additional Settings</strong></div>
										 </td></tr>
										  <tr>
										  		<td align="left" style="padding:5px;">
										  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td width="25%" align="left" valign="top">Online Service Fee</td>
														<td width="75%" align="left" valign="top"><input type="text" name="additional_onlineservicefee" class="input" id="additional_onlineservicefee" style="width:50px;" value="0"/> % covered</td>
													  </tr>
													  <tr>
														<td width="25%" align="left" valign="top">Box Office Service Fee</td>
														<td width="75%" align="left" valign="top"><input type="text" name="additional_boservicefee" class="input" id="additional_boservicefee" style="width:50px;" value="0"/> % covered</td>
													  </tr>
													  <tr>
														<td width="25%" align="left" valign="top">Ticket Note</td>
														<td width="75%" align="left" valign="top"><input type="text" name="additional_ticketnote" class="input" id="additional_ticketnote" style="width:250px;" value=""/> </td>
													  </tr>
													  <tr>
														<td width="25%" align="left" valign="top">Ticket Trans. Limit</td>
														<td width="75%" align="left" valign="top"><input type="text" name="additional_ticket_tranlimit" class="input" id="additional_ticket_tranlimit" style="width:50px;" value=""/></td>
													  </tr>
													  <tr>
														<td width="25%" align="left" valign="top">Checkout Time Limit</td>
														<td width="75%" align="left" valign="top">
														<select type="text" name="additional_checkouttimelimit"   id="additional_checkouttimelimit"  style="width:160px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px">
														<? for($MM=5;$MM<=20;$MM++){?>
															<option value="<? echo $MM;?>"><? echo $MM;?> minute</option>
														<? }  ?>	
														</select>
														 </td>
													  </tr>
													  <tr>
														<td width="25%" align="left" valign="top">Private Event</td>
														<td width="75%" align="left" valign="top"><input type="radio" name="additional_privateevent"  id="additional_privateevent1"  value="Yes" checked="checked"/> Yes&nbsp;&nbsp;<input type="radio" name="additional_privateevent"  id="additional_privateevent2"  value="No"/> No</td>
													  </tr>
													  <tr>
														<td colspan="2">
														<input type="hidden" name="HidRegUser" id="HidRegUser" value="" />
														<a href="#"  class="button1"  onClick="return valid();" style="width:120px;" >Save & Continue</a></td>
													  </tr>
													</table>
										  		</td>
										  </tr>
										</table>
										</form>
									</figure>
								</div>
							</section>
							
						</div></div>
					</div>	
					
					
					<div style="height:30px;"></div>
				</div>					
				</div>
			</div>
		</article>
<!-- / content -->
<!-- footer -->
		<? include("footer.php");?>
<!-- / footer -->
	</div>
</div>
<script language="javascript" type="text/javascript">
function valid()
{
	form=document.AddeventForm;
	document.AddeventForm.HidRegUser.value='1';
	document.AddeventForm.submit();
	return  true;    
}
</script>

<script type="text/javascript">Cufon.now();</script>
</body>
</html>