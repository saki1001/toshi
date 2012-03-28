<? include("connect.php"); 
include("getsess.php");

if($_POST['HidRegUser']=="1")
{
	$getCustomerQry="SELECT id from event_venues WHERE name='".addslashes($_POST['name'])."' and country='".addslashes($_POST['country'])."' and state='".addslashes($_POST['state'])."' and zipcode='".addslashes($_POST['zipcode'])."'	";	
	$getCustomerQryRs=mysql_query($getCustomerQry);
	$TotgetCustomer=mysql_affected_rows();
	if($TotgetCustomer<=0)
	{
		$AddUserQry="INSERT INTO event_venues SET
						name='".addslashes($_POST['name'])."',						
						country='".addslashes($_POST['country'])."',
						address='".addslashes($_POST['address'])."',
						city='".addslashes($_POST['city'])."',
						state='".addslashes($_POST['state'])."',
						zipcode='".addslashes($_POST['zipcode'])."',
						timezone='".addslashes($_POST['timezone'])."',
						addedby='".$_SESSION['UsErId']."',
						addeddate=curdate()";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		$msg="Venue has been added successfully";
		echo "<script>javascript:window.opener.closeshadow();</script>";
		echo "<script>javascript:window.close();</script>";
		//header("location:addnewvenue.php?msg=Your account has been updated successfully.");			
		//exit;
	}
	else
	{
		$msg="Venue already exists";
		//header("location:addnewvenue.php?msg=The email address you provided is already registered.");			
		//exit;
	}
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
								<h2><strong style="width:90px;">Add</strong> Venue</h2>
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
											  <td width="30%" height="25" align="left" valign="top"> Venue Name:&nbsp;</strong></td>
											  <td height="25" colspan="3" valign="top"><input name="name" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->name));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="30%" height="25" align="left" valign="top"><span class="a"> </span> Country:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><select name="country"  id="country" class="solidinput" style="width:200px;">
													  <option value="">Select country</option>
														  <? 
															$rs11=mysql_query("select * from country    order by country_name ASC ");
															$tot11=mysql_affected_rows();
															for($m=0;$m<$tot11;$m++)
															{
															$gr22=mysql_fetch_object($rs11);
														  ?>
														  <option value="<?=$gr22->country_name?>" <? if($ROW->country==$gr22->country_name){ echo "selected";}?> ><?=stripslashes($gr22->country_name); ?></option>
														  <? }?>
													</select></td>
											</tr>
											<tr>
											  <td width="30%" height="25" align="left" valign="top">  Address:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="address" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->address));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="30%" height="25" align="left" valign="top">  City:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="city" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->city));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="30%" height="25" align="left" valign="top"><span class="a"> </span>  State:&nbsp;</td>
											  <td height="25" colspan="3" valign="top">
											  <select name="state"  id="state" class="solidinput" style="width:200px;">
													  <option value="">Select state</option>
														  <? 
															$rs11=mysql_query("select * from state where 	id_country=170   order by state_name ASC ");
															$tot11=mysql_affected_rows();
															for($m=0;$m<$tot11;$m++)
															{
															$gr22=mysql_fetch_object($rs11);
														  ?>
														  <option value="<?=$gr22->state_name?>" <? if($ROW->state==$gr22->state_name){ echo "selected";}?> ><?=stripslashes($gr22->state_name); ?></option>
														  <? }?>
												</select>											  </td>
											</tr>
											<tr>
											  <td width="30%" height="25" align="left" valign="top"><span class="a"></span>  Zip / Post Code:&nbsp;</td>
											  <td height="25" colspan="3" valign="top"><input name="zipcode" style="width:200px;"  value="<? echo htmlentities(stripslashes($ROW->zipcode));?>" type="text"  class="solidinput"></td>
											</tr>
											<tr>
											  <td width="30%" height="25" align="left" valign="top"><span class="a"></span>  Timezone Name:&nbsp;</td>
											  <td height="25" colspan="3" valign="top">
												<select name="timezone" id="timezone" class="solidinput" style="width:200px;">
													<option value="America/New_York"  <? if($ROW->timezone=="America/New_York"){echo "selected";}?>>Eastern Time</option>
													<option value="America/Chicago"  <? if($ROW->timezone=="America/Chicago"){echo "selected";}?>>Central Time</option>
													<option value="America/Denver"  <? if($ROW->timezone=="America/Denver"){echo "selected";}?>>Mountain Time</option>
													<option value="America/Phoenix"  <? if($ROW->timezone=="America/Phoenix"){echo "selected";}?>>Mountain Time (Arizona)</option>
													<option value="America/Los_Angeles"  <? if($ROW->timezone=="America/Los_Angeles"){echo "selected";}?>>Pacific Time</option>
													<option value="America/Juneau"  <? if($ROW->timezone=="America/Juneau"){echo "selected";}?>>Alaskan Time</option>
													<option value="Pacific/Honolulu"  <? if($ROW->timezone=="Pacific/Honolulu"){echo "selected";}?>>Hawaiian Time</option>
													<option value="Pacific/Samoa"  <? if($ROW->timezone=="Pacific/Samoa"){echo "selected";}?>>Samoa Standard Time</option>
												</select>											  </td>
											</tr>
											
											<tr>
											  <td align="left">&nbsp;</td>
											  <td width="63%" colspan="3">
											  <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
											  <INPUT type=submit name="Submit" value="Add New Venue" onClick="return valid();" class="bttn-s">                          </td>
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

	if(form.name.value.split(" ").join("")=="")
	{
		alert("Please enter venue name.")
		form.name.focus();
		return false;
	}
	if(form.country.value.split(" ").join("")=="")
	{
		alert("Please select country.")
		form.country.focus();
		return false;
	}
	if(form.address.value.split(" ").join("")=="")
	{
			alert("Please enter address.")
			form.address.focus();
			return false;
	}
	  
	if(form.city.value.split(" ").join("")=="")
	{
			alert("Please enter city.")
			form.city.focus();
			return false;
	} 
	if(form.state.value.split(" ").join("")=="")
	{
			alert("Please enter state.")
			form.state.focus();
			return false;
	} 
	if(form.timezone.value.split(" ").join("")=="")
	{
			alert("Please enter timezone.")
			form.timezone.focus();
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