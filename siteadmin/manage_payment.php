<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php") ;
$mlevel=3;
$Error=0;
if(isset($_POST['Submit']))
{	
	$loginname=addslashes($_POST['loginname']);
	$tran_key =addslashes($_POST['tran_key']);
	$enable_pay=addslashes($_POST['enable_pay']);
	
	$query = "update paypalinfo set loginname='$loginname',tran_key='$tran_key',enable_pay='$enable_pay'";
	$result = mysql_query($query,$db);
	$Message = "Payment Info Changed Successfully"; 
}
$query = "select * from paypalinfo";
$result = mysql_query($query,$db);
$row = mysql_fetch_array($result);
$tran_key=stripslashes($row["tran_key"]);
$loginname=stripslashes($row["loginname"]);
$enable_pay=stripslashes($row["enable_pay"]);
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
	if(document.getElementById("enable_pay").checked==true && document.getElementById("loginname").value=="")
	{
		alert("Please enter login key.");
		document.getElementById("loginname").focus();
		return false;
	}
	if(document.getElementById("enable_pay").checked==true && document.getElementById("tran_key").value=="")
	{
		alert("Please enter transaction key.");
		document.getElementById("tran_key").focus();
		return false;
	}
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
                  <TD height="35" class="form111">Manage Payment Info</TD>
                </TR>
                <tr>
                  <td height="222" class="formbg" valign="top"><form name="addmaterial"  method=post enctype="multipart/form-data">
                      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 class="t-b">
                        <TR>
                          <TD class=a align=right colSpan=4 nowrap>* Required Information</TD>
                        </TR>
                        <? if($Message) { ?>
                        <TR>
                          <TD colSpan=4 align="center" vAlign=top><span class="a-l"><? echo  $Message; ?></span></TD>
                        </TR>
                        <? } ?>
                        <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Login Key :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="loginname" id="loginname" type="text"  class="solidinput" value="<?php echo $loginname; ?>" size="50"></TD>
                        </TR>
						  <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Transaction Key :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="tran_key" id="tran_key" type="text"  class="solidinput" value="<?php echo $tran_key; ?>" size="50"></TD>
                        </TR>
						  <TR>
                          <TD width="23%" height="25" align=right><strong><span class="a"></span> Enable Payment :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="enable_pay" type="checkbox" id="enable_pay" <? if($enable_pay=="Y") { ?> checked="checked" <? } ?>  class="solidinput" value="Y" ></TD>
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
