<? include("connect.php"); 
$ACTIVEPAGE='register';

if($_POST['HidRegUser']=="1")
{
	$getCustomerQry="SELECT id from users WHERE email='".addslashes($_POST['email'])."'";	
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
		
		if($_POST['accounttype_other']!="" && $_POST['accounttype']=="Other")
		{
			$accounttype=addslashes($_POST['accounttype_other']);
		}
		else
		{
			$accounttype=addslashes($_POST['accounttype']);
		}
				
		$activationkey=genRandomString(40);		
		$AddUserQry="INSERT INTO users SET
						$anddd
						lastname='".addslashes($_POST['lastname'])."',						
						password='".addslashes($_POST['password'])."',
						email='".addslashes($_POST['email'])."',
						gender='".addslashes($_POST['gender'])."',
						genre='".addslashes($_POST['genre'])."',
						dob='".addslashes($dob)."',
						labeltype='".addslashes($_POST['labeltype'])."',
						accounttype='".addslashes($accounttype)."',
						weight='".addslashes($_POST['weight'])."',
						height='".addslashes($_POST['height'])."',
						newsletter='".addslashes($_POST['newsletter'])."',
						bust='".addslashes($_POST['bust'])."',
						hips='".addslashes($_POST['hips'])."',
						shoesize='".addslashes($_POST['shoesize'])."',
						inseam='".addslashes($_POST['inseam'])."',
						neck='".addslashes($_POST['neck'])."',
						sleeve='".addslashes($_POST['sleeve'])."',
						approve='N',
						activationkey='$activationkey',
						regdate=now()";	 
		$AddUserQryRs=mysql_query($AddUserQry);
		$InserId=mysql_insert_id();
		//$_SESSION['UsErId']=$InserId;
		
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
		
		$toemail=$_POST['email'];
		$from1=$ADMIN_MAIL;	
		$subject1=stripslashes(GetName1("staticpage","name","id",10));
		
		$activationlink="<a href='$SITE_URL/activateaccount.php?activationkey=".$activationkey."'>here</a>";
		$activationurl="<a href='$SITE_URL/activateaccount.php?activationkey=".$activationkey."'>$SITE_URL/activateaccount.php?activationkey=".$activationkey."</a>";
		
		$detail=stripslashes(GetName1("staticpage","content","id",10));
		$detail=str_replace("[NAME]",stripslashes($_POST['firstname']),$detail);
		$detail=str_replace("[ACTIVATIONLINK]",$activationlink,$detail);
		$detail=str_replace("[ACTIVATIONURL]",$activationurl,$detail);
		$detail=str_replace("[SITEURL]",$SITE_URL,$detail);
		
		$mailcontent1="<html>
			<head>
			<title>$SITE_TITLE</title>
			</head>
			<body>
			<table width='100%' border='0' cellspacing='2' cellpadding='0'>
			  <tr>
				<td align='left'>".$detail."</td>
			  </tr>
			</table>
			</body>
			</html>
			";
		//echo $toemail;echo $subject1;echo $mailcontent1;echo $from1;
		if($_SERVER['HTTP_HOST']!="plus")
		{
			HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
		}
		
		header("location:register.php?msg=Please check your email and activate your account.");			
		exit;
	}
	else
	{
		$response_text="The email address you provided is already registered.";	
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Auditions | <? echo $SITE_NAME;?></title>
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
<script language="javascript" type="text/javascript">
function HideShow(val)
{
	if(val==2)
	{
		document.getElementById('DISPLAY2').style.display='inline';
		document.getElementById('DISPLAY1').style.display='none';
		document.getElementById('DISPLAY1_1').style.display='none';
	}
	else
	{
		document.getElementById('DISPLAY2').style.display='none';
		document.getElementById('DISPLAY1').style.display='inline';
		document.getElementById('DISPLAY1_1').style.display='inline';
	}
}
</script>
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
					<h4 class="color3"><span>Auditions</span></h4>
					<?php /*?><img src="images/page6_img1.png" alt="" class="img1"><?php */?>
					<div style="padding-right:10px;padding-top:0px;" align="right" class="img1">
					<h4 class="color3" style="padding-top:0px;"><span>Already have an account?</span></h4>
					<a href="login.php" class="button2 color3">SIGN IN</a>
					</div>
					<form id="RegisterForm" name="RegisterForm" enctype="multipart/form-data" method="post" onSubmit="return valid();">
						<div>
							<? if($_REQUEST['msg']!=''){ echo "<div class='wrapper' style='width:350px;color:#ff0000;'>".$_REQUEST['msg']."</div>"; }?>
							<div class="wrapper">
								<span>Account Type:</span>
								<select name="accounttype" id="accounttype" style="width:260px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px"  onchange="HideShowOther(this.value);">
									<?=GetDropdown(name,name,accounttype,"  order by name='other' asc,name asc",stripslashes($_REQUEST['accounttype']));?>
								</select>
								<?php /*?><input onClick="HideShow(1);" type="radio" name="accounttype" id="accounttype1" value="Personal" checked="checked"><label for="accounttype1">Personal</label>&nbsp;&nbsp;
								<input onClick="HideShow(2);" type="radio" name="accounttype" id="accounttype2" value="Musician"><label for="accounttype2">Musician</label>&nbsp;&nbsp;
								<input onClick="HideShow(3);" type="radio" name="accounttype" id="accounttype3" value="Comedian"><label for="accounttype3">Comedian</label>&nbsp;&nbsp;
								<input onClick="HideShow(4);" type="radio" name="accounttype" id="accounttype4" value="Filmmaker"><label for="accounttype4">Filmmaker</label><?php */?>
							</div>
							<div id="HideShowOtherAccount_ID" style="display:none;height:50px;">
								<div class="wrapper"><span>&nbsp;</span>Other: <input style="width:205px;" type="text" class="input" name="accounttype_other" id="accounttype_other"></div>
							</div>
							<div id="DISPLAY1">
								<div class="wrapper"><span>First Name:</span><input type="text" class="input" name="firstname" id="firstname"></div>
								<div class="wrapper"><span>Last Name:</span><input type="text" class="input" name="lastname" id="lastname"></div>
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
							<div class="wrapper"><span>Email:</span><input type="text" class="input" name="email" id="email"></div>
							<div class="wrapper"><span>Password:</span><input type="password" class="input" name="password" id="password"></div>
							
							<div id="DISPLAY1_1">
								<div class="wrapper"><span>Birthday:</span>
								<select style="width:83px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px" name="dob_month"><option value="">Month</option><? echo getMonth($dobmonth);?></select>
								<select style="width:83px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px" name="dob_day"><option value="">Day</option><? echo getDayValue($dobday);?></select>
								<select style="width:85px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px" name="dob_year"><option value="">Year</option><? echo getYear($dobyear,2,'styear',1900);?></select>
								</div>
								<div class="wrapper">
									<span>Gender:</span>
									<input type="radio" name="gender" id="gender1" value="Male" checked="checked"><label for="gender1">Male</label>&nbsp;&nbsp;
									<input type="radio" name="gender" id="gender2" value="Female"><label for="gender2">Female</label>&nbsp;&nbsp;
								</div>
							</div>
							<div class="wrapper"><span>Weight:</span><input type="text" class="input" name="weight" id="weight"></div>
							<div class="wrapper"><span>Height:</span>
							<select name="height"  id="height" style="width:140px;background:#666666;padding:1px 2px;color:#CCCCCC;font:11px;height:20px">
								<option value=""></option>
								<?
								for($i="124";$i<220;$i++){
									echo '<option value="'.$i.'">'.$i.'cm / '.get_height($i).'';
								}
								?>
								</select>
							<?php /*?><input type="text" class="input" name="height" id="height"><?php */?></div>
							
							<div id="DISPLAY3" style="display:inline;">
								<div class="wrapper"><span>Bust:</span><input type="text" class="input" name="bust" id="bust" style="width:140px;"></div>
								<div class="wrapper"><span>Hips:</span><input type="text" class="input" name="hips" id="hips" style="width:140px;"></div>
								<div class="wrapper"><span>Shoe Size:</span><input type="text" class="input" name="shoesize" id="shoesize" style="width:140px;"></div>
								<div class="wrapper"><span>Inseam:</span><input type="text" class="input" name="inseam" id="inseam" style="width:140px;"></div>
								<div class="wrapper"><span>Neck:</span><input type="text" class="input" name="neck" id="neck" style="width:140px;"></div>
								<div class="wrapper"><span>Sleeve:</span><input type="text" class="input" name="sleeve" id="sleeve" style="width:140px;"></div>
							</div>
							
							
							<div class="wrapper" style="height:10px;"></div>
							<div class="wrapper"><span>&nbsp;</span><img src='CaptchaSecurityImages.php' id='iframe1' align="absmiddle" /></div>
							<div class="wrapper" style="height:10px;"></div>
							<div class="wrapper"><span>&nbsp;</span><input type="text" onFocus="if(this.value=='Enter above security code'){this.value='';}"  onblur="if(this.value==''){this.value='Enter above security code';}" value="Enter above security code" class="input" name="recaptcha_response_field2" id="recaptcha_response_field2"></div>
							<div class="wrapper" style="height:10px;"></div>
							<div class="wrapper"><span>&nbsp;</span><input type="checkbox" name="newsletter" value="Y"  checked="checked"/> I'm happy to receive newsletters from <? echo $SITE_NAME;?>.</div>
							<div class="wrapper" style="height:10px;"></div>
							<input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
							<a href="#" class="button2 color3" onClick="return valid();">REGISTER</a>
							<?php /*?><a href="#" class="button2 color3" onClick="document.getElementById('RegisterForm').reset()">Clear</a><?php */?>
						</div>
					</form>
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
	form=document.RegisterForm;
	/*if(form.accounttype2.checked==true)
	{
		if(form.artistname.value.split(" ").join("")=="")
		{
			alert("Please enter artist name.")
			form.artistname.focus();
			return false;
		}
		if(form.genre.value.split(" ").join("")=="")
		{
			alert("Please select genre.")
			form.genre.focus();
			return false;
		}
		if(form.labeltype.value.split(" ").join("")=="")
		{
			alert("Please select label.")
			form.labeltype.focus();
			return false;
		}
	}
	else
	{*/
	if(form.accounttype.value.split(" ").join("")=="Other" && form.accounttype_other.value.split(" ").join("")=="")
	{
		alert("Please enter account type")
		return false;
	}
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
	/*}*/	
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
	/*if(form.accounttype2.checked==false)
	{*/
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
	/*}*/
	
	if(document.getElementById('accounttype').value=="Actors" || document.getElementById('accounttype').value=="tosh-ette" || document.getElementById('accounttype').value=="tosh-hunk" )
	{
		if(form.bust.value.split(" ").join("")=="")
		{
			alert("Please enter your bust size.")
			form.bust.focus();
			return false;
		}
		if(form.hips.value.split(" ").join("")=="")
		{
			alert("Please enter your hips size.")
			form.hips.focus();
			return false;
		}
		if(form.shoesize.value.split(" ").join("")=="")
		{
			alert("Please enter your shoe size.")
			form.shoesize.focus();
			return false;
		}
		if(form.inseam.value.split(" ").join("")=="")
		{
			alert("Please enter your inseam.")
			form.inseam.focus();
			return false;
		}
		if(form.neck.value.split(" ").join("")=="")
		{
			alert("Please enter your neck size.")
			form.neck.focus();
			return false;
		}
		if(form.sleeve.value.split(" ").join("")=="")
		{
			alert("Please enter your sleeve size.")
			form.sleeve.focus();
			return false;
		} 
	}
	
	if(form.recaptcha_response_field2.value=="")
	{
		alert("Please enter security code.")
		form.recaptcha_response_field2.focus();
		return false;
	}
	recaptcha_response_field=document.RegisterForm.recaptcha_response_field2.value;
	var poststr="recaptcha_response_field2="+recaptcha_response_field;
	makePOSTRequest2('ajaxcaptcha.php', poststr);
	return true;    
}

var http_request = false;
function makePOSTRequest2(url, parameters)
{
  http_request = false;
  if (window.XMLHttpRequest) { // Mozilla, Safari,...
	 http_request = new XMLHttpRequest();
	 if (http_request.overrideMimeType) {         	
		http_request.overrideMimeType('text/html');
	 }
  } else if (window.ActiveXObject) { // IE
	 try {
		http_request = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
		try {
		   http_request = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {}
	 }
  }
  if (!http_request) {
	 alert('Cannot create XMLHTTP instance');
	 return false;
  }
  http_request.onreadystatechange = alertContents2;
  http_request.open('POST', url, true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http_request.setRequestHeader("Content-length", parameters.length);
  http_request.setRequestHeader("Connection", "close");
  http_request.send(parameters);
}
function alertContents2()
{
  if (http_request.readyState == 4) 
  {
		var result = http_request.responseText;	
		result=trim(result);
		if (result!='')
		{	
			alert("Please enter correct verification code.");						
			document.RegisterForm.recaptcha_response_field2.focus();	
			return false;
		}
		else if (result=='')
		{			
			document.RegisterForm.HidRegUser.value='1';
			document.RegisterForm.submit();
			return  true;
		}
  }
}
function trim(stringToTrim) {return stringToTrim.replace(/^\s+|\s+$/g,"");}
function HideShowOther(vall)
{
	if(vall=="Other")
	{
		document.getElementById('HideShowOtherAccount_ID').style.display='inline';
	}	
	else
	{
		document.getElementById('HideShowOtherAccount_ID').style.display='none';	
	}	

	if(vall=="Actors" || vall=="tosh-ette" || vall=="tosh-hunk" )
	{
		document.getElementById('DISPLAY3').style.display='inline';
	}
	else
	{
		document.getElementById('DISPLAY3').style.display='none';
	}
}

</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>