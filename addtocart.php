<? include("connect.php");
	if(isset($_REQUEST['rmv']) && $_REQUEST['rmv'] == "yes")
	{
		GTG_remove_from_cart("#".$_REQUEST['sku']);
	}
	else
	{
		$q = trim($_REQUEST['quantity']);
		//$cust_temp=$_REQUEST['db_cust'];
		//$ourprice=GetName1("events_pricelevel","onlineprice","id",trim($_REQUEST['HidPriceid']));	
		$ourprice=GetTicketPrice($_REQUEST['HidPriceid']);	
		$size=trim($_REQUEST['HidPriceid']);
		if(is_numeric($q))
		{
			GTG_add_to_cart($_REQUEST['HidPid'],$_REQUEST['quantity'],$ourprice,$size);
		}		
	}
?>
<script language="javascript">
	location.href = "viewcart.php";
</script>
			