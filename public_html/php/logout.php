<?
    include("../../connect.php");
    $_SESSION['UsErId']=="";
    session_unregister('UsErId');
    $_SESSION['UsErTyPe']=="";
    session_unregister('UsErTyPe');
    $_SESSION['orderid']="";
    session_unregister('orderid');
    $_SESSION['total']="";
    session_unregister('total');
    $_SESSION['finaltotal']="";
    session_unregister('finaltotal');
    $_SESSION['promocode']="";
    session_unregister('promocode');
    $_SESSION['discount']="";
    session_unregister('discount');
    $_SESSION['promotype']="";
    session_unregister('promotype');

    $_SESSION['SESSION_PRODUCTID']="";
    $_SESSION['SESSION_QUANTITY']="";
    $_SESSION['SESSION_PRICE']="";
    $_SESSION['SESSION_PRODUCTTYPE']="";
    $_SESSION['Promocode_discount_id']="";
    $_SESSION['discount']="";
    $_SESSION['Promocode_discountfrom']="";
    $_SESSION['total']="";
    $_SESSION['ShippingCharge']="";
    $_SESSION['finaltotal']="";
    $_SESSION['ShippingChargePercent']="";
    $_SESSION['ShippingMethoad']="";
    $_SESSION['SALES_TAX']="";
    $_SESSION['ShippingTax']="";
    $_SESSION['SESSION_handling_fee']="";


    session_unregister('SESSION_PRODUCTID');
    session_unregister('SESSION_QUANTITY');
    session_unregister('SESSION_PRICE');
    session_unregister('SESSION_PRODUCTTYPE');
    session_unregister('Promocode_discount_id');
    session_unregister('discount');
    session_unregister('Promocode_discountfrom');
    session_unregister('total');
    session_unregister('ShippingCharge');
    session_unregister('finaltotal');
    session_unregister('ShippingChargePercent');
    session_unregister('ShippingMethoad');
    session_unregister('SALES_TAX');
    session_unregister('ShippingTax');
    session_unregister('SESSION_handling_fee');

    // header("location:../login.php?msg=Logout Successful.");
    header("location:../index.php");
    exit;
?>