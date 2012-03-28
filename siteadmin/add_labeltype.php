<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=3;
$Message="";
if($_REQUEST['del']!="")
{
	$qrr=$_REQUEST['del'].'= \'\'' ;
	//echo "UPDATE products SET $qrr where id='".trim($_GET['id'])."'";
	$sql=mysql_query("UPDATE labeltype SET $qrr where id='".trim($_GET['id'])."'");	
	header("location:add_labeltype.php?id=".$_REQUEST['id']);
	exit;
}

if(isset($_POST['Submit']))
{
	if($_GET['id'])
	{
		$strQueryPerPage="select * from labeltype where name='".addslashes($_POST["name"])."' and  id!=".$_GET['id'];
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="UPDATE labeltype SET 
				name='".addslashes($_POST["name"])."'
				WHERE id='".$_GET['id']."'";
			$q=mysql_query($sql,$db);
			header("location:manage_labeltype.php?msgs=3");
		}
		else 
		{
			$Message="Label Type already exists.";
		}
	}
	else
	{
		$strQueryPerPage="select * from labeltype where name='".addslashes($_POST["name"])."'";
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="INSERT INTO labeltype SET 
					name='".addslashes($_POST["name"])."'";	
			$q=mysql_query($sql,$db);
			$insertedid=mysql_insert_id();
			
			header("location:manage_labeltype.php?msgs=1");
			exit;
		}
		else 
		{
			$Message="Label Type already exists.";
		}
	}	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from labeltype where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
}
else
{
	$Buttitle="Add";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<link href="main.css" name=text/css rel=stylesheet />
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<script language=javascript src="body.js"></script>
<script language="Javascript" name="text/JavaScript" src="calendar.js"></script>
<script language="javascript" name="text/javascript">
function valid()
{
	form=document.addprod;
	
	if(form.name.value.split(" ").join("")=="")
	{
		alert("Please enter Label Type.");
		form.name.focus();
		return false;
	}	
	else
	{
		return  true;	
	}	
}
</script>
<table align="left" width="100%" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="75"><? include ("top.php"); ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table cellspacing="0" cellpadding="0" width="100%" border=0>
        <tbody >
          <tr>
            <td width="20%"  valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
            </td>
            <td width="80%" valign="top" align="center"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
                <tr>
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Label Type</td>
                </tr>
                <tr>
                  <td height="222" class="formbg" valign="top">
				  	<form name="addprod" id="addprod"  method="post" enctype="multipart/form-data" action="#">
                      <table cellspacing="2" cellpadding="2" width=98% border="0" class="t-b">
                        <tr>
                         <td class="a" align="right" colspan="4">*= Required Information</td>
                        </tr>
						<? if($Message){?>
						<tr>
                         <td class="a" align="center" colspan="4"><?=$Message;?>&nbsp;</td>
                        </tr>
						<? }?>
						
                        <tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Label Type:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="name" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->name));?>" type="text"  class="solidinput"></td>
                        </tr>
                        
                        <tr>
                          <td align="right">&nbsp;</td>
                          <td width="79%" colspan="3"><INPUT type=submit name="Submit" value="<? echo $Buttitle;?>" onClick="return valid();" class="bttn-s">                          </td>
                        </tr>
                      </table>
                    </form></td>
                </tr>
              </table></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
</table>
</body>
</html>