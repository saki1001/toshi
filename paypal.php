<? include("connect.php"); 
$SESSION_PRODUCTID2 = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
if($SESSION_PRODUCTID2 > 0)
{}
else
{
	header("Location:$SITE_URL/viewcart.php");
	exit;
}

$productdesc = "";
$SESSION_PRODUCTID33 = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
$SESSION_QUANTITY33 = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
$SESSION_PRICE33 = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
$SESSION_CUSTOMIZE33 = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0; 

if ($_SERVER['SERVER_NAME']=="plus")
{
		$sql_query = "select * from ordermaster where id='".$_SESSION['orderid']."'";
		$result = mysql_query($sql_query);
		$row = mysql_fetch_object($result);
		header("Location:$SECURE_URL/afterpay.php?Paid=Y&orid=".$_SESSION['orderid']."");
		exit;
}
else
{
		$sql_query = "select * from ordermaster where id='".$_SESSION['orderid']."'";
		$result = mysql_query($sql_query);
		$row = mysql_fetch_object($result);
		$YYRR=substr($row->ccyear,2);
		$expirydate=$row->ccmonth.$YYRR;
		
		include("authorizenet.php"); 
		
		$ac = new AuthorizenetClass(); 
		$Address=$row->address1." ".$row->address2;
		$ShipAddress=$row->ship_address1." ".$row->ship_address2;
		
		$ac->setParameter("x_Login", ""); 
		$ac->setParameter("x_Test_Request", "True");  ///True if in test mode
		$ac->setParameter("x_cust_id", $row->userid); 
		$ac->setParameter("x_First_Name", $row->fname); 
		$ac->setParameter("x_Last_name", $row->lname); 
		$ac->setParameter("x_company", $row->companyname); 
		$ac->setParameter("x_Address", $Address);
		$ac->setParameter("x_City", $row->city);
		$ac->setParameter("x_State", $row->state);
		$ac->setParameter("x_Zip", $row->zipcode); 
		$ac->setParameter("x_Country", $row->country); 
		$ac->setParameter("x_phone", $row->day_telephone); 
		$ac->setParameter("x_email", $row->email); 
		$ac->setParameter("x_ship_to_first_name", $row->ship_fname); 
		$ac->setParameter("x_ship_to_last_name", $row->ship_lname); 
		$ac->setParameter("x_ship_to_company", $row->ship_companyname); 
		$ac->setParameter("x_ship_to_address", $ShipAddress);
		$ac->setParameter("x_ship_to_city", $row->ship_city);
		$ac->setParameter("x_ship_to_state", $row->ship_state);
		$ac->setParameter("x_ship_to_zip", $row->ship_zipcode); 
		$ac->setParameter("x_ship_to_country", $row->ship_country); 
		$ac->setParameter("x_tax", $row->tax); 
		$ac->setParameter("x_Amount", $row->grandtotal); 
		$ac->setParameter("x_currency_code", "USD"); 
		$ac->setParameter("x_Card_Num", $row->ccnumber);
		$ac->setParameter("x_Card_Code", $row->cvv); 
		$ac->setParameter("x_Exp_Date", "$expirydate"); 
		$ac->setParameter("x_Invoice_Num", $row->orderid); 
		$ac->setParameter("x_description", $productdesc);
			
		$result_code = $ac->process();    // 1 = accepted, 2 = declined, 3 = error 
		$result_array = $ac->getResults();    // return results array 
		
		foreach($result_array as $key => $value) {
			if($key=="x_response_code")
			{
				if($value==1)
				{
					header("Location:$SECURE_URL/afterpay.php?Paid=Y&orid=".$_SESSION['orderid']."");
					exit;
				}
			}
			if($key=="x_response_reason_text")
			{
				$Error=$value;
			}
		}	
		if($Error)
		{
			$response_text=$Error;
			//include("message.php");
			$UpdateOrder_query = "Update ordermaster set orderstatus='New' where id='".$_SESSION['orderid']."'";
			$UpdateOrder_queryRs = mysql_query($UpdateOrder_query);
			//header("Location:$SECURE_URL/orderreview.php?msg=$response_text");
			header("Location:$SECURE_URL/checkout.php?msg=$response_text");
			exit;
		}
}
?>