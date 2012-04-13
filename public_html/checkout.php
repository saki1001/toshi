<? include("../connect.php"); 

    $SESSION_PRODUCTID2 = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
    if($SESSION_PRODUCTID2 > 0) {

    } else {
    header("Location:$SITE_URL/cart.php");
    exit;
    }


    if($_POST['HidContinueCheckout']=="1") {
        $_SESSION['cctype'] = addslashes($_POST['cardtype']);
        $_SESSION['ccnumber'] = addslashes($_POST['cnumber']);
        $_SESSION['ccmonth'] = addslashes($_POST['month']);
        $_SESSION['ccyear'] = addslashes($_POST['year']);
        $_SESSION['cvv'] = addslashes($_POST['cvv']);
        $_SESSION['ship_fname'] = addslashes($_POST['ship_firstname']);
        $_SESSION['ship_lname'] = addslashes($_POST['ship_lastname']);
        $_SESSION['ship_address1'] = addslashes($_POST['ship_address1']);
        $_SESSION['ship_address2'] = addslashes($_POST['ship_address2']);
        $_SESSION['ship_city'] = addslashes($_POST['ship_city']);
        $_SESSION['ship_state'] = addslashes($_POST['ship_state']);
        $_SESSION['ship_country'] = addslashes($_POST['ship_country']);
        $_SESSION['ship_zipcode'] = addslashes($_POST['ship_zip']);
        $_SESSION['ship_day_telephone'] = addslashes($_POST['ship_phone']);                    
        $_SESSION['fname'] = addslashes($_POST['firstname']);
        $_SESSION['lname'] = addslashes($_POST['lastname']);
        $_SESSION['address1'] = addslashes($_POST['address1']);
        $_SESSION['address2'] = addslashes($_POST['address2']);
        $_SESSION['city'] = addslashes($_POST['city']);
        $_SESSION['state'] = addslashes($_POST['state']);
        $_SESSION['country'] = addslashes($_POST['country']);
        $_SESSION['zipcode'] = addslashes($_POST['zip']);
        $_SESSION['day_telephone'] = addslashes($_POST['phone']);
        $_SESSION['email'] = addslashes($_POST['email']);
        
        header("location:checkout_review.php");
        exit;
    }


    function fillsstate($scountry, $sstate) {
    if($scountry!="") {
        $qry="SELECT state_name from state where id_country=(SELECT id_country from country where country_name='".$scountry."') order by state_name";
        $res=mysql_query($qry);
        $statelist="<select name='ship_state' id='ship_state' class='register_textfield2' style='width:153px; ' ><option value=''>Select State</option>";
    
        if(mysql_affected_rows()>0) {
          while($row=mysql_fetch_array($res)) {
            if($sstate==$row['state_name']){
                $statelist.="<option value='".$row['state_name']."' selected>".$row['state_name']."</option>";
            } else {
                $statelist.="<option value='".$row['state_name']."'>".$row['state_name']."</option>";
            }
          
          }
        }
        $statelist.="</select>";
        echo $statelist;
    }
    }

    function fillbstate($bcountry, $bstate) {
    if($bcountry!="") {
        $qry="SELECT state_name from state where id_country=(SELECT id_country from country where country_name='".$bcountry."') order by state_name";
        $res=mysql_query($qry);
        $statelist="<select name='state' id='state' class='register_textfield2' style='width:153px;' ><option value=''>Select State</option>";
    
        if(mysql_affected_rows()>0) {
          while($row=mysql_fetch_array($res)) {
            if($bstate==$row['state_name']) {
                $statelist.="<option value='".$row['state_name']."' selected>".$row['state_name']."</option>";
            } else {
                $statelist.="<option value='".$row['state_name']."'>".$row['state_name']."</option>";
            }
          }
        }
        $statelist.="</select>";
        echo $statelist;
    }
    }


    if($SelUserInfoRow->ship_country=="") {
        $scountry="USA";
    } else {
        $scountry=$SelUserInfoRow->ship_country;
    }
    
    if($SelUserInfoRow->country=="") {
        $bcountry="USA";
    } else { 
        $bcountry=$SelUserInfoRow->country;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='cart';
        $SUBPAGE= 'checkout';
        $PAGETITLE= 'Checkout';
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/cart.css" type="text/css" media="all">
    <script src="js/checkout.js" type="text/javascript"></script>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>" class="<? echo $SUBPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <div class="checkout_wrapper">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <form name="frmShipInfo" id="frmShipInfo"  enctype="multipart/form-data" method="post">        
                <section class="ticket_info">
                    <?
                    $SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
                    $SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
                    $SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
                    $SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
                    if($SESSION_PRODUCTID > 0) {
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
                              <?=$SESSION_QUANTITY[$i];?>
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
                    <? } ?>
                </section>
                <? if($_REQUEST['msg']){?>
                    <div id="msg" class="active">
                        <? echo stripslashes($_REQUEST['msg']);?>
                    </div>
                <? } ?>
                <!-- BILLING -->
                <section class="billing_info">
                    <h3>Billing Information</h3>
                    <div class="field full">
                        <label>First Name*</label>
                        <input name="firstname" type="text" class="register_textfield2" id="firstname" value="<?=stripslashes($_SESSION['fname']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Last Name*</label>
                        <input name="lastname" type="text" class="register_textfield2" id="lastname" value="<?=stripslashes($_SESSION['lname']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Address Line 1*</label>
                        <input name="address1" type="text" class="register_textfield2" id="address1" value="<?=stripslashes($_SESSION['address1']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Address Line 2</label>
                        <input name="address2" type="text" class="register_textfield2" id="address2" value="<?=stripslashes($_SESSION['address2']);?>"/>
                    </div>
                    <div class="field full">
                        <label>City*</label>
                        <input name="city" type="text" class="register_textfield2" id="city" value="<?=stripslashes($_SESSION['city']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Country*</label>
                        <select name="country" id="country"  class="register_textfield2" onChange="LoadCountry_States('LoadCountr_States_ID',this.value,'state','153');" >
                            <option value="">Select Country</option>                                                  <?=GetDropdown(country_name,country_name,country,' order by country_name asc',$_SESSION['country']);?>
                        </select>
                    </div>
                    <div class="field full">
                        <label>State/Province*</label>
                        <span id="bstate2"><?  fillbstate($bcountry,$_SESSION['state']); ?></span>
                    </div>
                    <div class="field full">
                        <label>Zip Code*</label>
                        <input name="zip" type="text" class="register_textfield2" id="zip" value="<?=stripslashes($_SESSION['zipcode']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Phone*</label>
                        <input name="phone" type="text" class="register_textfield2" id="phone" value="<?=stripslashes($_SESSION['day_telephone']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Email*</label>
                        <input name="email" type="text" class="register_textfield2" id="email" value="<?=stripslashes($_SESSION['email']);?>"/>
                    </div>
                </section>
                <!-- SHIPPING -->
                <section class="shipping_info">
                    <h3>
                        <span>Shipping Information</span>
                        <span class="same_as_ship">
                            <input type="checkbox" name="sameasship" onClick="chk_ship();" />
                            <label>Same as Billing</label>
                        </span>
                    </h3>
                    <div class="field full">
                        <label>First Name*</label>
                        <input name="ship_firstname" type="text" class="register_textfield2" id="ship_firstname" value="<?=stripslashes($_SESSION['ship_fname']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Last Name*</label>
                        <input name="ship_lastname" type="text" class="register_textfield2" id="ship_lastname" value="<?=stripslashes($_SESSION['ship_lname']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Address Line 1*</label>
                        <input name="ship_address1" type="text" class="register_textfield2" id="ship_address1" value="<?=stripslashes($_SESSION['ship_address1']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Address Line 2</label>
                        <input name="ship_address2" type="text" class="register_textfield2" id="ship_address2" value="<?=stripslashes($_SESSION['ship_address2']);?>"/>
                    </div>
                    <div class="field full">
                        <label>City*</label>
                        <input name="ship_city" type="text" class="register_textfield2" id="ship_city" value="<?=stripslashes($_SESSION['ship_city']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Country*</label>
                        <select name="ship_country" id="ship_country"  class="register_textfield2"     onchange="LoadCountry_States('LoadCountr_States_ID2',this.value,'ship_state','153');" >
                            <option value="">Select Country</option>
                            <?=GetDropdown(country_name,country_name,country,' order by country_name asc',$_SESSION['ship_country']);?>
                        </select>
                    </div>
                    <div class="field full">
                        <label>State/Province*</label>
                        <span id="sstate1"><? fillsstate($scountry,$_SESSION['ship_state']); ?></span>
                    </div>
                    <div class="field full">
                        <label>Zip Code*</label>
                        <input name="ship_zip" type="text" class="register_textfield2" id="ship_zip" value="<?=stripslashes($_SESSION['ship_zipcode']);?>"/>
                    </div>
                    <div class="field full">
                        <label>Phone*</label>
                        <input name="ship_phone" type="text" class="register_textfield2" id="ship_phone" value="<?=stripslashes($_SESSION['ship_day_telephone']);?>"/>
                    </div>
                </section>
                <section class="promo_info">
                    <h3>Promotional Information</h3>
                    <div class="field full">
                        <label>Promotional Code</label>
                        <input type="hidden" id="carttotal" name="carttotal" value="<?=$_SESSION['total'];?>" >
                        <input name="promocode" type="text" class="register_textfield2" id="promocode"   value="<?=$_SESSION["promocode"];?>" autocomplete="off"/> 
                        <!-- <input type="button" name="applycoupon" class="button1" onClick="promodisc(document.frmShipInfo.promocode.value); return false;"  value="Apply"/> -->
                    </div>
                    <div class="field full">
                        <span id="promomsg"></span>
                        <a href="#" onClick="promodisc(document.frmShipInfo.promocode.value); return false;" class="button red">Apply</a>
                    </div>
                </section>
                <section class="payment_info">
                    <h3>Payment Information</h3>
                    <div class="field full">
                        <label>All payments made through PayPal.</labe>
                    </div>
                    <div class="field full">
                        <input type="hidden" name="HidContinueCheckout" id="HidContinueCheckout" value="" /> 
                        <a href="#" onClick="return FrmChkInfo();" class="button yellow">Review Order</a>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <!-- FOOTER -->
        <? include("templates/footer.php");?>
        
</body>
</html>