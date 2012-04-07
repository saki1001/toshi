<? include("../connect.php"); 
include("php/get_sess.php");

if($_POST['HidRegUser']=="1")
{
	$getCustomerQry="SELECT id from users WHERE email='".addslashes($_POST['email'])."' and id!='".$_SESSION['UsErId']."'";	
	$getCustomerQryRs=mysql_query($getCustomerQry);
	$TotgetCustomer=mysql_affected_rows();
	if($TotgetCustomer<=0)
	{
		if(trim($_POST['dob_year'])!="" && trim($_POST['dob_month'])!="" && trim($_POST['dob_day'])!="")
		{
			$dob=trim($_POST['dob_year'])."-".trim($_POST['dob_month'])."-".trim($_POST['dob_day']);
		}
		if($_POST['accounttype']=="Musician")
		{
			$anddd="firstname='".addslashes($_POST['artistname'])."',";
		}
		else
		{
			$anddd="firstname='".addslashes($_POST['firstname'])."',";
		}
		$AddUserQry="UPDATE users SET
						$anddd
						lastname='".addslashes($_POST['lastname'])."',						
						password='".addslashes($_POST['password'])."',
						email='".addslashes($_POST['email'])."',
						gender='".addslashes($_POST['gender'])."',
						genre='".addslashes($_POST['genre'])."',
						dob='".addslashes($dob)."',
						weight='".addslashes($_POST['weight'])."',
						height='".addslashes($_POST['height'])."',
						newsletter='".addslashes($_POST['newsletter'])."',
						aboutme='".addslashes($_POST['aboutme'])."',
						bust='".addslashes($_POST['bust'])."',
						hips='".addslashes($_POST['hips'])."',
						shoesize='".addslashes($_POST['shoesize'])."',
						inseam='".addslashes($_POST['inseam'])."',
						neck='".addslashes($_POST['neck'])."',
						sleeve='".addslashes($_POST['sleeve'])."',
						displayprofile='".addslashes($_POST['displayprofile'])."'
						 where id='".$_SESSION['UsErId']."'";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		
		//////newsletter
		if($_POST['newsletter']=="Y")
		{
			$selQry=mysql_query("SELECT * FROM subscriber WHERE email='".addslashes($_POST['email'])."'");	 
			$tot=mysql_affected_rows();
			if($tot<=0)
			{
				$AddUserQry="INSERT INTO subscriber SET email='".addslashes($_POST['email'])."',sdate=now()";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}	
		}
		else
		{
			$selQry=mysql_query("SELECT * FROM subscriber WHERE email='".addslashes($_POST['email'])."'");	 
			$tot=mysql_affected_rows();
			if($tot>0)
			{
				$AddUserQry="delete from subscriber where email='".addslashes($_POST['email'])."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}	
		}
		//////end of newsletter
		
		if($_FILES["picture"]['tmp_name'])
		{
			 $file=$_FILES["picture"];	
			 //$send_name1=ereg_replace (" ", "",$file["name"]); 			
			 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);		
			 $filename1=rand().$send_name1;		
			 $filetoupload=$file['tmp_name'];				 
			 $path="Users/".$filename1; 
			 copy($filetoupload,$path);
			 $extsql2=",picture='$filename1'";
			 if($_POST["picture_old"]!="")
			 {
				$oldres=$_POST["picture_old"];
				@unlink("Users/thumb/$oldres");
				@unlink("Users/$oldres");
			 }
			 //Create Thumb 200 x 213
				$source=$path;
				$thumb_f2 = $filename1 ;
				$dest2="Users/thumb/".$thumb_f2;
				$thumb_size_w = 135;
				$thumb_size_h = 135;
				
				$size = getimagesize($source);
				$width = $size[0];
				$height = $size[1];
				$scale = min($thumb_size_w/$width, $thumb_size_h/$height);
				
				if ($scale < 1) 
				{
					 $thumb_size_w = floor($scale*$width);
					 $thumb_size_h = floor($scale*$height);
				}
				else
				{
					 $thumb_size_w = $width;
					 $thumb_size_h = $height;
				}
				
				$new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
				$system=explode(".",$thumb_f2);
				if (preg_match("/jpg|jpeg/",$system[1])){
					$im=imagecreatefromjpeg($source);				
				}else if (preg_match("/png/",$system[1])){
					$im=imagecreatefrompng($source);				
				}else if (preg_match("/gif/",$system[1])){
					$im=imagecreatefromgif($source);				
				}else if (preg_match("/bmp/",$system[1])){
					$im=imagecreatefromwbmp($source);				
				}else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
					$im=imagecreatefromjpeg($source);
				}else if($ext=="gif" || $ext=="GIF"){
					$im=imagecreatefromgif($source);
				}else if($ext=="png" || $ext=="PNG"){
					$im=imagecreatefrompng($source);
				}else if($ext=="bmp" || $ext=="BMP"){
					$im=imagecreatefromwbmp($source);
				}else{
					$im=imagecreatefromjpeg($source);
				}	
				//$im = imagecreatefromjpeg($source);
				imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
				imagejpeg($new_im,$dest2,100);
				//End thumb
			
				$AddUserQry="UPDATE users SET picture='$filename1' where id='".$_SESSION['UsErId']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
		}
	
		header("location:myaccount.php?msg=Your account has been updated successfully.");			
		exit;
	}
	else
	{
		header("location:editprofile.php?msg=The email address you provided is already registered.");			
		exit;
	}
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
								<h2><strong style="width:120px;">Update</strong> Account</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="3" cellpadding="2">
										  <tr>
											<td style="padding:5px;">
												<form id="AddeventForm" name="AddeventForm" enctype="multipart/form-data" method="post">
													<div>
														
														<div id="DISPLAY1">
															<div class="wrapper"><span>First Name:</span><input type="text" class="input" name="firstname" id="firstname" value="<? echo stripslashes($Row['firstname']);?>"></div>
															<div class="wrapper"><span>Last Name:</span><input type="text" class="input" name="lastname" id="lastname" value="<? echo stripslashes($Row['lastname']);?>"></div>
														</div>
														<div id="DISPLAY2" style="display:none;">
															<div class="wrapper"><span>Artist Name:</span><input type="text" class="input" name="artistname" id="artistname"></div>
															<div class="wrapper"><span>Genre:</span>
																<select name="genre" id="genre" style="width:260px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px">
																	<option value="">Select a genre</option>
																	<?=GetDropdown(id,name,genre,'  order by name  asc',stripslashes($_REQUEST['genre']));?>
																</select>
															</div>
															<div class="wrapper"><span>Label Type:</span>
																<select name="labeltype" id="labeltype" style="width:260px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px">
																	<option value="">Select a label</option>
																	<?=GetDropdown(id,name,labeltype,'  order by name  asc',$_REQUEST['labeltype']);?>
																</select>
															</div>
														</div>
														<div class="wrapper"><span>Email:</span><input type="text" class="input" name="email" id="email"  value="<? echo stripslashes($Row['email']);?>"></div>
														<div class="wrapper"><span>Password:</span><input type="password" class="input" name="password" id="password"  value="<? echo stripslashes($Row['password']);?>"></div>
														
														<div id="DISPLAY1_1">
															<div class="wrapper"><span>Birthday:</span>
															<? 
															$dob=$Row['dob'];
															if($dob!='' && $dob!='0000-00-00')
															{
																$expdob=explode("-",$dob);
																$selyear=$expdob[0];
																$selmonth=$expdob[1];
																$selday=$expdob[2];
															}
															?>
															<select style="width:83px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="dob_month"><option value="">Month</option><? echo getMonth($selmonth);?></select>
															<select style="width:83px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="dob_day"><option value="">Day</option><? echo getDayValue($selday);?></select>
															<select style="width:85px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px" name="dob_year"><option value="">Year</option><? echo getYear($selyear,2,'styear',1900);?></select>
															</div>
															<div class="wrapper">
																<span>Gender:</span>
																<input type="radio" name="gender" id="gender1" value="Male" <? if($Row['gender']=="Male"){echo "checked";}?>><label for="gender1">Male</label>&nbsp;&nbsp;
																<input type="radio" name="gender" id="gender2" value="Female" <? if($Row['gender']=="Female"){echo "checked";}?>><label for="gender2">Female</label>&nbsp;&nbsp;
															</div>
														</div>
														<div class="wrapper"><span>Weight:</span><input type="text" class="input" name="weight" id="weight"  value="<? echo stripslashes($Row['weight']);?>"></div>
														<div class="wrapper"><span>Height:</span>
														<select name="height"  id="height" style="width:140px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px">
															<option value=""></option>
															<?
															for($i="124";$i<220;$i++)
															{
																if($Row['height']==$i){$sel='selected';}else{$sel='';}
																echo '<option value="'.$i.'" '.$sel.'>'.$i.'cm / '.get_height($i).'';
															}
															?>
															</select>
														<?php /*?><input type="text" class="input" name="height" id="height"  value="<? echo stripslashes($Row['height']);?>"><?php */?></div>
														<? if($Row['firstname']=="Actors" || $Row['firstname']=="tosh-ette" || $Row['firstname']=="tosh-hunk")?>
														<div id="DISPLAY3" style="display:inline;">
															<div class="wrapper"><span>Bust:</span><input type="text" class="input" name="bust" id="bust" style="width:140px;" value="<? echo stripslashes($Row['bust']);?>"></div>
															<div class="wrapper"><span>Hips:</span><input type="text" class="input" name="hips" id="hips" style="width:140px;" value="<? echo stripslashes($Row['hips']);?>"></div>
															<div class="wrapper"><span>Shoe Size:</span><input type="text" class="input" name="shoesize" id="shoesize" style="width:140px;" value="<? echo stripslashes($Row['shoesize']);?>"></div>
															<div class="wrapper"><span>Inseam:</span><input type="text" class="input" name="inseam" id="inseam" style="width:140px;" value="<? echo stripslashes($Row['inseam']);?>"></div>
															<div class="wrapper"><span>Neck:</span><input type="text" class="input" name="neck" id="neck" style="width:140px;" value="<? echo stripslashes($Row['neck']);?>"></div>
															<div class="wrapper"><span>Sleeve:</span><input type="text" class="input" name="sleeve" id="sleeve" style="width:140px;" value="<? echo stripslashes($Row['sleeve']);?>"></div>
														</div>
														
														<div class="wrapper"><span>Picture:</span><input type="file" name="picture" id="picture" /></div>
														<input type="hidden" name="picture_old" id="picture_old" value="<?=$Row['picture'];?>" />
														<? if($Row['picture']!=""){?><div><span>&nbsp;</span><img src="Users/thumb/<?=$Row['picture'];?>" border="0" /></div><? } ?>
														<div class="wrapper" style="height:100px;"><span>About You:</span><textarea  class="input" name="aboutme" id="aboutme" style="height:100px;"><? echo stripslashes($Row['aboutme']);?></textarea></div>
														<div class="wrapper" style="height:10px;"></div>
														<div class="wrapper"><span>&nbsp;</span><input type="checkbox" name="newsletter" value="Y"  <? if($Row['newsletter']=="Y"){?>checked="checked"<? } ?>/> I'm happy to receive newsletters from <? echo $SITE_NAME;?>.</div>
														<div class="wrapper"><span>&nbsp;</span><input type="checkbox" name="displayprofile" value="Y"  <? if($Row['displayprofile']=="Y"){?>checked="checked"<? } ?>/> Display your Profile?</div>
														<div class="wrapper" style="height:10px;"></div>
														<div class="wrapper">
														<span>&nbsp;</span>
														<input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
														<input type="button" value="Update" style="float:none;" class="button1"  onClick="return valid();" />&nbsp;<input type="button" value="Back to Profile" style="float:none;" class="button1"  onClick="window.location.href='myaccount.php';" />
														<?php /*?><a href="#" class="button2 color3" onClick="document.getElementById('AddeventForm').reset()">Clear</a><?php */?>
														</div>
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

	if(form.firstname.value.split(" ").join("")=="")
	{
		alert("Please enter first name.")
		form.firstname.focus();
		return false;
	}
	if(form.lastname.value.split(" ").join("")=="")
	{
		alert("Please enter last name.")
		form.lastname.focus();
		return false;
	}
	if(form.email.value.split(" ").join("")=="")
	{
			alert("Please enter your email address.")
			form.email.focus();
			return false;
	}
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)))
	{
			alert("Please enter a proper email address.");
			form.email.focus();
			return false;
	}   
	if(form.password.value.split(" ").join("")=="")
	{
			alert("Please enter your password.")
			form.password.focus();
			return false;
	} 
	
	if(form.dob_month.value.split(" ").join("")=="" || form.dob_day.value.split(" ").join("")=="" || form.dob_year.value.split(" ").join("")=="")
	{
		alert("Please select date of birth.")
		return false;
	}
	if(form.gender1.checked==false && form.gender2.checked==false)
	{
		alert("Please select gender.")
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