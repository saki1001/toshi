<?php
	include_once("admin.config.inc.php");
	include("admin.cookie.php");
	include("connect.php"); 
	$mlevel=3;
	$id=$_GET["id"];
	$seli="select * from events where id='$id'";
	$runi=mysql_query($seli);
	$geti=mysql_fetch_object($runi);
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<title> <?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<HEAD>

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="demo.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>
 <script language="javascript" type="text/javascript">
 	function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
 </script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
</HEAD>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE cellSpacing=10 cellPadding=0  border=0 width="98%" align="center">
	<TBODY>
		<TR>
		  <TD width="100%" class="form_back" height="25"><span class="form111">Event Details</span></TD>
		</TR>
		<TR><TD background="images/vdots.gif"><IMG height=1 src="images/spacer.gif" width=1 border=0></TD></TR>
		<TR>
			<TD>			  
				<FORM name="form2" action="#" method="post" enctype="multipart/form-data">        
					<TABLE width="100%" border=0 cellSpacing=0 cellpadding="0" class="t-b">
						<TR> 
						  <TD colspan="2" height="30" class="form_back" align="right"><a href="#" onClick="javascript:window.close();">Close</a></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Type of event:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->eventtype); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Event Name:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->name); ?>&nbsp;</td>
				 	  	</TR>
						
						<tr>
						  <TD width="32%" align="right"><strong>Event Date:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->startdate); ?>&nbsp;at <?php echo stripslashes($geti->startdate_minute); ?>:<?php echo stripslashes($geti->startdate_minute); ?> <?php echo stripslashes($geti->startdate_ampm); ?></td>
				 	  	</TR>	
						<tr>
						  <TD width="32%" align="right"><strong>Event End Date:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->enddate); ?>&nbsp;at <?php echo stripslashes($geti->enddate_hour); ?>:<?php echo stripslashes($geti->enddate_minute); ?> <?php echo stripslashes($geti->enddate_ampm); ?></td>
				 	  	</TR>						
						<tr>
						  <TD width="32%" align="right"><strong>Venue:</strong></TD>
						  <td width="68%"><?php echo stripslashes(GetName1("event_venues","name","id",$geti->venueid)); ?>&nbsp;</td>
				 	  	</TR> 	
						<tr>
						  <TD width="32%" align="right"><strong>Description:</strong></TD>
						  <td width="68%"><?php echo nl2br(stripslashes($geti->description)); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Sale Times</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>On-sale Date:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->onsaledate); ?>&nbsp;at <?php echo stripslashes($geti->onsaledate_hour); ?>:<?php echo stripslashes($geti->onsaledate_minute); ?> <?php echo stripslashes($geti->onsaledate_ampm); ?></td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Immediately:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->immediately); ?>&nbsp;</td>
				 	  	</TR>	
						<tr>
						  <TD width="32%" align="right"><strong>Close Date:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->salesclosedate); ?>&nbsp;at <?php echo stripslashes($geti->salesclosedate_hour); ?>:<?php echo stripslashes($geti->salesclosedate_minute); ?> <?php echo stripslashes($geti->salesclosedate_ampm); ?></td>
				 	  	</TR>
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Settings</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Category:</strong></TD>
						  <td width="68%"><?php echo stripslashes(GetName1("event_category","name","id",$geti->category)); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Ages:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->ages); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Event Website:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->website); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Image:</strong></TD>
						  <td width="68%"><? if($geti->picture!=''){?><img src="../Events/<?php echo stripslashes($geti->picture); ?>" height="100" /><? }?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Price Levels</strong></TD>
						</TR>
						<tr>
							<td colspan="2" align="left">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <?
										  	$SelPricelevelQry="SELECT * FROM events_pricelevel WHERE eventid='".$_REQUEST['id']."'";
											$SelPricelevelQryRs=mysql_query($SelPricelevelQry);
											$TOtSelPricelevel=mysql_affected_rows();
											if($TOtSelPricelevel>0)
											{
												for($VV=0;$VV<$TOtSelPricelevel;$VV++)
												{
													$SelPricelevelQryRow=mysql_fetch_array($SelPricelevelQryRs);
													if($VV==0)
													{
										  ?>
														  <tr>
															<td width="77%" style="padding:5px;"><strong>Name</strong></td>
															<td width="8%" style="padding:5px;"><strong>Price</strong></td>
															<td width="6%" style="padding:5px;" nowrap="nowrap"><strong>BO Price</strong></td>
															<td width="9%" style="padding:5px;"><strong>Limit</strong></td>
														  </tr>
												 <? } ?>
												 		<tr>
															<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['pricelevelname']);?></td>
															<td style="padding:5px;">$<? echo stripslashes($SelPricelevelQryRow['onlineprice']);?></td>
															<td style="padding:5px;">$<? echo stripslashes($SelPricelevelQryRow['boxofficeprice']);?></td>
															<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['perorderlimit']);?></td>
								  </tr>		  
											<? } ?>  
										 <? } else{?>	  
										 	<tr>
												<td style="padding:5px;">
													You haven't added any price level yet.												</td>
											  </tr>
										 <? } ?>
								</table>
							</td>
						</tr>	
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Delivery Methods</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Mobile:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->delivery_mobile_type); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
							<td colspan="2" align="left">
								<table width="80%" border="0" cellspacing="0" cellpadding="0" align="right">
								 	<? if($geti->delivery_mobile_extrainfo!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Extra Info:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_mobile_extrainfo)); ?>&nbsp;</td>
									</TR>
									<? } ?>
									<? if($geti->delivery_mobile_startdate!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Enable On:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_mobile_startdate)); ?>&nbsp;at <?php echo stripslashes($geti->delivery_mobile_startdate_hour); ?>:<?php echo stripslashes($geti->delivery_mobile_startdate_minute); ?> <?php echo stripslashes($geti->delivery_mobile_startdate_ampm); ?></td>
									</TR>
									<? } ?>
									<? if($geti->delivery_mobile_enddate!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Disable On:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_mobile_enddate)); ?>&nbsp;at <?php echo stripslashes($geti->delivery_mobile_enddate_hour); ?>:<?php echo stripslashes($geti->delivery_mobile_enddate_minute); ?> <?php echo stripslashes($geti->delivery_mobile_enddate_ampm); ?></td>
									</TR>
									<? } ?>
								</table>
							</td>
						</tr>	
						<tr>
						  <TD width="32%" align="right"><strong>Print At Home:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->delivery_printathome_type); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
							<td colspan="2" align="left">
								<table width="80%" border="0" cellspacing="0" cellpadding="0" align="right">
								 	<? if($geti->delivery_printathome_extrainfo!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Extra Info:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_printathome_extrainfo)); ?>&nbsp;</td>
									</TR>
									<? } ?>
									<? if($geti->delivery_printathome_startdate!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Enable On:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_printathome_startdate)); ?>&nbsp;at <?php echo stripslashes($geti->delivery_printathome_startdate_hour); ?>:<?php echo stripslashes($geti->delivery_printathome_startdate_minute); ?> <?php echo stripslashes($geti->delivery_printathome_startdate_ampm); ?></td>
									</TR>
									<? } ?>
									<? if($geti->delivery_printathome_enddate!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Disable On:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_printathome_enddate)); ?>&nbsp;at <?php echo stripslashes($geti->delivery_printathome_enddate_hour); ?>:<?php echo stripslashes($geti->delivery_printathome_enddate_minute); ?> <?php echo stripslashes($geti->delivery_printathome_enddate_ampm); ?></td>
									</TR>
									<? } ?>
								</table>
							</td>
						</tr>
						<tr>
						  <TD width="32%" align="right"><strong>Will Call:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->delivery_willcall_type); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
							<td colspan="2" align="left">
								<table width="80%" border="0" cellspacing="0" cellpadding="0" align="right">
								 	<? if($geti->delivery_willcall_extrainfo!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Extra Info:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_willcall_extrainfo)); ?>&nbsp;</td>
									</TR>
									<? } ?>
									<? if($geti->delivery_willcall_startdate!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Enable On:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_willcall_startdate)); ?>&nbsp;at <?php echo stripslashes($geti->delivery_willcall_startdate_hour); ?>:<?php echo stripslashes($geti->delivery_willcall_startdate_minute); ?> <?php echo stripslashes($geti->delivery_willcall_startdate_ampm); ?></td>
									</TR>
									<? } ?>
									<? if($geti->delivery_willcall_enddate!=''){?>
									<tr>
									  <TD width="32%" align="right"><strong>Disable On:</strong></TD>
									  <td width="68%"><?php echo nl2br(stripslashes($geti->delivery_willcall_enddate)); ?>&nbsp;at <?php echo stripslashes($geti->delivery_willcall_enddate_hour); ?>:<?php echo stripslashes($geti->delivery_willcall_enddate_minute); ?> <?php echo stripslashes($geti->delivery_willcall_enddate_ampm); ?></td>
									</TR>
									<? } ?>
								</table>
							</td>
						</tr>
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Donations</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Enable:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->donations_enable); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Donation Name:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->donations_name); ?>&nbsp;</td>
				 	  	</TR>
						
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Custom Fee</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Enable:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->customfee_enable); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Name of Fee:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->customfee_enable_nameoffee); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Type:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->customfee_enable_type); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Amount(%):</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->customfee_enable_amount); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Apply Fee:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->customfee_enable_applyfee); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD colspan="2" align="left"><strong class="stat_linkgreybold"> Additional Settings</strong></TD>
						</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Online Service Fee:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->additional_onlineservicefee); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Box Office Service Fee:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->additional_boservicefee); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Ticket Note:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->additional_ticketnote); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Ticket Trans. Limit:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->additional_ticket_tranlimit); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Checkout Time Limit:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->additional_checkouttimelimit); ?>&nbsp;</td>
				 	  	</TR>
						<tr>
						  <TD width="32%" align="right"><strong>Private Event:</strong></TD>
						  <td width="68%"><?php echo stripslashes($geti->additional_privateevent); ?>&nbsp;</td>
				 	  	</TR>
					</TABLE>
				</FORM></TD>
		</TR>		
	</TBODY>
</TABLE>
</BODY>
</HTML>