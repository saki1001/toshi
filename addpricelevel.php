<? include("connect.php"); 
include("getsess.php");

if($_POST['HidRegUser']=="1")
{
	$AddUserQry="INSERT INTO events_pricelevel SET
					userid='".addslashes($_SESSION['UsErId'])."',						
					eventid='".addslashes($_SESSION['SESSION_STEP1'])."',						
					pricelevelname='".addslashes($_POST['pricelevelname'])."',
					onlineprice='".addslashes($_POST['onlineprice'])."',
					boxofficeprice='".addslashes($_POST['boxofficeprice'])."',
					quantityavailable='".addslashes($_POST['quantityavailable'])."',
					perorderlimit='".addslashes($_POST['perorderlimit'])."',
					activeornot='".addslashes($_POST['activeornot'])."',
					description='".addslashes($_POST['description'])."',
					addeddate=curdate()";	 
	$AddUserQryRs=mysql_query($AddUserQry);
	echo "<script>javascript:opener.location.reload(true);</script>";
	echo "<script>javascript:window.close();</script>";
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
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.box1 figure {behavior:url(js/PIE.htc)}
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
								<h2><strong style="width:90px;">Add</strong> Price Level</h2>
								<div class="pad_bot1">
									<figure>
										<form name="AddeventForm2" id="AddeventForm2"  method="post" enctype="multipart/form-data" action="#">
										  <table cellspacing="2" cellpadding="2" width=98% border="0" class="t-b">
											<? if($msg!=''){ ?>
											<tr>
												<td colspan="4" style="color:#FF0000;"><? echo $msg;?></td>
											</tr>
											<? }?>
											<tr>
											  <td width="44%" height="25" align="left" valign="top"> Price Level Name:&nbsp;</strong></td>
											  <td height="25" colspan="3" valign="top"><input name="pricelevelname" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->pricelevelname));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="44%" height="25" align="left" valign="top"><span class="a"> </span> Online Price (USD $):&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="onlineprice" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->onlineprice));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="44%" height="25" align="left" valign="top">  Box Office Price (USD $):&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="boxofficeprice" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->boxofficeprice));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="44%" height="25" align="left" valign="top">  Quantity Available:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="quantityavailable" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->quantityavailable));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="44%" height="25" align="left" valign="top"><span class="a"> </span>  Per-Order Limit:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="perorderlimit" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->perorderlimit));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="44%" height="25" align="left" valign="top"><span class="a"></span> Active:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input type="radio" name="activeornot" id="activeornot" checked="checked" value="Yes">Yes&nbsp;&nbsp;<input type="radio" name="activeornot" id="activeornot" value="No">No</td>
											</tr>
											<tr>
											  <td width="44%" height="25" align="left" valign="top"><span class="a"></span>  Description:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><textarea name="description" id="description" style="height:100px;width:200px;"></textarea></td>
											</tr>
											
											<tr>
											  <td align="left">&nbsp;</td>
											  <td width="56%" colspan="3">
											  <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
											  <INPUT type=submit name="Submit" value="Add Price Level" onClick="return valid();" class="bttn-s">                          </td>
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