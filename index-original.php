<? include("connect.php");
$INDEXPAGE='YES';
$ACTIVEPAGE='home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo $SITE_TITLE;?></title>
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
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/tms-0.3.js"></script>
<script type="text/javascript" src="js/tms_presets.js"></script>
<script type="text/javascript" src="js/backgroundPosition.js"></script>
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
<body id="page1">
<div class="body1">
	<div class="main">
<!-- header -->
		<? include("top.php");?>
		<? if($INDEXPAGE=="YES"){?>
    	<div class="slider">
    		<ul class="items">
    			<li>
    				<img src="images/img1.jpg" alt="">
    				<div class="banner">
    					<div class="wrapper"><span>Our Mission</span></div>
    					<?php /*?><div class="wrapper"><strong></strong></div><?php */?>
    				</div>
    			</li>
    			<li>
    				<img src="images/img2.jpg" alt="">
    				<div class="banner">
    					<div class="wrapper"><span>Gallery</span></div>
    					<?php /*?><div class="wrapper"><strong></strong></div><?php */?>
    				</div>
    			</li>
    			<li>
    				<img src="images/img3.jpg" alt="">
    				<div class="banner">
    					<div class="wrapper"><span>Blog</span></div>
    					<?php /*?><div class="wrapper"><strong></strong></div><?php */?>
    				</div>
    			</li>
    		</ul>
    		<ul class="pagination">
    			<li id="banner1"><a href="#">Mission<span></span></a></li>
    			<li id="banner2"><a href="#">Gallery<span></span></a></li>
    			<li id="banner3"><a href="#">Blog<span></span></a></li>
    		</ul>
    	</div>
    	<? } ?>
        <!-- <div class="ic"><div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div></div> -->
<!-- / header -->
<!-- content -->
		<article id="content">
			<div class="wrapper">
				<div class="box1">
					<div class="line1"><div class="line2 wrapper">
						<section class="col1">
							<h2><strong>E</strong>vent<span> 1</span></h2>
							<?
							$RandUserQry1="select * from events where approve='Y' and (enddate='0000-00-00' or enddate>='".date('Y-m-d')."') order by startdate asc  limit 0,1";
							$RandUserQryRs1=mysql_query($RandUserQry1);
							$RandUserQryRow1=mysql_fetch_array($RandUserQryRs1);
							?>
							<div class="pad_bot1"  style="height:135px;" align="center"><figure>
							 <? if($RandUserQryRow1['picture']!='' && $RandUserQryRow1['picture_display']=='Y'){?>
							  <a href='eventdetail.php?eventId=<?=$RandUserQryRow1['id']?>'><img <?php /*?>width="260" height="132"<?php */?> src="onlinethumb.php?nm=<? echo "Events/".$RandUserQryRow1['picture'];?>&mwidth=260&mheight=132" border="0" style="border:2px solid;border-color:#666666;"/></a>
							  <? }else{ ?>
							  <a href='eventdetail.php?eventId=<?=$RandUserQryRow1['id']?>' ><img src="<? echo "images/noimage-260-132.jpg";?>" border="0"  /></a>
							  <? } ?>
							</figure></div>
							<strong><? echo ucfirst(stripslashes($RandUserQryRow1['name']));?></strong><br>
							<?
							$selectvenee = "select * from event_venues where id ='".$RandUserQryRow1['venueid']."'";
							$rsselectvenue = mysql_query($selectvenee);
							$rowselectvenue = mysql_fetch_assoc($rsselectvenue);
							$Address_1 = stripslashes($rowselectvenue['address']);
							$city = stripslashes($rowselectvenue['city']);
							$state= stripslashes($rowselectvenue['state']);
							$zipcode = stripslashes($rowselectvenue['zipcode']);
							$country = stripslashes($rowselectvenue['country']);
							$venuename = stripslashes($rowselectvenue['name']);
							echo $venuename.", ";
							echo $Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
							?>
							<a href="eventdetail.php?eventId=<?=$RandUserQryRow1['id']?>" class="button1">Read More</a>
						</section>
						<section class="col1 pad_left1">
							<h2 class="color2"><strong>E</strong>vent<span> 2</span></h2>
							<?
							//$RandUserQry2="SELECT id,picture,firstname,lastname,gender FROM users where id!='".$RandUserQryRow1['id']."' and approve='Y' and displayprofile='Y' order by rand() limit 0,1";
							$RandUserQry2="select * from events where id!='".$RandUserQryRow1['id']."' and approve='Y' and (enddate='0000-00-00' or enddate>='".date('Y-m-d')."') order by startdate asc  limit 0,1";
							$RandUserQryRs2=mysql_query($RandUserQry2);
							$TotUser2=mysql_affected_rows();
							if($TotUser2>0)
							{
								$RandUserQryRow2=mysql_fetch_array($RandUserQryRs2);
								?>
								<div class="pad_bot1" style="height:135px;" align="center"><figure>
								<? if($RandUserQryRow2['picture']!='' && $RandUserQryRow2['picture_display']=='Y'){?>
								  <a href='eventdetail.php?eventId=<?=$RandUserQryRow2['id']?>'><img <?php /*?>width="260" height="132"<?php */?> src="onlinethumb.php?nm=<? echo "Events/".$RandUserQryRow2['picture'];?>&mwidth=260&mheight=132" border="0" style="border:2px solid;border-color:#666666;"/></a>
								  <? }else{ ?>
								  <a href='eventdetail.php?eventId=<?=$RandUserQryRow2['id']?>' ><img src="<? echo "images/noimage-260-132.jpg";?>" border="0"  /></a>
								  <? } ?>
								</figure></div>
								<strong><? echo ucfirst(stripslashes($RandUserQryRow2['name']));?></strong><br>
								<?
								$selectvenee = "select * from event_venues where id ='".$RandUserQryRow2['venueid']."'";
								$rsselectvenue = mysql_query($selectvenee);
								$rowselectvenue = mysql_fetch_assoc($rsselectvenue);
								$Address_1 = stripslashes($rowselectvenue['address']);
								$city = stripslashes($rowselectvenue['city']);
								$state= stripslashes($rowselectvenue['state']);
								$zipcode = stripslashes($rowselectvenue['zipcode']);
								$country = stripslashes($rowselectvenue['country']);
								$venuename = stripslashes($rowselectvenue['name']);
								echo $venuename.", ";
								echo $Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
								?>
								<a href="eventdetail.php?eventId=<?=$RandUserQryRow2['id']?>" class="button1 color2">Read More</a>
						<? } ?>		
						</section>
						<section class="col1 pad_left1">
							<h2 class="color3"><strong>E</strong>vent<span> 3</span></h2>
							<?
							//$RandUserQry3="SELECT id,picture,firstname,lastname,gender FROM users where id!='".$RandUserQryRow1['id']."' and id!='".$RandUserQryRow2['id']."' and approve='Y' and displayprofile='Y' order by rand() limit 0,1";
							$RandUserQry3="select * from events where id!='".$RandUserQryRow1['id']."' and id!='".$RandUserQryRow2['id']."' and approve='Y' and (enddate='0000-00-00' or enddate>='".date('Y-m-d')."') order by startdate asc  limit 0,1";
							$RandUserQryRs3=mysql_query($RandUserQry3);
							$TotUser3=mysql_affected_rows();
							if($TotUser3>0)
							{
								$RandUserQryRow3=mysql_fetch_array($RandUserQryRs3);
								?>
								<div class="pad_bot1"  style="height:135px;" align="center"><figure>
								<? if($RandUserQryRow3['picture']!='' && $RandUserQryRow3['picture_display']=='Y'){?>
								  <a href='eventdetail.php?eventId=<?=$RandUserQryRow3['id']?>'><img <?php /*?>width="260" height="132"<?php */?> src="onlinethumb.php?nm=<? echo "Events/".$RandUserQryRow3['picture'];?>&mwidth=260&mheight=132" border="0" style="border:2px solid;border-color:#666666;"/></a>
								  <? }else{ ?>
								  <a href='eventdetail.php?eventId=<?=$RandUserQryRow3['id']?>' ><img src="<? echo "images/noimage-260-132.jpg";?>" border="0"  /></a>
								  <? } ?>
								</figure></div>
								<strong><? echo ucfirst(stripslashes($RandUserQryRow3['name']));?></strong><br>
								<?
								$selectvenee = "select * from event_venues where id ='".$RandUserQryRow3['venueid']."'";
								$rsselectvenue = mysql_query($selectvenee);
								$rowselectvenue = mysql_fetch_assoc($rsselectvenue);
								$Address_1 = stripslashes($rowselectvenue['address']);
								$city = stripslashes($rowselectvenue['city']);
								$state= stripslashes($rowselectvenue['state']);
								$zipcode = stripslashes($rowselectvenue['zipcode']);
								$country = stripslashes($rowselectvenue['country']);
								$venuename = stripslashes($rowselectvenue['name']);
								echo $venuename.", ";
								echo $Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
								?>
								<a href="eventdetail.php?eventId=<?=$RandUserQryRow2['id']?>" class="button1 color3">Read More</a>
							<? } ?>
						</section>
					</div></div>
				</div>	
			</div>
			<div class="wrapper">
				<h3>Our Mission</h3>
				<p class="quot">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid- idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci- tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.<img src="images/quot2.png" alt="">
				</p>
			</div>
			<div class="wrapper">
				<div class="box2">
					<div class="line1"><div class="line2 wrapper">
						<section class="col1">
							<h4><span>June 31</span>2011</h4>
							<p class="pad_bot2"><strong>Ned ut perspiciatis unde omnis</strong></p>
							<p>Natus error sit voluptatem accusantium doloremque laudantium.</p>
							<a href="#" class="button2">Read More</a>
						</section>
						<section class="col1 pad_left1">
							<h4 class="color2"><span>June 29</span>2011</h4>
							<p class="pad_bot2"><strong>At veroeos et accusamus etiusto</strong></p>
							<p>Architecto beatae vitae dicta sunt explicabo emo enim ipsam.</p>
							<a href="#" class="button2 color2">Read More</a>
						</section>
						<section class="col1 pad_left1">
							<h4 class="color3"><span>June 17</span>2011</h4>
							<p class="pad_bot2"><strong>Temporibus quibusdam</strong></p>
							<p>Magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
							<a href="#" class="button2 color3">Read More</a>
						</section>
					</div></div>
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
<script>
$(window).load(function(){
	$('.slider')._TMS({
		preset:'zabor',
		easing:'easeOutQuad',
		duration:800,
		pagination:true,
		banners:true,
		waitBannerAnimation:false,
		slideshow:6000,
		bannerShow:function(banner){
			banner
				.css({right:'-700px'})
				.stop()
				.animate({right:'0'},600, 'easeOutExpo')
		},
		bannerHide:function(banner){
			banner
				.stop()
				.animate({right:'-700'},600,'easeOutExpo')
		}
	})
	$('.pagination li').hover(function(){
		if (!$(this).hasClass('current')) {
			$(this).find('a').stop().animate({backgroundPosition:'0 0'},600,'easeOutExpo', function(){$(this).parent().css({backgroundPosition:'-20px 0'})});
		}
	},function(){
		if (!$(this).hasClass('current')) {
			$(this).css({backgroundPosition:'0 0'}).find('a').stop().animate({backgroundPosition:'-250px 0'},600,'easeOutExpo');
		}
	})
})
</script>
</body>
</html>