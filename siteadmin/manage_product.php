<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");
$mlevel=1;
if($_GET["id"])
{	
	$cid=$_GET["id"];
	
	$Seltotproimages="SELECT * FROM products where id=".$_GET['id']."";
	$SeltotproimagesRs=mysql_query($Seltotproimages);
	$Proimage=mysql_fetch_object($SeltotproimagesRs);
	if(file_exists("../Products/".$Proimage->picture) && $Proimage->picture!= "")
	{
		@unlink("../Products/".$Proimage->picture);	
		@unlink("../Products/thumb/".$Proimage->picture);	
	}
	
	$dqry="delete from products where id=$cid";
	mysql_query($dqry);	
	header("location:manage_product.php?msgs=15&start=".$_GET['start']."");
	exit;
}

if(isset($_REQUEST['FirstpageSubmit']))
{
	$count1 = $_REQUEST['count'];
	for($i = 1;$i <= $count1;$i++)
	{
		$isfeatured = "isfeatured".$i;
		$pid = "pid".$i;
		if(isset($_REQUEST[$isfeatured]))
		{
			if($_REQUEST[$isfeatured] != "")
			$isfeatured = "Y";	
		}
		else
		{
			$isfeatured = "N";
		}
		$query = "update products set isfeatured='".$isfeatured."' where id=".$_REQUEST[$pid];
		mysql_query($query);
	}
	header("location:manage_product.php?msgs=4&start=".$_GET['start']."");
	exit;
}


if($_REQUEST["left_maincat"]!="")
{	
	$SearchAndQry .= " and (products.category = '".trim(addslashes($_REQUEST["left_maincat"]))."'  ) ";	
}
if($_REQUEST["left_brand"]!="")
{	
	$SearchAndQry .= " and (products.brand = '".trim(addslashes($_REQUEST["left_brand"]))."'  ) ";	
}
if($_REQUEST["left_flooringtype"]!="")
{	
	$SearchAndQry .= " and (products.flooringtype = '".trim(addslashes($_REQUEST["left_flooringtype"]))."'  ) ";	
}
if($_REQUEST["left_species"]!="")
{	
	$SearchAndQry .= " and (products.species = '".trim(addslashes($_REQUEST["left_species"]))."'  ) ";	
}
if($_REQUEST["left_diylevel"]!="")
{	
	$SearchAndQry .= " and (products.DIYlevel = '".trim(addslashes($_REQUEST["left_diylevel"]))."'  ) ";	
}
if($_REQUEST["left_perfclass"]!="")
{	
	$SearchAndQry .= " and (products.performanceclass = '".trim(addslashes($_REQUEST["left_perfclass"]))."'  ) ";	
}
if($_REQUEST["left_finishsystem"]!="")
{	
	$SearchAndQry .= " and (products.finishsystem = '".trim(addslashes($_REQUEST["left_finishsystem"]))."'  ) ";	
}
if($_REQUEST["left_edgetype"]!="")
{	
	$SearchAndQry .= " and (products.edgetype = '".trim(addslashes($_REQUEST["left_edgetype"]))."'  ) ";	
}
if($_REQUEST["left_gloss"]!="")
{	
	$SearchAndQry .= " and (products.gloss = '".trim(addslashes($_REQUEST["left_gloss"]))."'  ) ";	
}
if($_REQUEST["db_subcat"]!="")
{	
	$SearchAndQry .= " and concat(',',concat(products.subcategories,',')) like '%,".mysql_real_escape_string($_REQUEST["db_subcat"]).",%' ";	
}
if($_REQUEST["left_productnumber"]!="")
{	
	$SearchAndQry .= " and (products.productnumber = '".trim(addslashes($_REQUEST["left_productnumber"]))."'  ) ";	
}
if(trim($_REQUEST['searchname'])!="")
{
	//$srch=trim($_REQUEST['keyword']);
	//$AndQry.=" and (products.name like '%".trim($_REQUEST['keyword'])."%' or products.productnumber like '%".trim($_REQUEST['keyword'])."%'  or products.description like '%".trim($_REQUEST['keyword'])."%' )";
	
	$srch=trim($_REQUEST["searchname"]);
	$MYPSRCH=str_replace("&","and",$srch);
	$MYPSRCH1=str_replace("and","&",$srch);
	$MYPSRCH2=str_replace("&","&amp;",$srch);
	$MYPSRCH3=str_replace("","\'",$srch);
	$MYPSRCH4=addslashes(addslashes($srch));
	$explodedsearch=explode("'",$srch);
	$explodedsearch3=explode(" ",$srch);

	$AndQry.=" and ( 
		products.name like '%".$MYPSRCH."%' or products.name like '%".$MYPSRCH1."%' or products.name like '%".$MYPSRCH2."%' or products.name like '%".$MYPSRCH3."%'  or products.name like '%".$MYPSRCH4."%' or products.name like '%".$srch."%' 
		or products.productnumber like '%".$MYPSRCH."%' or products.productnumber like '%".$MYPSRCH1."%' or products.productnumber like '%".$MYPSRCH2."%' or products.productnumber like '%".$MYPSRCH3."%'  or products.productnumber like '%".$MYPSRCH4."%' or products.productnumber like '%".$srch."%' 
		or products.productnumber like '".$explodedsearch3[0]."%' or products.name like '".$explodedsearch3[0]."%'
		)";
}
$order=$_GET["order"];
$strQueryPerPage="select * from  products	where products.name like '$order%' $AndQry $SearchAndQry order by products.name='$srch' desc,products.name like '$srch%' desc,id desc";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 
	
if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1 && !$_GET["start"])
{
	$Message2 = "Product has been added successfully!!";
}
if($_GET["msgs"]==3 && !$_GET["start"])
{
	$Message2 = "Product has been updated successfully!!";
}
if($_GET["msgs"]==4 && !$_GET["start"])
{
	$Message2 = "Product status changed successfully!!";
}
if($_GET["msgs"]==15 && !$_GET["start"])
{
	$Message2 = "Product has been deleted successfully!!";
}
if($_REQUEST['db_pages']!=""){	$db_pages=$_REQUEST['db_pages'];}else{$db_pages=20;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<link rel="stylesheet" href="main.css" type="text/css"></head>
<body bgColor="#ffffff" leftMargin="0" topMargin="0" marginwidth="0" marginheight="0">
<script language="javascript" src="body.js"></script>
<table align="left" width="100%" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height=60 valign="top"  colspan="2"><? include("top.php") ?>
      </td>
    </tr>
    <tr>
      <td width="20%" valign="top" class="rightbdr" ><? include("left_product.php"); ?>
      </td>
      <td width="80%" valign="top"><table width="100%"  border="0" cellpadding="2" cellspacing="2">
          <tr>
            <td width="100%" height="35" class=form111>Manage Products </td>
          </tr>
          <tr>
            <td align="center"  class="formbg"><table width="100%"  border="0" cellPadding="0" cellSpacing="0" align="left">
                <tbody>
                  <tr>
                    <td align="center" width="100%" class="a-l" ><font color="#FF0000"><?php echo $Message2 ; ?></font></td>
                  </tr>
                  <tr>
                    <td background="images/vdots.gif"><IMG height=1  src="images/spacer.gif" width=1 border=0></td>
                  </tr>
                <td valign="top"><?php /*?><table cellSpacing="0" cellPadding="1" border="0"  >
                      <tbody>
                        <tr>
                          <td colspan="25" height="20"><b>View By Product Name </b></td>
                        </tr>
                        <?=$prs_pageing->order();?>
                      </tbody>
                    </table><?php */?>
				   <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>No Product To Display</strong></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <?php } else { ?>
                    <form id="passionmanage" name="passionmanage"  method="post" action="#" enctype="multipart/form-data">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-b">
                        <tbody>
                          <!--DWLayoutTable-->
                          <tr>
                            <td align="right" height="30" colspan=12><? $result=$prs_pageing->number_pageing($strQueryPerPage,$db_pages,10,"Y","Y","Y");?><? echo $result[1];?></td>
                          </tr>
						  
                          <tr class="form_back" >
                            <td width="6%" height="20" align="center"><strong>Feature</strong></td>
							<td width="39%" height="20" align="left"><strong>Product Name</strong></td>
							<td width="12%" height="20" align="left"><strong>SKU</strong></td>
							<td width="5%" height="20" align="center"><strong>Category</strong></td>
							<td width="24%" height="20" align="center"><strong>Flooring Type</strong></td>
							<?php /*?><td width="5%" height="20" align="center"><strong>Price</strong></td><?php */?>
							<td width="14%" align="center"><strong>Options</strong></td>
                          </tr>
                          <?
						  $k=0;
						  $count = 0;
						  while($row =mysql_fetch_object($result[0]))
						  {
						  	$count++;
							$k=$k+1;
						  ?>
						  <tr>
						    <td align="center" valign="top"><input <? if($row->isfeatured=="Y") { echo "checked='checked'"; } ?>  type="checkbox" name="isfeatured<?=$count; ?>" value="<?=$row->id;?>" class="inputCheck"></td>
							<td align="left"><a href="#" onClick="javascript:openWin('product_detail.php?id=<?=$row->id;?>', 'product_detail<?=$row->id;?>', 1000,700, 'yes','yes');return false;" ><? echo dcd($row->name); ?></a></td>
							<td align="left"><? echo dcd($row->productnumber); ?>&nbsp;</td>
							<td align="center"><? echo ucfirst(getname("category",$row->category,"catname")); ?>&nbsp;</td>
							<td align="center"><? if($row->flooringtype!=""){?><? echo ucfirst(getname("flooringtype",$row->flooringtype,"name")); ?><? }else{?>&nbsp;<? }?></td>
							<?php /*?><td align="center">$<? echo dcd($row->price); ?>&nbsp;</td><?php */?>
							<td  align="center" nowrap="nowrap" >
                              <input name="button" type="button" onClick="window.location.href='add_product.php?id=<?php echo $row->id; ?>'" value=" Edit " class="bttn-s">
							  <input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete Product <? echo dcd($row->name); ?>?. \n','manage_product.php?id=<?php echo($row->id); ?>');" value="Delete" class="bttn-s">
						    <input type="hidden" name="pid<?=$count; ?>" value="<?=$row->id;?>" >
                            <input type="hidden" name="count" value="<?=$count; ?>" ></td>
                          </tr>
                          <? } ?>
						 <tr>
                            <td align="left" colspan="8"><input type="submit" name="FirstpageSubmit" value="Set Featured" class="bttn-s" ></td>
                          </tr>
						  <tr>
                            <td align="right" height="30" colspan=12><? echo $result[1];?></td>
                          </tr>
						</tbody>
                      </table>
                    </form>
                    <?php } ?>
					</td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>