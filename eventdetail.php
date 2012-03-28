<? include("connect.php"); 
$ACTIVEPAGE='events';
?>
<?
$eventId = trim(mysql_real_escape_string($_GET['eventId']));
$selectevent = "select * from events where id='$eventId'";
$rsselectevent = mysql_query($selectevent);
$totevent=mysql_affected_rows();
if($totevent<=0)
{
	header("location:index.php");
	exit;
}
$rowselectevent = mysql_fetch_array($rsselectevent);
$EventName = stripslashes($rowselectevent['name']);
$venueid = stripslashes($rowselectevent['venueid']);

$selectvenee = "select * from event_venues where id = '$venueid'";
$rsselectvenue = mysql_query($selectvenee);
$rowselectvenue = mysql_fetch_assoc($rsselectvenue);
$Address_1 = stripslashes($rowselectvenue['address']);
$city = stripslashes($rowselectvenue['city']);
$state= stripslashes($rowselectvenue['state']);
$zipcode = stripslashes($rowselectvenue['zipcode']);
$country = stripslashes($rowselectvenue['country']);
$venuename = stripslashes($rowselectvenue['name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Events | <? echo $venuename;?> | <? echo $Address_1;?>, <? echo $city;?>, <? echo $state;?> | <? echo $SITE_NAME;?></title>
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
<script language="javascript" src="bookmark.js"></script>

<link href="js/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" />
<script src="js/shadowbox/shadowbox.js" type="text/javascript"></script>
<script type="text/javascript">
Shadowbox.init({
        language: 'en',
        players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
        });
</script>
<script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
</head>
<body id="page5">
<div class="body1">
  <div class="main">
    <!-- header -->
    <? include("top.php");?>
    <div class="ic">
      <div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div>
    </div>
    <!-- / header -->
    <!-- content -->
    <article id="content">
      <div class="wrapper">
        <div class="pad_left2 relative">
          <h4 class="color3"><span>Events</span></h4>
          <? if($_REQUEST['msg']){?>
          <div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div>
          <? } ?>
          <div class="wrapper">
            <div class="box1" >
              <div class="" >
                <div class="wrapper" >
                  <section class="col1_1" style="width:830px;">
                    <h2><strong style="width:90px;">Event</strong> Details</h2>
                    <div class="pad_bot1" style="border:10px solid;">
                      <figure>
                        <table border=0  width="98%" cellspacing=0 cellpadding=0>
                          <tr>
                            <td align="center" colspan="2"><H2><?=$msg;?></H2></td>
                          </tr>
                          <tr>
                            <Td colspan="3" style="padding:5px;">
							<Table cellpadding="0" cellspacing="0" width="100%"> 
									<tr>
										<Td colspan="2">
											<A HREF='#' class="link1" style="color:#990000;"><font size=2><b><u><? echo stripslashes($EventName);?></u></b></font></A> <font size="1"></font>															</Td>
									</tr>
									<tr>
										<Td colspan="2" style="font-size:12px">
											<?
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
													$disptime = "(".$getitem->startdate_hour.":".$getitem->startdate_minute." ".$getitem->startdate_ampm.")";
												}
											?>
										</Td>	
									</tr>
									<tr>
										<td width="85%" style="font-size:12px; font-weight:bold"><? echo stripslashes($disdate1);?>&nbsp;<? echo $disptime;?></td>
										
									</tr>
								</Table></td>
                          </tr>
						  <tr>
                            <Td colspan="3" style="padding:5px;"><table width="100%" cellpadding="0" cellspacing="0" >
                                
								<? 
								if($rowselectevent['enddate']=='0000-00-00' || $rowselectevent['enddate']>=''.date('Y-m-d').'')	
								{
										if($_SESSION['UsErId']!='' & $_SESSION['UsErId']>0)
										{
											$timeslotQry ="select * from events_timeslots where eventid = '$eventId' and status='Available'";
											$timeslotQryRs = mysql_query($timeslotQry);
											$Tottimeslot=mysql_affected_rows();
											if($Tottimeslot>0)
											{
										?>
												 <tr>
												  <td colspan="3" id="AID"><strong>Available Time Slots</strong></td>
												</tr>
												
												<tr>
												  <td bgcolor="#999999" style="padding:1px;"><table align="center" cellpadding="0" cellspacing="0"  border="0" style="width:800px;" width="100%">
													  <tr>
														<td width="27%" bgcolor="#999999"  align="left"><span style="color:#990000;">Time Slots</span></td>
														<td width="1%" bgcolor="#999999" align="center">&nbsp;</td>
													  <tr>
													  <?
														for($TT=0;$TT<$Tottimeslot;$TT++)
														{
															$timeslotQryRow = mysql_fetch_assoc($timeslotQryRs)
													  ?>
													  <tr height="30"  bgcolor="#AEAEAE">
														  <td align="left" bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" ><? echo stripslashes($timeslotQryRow['slot_hour']);?>:<? echo stripslashes($timeslotQryRow['slot_minute']);?> <? echo stripslashes($timeslotQryRow['slot_ampm']);?> | <? echo stripslashes($timeslotQryRow['slot_duration']);?> Minutes</td>
														  <td align="center" bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" >&nbsp;<a  class="button1" rel="shadowbox[];width=350;height=200;" href="selecttimeslot.php?timeslotid=<?=$timeslotQryRow['id'];?>&eventid=<?=$timeslotQryRow['eventid'];?>" style="width:150px;">Select Time Slot Now</a></td>
													  </tr>
													  <? }?>
													</table></td>
												</tr>
												<tr>
										  <td colspan="3">&nbsp;</td>
										</tr>
										<? } ?>
								  <? } ?>	
							 <? } ?>		  	
                          <tr>
                            <td colspan="3" align="center" ><table align="center" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                  <? 
								  $selecteventticketoption ="select * from events_pricelevel where eventid = '$eventId' and 	activeornot='Yes'";
								  $rseventticketoption = mysql_query($selecteventticketoption);
								  $totticket=mysql_affected_rows();
								  if($totticket>0) {?>
								  <td width="12%" align="left">&nbsp;<a  class="button1" href="#buytickets">BUY TICKET</a>&nbsp;</td>
                                  <td width="1%"></td>
								  <? } ?>
								  <td width="19%" align="left">&nbsp;<a  class="button1" rel="shadowbox[];width=900;height=450;" href="emailafriend.php?eventid=<?=$rowselectevent['id'];?>">+EMAIL TO FRIEND</a>&nbsp;</td>
								  <td width="1%"></td>
								  <td width="25%" align="left">&nbsp;<a  class="button1" href="javascript:bookmarksite('<?=str_replace("'","",$EventName);?>','<?=$SITE_URL?>/eventdetail.php?eventId=<? echo $_REQUEST['eventId'];?>')">+BOOKMARK THIS EVENT</a>&nbsp;</td>
								  <td width="1%"></td>
								  <td width="18%" align="left">&nbsp;<a  class="button1" rel="shadowbox[];width=900;height=550;" href="venuedetail.php?venueid=<?=$rowselectevent['venueid'];?>">+VENUE DETAILS</a>&nbsp;</td>
								  <td width="1%"></td>
								  <td width="8%" align="left">&nbsp;<a  class="button1" href="events.php">BACK</a>&nbsp;</td>
								  <td width="1%" align="left"></td>
								  <td width="13%"></td></tr>
                              </table></td>
                          </tr>
                          <tr>
                            <TD colspan="3" style="padding:5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td align="left"><strong>Event Description:</strong></td>
									  </tr>
									  <? if($rowselectevent['description']!=''){?>
									  <tr>
										<td align="left" style="padding-bottom:8px;"><? echo nl2br(stripslashes($rowselectevent['description']));?></td>
									  </tr>
									  <? } ?>
									  <? if($rowselectevent['picture']!=''){?>
									  <tr>
										<td align="center" style="padding-bottom:8px;"><img src="onlinethumb.php?nm=<? echo "Events/".$rowselectevent['picture'];?>&mwidth=800&mheight=400" border="0" style="border:5px solid;" /> </td>
									  </tr>
									  <? } ?>
									  <? if($rowselectevent['category']!='' || $rowselectevent['ages']!=''){?>
									  <tr>
										<td align="left" style="padding-top:8px;padding-bottom:2px;"><strong>Event Details:</strong></td>
									  </tr>
									  <tr>
										<td align="left"><span style="color:#990000;">Category:</span> <? echo stripslashes(GetName1("event_category","name","id",stripslashes($rowselectevent['category'])));?></td>
									  </tr>
									  <tr>
										<td align="left"><span style="color:#990000;">Ages:</span> <? echo stripslashes($rowselectevent['ages']);?></td>
									  </tr>
										  <? if($rowselectevent['website']!='' && $rowselectevent['website']!='http://'){?>
										  <tr>
											<td align="left"><span style="color:#990000;">Event Website:</span> <a target="_blank" href="<? echo WebsiteWithProperUrl(stripslashes($rowselectevent['website']))?>"><? echo stripslashes($rowselectevent['website']);?></a></td>
										  </tr>
										  <? } ?>
									  <? } ?>
									  
									  <tr>
										<td align="left" style="padding-top:8px;padding-bottom:2px;"><strong>Delivery Methods:</strong></td>
									  </tr>
									  <tr>
										<td align="left"><span style="color:#990000;">Mobile:</span> 
										<? if(stripslashes($rowselectevent['delivery_mobile_type'])!="Set Dates"){?>
											<? echo stripslashes($rowselectevent['delivery_mobile_type']);?>
										<? }else{?>	
											Available from <? echo date("m/d/Y",strtotime($rowselectevent['delivery_mobile_startdate']));?> at <? echo $rowselectevent['delivery_mobile_startdate_hour'];?>:<? echo $rowselectevent['delivery_mobile_startdate_minute'];?> <? echo $rowselectevent['delivery_mobile_startdate_ampm'];?>
											&nbsp;to&nbsp;&nbsp;<? echo date("m/d/Y",strtotime($rowselectevent['delivery_mobile_enddate']));?> at <? echo $rowselectevent['delivery_mobile_enddate_hour'];?>:<? echo $rowselectevent['delivery_mobile_enddate_minute'];?> <? echo $rowselectevent['delivery_mobile_enddate_ampm'];?>
										<? } ?>
										</td>
									  </tr>
									  <? if(stripslashes($rowselectevent['delivery_mobile_extrainfo'])!=""){?>
									  <tr>
										<td align="left" style="padding-left:50px;"><? echo nl2br(stripslashes($rowselectevent['delivery_mobile_extrainfo']));?></td>
									  </tr>
									  <? } ?>
									  
									  <tr>
										<td align="left" style="padding-top:10px;"><span style="color:#990000;">Print At Home:</span> 
										<? if(stripslashes($rowselectevent['delivery_printathome_type'])!="Set Dates"){?>
											<? echo stripslashes($rowselectevent['delivery_printathome_type']);?>
										<? }else{?>	
											Dates - &nbsp;from <? echo date("m/d/Y",strtotime($rowselectevent['delivery_printathome_startdate']));?> at <? echo $rowselectevent['delivery_printathome_startdate_hour'];?>:<? echo $rowselectevent['delivery_printathome_startdate_minute'];?> <? echo $rowselectevent['delivery_printathome_startdate_ampm'];?>
											&nbsp;to&nbsp;&nbsp;<? echo date("m/d/Y",strtotime($rowselectevent['delivery_printathome_enddate_hour']));?> at <? echo $rowselectevent['delivery_printathome_enddate_minute'];?>:<? echo $rowselectevent['delivery_printathome_enddate_ampm'];?> <? echo $rowselectevent['delivery_mobile_enddate_ampm'];?>
										<? } ?>
										</td>
									  </tr>
									  <? if(stripslashes($rowselectevent['delivery_printathome_extrainfo'])!=""){?>
									  <tr>
										<td align="left" style="padding-left:50px;"><? echo nl2br(stripslashes($rowselectevent['delivery_printathome_extrainfo']));?></td>
									  </tr>
									  <? } ?>
									  
									  <tr>
										<td align="left" style="padding-top:10px;"><span style="color:#990000;">Will Call:</span> 
										<? if(stripslashes($rowselectevent['delivery_willcall_type'])!="Set Dates"){?>
											<? echo stripslashes($rowselectevent['delivery_willcall_type']);?>
										<? }else{?>	
											Dates - &nbsp;from <? echo date("m/d/Y",strtotime($rowselectevent['delivery_willcall_startdate']));?> at <? echo $rowselectevent['delivery_willcall_startdate_hour'];?>:<? echo $rowselectevent['delivery_willcall_startdate_minute'];?> <? echo $rowselectevent['delivery_willcall_startdate_ampm'];?>
											&nbsp;to&nbsp;&nbsp;<? echo date("m/d/Y",strtotime($rowselectevent['delivery_willcall_enddate']));?> at <? echo $rowselectevent['delivery_willcall_enddate_hour'];?>:<? echo $rowselectevent['delivery_willcall_enddate_minute'];?> <? echo $rowselectevent['delivery_willcall_enddate_ampm'];?>
										<? } ?>
										</td>
									  </tr>
									  <? if(stripslashes($rowselectevent['delivery_willcall_extrainfo'])!=""){?>
									  <tr>
										<td align="left" style="padding-left:50px;"><? echo nl2br(stripslashes($rowselectevent['delivery_willcall_extrainfo']));?></td>
									  </tr>
									  <? } ?>
									  
									  <? if(stripslashes($rowselectevent['donations_enable'])=="Yes"){?>
									  <tr>
										<td align="left" style="padding-top:8px;padding-bottom:2px;"><strong>Donations:</strong> <? echo stripslashes($rowselectevent['donations_name']);?></td>
									  </tr>
									  <? } ?>
									  
									  <? if(stripslashes($rowselectevent['customfee_enable'])=="Yes"){?>
									  <tr>
										<td align="left" style="padding-top:8px;padding-bottom:2px;"><strong>Custom Fee:</strong> <? echo stripslashes($rowselectevent['customfee_enable_nameoffee']);?> - <? echo stripslashes($rowselectevent['customfee_enable_amount']);?> <? echo stripslashes($rowselectevent['customfee_enable_type']);?> | <? echo stripslashes($rowselectevent['customfee_enable_applyfee']);?></td>
									  </tr>
									  <? } ?>
									  
									  <? if(stripslashes($rowselectevent['additional_onlineservicefee'])!="" || stripslashes($rowselectevent['additional_boservicefee'])!="" || stripslashes($rowselectevent['additional_ticketnote'])!="" || stripslashes($rowselectevent['additional_ticket_tranlimit'])!="0" ){?>
									  <tr>
										<td align="left" style="padding-top:8px;padding-bottom:2px;"><strong>Additional Settings:</strong></td>
									  </tr>
									 		 <? if(stripslashes($rowselectevent['additional_onlineservicefee'])!=""){?>
											  <tr>
												<td align="left"><span style="color:#990000;">Online Service Fee:</span> <? echo stripslashes($rowselectevent['additional_onlineservicefee']);?></td>
											  </tr>
											 <? } ?>
											 <? if(stripslashes($rowselectevent['additional_boservicefee'])!=""){?>
											  <tr>
												<td align="left"><span style="color:#990000;">Box Office Service Fee:</span> <? echo stripslashes($rowselectevent['additional_boservicefee']);?></td>
											  </tr>
											 <? } ?>
											 <? if(stripslashes($rowselectevent['additional_ticketnote'])!=""){?>
											  <tr>
												<td align="left"><span style="color:#990000;">Ticket Note:</span> <? echo stripslashes($rowselectevent['additional_ticketnote']);?></td>
											  </tr>
											 <? } ?>
											 <? if(stripslashes($rowselectevent['additional_ticket_tranlimit'])!="0"){?>
											  <tr>
												<td align="left"><span style="color:#990000;">Ticket Trans. Limit:</span> <? echo stripslashes($rowselectevent['additional_ticket_tranlimit']);?></td>
											  </tr>
											 <? } ?>
											 <? if(stripslashes($rowselectevent['additional_privateevent'])!=""){?>
											  <tr>
												<td align="left"><span style="color:#990000;">Private Event:</span> <? echo stripslashes($rowselectevent['additional_privateevent']);?></td>
											  </tr>
											 <? } ?>
									  <? } ?>
									</table>
							</td>
                          </tr>
						  <?
						  $GetTotalPictureQry="SELECT * FROM events_pictures WHERE eventid='".trim($eventId)."' order by id desc";
					   	  $GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
						  $TotGetTotalPicture=mysql_affected_rows();
						  if($TotGetTotalPicture>0)
						  {
						  ?>
						  <tr>
                            <td colspan="3" style="padding-left:5px;"><strong>Pictures:</strong>&nbsp;</td>
                          </tr>
                          <tr>
							  <td align="left" style="padding-left:5px;">
							  <table   border="0" cellspacing="3" cellpadding="2" >
									<?
										
										if($TotGetTotalPicture>0)
										{
											for($F=0;$F<$TotGetTotalPicture;$F++)
											{
												$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
												if($F%5==0 && $F!=0){echo "</tr><tr><td style='height:10px;' colspan='5'></td></tr><tr>";}
												?>
													<td width="155" align="center" height="155" valign="top" style="border:1px solid;" bgcolor="#AEAEAE" >
														<table border='1' cellpadding='2' cellspacing='2'  width="155" >
														  <tr>
															<td align='center' width="155" height="135" style="padding-top:2px;"><a href="#" onClick="javascript:window.open('<? echo "Events/".$GetTotalPictureQryRow['picture'];?>', '','width=650,height=500');return false;"><img src="<? echo "Events/thumb/".$GetTotalPictureQryRow['picture'];?>"  border="0" style="border:1px solid;"/></a></td>
														  </tr>
														  <? if(trim($GetTotalPictureQryRow['caption'])!="") { ?>
														  <tr>
															<td align='center' style="font-size:11px;color:#333333;" ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
														  </tr>	
														  <? } ?>
														</table>
												  </td>
												<?
											}
										}
										else
										{
											echo "<tr><td>No Photos.</td></tr>";
										}
									?>
									</table>
							  </td>
						  </tr>
						  <tr>
                            <td colspan="3">&nbsp;</td>
                          </tr>
						  <? } ?>
						  <?
						  $GetTotalPictureQry="SELECT * FROM events_videos WHERE eventid='".trim($eventId)."' order by id desc";
					   	  $GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
						  $TotGetTotalPicture=mysql_affected_rows();
						  if($TotGetTotalPicture>0)
						  {
						  ?>
						  <tr>
                            <td colspan="3" style="padding-left:5px;"><strong>Videos:</strong>&nbsp;</td>
                          </tr>
                          <tr>
							  <td align="left" style="padding-left:5px;">
							  <table   border="0" cellspacing="3" cellpadding="2" >
									<?
										
										if($TotGetTotalPicture>0)
										{
											for($F=0;$F<$TotGetTotalPicture;$F++)
											{
												$GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
												if($F%3==0 && $F!=0){echo "</tr><tr><td style='height:10px;' colspan='5'></td></tr><tr>";}
												?>
													<td width="390" align="center" height="245" valign="top" style="border:1px solid;" bgcolor="#AEAEAE" >
														<table border='1' cellpadding='2' cellspacing='2'  width="390" >
														  <tr>
															<td align='center' width="390" height="245" style="padding-top:2px;">
															<? if($GetTotalPictureQryRow['video']!=""){?>
																<? echo str_replace("<iframe","<iframe style='width:380px;height:245px;'",stripslashes($GetTotalPictureQryRow['video'])); ?>
															<? }else if($GetTotalPictureQryRow['videofile']!=""){?>	
																<div  align="center">
																<a  href="<?=$SITE_URL;?>/Videos/<?=stripslashes($GetTotalPictureQryRow['videofile']);?>" style="display:block;width:380px;height:245px"  id="player"></a> 
																<script language="javascript1.1">flowplayer("player", "flowplayer-3.2.7.swf");</script>
																</div>
															<? } ?>
															</td>
														  </tr>
														  <? if(trim($GetTotalPictureQryRow['caption'])!="") { ?>
														  <tr>
															<td align='center' style="font-size:11px;color:#333333;" ><? echo ucfirst(stripslashes($GetTotalPictureQryRow['caption'])); ?><?php /*?><? echo substr(ucfirst(stripslashes($GetTotalPictureQryRow['caption'])),0,30); ?><?php */?></td>
														  </tr>	
														  <? } ?>
														</table>
												  </td>
												<?
											}
										}
										else
										{
											echo "<tr><td>No Videos.</td></tr>";
										}
									?>
									</table>
							  </td>
						  </tr>
						  <tr>
                            <td colspan="3">&nbsp;</td>
                          </tr>
						  <? } ?>
						  
						  
                          <?
						    if($rowselectevent['enddate']=='0000-00-00' || $rowselectevent['enddate']>=''.date('Y-m-d').'')	
							{
								if($totticket>0)
								{
								?>
									<tr>
									  <td colspan="3" style="padding:5px;"><strong>Ticket Price</strong></td>
									</tr>
									
									<tr>
									  <td bgcolor="#999999" style="padding:1px;"><table align="center" cellpadding="0" cellspacing="0"  border="0"  width="100%">
										  <tr>
											<td width="27%" bgcolor="#999999"  align="left"><span style="color:#990000;">Ticket Type</span><a name="buytickets"></a></td>
											<td width="25%" bgcolor="#999999" align="left"><span style="color:#990000;">Price</span></td>
											<td width="27%" bgcolor="#999999" align="left"><span style="color:#990000;">Description</span></td>
											<td width="9%" bgcolor="#999999" align="left"><span style="color:#990000;">Quantity</span></td>
											<td width="11%" bgcolor="#999999" align="center">&nbsp;</td>
											<td width="1%" bgcolor="#999999" align="center">&nbsp;</td>
										  <tr>
										  <?
											
											$i=1;
											while($rowselecteventticketoption = mysql_fetch_assoc($rseventticketoption))
											{
												$Eventprice ="";
												$Eventprice =$rowselecteventticketoption['ticketprice'];
												$perorderlimit=$rowselecteventticketoption['perorderlimit'];
												if($perorderlimit<=0){$perorderlimit=10;}
												$curdate=strtotime(date("Y-m-d"));
										  ?>
										  <tr height="30"  bgcolor="#AEAEAE" >
												<form name="frmgen<?=$i?>" id="frmgen<?=$i?>" action="addtocart.php" method="get">
												  <td align="left" bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" ><?=ucfirst(stripslashes($rowselecteventticketoption['pricelevelname']));?></td>
												  <Td align="left"  bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" >
												  <? if($rowselecteventticketoption['earlybird_active']=="Y" || $rowselecteventticketoption['advanced_active']=="Y" || $rowselecteventticketoption['full_active']=="Y")
													 {
														$earlybird="color:#DFDFDF;";
														$Advanced="color:#DFDFDF;";
														$Full="color:#DFDFDF;";
														if($rowselecteventticketoption['earlybird_active']=="Y" && strtotime($rowselecteventticketoption['earlybird_startdate'])<=$curdate && strtotime($rowselecteventticketoption['earlybird_enddate'])>=$curdate)
														{
															$earlybird="color:#990000;";
															$earlybirdimage="color:#990000;background:url(images/animation.gif) bottom no-repeat;height:26px;";
															$Advanced="color:#DFDFDF;";
															$Advancedimage="border:1px dotted;color:#DFDFDF;";
															$Full="color:#DFDFDF;";
															$Fullimage="border:1px dotted;color:#DFDFDF;";
														}
														else if($rowselecteventticketoption['advanced_active']=="Y" && strtotime($rowselecteventticketoption['advanced_startdate'])<=$curdate && strtotime($rowselecteventticketoption['advanced_enddate'])>=$curdate)
														{
															$earlybird="color:#DFDFDF;";
															$earlybirdimage="border:1px dotted;color:#DFDFDF;";
															$Advanced="color:#990000;";
															$Advancedimage="color:#990000;background:url(images/animation.gif) bottom no-repeat;height:26px;";
															$Full="color:#DFDFDF;";
															$Fullimage="border:1px dotted;color:#DFDFDF;";
														}
														else if($rowselecteventticketoption['full_active']=="Y" && strtotime($rowselecteventticketoption['full_startdate'])<=$curdate && strtotime($rowselecteventticketoption['full_enddate'])>=$curdate)
														{
															$earlybird="color:#DFDFDF;";
															$earlybirdimage="border:1px dotted;color:#DFDFDF;";
															$Advanced="color:#DFDFDF;";
															$Advancedimage="border:1px dotted;color:#DFDFDF;";
															$Full="color:#990000;";
															$Fullimage="color:#990000;background:url(images/animation.gif) bottom no-repeat;height:26px;";
														}
													 ?>
													  <table  border="0" cellspacing="0" cellpadding="0">
														  <tr>
															<? if($rowselecteventticketoption['earlybird_active']=="Y"){ ?>
															<td valign="top">
																<table width="53" border="0" cellspacing="0" cellpadding="0">
																  <tr>
																	<td align="left"  nowrap="nowrap" style="font-size:11px;<? echo $earlybird;?>">Early Bird</td>
																  </tr>
																  <tr>
																	<td align="left" style="padding-left:3px;font-size:11px;<? echo $earlybirdimage;?>">$<? echo $rowselecteventticketoption['earlybird_price'];?>&nbsp;</td>
																  </tr>
																</table>
															</td>
															<? } ?>
															
															<? if($rowselecteventticketoption['advanced_active']=="Y"){ ?>
															<td valign="top" style="padding-left:10px;">
																<table width="53" border="0" cellspacing="0" cellpadding="0">
																  <tr>
																	<td align="left" style="font-size:11px;<? echo $Advanced;?>">Advanced</td>
																  </tr>
																  <tr>
																	<td align="left" style="padding-left:3px;font-size:11px;<? echo $Advancedimage;?>">$<? echo $rowselecteventticketoption['advanced_price'];?>&nbsp;</td>
																  </tr>
																</table>
															</td>
															<? } ?>
															
															<? if($rowselecteventticketoption['full_active']=="Y"){ ?>
															<td valign="top" style="padding-left:10px;">
																<table width="53" border="0" cellspacing="0" cellpadding="0">
																  <tr>
																	<td align="left" style="font-size:11px;<? echo $Full;?>">Full</td>
																  </tr>
																  <tr>
																	<td align="left" style="padding-left:3px;font-size:11px;<? echo $Fullimage;?>">$<? echo $rowselecteventticketoption['full_price'];?>&nbsp;</td>
																  </tr>
																</table>
															</td>
															<? } ?>	
														  </tr>
													  </table>
												  <? }else{?>
												  $<?=GetTicketPrice($rowselecteventticketoption['id']);?>&nbsp;&nbsp;
												  <? } ?>
												  </Td>
												  <td align="left"  bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" ><?=stripslashes($rowselecteventticketoption['description'])?></td>
												  <td align="left"  bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" >
												  <select name="quantity" id="quantity" style="width:45px;">
													<? for($PO=1;$PO<=$perorderlimit;$PO++){?>
														<option value="<? echo $PO;?>"><? echo $PO;?></option>
													<? } ?>	
												 </select>
												 <input type="hidden" name="HidPid" id="HidPid" value="<? echo $eventId;?>" />
												 <input type="hidden" name="HidPriceid" id="HidPriceid" value="<? echo $rowselecteventticketoption['id'];?>" />
											  </td>
											  <td align="center" bgcolor="#AEAEAE" style="padding:1px;color:#FFFFFF;" >&nbsp;<input type="submit" value="Buy Now"  class="button1"></td>
											  <td align="center" bgcolor="#AEAEAE">&nbsp;</td>
											</form>
										  </tr>
										  <tr><td style="height:5px;"></td></tr>
										  <? $i++;
										}?>
										</table></td>
									</tr>
									<? } ?>
								<? } ?>
                                <tr>
                                  <td colspan="3">&nbsp;</td>
                                </tr>
                                
                              </table></td>
                          </tr>
                        </table>
                      </figure>
                    </div>
                  </section>
                </div>
              </div>
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