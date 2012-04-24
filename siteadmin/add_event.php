<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=6;
$Message="";
if($_REQUEST['del']!="")
{
	$qrr=$_REQUEST['del'].'= \'\'' ;
	//echo "UPDATE products SET $qrr where id='".trim($_GET['id'])."'";
	$sql=mysql_query("UPDATE events SET $qrr where id='".trim($_GET['id'])."'");	
	header("location:add_event.php?id=".$_REQUEST['id']);
	exit;
}

if(isset($_POST['Submit']))
{
	$startdate=mdy_to_ymd($_POST['startdate']);
	$enddate=mdy_to_ymd($_POST['enddate']);
	$onsaledate=mdy_to_ymd($_POST['onsaledate']);
	$salesclosedate=mdy_to_ymd($_POST['salesclosedate']);
	
	if($_GET['id'])
	{
		$AddUserQry="UPDATE events SET
						eventtype='".addslashes($_POST['eventtype'])."',						
						name='".addslashes($_POST['name'])."',						
						startdate='".addslashes($startdate)."',
						startdate_hour='".addslashes($_POST['startdate_hour'])."',
						startdate_minute='".addslashes($_POST['startdate_minute'])."',
						startdate_ampm='".addslashes($_POST['startdate_ampm'])."',
						enddate='".addslashes($enddate)."',
						enddate_hour='".addslashes($_POST['enddate_hour'])."',
						enddate_minute='".addslashes($_POST['enddate_minute'])."',
						enddate_ampm='".addslashes($_POST['enddate_ampm'])."',
						venueid='".addslashes($_POST['venueid'])."',
						description='".addslashes($_POST['description'])."',
						onsaledate='".addslashes($onsaledate)."',
						onsaledate_hour='".addslashes($_POST['onsaledate_hour'])."',
						onsaledate_minute='".addslashes($_POST['onsaledate_minute'])."',
						onsaledate_ampm='".addslashes($_POST['onsaledate_ampm'])."',
						immediately='".addslashes($_POST['immediately'])."',
						salesclosedate='".addslashes($salesclosedate)."',
						salesclosedate_hour='".addslashes($_POST['salesclosedate_hour'])."',
						salesclosedate_minute='".addslashes($_POST['salesclosedate_minute'])."',
						salesclosedate_ampm='".addslashes($_POST['salesclosedate_ampm'])."',
						category='".addslashes($_POST['category'])."',
						ages='".addslashes($_POST['ages'])."',
						website='".addslashes($_POST['website'])."',
						flickerurl='".addslashes($_POST['flickerurl'])."',
						vimeourl='".addslashes($_POST['vimeourl'])."',
						picture_display='".addslashes($_POST['picture_display'])."' where id='".$_REQUEST['id']."'";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		$insertid=mysql_insert_id();
		
		if($_FILES["picture"]['tmp_name'])
		{
			 $file=$_FILES["picture"];	
			 //$send_name1=ereg_replace (" ", "",$file["name"]); 			
			 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);		
			 $filename1=rand().$send_name1;		
			 $filetoupload=$file['tmp_name'];				 
			 $path="../Events/".$filename1; 
			 copy($filetoupload,$path);
			 
			 $AddUserQry="UPDATE events SET picture='$filename1' where id='".$_REQUEST['id']."'";	 
			 $AddUserQryRs=mysql_query($AddUserQry);
		}
		header("location:add_event_step2.php?id=".$_REQUEST['id']."");
	}
	else
	{
		$AddUserQry="INSERT INTO events SET
						eventtype='".addslashes($_POST['eventtype'])."',						
						name='".addslashes($_POST['name'])."',						
						userid='0',
						startdate='".addslashes($startdate)."',
						startdate_hour='".addslashes($_POST['startdate_hour'])."',
						startdate_minute='".addslashes($_POST['startdate_minute'])."',
						startdate_ampm='".addslashes($_POST['startdate_ampm'])."',
						enddate='".addslashes($enddate)."',
						enddate_hour='".addslashes($_POST['enddate_hour'])."',
						enddate_minute='".addslashes($_POST['enddate_minute'])."',
						enddate_ampm='".addslashes($_POST['enddate_ampm'])."',
						venueid='".addslashes($_POST['venueid'])."',
						description='".addslashes($_POST['description'])."',
						onsaledate='".addslashes($onsaledate)."',
						onsaledate_hour='".addslashes($_POST['onsaledate_hour'])."',
						onsaledate_minute='".addslashes($_POST['onsaledate_minute'])."',
						onsaledate_ampm='".addslashes($_POST['onsaledate_ampm'])."',
						immediately='".addslashes($_POST['immediately'])."',
						salesclosedate='".addslashes($salesclosedate)."',
						salesclosedate_hour='".addslashes($_POST['salesclosedate_hour'])."',
						salesclosedate_minute='".addslashes($_POST['salesclosedate_minute'])."',
						salesclosedate_ampm='".addslashes($_POST['salesclosedate_ampm'])."',
						category='".addslashes($_POST['category'])."',
						ages='".addslashes($_POST['ages'])."',
						website='".addslashes($_POST['website'])."',
						flickerurl='".addslashes($_POST['flickerurl'])."',
						vimeourl='".addslashes($_POST['vimeourl'])."',
						picture_display='".addslashes($_POST['picture_display'])."',
						addeddate=curdate()";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		$insertid=mysql_insert_id();
		
		if($_FILES["picture"]['tmp_name'])
		{
			 $file=$_FILES["picture"];	
			 //$send_name1=ereg_replace (" ", "",$file["name"]); 			
			 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);		
			 $filename1=rand().$send_name1;		
			 $filetoupload=$file['tmp_name'];				 
			 $path="../Events/".$filename1; 
			 copy($filetoupload,$path);
			 
			 $AddUserQry="UPDATE events SET picture='$filename1' where id='".$insertid."'";	 
			 $AddUserQryRs=mysql_query($AddUserQry);
		}
		
		header("location:add_event_step2.php?id=".$insertid."");
		exit;
	}	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from events where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$tot=mysql_affected_rows();
	if($tot>0)
	{
		$Row=mysql_fetch_array($SELRs);
	}
	else
	{
		header("location:add_event.php");
		exit;
	}	
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
<script language="javascript">
function closeshadow()
{
	venuedropdown('venuedropdown_ID');
}
</script>
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Event</td>
                </tr>
				<? if($_REQUEST['id']!=''){?>
				<tr>
                  <td height="35"><input type="button" name="Step1" value="Step 1" onClick="window.location.href='add_event.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step2" value="Price Levels" onClick="window.location.href='add_event_step2.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /> <input type="button" name="Step3" value="Delivery Methods" onClick="window.location.href='add_event_step3.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />  <input type="button" name="Step4" value="Time Slots" onClick="window.location.href='add_event_step4.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" />  <input type="button" name="Step5" value="Photos & Videos" onClick="window.location.href='add_event_step5.php?id=<? echo $_REQUEST['id'];?>'" class="bttn-a" /></td>
                </tr>
				<? } ?>
                <tr>
                  <td height="222" class="formbg" valign="top">
				  	<form id="AddeventForm" name="AddeventForm" enctype="multipart/form-data" method="post">
                      <table cellspacing="2" cellpadding="2" width=98% border="0" class="t-b">
                        <tr>
                         <td class="a" align="right" colspan="4">*= Required Information</td>
                        </tr>
						<? if($Message){?>
						<tr>
                         <td class="a" align="center" colspan="4"><?=$Message;?>&nbsp;</td>
                        </tr>
						<? }?>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Type of Event:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="radio" name="eventtype" id="eventtype" value="Single"  <? if($Row['eventtype']=="Single" || $Row['eventtype']==""){?>checked="checked"<? } ?>>Single&nbsp;&nbsp;<input type="radio" name="eventtype" id="eventtype" value="Series" <? if($Row['eventtype']=="Series"){?>checked="checked"<? } ?>>Series&nbsp;&nbsp;</td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Event Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="name" id="name" style="width:400px;" value="<? echo htmlentities(stripslashes($Row['name']));?>" ></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Event Date:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><? if($Row['startdate']!='' && $Row['startdate']!='0000-00-00'){$startdate=ymd_to_mdy($Row['startdate']);}else{$startdate='';}?>
						  <input type="text" class="solidinput" name="startdate" id="startdate" style="width:80px;" value="<? echo stripslashes($startdate);?>"  onClick="displayCalendar(document.getElementById('startdate'),'mm/dd/yyyy',this);" >
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="startdate_hour">
								<option value="12" <? if($Row['startdate_hour']=="12" || $Row['startdate_hour']==''){echo "selected";}?>>12</option>
								<option value="0" <? if($Row['startdate_hour']=="0"){echo "selected";}?>>0</option>
								<option value="1" <? if($Row['startdate_hour']=="1"){echo "selected";}?>>1</option>
								<option value="2" <? if($Row['startdate_hour']=="2"){echo "selected";}?>>2</option>
								<option value="3" <? if($Row['startdate_hour']=="3"){echo "selected";}?>>3</option>
								<option value="4" <? if($Row['startdate_hour']=="4"){echo "selected";}?>>4</option>
								<option value="5" <? if($Row['startdate_hour']=="5"){echo "selected";}?>>5</option>
								<option value="6" <? if($Row['startdate_hour']=="6"){echo "selected";}?>>6</option>
								<option value="7" <? if($Row['startdate_hour']=="7"){echo "selected";}?>>7</option>
								<option value="8" <? if($Row['startdate_hour']=="8"){echo "selected";}?>>8</option>
								<option value="9" <? if($Row['startdate_hour']=="9"){echo "selected";}?>>9</option>
								<option value="10" <? if($Row['startdate_hour']=="10"){echo "selected";}?>>10</option>
								<option value="11" <? if($Row['startdate_hour']=="11"){echo "selected";}?>>11</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="startdate_minute">
								<option value="00" <? if($Row['startdate_minute']=="00" || $Row['startdate_minute']==""){echo "selected";}?>>00</option>
								<option value="15" <? if($Row['startdate_minute']=="15"){echo "selected";}?>>15</option>
								<option value="30" <? if($Row['startdate_minute']=="30"){echo "selected";}?>>30</option>
								<option value="45" <? if($Row['startdate_minute']=="45"){echo "selected";}?>>45</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="startdate_ampm">
								<option value="am" <? if($Row['startdate_ampm']=="am"){echo "selected";}?>>am</option>
								<option value="pm"  <? if($Row['startdate_ampm']=="pm" || $Row['startdate_ampm']==''){echo "selected";}?>>pm</option>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><span class="a">*</span><strong>Event End Date:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><? if($Row['enddate']!='' && $Row['enddate']!='0000-00-00'){$enddate=ymd_to_mdy($Row['enddate']);}else{$enddate='';}?>
						  <input type="text" class="solidinput" name="enddate" id="enddate" style="width:80px;" value="<? echo stripslashes($enddate);?>" onClick="displayCalendar(document.getElementById('enddate'),'mm/dd/yyyy',this);" >
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="enddate_hour">
								<option value="12" <? if($Row['enddate_hour']=="12" || $Row['enddate_hour']==''){echo "selected";}?>>12</option>
								<option value="0" <? if($Row['enddate_hour']=="0"){echo "selected";}?>>0</option>
								<option value="1" <? if($Row['enddate_hour']=="1"){echo "selected";}?>>1</option>
								<option value="2" <? if($Row['enddate_hour']=="2"){echo "selected";}?>>2</option>
								<option value="3" <? if($Row['enddate_hour']=="3"){echo "selected";}?>>3</option>
								<option value="4" <? if($Row['enddate_hour']=="4"){echo "selected";}?>>4</option>
								<option value="5" <? if($Row['enddate_hour']=="5"){echo "selected";}?>>5</option>
								<option value="6" <? if($Row['enddate_hour']=="6"){echo "selected";}?>>6</option>
								<option value="7" <? if($Row['enddate_hour']=="7"){echo "selected";}?>>7</option>
								<option value="8" <? if($Row['enddate_hour']=="8"){echo "selected";}?>>8</option>
								<option value="9" <? if($Row['enddate_hour']=="9"){echo "selected";}?>>9</option>
								<option value="10" <? if($Row['enddate_hour']=="10"){echo "selected";}?>>10</option>
								<option value="11" <? if($Row['enddate_hour']=="11"){echo "selected";}?>>11</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="enddate_minute" >
								<option value="00" <? if($Row['enddate_minute']=="00" || $Row['enddate_minute']==""){echo "selected";}?>>00</option>
								<option value="15" <? if($Row['enddate_minute']=="15"){echo "selected";}?>>15</option>
								<option value="30" <? if($Row['enddate_minute']=="30"){echo "selected";}?>>30</option>
								<option value="45" <? if($Row['enddate_minute']=="45"){echo "selected";}?>>45</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="enddate_ampm">
								<option value="am" <? if($Row['enddate_ampm']=="am"){echo "selected";}?>>am</option>
								<option value="pm"  <? if($Row['enddate_ampm']=="pm" || $Row['enddate_ampm']==''){echo "selected";}?>>pm</option>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Venue:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <span id="venuedropdown_ID">
							<select name="venueid" id="venueid" style="width:260px;padding:1px 2px;font:11px;height:20px">
								<option value="">Select a venue</option>
								 <? 
									$rs11=mysql_query("select * from event_venues    order by name ASC ");
									$tot11=mysql_affected_rows();
									for($m=0;$m<$tot11;$m++)
									{
										$gr22=mysql_fetch_object($rs11);
								  ?>
								  <option value="<?=$gr22->id?>"  <? if($Row['venueid']==$gr22->id){echo "selected";}?>  ><?=stripslashes($gr22->name); ?> in <?=stripslashes($gr22->city); ?>, <?=stripslashes($gr22->state); ?></option>
								  <? }?>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top">&nbsp;</td>
                          <td height="25" colspan="3" valign="top"><a  href="#" onClick="javascript:window.open('addnewvenue.php','','width=400,height=300');return false;"  class='example5' style="float:left;padding:0px;width:150px;">Add New Venue</a></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Description:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><textarea name="description" class="solidinput" style="width:250px;height:80px;" id="description" ><? echo htmlentities(stripslashes($Row['description']));?></textarea></td>
                        </tr>
						<tr>
                          <td height="25" colspan="4" align="left" valign="middle" class="blue"><strong><span class="a"></span> Sale Times&nbsp;</strong></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>On-sale Date:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><? if($Row['onsaledate']!='' && $Row['onsaledate']!='0000-00-00'){$onsaledate=ymd_to_mdy($Row['onsaledate']);}else{$onsaledate='';}?>
						  <input type="text" class="solidinput" name="onsaledate" id="onsaledate" style="width:80px;" value="<? echo stripslashes($onsaledate);?>"  onClick="displayCalendar(document.getElementById('onsaledate'),'mm/dd/yyyy',this);"> 
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="onsaledate_hour">
								<option value="12" <? if($Row['onsaledate_hour']=="12" || $Row['onsaledate_hour']==''){echo "selected";}?>>12</option>
								<option value="0" <? if($Row['onsaledate_hour']=="0"){echo "selected";}?>>0</option>
								<option value="1" <? if($Row['onsaledate_hour']=="1"){echo "selected";}?>>1</option>
								<option value="2" <? if($Row['onsaledate_hour']=="2"){echo "selected";}?>>2</option>
								<option value="3" <? if($Row['onsaledate_hour']=="3"){echo "selected";}?>>3</option>
								<option value="4" <? if($Row['onsaledate_hour']=="4"){echo "selected";}?>>4</option>
								<option value="5" <? if($Row['onsaledate_hour']=="5"){echo "selected";}?>>5</option>
								<option value="6" <? if($Row['onsaledate_hour']=="6"){echo "selected";}?>>6</option>
								<option value="7" <? if($Row['onsaledate_hour']=="7"){echo "selected";}?>>7</option>
								<option value="8" <? if($Row['onsaledate_hour']=="8"){echo "selected";}?>>8</option>
								<option value="9" <? if($Row['onsaledate_hour']=="9"){echo "selected";}?>>9</option>
								<option value="10" <? if($Row['onsaledate_hour']=="10"){echo "selected";}?>>10</option>
								<option value="11" <? if($Row['onsaledate_hour']=="11"){echo "selected";}?>>11</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="onsaledate_minute">
								<option value="00" <? if($Row['onsaledate_minute']=="00" || $Row['onsaledate_minute']==""){echo "selected";}?>>00</option>
								<option value="15" <? if($Row['onsaledate_minute']=="15"){echo "selected";}?>>15</option>
								<option value="30" <? if($Row['onsaledate_minute']=="30"){echo "selected";}?>>30</option>
								<option value="45" <? if($Row['onsaledate_minute']=="45"){echo "selected";}?>>45</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="onsaledate_ampm">
								<option value="am" <? if($Row['onsaledate_ampm']=="am"){echo "selected";}?>>am</option>
								<option value="pm"  <? if($Row['onsaledate_ampm']=="pm" || $Row['onsaledate_ampm']==''){echo "selected";}?>>pm</option>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top">&nbsp;</td>
                          <td height="25" colspan="3" valign="top"><input type="checkbox" name="immediately" id="immediately" <? if($Row['immediately']=="Yes"){echo "checked";}?> value="Yes">Immediately</td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong>Close Date:</strong></td>
                          <td height="25" colspan="3" valign="top"><? if($Row['salesclosedate']!='' && $Row['salesclosedate']!='0000-00-00'){$salesclosedate=ymd_to_mdy($Row['salesclosedate']);}else{$salesclosedate='';}?>
						  <input type="text" class="solidinput" name="salesclosedate" id="salesclosedate" style="width:80px;" value="<? echo stripslashes($salesclosedate);?>" onClick="displayCalendar(document.getElementById('salesclosedate'),'mm/dd/yyyy',this);">
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="salesclosedate_hour">
								<option value="12" <? if($Row['salesclosedate_hour']=="12" || $Row['salesclosedate_hour']==''){echo "selected";}?>>12</option>
								<option value="0" <? if($Row['salesclosedate_hour']=="0"){echo "selected";}?>>0</option>
								<option value="1" <? if($Row['salesclosedate_hour']=="1"){echo "selected";}?>>1</option>
								<option value="2" <? if($Row['salesclosedate_hour']=="2"){echo "selected";}?>>2</option>
								<option value="3" <? if($Row['salesclosedate_hour']=="3"){echo "selected";}?>>3</option>
								<option value="4" <? if($Row['salesclosedate_hour']=="4"){echo "selected";}?>>4</option>
								<option value="5" <? if($Row['salesclosedate_hour']=="5"){echo "selected";}?>>5</option>
								<option value="6" <? if($Row['salesclosedate_hour']=="6"){echo "selected";}?>>6</option>
								<option value="7" <? if($Row['salesclosedate_hour']=="7"){echo "selected";}?>>7</option>
								<option value="8" <? if($Row['salesclosedate_hour']=="8"){echo "selected";}?>>8</option>
								<option value="9" <? if($Row['salesclosedate_hour']=="9"){echo "selected";}?>>9</option>
								<option value="10" <? if($Row['salesclosedate_hour']=="10"){echo "selected";}?>>10</option>
								<option value="11" <? if($Row['salesclosedate_hour']=="11"){echo "selected";}?>>11</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="salesclosedate_minute">
								<option value="00" <? if($Row['salesclosedate_minute']=="00" || $Row['salesclosedate_minute']==""){echo "selected";}?>>00</option>
								<option value="15" <? if($Row['salesclosedate_minute']=="15"){echo "selected";}?>>15</option>
								<option value="30" <? if($Row['salesclosedate_minute']=="30"){echo "selected";}?>>30</option>
								<option value="45" <? if($Row['salesclosedate_minute']=="45"){echo "selected";}?>>45</option>
							</select>
							<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="salesclosedate_ampm">
								<option value="am" <? if($Row['salesclosedate_ampm']=="am"){echo "selected";}?>>am</option>
								<option value="pm"  <? if($Row['salesclosedate_ampm']=="pm" || $Row['salesclosedate_ampm']==''){echo "selected";}?>>pm</option>
							</select>
						  </td>
                        </tr>
						
						<tr>
                          <td  height="25" colspan="4" align="left" valign="middle" class="blue"><strong><span class="a"></span> Settings</strong></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span>Category:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <select name="category" id="category" style="width:260px;padding:1px 2px;font:11px;height:20px">
								<option value="">Select Category</option>
								 <? 
									$rs11=mysql_query("select * from event_category    order by name ASC ");
									$tot11=mysql_affected_rows();
									for($m=0;$m<$tot11;$m++)
									{
										$gr22=mysql_fetch_object($rs11);
								  ?>
								  <option value="<?=$gr22->id?>" <? if($Row['category']==$gr22->id){echo "selected";}?> ><?=stripslashes($gr22->name); ?></option>
								  <? }?>
							</select>
						  </td>
                        </tr>
						
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span>Ages:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <select name="ages" id="ages" style="width:260px;padding:1px 2px;font:11px;height:20px">
								<option value="">Select Age Group</option>
								<option value="All Ages" <? if($Row['ages']=="All Ages"){echo "selected";}?>>All Ages</option>
								<option value="18 and over" <? if($Row['ages']=="18 and over"){echo "selected";}?>>18 and over</option>
								<option value="19 and over" <? if($Row['ages']=="19 and over"){echo "selected";}?>>19 and over</option>
								<option value="21 and over" <? if($Row['ages']=="21 and over"){echo "selected";}?>>21 and over</option> 
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>Event Website:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" name="website" id="website" class="solidinput" style="width:260px;" value="<? if($Row['website']==""){ echo "http://";}else{ echo htmlentities(stripslashes($Row['website'])); }?>" /></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>Flickr Page:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" name="flickerurl" id="flickerurl" class="solidinput" style="width:360px;" value="<? if($Row['flickerurl']==""){ echo "http://";}else{ echo htmlentities(stripslashes($Row['flickerurl'])); }?>" /></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>Vimeo Page:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" name="vimeourl" id="vimeourl" class="solidinput" style="width:360px;" value="<? if($Row['vimeourl']==""){ echo "http://";}else{ echo htmlentities(stripslashes($Row['vimeourl'])); }?>" /></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>Image:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="file" name="picture" id="picture" />
						  <? if($Row['picture']!=''){?><br><img src="../Events/<? echo $Row['picture'];?>" height="120"><? } ?>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top">&nbsp;</td>
                          <td height="25" colspan="3" valign="top"><input type="checkbox" name="picture_display" id="picture_display" value="Y" <? if($Row['picture_display']=="Y" || $_REQUEST['id']==''){echo "checked";}?> >Display image on event listing</td>
                        </tr>

                        <tr>
                          <td align="right">&nbsp;</td>
                          <td width="79%" colspan="3"><INPUT type=submit name="Submit" value="<? echo $Buttitle;?>" onClick="return valid();" class="bttn-s">                          </td>
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

	if(form.name.value.split(" ").join("")=="")
	{
		alert("Please enter name.")
		form.name.focus();
		return false;
	}
	if(form.startdate.value.split(" ").join("")=="")
	{
		alert("Please enter event start date.")
		form.startdate.focus();
		return false;
	}
	if(form.enddate.value.split(" ").join("")=="")
	{
		alert("Please enter event end date.")
		form.enddate.focus();
		return false;
	}
	if(form.venueid.value.split(" ").join("")=="")
	{
			alert("Please select venue.")
			form.venueid.focus();
			return false;
	}
	if(form.description.value.split(" ").join("")=="")
	{
			alert("Please enter description.")
			form.description.focus();
			return false;
	}
	if(form.category.value.split(" ").join("")=="")
	{
			alert("Please select category.")
			form.category.focus();
			return false;
	}
	if(form.ages.value.split(" ").join("")=="")
	{
			alert("Please select ages.")
			form.ages.focus();
			return false;
	}
	//document.AddeventForm.HidRegUser.value='1';
	//document.AddeventForm.submit();
	return  true;    
}
</script>
</body>
</html>