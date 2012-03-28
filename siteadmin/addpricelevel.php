<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");

if($_POST['HidRegUser']=="1")
{
	$earlybird_startdate=mdy_to_ymd($_POST['earlybird_startdate']);
	$earlybird_enddate=mdy_to_ymd($_POST['earlybird_enddate']);
	$advanced_startdate=mdy_to_ymd($_POST['advanced_startdate']);
	$advanced_enddate=mdy_to_ymd($_POST['advanced_enddate']);
	$full_startdate=mdy_to_ymd($_POST['full_startdate']);
	$full_enddate=mdy_to_ymd($_POST['full_enddate']);
	if($_REQUEST['Eid']!='')
	{
		$AddUserQry="UPDATE events_pricelevel SET
						eventid='".addslashes($_REQUEST['id'])."',						
						pricelevelname='".addslashes($_POST['pricelevelname'])."',
						onlineprice='".addslashes($_POST['onlineprice'])."',
						boxofficeprice='".addslashes($_POST['boxofficeprice'])."',
						quantityavailable='".addslashes($_POST['quantityavailable'])."',
						perorderlimit='".addslashes($_POST['perorderlimit'])."',
						activeornot='".addslashes($_POST['activeornot'])."',
						earlybird_startdate='".addslashes($earlybird_startdate)."',
						earlybird_enddate='".addslashes($earlybird_enddate)."',
						advanced_startdate='".addslashes($advanced_startdate)."',
						advanced_enddate='".addslashes($advanced_enddate)."',
						full_startdate='".addslashes($full_startdate)."',
						full_enddate='".addslashes($full_enddate)."',
						earlybird_active='".addslashes($_POST['earlybird_active'])."',
						earlybird_price='".addslashes($_POST['earlybird_price'])."',
						advanced_active='".addslashes($_POST['advanced_active'])."',
						advanced_price='".addslashes($_POST['advanced_price'])."',
						full_active='".addslashes($_POST['full_active'])."',
						full_price='".addslashes($_POST['full_price'])."',
						description='".addslashes($_POST['description'])."' where id='".$_REQUEST['Eid']."'";	 
		$AddUserQryRs=mysql_query($AddUserQry);
	}
	else
	{
		$AddUserQry="INSERT INTO events_pricelevel SET
					userid='0',						
					eventid='".addslashes($_REQUEST['id'])."',						
					pricelevelname='".addslashes($_POST['pricelevelname'])."',
					onlineprice='".addslashes($_POST['onlineprice'])."',
					boxofficeprice='".addslashes($_POST['boxofficeprice'])."',
					quantityavailable='".addslashes($_POST['quantityavailable'])."',
					perorderlimit='".addslashes($_POST['perorderlimit'])."',
					activeornot='".addslashes($_POST['activeornot'])."',
					earlybird_startdate='".addslashes($earlybird_startdate)."',
					earlybird_enddate='".addslashes($earlybird_enddate)."',
					advanced_startdate='".addslashes($advanced_startdate)."',
					advanced_enddate='".addslashes($advanced_enddate)."',
					full_startdate='".addslashes($full_startdate)."',
					full_enddate='".addslashes($full_enddate)."',
					earlybird_active='".addslashes($_POST['earlybird_active'])."',
					earlybird_price='".addslashes($_POST['earlybird_price'])."',
					advanced_active='".addslashes($_POST['advanced_active'])."',
					advanced_price='".addslashes($_POST['advanced_price'])."',
					full_active='".addslashes($_POST['full_active'])."',
					full_price='".addslashes($_POST['full_price'])."',
					description='".addslashes($_POST['description'])."',
					addeddate=curdate()";	 
		$AddUserQryRs=mysql_query($AddUserQry);
	}
	echo "<script>javascript:opener.location.reload(true);</script>";
	echo "<script>javascript:window.close();</script>";
}
if($_GET['Eid'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from events_pricelevel where id='".$_GET['Eid']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
}
else
{
	$Buttitle="Add";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Account | <? echo $SITE_NAME;?></title>
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
<link rel="stylesheet" href="dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
<script type="text/javascript" src="dhtmlgoodies_calendar.js?random=20060118"></script>
<body id="page5">
<div class="body1">
	<div class="main" style="width:600px;">
<article id="content" >
			
			<div class="wrapper">
				<div class="relative">
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section >
								<h2><strong style="width:90px;"><? if($_REQUEST['Eid']!=''){?>Edit<? }else{?>Add<? } ?></strong> Price Level</h2>
								<div >
									<figure>
										<form name="AddeventForm2" id="AddeventForm2"  method="post" enctype="multipart/form-data" action="#">
										  <table cellspacing="2" cellpadding="2" width=98% border="0" class="t-b">
											<? if($msg!=''){ ?>
											<tr>
												<td colspan="4" style="color:#FF0000;"><? echo $msg;?></td>
											</tr>
											<? }?>
											<tr>
											  <td width="35%" height="25" align="left" valign="top"> Price Level Name:&nbsp;</strong></td>
											  <td height="25" colspan="3" valign="top"><input name="pricelevelname" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->pricelevelname));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="35%" height="25" align="left" valign="top"><span class="a"> </span> Online Price (USD $):&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="onlineprice" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->onlineprice));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="35%" height="25" align="left" valign="top">  Box Office Price (USD $):&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="boxofficeprice" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->boxofficeprice));?>" type="text"  class="solidinput"></td>
											</tr>
											<? if($ROW->earlybird_startdate!='' && $ROW->earlybird_startdate!='0000-00-00'){$earlybird_startdate=ymd_to_mdy($ROW->earlybird_startdate);}else{$earlybird_startdate='';}?>
											<? if($ROW->earlybird_enddate!='' && $ROW->earlybird_enddate!='0000-00-00'){$earlybird_enddate=ymd_to_mdy($ROW->earlybird_enddate);}else{$earlybird_enddate='';}?>
											<? if($ROW->advanced_startdate!='' && $ROW->advanced_startdate!='0000-00-00'){$advanced_startdate=ymd_to_mdy($ROW->advanced_startdate);}else{$advanced_startdate='';}?>
											<? if($ROW->advanced_enddate!='' && $ROW->advanced_enddate!='0000-00-00'){$advanced_enddate=ymd_to_mdy($ROW->advanced_enddate);}else{$advanced_enddate='';}?>
											<? if($ROW->full_startdate!='' && $ROW->full_startdate!='0000-00-00'){$full_startdate=ymd_to_mdy($ROW->full_startdate);}else{$full_startdate='';}?>
											<? if($ROW->full_enddate!='' && $ROW->full_enddate!='0000-00-00'){$full_enddate=ymd_to_mdy($ROW->full_enddate);}else{$full_enddate='';}?>
											<tr>
											  <td height="25" style="padding-top:10px;" colspan="4" valign="top"><strong>Early Bird</strong>:&nbsp;&nbsp;&nbsp;Active:<input type="checkbox" name="earlybird_active" <? if($ROW->earlybird_active=="Y"){?> checked="checked" <? } ?> value="Y">&nbsp;Price: <input name="earlybird_price" style="width:65px;"  value="<? echo htmlentities(stripslashes($ROW->earlybird_price));?>" type="text"  class="solidinput">&nbsp;&nbsp;Date Range: <input name="earlybird_startdate" id="earlybird_startdate" style="width:75px;" onClick="displayCalendar(document.getElementById('earlybird_startdate'),'mm/dd/yyyy',this);"  value="<? echo $earlybird_startdate;?>" type="text"  class="solidinput">to<input name="earlybird_enddate" id="earlybird_enddate" style="width:85px;" onClick="displayCalendar(document.getElementById('earlybird_enddate'),'mm/dd/yyyy',this);"  value="<? echo $earlybird_enddate;?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td height="25" style="padding-top:5px;" colspan="4" valign="top"><strong>Advanced</strong>:&nbsp;&nbsp;&nbsp;Active:<input type="checkbox" name="advanced_active" <? if($ROW->advanced_active=="Y"){?> checked="checked" <? } ?> value="Y">&nbsp;Price: <input name="advanced_price" style="width:65px;"  value="<? echo htmlentities(stripslashes($ROW->advanced_price));?>" type="text"  class="solidinput">&nbsp;&nbsp;Date Range: <input name="advanced_startdate" id="advanced_startdate" style="width:75px;" onClick="displayCalendar(document.getElementById('advanced_startdate'),'mm/dd/yyyy',this);"  value="<? echo $advanced_startdate;?>" type="text"  class="solidinput">to<input name="advanced_enddate" id="advanced_enddate" style="width:85px;" onClick="displayCalendar(document.getElementById('advanced_enddate'),'mm/dd/yyyy',this);"  value="<? echo $advanced_enddate;?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td height="25" style="padding-top:5px;padding-bottom:10px;" colspan="4" valign="top"><strong>Full</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Active:<input type="checkbox" name="full_active" <? if($ROW->full_active=="Y"){?> checked="checked" <? } ?> value="Y">&nbsp;Price: <input name="full_price" style="width:67px;"  value="<? echo htmlentities(stripslashes($ROW->full_price));?>" type="text"  class="solidinput">&nbsp;&nbsp;Date Range: <input name="full_startdate" id="full_startdate" style="width:75px;" onClick="displayCalendar(document.getElementById('full_startdate'),'mm/dd/yyyy',this);"  value="<? echo $full_startdate;?>" type="text"  class="solidinput">to<input name="full_enddate" id="full_enddate" style="width:85px;" onClick="displayCalendar(document.getElementById('full_enddate'),'mm/dd/yyyy',this);"  value="<? echo $full_enddate;?>" type="text"  class="solidinput"></td>
											</tr>
											
											<tr>
											  <td width="35%" height="25" align="left" valign="top">  Quantity Available:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="quantityavailable" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->quantityavailable));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="35%" height="25" align="left" valign="top"><span class="a"> </span>  Per-Order Limit:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="perorderlimit" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->perorderlimit));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="35%" height="25" align="left" valign="top"><span class="a"></span> Active:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input type="radio" name="activeornot" id="activeornot" <? if($ROW->activeornot=="Yes" || $ROW->activeornot==""){?> checked="checked" <? } ?> value="Yes">Yes&nbsp;&nbsp;<input type="radio" name="activeornot" id="activeornot" <? if($ROW->activeornot=="No" ){?> checked="checked" <? } ?> value="No">No</td>
											</tr>
											<tr>
											  <td width="35%" height="25" align="left" valign="top"><span class="a"></span>  Description:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><textarea name="description" id="description" style="height:100px;width:200px;"><? echo (stripslashes($ROW->description));?></textarea></td>
											</tr>
											
											<tr>
											  <td align="left">&nbsp;</td>
											  <td colspan="3">
											  <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
											  <INPUT type=submit name="Submit" value="<? if($_REQUEST['Eid']!=''){?>Edit<? }else{?>Add<? } ?> Price Level" onClick="return valid();" style="background-color:#000000;color:#FFFFFF;" class="bttn-s">                          </td>
											</tr>
										  </table>
										</form>
									</figure>
								</div>
							</section>
							
						</div></div>
					</div>	
					
					
					
				</div>					
				</div>
			</div>
		</article>	</div>
</div>
<script language="javascript" type="text/javascript">
function valid()
{
	form=document.AddeventForm2;

	if(form.pricelevelname.value.split(" ").join("")=="")
	{
		alert("Please enter name.")
		form.pricelevelname.focus();
		return false;
	}
	if(form.onlineprice.value.split(" ").join("")=="")
	{
		alert("Please enter online price.")
		form.onlineprice.focus();
		return false;
	}
	
	document.AddeventForm2.HidRegUser.value='1';
	document.AddeventForm2.submit();
	return  true;    
}
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>