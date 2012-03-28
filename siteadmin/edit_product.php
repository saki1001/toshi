<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
include("fckeditor/fckeditor.php") ;
$mlevel=1;
$Message="";
if($_REQUEST['del']!="")
{
	$qrr=$_REQUEST['del'].'= \'\'' ;
	//echo "UPDATE products SET $qrr where id='".trim($_GET['id'])."'";
	$sql=mysql_query("UPDATE products SET $qrr where id='".trim($_GET['id'])."'");	
	header("location:edit_product.php?id=".$_REQUEST['id']);
	exit;
}
if($_REQUEST['Signup1_1'])
{
	$maincat=addslashes($_POST["maincat"]);
	$rprod=substr($_REQUEST['splist'],0,-1);
	$contents2=$_POST['rte1'];
	$contents=addslashes($contents2);
	if($_POST['handleoption_blade']!="") {$multihandleoption_blade=implode(',',$_POST['handleoption_blade']);}else{$multihandleoption_blade=="";}
	if($_POST['rubber_thickness']!="") {$multirubber_thickness=implode(',',$_POST['rubber_thickness']);}else{$multirubber_thickness=="";}
	if($_POST['sizes']!="") {$multisizes=implode(',',$_POST['sizes']);}else{$multisizes=="";}
	if($_POST['tablecolor']!="") {$multitablecolor=implode(',',$_POST['tablecolor']);}else{$multitablecolor=="";}
	if($_POST['ishomefeaturedtop']!="") {$ishomefeaturedtop="Y";}else{$ishomefeaturedtop="N";}
	if($_POST['ishomefeaturedtop2']!="") {$ishomefeaturedtop2="Y";}else{$ishomefeaturedtop2="N";}
	
	$AddUserQry="UPDATE products SET
				maincat='".addslashes($_POST['maincat'])."',
				name='".addslashes($_POST['name'])."',
				productnumber='".addslashes($_POST['productnumber'])."',
				description='".$contents."',
				price='".addslashes($_POST['price'])."',
				ourprice='".addslashes($_POST['ourprice'])."',
				quantity='".addslashes($_POST["quantity"])."',	
				manufacturer='".addslashes($_POST['manufacturer'])."',
				tablecolor='".addslashes($multitablecolor)."',
				size='".addslashes($multisizes)."',
				weight='".addslashes($_REQUEST['weight'])."',
				availability='".addslashes($_POST["availability"])."',
				relateditem='".addslashes($rprod)."',
				handleoption_blade='".addslashes($multihandleoption_blade)."',
				ishomefeaturedtop='".addslashes($ishomefeaturedtop)."',
				ishomefeaturedtop2='".addslashes($ishomefeaturedtop2)."',
				rubber_thickness='".addslashes($multirubber_thickness)."' where id='".$_GET['id']."'";	 
	$AddUserQryRs=mysql_query($AddUserQry);
	
	
	if($_FILES["picture"]['tmp_name'])
	{
		 $file=$_FILES["picture"];	
		 //$send_name1=ereg_replace (" ", "",$file["name"]); 	
		 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
		 $filename1=rand().$send_name1;		
		 $filetoupload=$file['tmp_name'];				 
		 $path="../Products/".$filename1; 
		 copy($filetoupload,$path);
		 $extsql2=",picture='$filename1'";
		 if($_POST["picture_old"]!="")
		 {
			$oldres=$_POST["picture_old"];
			@unlink("../Products/$oldres");
			@unlink("../Products/thumb/$oldres");
		 }
		 //Create Thumb 200 x 213
			$source=$path;
			$thumb_f2 = $filename1 ;
			$dest2="../Products/thumb/".$thumb_f2;
			$thumb_size_w = 129;
			$thumb_size_h = 84;
			
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
			
			
			//Create Thumb 200 x 213
			$source=$path;
			$thumb_f2 = $filename1 ;
			$dest2="../Products/big/".$thumb_f2;
			$thumb_size_w = 430;
			$thumb_size_h = 240;
			
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
			
			$AddUserQry="UPDATE products SET picture='$filename1' where id='".$_GET['id']."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
	}
	if($_FILES["picture_homepage"]['tmp_name'])
	{
		 $file=$_FILES["picture_homepage"];	
		//$send_name1=ereg_replace (" ", "",$file["name"]); 	
		 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
		 $filename1=rand().$send_name1;		
		 $filetoupload=$file['tmp_name'];				 
		 $path="../Products/".$filename1; 
		 copy($filetoupload,$path);
		 $extsql2=",picture_homepage='$filename1'";
		 if($_POST["picture_homepage_old"]!="")
		 {
			$oldres=$_POST["picture_homepage_old"];
			@unlink("../Products/thumb/$oldres");
			@unlink("../Products/$oldres");
		 }
		 //Create Thumb 200 x 213
			$source=$path;
			$thumb_f2 = $filename1 ;
			$dest2="../Products/thumb/".$thumb_f2;
			$thumb_size_w = 525;
			$thumb_size_h = 250;
			
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
			
			$AddUserQry="UPDATE products SET picture_homepage='$filename1' where id='".$_GET['id']."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
	}
	
	if($_FILES["picture_homepage2"]['tmp_name'])
	{
		 $file=$_FILES["picture_homepage2"];	
		//$send_name1=ereg_replace (" ", "",$file["name"]); 	
		 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
		 $filename1=rand().$send_name1;		
		 $filetoupload=$file['tmp_name'];				 
		 $path="../Products/".$filename1; 
		 copy($filetoupload,$path);
		 $extsql2=",picture_homepage2='$filename1'";
		 if($_POST["picture_homepage2_old"]!="")
		 {
			$oldres=$_POST["picture_homepage2_old"];
			@unlink("../Products/thumb/$oldres");
			@unlink("../Products/$oldres");
		 }
		 //Create Thumb 200 x 213
			$source=$path;
			$thumb_f2 = $filename1 ;
			$dest2="../Products/thumb/".$thumb_f2;
			$thumb_size_w = 215;
			$thumb_size_h = 160;
			
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
			
			$AddUserQry="UPDATE products SET picture_homepage2='$filename1' where id='".$_GET['id']."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
	}
	
	header("location:manage_product.php?msgs=3");
	exit;
	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from products where id='".$_GET['id']."'";
	$SELRs=mysql_query($SEL);
	$ROW=mysql_fetch_object($SELRs);
	$description=stripslashes($ROW->description);
	$maincat=stripslashes($ROW->maincat);
	$productnumber=stripslashes($ROW->productnumber);
	$name=stripslashes($ROW->name);
	$price=stripslashes($ROW->price);
	$maxqty=stripslashes($ROW->maxqty);
	$description=stripslashes($ROW->description);
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
<link href="main.css" fontname=text/css rel=stylesheet />
</head>
<body leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">
<script language=javascript src="body.js"></script>
<script language="Javascript" fontname="text/JavaScript" src="calendar.js"></script>
<script type="text/javascript" language="javascript">

function valid()
{
	form=document.addprod;
	if(form.maincat.value=="")
	{
		alert("Please select product main category.");
		form.maincat.focus();
		return false;
	}
	/*if(form.subcat.value=="")
	{
		alert("Please select product sub category");
		form.subcat.focus();
		return false;
	}*/
	
	if(form.name.value.split(" ").join("")=="")
	{
		alert("Please enter product name.");
		form.name.focus();
		return false;
	}	
	 if(form.price.value.split(" ").join("")=="")
	{
		alert("Enter product price.");
		form.price.focus();
		return false;
	}
	 if(form.price.value != "" && isNaN(form.price.value))
	{
		alert("Enter numeric value for product price.");
		form.price.focus();
		return false;
	}
	/* if(form.ourprice.value.split(" ").join("")=="")
	{
		alert("Enter our price.");
		form.ourprice.focus();
		return false;
	}
	 if(form.ourprice.value != "" && isNaN(form.ourprice.value))
	{
		alert("Enter numeric value for our price.");
		form.ourprice.focus();
		return false;
	}
	if(form.weight.value=="")
	{
		alert("Please enter weight");
		form.weight.focus();
		return false;
	}
	if(isNaN(form.weight.value))
	{
		alert("Please enter valid weight");
		form.weight.focus();
		return false;
	}*/
	/*plen=document.getElementById("sellist[]").length;
	for(a=0; a<plen; a++)
	{
		Value=document.getElementById("sellist[]").options[a].value;
		document.getElementById("splist").value+=Value+",";
	}	*/
	return true;
}	
function removeplist()
{
	plen=document.getElementById("sellist[]").length;
	for(a=(plen-1); a>=0; a--)
	{
		if(document.getElementById("sellist[]").options[a].selected)
		{
			Text=document.getElementById("sellist[]").options[a].text;
			Value=document.getElementById("sellist[]").options[a].value;
			selOpt = new Option(Text,Value);
			//document.getElementById("prodlist[]").options[document.getElementById("prodlist[]").length]=selOpt;
			document.getElementById("sellist[]").options[a]=null;
		}
	}
}
function addplist()
{
	plen=document.getElementById("prodlist[]").length;
	for(a=0; a<=(plen-1); a++)
	{
		if(document.getElementById("prodlist[]").options[a].selected)
		{
			Text=document.getElementById("prodlist[]").options[a].text;
			Value=document.getElementById("prodlist[]").options[a].value;
			selOpt = new Option(Text,Value);
			document.getElementById("sellist[]").options[document.getElementById("sellist[]").length]=selOpt;
			//document.getElementById("prodlist[]").options[a]=null;
		}
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
            <td width="20%"  valign="top" class="rightbdr" ><? include("left_product.php"); ?>
            </td>
            <td width="80%" valign="top" align="center"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
                <tr>
                  <td height="35" class="form111"><? if($_GET['id']){?>
                    Edit
                    <? } else {?>
                    Add
                    <? } ?>
                    Product </td>
                </tr>
                <tr>
                  <td height="222" class="formbg" valign="top"><form name="addprod" id="addprod" action="#" enctype="multipart/form-data" method="post">
                      <table width="100%" border="0" cellpadding="2" cellspacing="2" class="t-b">
                        <? if($_REQUEST['msg']=="1"){?>
                        <tr>
                          <td  colspan="2" align="center" valign="top" class="a-l">Product has beed added successfully. <br />
                            Your detail will be review and approve by administrator.</td>
                        </tr>
                        <? } ?>
                        <tr>
                          <td height="25" align="right" valign="top" ><strong><span class="a">*</span> Category:&nbsp;</strong></td>
                          <td height="25" colSpan=3 valign="top"><select name="maincat" id="maincat" style="width:200px;"  class="solidinput" onChange="changeweighttext(this.value);">
                              <option value="">Select</option>
                              <? 
											$rs11=mysql_query("select * from category where parentid=0 order by catname ASC ");
											$tot11=mysql_affected_rows();
											for($m=0;$m<$tot11;$m++)
											{
											$gr=mysql_fetch_object($rs11);
									  ?>
                              <option value="<?=$gr->id?>" <? if($maincat==$gr->id){ echo "selected";}?> >
                              <?=$gr->catname ?>
                              </option>
                              <? }?>
                            </select></td>
                        </tr>
                       
                        <tr>
                          <td width="26%" height="25" align="right" valign="top" ><strong><span class="a">*</span>Product Name:&nbsp;</strong></td>
                          <td height="25" colSpan=3 valign="top"><input name="name" type="text" class="solidinput" id="name" value="<?=$name;?>" size="100"></td>
                        </tr>
                        <tr>
                          <td width="26%" height="25" align="right" valign="top" ><strong>SKU#:&nbsp;</strong></td>
                          <td height="25" colSpan=3 valign="top"><input name="productnumber" type="text" size="100" value="<?=$productnumber;?>" class="solidinput"></td>
                        </tr>
                        <tr>
                          <td height="30" align="right" class="txt-14black"><span class="a">*</span>&nbsp;<strong>Price:&nbsp;</strong></td>
                          <td align="left" valign="top">$<input name="price" id="price" value="<?=stripslashes($ROW->price);?>" type="text" class="solidinput" style="width:120px;"/></td>
                        </tr>
						<tr>
						  <td height="30" align="right" class="txt-14black">&nbsp;<strong>Our Price:&nbsp;</strong></td>
						  <td align="left" valign="top">$<input name="ourprice" id="ourprice" value="<?=stripslashes($ROW->ourprice);?>" type="text" class="solidinput" style="width:120px;"/></td>
						</tr>
						<tr>
                          <td width="22%" height="25" align="right" valign="top"><strong> Quantity:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="quantity" id="quantity" style="width:120px;"  value="<? echo (stripslashes($ROW->quantity));?>" type="text"  class="solidinput"> <span class="a">(Quantity must be greater than 0)</span></td>
                        </tr>
						<tr>
						  <td height="25" align="right" valign="top" ><strong><span class="a"></span>Manufacturer:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top">
								<select name="manufacturer"  class="solidinput" style="width:350px;">
								  <option value="">Select Manufacturer</option>
									  <? 
										$rs11=mysql_query("select * from manufacturer where 1=1 order by name ASC ");
										$tot11=mysql_affected_rows();
										for($m=0;$m<$tot11;$m++)
										{
										$gr22=mysql_fetch_object($rs11);
									  ?>
									  <option value="<?=$gr22->id?>" <? if($ROW->manufacturer==$gr22->id){ echo "selected";}?> ><?=stripslashes($gr22->name); ?></option>
									  <? }?>
								</select>				</td>
					    </tr>
						<tr>
						  <td height="25" align="right" valign="top" ><strong><span class="a"></span>Table Color:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top">
								<?php /*?><select name="tablecolor"  class="solidinput" style="width:350px;">
								  <option value="">Select Table Color</option>
								  <? 
										$rs11=mysql_query("select * from colors where 1=1 order by name ASC ");
										$tot11=mysql_affected_rows();
										for($m=0;$m<$tot11;$m++)
										{
										$gr22=mysql_fetch_object($rs11);
									  ?>
									  <option value="<?=$gr22->name?>" <? if($ROW->tablecolor==$gr22->name){ echo "selected";}?> ><?=stripslashes($gr22->name); ?></option>
									  <? }?>
								</select><?php */?>
								<select name="tablecolor[]" id="tablecolor" class="solidinput" style="width:400px;height:80px;" multiple="multiple" >
										<optgroup label="Select Table Color"></optgroup>
										<?
										if($ROW->tablecolor!="" && $_REQUEST['id']!='')
										{
											$multitablecolor=explode(",",$ROW->tablecolor);
										}	
										$sql="select * from colors  order by name Asc";
										$rs=mysql_query($sql);
										$tot=mysql_affected_rows();
										for($w=0;$w<$tot;$w++)
										{
											$aj=mysql_fetch_object($rs);
											$id=stripslashes($aj->id);
											$name=stripslashes($aj->name);
											if($ROW->tablecolor!="" && $_REQUEST['id']!='')
											{
												if (in_array($name,$multitablecolor))
													echo $data="<option value=".$name." selected>".$name."</option>";
												else
													echo $data="<option value=".$name.">".$name."</option>";	
											}
											else
											{
												echo $data="<option value=".$name.">".$name."</option>";
											}	
										}
										?>
								</select>
							</td>
					    </tr>
						<tr>
                          <td width="16%" align="right" valign="top" ><strong><span class="a"></span>Sizes:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  		<select name="sizes[]" id="sizes" class="solidinput" style="width:400px;height:80px;" multiple="multiple" >
										<optgroup label="Select Handle Option"></optgroup>
										<?
										if($ROW->size!="" && $_REQUEST['id']!='')
										{
											$multisizes=explode(",",$ROW->size);
										}	
										$sql="select * from sizes  order by name Asc";
										$rs=mysql_query($sql);
										$tot=mysql_affected_rows();
										for($w=0;$w<$tot;$w++)
										{
											$aj=mysql_fetch_object($rs);
											$id=stripslashes($aj->id);
											$name=stripslashes($aj->name);
											if($ROW->size!="" && $_REQUEST['id']!='')
											{
												if (in_array($name,$multisizes))
													echo $data="<option value=".$name." selected>".$name."</option>";
												else
													echo $data="<option value=".$name.">".$name."</option>";	
											}
											else
											{
												echo $data="<option value=".$name.">".$name."</option>";
											}	
										}
										?>
								</select>	
						  </td>
                        </tr>
						<tr>
                          <td width="16%" align="right" valign="top" ><strong><span class="a"></span>Handle Options:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  		<select name="handleoption_blade[]" id="handleoption_blade" class="solidinput" style="width:400px;height:80px;" multiple="multiple" >
										<optgroup label="Select Handle Option"></optgroup>
										<?
										if($ROW->handleoption_blade!="" && $_REQUEST['id']!='')
										{
											$multihandleoption_blade=explode(",",$ROW->handleoption_blade);
										}	
										$sql="select * from handleoption_blade  order by name Asc";
										$rs=mysql_query($sql);
										$tot=mysql_affected_rows();
										for($w=0;$w<$tot;$w++)
										{
											$aj=mysql_fetch_object($rs);
											$id=stripslashes($aj->id);
											$name=stripslashes($aj->name);
											if($ROW->handleoption_blade!="" && $_REQUEST['id']!='')
											{
												if (in_array($id,$multihandleoption_blade))
													echo $data="<option value=".$id." selected>".$name."</option>";
												else
													echo $data="<option value=".$id.">".$name."</option>";	
											}
											else
											{
												echo $data="<option value=".$id.">".$name."</option>";
											}	
										}
										?>
								</select>	
						  </td>
                        </tr>
						<tr>
                          <td width="16%" align="right" valign="top" ><strong><span class="a"></span>Rubber Thickness:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  		<select name="rubber_thickness[]" id="rubber_thickness" class="solidinput" style="width:400px;height:80px;" multiple="multiple" >
										<optgroup label="Select Rubber Thickness"></optgroup>
										<?
										if($ROW->rubber_thickness!="" && $_REQUEST['id']!='')
										{
											$multirubber_thickness=explode(",",$ROW->rubber_thickness);
										}	
										$sql="select * from rubber_thickness  order by name Asc";
										$rs=mysql_query($sql);
										$tot=mysql_affected_rows();
										for($w=0;$w<$tot;$w++)
										{
											$aj=mysql_fetch_object($rs);
											$id=stripslashes($aj->id);
											$name=stripslashes($aj->name);
											if($ROW->rubber_thickness!="" && $_REQUEST['id']!='')
											{
												if (in_array($id,$multirubber_thickness))
													echo $data="<option value=".$id." selected>".$name."</option>";
												else
													echo $data="<option value=".$id.">".$name."</option>";	
											}
											else
											{
												echo $data="<option value=".$id.">".$name."</option>";
											}	
										}
										?>
								</select>	
						  </td>
                        </tr>
                        <tr>
                          <td height="25" align="right" valign="top" ><strong>Weight:&nbsp;</strong></td>
                          <td height="25" colSpan=3 valign="top"><input name="weight" id="weight" type="text" style="width:120px;" value="<?=stripslashes($ROW->weight);?>" class="solidinput">
                            &nbsp;<strong id="weighttextid"><? if($maincat=="2"){?>grams<? }else{ echo "lbs";}?></strong></td>
                        </tr>
						 <tr>
                          <td width="26%" height="25" align="right" valign="top"><strong><span class="a"></span> Availability:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <select id="availability" name="availability" style="width:170px;">
						  <?
						  $qqrrss=mysql_query("select * from availability order by name desc");
						  while($rrww=mysql_fetch_object($qqrrss))
						  {
						  ?>
						  <option value="<?=$rrww->name;?>" <? if($rrww->name==$ROW->availability) { ?> selected="selected" <? } ?> ><?=stripslashes($rrww->name);?></option>
						  <?
						  }
						  ?>
						  </select>						  </td>
                        </tr> 
						<tr>
                          <td width="26%" height="25" align="right" valign="top" style="padding-bottom:8px;"><strong>Picture:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="bottom">
						 <input name="picture" type="file" class="buttonclass" id="picture" />&nbsp;<span c class="a"><br>
						 </span><span class="a">Ideal Picture Size : Width: 430px  Height:240px</span>
						  <? if(trim($ROW->picture)!="") { ?>
						  <br>Current Image:<br><br> <img src="../Products/thumb/<?=$ROW->picture;?>" border="0" >	&nbsp;<br><br><a href="edit_product.php?del=picture&id=<?=trim($_REQUEST['id']);?>">Delete Current Image</a>	<br>
						  <br>				  
						  <? } ?>
						  <input type="hidden" id="picture_old" name="picture_old" value="<? echo $ROW->picture; ?>"></td>
                        </tr>
						<tr>
                          <td width="26%" height="25" align="right" valign="top" style="padding-bottom:8px;"><strong>Home Page Featured - Top Picture:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="bottom" align="left">
						 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td align="left">
									<input name="picture_homepage" type="file" class="buttonclass" id="picture_homepage" />&nbsp;<? if($_REQUEST['id']==""){?>&nbsp;&nbsp;<a href="#" onClick="document.getElementById('picture_homepage').value='';return false;">Delete Image</a><? } ?><span c class="a"><br>
									 </span><span class="a">Ideal Picture Size : Width: 525px  Height:250px</span>
									  <? if(trim($ROW->picture_homepage)!="") { ?>
									  <br>
									  Current Image:<br><br> <img src="../Products/thumb/<?=$ROW->picture_homepage;?>" border="0" >	&nbsp;<br><br><a href="add_product.php?del=picture_homepage&id=<?=trim($_REQUEST['id']);?>">Delete Current Image</a>	<br>
									  <br>				  
									  <? } ?>
									  <input type="hidden" id="picture_homepage_old" name="picture_homepage_old" value="<? echo $ROW->picture_homepage; ?>">
								</td>
								<td align="right" valign="top" class="a"><input type="checkbox" name="ishomefeaturedtop" id="ishomefeaturedtop" value="Y" <? if($ROW->ishomefeaturedtop=="Y"){echo "checked";}?> />
								<strong>Set product as home page Featured - Top Picture?</strong></td>
							  </tr>
							</table>
						  </td>
                        </tr>
						<tr>
                          <td width="26%" height="25" align="right" valign="top" style="padding-bottom:8px;"><strong>Home Page Featured - Bottom Picture:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="bottom" align="left">
						 	<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="49%" align="left">
									<input name="picture_homepage2" type="file" class="buttonclass" id="picture_homepage2" />&nbsp;<? if($_REQUEST['id']==""){?>&nbsp;&nbsp;<a href="#" onClick="document.getElementById('picture_homepage2').value='';return false;">Delete Image</a><? } ?><span c class="a"><br>
									 </span><span class="a">Ideal Picture Size : Width: 215px  Height:160px</span>
									  <? if(trim($ROW->picture_homepage2)!="") { ?>
									  <br>
									  Current Image:<br><br> <img src="../Products/thumb/<?=$ROW->picture_homepage2;?>" border="0" >	&nbsp;<br><br><a href="add_product.php?del=picture_homepage2&id=<?=trim($_REQUEST['id']);?>">Delete Current Image</a>	<br>
									  <br>				  
									  <? } ?>
									  <input type="hidden" id="picture_homepage2_old" name="picture_homepage2_old" value="<? echo $ROW->picture_homepage2; ?>">
								</td>
								<td width="51%" align="right" valign="top" class="a"><input type="checkbox" name="ishomefeaturedtop2" id="ishomefeaturedtop2" value="Y" <? if($ROW->ishomefeaturedtop2=="Y"){echo "checked";}?> />
								<strong>Set product as home page Featured - Bottom Picture?</strong></td>
							  </tr>
							</table>
						  </td>
                        </tr>
                        <tr>
                          <td height="30" align="right" valign="top" class="txt-14black"><strong>Product Details:&nbsp;</strong></td>
                          <td align="left" valign="top"><?php
										$oFCKeditor = new FCKeditor('rte1') ;
										$oFCKeditor->BasePath = 'fckeditor/';
										$oFCKeditor->Value = $description;
										$oFCKeditor->Height = 450;
										$oFCKeditor->Width = 600;
										$oFCKeditor->Create() ;
								?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="height:1px;"></td>
                        </tr>
                        <?php /*?><tr>
                          <td width="26%" height="25" align="right" valign="top"><strong> Related Items:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><table width="95%" align="center" cellspacing="0" cellpadding="3">
                              <tr>
                                <td width="45%" style="border-style:none; border-width:0px;"><strong>Product List</strong></td>
                                <td width="11%" style="border-style:none; border-width:0px;"></td>
                                <td width="44%" style="border-style:none; border-width:0px;"><strong>Selected Products</strong></td>
                              </tr>
                              <tr>
                                <td style="border-style:none; border-width:0px;"><? if($_GET["id"]=="") { $selffid=0; } else { $selffid=$_GET["id"]; } ?>
                                  <select name="prodlist[]" id="prodlist[]" size="10" class="solidinput" style="width:100%" multiple="multiple">
                                    <? $pres=mysql_query("SELECT id,name from products where id!=".$selffid." order by name");
								  if(mysql_affected_rows()>0)
								  {
									while($prow=mysql_fetch_array($pres))
									{  ?>
                                    <option value="<?=$prow['id'];?>">
                                    <?=stripslashes($prow['name']);?>
                                    </option>
                                    <? } } ?>
                                  </select>                                </td>
                                <td style="border-style:none; border-width:0px;" align="center"> Add<br>
                                  <img src="images/move.jpg" onClick="addplist();"><br>
                                  <br>
                                  Remove Selected<br>
                                  <img src="images/delete.gif" onClick="removeplist();"> </td>
                                <td style="border-style:none; border-width:0px;"><input type="hidden" name="splist" id="splist">
                                  <select name="sellist[]" id="sellist[]" size="10" class="solidinput" style="width:100%" multiple="multiple">
                                    <?
									  $pres=mysql_query("SELECT relateditem from products where id='".$_GET['id']."'");
									  if(mysql_affected_rows()>0)
									  {
										$prow=mysql_fetch_array($pres);
										if(!str_replace(" ","",$prow['relateditem'])=="")
										{
										  $llist=split(",",$prow['relateditem']);
										  foreach($llist as $k=>$v)
										  {  ?>
                                   		 	<option value="<?=$v;?>"><?=GetName1("products","name","id",$v);?></option>
                                    <? } } } ?>
                                  </select>                                </td>
                              </tr>
                            </table></td>
                        </tr><?php */?>
                        <tr>
                          <td height="30" align="center" colspan="2"><input name="Signup1_1" type="submit" class="bttn-s" id="Signup1_1" style="cursor:pointer;" onClick="return valid();" value="<? echo $Buttitle; ?>"/></td>
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
<script language="javascript">
function changeweighttext(vall)
{
	if(vall=="2")
	{
		document.getElementById('weighttextid').innerHTML='grams';
	}
	else
	{
		document.getElementById('weighttextid').innerHTML='lbs';
	}	
}
</script>
</body>
</html>
