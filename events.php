<? include("connect.php"); 
$ACTIVEPAGE='events';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Events | <? echo $SITE_NAME;?></title>
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
					<h4 class="color3"><span>Events</span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" style="width:830px;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td align="left"><h2><strong style="width:100px;">Event</strong> List</h2></td>
									<td align="right"><strong><a href="events.php" class="link1" style="color:#990000;font-size:16px;">All Events</a> | <a href="events.php?srt=Upcoming" class="link1" style="color:#990000;font-size:16px;">Upcoming</a> | <a href="events.php?srt=Past" class="link1" style="color:#990000;font-size:16px;">Past</a></strong></td>
								  </tr>
								</table>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >	 
										<?
											$subtotal=0;
											//$cartsql = "select * from events where approve='Y' and ( startdate>='".date('Y-m-d')."' and (enddate='0000-00-00' or enddate>='".date('Y-m-d')."') ) order by startdate asc ";
											//$cartsql = "select * from events where approve='Y' and (enddate='0000-00-00' or enddate>='".date('Y-m-d')."') order by startdate asc ";
											if($_REQUEST['srt']!='')
											{
												if($_REQUEST['srt']=='Upcoming')
												{
													$andqry=" and (enddate='0000-00-00' or enddate>='".date('Y-m-d')."') ";
												}
												else if($_REQUEST['srt']=='Past')
												{
													$andqry=" and (enddate!='0000-00-00' and enddate<'".date('Y-m-d')."') ";
												}
												else
												{
												
												}	
											}	
											$cartsql = "select * from events where approve='Y' $andqry order by startdate asc ";
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
																							<A HREF='eventdetail.php?eventId=<?=$getitem->id?>' class="link1" style="color:#990000;"><font size=2><b><u><? echo ucfirst(stripslashes($getitem->name));?></u></b></font></A> <font size="1"></font>
																						</Td>
																					</tr>
																					<tr>
																						<? if($getitem->picture_display=="Y" && 	$getitem->picture!=''){?>
																						<td align="left"><a href="eventdetail.php?eventId=<?=$getitem->id?>"><img src="onlinethumb.php?nm=<? echo "Events/".$getitem->picture;?>&mwidth=300&mheight=80" border="0" style="border:2px solid;"/></a></td>
																						<? } ?>
																						<td  <? if($getitem->picture_display=="Y" && 	$getitem->picture!=''){?>colspan="2" style="padding-left:10px;" width="100%"<? } ?>>
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																							  <tr>
																									<Td colspan="2" style="font-size:12px">
																										<?
																											$selectvenee = "select * from event_venues where id = $getitem->venueid";
																											$rsselectvenue = mysql_query($selectvenee);
																											$rowselectvenue = mysql_fetch_assoc($rsselectvenue);
																											$Address_1 = stripslashes($rowselectvenue['address']);
																											$city = stripslashes($rowselectvenue['city']);
																											$state= stripslashes($rowselectvenue['state']);
																											$zipcode = stripslashes($rowselectvenue['zipcode']);
																											$country = stripslashes($rowselectvenue['country']);
																											$venuename = stripslashes($rowselectvenue['name']);
																											echo $venuename."<br>";
																											echo $Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
																											$update1=$getitem->startdate;
																											if($update1!="")
																											{
																												list($year, $month, $day) = split('-', $update1);
																											}
																											if($year!='' && $month!='' && $day!='')
																											{
																													$disdate1=date("l, F j, Y", mktime(0, 0, 0, $month, $day, $year));
																											}
																											$disptime="";
																											if($getitem->startdate_hour!='')
																											{
																												$disptime = "(".$getitem->startdate_hour.":".$getitem->startdate_minute." ".strtoupper($getitem->startdate_ampm).")";
																											}
																										?>
																									</Td>	
																								</tr>
																								<tr>
																									<td colspan="2" style="font-size:12px; font-weight:bold"><? echo stripslashes($disdate1);?>&nbsp;<? echo $disptime;?></td>
																								</tr>
																								 <? if($getitem->ages!=""){?>
																								<tr>
																									<td colspan="2" style="font-size:12px;"><strong>Age Group:</strong> <? echo stripslashes($getitem->ages);?></td>
																								</tr>
																								<? }?>
																							</table>
																						</td>
																					</tr>
																					
																				</table>
																		</td>
																		<td valign="top">
																				<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				  <?php /*?><? if($getitem->picture_display=="Y" && 	$getitem->picture!=''){?>
																				  <tr>
																					<td align="right" valign="top"><img src="onlinethumb.php?nm=<? echo "Events/".$getitem->picture;?>&mwidth=100&mheight=80" border="0" style="border:2px solid;"/></td>
																				  </tr>
																				  <? } ?><?php */?>
																				  <tr>
																					<td align="right" style="padding-top:8px;" valign="bottom">
																					<table width="100%" border="0" cellspacing="0" cellpadding="0">
																					  <tr>
																						<td><? 
																					if($_SESSION['UsErId']!='' & $_SESSION['UsErId']>0)
																					{
																						$timeslotQry ="select * from events_timeslots where eventid = '".$getitem->id."' and status='Available'";
																						$timeslotQryRs = mysql_query($timeslotQry);
																						$Tottimeslot=mysql_affected_rows();
																						if($Tottimeslot>0)
																						{
																							if($getitem->enddate=='0000-00-00' || $getitem->enddate>=''.date('Y-m-d').'')	
																							{
																						?>
																								<a href='eventdetail.php?eventId=<?=$getitem->id?>#AID' class="button1"><strong class="aToolTip">Auditions Available</strong></a>
																						<?
																							}
																						}
																					}	
																					?></td>
																					  <td align="right" style="width:250px;">&nbsp;<a href='eventdetail.php?eventId=<?=$getitem->id?>' class="button1">+More Info</a>&nbsp;</td>
																					  </tr>
																					</table>
																					</td>
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
											<tr><td height="10" align="center"><strong>No events</strong></td></tr>
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