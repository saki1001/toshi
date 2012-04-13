<? include("../connect.php"); 

$SESSION_PRODUCTID2 = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
if($SESSION_PRODUCTID2 > 0) {
    
} else {
    header("Location:$SITE_URL/cart.php");
    exit;
}

if($_POST['HidContinueCheckout']=="1") {
        if($_SESSION['orderid']=="") {
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
                    
                    if($_SESSION['SESSION_PRODUCTID']>0) {    
                        foreach($_SESSION['SESSION_PRODUCTID'] as $key=>$val) {
                            $query_product_detail = "insert into orderdetail 
                                                     set orderid = '".$_SESSION['orderid']."',
                                                     pid = '".$val."',
                                                     quantity = '".$_SESSION['SESSION_QUANTITY'][$key]."',
                                                     price = '".$_SESSION['SESSION_PRICE'][$key]."',
                                                     size = '".$_SESSION['SESSION_CUSTOMIZE'][$key]."'";
                            mysql_query($query_product_detail) or die(mysql_error()); 
                        }
                    }
        } else {
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
                    
                    if($_SESSION['SESSION_PRODUCTID']>0) {    
                        foreach($_SESSION['SESSION_PRODUCTID'] as $key=>$val) {
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
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='cart';
        $SUBPAGE= 'checkout';
        $PAGETITLE= 'Checkout Review';
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/cart.css" type="text/css" media="all">
    
    <script type="text/javascript" src="ajax_validation.js"></script>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>" class="<? echo $SUBPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <div class="checkout_wrapper">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <? if($_REQUEST['msg']){?>
                <div id="msg" class="active">
                    <? echo stripslashes($_REQUEST['msg']);?>
                </div>
            <? } ?>
            
            <form name="frmShipInfo" id="frmShipInfo" enctype="multipart/form-data" method="post">
                <section class="billing_summary">
                    <h3>Billing Information</h3>
                    <ul>
                        <li>
                            <? echo stripslashes($_SESSION['fname']);?>&nbsp;
                            <? echo stripslashes($_SESSION['lname']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['address1']);?>&nbsp;
                            <? echo stripslashes($_SESSION['address2']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['city']);?>,&nbsp;
                            <? echo stripslashes($_SESSION['state']);?>&nbsp;
                            <? echo stripslashes($_SESSION['zipcode']);?>&nbsp;
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['country']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['day_telephone']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['email']);?>
                        </li>
                    </ul>
                </section>
                <section class="shipping_summary">
                    <h3>Shipping Information</h3>
                    <ul>
                        <li>
                            <? echo stripslashes($_SESSION['ship_fname']);?>&nbsp;
                            <? echo stripslashes($_SESSION['ship_lname']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['ship_address1']);?>&nbsp;
                            <? echo stripslashes($_SESSION['ship_address2']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['ship_city']);?>,&nbsp;
                            <? echo stripslashes($_SESSION['ship_state']);?>&nbsp;
                            <? echo stripslashes($_SESSION['ship_zipcode']);?>&nbsp;
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['ship_country']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['ship_day_telephone']);?>
                        </li>
                        <li>
                            <? echo stripslashes($_SESSION['email']);?>
                        </li>
                    </ul>
                </section>
                <section class="cart_summary">
                    <h3>Order Details</h3>
                    <?
                        $SESSION_PRODUCTID  = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
                        $SESSION_QUANTITY   = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
                        $SESSION_PRICE      = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
                        $SESSION_CUSTOMIZE  = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
                    ?>
                    <?
                        $subtotal=0;

                        if($SESSION_PRODUCTID>0) {
                    ?>
                        <?
                            for($i=0;$i<count($SESSION_PRODUCTID);$i++) {
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
                            <ul>
                                <li>
                                    <span>Event</span>
                                    <a href="event_detail.php?eventId=<?=$SESSION_PRODUCTID[$i];?>">
                <?=$ProductName;?></a>
                                </li>
                                <li>
                                    <span>Quantity</span>
                                    <?=$SESSION_QUANTITY[$i];?>
                                </li>
                                <li>
                                    <span>Price</span>
                                    $<?=$SESSION_PRICE[$i];?>
                                </li>
                            </ul>
                        <? } ?>
                    <?  }?>
                </section>
                <section class="price_summary">
                    <h3>Price Summary</h3>
                    <?
                        $Final=$_SESSION['total'] + $_SESSION['ShippingCharge'] - $_SESSION['discount'];
                        $_SESSION['finaltotal']=int_to_Decimal($Final);
                    ?>
                    <ul class="two_col_list">
                        <li class="left">
                            Sub-total
                        </li>
                        <li class="right">
                            $<?=int_to_Decimal($_SESSION['total']);?>
                        </li>
                        <li class="left">
                            Shipping
                        </li>
                        <li class="right">
                            $<? if($_SESSION['ShippingCharge']) {
                                    echo int_to_Decimal($_SESSION['ShippingCharge']);
                                } else {
                                    echo "0.00";
                                }
                            ?>
                        </li>
                        <li class="left">
                            Tax
                        </li>
                        <li class="right">
                            $<? if($_SESSION['ShippingTax']) {
                                echo int_to_Decimal($_SESSION['ShippingTax']);
                                } else {
                                    echo "0.00";
                                }
                            ?>
                        </li>
                        <li class="left">
                            Discount
                        </li>
                        <li class="right">
                            -$<? if($_SESSION['discount']) {
                                echo int_to_Decimal($_SESSION['discount']);
                                
                                } else {
                                    echo 0.00;
                                }
                            ?>
                        </li>
                        <li class="left">
                            Order Total
                        </li>
                        <li class="right">
                            $<?=int_to_Decimal($_SESSION['finaltotal']);?>
                        </li>
                        <li class="left">
                            <a href="checkout.php" class="button red">Edit Details</a>
                        </li>
                        <li class="right">
                            <input type="hidden" name="HidContinueCheckout" id="HidContinueCheckout" value="" /> 
                            <a href="#" class="button yellow" onClick="return FrmChkInfo();">Submit Order</a>
                        </li>
                    </ul>
                </section>
            </form>
        </div>
    </div>
    <!-- FOOTER -->
        <? include("templates/footer.php");?>
        <script language="javascript" type="text/javascript">
        function FrmChkInfo()
        {
            form=document.frmShipInfo;
            form.HidContinueCheckout.value=1;
            form.submit();
            return true;
        }    
        </script>
</body>
</html>