<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");
$mlevel=3;

if($_GET["id"])
{	
	$cid=$_GET["id"];
	$dqry="delete from press where id=$cid";
	mysql_query($dqry);	
	header("location:manage_press.php?msgs=2&start=".$_GET['start']."");
	exit;
}

if($_REQUEST['srt']=="name")
{
	$ORDQry=" order by name asc";
}
else
{
	$ORDQry=" order by id desc";
}
$order=$_GET["order"];
$strQueryPerPage="select * from press where name like '$order%' $SearchAndQry $ORDQry";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 
	
if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1 && !$_GET["start"])
{
	$Message2 = "Press Added Successfully!!";
}
if($_GET["msgs"]==3 && !$_GET["start"])
{
	$Message2 = "Press Updated Successfully!!";
}
if($_GET["msgs"]==2 && !$_GET["start"])
{
	$Message2 = "Press Deleted Successfully!!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body bgColor="#ffffff" leftMargin="0" topMargin="0" marginwidth="0" marginheight="0">
<script language="javascript" src="body.js"></script>
<script language="javascript" src="ajax_validation.js"></script>
<script language="javascript">
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
</script>
<table align="left" width="100%" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height=60 valign="top"  colspan="2"><? include("top.php") ?>
      </td>
    </tr>
    <tr>
      <td width="20%" valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
      </td>
      <td width="80%" valign="top"><table width="100%"  border="0" cellpadding="2" cellspacing="2">
          <tr>
            <td width="100%" height="35" class="form111"><strong>Manage Press Releases </strong></td>
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
                <td valign="top"><table cellSpacing="0" cellPadding="1" border="0"  >
                      <tbody>
                        <tr>
                          <td colspan="25" height="20"><b>View By Title</b></td>
                        </tr>
                        <?=$prs_pageing->order();?>
                      </tbody>
                    </table>
				   <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>No Press Releases To Display</strong></div></td>
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
                            <td align="right" height="30" colspan=12><? $result=$prs_pageing->number_pageing($strQueryPerPage,200,10,"Y");?></td>
                          </tr>
                          <tr class="form_back" >
							<td width="11%" height="28"  align="left"><strong>Date</strong></td>
							<td width="35%" height="28"  align="left"><strong>Title</strong></td>
							<td width="42%" height="28"  align="left"><strong>Description</strong></td>
							<td width="12%" align="center"><strong>Options</strong></td>
                          </tr>
                          <?
						  $k=0;
						  $count = 0;
						  while($row =mysql_fetch_object($result))
						  {
						  	$count++;
							$k=$k+1;
						  ?>
                          <tr>
                       		<td align="left" valign="top"><? echo date("m/d/Y",strtotime($row->date_display)); ?>&nbsp;</td>
							<td align="left"  valign="top"><?=(ucwords((dcd($row->name))));?>&nbsp;</td>
							<td align="left"  valign="top"><? echo strip_tags(stripslashes($row->shortdesc)); ?>&nbsp;</td>
							<td  align="center" nowrap="nowrap"  valign="top">
							<input name="button3" type="button" onClick="window.location.href='add_press.php?id=<?php echo($row->id); ?>'" value="Edit" class="bttn-s">
							<input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete Press Releases?. \n','manage_press.php?id=<?php echo($row->id); ?>');" value="Delete" class="bttn-s">
						  <input type="hidden" name="pid<?=$count; ?>" value="<?=$row->id;?>" >
                            </td>
                          </tr>
                          <? } ?>
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