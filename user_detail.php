<? include("connect.php"); 
$query1="select * from users where id='".trim($_REQUEST['id'])."' ";
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
<title>My Profile | <? echo $SITE_NAME;?></title>
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
		<div class="ic"><div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div></div>
<!-- / header -->
<!-- content -->
		<article id="content">
			
			<div class="wrapper">
				<div class="pad_left2 relative">
					<h4 class="color3"><span><? echo ucfirst(stripslashes($Row['firstname']));?> <? echo ucfirst(stripslashes($Row['lastname']));?> Profile</span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1">
						<div class=""><div class="wrapper">
							<section class="col1_1" >
								<h2><strong style="width:60px;">My</strong> Account</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="3" cellpadding="2">
										  <tr>
											<td valign="top" align="center" width="145" style="padding:5px;"><img src="<? if($Row['picture']!=""){?>Users/thumb/<?=$Row['picture'];?><? }else{?>images/noimage-135-135.jpg<? }?>" border="0"/></td>
											<td width="222" valign="top">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td width="28%" align="left"><strong>Name</strong>:</td>
													<td width="72%" align="left"><? echo ucfirst(stripslashes($Row['firstname']));?> <? echo ucfirst(stripslashes($Row['lastname']));?></td>
												  </tr>
												  <tr>
													<td align="left"><strong>Email</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['email']));?></td>
												  </tr>
												  <tr>
													<td align="left"><strong>Gender</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['gender']));?></td>
												  </tr>
												  <tr>
													<td align="left"><strong>DOB</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['dob']));?></td>
												  </tr>
												  <tr>
													<td align="left"><strong>Weight</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['weight']));?></td>
												  </tr>
												  <? if($Row['height']!=''){?>
												  <tr>
													<td align="left"><strong>Height</strong>:</td>
													<td align="left"><? echo get_height(stripslashes($Row['height']));?></td>
												  </tr>
												  <? }?>
												  <? if($Row['hips']!=''){?>
												  <tr>
													<td align="left"><strong>Hips</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['hips']));?></td>
												  </tr>
												  <? } ?>
												  <? if($Row['shoesize']!=''){?>
												  <tr>
													<td align="left"><strong>Shoe</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['shoesize']));?></td>
												  </tr>
												  <? } ?>
												  <? if($Row['inseam']!=''){?>
												  <tr>
													<td align="left"><strong>Inseam</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['inseam']));?></td>
												  </tr>
												  <? } ?>
												  <? if($Row['neck']!=''){?>
												  <tr>
													<td align="left"><strong>Neck</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['neck']));?></td>
												  </tr>
												  <? } ?>
												  <? if($Row['sleeve']!=''){?>
												  <tr>
													<td align="left"><strong>Sleeve</strong>:</td>
													<td align="left"><? echo (stripslashes($Row['sleeve']));?></td>
												  </tr>
												  <? } ?>
												</table>
											</td>
										  </tr>
										  <? if($Row['aboutme']!=''){?>
										  <tr>
											<td align="left" colspan="2" style="padding:2px;"><? echo (stripslashes($Row['aboutme']));?></td>
										  </tr>
										  <? } ?>
										</table>
									</figure>
								</div>
							</section>
							<section class="col1_1 pad_left1" >
								<h2 class="color2"><strong  style="width:60px;">My</strong> Pictures</h2>
								<div class="pad_bot1"><figure>
									<table width="100%" border="0" cellspacing="2" cellpadding="3">
									  <tr>
										<td style="padding:5px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<?
													$GetTotalPictureQry="SELECT * FROM users_pictures WHERE userid='".trim($_REQUEST['id'])."' order by id desc";
													$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
													$TotGetTotalPicture=mysql_affected_rows();
													if($TotGetTotalPicture>0)
													{
														for($F=0;$F<$TotGetTotalPicture;$F++)
														{
															$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
															if($F%3==0 && $F!=0){echo "</tr><tr><td height='25'>&nbsp;</td></tr><tr>";}
															?>
															<td width="125" height="135" valign="top" >
																<table border='0' cellpadding='0' cellspacing='0'  width="125"   >
																  <tr>
																	<td align='center' width="125" height="135"><a href="#" onClick="javascript:window.open('<? echo "Users/".$GetTotalPictureQryRow['picture'];?>', '','width=650,height=500');return false;"><img src="<? echo "Users/thumb/".$GetTotalPictureQryRow['picture'];?>"  border="0" width="105"/></a></td>
																  </tr>
																</table>
															  </td>
															<?
														}
													}
													else
													{
														echo "<tr><td>No Pictures</td></tr>";
													}
												?>
												</table>
										</td>
									  </tr>
									  
									</table>
								</figure></div>
							</section>
						</div></div>
					</div>	
					
					<div class="box1">
						<div class=""><div class="wrapper">
							<section class="col1_1" >
								<h2><strong style="width:60px;">My</strong> Music</h2>
								<div class="pad_bot1">
								<figure>
									<table width="100%" border="0" cellspacing="2" cellpadding="3">
									  <tr>
										<td style="padding:5px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<?
													$GetTotalMusicQry="SELECT * FROM users_musics WHERE userid='".trim($_REQUEST['id'])."' order by id desc";
													$GetTotalMusicQryRs=mysql_query($GetTotalMusicQry);
													$TotGetTotalPicture=mysql_affected_rows();
													if($TotGetTotalPicture>0)
													{
														for($F=0;$F<$TotGetTotalPicture;$F++)
														{
															$GetTotalMusicQryRow=mysql_fetch_array($GetTotalMusicQryRs);
															?>
															  <tr>
																<td align='left' ><span style="color:#dcd8cf;padding-left:22px;background:url(images/marker_1.gif) 0 2px no-repeat"></span>&nbsp;<a href="#" onClick="javascript:window.open('user_music.php?id=<?=$GetTotalMusicQryRow['id'];?>&userid=<?=$_REQUEST['id'];?>', '','width=650,height=500');return false;" ><? if($GetTotalMusicQryRow['caption']!=''){?><? echo ucfirst(stripslashes($GetTotalMusicQryRow['caption']));?><? }else{?>Music File<? }?></a></td>
																<td align='right' width="90" style="font-size:12px;" ><? echo date("m/d/Y",strtotime($GetTotalMusicQryRow['addeddate']));?></td>
															  </tr>
															  <tr>
																<td colspan="2"  style="border:1px solid;border-color:#CCCCCC;"></td>
															  </tr>
															<?
														}
													}
													else
													{
														echo "<tr><td>No Music</td></tr>";
													}
												?>
												</table>
										</td>
									  </tr>
									  
									</table>
								</figure></div>
								
							</section>
							<section class="col1_1 pad_left1">
								<h2 class="color2"><strong  style="width:60px;">My</strong> Videos</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="2" cellpadding="3">
										  <tr>
											<td style="padding:5px;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<?
														$GetTotalVideoQry="SELECT * FROM users_videos WHERE userid='".trim($_REQUEST['id'])."' order by id desc";
														$GetTotalVideoQryRs=mysql_query($GetTotalVideoQry);
														$TotGetTotalVideo=mysql_affected_rows();
														if($TotGetTotalVideo>0)
														{
															for($F=0;$F<$TotGetTotalVideo;$F++)
															{
																$GetTotalVideoQryRow=mysql_fetch_array($GetTotalVideoQryRs);
																?>
																  <tr>
																	<td align='left' ><span style="color:#dcd8cf;padding-left:22px;background:url(images/marker_1.gif) 0 2px no-repeat"></span>&nbsp;<a href="#" onClick="javascript:window.open('user_videos.php?id=<?=$GetTotalVideoQryRow['id'];?>&userid=<?=$_REQUEST['id'];?>', '','width=650,height=500');return false;" ><? if($GetTotalVideoQryRow['caption']!=''){?><? echo ucfirst(stripslashes($GetTotalVideoQryRow['caption']));?><? }else{?>Video File<? }?></a></td>
																	<td align='right' width="90" style="font-size:12px;" ><? echo date("m/d/Y",strtotime($GetTotalVideoQryRow['addeddate']));?></td>
																  </tr>
																  <tr>
																	<td colspan="2"  style="border:1px solid;border-color:#CCCCCC;"></td>
																  </tr>
																<?
															}
														}
														else
														{
															echo "<tr><td>No Video</td></tr>";
														}
													?>
													</table>
											</td>
										  </tr>
										 
										</table>
									</figure>
								</div>
							</section>
						</div></div>
					</div>
					
					
					<?php /*?><div class="box1">
						<div class=""><div class="wrapper">
							<section class="col1_1" >
								<h2><strong style="width:60px;">My</strong> Events</h2>
								<div class="pad_bot1">
								<figure>
									<table width="100%" border="0" cellspacing="2" cellpadding="3">
									  <tr>
										<td style="padding:5px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<?
													$GetTotalMusicQry="SELECT * FROM events WHERE userid='".trim($_REQUEST['id'])."' order by id desc";
													$GetTotalMusicQryRs=mysql_query($GetTotalMusicQry);
													$TotGetTotalPicture=mysql_affected_rows();
													if($TotGetTotalPicture>0)
													{
														for($F=0;$F<$TotGetTotalPicture;$F++)
														{
															$GetTotalMusicQryRow=mysql_fetch_array($GetTotalMusicQryRs);
															?>
															  <tr>
																<td align='left' ><span style="color:#dcd8cf;padding-left:22px;background:url(images/marker_1.gif) 0 2px no-repeat"></span>&nbsp;<a href="eventdetail.php?eventId=<? echo ucfirst(stripslashes($GetTotalMusicQryRow['id']));?>"><? if($GetTotalMusicQryRow['name']!=''){?><? echo ucfirst(stripslashes($GetTotalMusicQryRow['name']));?><? }else{?>Event Name<? }?></a></td>
																<td align='right' width="90" style="font-size:12px;" ><? echo date("m/d/Y",strtotime($GetTotalMusicQryRow['startdate']));?></td>
															  </tr>
															  <tr>
																<td colspan="2"  style="border:1px solid;border-color:#CCCCCC;"></td>
															  </tr>
															<?
														}
													}
													else
													{
														echo "<tr><td>No Events.</td></tr>";
													}
												?>
												</table>
										</td>
									  </tr>
									  
									</table>
								</figure></div>
								
							</section>
							
						</div></div>
					</div><?php */?>
					<div style="height:30px;"></div>
				</div>					
				</div>
			</div>
		</article>
<!-- / content -->
	</div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>