<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=1;
$Message="";
if($_REQUEST['del']!="")
{
	$qrr=$_REQUEST['del'].'= \'\'' ;
	//echo "UPDATE products SET $qrr where id='".trim($_GET['id'])."'";
	$sql=mysql_query("UPDATE brands SET $qrr where id='".trim($_GET['id'])."'");	
	header("location:add_category.php?id=".$_REQUEST['id']);
	exit;
}

if(isset($_POST['Submit']))
{
	if($_GET['id'])
	{
		$strQueryPerPage="select * from brands where name='".addslashes($_POST["name"])."' and  id!=".$_GET['id'];
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="UPDATE brands SET 
				name='".addslashes($_POST["name"])."',
				description='".addslashes($_POST["description"])."'
				WHERE id='".$_GET['id']."'";
			$q=mysql_query($sql,$db);
			
			if($_FILES["picture"]['tmp_name'])
			{
				 $file=$_FILES["picture"];	
				 $send_name1=ereg_replace (" ", "",$file["name"]); 			
				 $filename1=rand().$send_name1;		
				 $filetoupload=$file['tmp_name'];				 
				 $path="../Brands/".$filename1; 
				 copy($filetoupload,$path);
				 $extsql2=",picture='$filename1'";
				 if($_POST["picture_old"]!="")
				 {
					$oldres=$_POST["picture_old"];
					@unlink("../Brands/thumb/$oldres");
					@unlink("../Brands/$oldres");
				 }
				 //Create Thumb 200 x 213
					$source=$path;
					$thumb_f2 = $filename1 ;
					$dest2="../Brands/thumb/".$thumb_f2;
					$thumb_size_w = 73;
					$thumb_size_h = 111;
					
					$size = getimagesize($source);
					$width = $size[0];
					$height = $size[1];
					$scale = min($thumb_size_w/$width, $thumb_size_h/$height);
					
					if ($scale < 1) 
					{
						 $thumb_size_w = floor($scale*$width);
						 $thumb_size_h = floor($scale*$height);
					}
					else
					{
						 $thumb_size_w = $width;
						 $thumb_size_h = $height;
					}
					
					$new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
					$system=explode(".",$thumb_f2);
					if (preg_match("/jpg|jpeg/",$system[1])){
						$im=imagecreatefromjpeg($source);				
					}else if (preg_match("/png/",$system[1])){
						$im=imagecreatefrompng($source);				
					}else if (preg_match("/gif/",$system[1])){
						$im=imagecreatefromgif($source);				
					}else if (preg_match("/bmp/",$system[1])){
						$im=imagecreatefromwbmp($source);				
					}else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
						$im=imagecreatefromjpeg($source);
					}else if($ext=="gif" || $ext=="GIF"){
						$im=imagecreatefromgif($source);
					}else if($ext=="png" || $ext=="PNG"){
						$im=imagecreatefrompng($source);
					}else if($ext=="bmp" || $ext=="BMP"){
						$im=imagecreatefromwbmp($source);
					}else{
						$im=imagecreatefromjpeg($source);
					}	
					//$im = imagecreatefromjpeg($source);
					imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
					imagejpeg($new_im,$dest2,100);
					//End thumb
					
					$AddUserQry="UPDATE brands SET picture='$filename1' where id='".$_GET['id']."'";	 
					$AddUserQryRs=mysql_query($AddUserQry);
			}
			
			
			header("location:manage_brands.php?msgs=3");
		}
		else 
		{
			$Message="Brand Name already exists.";
		}
	}
	else
	{
		$strQueryPerPage="select * from brands where name='".addslashes($_POST["name"])."'";
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="INSERT INTO brands SET 
					name='".addslashes($_POST["name"])."',
					description='".addslashes($_POST["description"])."',
					addeddate=curdate()";	
			$q=mysql_query($sql,$db);
			$insertedid=mysql_insert_id();
			
			if($_FILES["picture"]['tmp_name'])
			{
				 $file=$_FILES["picture"];	
				 $send_name1=ereg_replace (" ", "",$file["name"]); 			
				 $filename1=rand().$send_name1;		
				 $filetoupload=$file['tmp_name'];				 
				 $path="../Brands/".$filename1; 
				 copy($filetoupload,$path);
				 $extsql2=",picture='$filename1'";
				 if($_POST["picture_old"]!="")
				 {
					$oldres=$_POST["picture_old"];
					@unlink("../Brands/thumb/$oldres");
					@unlink("../Brands/$oldres");
				 }
				 //Create Thumb 200 x 213
					$source=$path;
					$thumb_f2 = $filename1 ;
					$dest2="../Brands/thumb/".$thumb_f2;
					$thumb_size_w = 73;
					$thumb_size_h = 111;
					
					$size = getimagesize($source);
					$width = $size[0];
					$height = $size[1];
					$scale = min($thumb_size_w/$width, $thumb_size_h/$height);
					
					if ($scale < 1) 
					{
						 $thumb_size_w = floor($scale*$width);
						 $thumb_size_h = floor($scale*$height);
					}
					else
					{
						 $thumb_size_w = $width;
						 $thumb_size_h = $height;
					}
					
					$new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
					$system=explode(".",$thumb_f2);
					if (preg_match("/jpg|jpeg/",$system[1])){
						$im=imagecreatefromjpeg($source);				
					}else if (preg_match("/png/",$system[1])){
						$im=imagecreatefrompng($source);				
					}else if (preg_match("/gif/",$system[1])){
						$im=imagecreatefromgif($source);				
					}else if (preg_match("/bmp/",$system[1])){
						$im=imagecreatefromwbmp($source);				
					}else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
						$im=imagecreatefromjpeg($source);
					}else if($ext=="gif" || $ext=="GIF"){
						$im=imagecreatefromgif($source);
					}else if($ext=="png" || $ext=="PNG"){
						$im=imagecreatefrompng($source);
					}else if($ext=="bmp" || $ext=="BMP"){
						$im=imagecreatefromwbmp($source);
					}else{
						$im=imagecreatefromjpeg($source);
					}	
					//$im = imagecreatefromjpeg($source);
					imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
					imagejpeg($new_im,$dest2,100);
					//End thumb
					
					$AddUserQry="UPDATE brands SET picture='$filename1' where id='".$insertedid."'";	 
					$AddUserQryRs=mysql_query($AddUserQry);
			}
			
			header("location:manage_brands.php?msgs=1");
			exit;
		}
		else 
		{
			$Message="Brand Name already exists.";
		}
	}	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from brands where id='".$_GET['id']."'";
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
		alert("Please enter brand name.");
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Brand </td>
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
                          <td width="15%" height="25" align="right" valign="top"><strong><span class="a">*</span> Brand Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="name" style="width:100%;"  value="<? echo htmlentities(stripslashes($ROW->name));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="15%" height="25" align="right" valign="top"><strong><span class="a"></span> Description:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><textarea name="description" style="width:100%;height:100px;"><? echo stripslashes($ROW->description);?></textarea></td>
                        </tr>
                        <tr>
                          <td width="15%" height="25" align="right" valign="top" style="padding-bottom:8px;"><strong>Picture:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="bottom">
						 <input name="picture" type="file" class="buttonclass" id="picture" />&nbsp;<? if($_REQUEST['id']==""){?>&nbsp;&nbsp;<a href="#" onClick="document.getElementById('picture').value='';return false;">Delete Image</a><? } ?><span c class="a"><br>
						 </span><span class="a">Ideal Picture Size : Width: 73px  Height:111px</span>
						  <? if(trim($ROW->picture)!="") { ?>
						  <br>
						  Current Image:<br><br> <img src="../Brands/thumb/<?=$ROW->picture;?>" border="0" >	&nbsp;<br><br><a href="add_brand.php?del=picture&id=<?=trim($_REQUEST['id']);?>">Delete Current Image</a>	<br>
						  <br>				  
						  <? } ?>
						  <input type="hidden" id="picture_old" name="picture_old" value="<? echo $ROW->picture; ?>"></td>
                        </tr>
                        <tr>
                          <td align="right">&nbsp;</td>
                          <td width="85%" colspan="3"><INPUT type=submit name="Submit" value="<? echo $Buttitle;?>" onClick="return valid();" class="bttn-s">                          </td>
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