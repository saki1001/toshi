<? include("connect.php"); 
$mlevel=3;
$userid=$_GET["userid"];
$id=$_GET["id"];
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
<script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
<body id="page5">
<TABLE cellSpacing=10 cellPadding=0  border=0 width="98%" align="center">
	<TBODY>
		<TR>
			<TD>			  
				<FORM name="form2" action="#" method="post" enctype="multipart/form-data">        
					<TABLE width="100%" border=0 cellSpacing=0 cellpadding="0" class="t-b">
						<TR> 
						  <TD colspan="2" height="30" class="form_back" align="right"><a href="#" onClick="javascript:window.close();">Close</a></TD>
						</TR>
						<tr>
						  <TD align="center" colspan="2">
						  		<table width="100%"border="0" cellspacing="5" cellpadding="0">
									<?
										$GetTotalPictureQry="SELECT * FROM users_videos WHERE userid='".trim($userid)."' and id='".trim($id)."' order by id desc";
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
				 	  	</TR>
											
					</TABLE>
				</FORM></TD>
		</TR>		
	</TBODY>
</TABLE>
</BODY>
</HTML>