<? include("connect.php"); 

$SESSION_PRODUCTID2 = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
if($SESSION_PRODUCTID2 > 0)
{}
else
{
	header("Location:$SITE_URL/viewcart.php");
	exit;
}

if($_POST['HidContinueCheckout']=="1")
{
		if($_SESSION['orderid']=="")
		{
					//$orderno="ORD".rand(1,9999999);
					$query_order = "insert into ordermaster 
									set userid = '".$_SESSION['UsErId']."',
									orderdate =now(),
									promocodeid = '".$_SESSION['promocode']."',
									shippingcharge = '".$_SESSION['ShippingCharge']."',
									shippingmethoad = '".$_SESSION['ShippingMethoadName']."',
									total = '".$_SESSION['total']."',
									grandtotal = '".$_SESSION['finaltotal']."',
									cctype = '".addslashes($_SESSION['cctype'])."',	
									ccnumber = '".addslashes($_SESSION['ccnumber'])."',	
									ccmonth = '".addslashes($_SESSION['ccmonth'])."',	
									ccyear = '".addslashes($_SESSION['ccyear'])."',	
									cvv = '".addslashes($_SESSION['cvv'])."',							
									ship_fname = '".addslashes($_SESSION['ship_fname'])."',					
									ship_lname = '".addslashes($_SESSION['ship_lname'])."',
									ship_address1 = '".addslashes($_SESSION['ship_address1'])."',
									ship_address2 = '".addslashes($_SESSION['ship_address2'])."',
									ship_city = '".addslashes($_SESSION['ship_city'])."',
									ship_state = '".addslashes($_SESSION['ship_state'])."',
									ship_country = '".addslashes($_SESSION['ship_country'])."',
									ship_zipcode = '".addslashes($_SESSION['ship_zipcode'])."',
									ship_day_telephone = '".addslashes($_SESSION['ship_day_telephone'])."',					
									fname = '".addslashes($_SESSION['fname'])."',					
									lname = '".addslashes($_SESSION['lname'])."',
									address1 = '".addslashes($_SESSION['address1'])."',
									address2 = '".addslashes($_SESSION['address2'])."',
									city = '".addslashes($_SESSION['city'])."',
									state = '".addslashes($_SESSION['state'])."',
									country = '".addslashes($_SESSION['country'])."',
									zipcode = '".addslashes($_SESSION['zipcode'])."',
									day_telephone = '".addslashes($_SESSION['day_telephone'])."',					
									email= '".addslashes($_SESSION['email'])."',
									orderstatus = 'In process',
									ispaid= 'notpaid',
									tax='".$_SESSION['ShippingTax']."',
									disctype = '".$_SESSION['disctype']."',
									discamt = '".$_SESSION['discamt']."',
									discount = '".$_SESSION['discount']."'";
					mysql_query($query_order) or die(mysql_error()); 
					$_SESSION['orderid'] = mysql_insert_id();
					
					$temp_ord=$_SESSION['orderid'];
					$orderno="ORD".substr("0000000".$temp_ord,-7);
					$query_order2 = mysql_query("update ordermaster set orderid = '".$orderno."' where id='".$temp_ord."'");
					
					if($_SESSION['SESSION_PRODUCTID']>0)
					{	
						foreach($_SESSION['SESSION_PRODUCTID'] as $key=>$val)
						{		
							$query_product_detail = "insert into orderdetail 
													 set orderid = '".$_SESSION['orderid']."',
													 pid = '".$val."',
													 quantity = '".$_SESSION['SESSION_QUANTITY'][$key]."',
													 price = '".$_SESSION['SESSION_PRICE'][$key]."',
													 size = '".$_SESSION['SESSION_CUSTOMIZE'][$key]."'";
							mysql_query($query_product_detail) or die(mysql_error()); 
						}
					}
		}
		else
		{
					$query_order = "UPDATE ordermaster 
									set userid = '".$_SESSION['UsErId']."',
									orderdate =now(),
									promocodeid = '".$_SESSION['promocode']."',
									shippingcharge = '".$_SESSION['ShippingCharge']."',
									shippingmethoad = '".$_SESSION['ShippingMethoadName']."',
									total = '".$_SESSION['total']."',
									grandtotal = '".$_SESSION['finaltotal']."',
									cctype = '".addslashes($_SESSION['cctype'])."',	
									ccnumber = '".addslashes($_SESSION['ccnumber'])."',	
									ccmonth = '".addslashes($_SESSION['ccmonth'])."',	
									ccyear = '".addslashes($_SESSION['ccyear'])."',	
									cvv = '".addslashes($_SESSION['cvv'])."',							
									ship_fname = '".addslashes($_SESSION['ship_fname'])."',					
									ship_lname = '".addslashes($_SESSION['ship_lname'])."',
									ship_address1 = '".addslashes($_SESSION['ship_address1'])."',
									ship_address2 = '".addslashes($_SESSION['ship_address2'])."',
									ship_city = '".addslashes($_SESSION['ship_city'])."',
									ship_state = '".addslashes($_SESSION['ship_state'])."',
									ship_country = '".addslashes($_SESSION['ship_country'])."',
									ship_zipcode = '".addslashes($_SESSION['ship_zipcode'])."',
									ship_day_telephone = '".addslashes($_SESSION['ship_day_telephone'])."',					
									fname = '".addslashes($_SESSION['fname'])."',					
									lname = '".addslashes($_SESSION['lname'])."',
									address1 = '".addslashes($_SESSION['address1'])."',
									address2 = '".addslashes($_SESSION['address2'])."',
									city = '".addslashes($_SESSION['city'])."',
									state = '".addslashes($_SESSION['state'])."',
									country = '".addslashes($_SESSION['country'])."',
									zipcode = '".addslashes($_SESSION['zip'])."',
									day_telephone = '".addslashes($_SESSION['day_telephone'])."',				
									email= '".addslashes($_SESSION['email'])."',
									orderstatus = 'In process',
									ispaid= 'notpaid',
									tax='".$_SESSION['ShippingTax']."',
									disctype = '".$_SESSION['disctype']."',
									discamt = '".$_SESSION['discamt']."',
									discount = '".$_SESSION['discount']."' where id='".$_SESSION['orderid']."'";
					mysql_query($query_order) or die(mysql_error()); 
					
					
					//del order detail 
					$del=mysql_query("delete from orderdetail where orderid = '".$_SESSION['orderid']."'");
					////////////////////
					
					if($_SESSION['SESSION_PRODUCTID']>0)
					{	
						foreach($_SESSION['SESSION_PRODUCTID'] as $key=>$val)
						{		
							$query_product_detail = "insert into orderdetail 
													 set orderid = '".$_SESSION['orderid']."',
													 pid = '".$val."',
													 quantity = '".$_SESSION['SESSION_QUANTITY'][$key]."',
													 price = '".$_SESSION['SESSION_PRICE'][$key]."',
													 size = '".$_SESSION['SESSION_CUSTOMIZE'][$key]."'";
							mysql_query($query_product_detail) or die(mysql_error()); 
						}
					}
		}
		
		header("Location:$SITE_URL/paypal.php");
		exit;

}

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

<script type="text/JavaScript" language="javascript" src="ajax_validation.js"></script>
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
          <h4 class="color3"><span>Buy Ticket </span></h4>
          <? if($_REQUEST['msg']){?>
          <div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div>
          <? } ?>
          <div class="wrapper">
            <div class="box1" >
              <div class="" >
                <div class="wrapper" >
                  <section class="col1_1" style="width:830px;">
                    <h2><strong style="width:155px;">Checkout</strong></h2>
                    <div class="pad_bot1" style="border:10px solid;" align="center">
                      <figure>
                        <form name="frmShipInfo" id="frmShipInfo" enctype="multipart/form-data" method="post">
					  
					  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td align="center" class="font11-red" valign="top">&nbsp;</td>
                                                </tr>
												<tr>
                                                  <td align="center" class="font11-red" valign="top"><? if($_REQUEST['msg']!=""){echo stripslashes($_REQUEST['msg']);}?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center" valign="top" class="border"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="33%" align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td align="center" valign="top" bgcolor="#999999"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                                                    <td width="86%" height="20" align="left" valign="middle" class="txtblue_11_ver"><strong class="txthd4_blue">Billing Information</strong></td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                            <tr>
                                                              <td align="left" valign="top" class="textstyle1"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td align="left" valign="top" class="font-12-gra">
																	<? echo stripslashes($_SESSION['fname']);?>&nbsp;<? echo stripslashes($_SESSION['lname']);?><br />
																	<? echo stripslashes($_SESSION['address1']);?>&nbsp;<? echo stripslashes($_SESSION['address2']);?><br />
																	<? echo stripslashes($_SESSION['city']);?>,&nbsp;<? echo stripslashes($_SESSION['state']);?>&nbsp;<? echo stripslashes($_SESSION['zipcode']);?>&nbsp;<? echo stripslashes($_SESSION['country']);?><br />
																	Phone: <? echo stripslashes($_SESSION['day_telephone']);?>.<br />
																	Email: <? echo stripslashes($_SESSION['email']);?><br />
																	</td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                          </table></td>
                                                        <td width="33%" align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td align="left" valign="top" bgcolor="#999999"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                                                    <td width="87%" height="20" align="left" valign="middle" class="txthd4_blue"><strong>Shipping Information</strong></td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                            <tr>
                                                              <td align="left" valign="top" class="textstyle1"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td align="left" valign="top" class="font-12-gra">
																	<? echo stripslashes($_SESSION['ship_fname']);?>&nbsp;<? echo stripslashes($_SESSION['ship_lname']);?><br />
																	<? echo stripslashes($_SESSION['ship_address1']);?>&nbsp;<? echo stripslashes($_SESSION['ship_address2']);?><br />
																	<? echo stripslashes($_SESSION['ship_city']);?>,&nbsp;<? echo stripslashes($_SESSION['ship_state']);?>&nbsp;<? echo stripslashes($_SESSION['ship_zipcode']);?>&nbsp;<? echo stripslashes($_SESSION['ship_country']);?><br />
																	Phone: <? echo stripslashes($_SESSION['ship_day_telephone']);?>.<br />
																	Email: <? echo stripslashes($_SESSION['email']);?><br />
																	</td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                          </table></td>
                                                        <td width="33%" align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td align="left" valign="top" bgcolor="#999999"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                                                    <td width="87%" height="20" align="left" valign="middle" class="txtblue_11_ver"><strong class="txthd4_blue">Credit card Information</strong></td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                            <tr>
                                                              <td align="left" valign="top" class="textstyle1"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td align="left" valign="top" class="font-12-gra">
																	Card Type: <?=$_SESSION['cctype'];?><br />
																	Card Number:xxx-xxxx-<?=substr($_SESSION['ccnumber'],-4);?><br />
																	Card Expiration: <? echo $_SESSION['ccmonth']."/".$_SESSION['ccyear'];?><br />
																	CVV Number: <? echo $_SESSION['cvv'];?><br />
																	</td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                          </table></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center" valign="top">&nbsp;</td>
                                                        <td align="center" valign="top">&nbsp;</td>
                                                        <td align="center" valign="top">&nbsp;</td>
                                                      </tr>
                                                    </table></td>
                                                </tr>
                                                
                                              </table></td>
                                          </tr>
										  <tr>
                                            <td align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
												<td height="25" bgcolor="#999999"><table width="98%" border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td width="3%">&nbsp;</td>
													  <td width="97%" align="left" valign="middle" class="font14-wit"><strong>Cart Details</strong></td>
													</tr>
												  </table></td>
											  </tr>
												<?
													$SESSION_PRODUCTID  = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
													$SESSION_QUANTITY   = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
													$SESSION_PRICE      = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
													$SESSION_CUSTOMIZE  = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
												?>
												 <?
													  $subtotal=0;
				
													  if($SESSION_PRODUCTID>0)
													  {
													  ?>
															<tr>
															  <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
																  <tr>
																	<td align="left" valign="top" class="txthd2_grey">&nbsp;</td>
																  </tr>
																  <tr>
																	<td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<?
																		for($i=0;$i<count($SESSION_PRODUCTID);$i++)
																		{
																			$model="";
																			$descr="";
																			$img="";
																			$catname="";
																			$ProductName=stripslashes(GetName1("events","name","id",$SESSION_PRODUCTID[$i]));
																			$ProductDescr=stripslashes(GetName1("events","description","id",$SESSION_PRODUCTID[$i]));																			
																			$totalcost = $SESSION_PRICE[$i]*$SESSION_QUANTITY[$i];
																			$subtotal = $subtotal +  $totalcost;
																			$_SESSION['total'] = $subtotal;
																			//$_SESSION['SESSION_TOTAL'] = $subtotal;
																		?>
																		<tr>
																		  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																			  <tr>
																				<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																					<tr>
																					  <td width="10%" align="center" valign="top">
																					  <a href="eventdetail.php?eventId=<?=$SESSION_PRODUCTID[$i];?>" style="color:#990033;"><?=$ProductName;?></a></td>
																					  <td width="56%" align="left" valign="top"><table width="97%" border="0" align="right" cellpadding="0" cellspacing="0">
																						  <tr>
																							<td height="20" align="left" valign="top"><strong>Quantity:</strong> <?=$SESSION_QUANTITY[$i];?></td>
																						  </tr>
																						   <tr>
																							<td height="20" align="left" valign="top"><strong>Price:</strong> $<?=$SESSION_PRICE[$i];?></td>
																						  </tr>
																						  <tr>
																							<td align="left" valign="top" class="txt_black12_ari"><span class="font-12-gra"><?=substr($ProductDescr,0,100);?></span></td>
																						  </tr>
																					  </table></td>
																					  <?php /*?><td width="34%" align="left" valign="top"><table width="96%" border="0" align="right" cellpadding="0" cellspacing="0">
																						  <tr>
																							<td height="20" align="left" valign="top"><a href="update_cart.php?FROM_REVIEW=YES&pid=<?=$SESSION_PRODUCTID[$i];?>&customize=<?=$SESSION_CUSTOMIZE[$i];?>" class="link10_black">Remove this item</a></td>
																						  </tr>
																						  
																						</table></td><?php */?>
																					</tr>
																				  </table></td>
																			  </tr>
																			  <tr>
																				<td height="10" align="left" valign="top"></td>
																			  </tr>
																			  <tr>
																				<td height="1" align="left" valign="top" bgcolor="#666666"></td>
																			  </tr>
																			  <tr>
																				<td align="left" valign="top">&nbsp;</td>
																			  </tr>
																			</table></td>
																		</tr>
																		<? } ?>
																		
																	  </table></td>
																  </tr>
																</table></td>
															</tr>
															<?  }?>
                                              </table></td>
                                          </tr>
										  <?
										  $Final=$_SESSION['total'] + $_SESSION['ShippingCharge'] - $_SESSION['discount'];
										  $_SESSION['finaltotal']=int_to_Decimal($Final);
										  ?>
										  <tr>
                                            <td align="center" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td height="25" bgcolor="#999999"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td width="3%">&nbsp;</td>
                                                              <td width="97%" align="left" valign="middle" class="font14-wit"><strong>Price Summary</strong></td>
                                                            </tr>
                                                          </table></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td>&nbsp;</td>
                                                              <td valign="top">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                              <td width="9%">&nbsp;</td>
                                                              <td width="91%" valign="top"><table width="40%" border="0" align="left" cellpadding="2" cellspacing="0">
                                                                  <tr>
                                                                    <td width="48%" align="left" valign="middle" class="txt_grey12_ari"> Sub-total:</td>
                                                                    <td width="52%" align="left" valign="middle" class="txt_grey12_ari">$<?=int_to_Decimal($_SESSION['total']);?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td align="left" valign="middle" class="txt_grey12_ari"> Shipping:</td>
                                                                    <td align="left" valign="middle" class="txt_grey12_ari">$<? if($_SESSION['ShippingCharge']){echo int_to_Decimal($_SESSION['ShippingCharge']);}else{ echo "0.00";};?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td align="left" valign="middle" class="txt_grey12_ari"> Tax:</td>
                                                                    <td align="left" valign="middle" class="txt_grey12_ari">$<? if($_SESSION['ShippingTax']){echo int_to_Decimal($_SESSION['ShippingTax']);}else{ echo "0.00";};?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td align="left" valign="middle" class="txt_grey12_ari"> Discount:</td>
                                                                    <td align="left" valign="middle" class="txt_grey12_ari">-$<? if($_SESSION['discount']){?><?=int_to_Decimal($_SESSION['discount']);?><? } else {?>0.00<? } ?></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td align="left" valign="middle">&nbsp;</td>
                                                                    <td align="left" valign="middle">&nbsp;</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td height="25" align="left" valign="middle" bgcolor="#999999" class="txtblue_12_ari"> <strong>Order Total</strong>:</td>
                                                                    <td align="left" valign="middle" bgcolor="#999999" class="txtblue_12_ari"><strong>$<?=int_to_Decimal($_SESSION['finaltotal']);?></strong></td>
                                                                  </tr>
                                                                </table></td>
                                                            </tr>
                                                          </table></td>
                                                      </tr>
                                                    </table></td>
                                                </tr>
                                                
                                                <tr>
                                                  <td align="center" height="50" valign="middle">
												  <input type="hidden" name="HidContinueCheckout" id="HidContinueCheckout" value="" /> 
													<input type="button" style="float:none;" name="SubmitOrder" value="Submit Order" onClick="return FrmChkInfo();"  class="button1"/>			
																<?php /*?><img src="images/submit_order.jpg" onclick="return FrmChkInfo();" style="cursor:pointer;"  border="0" /><?php */?>
												  </td>
                                                </tr>
                                              </table></td>
                                          </tr>
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
<script language="javascript" type="text/javascript">
function FrmChkInfo()
{
	form=document.frmShipInfo;
	form.HidContinueCheckout.value=1;
	form.submit();
	return true;
}	
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>