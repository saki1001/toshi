<?
include("../../connect.php");
//Ppp
$pmcode=addslashes($_REQUEST['pmcode']);
$_SESSION['promocode']=$pmcode;
$_SESSION['discount']=0;
$_SESSION['promotype']="";
$pmamt=0;

$pquery="SELECT * from promotional where promocode='".$pmcode."'";
$pres=mysql_query($pquery);
if(mysql_affected_rows()>0)
{
    $prow=mysql_fetch_array($pres);
    
        if($prow['one_time']=="N")
        {
                    $curdt=date("Y-m-d h:m:s"); 
                    if($prow['expires']=="0000-00-00 00:00:00" || $prow['expires']=="")
                    {
                        //////////valied
                            $return=1;
                            $ptype=($prow['disctype']=="D") ? "$" : "%";
                            $pmamt=($prow['disctype']=="D") ? $prow['discamt'] : $prow['discamt']*$_SESSION['total']/100;
                            $_SESSION['disctype']=$ptype;
                            $_SESSION['discamt']=$prow['discamt'];
                    }
                    else if($prow['expires']!="" && $prow['expires']!="0000-00-00 00:00:00" && $prow['expires']>$curdt)
                    {
                        //////////valied
                        $return=1;
                        $ptype=($prow['disctype']=="D") ? "$" : "%";
                        $pmamt=($prow['disctype']=="D") ? $prow['discamt'] : $prow['discamt']*$_SESSION['total']/100;
                        $_SESSION['disctype']=$ptype;
                        $_SESSION['discamt']=$prow['discamt'];
                    }
                    else
                    {
                        ////////expired
                        $return=-1;
                        $_SESSION['promocode']="";
                    }
        }
        else
        {
        ///////////////////chk if the promo is used or not
            if($prow['usage']>0)
            {
                /////////Promocode not available for this cart amount
                $return=-3;    
            }
            else
            {
                $curdt=date("Y-m-d h:m:s"); 
                if($prow['expires']=="0000-00-00 00:00:00" || $prow['expires']=="")
                {
                    //////////valied
                    $return=1;
                    $ptype=($prow['disctype']=="D") ? "$" : "%";
                    $pmamt=($prow['disctype']=="D") ? $prow['discamt'] : $prow['discamt']*$_SESSION['total']/100;
                    $_SESSION['disctype']=$ptype;
                    $_SESSION['discamt']=$prow['discamt'];
                }
                else if($prow['expires']!="" && $prow['expires']!="0000-00-00 00:00:00" && $prow['expires']>$curdt)
                {
                    //////////valied
                    $return=1;
                    $ptype=($prow['disctype']=="D") ? "$" : "%";
                    $pmamt=($prow['disctype']=="D") ? $prow['discamt'] : $prow['discamt']*$_SESSION['total']/100;
                    $_SESSION['disctype']=$ptype;
                    $_SESSION['discamt']=$prow['discamt'];
                }
                else
                {
                    ////////expired
                    $return=-1;
                    $_SESSION['promocode']="";
                }
            }    
        }    
        
    
}
else
{
    $_SESSION['promocode']="";
}

$_SESSION['discount']=int_to_Decimal($pmamt);
$_SESSION['finaltotal']=int_to_Decimal($_SESSION['total'])+int_to_Decimal($_SESSION['ShippingCharge'])-int_to_Decimal($_SESSION['discount']);
if($return<0) $pmamt=$return;
echo $pmamt;
?>