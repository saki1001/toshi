<? include("connect.php"); 
$ACTIVEPAGE='events';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo $SITE_NAME;?></title>
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
                    <h2><strong style="width:90px;">Cart</strong> Details</h2>
                    <div class="pad_bot1" style="border:10px solid;">
                      <figure>
                        <form name="frm1" id="frm1" action="update_cart.php" method="post"  enctype="multipart/form-data">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					 
					  <tr>
						  <td align="center" style="color:#FF0000;"  valign="top">&nbsp;<? if($_REQUEST['Update']=="yes"){echo "<br>Your cart has been updated successfully.<br><br>";}?></td>
					  </tr>
                        <?
						$SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
						$SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
						$SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
						$SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
						if($SESSION_PRODUCTID > 0)
						{
							$cartflag = 1;
					  ?>
						<tr>
                          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" class="search_box_bg">
                                          <tr>
                                           <td width="48%" align="left" style="padding-left:3px;" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Event</strong></td>
                                            <td width="6%" align="center" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Qty.</strong></td>
                                            <td width="16%" align="center" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Price</strong></td>
                                            <td width="15%" align="center" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Sub Total</strong></td>
                                            <td width="3%" align="center" valign="middle" bgcolor="#999999">&nbsp;</td>
                                          </tr>
										  <?
										  for($i=0;$i<count($SESSION_PRODUCTID);$i++)
										  {
										    $totalcost = $SESSION_PRICE[$i]*$SESSION_QUANTITY[$i];
                                            $subtotal = $subtotal +  $totalcost;
											$_SESSION['total'] = int_to_Decimal($subtotal);
											$_SESSION['SESSION_TOTAL'] = int_to_Decimal($subtotal);
											$_SESSION['finaltotal']=int_to_Decimal($subtotal);
											$ProductName=stripslashes(GetName1("events","name","id",$SESSION_PRODUCTID[$i]));
										  ?>
                                          <tr  style="background-color:#FFFFFF;">
											<td height="35" align="left" style="padding-left:2px;background-color:#FFFFFF;" valign="middle" class="border-right">
											<a href="eventdetail.php?eventId=<?=$SESSION_PRODUCTID[$i];?>"><?=$ProductName;?></a>
											<input type="hidden" name="val<?=$i;?>" value="<?=$i;?>@<?=$SESSION_PRODUCTID[$i];?>" />
										  <input type="hidden" name="i" value="<?=$i;?>"  />
										  <input type="hidden" name="size<?=$i;?>" value="<?=$SESSION_CUSTOMIZE[$i];?>" />
											</td>
                                            <td height="35" align="center" valign="middle" class="border-right" style="background-color:#FFFFFF;"><input name="quantity<?=$i;?>" type="text"  id="quantity<?=$i;?>" value="<?=$SESSION_QUANTITY[$i];?>" style="border:1px solid;width:40px;text-align:center;" size="5" onKeyUp="return keycode('<?=$i;?>');" maxlength="4" /></td>
                                            <td height="35" align="center" valign="middle" class="border-right" style="background-color:#FFFFFF;">$<?=int_to_Decimal($SESSION_PRICE[$i]);?></td>
                                            <td height="35" align="center" valign="middle" class="border-right" style="background-color:#FFFFFF;">$<?=int_to_Decimal($totalcost);?></td>
                                            <td height="35" align="center" valign="middle" style="background-color:#FFFFFF;"><img src="images/close.png" onClick="window.location.href='update_cart.php?DelItem=YES&priceid=<?=$SESSION_CUSTOMIZE[$i];?>&pid=<?=$SESSION_PRODUCTID[$i];?>'" style="cursor:pointer;"  alt="Click to remove item" height="20" title="Click to remove item"/></td>
                                          </tr>
                                          <? } ?>
                                        </table></td>
                                    </tr>
									<tr>
                                      <td align="right" valign="top">
									  <table cellspacing="8" cellpadding="2" width="100%" border="0">
											<tr>
											  <td align="right" width="86%" class="arial12grey"><span ><strong>Sub Total</strong></span><strong>:&nbsp;</strong></td>
											  <td align="left" width="14%" class="arial12grey">$<?=number_format($_SESSION['total'], 2, '.', '');?>
											  <?php /*?><script language="javascript" type="text/javascript">document.getElementById('RightCartTotalAmount_ID').innerHTML='$<?=number_format($_SESSION['total'], 2, '.', '');?>';</script><?php */?>
											  </td>
											</tr>
											<tr>
											  <td align="right" width="86%" class="arial12grey"><span ><strong>Shipping Cost</strong></span><strong>:&nbsp;</strong></td>
											  <td align="left" width="14%" class="arial12grey">$<?=number_format($_SESSION['shippingtotal'], 2, '.', '');?></td>
											</tr>
											<tr>
											  <td align="right" width="86%" class="arial12grey"><span ><strong>Total</strong></span><strong>:&nbsp;</strong></td>
											  <td align="left" width="14%" class="arial12grey">$<?=number_format($_SESSION['total'], 2, '.', '');?></td>
											</tr>
										</table>
									  </td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td  align="right" valign="middle">&nbsp;
											<input type="button" style="float:none;" class="button1" value="Continue" onClick="window.location.href='events.php';"/>&nbsp;&nbsp;
											<input type="button" style="float:none;" class="button1" value="Update Cart" onClick="document.frm1.submit();" />&nbsp;&nbsp;
											<input type="button" style="float:none;" class="button1" value="Checkout" onClick="window.location.href='checkout.php';" />&nbsp;&nbsp;
											</td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table></td>
                        </tr>
						<? } else { ?>
						<?
							$_SESSION['total'] = "0";
							$_SESSION['SESSION_TOTAL'] = "0";
							$_SESSION['finaltotal']="0";
							$_SESSION['SESSION_handling_fee']='0';
							$_SESSION['ShippingCharge']='0';
						?>
						<?php /*?><script language="javascript" type="text/javascript">document.getElementById('RightCartTotalAmount_ID').innerHTML='$<?=number_format($_SESSION['total'], 2, '.', '');?>';</script><?php */?>
						<tr>
							<td align="center" style="color:#FF0000;">There are currently no events in your cart.<br><a href="events.php">Click Here</a> to see the event listing.</td>
						</tr>
						<? } ?>
                      </table>
					  </form>
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