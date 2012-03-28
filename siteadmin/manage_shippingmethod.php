<?php 
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php") ;
$mlevel=6;
if($_GET["id"])
{	
	$cid=$_GET["id"];
	$dqry="delete from shippingmethoad where id=$cid";
	mysql_query($dqry);	
	header("location:manage_shippingmethod.php?msgs=2");
}
	$order=$_GET["order"];
	$strQueryPerPage="select * from shippingmethoad where methoad like '$order%' order by id desc ";
	
	$strResultPerPage=mysql_query($strQueryPerPage);
	$strTotalPerPage=mysql_affected_rows(); 
	
	if($strTotalPerPage<1)
	$Error = 1;
	
	if($_GET["msgs"]==1 && !$_GET["start"])
	{
		$Message2 = "Shipping Method Added Successfully!!";
	}
	if($_GET["msgs"]==3 && !$_GET["start"])
	{
		$Message2 = "Shipping Method Updated Successfully!!";
	}
	if($_GET["msgs"]==2 && !$_GET["start"])
	{
		$Message2 = "Shipping Method Deleted Successfully!!";
	}
?>
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<script language="javascript" src="body.js"></script>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body bgColor=#ffffff leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<table align="left" width="100%" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>
      <td height=60 valign="top"  colspan="2"><? include("top.php") ?>
      </td>
    </tr>
    <tr>
      <td width="20%" valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
      </td>
      <td width="80%" valign="top"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
          <tr>
            <td width="100%" height="35" class=form111>Manage Shipping Method </td>
          </tr>
          <tr>
            <td align="center"  class="formbg"><table width="100%"  border=0 cellPadding=0 cellSpacing=0 align="left">
                <tbody>
                  <?php /*?><tr>
		<td align="right" height="20" valign="bottom">
		<INPUT type=submit name="Submit" value="Add Shipping Method" onClick="window.location.href='add_shippingmethod.php'" class="bttn-a">&nbsp;&nbsp;
		</td>
	  </tr><?php */?>
                  <tr>
                    <td align="center" width="100%" class="a-l" ><font color="#FF0000"><?php echo $Message2 ; ?></font></td>
                  </tr>
                  <tr>
                    <td background="images/vdots.gif"><IMG height=1 
      src="images/spacer.gif" width=1 border=0></td>
                  </tr>
                <td valign="top"><form  name="order" action="#" method="post">
                      <table cellSpacing=0 cellPadding=1 border=0  >
                        <tbody>
                          <tr>
                            <td colspan="25" height="20"><b>View By Shipping Method </b></td>
                          </tr>
                          <tr>
                            <td><a class=la href="manage_shippingmethod.php">All</a></td>
                            <td class=lg>|</td>
                            <td><a class=la href="manage_shippingmethod.php?order=A">A</a></td>
                            <td class=lg>|</td>
                            <td><a class=la href="manage_shippingmethod.php?order=B">B</a></td>
                            <td class=lg>|</td>
                            <td><a class=la href="manage_shippingmethod.php?order=C">C</a></td>
                            <td class=lg>|</td>
                            <td><a class=la href="manage_shippingmethod.php?order=D">D</a></td>
                            <td class=lg>|</td>
                            <td><a class=la href="manage_shippingmethod.php?order=E">E</a></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=F">F</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=G">G</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=H">H</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=I">I</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=J">J</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=K">K</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=L">L</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=M">M</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=N">N</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=O">O</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=P">P</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=Q">Q</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=R">R</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=S">S</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=T">T</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=U">U</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=V">V</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=W">W</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=X">X</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=Y">Y</A></td>
                            <td class=lg>|</td>
                            <td><A class=la href="manage_shippingmethod.php?order=Z">Z</A></td>
                                  </tr>
                        </tbody>
                      </table>
                    </form>
                    <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>No Shipping Method To Display</strong></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <?php } else { ?>
                    <form id="passionmanage" name="passionmanage"  method="post">
                      <table width="100%" border=0 cellspacing=1 cellpadding="1" class="t-b">
                        <tbody>
                          <!--DWLayoutTable-->
                          <tr>
                            <td align="right" height="30" colspan=12><? $result=$prs_pageing->number_pageing($strQueryPerPage,20,10);?></td>
                          </tr>
                          <tr class="form_back">
                            <td width="19%"  align="left" nowrap><strong>Shipping Method </strong></td>
                            <td width="21%"  align="left"><strong>Charge</strong></td>
                            <td width="18%" align="center"><strong>Options</strong></td>
                          </tr>
                          <?
				$k=0;
			  while($row =mysql_fetch_object($result))
        	  {
					$k=$k+1;
					$id=$row->id;
					
					if($colorflg==1)
					{ 
						$colorflg=0;
			  ?>
                          <tr>
                            <? } ?>
                            <td align="left"><? echo stripslashes($row->methoad); ?>&nbsp;</td>
                            <td align="left">$<? echo stripslashes($row->charge); ?>&nbsp;</td>
                            <td  align="center" nowrap width="18%" ><?php /*?><input name="button" type="button" onClick="window.location.href='promo_orders.php?id=<?php echo $row->id; ?>'" value=" View Orders " class="bttn-s">&nbsp;<?php */?>
                              <input name="button" type="button" onClick="window.location.href='add_shippingmethod.php?id=<?php echo $row->id; ?>'" value=" Edit " class="bttn-s">
                              &nbsp;
                              <input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete Shipping Method. \n','manage_shippingmethod.php?id=<?php echo($row->id); ?>');" value="Delete" class="bttn-s"></td>
                          </tr>
                          <? } ?>
                        </tbody>
                      </table>
                    </form>
                    <?php } ?>
                    <!--/content--></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>