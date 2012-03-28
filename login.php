<? include("connect.php"); 
$ACTIVEPAGE='contact';

if($_POST['HidRegUser']=="1")
{
	$query1="select id,approve from users where email='".trim(addslashes($_POST['email']))."' and password='".trim($_POST['password'])."'";
	$res=mysql_query($query1);
	$tot=mysql_affected_rows();
	if($tot>0)
	{
		$Row=mysql_fetch_object($res);
		if($Row->approve=="Y")
		{
			$_SESSION['UsErId']=$Row->id;
            // header("location:$SITE_URL/myaccount.php");
            header("location:myaccount.php");
			exit;
		}	
		else
		{
			// header("location:$SITE_URL/login.php?msg=Please check your email and confirm your account.");
            header("location:login.php?msg=Please check your email and confirm your account.");
			exit;
		}
	}
	else
	{
		// header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."");
		header("location:login.php?msg=Invalid email or password.&From=".$_GET['From']."");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign In | <? echo $SITE_NAME;?></title>
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
					<h4 class="color3"><span>Sign In </span></h4>
					<img src="images/page6_img1.png" alt="" class="img1">
					<form id="RegisterForm" name="RegisterForm" enctype="multipart/form-data" method="post">
						<div>
							<? if($_REQUEST['msg']!=''){?><div class="wrapper" style="color:#FF0000;"><span>&nbsp;</span><? echo $_REQUEST['msg'];?></div><? } ?>
							<div class="wrapper"><span>Email:</span><input type="text" class="input" name="email" id="email"></div>
							<div class="wrapper"><span>Password:</span><input type="password" class="input" name="password" id="password"></div>
							<div class="wrapper"><a href="forgotpass.php" style="width:200px;text-align:left;">Forgot Password?</a></div>
							<div class="wrapper" style="height:80px;"><span>&nbsp;</span>
							<input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
							<input type="submit" name="sbmit" class="button2 color3" value="Sign In" onClick="return valid();" >
							<?php /*?><a href="#" class="button2 color3" onClick="return valid();">LOGIN</a><?php */?>
							</div>
							<div class="wrapper" style="height:100px;"></div>
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
	document.RegisterForm.HidRegUser.value='1';
	document.RegisterForm.submit();
	return  true;
}
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>