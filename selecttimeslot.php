<?
include("connect.php");

if($_POST['HidRegUser']=="1")
{
		$eventId = trim(mysql_real_escape_string($_GET['eventid']));
		$selectevent = "select * from events where id='$eventId'";
		$rsselectevent = mysql_query($selectevent);
		
		$rowselectevent = mysql_fetch_array($rsselectevent);
		$EventName = stripslashes($rowselectevent['name']);
		$venueid = stripslashes($rowselectevent['venueid']);
		
		$selectvenee = "select * from event_venues where id = '$venueid'";
		$rsselectvenue = mysql_query($selectvenee);
		$rowselectvenue = mysql_fetch_assoc($rsselectvenue);
		$Address_1 = stripslashes($rowselectvenue['address']);
		$city = stripslashes($rowselectvenue['city']);
		$state= stripslashes($rowselectvenue['state']);
		$zipcode = stripslashes($rowselectvenue['zipcode']);
		$country = stripslashes($rowselectvenue['country']);
		$venuename = stripslashes($rowselectvenue['name']);


		$ProductQry="SELECT * FROM events_timeslots WHERE id=".mysql_real_escape_string(trim($_GET['timeslotid']))." ";
		$ProductQryRs=mysql_query($ProductQry);
		$TotProduct=mysql_affected_rows();
		if($TotProduct<=0)
		{
			header("location:index.php");
			exit;
		}
		$ProductQryRow=mysql_fetch_array($ProductQryRs);
		
		$AddUserQry="INSERT INTO events_timeslots_selected SET
						userid='".addslashes($_SESSION['UsErId'])."',						
						eventid='".addslashes($_REQUEST['eventid'])."',						
						timeslotid='".addslashes($_POST['timeslotid'])."',
						slot_hour='".addslashes($ProductQryRow['slot_hour'])."',
						slot_minute='".addslashes($ProductQryRow['slot_minute'])."',
						slot_ampm='".addslashes($ProductQryRow['slot_ampm'])."',
						slot_duration='".addslashes($ProductQryRow['slot_duration'])."',
						status='Pending',
						addeddate=curdate()";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		$InserId=mysql_insert_id();
		//$_SESSION['UsErId']=$InserId;
		
		$toemail=$ADMIN_MAIL;
		$subject1="Time slot selection at ".ucfirst($SITE_NAME)."";
		$from1=$ADMIN_MAIL;
		$mailcontent1="
		<html>
			<body>
				<table cellpadding=\"0\" cellspacing=\"0\" width=\"0\">
					<tr>
						<Td align=\"left\" colspan=\"2\">Hello Admin,</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">&nbsp;</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Time slot has been selected by user at ".ucfirst($SITE_NAME)."</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">&nbsp;</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Event Details: <a href='".$SITE_URL."/eventdetail.php?eventId=".$eventId."'>".stripslashes($EventName)."</a></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Event Venue: ".$Address_1.", ".$city.", ".$state." ".$zipcode." ".$country."</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">&nbsp;</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Time Slot: ".stripslashes($ProductQryRow['slot_hour']).":".stripslashes($ProductQryRow['slot_minute'])." ".stripslashes($ProductQryRow['slot_ampm'])." | ".stripslashes($ProductQryRow['slot_duration'])." Minutes</td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">User Name: <a href='".$SITE_URL."/viewprofile.php?id=".$_SESSION['UsErId']."'>".stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId']))." ".stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId']))."</a></td>
					</tr>
					<tr>
						<Td align=\"left\" colspan=\"2\">Thank you.</td>
					</tr>
			</table>
			</body>
		</html>";
		//echo $toemail;echo $subject1;echo $mailcontent1;echo $from1;
		if($_SERVER['HTTP_HOST']!="plus")
		{
			HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
		}
		
		$ProductQry="UPDATE events_timeslots set status='Assigned' WHERE id=".mysql_real_escape_string(trim($_GET['timeslotid']))." ";
		$ProductQryRs=mysql_query($ProductQry);
		
		header("location:selecttimeslot.php?msg=Your request has been sent to admin.&timeslotid=".$_REQUEST['timeslotid']."&eventid=".$_REQUEST['eventid']."");			
		exit;
}

if(mysql_real_escape_string(trim($_GET['timeslotid']))>0 && mysql_real_escape_string(trim($_GET['timeslotid']))!="")
{
	$ProductQry="SELECT * FROM events_timeslots WHERE id=".mysql_real_escape_string(trim($_GET['timeslotid']))." and eventid=".mysql_real_escape_string(trim($_GET['eventid']))." order by id desc";
	$ProductQryRs=mysql_query($ProductQry);
	$TotProduct=mysql_affected_rows();
	if($TotProduct<=0)
	{
		header("location:index.php");
		exit;
	}
	$ProductQryRow=mysql_fetch_array($ProductQryRs);
}
else
{
	header("location:index.php");
	exit;
}
?>
<form name="frmselect" id="frmselect" enctype="multipart/form-data" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" height="180" valign="middle" style="color:#FFFFFF">
	<? if($_REQUEST['msg']!=''){ echo "<span style='color:#ff0000'>".$_REQUEST['msg']."</span><br>"; } ?>
	<? echo stripslashes($ProductQryRow['slot_hour']);?>:<? echo stripslashes($ProductQryRow['slot_minute']);?> <? echo stripslashes($ProductQryRow['slot_ampm']);?> | <? echo stripslashes($ProductQryRow['slot_duration']);?> Minutes
	<br><br>
	<input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
	<input type="hidden" name="eventid" id="eventid" value="<? echo $_REQUEST['eventid']?>">
	<input type="hidden" name="timeslotid" id="timeslotid" value="<? echo $_REQUEST['timeslotid']?>">
	<input type="button" value="Click Here to Select Time Slot" onClick="return valid();" /></td>
  </tr>
</table>
</form>
<script language="javascript" type="text/javascript">
function valid()
{
	form=document.frmselect;
	document.frmselect.HidRegUser.value='1';
	document.frmselect.submit();
	return  true;
}
</script>
