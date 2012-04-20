<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");

if($_POST['HidRegUser']=="1")
{
	$AddUserQry="INSERT INTO events_timeslots SET
					userid='0',						
					eventid='".addslashes($_REQUEST['id'])."',						
					slot_hour='".addslashes($_POST['slot_hour'])."',
					slot_minute='".addslashes($_POST['slot_minute'])."',
					slot_ampm='".addslashes($_POST['slot_ampm'])."',
					slot_duration='".addslashes($_POST['slot_duration'])."',
					status='Available',
					addeddate=curdate()";	 
	$AddUserQryRs=mysql_query($AddUserQry);
	echo "<script>javascript:opener.location.reload(true);</script>";
	echo "<script>javascript:window.close();</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Event | Time Slot | <? echo $SITE_NAME;?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.6.js"></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script> 
<script type="text/javascript" src="../js/Vegur_700.font.js"></script>
<script type="text/javascript" src="../js/Vegur_400.font.js"></script>
<script type="text/javascript" src="../js/Vegur_300.font.js"></script>
<script type="text/javascript" src="../js/atooltip.jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="../js/html5.js"></script>
	<style type="text/css">
		.box1 figure {behavior:url(../js/PIE.htc)}
	</style>
<![endif]-->
<!--[if lt IE 7]>
		<div style='clear:both;text-align:center;position:relative'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
		</div>
<![endif]-->

</head>
<body id="page5">
<div class="body1">
	<div class="main" style="width:500px;">
<article id="content" >
			
			<div class="wrapper">
				<div class="relative">
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" >
								<h2><strong style="width:90px;">Add</strong> Time Slot</h2>
								<div class="pad_bot1">
									<figure>
										<form name="AddeventForm2" id="AddeventForm2"  method="post" enctype="multipart/form-data" action="#">
										  <table cellspacing="2" cellpadding="2" width=100% border="0" class="t-b">
											<? if($msg!=''){ ?>
											<tr>
												<td colspan="4" style="color:#FF0000;"><? echo $msg;?></td>
											</tr>
											<? }?>
											<tr>
												<td colspan="4" style="color:#FF0000;">&nbsp;</td>
											</tr>
											<tr>
											  <td width="23%" height="25" align="left" valign="top">Time Slot:&nbsp;</strong></td>
											  <td height="25" colspan="3" valign="top">
													  <select style="width:53px;padding:1px 2px;font:11px;height:20px" name="slot_hour">
														<option value="12" >12</option>
														<option value="0" >0</option>
														<option value="1" >1</option>
														<option value="2" >2</option>
														<option value="3" >3</option>
														<option value="4" >4</option>
														<option value="5" >5</option>
														<option value="6" >6</option>
														<option value="7" >7</option>
														<option value="8" >8</option>
														<option value="9" >9</option>
														<option value="10">10</option>
														<option value="11">11</option>
													</select>
													<select style="width:43px;padding:1px 2px;font:11px;height:20px" name="slot_minute">
														<option value="00" >00</option>
														<option value="15" >15</option>
														<option value="30" >30</option>
														<option value="45" >45</option>
													</select> 
													<select style="width:53px;padding:1px 2px;font:11px;height:20px" name="slot_ampm">
														<option value="AM" >AM</option>
														<option value="PM" >PM</option>
													</select> 
													| 
													<select style="width:103px;padding:1px 2px;font:11px;height:20px" name="slot_duration">
														<option value="15" >15 Minutes</option>
														<option value="30" >30 Minutes</option>
														<option value="45" >45 Minutes</option>
														<option value="60" >60 Minutes</option>
													</select> 
													
											  </td>
											</tr>
											
											<tr>
											  <td align="left">&nbsp;</td>
											  <td width="77%" colspan="3">
											  <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
											  <INPUT type=submit name="Submit" value="Add Time Slot" onClick="return valid();" class="bttn-a" style="background-color:#000000;color:#FFFFFF;">                          </td>
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
		</article>	</div>
</div>
<script language="javascript" type="text/javascript">
function valid()
{
	form=document.AddeventForm2;

	document.AddeventForm2.HidRegUser.value='1';
	//document.AddeventForm2.submit();
	return  true;    
}
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>