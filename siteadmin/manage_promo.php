<?php 
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php") ;
$mlevel=11;
if($_GET["id"])
{	
	$cid=$_GET["id"];
	$dqry="delete from promotional where id=$cid";
	mysql_query($dqry);	
	header("location:manage_promo.php?msgs=2");
}
	$order=$_GET["order"];
	$strQueryPerPage="select * from promotional where promocode like '$order%' order by id desc ";
	
	$strResultPerPage=mysql_query($strQueryPerPage);
	$strTotalPerPage=mysql_affected_rows(); 
	
	if($strTotalPerPage<1)
	$Error = 1;
	
	if($_GET["msgs"]==1 && !$_GET["start"])
	{
		$Message2 = "Promotional Code Added Successfully!!";
	}
	if($_GET["msgs"]==3 && !$_GET["start"])
	{
		$Message2 = "Promotional Code Updated Successfully!!";
	}
	if($_GET["msgs"]==2 && !$_GET["start"])
	{
		$Message2 = "Promotional Code Deleted Successfully!!";
	}
?>
<HTML>
<HEAD><title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
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
      <TD width="100%" height="35" class=form111>Manage Promotional Code  </TD>
    </TR>
<tr><td align="center"  class="formbg">

<TABLE width="100%"  border=0 cellPadding=0 cellSpacing=0 align="left">
  <TBODY>
 	<TR> 
      <TD align="center" width="100%" class="a-l" > 
			  <font color="#FF0000"><?php echo $Message2 ; ?></font></TD>
    </TR>
	<TR>
    <TD background="images/vdots.gif"><IMG height=1 
      src="images/spacer.gif" width=1 border=0></TD>
</TR>
    <TD valign="top">
      
			  <FORM  name="order" action="#" method="post">
      <TABLE cellSpacing=0 cellPadding=1 border=0  >
        <TBODY>
		<tr><td colspan="25" height="20"><b>View By Promotional Code   </b></td>
		</tr>
		<TR>
          <TD><a class=la href="manage_promo.php">All</a></TD>
          <TD class=lg>|</TD>
                
          <TD><a class=la href="manage_promo.php?order=A">A</a></TD>
          <TD class=lg>|</TD>
          <TD><a class=la href="manage_promo.php?order=B">B</a></TD>
          <TD class=lg>|</TD>
          <TD><a class=la href="manage_promo.php?order=C">C</a></TD>
          <TD class=lg>|</TD>
          <TD><a class=la href="manage_promo.php?order=D">D</a></TD>
          <TD class=lg>|</TD>
          <TD><a class=la href="manage_promo.php?order=E">E</a></TD>
          <TD class=lg>|</TD>
		  <TD><A class=la href="manage_promo.php?order=F">F</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=G">G</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=H">H</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=I">I</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=J">J</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=K">K</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=L">L</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=M">M</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=N">N</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=O">O</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=P">P</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=Q">Q</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=R">R</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=S">S</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=T">T</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=U">U</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=V">V</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=W">W</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=X">X</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=Y">Y</A></TD>
          <TD class=lg>|</TD>
          <TD><A class=la href="manage_promo.php?order=Z">Z</A></TD>
     			</TR></TBODY></TABLE>
		</form>
		
	<?php if(!$strTotalPerPage) { ?>
				<table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
					<tr><td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
					<tr><td class=th-a><div align="center" ><strong>No Promotional Code  To Display</strong></div></td></tr>
				</table></td></tr></table>
<?php } else { ?>
				
          <FORM id="passionmanage" name="passionmanage"  method="post">
            <table width="100%" border=0 cellspacing=1 cellpadding="1" class="t-b">
              <tbody>
                <!--DWLayoutTable-->
                <tr>
                  <td align="right" height="30" colspan=12>
				  <? $result=$prs_pageing->number_pageing($strQueryPerPage,20,10);?></td>
                </tr>
                <tr class="form_back">
                  <td width="19%"  align="left" nowrap><strong>Promotional Code </strong></td>
				  <td width="21%"  align="left"><strong>Notes</strong></td>
				  <td width="10%"  align="center" nowrap><strong>Discount</strong></td>
				  <td width="11%"  align="center" ><strong>Minimum Cart Value</strong></td>
				  <td width="21%" align="center"><strong>Expires</strong></td>
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
                 <td align="left"><? echo stripslashes($row->promocode); ?>&nbsp;</td>
				 <td align="left"><? echo stripslashes($row->notes); ?>&nbsp;</td>
				 <td align="center"><? if($row->disctype=="D"){ echo "$";}else{echo "%";} ?> <? echo stripslashes($row->discamt); ?>&nbsp;</td>
				 <td align="center"><? if($row->min_val!=""){echo "$ ".stripslashes($row->min_val);} ?>&nbsp;</td>
				 <td align="center"><? echo stripslashes($row->expires); ?>&nbsp;</td>
				 <td  align="center" nowrap width="18%" ><?php /*?><input name="button" type="button" onClick="window.location.href='promo_orders.php?id=<?php echo $row->id; ?>'" value=" View Orders " class="bttn-s">&nbsp;<?php */?>
				   <input name="button" type="button" onClick="window.location.href='add_promo.php?id=<?php echo $row->id; ?>'" value=" Edit " class="bttn-s">&nbsp;<input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete promotional code. \n','manage_promo.php?id=<?php echo($row->id); ?>');" value="Delete" class="bttn-s"></td>
                </tr>
                  <? } ?>
		      </tbody>
            </table>
          </FORM>
	<?php } ?>
	  <!--/content--></TD></TR></TABLE></td></tr>
</table></td>
	</tr>
  </TBODY>
</TABLE>
</BODY></HTML>