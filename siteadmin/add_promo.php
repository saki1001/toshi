<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php") ;

$mlevel=11;
if(isset($_POST['Submit']))
{
		$expires = $_POST['year']."-".$_POST['mon']."-".$_POST['day']." ".$_POST['hour'].":".$_POST['minute'];
		
		if($_GET['id'])
		{
			$sql="UPDATE promotional  SET
				  promocode='".addslashes($_POST["promocode"])."',
				  disctype='".addslashes($_POST["disctype"])."',
				  discamt='".addslashes($_POST["discamt"])."',
				  one_time='".addslashes($_POST["one_time"])."',
				  expires='".$expires."',
				  min_val='".addslashes($_POST["min_val"])."',
				  notes='".addslashes($_POST["notes"])."'
				   WHERE id='".$_GET['id']."'";
			$q=mysql_query($sql);
			header("location:manage_promo.php?msgs=3");
		}
		else
		{
			$sql="INSERT INTO promotional  SET
				  promocode='".addslashes($_POST["promocode"])."',
				  disctype='".addslashes($_POST["disctype"])."',
				  discamt='".addslashes($_POST["discamt"])."',
				  one_time='".addslashes($_POST["one_time"])."',
				  expires='".$expires."',
				  min_val='".addslashes($_POST["min_val"])."',
				  notes='".addslashes($_POST["notes"])."'";	
			$q=mysql_query($sql);
			header("location:manage_promo.php?msgs=1");
		}	
}
if($_GET['id'])
{
	$Buttitle="Edit";
	$SEL="SELECT * from promotional where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
	$expires = explode(" " ,$ROW->expires);
	list($year, $mon, $day) = explode("-",$expires[0]);
	list($hour, $minute) = explode(":",$expires[1]);
	$min_val=$ROW->min_val;
	$max_val=$ROW->max_val;
}
else
{
	$Buttitle="Add";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<LINK href="main.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="body.js"></SCRIPT>
<script>
function valid()
{
	form=document.addprod;
	
	if(form.promocode.value.split(" ").join("")=="")
	{
		alert("Please enter promotional code.");
		form.promocode.focus();
		return false;
	}	
		
	/*
	if(form.min_val.value.split(" ").join("")=="")
	{
		alert("Please enter minimum cart value.");
		form.min_val.focus();
		return false;
	}
	if(isNaN(form.min_val.value.split(" ").join("")))
	{
		alert("Please enter numeric value for minimum cart amount.");
		form.min_val.value="";
		form.min_val.focus();
		return false;
	}if(form.max_val.value.split(" ").join("")=="")
	{
		alert("Please enter maximum cart value.");
		form.max_val.focus();
		return false;
	}
	if(isNaN(form.max_val.value.split(" ").join("")))
	{
		alert("Please enter numeric value for maximum cart amount.");
		form.max_val.value="";
		form.max_val.focus();
		return false;
	}
	if(eval(form.max_val.value)<eval(form.min_val.value))
	{
		alert("Invalied maximum cart value.");
		form.max_val.focus();
		return false;
	}	*/
	
	if(form.discamt.value.split(" ").join("")=="")
	{
		alert("Please enter discount amount.");
		form.discamt.focus();
		return false;
	}
	if(isNaN(form.discamt.value.split(" ").join("")))
	{
		alert("Please enter numeric value for discount.");
		form.discamt.value="";
		form.discamt.focus();
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
                  <TD height="35" class=form111><? echo $Buttitle;?> Promotional Code </TD>
                </TR>
                <tr>
                  <td height="222" class="formbg" valign="top"><form name="addprod"  method=post enctype="multipart/form-data">
                      <TABLE cellSpacing=2 cellPadding=2 width=98% border=0 class="t-b">
                        <TR>
                          <TD colSpan=2></TD>
                          <TD class=a align=right colSpan=2 nowrap>*= Required Information</TD>
                        </TR>
                        <TR>
                          <TD width="31%" height="25" align=right vAlign=top><strong><span class="a">*</span> Promotional Code :&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="promocode" value="<? echo htmlentities(stripslashes($ROW->promocode));?>" type="text" size="30" class="solidinput"></TD>
                        </TR>
						<tr> 
						<td align="right" ><strong>One Time Use :&nbsp;</strong></td>
						<td align="left"><input type="radio" name="one_time" class="1solidinput" value="N"  <? if($ROW->one_time=="N"){ echo "checked";}?> checked>
						  No &nbsp; <input type="radio" name="one_time" class="1solidinput" value="Y" <? if($ROW->one_time=="Y"){ echo "checked";}?>>
						  Yes</td>
					  </tr>
                        <tr>
                          <td align="right"><strong>Expires :&nbsp;</strong></td>
                          <td align="left" colSpan=3 ><select name="mon" class="solidinput">
                              <option>Month</option>
                              <? echo getMonth($mon);?>
                            </select>
                            <select name="day" class="solidinput">
                              <option>Day</option>
                              <? echo getDayValue($day);?>
                            </select>
                            <select name="year" class="solidinput">
                              <option>Year</option>
                              <? echo expYear($year);?>
                            </select>
                            &nbsp;
                            <select name="hour" class="solidinput">
                              <option>Hour</option>
                              <? echo expHour($hour);?>
                            </select>
                            :
                            <select name="minute" class="solidinput">
                              <option>Minute</option>
                              <? echo expMin($minute);?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td align="right" ><strong>Minimum Cart Value:&nbsp;</strong></td>
                          <td align="left" colSpan=3 vAlign=top><input type="text" name="min_val" value="<? echo $min_val;?>" size="10" class="solidinput">
                            &nbsp;
                            <?php /*?>&nbsp;&nbsp;<strong>Maximum Cart Value:&nbsp;</strong>
                            <input type="text" name="max_val" value="<? echo $max_val;?>" size="10" class="solidinput"><?php */?>
                          </td>
                        </tr>
                        <TR>
                          <TD width="31%" height="25" align=right vAlign=top><strong>Discount Type:&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input type="radio" name="disctype" value="D" class="solidinput" <? if($ROW->disctype=="D"){ echo "checked";}?> checked="checked">
                            $&nbsp;&nbsp;
                            <input type="radio" name="disctype" value="P" class="solidinput" <? if($ROW->disctype=="P"){ echo "checked";}?>>
                            % </TD>
                        </TR>
                        <TR>
                          <TD width="31%" height="25" align=right vAlign=top><strong><span class="a">*</span> Discount:&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="discamt" value="<? echo htmlentities(stripslashes($ROW->discamt));?>" type="text" size="15" class="solidinput"></TD>
                        </TR>
						<TR>
                          <TD width="31%" height="25" align=right vAlign=top><strong>Notes:&nbsp;</strong></TD>
                          <TD height="25" colSpan=3 vAlign=top><input name="notes" value="<? echo htmlentities(stripslashes($ROW->notes));?>" type="text" size="75" class="solidinput"></TD>
                        </TR>
                        <TR>
                          <TD align=right>&nbsp;</TD>
                          <TD width="33%"><INPUT type=submit name="Submit" value="<? echo $Buttitle;?> Promotional Code" onClick="return valid();" class="bttn-s">
                          </TD>
                          <TD width="14%" align=right>&nbsp;</TD>
                          <TD width="22%">&nbsp;</TD>
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
