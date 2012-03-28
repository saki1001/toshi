<?php 
include("connect.php");
include("admin.cookie.php");
include_once("admin.config.inc.php");

$mlevel=11;
$count = 0;
$imageid = 0;
$LeftLinkSection = 1;
$pagetitle="Order";
$condition = "";
$condition2 = "";
$rname = "";
//$sel= "select * from ordermaster where ccname like '".$_GET["order"]."%'";
$sel= "select * from ordermaster where 1=1";
if($_GET['order'])
{
	$sel.= " and  fname like '".$_GET["order"]."%'";
}

if(isset($_REQUEST['searchby'])) 
{ 
	if(trim($_REQUEST['searchby']) == "Not delivered")
		$condition = " and ordermaster.orderstatus like 'Not delivered' "; 
	elseif(trim($_REQUEST['searchby']) == "Delivered")
		$condition = " and ordermaster.orderstatus like 'Delivered' "; 
	elseif(trim($_REQUEST['searchby']) == "Cancelled")
		$condition = " and ordermaster.orderstatus like 'Cancelled' "; 
	elseif(trim($_REQUEST['searchby']) == "Cancellation in process")
		$condition = " and ordermaster.orderstatus like 'Cancellation in process' "; 
	elseif(trim($_REQUEST['searchby']) == "Exchanged")
		$condition = " and ordermaster.orderstatus like 'Exchanged' "; 
	elseif(trim($_REQUEST['searchby']) == "In process")
		$condition = " and ordermaster.orderstatus like 'In process' "; 
	elseif(trim($_REQUEST['searchby']) == "Shipped")
		$condition = " and ordermaster.orderstatus like 'Shipped' "; 					
	elseif(trim($_REQUEST['searchby']) == "Returned")
		$condition = " and ordermaster.orderstatus like 'Returned' "; 
	elseif(trim($_REQUEST['searchby']) == "Returned to buyer")
		$condition = " and ordermaster.orderstatus like 'Returned to buyer' "; 	
	elseif(trim($_REQUEST['searchby']) == "Received")
		$condition = " and ordermaster.orderstatus like 'Received' "; 			
	elseif(trim($_REQUEST['searchby']) == "paid")
		$condition = " and ordermaster.ispaid='paid'"; 
	elseif(trim($_REQUEST['searchby']) == "notpaid")
		$condition = " and ordermaster.ispaid='notpaid'"; 
	else
		$condition = "";
} 
if(isset($_REQUEST['search'])) 
{ 
	$smonth = $_REQUEST['smonth'];
	$syear = $_REQUEST['syear'];
	$emonth = $_REQUEST['emonth'];
	$eyear = $_REQUEST['eyear'];
	
	$startdate = $syear."-".$smonth."-01";
	$enddate = $eyear."-".$emonth."-31";
	
	$condition2 = " and ordermaster.orderdate >='".$startdate."' and ordermaster.orderdate <='".$enddate."'";
} 
$sel= $sel.$condition.$condition2. " order by ordermaster.id desc"; //echo $sel,exit;
$result=$prs_pageing->number_pageing_admin_with_alldetail($sel,50,10,'Y','Y');
?>
<HTML>
<HEAD><title> <?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<SCRIPT language="javascript" src="body.js"></SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
</HEAD>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/login/logour-hover.jpg')">
<TABLE align="left" width="100%" cellpadding="0" cellspacing="0">
  <TBODY>
  <TR>
    <TD height=60 valign="top"  colspan="2">
		<? include("top.php") ?>
	  </td>
  </TR>  
  <tr>
   <td width="20%" valign="top" class="rightbdr" >
   	<? include("inner_left_admin.php"); ?>
	</td>
	<td width="80%" valign="top"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
        <TR>
          <TD width="100%" height="35" class=form111>Manage Order </TD>
        </TR>
        <tr>
          <td align="center"  class="formbg"><TABLE  width="100%"  border=0 align="center" cellPadding=2 cellSpacing=2>
              <TR>
                <TD align="center" width="100%" class="a-l"><?php echo $Message2 ; ?></TD>
              </TR>
              <TR>
                <TD background="images/vdots.gif"><IMG height=1 src="images/spacer.gif" width=1 border=0></TD>
              </TR>
              <tr>
                <TD><FORM  name="order" action="#" method="post">
                    <TABLE cellSpacing=0 cellPadding=1 border=0 >
                      <tr>
                        <td colspan="25" height="20"><b>View By User Name</b></td>
                      </tr>
                      <?=$prs_pageing->order();?>
                    </TABLE>
                    <br>
                    <TABLE cellSpacing=2 cellPadding=2 border=0 width="70%" >
                      <tr>
                        <td colspan="5" height="20">&nbsp;&nbsp;&nbsp; View :
                          <select onChange="gtg_submit();" name="searchby">
								<option value="0">All Orders</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Cancelled") { echo "selected='selected'"; } } ?> value="Cancelled">Cancelled Orders</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Cancellation in process") { echo "selected='selected'"; } } ?> value="Cancellation in process">Cancellation in process</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Delivered") { echo "selected='selected'"; } } ?> value="Delivered">Delivered orders</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Exchanged") { echo "selected='selected'"; } } ?> value="Exchanged">Exchanged</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "In process") { echo "selected='selected'"; } } ?> value="In process">In process</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Not delivered") { echo "selected='selected'"; } } ?>  value="Not delivered">Not delivered</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "notpaid") { echo "selected='selected'"; } } ?> value="notpaid">Not paid</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "paid") { echo "selected='selected'"; } } ?> value="paid">Paid orders</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Received") { echo "selected='selected'"; } } ?> value="Received">Received</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Returned") { echo "selected='selected'"; } } ?> value="Returned">Returned</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Returned to buyer") { echo "selected='selected'"; } } ?> value="Returned to buyer">Returned to buyer</option>
								<option <? if(isset($_REQUEST['searchby'])) { if($_REQUEST['searchby'] == "Shipped") { echo "selected='selected'"; } } ?> value="Shipped">Shipped</option>
						  </select>
                        </td>
                      </tr>
                      <tr>
                        <td width="17%" height="10px"></td>
                      </tr>
                      <tr>
                        <TD align="left"><font color="red">*</font>Start Date :</TD>
                        <TD width="83%"  colSpan=3>Month&nbsp;&nbsp;
                          <select name="smonth">
                            <option value="0">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                          &nbsp;&nbsp;Year&nbsp;&nbsp;
                          <select name="syear">
                            <option value="0">Select</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                          </select>
                        </TD>
                      </TR>
                      <TR>
                        <TD align="left"  ><font color="red">*</font>End Date :</TD>
                        <TD  colSpan=3>Month&nbsp;&nbsp;
                          <select name="emonth">
                            <option value="0">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                          &nbsp;&nbsp;Year&nbsp;&nbsp;
                          <select name="eyear">
                            <option value="0">Select</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                          </select>
                        </TD>
                      </tr>
                      <tr>
                        <td colspan="5" style="padding-top:5px;"><div align="left">
                            <input type="submit" onClick="return gtg_check_date();" name="search" value="Search Order" class="bttn-s">
                          </div></td>
                      </tr>
                    </TABLE>
                  </form>
                  <?php if($result[1]=="") { ?>
                  <table width="70%" border="0" cellspacing="1" cellpadding="1" align="center" >
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                          <tr>
                            <td class=th-a><div align="center" ><strong>No Order To Display</strong></div></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                  <?php } else { ?>
                  <FORM id="passionmanage" name="passionmanage"  method="post">
                    <input type="hidden" name="searchby" value="<? if(isset($_REQUEST['searchby'])) { echo $_REQUEST['searchby']; } ?>" >
                    <table  width="100%" border=0 cellspacing=0 cellpadding="0" class="t-b">
                      <tr>
						  <td align="right" height="30" colspan=6>
						  	 <? echo $result[1]; ?>
						  </td>
					  </tr>
					  <? if($_GET["msg"]) { ?>
                      <tr>
                        <TD colspan="6" class="a-l" align="center">
						 <span style="color:#FF0000;">
                          <?
								if($_GET["msg"]==1)
									echo "Order Deleted Successfully. ";
						  ?>
                         </span>
						 </TD>
                      </tr>
                      <? } ?>
                      <tr class="form_back">
                        <td width="10%"  height="26"  align="center" ><strong>Order Id</strong></td>
                        <td width="31%"  height="26"  align="left"><strong>User Name</strong></td>
                        <td width="13%" height="26"  align="center"><strong>Paid Status</strong></td>
                        <td width="16%" height="26"  align="center"><strong>Delivery Status</strong></td>
                        <td width="15%"  height="26"  align="center"><strong>Date</strong></td>
                        <td   align="center"><strong>Options</strong></td>
                      </tr>
                      <? while($get=mysql_fetch_object($result[0])) { $count++; ?>
                      <tr>
                        <td align="center"><?=$get->orderid;?>&nbsp;</td>
                        <td><? echo stripslashes($get->fname)." ".stripslashes($get->lname);?>&nbsp;</td>
                        <td align="center"><? echo ucfirst($get->ispaid); ?>&nbsp;</td>
                        <td align="center"><?= ucfirst(stripslashes($get->orderstatus)); ?>&nbsp;</td>
                        <td align="center"><?=date("m/d/Y",strtotime($get->orderdate));?>&nbsp;</td>
                        <input type="hidden" name="orderid<?=$count; ?>" value="<?=$get->id;?>" >
                        <td  align="center"nowrap width="15%" ><input name="button" type="button" class="bttn-s" onClick="window.location.href='add_order.php?id=<?php echo ($get->id); ?>&cid=<?php echo ($get->categoryid); ?>&mode=edit'" value="View">
                          <input name="button2" type="button" class="bttn-s" onClick="deleteconfirm('Are you sure you want to delete this <?=$pagetitle;?>?. \n','add_order.php?id=<?php echo($get->id); ?>&mode=delete');" value="Delete">
                        </td>
                      </tr>
                      <? } ?>
                      <input type="hidden" name="count" value="<?=$count; ?>" >
                    </table>
                  </FORM>
                  <?php } ?>
                </TD>
              </TR>
            </TABLE></td>
        </tr>
      </table></td>
	</tr>
  </TBODY>
</TABLE>
<script language="javascript">
function gtg_submit()
{
	window.document.order.submit();
}
function gtg_check_date()
{
	var flag = 0;
	var message = "Please enter \n";
	if(document.order.smonth.value == 0)
	{
		flag = 1;
		message = message + "start month \n";
	}
	if(document.order.syear.value == 0)
	{
		flag = 1;
		message = message + "start year \n";
	}
	if(document.order.emonth.value == 0)
	{
		flag = 1;
		message = message + "end month \n";
	}
	if(document.order.eyear.value == 0)
	{
		flag = 1;
		message = message + "end year \n";
	}
	
	if(flag == 1)
	{
		alert(message);
		return false;
	}
	else
	{
		if(document.order.syear.value > document.order.syear.value)
		{
			alert("Start date should be less than end date.");
			return false;
		}
		return true;
	}
}
</script>
</BODY></HTML>
