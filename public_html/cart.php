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
        $SUBPAGE = 'cart';
        $PAGETITLE= 'Your Cart';
        
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/cart.css" type="text/css" media="all">
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <section class="cart_wrapper">
                <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
                <?
                $SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
                $SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
                $SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
                $SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;

                if($SESSION_PRODUCTID > 0) {
                $cartflag = 1;
                ?>
                <form name="frm1" id="frm1" action="php/cart_update.php" method="post"  enctype="multipart/form-data">
                    <? include("templates/cart_table.php"); ?>
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
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>