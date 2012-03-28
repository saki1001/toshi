<?
include("connect.php");
if($_POST['HidSubmitAddUser']=="1")
{
	$subject1=stripslashes($_POST['emailsubject']);
	
	$ProductQry="SELECT * FROM events WHERE id=".mysql_real_escape_string(trim($_GET['eventid']))." order by id desc";
	$ProductQryRs=mysql_query($ProductQry);
	$TotProduct=mysql_affected_rows();
	if($TotProduct<=0)
	{
		header("location:index.php");
		exit;
	}
	$ProductQryRow=mysql_fetch_array($ProductQryRs);
	$EventName = stripslashes($ProductQryRow['name']);
	$venueid = stripslashes($ProductQryRow['venueid']);
	
	$selectvenee = "select * from event_venues where id = '$venueid'";
	$rsselectvenue = mysql_query($selectvenee);
	$rowselectvenue = mysql_fetch_array($rsselectvenue);
	$Address_1 = stripslashes($rowselectvenue['address']);
	$city = stripslashes($rowselectvenue['city']);
	$state= stripslashes($rowselectvenue['state']);
	$zipcode = stripslashes($rowselectvenue['zipcode']);
	$country = stripslashes($rowselectvenue['country']);
	$venuename = stripslashes($rowselectvenue['name']);
	$alladdress="<br>".$Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
	$update1=$getitem->startdate;
	if($update1!="")
	{
		list($year, $month, $day) = split('-', $update1);
	}
	if($year!='' && $month!='' && $day!='')
	{
			$disdate1=date("l, F j, Y", mktime(0, 0, 0, $month, $day, $year));
	}
	$disptime="";
	if($getitem->startdate_hour!='')
	{
		$disptime = "(".$getitem->startdate_hour.":".$getitem->startdate_minute." ".$getitem->startdate_ampm.")";
	}
	
	$mailcontent1="<html>
		<head>
		<style>
		td {
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
			color:#000000;
			text-decoration:none;
		}
		</style>
		</head>
		<body>
		<table  bgcolor='#ffffff' width=800 cellpadding=2 cellspacing=2 border=0>
		  <tr>
			<td align=left bgcolor='#ffffff'><a href='$SITE_URL'><img src='$SITE_URL/images/logo.jpg' border='0'></a></td>
		  </tr>
		  <tr>
			<td  align=center bgcolor='#ffffff'><table width='98%' border='0' cellspacing='0' cellpadding='0'>
				<tr>
				  <td><br>Hello, ".stripslashes($_POST['friendname'])."!<br><br>
					Your friend, ".stripslashes($_POST['yourname']).", thought you might be interested in this event they found on our site.
					<br>
					".nl2br(stripslashes($_POST['message']))."<br>
					</td>
				</tr>
				<tr>
				  <td valign='top'><table width='100%' border='0' cellspacing='2' cellpadding='0'>
					  <tr>
						<td valign='top'>
							<table width='100%' border='0' cellspacing='2' cellpadding='3'>
							  <tr>
								<td align='left'><a href='$SITE_URL/eventdetail.php?eventId=".stripslashes($ProductQryRow['id'])."'><strong>".ucfirst(stripslashes($ProductQryRow['name']))."</strong></a></td>
							  </tr>
							  <tr>
								<td align='left'>".$venuename.$alladdress."</td>
							  </tr>
							  <tr>
								<td align='left'>&nbsp;</td>
							  </tr>
							  <tr>
								<td align='left'><strong>Description</strong></td>
							  </tr>
							  <tr>
								<td align='left'>".nl2br(stripslashes($ProductQryRow['description']))."</td>
							  </tr>
							</table>
						</td>
					  </tr>
					</table></td>
				</tr>
				<tr>
				  <td><br>Sincerely,<br>Your new friends at $SITE_NAME<br></td>
				</tr>
			  </table></td>
		  </tr>
		</table>
		</body>
		</html>";							
	//echo $mailcontent1;
	if($_SERVER['HTTP_HOST']!="plus")
	{
		HtmlMailSend(stripslashes($_POST['friendemail']),$subject1,$mailcontent1,$ADMIN_MAIL);
	}	
	
	$AddUserQry="INSERT INTO emailafriend SET
					userid='".addslashes($_SESSION['UsErId'])."',						
					eventid='".addslashes($_REQUEST['eventid'])."',						
					friendname='".addslashes($_POST['friendname'])."',
					friendemail='".addslashes($_POST['friendemail'])."',
					sendername='".addslashes($_POST['yourname'])."',
					senderemail='".addslashes($_POST['youremail'])."',
					emailsubject='".addslashes($_POST['emailsubject'])."',
					message='".addslashes($_POST['message'])."',
					datesent=now()";	 
	$AddUserQryRs=mysql_query($AddUserQry);
	$InserId=mysql_insert_id();
	//$_SESSION['UsErId']=$InserId;
	
	$message="Thank You. Your email has been sent.";
}

if(mysql_real_escape_string(trim($_GET['eventid']))>0 && mysql_real_escape_string(trim($_GET['eventid']))!="")
{
	$ProductQry="SELECT * FROM events WHERE id=".mysql_real_escape_string(trim($_GET['eventid']))." order by id desc";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Events |<? echo $SITE_NAME;?></title>
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

<script language="javascript1.1" type="text/javascript" src="ajax_validation.js"></script>
</head>
<body id="page5">
<div class="body1">
<form name="FrmProdetailpageRating" id="FrmProdetailpageRating" enctype="multipart/form-data" method="post">
  <table width="850" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr align="left" valign="top">
      <td ><table width="850" align="center" cellpadding="0" cellspacing="0">
          
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="850" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="top" ><table width="100%" border="0" cellpadding="8" cellspacing="0" class="border_red">
                            <tr>
                              <td height="34" align="left" valign="top" style="padding:5px;font-size:18px;" ><strong>Email to a Friend</strong></td>
                            </tr>
                            <? if($message==""){?>
							<tr>
                              <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="258" align="left" valign="top"><table width="250" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td align="left" valign="top"><table width="250%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><table width="240" border="0" cellspacing="0" cellpadding="0">
                                                    <?
													$eventId = trim(mysql_real_escape_string($_GET['eventid']));
													$selectevent = "select * from events where id='$eventId'";
													$rsselectevent = mysql_query($selectevent);
													$rowselectevent = mysql_fetch_array($rsselectevent);
													$EventName = stripslashes($rowselectevent['name']);
													$venueid = stripslashes($rowselectevent['venueid']);
												 ?>
												  <tr>
													<Td colspan="3" style="padding:5px;">
													<Table cellpadding="0" cellspacing="0" width="100%"> 
															<tr>
																<Td colspan="2">
																	<A HREF='#' class="link1" style="color:#990000;"><font size=2><b><u><? echo stripslashes($EventName);?></u></b></font></A> <font size="1"></font>															</Td>
															</tr>
															<tr>
																<Td colspan="2" style="font-size:12px">
																	<?
																		$selectvenee = "select * from event_venues where id = '$venueid'";
																		$rsselectvenue = mysql_query($selectvenee);
																		$rowselectvenue = mysql_fetch_array($rsselectvenue);
																		$Address_1 = stripslashes($rowselectvenue['address']);
																		$city = stripslashes($rowselectvenue['city']);
																		$state= stripslashes($rowselectvenue['state']);
																		$zipcode = stripslashes($rowselectvenue['zipcode']);
																		$country = stripslashes($rowselectvenue['country']);
																		$venuename = stripslashes($rowselectvenue['name']);
																		echo $venuename."<br>";
																		echo $Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
																		$update1=$getitem->startdate;
																		if($update1!="")
																		{
																			list($year, $month, $day) = split('-', $update1);
																		}
																		if($year!='' && $month!='' && $day!='')
																		{
																				$disdate1=date("l, F j, Y", mktime(0, 0, 0, $month, $day, $year));
																		}
																		$disptime="";
																		if($getitem->startdate_hour!='')
																		{
																			$disptime = "(".$getitem->startdate_hour.":".$getitem->startdate_minute." ".$getitem->startdate_ampm.")";
																		}
																	?>
																</Td>	
															</tr>
															<tr>
																<td width="85%" style="font-size:12px; font-weight:bold"><? echo stripslashes($disdate1);?>&nbsp;<? echo $disptime;?></td>
																
															</tr>
														</Table></td>
												  </tr>
                                                    <tr>
                                                      <td align="left" valign="top" style="padding:5px;"><strong>Tell a friend about this event!</strong><br />
                                                        Just complete this simple form and click Submit. We will not use email addresses provided for any purpose other than this notification. </td>
                                                    </tr>
													<tr>
                                                      <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                  </table></td>
                                              </tr>
                                              <?php /*?><tr>
											<td align="left" valign="top" class="product_detail_thum"><img src="images/prod/thum1.jpg" name="thumb1" width="48" height="48" class="thum-img-border" id="thumb1" onclick="MM_swapImage('pro1','','images/prod/prod-big-thum.jpg',1)" /><img src="images/prod/thum2.jpg" name="thumb2" width="48" height="48" class="thum-img-border" id="thumb2" onclick="MM_swapImage('pro1','','images/prod/prod-big2.jpg',1)" /><img src="images/prod/thum3.jpg" name="thumb3" width="48" height="48" class="thum-img-border" id="thumb3" onclick="MM_swapImage('pro1','','images/prod/prod-big4.jpg',1)" /><img src="images/prod/thum4.jpg" name="thumb4" width="48" height="48" class="thum-img-border" id="thumb4" onclick="MM_swapImage('pro1','','images/prod/prod-big3.jpg',1)" /></td>
										  </tr><?php */?>
                                            </table></td>
                                        </tr>
                                      </table></td>
                                    <td width="249" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="67%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                              <tr>
 	                                                <td align="left" valign="middle">
													<strong>Event Detail</strong><br />
													<?=str_replace("<iframe","<iframe style='width:380px;height:245px;'",nl2br(stripslashes($rowselectevent['description'])));?></td>
                                              </tr>
                                              
                                            </table></td>
                                        </tr>
                                      </table></td>
                                    <td width="306" style="padding-left:20px;" align="left" valign="top" class="font12_blk" ><table width="100%" border="0" cellspacing="2" cellpadding="2">
                                        <? if($message!=""){?>
                                        <tr>
                                          <td align="left" class="font12_blk"><strong></strong></td>
                                          <td align="left" style="color:#FF0000;"><?=$message;?></td>
                                        </tr>
                                        <? }  ?>
                                        <tr>
                                          <td align="left" class="font12_blk" style="color:#ffffff;">Friend's Name:<br /><input type="text" name="friendname" id="friendname" value="" style="width:200px;"/></td>
                                        </tr>
                                        <tr>
                                          <td align="left" class="font12_blk" style="color:#ffffff;">Friend's Email:<br /><input type="text" name="friendemail" id="friendemail" value="" style="width:200px;"/></td>
                                        </tr>
										<tr>
                                          <td align="left" class="font12_blk" style="color:#ffffff;">Your Name:<br /><input type="text" name="yourname" id="yourname" value="" style="width:200px;"/></td>
                                        </tr>
										<tr>
                                          <td align="left" class="font12_blk" style="color:#ffffff;">Your Email:<br /><input type="text" name="youremail" id="youremail" value="" style="width:200px;"/></td>
                                        </tr>
										<tr>
                                          <td align="left" class="font12_blk" style="color:#ffffff;">Email Subject:<br /><input type="text" name="emailsubject" id="emailsubject" value="" style="width:200px;"/></td>
                                        </tr>
										<tr>
                                          <td align="left" class="font12_blk" style="color:#ffffff;">Email Message:<br /><textarea name="message" id="message" style="width:200px;height:80px;" ></textarea></td>
                                        </tr>
                                        <tr>
                                          <td align="left"><input type="hidden" name="HidSubmitAddUser" id="HidSubmitAddUser" value="0"  />
                                            &nbsp;<input type="submit"  class="button2" style="float:left;" id="SubmitRating" name="SubmitRating" value="Submit" onclick="return frmcheck();" />
                                          </td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table></td>
                            </tr>
							<? }else {?>
							<tr><td align="center" height="380" valign="middle" class="font-12-red"><?=$message;?></td></tr>
							<? } ?>
                          </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<script language="javascript" type="text/javascript">
function frmcheck()
{
	form=document.FrmProdetailpageRating;	
	if(form.friendname.value=="")
	{
		alert("Please enter friend's name.");
		form.friendname.focus();
		return false;
	}
	else if(form.friendemail.value=="")
	{
		alert("Please enter friend's email address.");
		form.friendemail.focus();
		return false;
	}
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.friendemail.value)))
	{
		alert("Please enter a proper email address.");
		form.friendemail.focus();
		return false;
	}
	else if(form.yourname.value=="")
	{
		alert("Please enter your name.");
		form.yourname.focus();
		return false;
	}
	else if(form.youremail.value=="")
	{
		alert("Please enter your email.");
		form.youremail.focus();
		return false;
	}
	else if(form.emailsubject.value=="")
	{
		alert("Please enter subject.");
		form.emailsubject.focus();
		return false;
	}
	else if(form.message.value=="")
	{
		alert("Please enter your message.");
		form.message.focus();
		return false;
	}
	else
	{
		form.HidSubmitAddUser.value=1;
		//form.submit();
		return  true;	
	}	
}
</script>
</div>
</body>
</html>