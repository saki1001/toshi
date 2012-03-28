<? include("connect.php"); 
$ACTIVEPAGE='about-toshi';
$Getstatic1=mysql_query("select * from staticpage where id=1");
$GetstaticRow1=mysql_fetch_array($Getstatic1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo stripslashes($GetstaticRow1['name']);?> | <? echo $SITE_NAME;?></title>
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
					<h4 class="color3"><span>About Us</span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" style="width:830px;">
								<h2><strong style="width:100px;">About</strong> Toshi</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >	 
										<tr>
											<td align="left" style="padding:5px;">
												<?
												echo stripslashes($GetstaticRow1['content']);
												?>
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
<script type="text/javascript">Cufon.now();</script>
</body>
</html>