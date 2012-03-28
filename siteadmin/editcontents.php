<?php
  include_once("admin.config.inc.php");
  include("admin.cookie.php");
  include("connect.php");
  include("fckeditor/fckeditor.php") ;

$mlevel=4;
$id=$_GET['id'];
$contents2=$_POST['rte1'];
$contents=addslashes($contents2);
$name=addslashes($_POST['name']);
$msg="";
if($_POST["submit"])
{
	$sql="update staticpage set 
		content='$contents',
		name='$name' where id='$id'";
	$q=mysql_query($sql);
	$msg="Page Updated Successfully!";
}		
$qry="select * from staticpage where id=$id";
$rs=mysql_query($qry);
$arr=mysql_fetch_array($rs);
$pgnm=$arr["name"];
$pgdes=stripslashes($arr["content"]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<LINK 
href="main.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>
<script language="javascript">
function Chkblanck()
{
	if(document.addstonecolor.name.value.split(" ").join("")=="")
	{
		alert("Please enter title.");
		document.addstonecolor.name.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0">
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
                  <TD height="35" class=form111>Edit
                    <?=$pgnm;?>
                    Page</TD>
                </TR>
                <tr>
                  <td height="222" class="formbg" valign="top"><form name="addstonecolor"  method=post enctype="multipart/form-data">
                      <TABLE cellSpacing=2 cellPadding=2 width=98% border=0>
                        <? if($msg) {?>
                        <TR>
                          <TD colSpan=4 align="center"><font color="red"><? echo $msg;?></font></TD>
                        </TR>
                        <? } ?>
                        <TR>
                          <TD width="11%" height="25" align=right vAlign=top><strong>Title:</strong>&nbsp;</TD>
                          <TD width="89%" height="25" colSpan=3 vAlign=top><input type="text" name="name" id="name" value="<?=$pgnm?>" class="solidinput" style="width:600px;"> </TD>
                        </TR>
						<TR>
                          <TD width="11%" height="25" align=right vAlign=top class=dataLabel>&nbsp;</TD>
                          <TD height="25" colSpan=3 vAlign=top><?php
										$oFCKeditor = new FCKeditor('rte1') ;
										$oFCKeditor->BasePath = 'fckeditor/';
										$oFCKeditor->Value = $pgdes;
										$oFCKeditor->Height = 500;
										$oFCKeditor->Width = 700;
										$oFCKeditor->Create() ;
								?>
                          </TD>
                        </TR>
                        <TR>
                          <TD width="11%" height="25" align=right vAlign=top class=dataLabel>&nbsp;</TD>
                          <TD colSpan=3 align="left"><input name="submit" type="submit" value=" Edit Page " class="bttn-s" onClick="return Chkblanck();"></TD>
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
