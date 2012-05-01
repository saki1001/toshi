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
        
        // header("location:$SECURE_URL/checkout_review.php");
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
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <div class="checkout_wrapper">
                <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
                <?
                $SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
                $SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
                $SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
                $SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;

                if($SESSION_PRODUCTID > 0) {
                $cartflag = 1;
                ?>
                <form name="frmShipInfo" id="frmShipInfo"  enctype="multipart/form-data" method="post">
                    <section class="ticket_info">
                        <? include("templates/cart_table.php"); ?>
                    </section>
                    <!-- BILLING -->
                    <section class="billing_info">
                        <h3>Billing Information</h3>
                        <div class="field left full">
                            <label>First Name*</label>
                            <input name="firstname" type="text" class="register_textfield2" id="firstname" value="<?=stripslashes($_SESSION['fname']);?>"/>
                        </div>
                        <div class="field full">
                            <label>Last Name*</label>
                            <input name="lastname" type="text" class="register_textfield2" id="lastname" value="<?=stripslashes($_SESSION['lname']);?>"/>
                        </div>
                        <div class="field left full">
                            <label>Address Line 1*</label>
                            <input name="address1" type="text" class="register_textfield2" id="address1" value="<?=stripslashes($_SESSION['address1']);?>"/>
                        </div>
                        <div class="field full">
                            <label>Address Line 2</label>
                            <input name="address2" type="text" class="register_textfield2" id="address2" value="<?=stripslashes($_SESSION['address2']);?>"/>
                        </div>
                        <div class="field left full">
                            <label>City*</label>
                            <input name="city" type="text" class="register_textfield2" id="city" value="<?=stripslashes($_SESSION['city']);?>"/>
                        </div>
                        <div class="field full">
                            <label>Country*</label>
                            <select name="country" id="country"  class="register_textfield2" onChange="LoadCountry_States('LoadCountr_States_ID',this.value,'state','153');" >
                                <option value="">Select Country</option>                                                  <?=GetDropdown(country_name,country_name,country,' order by country_name asc',$_SESSION['country']);?>
                            </select>
                        </div>
                        <div class="field left full">
                            <label>State/Province*</label>
                            <span id="bstate2"><?  fillbstate($bcountry,$_SESSION['state']); ?></span>
                        </div>
                        <div class="field full">
                            <label>Zip Code*</label>
                            <input name="zip" type="text" class="register_textfield2" id="zip" value="<?=stripslashes($_SESSION['zipcode']);?>"/>
                        </div>
                        <div class="field left full">
                            <label>Phone*</label>
                            <input name="phone" type="text" class="register_textfield2" id="phone" value="<?=stripslashes($_SESSION['day_telephone']);?>"/>
                        </div>
                        <div class="field full">
                            <label>Email*</label>
                            <input name="email" type="text" class="register_textfield2" id="email" value="<?=stripslashes($_SESSION['email']);?>"/>
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
                        <div class="field full submit">
                            <span id="promomsg"></span>
                            <a href="#" onClick="promodisc(document.frmShipInfo.promocode.value); return false;" class="button red">Apply</a>
                        </div>
                    </section>
                    <section class="payment_info">
                        <h3>Payment Information</h3>
                        <div class="field full">
                            <label>All payments made through PayPal.</label>
                        </div>
                        <div class="field full">
                            <input type="hidden" name="HidContinueCheckout" id="HidContinueCheckout" value="" /> 
                            <input type="submit" onClick="return FrmChkInfo();" class="button yellow" value="Review Order" />
                        </div>
                    </section>
                </form>
                <? } else { ?>
                <?
                    $_SESSION['total'] = "0";
                    $_SESSION['SESSION_TOTAL'] = "0";
                    $_SESSION['finaltotal']="0";
                ?>
                <div class="empty">
                    <p>There are currently no events in your cart.</p>
                    <p><a href="events.php">Click Here</a> to browse upcoming events.</p>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
        <? include("templates/footer.php");?>
        
</body>
</html>