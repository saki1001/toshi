<? include("../connect.php");
$_SESSION['orderid']="";
session_unregister('orderid');
include("cartblank.php");

//$temp_ord=$_SESSION['orderid'];
$temp_ord=$_REQUEST['orid'];
$query_order2 = mysql_query("select * from ordermaster where id='".$temp_ord."'");
$query_orderRow=mysql_fetch_object($query_order2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo $SITE_NAME;?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script type="text/JavaScript" language="javascript" src="ajax_validation.js"></script>
</head>
<body id="page5">
<div class="body1">
  <div class="main">
    <!-- header -->
    <? include("top.php");?>
    <div class="ic">
      <div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div>
    </div>
    <!-- / header -->
    <!-- content -->
    <article id="content">
      <div class="wrapper">
        <div class="pad_left2 relative">
          <h4 class="color3"><span>Buy Ticket </span></h4>
          <? if($_REQUEST['msg']){?>
          <div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div>
          <? } ?>
          <div class="wrapper">
            <div class="box1" >
              <div class="" >
                <div class="wrapper" >
                  <section class="col1_1" style="width:830px;">
                    <h2><strong style="width:255px;">Order Receipt</strong></h2>
                    <div class="pad_bot1" style="border:10px solid;" align="center">
                      <figure>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" >
                                <form name="frmShipInfo" id="frmShipInfo" enctype="multipart/form-data" method="post">
                      
                                  <br /><strong>Thank you for your purchase!</strong><br /><br />
                                        Your order confirmation number is <b><?=$query_orderRow->orderid;?></b>
                                        <br>Check your email to print your receipt.
                                        <br />
                                        &nbsp;<input style="float:none;"  type="button" name="btnnn" id="btnnn" value="Continue Shopping" class="button1"  onClick="window.location.href='events.php'"/>
                                        <br />
                                        <br />
                                        
                        </form>
                            </td>
                          </tr>
                        </table>

                            
                      </figure>
                    </div>
                  </section>
                </div>
              </div>
            </div>
            <div style="height:30px;"></div>
          </div>
        </div>
      </div>
    </article>
    <!-- / content -->
    <!-- footer -->
    <? include("footer.php");?>
    <!-- / footer -->
  </div>
</div>
<script language="javascript" type="text/javascript">
function FrmChkInfo()
{
    form=document.frmShipInfo;
    form.HidContinueCheckout.value=1;
    form.submit();
    return true;
}    
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>