<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");


if($_REQUEST['Did']>0)
{
	$Did=trim(mysql_real_escape_string($_REQUEST['Did']));
	$delpuic=mysql_query("delete from events_pictures where id='$Did' and eventid='".$_REQUEST['id']."'");
	header("location:uploadpics.php?msg=Your picture has been deleted successfully.&id=".$_REQUEST['id']."");			
	exit;
}



if($_POST['HidRegUser']=="1")
{
		if($_FILES["picture"]['tmp_name'])
		{
			 $file=$_FILES["picture"];	
			 //$send_name1=ereg_replace (" ", "",$file["name"]); 			
			 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);		
			 $filename1=rand().$send_name1;		
			 $filetoupload=$file['tmp_name'];				 
			 $path="../Events/".$filename1; 
			 copy($filetoupload,$path);
			 $extsql2=",picture='$filename1'";
			 if($_POST["picture_old"]!="")
			 {
				$oldres=$_POST["picture_old"];
				@unlink("../Events/thumb/$oldres");
				@unlink("../Events/$oldres");
			 }
			 //Create Thumb 200 x 213
				$source=$path;
				$thumb_f2 = $filename1 ;
				$dest2="../Events/thumb/".$thumb_f2;
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
			
				$AddUserQry="INSERT INTO events_pictures SET picture='$filename1',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),eventid='".$_REQUEST['id']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
		}
	
		header("location:uploadpics.php?msg=Your picture has been updated successfully.&id=".$_REQUEST['id']."");			
		exit;
}

$query1="select * from events where id='".trim($_REQUEST['id'])."' ";
$res=mysql_query($query1);
$tot=mysql_affected_rows();
if($tot>0)
{
	$Row=mysql_fetch_array($res);
}
else
{
	header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."&id=".$_REQUEST['id']."");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Account | <? echo $SITE_NAME;?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.6.js"></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script> 
<script type="text/javascript" src="../js/Vegur_700.font.js"></script>
<script type="text/javascript" src="../js/Vegur_400.font.js"></script>
<script type="text/javascript" src="../js/Vegur_300.font.js"></script>
<script type="text/javascript" src="../js/atooltip.jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="../js/html5.js"></script>
	<style type="text/css">
		.box1 figure {behavior:url(../js/PIE.htc)}
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
		<article id="content">
			
			<div class="wrapper">
				<div class="pad_left2 relative">
					<h4 class="color3"><span>Upload Photos  </span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" style="width:830px;">
								<h2>Event: <? echo ucfirst(stripslashes($Row['name']));?></h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="2" cellpadding="3">
										  <tr>
										  		<td align="left" style="padding:5px;">
														<form name="frmpicture" id="frmpicture" enctype="multipart/form-data" method="post">
														<table width="100%" border="0" cellspacing="5" cellpadding="0">
														  <tr>
															<td width="78" align="left">Picture:</td>
															<td width="232" align="left"><input type="file" name="picture" id="picture">&nbsp;</td>
															<td width="133" align="left">&nbsp;</td>
															<td align="left" width="373">&nbsp;</td>
														  </tr>
														  <tr>
															<td align="left">Caption:</td>
															<td align="left"><input type="text" name="caption" id="caption">&nbsp;</td>
															<td align="left">&nbsp;
															<input type="hidden" name="HidRegUser" id="HidRegUser" value="0" />
															<input type="submit" value="Upload Picture" style="float:none;" class="button1"  onClick="return Proceed();" /></td>
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
													$GetTotalPictureQry="SELECT * FROM events_pictures WHERE eventid='".trim($_REQUEST['id'])."' order by id desc";
													$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
													$TotGetTotalPicture=mysql_affected_rows();
													if($TotGetTotalPicture>0)
													{
														for($F=0;$F<$TotGetTotalPicture;$F++)
														{
															$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
															if($F%5==0){echo "</tr><tr><td height='25'>&nbsp;</td></tr><tr>";}
															?>
															<td width="145" height="155" valign="top" >
																<table border='0' cellpadding='0' cellspacing='0'  width="145" style="background-color:#999999;" >
																  <tr>
																	<td align='center' width="145" height="135"><img src="<? echo "../Events/thumb/".$GetTotalPictureQryRow['picture'];?>"  border="0" /></td>
																  </tr>
																  <? if(trim($GetTotalPictureQryRow['caption'])!="") { ?>
																  <tr>
																	<td align='center' style="font-size:11px;color:#FFFFFF;" ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
																  </tr>	
																  <? } ?>
																  <tr>
																	<td align='center' height="25" valign="bottom" ><a  href='#' class="button1" style="float:none;font-size:11px;" onClick="javascript:document.location.href='uploadpics.php?Did=<? echo $GetTotalPictureQryRow['id']; ?>&id=<? echo $_REQUEST['id']; ?>';">Delete</a></td>
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
	</div>
</div>
<script language="javascript">
function Proceed()
{
	if(document.getElementById('picture').value=='')
	{
		alert("Please select picture.");
		document.getElementById('picture').focus();
		return false;
	}
	if(document.getElementById("picture").value!="")
	{
		if(!in_ext_lib_all(document.getElementById("picture").value))
		{
			return false;
		}
	}
	
	document.frmpicture.HidRegUser.value='1';
	//document.frmpicture.submit();
	return  true;    
}
function in_ext_lib_all(str)
{
	var x;
	var flag = 0;
	var myext = new Array();
	myext[0] = ".jpg";
	myext[1] = ".jpeg";
	myext[2] = ".gif";
	myext[3] = ".png";
	myext[4] = ".bmp";
	
	for (x in myext)
	{
		if(str.substr(str.lastIndexOf(".",str)).toLowerCase() == myext[x])
		{
			flag = 1;
			break;	
		}
	}
	if(flag == 0)
	{
		alert("Please upload only .jpg, .gif, .png, .bmp file format.");
		return false;
	}
	else
	{
		return true;
	}
}
</script>

</body>
</html>