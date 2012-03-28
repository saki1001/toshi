<?php 
include("connect.php");
include("admin.cookie.php");
include_once("admin.config.inc.php");
//require_once("../include/sendmail.php");
//include("functions.php");
$mlevel=11;
$display_first_line = 0;
$display_second_line = 0;
$msg="";
	if($_POST['HidSubmit']==1)
	{
		$query = "update ordermaster set orderstatus='".$_REQUEST['status']."', ispaid='".$_REQUEST['ispaid']."',trackingnumber='".$_REQUEST['trackingno']."',statuschangedate=curdate() where id=".$_REQUEST['id'];
		mysql_query($query);
		
		$query1 = "update orderdetail set status='".$_REQUEST['status']."' where orderid=".$_REQUEST['id'];
		mysql_query($query1);
		
		
		
	if($_REQUEST['status']=="Shipped")
	{
		
		$ordres=mysql_query("SELECT * from ordermaster where id='".$_REQUEST['id']."'");
		$ordrow=mysql_fetch_array($ordres);
		$message123="<html>
<head>
<title>Welcome to $SITE_NAME</title>
</head>
<body>
<table width='990' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='1251' height='133' align='left' valign='bottom'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='19%' align='left' valign='top'>Toshi's Playhoue</td>
        <td width='81%' align='left' valign='bottom'>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align='left' valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td align='left' valign='top'><table width='967' border='0' align='right' cellpadding='0' cellspacing='0'>
          <tr>
            <td width='648' align='left' valign='top'>&nbsp;</td>
            <td width='319' align='left' valign='middle'>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align='left' valign='top'>
        <div id='navi'></div>
        </td>
      </tr>
      <tr>
        <td align='left' valign='top' class='mid_bg_rpt'><table width='990' border='0' cellspacing='0' cellpadding='0'>
          <tr>            
            <td align='left' valign='top' bgcolor='#ffffff'><table width='97%' border='0' align='center' cellpadding='0' cellspacing='0'>
               <tr>
                <td height='15' valign='top' class='arial-grey-11'></td>
              </tr>
              <tr>
                <td class='gray-light-11'>				
				<br>Your Order has been shipped.<br><br>
				Shipped via USPS, Tracking Number:&nbsp;".$ordrow['trackingnumber']."<br /><br />
				Your Order Number is # <b>".$ordrow['orderid']."</b> placed on ".date("m-d-Y h:i",time($ordrow['orderdate']))."<br><br><br>
				Thank you for shopping at $SITE_URL<br><br>	
				$SITE_NAME<br><br>				
				</td>
              </tr>
              <tr>
                <td height='40' align='left' valign='middle'>&nbsp;</td>
              </tr>              
            </table></td>
            </tr>
        </table></td>
      </tr>      
    </table></td>
  </tr>  
</table>
</body>
</html>
";
		//echo $message123;exit;
		$sub="$SITE_NAME Shipping Confirmation Email Order # ".$ordrow['orderid'];		
		if($_SERVER['HTTP_HOST']!='plus')
			HtmlMailSend($ordrow['email'],$sub,$message123,$REPRESENTATIVE_MAIL);
		}
		$msg = "Order status has been updated successfully.";
	}
	
	if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == "delete")
	{
		if(isset($_REQUEST['id']) && $_REQUEST['id'] > 0)
		{
			$query = "delete from ordermaster where id=".$_REQUEST['id'];
			mysql_query($query);
			$query = "delete from orderdetail where orderid=".$_REQUEST['id'];
			mysql_query($query);
			?>
			<script language="javascript">location.href="manage_order.php?msg=1";</script>
			<?
		}
	}
	global $userid;
	global $pending;
	global $ispaid;
	$userid = 0;
	
	$mode = "";
	$id = 0;
	$query = "";
	$redirect = "";
	$ship_phone="";
	$shippingcharge = 0;
	$total = 0;
	$discount = 0;
	$grandtotal = 0;
	$shippingaddress = "";
	$billingaddress = "";
	$rname = "";
	$total = 0;
	$grandtotal = 0;
	$productprice = 0;
	$image = "";
	$cimage = "";
	$shippingcharge = 0;
	$shipping_method = "";
	$email = "";
	$phone = "";
	if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		if($id > 0)
		{
			$id = $_REQUEST['id'];
			$fetchquery = "select * from ordermaster where id=".$id;
			$result = mysql_query($fetchquery);
			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_array($result))
				{
					$total = number_format($row['total'],2,'.','');					
					$grandtotal = number_format($row['grandtotal'],2,'.','');
					$pending = stripslashes($row['orderstatus']);
					$ispaid = stripslashes($row['ispaid']);
					
					$trackingno = stripslashes($row['trackingnumber']);
					
					$shippingcharge = number_format($row['shippingcharge'],2,'.','');	
					$discount  = number_format($row['discount'],2,'.','');	
					$tax = number_format($row['tax'],2,'.','');	
					
					$payinfo="Card Type: ".stripslashes($row['cctype']);
					$payinfo.="<br>Card Type: ************".substr($row['ccnumber'],-4);
					$payinfo.="<br>Card Security Code: ****";
					$payinfo.="<br>Expiration Date: ".stripslashes($row['ccmonth'])." / ".stripslashes($row['ccyear']);
					
					$shippingmethoad=stripslashes($row['shippingmethoad']);
					$PromoCode=stripslashes($row['promocodeid']);
					
					$orderno = stripslashes($row['orderid']);	
					$orddate = date("m-d-Y",strtotime($row['orderdate']));
									
					$email = stripslashes($row['email']);
					$phone = stripslashes($row['day_telephone']);					
					$billingaddress = $billingaddress.stripslashes($row['fname'])." ".stripslashes($row['lname'])."<br />";
					$billingaddress = $billingaddress.stripslashes($row['address1'])." ".stripslashes($row['address2'])."<br />";
					$billingaddress = $billingaddress.stripslashes($row['city'])."<br />";
					$billingaddress = $billingaddress.stripslashes($row['state'])."<br />";
					$billingaddress = $billingaddress.stripslashes($row['zipcode'])."<br />";
					$billingaddress = $billingaddress.stripslashes($row['country'])."<br />";
					$ship_phone = stripslashes($row['ship_day_telephone']);					
					$shippingaddress = $shippingaddress.stripslashes($row['ship_fname'])." ".stripslashes($row['ship_lname'])."<br />";
					$shippingaddress = $shippingaddress.stripslashes($row['ship_address1'])." ".stripslashes($row['ship_address2'])."<br />";
					$shippingaddress = $shippingaddress.stripslashes($row['ship_city'])."<br />";
					$shippingaddress = $shippingaddress.stripslashes($row['ship_state'])."<br />";
					$shippingaddress = $shippingaddress.stripslashes($row['ship_zipcode'])."<br />";
					$shippingaddress = $shippingaddress.stripslashes($row['ship_country'])."<br />";
				}
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<LINK href="main.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>
<script language="Javascript" type="text/JavaScript" src="calendar.js"></script>
<script>
function FrmSubmit()
{
	form=document.addprod;
	form.HidSubmit.value=1;
	form.submit();
	return true;
}
</script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<table align="left" width="100%" cellpadding="0" cellspacing="0">
<tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="75"><? include ("top.php"); ?></td>
  </tr>
</table></td></tr>
<tr><td>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY >
  <tr>
   <td width="20%"  valign="top" class="rightbdr" >
   	<? include("inner_left_admin.php"); ?>
	</td>
	<td width="80%" valign="top" align="center">
		<TABLE  cellSpacing=2 cellPadding=2 border=0 width="100%" align="center">
        <TR> 
		  <TD width="100%" height="35" class=form111>View Order </TD>
		</TR>
        <TR>
          <TD align="center" background="images/vdots.gif" class="a-s"><?=$msg;?></TD>
        </TR>
        <TR>
          <TD align="left"> 		  
		  <?
		  		$query = "select * from orderdetail where orderid=".$_REQUEST['id'];
				$result = mysql_query($query);
				if(mysql_num_rows($result) > 0)
				{
					while($row = mysql_fetch_array($result))
					{
						$display_first_line = 1;
					}
				}
		  ?>
		  <? if($display_first_line == 1) { ?>
			<?
			$productname = "";			
			$quantity = 0;
			$fragrance="";
		  	if($_REQUEST['id'] > 0)
			{
				$query = "select * from orderdetail where orderid=".$_REQUEST['id'];
				$result = mysql_query($query);
				if(mysql_num_rows($result) > 0)
				{
				?>
            <table border="0" cellspacing="0" cellpadding="0" class="t-b">
			<tr ><td colspan="6" ><strong>Order #: <?=$orderno;?></strong></td></tr>
			<tr ><td colspan="6" ><strong>Order Date: <?=$orddate;?></strong></td></tr>
			<tr ><td colspan="6" >&nbsp;</td></tr>
			<tr class="form_back"><td colspan="6" ><span class="mail_font">Shopping Cart</span></td></tr>			
              <tr class="form_back">               
				<td width="38%" align="left"><strong>Ticket Name</strong></td>                
                <td width="18%" align="center"><strong>Quantity</strong></td>
				<td width="16%" align="center"><strong>Unit Price</strong></td>	
				<td width="16%" align="center"><strong>Total Price</strong></td>
              </tr>
              <?
					while($row = mysql_fetch_array($result))
					{
							$quantity = $row['quantity'];
							$color = $row['color'];	
							$size = $row['size'];	
							$productprice = $row['price'];							
							$cflag = stripslashes($row['cflag']);
							
							
							// for productname
							$tempquery = "select * from events where id=".$row['pid'];
							$tempresult = mysql_query($tempquery);
							if(mysql_num_rows($tempresult) > 0)
							{
								while($temprow = mysql_fetch_array($tempresult))
								{									
									$productsku="";
									$productsize='';
									$productname= stripslashes($temprow['name']);
									$description= substr(stripslashes($temprow['description']),"0",50);
								}
							}
							mysql_free_result($tempresult);
						?>
				  <tr>					
					<td align="left"><strong><?=$productname;?></strong><br><?=$description;?> </td> 					
					<td align="center"><?=$quantity;?>&nbsp;</td>								
					<td align="center">$<?=number_format($productprice, 2, '.', '');?></td>
					<td align="center">$<?=number_format($productprice*$quantity, 2, '.', '');?></td>					
				  </tr>
				  <?
				   }
				}
			}
		  ?>
		    <tr>
				<td colspan="6" align="right"><b>Sub total: $<?=number_format($total, 2, '.', '');?></b>&nbsp;&nbsp;</td>				
			</tr>
			 <tr>
				<td colspan="6" align="right"><b>Shipping Cost: $<?=number_format($shippingcharge, 2, '.', '');?></b>&nbsp;&nbsp;</td>				
			</tr>
			 <tr>
				<td colspan="6" align="right"><b>Tax: $<?=number_format($tax, 2, '.', '');?></b>&nbsp;&nbsp;</td>				
			</tr>
			 <tr>
				<td colspan="6" align="right"><b>Promotional Discount: $<?=number_format($discount, 2, '.', '');?></b>&nbsp;&nbsp;</td>				
			</tr>
			<tr>
				<td colspan="6" align="right"><b>Total: $<?=number_format($grandtotal, 2, '.', '');?></b>&nbsp;&nbsp;</td>
				
			</tr>
			</table>			
		<? } ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" width="50%">
			<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="t-b">
              <tr class="form_back">
                <td align="left" class="mail_font" >Billing Address</td>
              </tr>
              <tr>
               <td align="left"><?=$billingaddress;?></td>
              </tr>
			  <tr>
               <td align="left">Phone: <?=$phone;?></td>
              </tr>			 
			  <tr>
               <td align="left"><strong>Email</strong>:&nbsp;<a href="mailto:<?=$email;?>"><?=$email;?></a></td>
              </tr>
            </table>
			</td>
			<td align="left" valign="top" width="50%">
			<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="t-b">
              <tr class="form_back">
                <td align="left" class="mail_font" >Shipping Address</td>
              </tr>
              <tr>
               <td align="left"><?=$shippingaddress;?></td>
              </tr>
			  <tr>
               <td align="left">Phone: <?=$ship_phone;?></td>
              </tr>	
            </table>
			</td>
		  </tr>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" width="50%">
			<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="t-b">
              <tr class="form_back">
                <td align="left" class="mail_font" >Shipping Method</td>
              </tr>
              <tr>
               <td align="left"><?=$shippingmethoad;?></td>
              </tr>	
            </table><br>
			<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="t-b">
              <tr class="form_back">
                <td align="left" class="mail_font" >Promo Code</td>
              </tr>
              <tr>
               <td align="left"><?=$PromoCode;?></td>
              </tr>	
            </table>
			</td>
			<td align="left" valign="top" width="50%">
			<table  width="100%" height="115" border="0" cellspacing="2" cellpadding="2" class="t-b">
              <tr class="form_back">
                <td align="left"  class="mail_font" height="10" >Payment Information</td>
              </tr>
              <tr>
               <td align="left"><?=$payinfo;?></td>
              </tr>			  
            </table>
			</td>
		  </tr>
		</table>
            <form name="addprod" id="addprod" enctype="multipart/form-data" method="post">
              <input type="hidden" name="id" value="<?=$_REQUEST['id'];?>">
              <table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td width="15%"   align="left">Order status: </td>
                  <td width="85%"  align="left">
                      <select name="status" class="solidinput">
               				<option  value="" ></option>
							<option <? if($pending == "Cancelled") { echo "selected='selected'"; } ?> value="Cancelled">Cancelled</option>
							<option <? if($pending == "Cancellation in process") { echo "selected='selected'"; } ?> value="Cancellation in process">Cancellation in process</option>
							<option <? if($pending == "Delivered") { echo "selected='selected'"; } ?> value="Delivered">Delivered</option>
							<option <? if($pending == "Exchanged") { echo "selected='selected'"; } ?> value="Exchanged">Exchanged</option>
							<option <? if($pending == "In process") { echo "selected='selected'"; } ?> value="In process">In process</option>
							<option <? if($pending == "Not delivered") { echo "selected='selected'"; } ?>  value="Not delivered">Not delivered</option>
							<option <? if($pending == "Shipped") { echo "selected='selected'"; } ?> value="Shipped">Shipped</option>
							<option <? if($pending == "Returned") { echo "selected='selected'"; } ?> value="Returned">Returned</option>
							<option <? if($pending == "Returned to buyer") { echo "selected='selected'"; } ?> value="Returned to buyer">Returned to buyer</option>
							<option <? if($pending == "Received") { echo "selected='selected'"; } ?> value="Received">Received</option>
                      </select>
                    </td>
                </tr>
                <tr>
                  <td align="left">Paid status:</td>
                  <td align="left">
                      <select name="ispaid" class="solidinput">
                        <option <? if($ispaid == "paid") { echo "selected='selected'"; } ?> value="paid">Paid</option>
                        <option <? if($ispaid == "notpaid") { echo "selected='selected'"; } ?> value="notpaid">Not Paid</option>
                      </select>
                    </td>
                </tr>	
				<tr><td >Tracking number:</td>
				<td><input type="text" name="trackingno" value="<?=$trackingno;?>" size="30" class="solidinput"></td></tr>			
                <tr>
                  <td align="left" colspan="2">
				  		<input type="button" name="update" value="Update Order Status" class="bttn-s" onClick="return FrmSubmit();" ><br>
						<input type="hidden" name="HidSubmit" id="HidSubmit" value="0">
				  </td>
			    </tr>				
              </table>
            </form></TD>
        </TR>
      </TABLE></td></tr></TBODY></TABLE></td></tr></table></BODY></HTML>