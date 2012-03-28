<? include("connect.php"); 
$ACTIVEPAGE='contact';

if($_POST['HidRegUser']=="1")
{
	$query1="select id from users where email='".trim(addslashes($_POST['email']))."' and password='".trim($_POST['password'])."'";
	$res=mysql_query($query1);
	$tot=mysql_affected_rows();
	if($tot>0)
	{
		$Row=mysql_fetch_object($res);
		$_SESSION['UsErId']=$Row->id;
		header("location:$SITE_URL/myaccount.php");
		exit;
	}
	else
	{
		header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login | <? echo $SITE_NAME;?></title>
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
					<h4 class="color3"><span>Forgot Password?</span></h4>
					<img src="images/page6_img1.png" alt="" class="img1">
					<form id="RegisterForm" name="RegisterForm" enctype="multipart/form-data" method="post">
						<div>
							<div class="wrapper" style="color:#FF0000;" id="Result_ID"><? echo $_REQUEST['msg'];?></div>
							<div class="wrapper"><span>Email:</span><input type="text" class="input" name="email" id="email"></div>
							<input type="hidden" name="HidLoginUser" id="HidLoginUser" value="0" />
							<a href="#" class="button2 color3" onclick="return Chklogin();"  >SUBMIT</a>
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
function Chklogin()
{
	form=document.RegisterForm;
	if(form.email.value==""  || form.email.value=="Enter your email here")
	{
		alert("Please enter your email address.")
		form.email.focus();
		return false;
	}
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)))
	{
			alert("Please enter a proper email address.");
			form.email.focus();
			return false;
	}			
	else
	{
		sendRequestPost();		
		return  false;	
	}
}
</script>
<script language="javascript" type="text/javascript">
	// Set path to PHP script
	var phpscript = 'ajax_forgot.php';
	function createRequestObject() {
		var req;
		if(window.XMLHttpRequest){
			// Firefox, Safari, Opera...
			req = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			// Internet Explorer 5+
			req = new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			// There is an error creating the object,
			// just as an old browser is being used.
			alert('There was a problem creating the XMLHttpRequest object');
		}
	
		return req;
	
	}
	// Make the XMLHttpRequest object
	var http = createRequestObject();
	function sendRequestPost() {
		
		var user = document.getElementById('email').value;	
		// Open PHP script for requests
		http.open('post', phpscript);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = handleResponsePost;
		http.send('email='+ user);
	
	}
	function handleResponsePost() 
	{
		if(http.readyState == 1)
		{ 
			document.getElementById("Result_ID").innerHTML = "Please wait, loading..." ; 
		}
		else if(http.readyState == 4 && http.status == 200)
		{
			var praful = http.responseText;			
			document.getElementById("Result_ID").innerHTML = praful;
			document.getElementById("email").value='';
		}
	}
	
</script>	
<script type="text/javascript">Cufon.now();</script>
</body>
</html>