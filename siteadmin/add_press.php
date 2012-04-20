<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
include("fckeditor/fckeditor.php") ;
$mlevel=3;
$Message="";
if(isset($_POST['Submit']))
{
	$contents2=$_POST['rte1'];
	$contents=addslashes($contents2);
	$date_display=mdy_to_ymd($_POST['date_display']);
	
	if($_GET['id'])
	{
		$strQueryPerPage="select * from press where name='".addslashes($_POST["name"])."' and date_display='".$_POST["date_display"]."' and  id!=".$_GET['id'];
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="UPDATE press SET 
				name='".addslashes($_POST["name"])."',
				shortdesc='".addslashes($_POST["shortdesc"])."',
				linktosite='".addslashes($_POST["linktosite"])."',
				author='".addslashes($_POST["author"])."',
				publication='".addslashes($_POST["publication"])."',
				date_display='".addslashes($date_display)."',				
				description='".$contents."' $extsql2
				WHERE id='".$_GET['id']."'";
			$q=mysql_query($sql,$db);
			
			if($_FILES['picture']['tmp_name']!="")
			{
				$SourcePath=$_FILES['picture']['tmp_name'];
				$FileName=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['picture']['name']);
				$FileName=rand()."presspdf_".$FileName;
				$ImgPath="../presspdf/".$FileName;
				$exqry="picture='$FileName'";				
				copy($SourcePath,$ImgPath);
				
				$AddUserQry="UPDATE press set $exqry WHERE id='".$_GET['id']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			if($_FILES['thumbnail']['tmp_name']!="")
			{
				$SourcePath=$_FILES['thumbnail']['tmp_name'];
				$FileName=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['thumbnail']['name']);
				$FileName=rand()."thumbnail_".$FileName;
				$ImgPath="../presspdf/".$FileName;
				$exqry="thumbnail='$FileName'";				
				copy($SourcePath,$ImgPath);
				
				$AddUserQry="UPDATE press set $exqry WHERE id='".$_GET['id']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			
			header("location:manage_press.php?msgs=3");
		}
		else 
		{
			$Message="Press already exists.";
		}
	}
	else
	{
		$strQueryPerPage="select * from press where name='".addslashes($_POST["name"])."' and date_display='".$_POST["date_display"]."' ";
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="INSERT INTO press SET 
					name='".addslashes($_POST["name"])."',
					shortdesc='".addslashes($_POST["shortdesc"])."',
					linktosite='".addslashes($_POST["linktosite"])."',
					author='".addslashes($_POST["author"])."',
					publication='".addslashes($_POST["publication"])."',
					date_display='".addslashes($date_display)."',				
					date_added=curdate(),
					picture='".$filename_img."',
					description='".$contents."' ";	
			$q=mysql_query($sql,$db);
			$Insertedid=mysql_insert_id();
			
			if($_FILES['picture']['tmp_name']!="")
			{
				$SourcePath=$_FILES['picture']['tmp_name'];
				$FileName=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['picture']['name']);
				$FileName=rand()."presspdf_".$FileName;
				$ImgPath="../presspdf/".$FileName;
				$exqry="picture='$FileName'";				
				copy($SourcePath,$ImgPath);
				
				$AddUserQry="UPDATE press set $exqry WHERE id='".$Insertedid."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			if($_FILES['thumbnail']['tmp_name']!="")
			{
				$SourcePath=$_FILES['thumbnail']['tmp_name'];
				$FileName=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['thumbnail']['name']);
				$FileName=rand()."thumbnail_".$FileName;
				$ImgPath="../presspdf/".$FileName;
				$exqry="thumbnail='$FileName'";				
				copy($SourcePath,$ImgPath);
				
				$AddUserQry="UPDATE press set $exqry WHERE id='".$Insertedid."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			
			header("location:manage_press.php?msgs=1");
			exit;
		}
		else 
		{
			$Message="Press already exists.";
		}
	}	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from press where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
	$pgdes=stripslashes($ROW->description);
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
	
	if(form.date_display.value.split(" ").join("")=="")
	{
		alert("Please select date.");
		form.date_display.focus();
		return false;
	}	
	else if(form.name.value.split(" ").join("")=="")
	{
		alert("Please enter title.");
		form.name.focus();
		return false;
	}	
	else
	{
		return  true;	
	}	
}
</script>
<link rel="stylesheet" href="dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
<script type="text/javascript" src="dhtmlgoodies_calendar.js?random=20060118"></script>
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
                  <td height="35" class="form111"><strong><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> News &amp; Press </strong></td>
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
                          <td width="19%" height="25" align="right" valign="top"><strong><span class="a">*</span> Date:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <? if($ROW->date_display!='' && $ROW->date_display!='0000-00-00'){$date_display=ymd_to_mdy($ROW->date_display);}else{$date_display='';}?>
						  <input name="date_display" id="date_display" readonly="true" style="width:100px;"  value="<? echo stripslashes($date_display);?>" type="text"  class="solidinput">
						  <img src="images/calendar.gif" align="absmiddle" border="0" onClick="displayCalendar(document.addprod.date_display,'mm/dd/yyyy',this);" style="cursor:pointer;"></td>
                        </tr>
                        <tr>
                          <td width="19%" height="25" align="right" valign="top"><strong><span class="a">*</span> Title:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="name" id="name" style="width:570px;"  value="<? echo htmlentities(stripslashes($ROW->name));?>" type="text"  class="solidinput"></td>
                        </tr>
						 <tr>
                          <td width="19%" height="25" align="right" valign="top"><strong><span class="a">*</span>Summary of article:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><textarea name="shortdesc" id="shortdesc" style="width:570px;height:150px;" class="solidinput"><? echo stripslashes($ROW->shortdesc);?></textarea></td>
                        </tr>
						<tr>
                          <td width="19%" height="25" align="right" valign="top"><strong>Source Link:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="linktosite" id="linktosite" style="width:570px;"  value="<? echo htmlentities(stripslashes($ROW->linktosite));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="19%" height="25" align="right" valign="top"><strong>Author:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="author" id="author" style="width:570px;"  value="<? echo htmlentities(stripslashes($ROW->author));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="19%" height="25" align="right" valign="top"><strong>Publication:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="publication" id="publication" style="width:570px;"  value="<? echo htmlentities(stripslashes($ROW->publication));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="19%" height="25" align="right" valign="top" style="padding-bottom:8px;"><strong><span class="a"></span> Thumbnail Image:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="bottom">
						  <input name="thumbnail" type="file" class="buttonclass" id="thumbnail" />
						  <? if(trim($ROW->thumbnail)!="") { ?>
						  <br>Current Thumbnail Image: <a  href="../presspdf/<?=$ROW->thumbnail;?>" target="_blank" ><?=$ROW->thumbnail;?></a>						  
						  <? } ?>
						  <input type="hidden" id="thumbnail_old" name="thumbnail_old" value="<? echo $ROW->thumbnail; ?>"></td>
                        </tr>
						<tr>
                          <td width="19%" height="25" align="right" valign="top" style="padding-bottom:8px;"><strong><span class="a"></span> Upload Pdf:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="bottom">
						  <input name="picture" type="file" class="buttonclass" id="picture" />
						  <? if(trim($ROW->picture)!="") { ?>
						  <br>Current PDF: <a  href="../presspdf/<?=$ROW->picture;?>" target="_blank" ><?=$ROW->picture;?></a>						  
						  <? } ?>
						  <input type="hidden" id="picture_old" name="picture_old" value="<? echo $ROW->picture; ?>"></td>
                        </tr>
                        <tr>
                          <td width="19%" height="25" align=right vAlign=top ><strong>Description:</strong> &nbsp;</td>
                          <td height="25" colSpan=3 vAlign=top><?php
										$oFCKeditor = new FCKeditor('rte1') ;
										$oFCKeditor->BasePath = 'fckeditor/';
										$oFCKeditor->Value = $pgdes;
										$oFCKeditor->Height = 400;
										$oFCKeditor->Width = 600;
										$oFCKeditor->Create() ;
								?>
                          </td>
                        </tr> 
                        <tr>
                          <td align="right">&nbsp;</td>
                          <td width="81%" colspan="3"><INPUT type=submit name="Submit" value="<? echo $Buttitle;?>" onClick="return valid();" class="bttn-s">                          </td>
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