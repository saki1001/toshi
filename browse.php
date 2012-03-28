<? include("connect.php"); 
$ACTIVEPAGE='browse';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Talent | <? echo $SITE_NAME;?></title>
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
					<h4 class="color3"><span>Browse</span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" style="width:830px;">
								<h2><strong style="width:100px;">Talent</strong> List</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >	 
										<?
											$subtotal=0;
											$cartsql = "select * from users where approve='Y' and displayprofile='Y' order by id desc";
											$cartres = mysql_query($cartsql);
											$totitem=mysql_affected_rows();
											$result=$prs_pageing->number_pageing_front($cartsql,10,10,"Y","Y");
											$cnt=1;
											if($totitem>0)
											{
										?>
											<?
												//for($i=0;$i<$totitem;$i++)
												while($getitem =mysql_fetch_object($result[0]))
												{
													//$getitem=mysql_fetch_object($cartres);
											?>
											
														<tr>
															<td style="padding:5px;">
																<Table cellpadding="0" cellspacing="0" width="100%"> 
																	<tr>
																		<td valign="top">
																			<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				  <tr>
																						<Td colspan="2">
																							<A HREF='viewprofile.php?id=<?=$getitem->id?>' class="link1" style="color:#990000;"><font size=2><b><u><? echo ucfirst(stripslashes($getitem->firstname));?> <? echo ucfirst(stripslashes($getitem->lastname));?></u></b></font></A> <font size="1"></font>															</Td>
																					</tr>
																					  <tr>
																						<td width="15%" align="left">Email</td>
																						<td width="85%" align="left">: <? echo (stripslashes($getitem->email));?></td>
																					  </tr>
																					  <tr>
																						<td align="left">Gender</td>
																						<td align="left">: <? echo (stripslashes($getitem->gender));?></td>
																					  </tr>
																					  <tr>
																						<td align="left">DOB</td>
																						<td align="left">: <? echo (stripslashes($getitem->dob));?></td>
																					  </tr>
																					  <? if($getitem->weight!=''){?>
																					  <tr>
																						<td align="left">Weight</td>
																						<td align="left">: <? echo (stripslashes($getitem->weight));?></td>
																					  </tr>
																					  <? } ?>
																					  <? if($getitem->height!=''){?>
																					  <tr>
																						<td align="left">Height</td>
																						<td align="left">: <? echo get_height(stripslashes($getitem->height));?></td>
																					  </tr>
																					  <? } ?>
																					  <? if($getitem->genre!=''){?>
																					  <tr>
																						<td align="left">Genre</td>
																						<td align="left">: <? echo stripslashes(GetName1("genre","name","id",stripslashes($getitem->genre)));?></td>
																					  </tr>
																					  <? } ?>
																					  <? if($getitem->labeltype!=''){?>
																					  <tr>
																						<td align="left">Label</td>
																						<td align="left">: <? echo stripslashes(GetName1("labeltype","name","id",stripslashes($getitem->labeltype)));?></td>
																					  </tr>
																					  <? } ?>
																					  <? if($getitem->aboutme!=''){?>
																					  <tr>
																						<td align="left">About me</td>
																						<td align="left">: <? echo (stripslashes($getitem->aboutme));?></td>
																					  </tr>
																					  <? } ?>
																				</table>
																		</td>
																		<td valign="bottom">
																				<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				  <? if($getitem->picture!=''){?>
																				  <tr>
																					<td align="right" valign="top"><a href='viewprofile.php?id=<?=$getitem->id?>'><img src="<? echo "Users/thumb/".$getitem->picture;?>" border="0" style="border:2px solid;border-color:#666666;"/></a></td>
																				  </tr>
																				  <? }else{ ?>
																				  <tr>
																					<td align="right" valign="top"><a href='viewprofile.php?id=<?=$getitem->id?>' ><img src="<? echo "images/noimage-135-135.jpg";?>" border="0"  /></a></td>
																				  </tr>
																				  <? } ?>
																				  <tr>
																					<td align="right" valign="bottom">&nbsp;<a href='viewprofile.php?id=<?=$getitem->id?>' class="button1">+View Profile</a>&nbsp;</td>
																				  </tr>
																				</table>
																		</td>
																	</tr>
																</Table>
															</td>
														</tr>
														<? if($i!=($totitem-1)){?>
													  	<tr >
															<td  style="padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td style="border:1px solid;"></td>
																	  </tr>
																	</table>
															</td>
														</tr>
														<? } ?>
											<? $cnt++;
												} ?>
												<? if($totitem>10){?>
													<tr><td height=10 colspan="7" align="center" ><table width="98%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td align="center"><? echo $result[1];?></td>
													  </tr>
													</table>
													</td></tr>
												<? } ?>	
											<? }
											
											else{ ?>
											<tr><td height=10 colspan="7" align="center" class="normaltext">&nbsp;</td></tr>
											<tr><td height="10" align="center"><strong>No Talents</strong></td></tr>
											<tr><td height=150 colspan="7" align="center" class="normaltext">&nbsp;</td></tr>
											<? } ?>
													
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