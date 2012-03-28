<? include("connect.php"); 
include("getsess.php");

if($_POST['HidRegUser']=="1")
{
	
		$AddUserQry="INSERT INTO events SET
						eventtype='".addslashes($_POST['eventtype'])."',						
						name='".addslashes($_POST['name'])."',						
						userid='".addslashes($_SESSION['UsErId'])."',
						startdate='".addslashes($_POST['startdate'])."',
						startdate_hour='".addslashes($_POST['startdate_hour'])."',
						startdate_minute='".addslashes($_POST['startdate_minute'])."',
						startdate_ampm='".addslashes($_POST['startdate_ampm'])."',
						enddate='".addslashes($_POST['enddate'])."',
						enddate_hour='".addslashes($_POST['enddate_hour'])."',
						enddate_minute='".addslashes($_POST['enddate_minute'])."',
						enddate_ampm='".addslashes($_POST['enddate_ampm'])."',
						venueid='".addslashes($_POST['venueid'])."',
						description='".addslashes($_POST['description'])."',
						onsaledate='".addslashes($_POST['onsaledate'])."',
						onsaledate_hour='".addslashes($_POST['onsaledate_hour'])."',
						onsaledate_minute='".addslashes($_POST['onsaledate_minute'])."',
						onsaledate_ampm='".addslashes($_POST['onsaledate_ampm'])."',
						immediately='".addslashes($_POST['immediately'])."',
						salesclosedate='".addslashes($_POST['salesclosedate'])."',
						salesclosedate_hour='".addslashes($_POST['salesclosedate_hour'])."',
						salesclosedate_minute='".addslashes($_POST['salesclosedate_minute'])."',
						salesclosedate_ampm='".addslashes($_POST['salesclosedate_ampm'])."',
						category='".addslashes($_POST['category'])."',
						ages='".addslashes($_POST['ages'])."',
						website='".addslashes($_POST['website'])."',
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
			 $path="Events/".$filename1; 
			 copy($filetoupload,$path);
			 
			 $AddUserQry="UPDATE events SET picture='$filename1' where id='".$insertid."'";	 
			 $AddUserQryRs=mysql_query($AddUserQry);
		}
		$_SESSION['SESSION_STEP1']=$insertid;
		header("location:addevent_step2.php");			
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
								<h2><strong style="width:90px;">Add</strong>an  Event</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="3" cellpadding="2">
										  <tr>
											<td style="padding:5px;">
												<form id="AddeventForm" name="AddeventForm" enctype="multipart/form-data" method="post">
													<div>
														<div class="wrapper"><span>Type of Event:</span><input type="radio" name="eventtype" id="eventtype" value="Single" checked="checked">Single&nbsp;&nbsp;<input type="radio" name="eventtype" id="eventtype" value="Series">Series&nbsp;&nbsp;</div>
														<div class="wrapper"><span>Event Name:</span><input type="text" class="input" name="name" id="name" ></div>
														<div class="wrapper"><span>Event Date:</span>
																<input type="text" class="input" name="startdate" id="startdate" style="width:80px;" onClick="displayCalendar(document.getElementById('startdate'),'yyyy-mm-dd',this);" >
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="startdate_hour">
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
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="startdate_minute">
																	<option value="00">00</option>
																	<option value="15">15</option>
																	<option value="30">30</option>
																	<option value="45">45</option>
																</select>
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="startdate_ampm">
																	<option value="am">am</option>
																	<option value="pm" selected="selected">pm</option>
																</select>
														</div>
														<div class="wrapper"><span>Event End Date:</span>
																<input type="text" class="input" name="enddate" id="enddate" style="width:80px;" onClick="displayCalendar(document.getElementById('enddate'),'yyyy-mm-dd',this);" >
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="enddate_hour">
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
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="enddate_minute" >
																	<option value="00">00</option>
																	<option value="15">15</option>
																	<option value="30">30</option>
																	<option value="45">45</option>
																</select>
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="enddate_ampm">
																	<option value="am">am</option>
																	<option value="pm" selected="selected">pm</option>
																</select>
														</div>
														<div class="wrapper"><span>Venue:</span>
														<span id="venuedropdown_ID">
															<select name="venueid" id="venueid" style="width:260px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px">
																<option value="">Select a venue</option>
																 <? 
																	$rs11=mysql_query("select * from event_venues    order by name ASC ");
																	$tot11=mysql_affected_rows();
																	for($m=0;$m<$tot11;$m++)
																	{
																		$gr22=mysql_fetch_object($rs11);
																  ?>
																  <option value="<?=$gr22->id?>"   ><?=stripslashes($gr22->name); ?> in <?=stripslashes($gr22->city); ?>, <?=stripslashes($gr22->state); ?></option>
																  <? }?>
															</select>
														</span>	
														</div>
														<div class="wrapper"><a  href="#" onClick="javascript:window.open('addnewvenue.php','','width=400,height=300');return false;"  class='example5' style="float:left;padding:0px;width:150px;">Add New Venue</a></div>
														<div class="wrapper" style="height:100px;"><span>Description:</span>
															<textarea name="description" class="textarea" id="description" ></textarea>
														</div>
														<div class="wrapper" style="height:10px;"></div>
														<div class="wrapper" style="border-bottom:1px solid;border-color:#999999;"><strong>Sale Times</strong></div>
														<div class="wrapper" style="height:8px;"></div>
														<div class="wrapper"><span>On-sale Date:</span>
																<input type="text" class="input" name="onsaledate" id="onsaledate" style="width:80px;"  onClick="displayCalendar(document.getElementById('onsaledate'),'yyyy-mm-dd',this);"> 
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="onsaledate_hour">
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
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="onsaledate_minute">
																	<option value="00">00</option>
																	<option value="15">15</option>
																	<option value="30">30</option>
																	<option value="45">45</option>
																</select>
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="onsaledate_ampm">
																	<option value="am">am</option>
																	<option value="pm" selected="selected">pm</option>
																</select>
														</div>
														<div class="wrapper"><span>&nbsp;</span><input type="checkbox" name="immediately" id="immediately" value="Yes">Immediately</div>
														<div class="wrapper"><span>Close Date:</span>
																<input type="text" class="input" name="salesclosedate" id="salesclosedate" style="width:80px;"  onClick="displayCalendar(document.getElementById('salesclosedate'),'yyyy-mm-dd',this);">
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="salesclosedate_hour">
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
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="salesclosedate_minute">
																	<option value="00">00</option>
																	<option value="15">15</option>
																	<option value="30">30</option>
																	<option value="45">45</option>
																</select>
																<select style="width:53px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="salesclosedate_ampm">
																	<option value="am">am</option>
																	<option value="pm" selected="selected">pm</option>
																</select>
														</div>
														<div class="wrapper" style="height:10px;"></div>
														<div class="wrapper" style="border-bottom:1px solid;border-color:#999999;"><strong>Settings</strong></div>
														<div class="wrapper" style="height:8px;"></div>
														<div class="wrapper"><span>Category:</span>
															<select name="category" id="category" style="width:260px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px">
																<option value="">Select Category</option>
																 <? 
																	$rs11=mysql_query("select * from event_category    order by name ASC ");
																	$tot11=mysql_affected_rows();
																	for($m=0;$m<$tot11;$m++)
																	{
																		$gr22=mysql_fetch_object($rs11);
																  ?>
																  <option value="<?=$gr22->id?>"><?=stripslashes($gr22->name); ?></option>
																  <? }?>
															</select>
														</div>
														<div class="wrapper"><span>Ages:</span>
															<select name="ages" id="ages" style="width:260px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px">
																<option value="">Select Age Group</option>
																<option value="All Ages">All Ages</option>
																<option value="18 and over">18 and over</option>
																<option value="19 and over">19 and over</option>
																<option value="21 and over">21 and over</option> 
															</select>
														</div>
														<div class="wrapper"><span>Event Website:</span>
															<input type="text" name="website" id="website" class="input" value="http://" />
														</div>
														<div class="wrapper"><span>Image:</span><input type="file" name="picture" id="picture" /></div>
														<div class="wrapper"><span>&nbsp;</span><input type="checkbox" name="picture_display" id="picture_display" value="Y" checked="checked">Display image on event listing</div>
														
														
														<div class="wrapper" style="height:10px;"></div>
														<input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
														<a href="#" style="float:none;" class="button1" onClick="return valid();">Save & Continue</a>
														<?php /*?><a href="#" class="button2 color3" onClick="document.getElementById('AddeventForm').reset()">Clear</a><?php */?>
													</div>
												</form>
											</td>
										  </tr>
										</table>
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
	if(form.venueid.value.split(" ").join("")=="")
	{
			alert("Please select venue.")
			form.venueid.focus();
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
	document.AddeventForm.HidRegUser.value='1';
	document.AddeventForm.submit();
	return  true;    
}
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>