<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=5;
$Message="";
if(isset($_POST['Submit']))
{
	$getCustomerQry="SELECT id from users WHERE email='".addslashes($_POST['email'])."' and id!='".$_REQUEST['id']."'";	
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
						bust='".addslashes($_POST['bust'])."',
						hips='".addslashes($_POST['hips'])."',
						shoesize='".addslashes($_POST['shoesize'])."',
						inseam='".addslashes($_POST['inseam'])."',
						neck='".addslashes($_POST['neck'])."',
						sleeve='".addslashes($_POST['sleeve'])."',
						aboutme='".addslashes($_POST['aboutme'])."',
						height='".addslashes($_POST['height'])."' where id='".$_REQUEST['id']."'";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		
		if($_FILES["picture"]['tmp_name'])
		{
			 $file=$_FILES["picture"];	
			 //$send_name1=ereg_replace (" ", "",$file["name"]); 			
			 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);		
			 $filename1=rand().$send_name1;		
			 $filetoupload=$file['tmp_name'];				 
			 $path="../Users/".$filename1; 
			 copy($filetoupload,$path);
			 $extsql2=",picture='$filename1'";
			 if($_POST["picture_old"]!="")
			 {
				$oldres=$_POST["picture_old"];
				@unlink("../Users/thumb/$oldres");
				@unlink("../Users/$oldres");
			 }
			 //Create Thumb 200 x 213
				$source=$path;
				$thumb_f2 = $filename1 ;
				$dest2="../Users/thumb/".$thumb_f2;
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
			
				$AddUserQry="UPDATE users SET picture='$filename1' where id='".$_REQUEST['id']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
		}
	
		header("location:manage_user.php?msgs=3");			
		exit;
	}
	else
	{
		header("location:add_user.php?msg=The email address you provided is already registered.");			
		exit;
	}
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from users where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$Row=mysql_fetch_array($SELRs);
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?>                    Talent Profile </td>
                </tr>
                <tr>
                  <td height="222" class="formbg" valign="top">
				  	<form name="addprod" id="addprod"  method="post" enctype="multipart/form-data" action="#">
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
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> First Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="firstname" id="firstname" value="<? echo stripslashes($Row['firstname']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Last Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="lastname" id="lastname" value="<? echo stripslashes($Row['lastname']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Email:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" size="50" class="solidinput" name="email" id="email" value="<? echo stripslashes($Row['email']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Password:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="password" id="password" value="<? echo stripslashes($Row['password']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Birthday:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
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
							<select style="width:83px;padding:1px 2px;color:#000000;font:11px;height:20px" name="dob_month"><option value="">Month</option><? echo getMonth($selmonth);?></select>
							<select style="width:83px;padding:1px 2px;color:#000000;font:11px;height:20px" name="dob_day"><option value="">Day</option><? echo getDayValue($selday);?></select>
							<select style="width:85px;padding:1px 2px;color:#000000;font:11px;height:20px" name="dob_year"><option value="">Year</option><? echo getYear($selyear,2,'styear',1900);?></select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Gender:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						 	<input type="radio" name="gender" id="gender1" value="Male" <? if($Row['gender']=="Male"){echo "checked";}?>><label for="gender1">Male</label>&nbsp;&nbsp;
							<input type="radio" name="gender" id="gender2" value="Female" <? if($Row['gender']=="Female"){echo "checked";}?>><label for="gender2">Female</label>&nbsp;&nbsp;
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Weight:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="weight" id="weight" value="<? echo stripslashes($Row['weight']);?>"></td>
                        </tr>
						
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Bust:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="bust" id="bust" value="<? echo stripslashes($Row['bust']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Hips:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="hips" id="hips" value="<? echo stripslashes($Row['hips']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Shoe Size:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="shoesize" id="shoesize" value="<? echo stripslashes($Row['shoesize']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Inseam:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="inseam" id="inseam" value="<? echo stripslashes($Row['inseam']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Neck:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="neck" id="neck" value="<? echo stripslashes($Row['neck']);?>"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Sleeve:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input type="text" class="solidinput" name="sleeve" id="sleeve" value="<? echo stripslashes($Row['sleeve']);?>"></td>
                        </tr>
						
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> Height:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  
					  		<select name="height"  id="height">
							<option value=""></option>
							<?
							for($i="124";$i<220;$i++)
							{
								if($Row['height']==$i){$sel='selected';}else{$sel='';}
								echo '<option value="'.$i.'" '.$sel.'>'.$i.'cm / '.get_height($i).'';
							}
							?>
							</select>
						 <?php /*?> <input type="text" class="solidinput" name="height" id="height" value="<? echo stripslashes($Row['height']);?>"><?php */?></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span> About You:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><textarea  class="input" name="aboutme" id="aboutme" style="height:100px;width:250px;"><? echo stripslashes($Row['aboutme']);?></textarea></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Picture:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <input type="file" name="picture" id="picture" />
						  <input type="hidden" name="picture_old" id="picture_old" value="<?=$Row['picture'];?>" />
								<? if($Row['picture']!=""){?><div><span>&nbsp;</span><img src="../Users/thumb/<?=$Row['picture'];?>" border="0" /></div><? } ?>
								<div class="wrapper" style="height:10px;"></div>
								<div class="wrapper">
								<span>&nbsp;</span>
								<input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
						  </td>
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
	form=document.addprod;

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

	
	document.addprod.HidRegUser.value='1';
	//document.addprod.submit();
	return  true;    
}
</script>
</body>
</html>