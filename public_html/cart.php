<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        // $eventId = trim(mysql_real_escape_string($_GET['eventId']));
        // $eventQuery = "SELECT * FROM events WHERE approve='Y' AND id='".$eventId."'";
        // $eventResult = mysql_query($eventQuery) or die(mysql_error());
        // $eventRow = mysql_fetch_array($eventResult);
        
        $ACTIVEPAGE='cart';
        $PAGETITLE= 'Your Cart';
        
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <section class="cart_wrapper">
            <form name="frm1" id="frm1" action="php/cart_update.php" method="post"  enctype="multipart/form-data">
            <?
            $SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
            $SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
            $SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
            $SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
            if($SESSION_PRODUCTID > 0)
            {
                $cartflag = 1;
            ?>
                <table>
                    <tr class="table_head">
                      <th class="event_col">
                          Event
                      </th>
                      <th class="qty_col">
                          Qty.
                      </th>
                      <th class="price_col">
                          Price
                      </th>
                      <th class="sub_total_col">
                          Sub Total
                      </th>
                      <th class="rm_col">
                          Delete
                      </th>
                    </tr>
                    <?
                      for($i=0;$i<count($SESSION_PRODUCTID);$i++) {
                        $totalcost = $SESSION_PRICE[$i]*$SESSION_QUANTITY[$i];
                        $subtotal = $subtotal +  $totalcost;
                        $_SESSION['total'] = int_to_Decimal($subtotal);
                        $_SESSION['SESSION_TOTAL'] = int_to_Decimal($subtotal);
                        $_SESSION['finaltotal']=int_to_Decimal($subtotal);
                        
                        $getEventTicket ="SELECT * FROM events_pricelevel WHERE eventid = '$SESSION_PRODUCTID[$i]' AND activeornot='Yes'";
                        $eventTicketResult = mysql_query($getEventTicket);
                        $eventTicketRow = mysql_fetch_assoc($eventTicketResult);
                        
                        if(!$eventTicketRow['perorderlimit']) {
                            $eventOrderLimit = 10;
                        } else {
                            $eventOrderLimit=$eventTicketRow['perorderlimit'];
                        }
                        
                        $ProductName=stripslashes(GetName1("events","name","id",$SESSION_PRODUCTID[$i]));
                        $ProductName=stripslashes(GetName1("events","name","id",$SESSION_PRODUCTID[$i]));
                    ?>
                    <tr>
                        <!-- EVENT -->
                        <td class="event_col">
                            <a href="event_detail.php?eventId=<?=$SESSION_PRODUCTID[$i];?>"><?=$ProductName;?></a>
                            <input type="hidden" name="val<?=$i;?>" value="<?=$i;?>@<?=$SESSION_PRODUCTID[$i];?>" />
                            <input type="hidden" name="i" value="<?=$i;?>"  />
                            <input type="hidden" name="size<?=$i;?>" value="<?=$SESSION_CUSTOMIZE[$i];?>" />
                        </td>
                        <!-- QUANTITY -->
                        <td class="qty_col" valign="bottom">
                            <input name="quantity<?=$i;?>" type="text"  id="quantity<?=$i;?>" value="<?=$SESSION_QUANTITY[$i];?>" size="5" onKeyUp="return keycode('<?=$i;?>');" maxlength="4" />
                        </td>
                        <!-- PRICE -->
                        <td class="price_col">
                            $<?=int_to_Decimal($SESSION_PRICE[$i]);?>
                        </td>
                        <!-- SUBTOTAL -->
                        <td class="sub_total_col">
                            $<?=int_to_Decimal($totalcost);?>
                        </td>
                        <!-- DELETE -->
                        <td class="rm_col">
                            <a href="php/cart_update.php?DelItem=YES&priceid=<?=$SESSION_CUSTOMIZE[$i];?>&pid=<?=$SESSION_PRODUCTID[$i];?>" title="Click to remove item"><img src="images/close_x.png" alt="X" width="14" height="14" /></a>
                        </td>
                    </tr>
                    <? } ?>
                </table>
                <div id="msg" class="active">
                    <? if($_REQUEST['msg']){?>
                        <? echo $_REQUEST['msg'];?>
                    <? } ?>
                    <? if($_REQUEST['Update']=="yes"){
                        echo "Your cart has been updated successfully.";
                        }
                    ?>
                </div>
                <ul class="summary">
                    <li class="left">
                        Sub Total
                    </li>
                    <li class="right">
                        $<?=number_format($_SESSION['total'], 2, '.', '');?>
                    </li>
                    <li class="left">
                        Shipping
                    </li>
                    <li class="right">
                        $<?=number_format($_SESSION['shippingtotal'], 2, '.', '');?>
                    </li>
                    <li class="left">
                        Total
                    </li>
                    <li class="right">
                        $<?=number_format($_SESSION['total'], 2, '.', '');?>
                    </li>
                    <li class="left">
                        <a href="#" class="button red" onClick="document.frm1.submit();">Update Cart</a>
                    </li>
                    <li class="right">
                        <a href="checkout.php" class="button yellow">Checkout</a>
                    </li>
                </ul>
                <!-- <div class="actions">
                    <a href="events.php" class="button red">Back to Events</a>
                    <a href="#" class="button red" onClick="document.frm1.submit();">Update Cart</a>
                    <a href="checkout.php" class="button yellow">Checkout</a>
                </div> -->
            </form>
            <? } else { ?>
            <?
                $_SESSION['total'] = "0";
                $_SESSION['SESSION_TOTAL'] = "0";
                $_SESSION['finaltotal']="0";
                $_SESSION['SESSION_handling_fee']='0';
                $_SESSION['ShippingCharge']='0';
            ?>
            <div class="empty">
                <p>There are currently no events in your cart.</p>
                <p><a href="events.php">Click Here</a> to see the event listing.</p>
            </div>
            <? } ?>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>