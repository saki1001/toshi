<? include("connect.php");
//require_once("include/sendmail.php");

if($_GET['Paid']=="Y")
{
	$query_order = "update ordermaster set ispaid = 'paid' where id='".trim(mysql_real_escape_string($_REQUEST['orid']))."'";			
	mysql_query($query_order) or die(mysql_error()); 
}

	
$ordermaster_query = "select * from ordermaster where id ='".trim(mysql_real_escape_string($_REQUEST['orid']))."'";
$static_page_queryRs = mysql_query($ordermaster_query);
$ordermaster_row = mysql_fetch_object($static_page_queryRs);
$ShippingInformation="";
$BillingInformation="";
$CardInformation="";
$FNMA=stripslashes($ordermaster_row->fname);
$LNMA=stripslashes($ordermaster_row->lname);

$orderid=$ordermaster_row->orderid;
$orderdate=$ordermaster_row->orderdate;
////////////////billing address
$BillingInformation="<p>";
if($ordermaster_row->company!="")
{
	$BillingInformation.=stripslashes($ordermaster_row->company)."<br />";
}	
$BillingInformation.=stripslashes($ordermaster_row->fname)." ".stripslashes($ordermaster_row->lname)."<br />";
if($ordermaster_row->address1!="")
{
	$BillingInformation.=stripslashes($ordermaster_row->address1)."<br />";
}
if($ordermaster_row->address2!="")
{
	$BillingInformation.=stripslashes($ordermaster_row->address2)."<br />";
}	
$BillingInformation.=stripslashes($ordermaster_row->city).", ".stripslashes($ordermaster_row->state)." ".stripslashes($ordermaster_row->zipcode)." ".stripslashes($ordermaster_row->country)."<br />";
$BillingInformation.="Day phone: ".stripslashes($ordermaster_row->day_telephone).".</p>";

////////////////shipping address	
$ShippingInformation="<p>";
$ShippingInformation.=stripslashes($ordermaster_row->ship_fname)." ".stripslashes($ordermaster_row->ship_lname)."<br />";
if($ordermaster_row->ship_address1!="")
{
	$ShippingInformation.=stripslashes($ordermaster_row->ship_address1)."<br />";
}
if($ordermaster_row->ship_address2!="")
{
	$ShippingInformation.=stripslashes($ordermaster_row->ship_address2)."<br />";
}	
$ShippingInformation.=stripslashes($ordermaster_row->ship_city).", ".stripslashes($ordermaster_row->ship_state)." ".stripslashes($ordermaster_row->ship_zipcode)." ".stripslashes($ordermaster_row->ship_country)."<br />";
$ShippingInformation.="Day phone: ".stripslashes($ordermaster_row->ship_day_telephone).".</p>";
	


////////Card Information/////////////
//$CardInformation="Card type: ".ucfirst($ordermaster_row->cctype)."<br />";
$CardInformation.=substr($ordermaster_row->ccnumber,-4);
////////End of Card Information//////
//$ship_mothodd=GetName1("shippingmethoad","methoad","id",stripslashes($ordermaster_row->shippingmethoad));
//$ship_chargee=int_to_Decimal($ordermaster_row->shippingcharge);
	
$pp_code=$ordermaster_row->promocodeid;
$promotional_discount=int_to_Decimal($ordermaster_row->discount);
$Tax=int_to_Decimal($ordermaster_row->tax);



$toemail=$ordermaster_row->email;
$subject1="Your $SITE_NAME Order";			
$from1=$SHOPPING_MAIL;
$mailcontent1="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>$SITE_TITLE</title>
</head>
<body>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
	<td><p>Hello $FNMA $LNMA,</p>
	  <p>Your $SITE_NAME order has been received. </p>
	  <p><strong>Please Print a Copy of this Page for  Your Records.</strong></p>
	  <p><strong>Your order number is:</strong> $orderid<br />
		<strong>Order Date:</strong> $orderdate</p>
	  <p><strong>Billing Name &amp; Address:</strong></p>
	  $BillingInformation
	  
	  <p><strong>Payment Type:</strong> Credit Card<br />
		<strong>Number:</strong> **********$CardInformation</p>
		
	  <p><strong>Shipping Name &amp; Address:</strong></p>
	  $ShippingInformation
	  
	  <p><strong>Order Details: </strong></p>
	  <table width='100%' border='0' cellspacing='2' cellpadding='2'>";
	  $subtotal=0;
	  $SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
	  $SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
	  $SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
	  $SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0; 
	  if($SESSION_PRODUCTID>0)
	  {
		for($i=0;$i<count($SESSION_PRODUCTID);$i++)
		{
			
			$query = "select * from events where id=".$SESSION_PRODUCTID[$i];
			$result = mysql_query($query);
			$row = mysql_fetch_object($result);
			$ProductName=stripslashes($row->name);
			$modelno=stripslashes($row->modelno);
			$ProductDescr=stripslashes($row->description);
			
			
				if($i==0)
				{
					$mailcontent1.="<tr>
									  <td><strong>Item</strong></td>
									  <td><strong>Qty</strong></td>
									  <td><strong>Price</strong></td>
									  <td width='200'><strong>Total</strong></td>
									</tr>";
				}						
						
					$mailcontent1.="<tr>
					  <td>".$ProductName."</td>
					  <td>".$SESSION_QUANTITY[$i]."</td>
					  <td>$".int_to_Decimal($SESSION_PRICE[$i])."</td>
					  <td width='200'>$".int_to_Decimal($SESSION_PRICE[$i]*$SESSION_QUANTITY[$i])."</td>
					</tr>";
			}
		}	
		$mailcontent1.="<tr>
		  <td colspan='4'>
			<table width='400' border='0' cellspacing='2' cellpadding='2' align='right'>
			  <tr>
				<td ><strong>Item Subtotal:</strong></td>
				<td width='200'>$".int_to_Decimal($ordermaster_row->total)."</td>
			  </tr>
			  <tr>
				<td ><strong>Tax:</strong></td>
				<td width='200'>$<span id='sptax'>".int_to_Decimal($ordermaster_row->tax)."</span></td>
			  </tr>
			  <tr>
				<td ><strong>Discount:</strong></td>
				<td width='200'>-$<span id='Promocode_ID'>".int_to_Decimal($ordermaster_row->discount)."</span></td>
			  </tr>
			  <tr>
				<td height='35' valign='bottom' ><strong>Order Total:</strong></td>
				<td width='200' valign='bottom' >$<span id='Finaltotal_ID'>".int_to_Decimal($ordermaster_row->grandtotal)."</span></td>
			  </tr>
			</table>
		  </td>
		</tr>
	  </table>
	  <p>Thank you  for shopping at $SITE_NAME.&nbsp; We  appreciate your business and look forward to serving all your home renovation  and decorating needs.</p>
	  <p>Best  Regards,</p>
	  <p><em>$SITE_NAME Order Processing Dept.</em></p>
	  <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>";
//echo $mailcontent1;
if ($_SERVER['SERVER_NAME']!="plus")
{
	HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
}	
header("location:orderreceipt.php?orid=".trim(mysql_real_escape_string($_REQUEST['orid']))."");
exit;
?>