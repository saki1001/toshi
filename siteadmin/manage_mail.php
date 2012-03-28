<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php") ;
$mlevel=3;
$Error=0;
if(isset($_POST['Submit']))
{	
	$adminmail=addslashes($_POST['adminmail']);$reviewmail=addslashes($_POST['reviewmail']);
	$customermail=addslashes($_POST['customermail']);
	$ordermail=addslashes($_POST['ordermail']);
	
	$query = "update admin set ordermail='$ordermail',customermail='$customermail',adminmail='$adminmail',reviewmail='$reviewmail'";
	$result = mysql_query($query,$db);
	$Message = "Email Addresses Changed Successfully"; 
}
$query = "select * from admin";
$result = mysql_query($query,$db);
$row = mysql_fetch_array($result);
$adminmail=stripslashes($row["adminmail"]);
$ordermail=stripslashes($row["ordermail"]);
$customermail=stripslashes($row["customermail"]);$reviewmail=stripslashes($row["reviewmail"]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<LINK 
href="main.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>
<script>
function valid()
{
	form=document.addmaterial;
	/*if(form.adminmail.value=="")
	{
		alert("Please enter admin email address.");
		form.adminmail.focus();
		return false;
	}	
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.adminmail.value)))
	{
			alert("Please enter a proper admin email address.");
			form.adminmail.focus();
			return false;
	}	
	else if(form.customermail.value=="")
	{
		alert("Please enter contact email address.");
		form.customermail.focus();
		return false;
	}	
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.customermail.value)))
	{
			alert("Please enter a proper customer email address.");
			form.customermail.focus();
			return false;
	}	
	else if(form.ordermail.value=="")
	{
		alert("Please enter order email address.");
		form.ordermail.focus();
		return false;
	}	
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.ordermail.value)))
	{
			alert("Please enter a proper order email address.");
			form.ordermail.focus();
			return false;
	}
	else if(form.reviewmail.value=="")
	{
		alert("Please enter `refer a friend` email address.");
		form.reviewmail.focus();
		return false;
	}	
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.reviewmail.value)))
	{
			alert("Please enter a proper order email address.");
			form.reviewmail.focus();
			return false;
	}	*/
	return  true;
}
</script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<table align="left" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="75"><? include ("top.php"); ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY >
          <tr>
            <td width="20%"  valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
            </td>
            <td width="80%" valign="top" align="center"><TABLE width="100%"  border=0 cellpadding="2" cellspacing="2">
                <TR>
                  <TD height="35" class="form111">Manage E-Mail Address</TD>
                </TR>
                <tr>
                  <td height="222" class="formbg" valign="top"><form name="addmaterial"  method=post enctype="multipart/form-data">
                      <TABLE cellSpacing=2 cellPadding=2 width=98% border=0 class="t-b">
                        <TR>
                          <TD class=a align=right colSpan=4 nowrap>* Required Information</TD>
                        </TR>
                        <? if($Message) { ?>
                        <TR>
                          <TD colSpan=4 align="center" vAlign=top><span class="a-l"><? echo  $Message; ?></span></TD>
                        </TR>
                        <? } ?>
                        <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Admin E-Mail :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="adminmail" type="text"  class="solidinput" value="<?php echo $adminmail; ?>" size="50">&nbsp;(For all outgoing mails related to sign up and forgot password)</TD>
                        </TR>
						  <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Contact E-Mail :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="customermail" type="text"  class="solidinput" value="<?php echo $customermail; ?>" size="50">&nbsp;(For all outgoing mails related to contact and feedback)</TD>
                        </TR>
						
						 <?php /*?>
						   <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Order E-Mail :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="ordermail" type="text"  class="solidinput" value="<?php echo $ordermail; ?>" size="50">&nbsp;(For all outgoing mails related to orders)</TD>
                        </TR>
						 <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Refer A Friend E-Mail :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="reviewmail" type="text"  class="solidinput" value="<?php echo $reviewmail; ?>" size="50">&nbsp;(For all outgoing mails related to Refer A Friend)</TD>
                        </TR><?php */?>
                        <TR>
                          <TD colSpan=4>&nbsp;</TD>
                        </TR>
                        <TR>
                          <TD align=right>&nbsp;</TD>
                          <TD width="77%" colspan="3"><INPUT type=submit name="Submit" class="bttn-s" value="Update" onClick="return valid();">
                          </TD>
                        </TR>
                        <TR>
                          <TD colSpan=4><P>&nbsp;</P>
                            <P>&nbsp;</P></TD>
                        </TR>
                      </TABLE>
                    </FORM></td>
                </tr>
              </TABLE></td>
          </tr>
        </TBODY>
      </TABLE></td>
  </tr>
</table>
</BODY>
</HTML>
