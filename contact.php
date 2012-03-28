<? include("connect.php"); 
$ACTIVEPAGE='contact';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact | <? echo $SITE_NAME;?></title>
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
				<div class="box1">
					<div class="line1 wrapper">
						<section class="col1">
							<h2><strong>O</strong>ur<span>Address</span></h2>
							<strong class="address">
								Country:<br>
								City:<br>
								Zip Code:<br>
								Telephone:<br>
								Fax:<br>
								E-Mail:
							</strong>
							USA<br>
							San Diego<br>
							50122<br>
							+354 5635600<br>
							+354 5635610<br>
							<a href="mailto:">hopecenter@gmail.com</a>
						</section>
						<section class="col2 pad_left1">
							<h2 class="color2"><strong>M</strong>iscellaneous<span>info</span></h2>
							<p class="pad_bot1">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
							</p>
							Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.
						</section>
					</div>
				</div>	
			</div>
			<div class="wrapper">
				<div class="pad_left2 relative">
					<h4 class="color3"><span>Contact</span>Form</h4>
					<img src="images/page6_img1.png" alt="" class="img1">
					<form id="ContactForm">
						<div>
							<div class="wrapper"><span>Your Name:</span><input type="text" class="input"></div>
							<div class="wrapper"><span>Your E-mail:</span><input type="text" class="input"></div>
							<div class="wrapper"><span>Your Website:</span><input type="text" class="input"></div>
							<div class="textarea_box"><span>Your Message:</span><textarea name="textarea" cols="1" rows="1"></textarea></div>
							<a href="#" class="button2 color3" onClick="document.getElementById('ContactForm').submit()">Send</a>
							<a href="#" class="button2 color3" onClick="document.getElementById('ContactForm').reset()">Clear</a>
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
<script type="text/javascript">Cufon.now();</script>
</body>
</html>