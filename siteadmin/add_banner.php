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
	$sql=mysql_query("UPDATE banners SET $qrr where id='".trim($_GET['id'])."'");	
	header("location:add_banner.php?id=".$_REQUEST['id']);
	exit;
}

if(isset($_POST['Submit']))
{
	if($_GET['id'])
	{
			$sql="UPDATE banners SET 
					title='".addslashes($_POST["title"])."',
					url='".addslashes($_POST["url"])."',
					description='".addslashes($_POST["description"])."',
					position='".addslashes($_POST["position"])."' where id='".trim($_REQUEST['id'])."'";	
			$q=mysql_query($sql);
			$Insertedid=trim($_REQUEST['id']);
		
			if($_FILES['image']['tmp_name']!="")
			{
				$SourcePath=$_FILES['image']['tmp_name'];
				$FileName=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['image']['name']);
				$FileName=rand()."banner_".$FileName;
				$ImgPath="../banners/".$FileName;
				$exqry="image='$FileName'";				
				copy($SourcePath,$ImgPath);
				
				$AddUserQry="UPDATE banners set $exqry WHERE id='".$Insertedid."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			
			header("location:manage_banners.php?msgs=3");
			exit;
	}
	else
	{
		$sql="INSERT INTO banners SET 
				title='".addslashes($_POST["title"])."',
				url='".addslashes($_POST["url"])."',
				description='".addslashes($_POST["description"])."',
				position='".addslashes($_POST["position"])."'";	
		$q=mysql_query($sql);
		$Insertedid=mysql_insert_id();
		
		if($_FILES['image']['tmp_name']!="")
		{
			$SourcePath=$_FILES['image']['tmp_name'];
			$FileName=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['image']['name']);
			$FileName=rand()."banner_".$FileName;
			$ImgPath="../banners/".$FileName;
			$exqry="image='$FileName'";				
			copy($SourcePath,$ImgPath);
			
			$AddUserQry="UPDATE banners set $exqry WHERE id='".$Insertedid."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
		}
		
		header("location:manage_banners.php?msgs=1");
		exit;
	}	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from banners where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
	$description=trim(stripslashes($ROW->description));
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
<link href="main.css" catname=text/css rel=stylesheet />
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<script language=javascript src="body.js"></script>
<script language="Javascript" name="text/JavaScript" src="calendar.js"></script>
<script language="javascript" name="text/javascript">
function valid()
{
	form=document.addprod;
	
	if(form.title.value.split(" ").join("")=="")
	{
		alert("Please enter banner title.");
		form.title.focus();
		return false;
	}	
	if(form.image.value.split(" ").join("")=="" && form.image_old.value.split(" ").join("")=="")
	{
		alert("Please select banner.");
		form.image.focus();
		return false;
	}
	return  true;	
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Banner <span class="a">
                    <?=$Message;?>
                  </span></td>
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
                         <td class="a" align="center" colspan="4">&nbsp;</td>
                        </tr>
						<? }?>
						<tr>
                          <td width="12%" height="25" align="right" valign="top"><strong> Title :&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="title" style="width:100%;"  value="<? echo htmlentities(stripslashes($ROW->title));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="12%" height="25" align="right" valign="top"><strong> Link :&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="url" style="width:100%;"  value="<? echo htmlentities(stripslashes($ROW->url));?>" type="text"  class="solidinput"></textarea></td>
                        </tr>
						<tr>
                          <td width="12%" height="25" align="right" valign="top"><strong> Position?:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  	<select name="position" id="position" style="width:400px;">
								<option value="Home Page - Top Slider Banner" <? if($ROW->position=="Home Page - Top Slider Banner"){echo "selected";}?>>Home Page - Top Slider Banner</option>
								<?php /*?><option value="Home Page - Middle Banner" <? if($ROW->position=="Home Page - Middle Banner"){echo "selected";}?>>Home Page - Middle Banner</option><?php */?>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="12%" height="25" align="right" valign="top"><strong> Image:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input  type="file" name="image" id="image" class="solidinput">&nbsp;<? if($_REQUEST['id']==""){?>&nbsp;&nbsp;<a href="#" onClick="document.getElementById('image').value='';return false;">Delete Image</a><? } ?><br>
						  <span class="a">Ideal Size: Home Page -  Slider Banner = Width: 928px; Height:428px;</span><br>
						  <?php /*?><span class="a">Ideal Size: Home Page - Middle Banner = Width: 290px;  Height:205px;</span><?php */?>
						  </td>
                        </tr>
						<? if($ROW->image!="" && file_exists("../banners/".$ROW->image)){?>
							<tr>
								<td align="right" valign="middle">&nbsp;</td>
								<td  align="left" valign="top" style="padding-bottom:5px;"> <? if($ROW->image!="" && file_exists("../banners/".$ROW->image)){?><img src="../banners/<?=$ROW->image;?>" />&nbsp;<br><br><a href="add_banner.php?del=image&id=<?=trim($_REQUEST['id']);?>">Delete Current Image</a><? } ?></td>
							</tr>
					 	  <? } ?>
						<input type="hidden" name="image_old" id="image_old" value="<?=$ROW->image;?>" />
						<tr>
                          <td width="12%" height="25" align="right" valign="top"><strong> Description :&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="description" style="width:100%;"  value="<? echo htmlentities(stripslashes($ROW->description));?>" type="text"  class="solidinput"></textarea></td>
                        </tr>
						<tr>
                          <td align="right">&nbsp;</td>
                          <td width="88%" colspan="3"><input type=submit name="Submit" value="<? echo $Buttitle;?>" onClick="return valid();" class="bttn-s">                          </td>
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