<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");
$mlevel=3;
if($_GET["id"])
{	
	$cid=$_GET["id"];	
	$dqry="delete from banners where id=$cid";
	mysql_query($dqry);	
	header("location:manage_banners.php?msgs=15");
	exit;
}


$strQueryPerPage="select * from banners  where 1=1  order by position,id desc  ";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 

if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1)
{
	$Message2 = "Banner Added Successfully!!";
}
if($_GET["msgs"]==3)
{
	$Message2 = "Banner Updated Successfully!!";
}
if($_GET["msgs"]==15)
{
	$Message2 = "Banner Deleted Successfully!!";
}
if($_GET["msgs"]==5)
{
	$Message2 = "Featured Users have been changed Successfully!!";
}
if($_GET["msgs"]==333)
{
	$Message2 = "Banner Setted Successfully!!";
}
if($_GET["msgs"]==3333)
{
	$Message2 = "Display Order has been updated successfully"; 
}	
if($_GET["msgs"]==4)
{
	$Message2 = "Banner has been updated successfully"; 
}
?>
<html>
<HEAD>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<SCRIPT language="javascript" src="body.js"></SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
</HEAD>
<body>
<table align="left" width="100%" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height=60 valign="top"  colspan="2"><? include("top.php") ?>
      </td>
    </tr>
    <tr>
      <td width="20%" valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
      </td>
      <td width="80%" valign="top"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
          <tr>
            <td width="100%" height="35" class=form111>Manage Banners </td>
          </tr>
          <tr>
            <td align="center"  class="formbg"><table width="100%"  border=0 cellPadding=0 cellSpacing=0 align="left">
                <tbody>
                  <tr>
                    <td align="center" width="100%" class="a-l" ><font color="#FF0000"><?php echo $Message2 ; ?></font></td>
                  </tr>
                  <tr>
                    <td background="images/vdots.gif"><IMG height=1  src="images/spacer.gif" width=1 border=0></td>
                  </tr>
                	<td valign="top">
					
                    <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>There are no banners to display</strong></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <?php } else { ?>
                    <form id="passionmanage" name="passionmanage"  method="post" enctype="multipart/form-data">
                      <table width="100%" border=0 cellspacing=0 cellpadding="0" class="t-b">
                        <tbody>
                          <!--DWLayoutTable-->
                          <tr>
                            <td align="right" height="30" colspan=12><? $result=$prs_pageing->number_pageing($strQueryPerPage,30,10);?></td>
                          </tr>
                          <tr class="form_back">
							<td width="33%" height="26"  align="left" ><strong>Title</strong></td>
							<td width="53%" align="center"><strong>Position</strong></td>
                            <td width="14%" align="center"><strong>Options</strong></td>
                          </tr>
                          <?
							$k=0;
							$count = 0;
						  while($row =mysql_fetch_object($result))
						  {
								$k=$k+1;
								$count++;
								if($colorflg==1)
								{ 
									$colorflg=0;
						  ?>
                          <tr>
                            <? } ?>
                            <td align="left" valign="top"><? echo stripslashes($row->title); ?></td>
							<td align="center"><? echo stripslashes($row->position); ?></td>
							<td  align="center" width="14%"  valign="top">
							<input name="button3" type="button" onClick="window.location.href='add_banner.php?id=<?php echo($row->id); ?>'" value="Edit" class="bttn-s">
							<input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete this Banner. \n','manage_banners.php?id=<?php echo($row->id); ?>');" value="Delete" class="bttn-s">
							<input type="hidden" name="pid<?=$count; ?>" value="<?=$row->id;?>" >
                            <input type="hidden" name="count" value="<?=$count; ?>" >
							</td>
                          </tr>
                          <? } ?>
                        </tbody>
                      </table>
                    </form>
                    <?php } ?>
                    <!--/content--></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>