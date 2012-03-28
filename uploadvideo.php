<? include("connect.php"); 
include("getsess.php");

if($_REQUEST['Did']>0)
{
	$Did=trim(mysql_real_escape_string($_REQUEST['Did']));
	$delpuic=mysql_query("delete from users_videos where id='$Did' and userid='".$_SESSION['UsErId']."'");
	header("location:uploadvideo.php?msg=Your video has been deleted successfully.");			
	exit;
}



if($_POST['HidRegUser']=="1")
{
	if($_FILES["videofile"]['tmp_name'])
	{
		 $file=$_FILES["videofile"];	
		 //$send_name1=ereg_replace (" ", "",$file["name"]); 			
		 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);		
		 $filename1=rand().$send_name1;		
		 $filetoupload=$file['tmp_name'];				 
		 $path="Musics/".$filename1; 
		 copy($filetoupload,$path);
		 $extsql2=",videofile='$filename1'";
	}
	$AddUserQry="INSERT INTO users_videos SET video='".addslashes($_POST['video'])."',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),userid='".$_SESSION['UsErId']."' $extsql2";	 
	$AddUserQryRs=mysql_query($AddUserQry);
	header("location:uploadvideo.php?msg=Your video has been updated successfully.");			
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
<script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
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
								<h2><strong style="width:60px;">My</strong> Videos</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="2" cellpadding="3">
										  <tr>
										  		<td align="left" style="padding:5px;">
														<form name="frmpicture" id="frmpicture" enctype="multipart/form-data" method="post">
														<table width="100%" border="0" cellspacing="5" cellpadding="0">
														  <tr>
															<td width="58" align="left">Video:</td>
															<td width="450" align="left">
															<input type="file" name="videofile" id="videofile">
															 
															<br>or embed video code<br>
															<textarea name="video" id="video" style="width:450px;height:60px;"></textarea>&nbsp;</td>
															<td width="135" align="left">&nbsp;</td>
															<td align="left" width="148">&nbsp;</td>
														  </tr>
														  <tr>
															<td align="left">Caption:</td>
															<td align="left"><input type="text" name="caption" style="width:450px;" id="caption">&nbsp;</td>
															<td align="left">&nbsp;
															<input type="hidden" name="HidRegUser" id="HidRegUser" value="0" />
															<input type="submit" value="Upload Video" style="float:none;" class="button1"  onClick="return Proceed();" /></td>
															<td align="left" width="148"><input type="button" value="Back to Profile" style="float:none;" class="button1"  onClick="window.location.href='myaccount.php';" /></td>
														  </tr>
														</table>
														</form>
												</td>
										  </tr>
										  <tr>
											<td style="padding:5px;">&nbsp;</td>
										  </tr>	
										  <tr>
											<td style="padding:5px;">
												<table width="100%"border="0" cellspacing="5" cellpadding="0">
												<?
													$GetTotalPictureQry="SELECT * FROM users_videos WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
													$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
													$TotGetTotalPicture=mysql_affected_rows();
													if($TotGetTotalPicture>0)
													{
														for($F=0;$F<$TotGetTotalPicture;$F++)
														{
															$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
															if($F%1==0){echo "</tr><tr><td height='25'>&nbsp;</td></tr><tr>";}
															?>
															<td   align="center" valign="top" >
																<table border='0' cellpadding='0' cellspacing='0'  width="250" style="background-color:#999999;" >
																  <tr>
																	<td align='center'  >
																	<? if($GetTotalPictureQryRow['video']!=""){?>
																		<? echo stripslashes($GetTotalPictureQryRow['video']); ?>
																	<? }else if($GetTotalPictureQryRow['videofile']!=""){?>	
																		<div  align="center">
																		<a  href="<?=$SITE_URL;?>/Musics/<?=stripslashes($GetTotalPictureQryRow['videofile']);?>" style="display:block;width:420px;height:275px"  id="player"></a> 
																		<script language="javascript1.1">flowplayer("player", "flowplayer-3.2.7.swf");</script>
																		</div>
																	<? } ?>	
																	</td>
																  </tr>	
																  <tr>
																	<td align='center' style="color:#FFFFFF;"  ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
																  </tr>	
																  <tr>
																	<td align='center' height="25" valign="bottom" ><a  href='#' class="button1" style="float:none;font-size:11px;" onClick="javascript:document.location.href='uploadvideo.php?Did=<? echo $GetTotalPictureQryRow['id']; ?>';">Delete</a></td>
																  </tr>	
																</table>
															  </td>
															<?
														}
													}
													else
													{
														echo "<tr><td>No Videos Uploaded.</td></tr>";
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
<script language="javascript">
function Proceed()
{
	if(document.getElementById('video').value=='' && document.getElementById('videofile').value=='')
	{
		alert("Please select video file or enter video embed code.");
		document.getElementById('video').focus();
		return false;
	}if(document.getElementById('caption').value=='')
	{
		alert("Please enter video caption text.");
		document.getElementById('caption').focus();
		return false;
	}
	
	document.frmpicture.HidRegUser.value='1';
	//document.frmpicture.submit();
	return  true;    
}

</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>