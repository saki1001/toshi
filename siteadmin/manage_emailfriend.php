<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");

$mlevel=3;


if($_GET["id"])
{	
	$cid=$_GET["id"];
	$dqry="delete from emailafriend where id=$cid";
	mysql_query($dqry);	

	header("location:manage_emailfriend.php?msgs=15");
	exit;
}
	
$order=$_GET["order"];
if(trim($_REQUEST['keyword'])!="")
{
	$AndQry.=" and (emailafriend.firstname like '%".trim($_REQUEST['keyword'])."%' or emailafriend.lastname like '%".trim($_REQUEST['keyword'])."%'  or emailafriend.address1 like '%".trim($_REQUEST['keyword'])."%' or emailafriend.address2 like '%".trim($_REQUEST['keyword'])."%' or emailafriend.city like '%".trim($_REQUEST['keyword'])."%' or emailafriend.state like '%".trim($_REQUEST['keyword'])."%'  or emailafriend.country like '%".trim($_REQUEST['keyword'])."%' or emailafriend.zip like '%".trim($_REQUEST['keyword'])."%' or emailafriend.phone like '%".trim($_REQUEST['keyword'])."%' or emailafriend.email like '%".trim($_REQUEST['keyword'])."%')";
}

$strQueryPerPage="select * from emailafriend where sendername like '$order%' $AndQry order by id desc  ";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 

if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1 && !$_GET["start"])
{
	$Message2 = "Record Added Successfully!!";
}
if($_GET["msgs"]==3 && !$_GET["start"])
{
	$Message2 = "Record Updated Successfully!!";
}
if($_GET["msgs"]==15 && !$_GET["start"])
{
	$Message2 = "Record Deleted Successfully!!";
}
if($_GET["msgs"]==4 && !$_GET["start"])
{
	$Message2 = "Record have been approved successfully!!";
}
?>
<HTML>
<HEAD>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<SCRIPT language="javascript" src="body.js"></SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
<script type="text/javascript" language="javascript" src="overlib.js"></script>
<style>
.tooltip{
    background-color:#CCCCCC;
    padding:5px;
    color: #000000;
	font-weight:normal;
	font-size:12px;
	border:1px solid #000000;
}
</style>
</HEAD>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<TABLE align="left" width="100%" cellpadding="0" cellspacing="0">
  <TBODY>
    <TR>
      <TD height=60 valign="top"  colspan="2"><? include("top.php") ?>
      </td>
    </TR>
    <tr>
      <td width="20%" valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
      </td>
      <td width="80%" valign="top"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
          <TR>
            <TD width="100%" height="35" class=form111>Manage Email to friends </TD>
          </TR>
          <tr>
            <td align="center"  class="formbg"><TABLE width="100%"  border=0 cellPadding=0 cellSpacing=0 align="left">
                <TBODY>
                  <TR>
                    <TD align="center" width="100%" class="a-l" ><font color="#FF0000"><?php echo $Message2 ; ?></font></TD>
                  </TR>
                  <TR>
                    <TD background="images/vdots.gif"><IMG height=1  src="images/spacer.gif" width=1 border=0></TD>
                  </TR>
                	<TD valign="top"><FORM  name="order" action="#" method="post">
                      <TABLE cellSpacing=0 cellPadding=1 border=0  >
                        <TBODY>
                          <tr>
                            <td colspan="25" height="20"><b>View By  name </b></td>
                          </tr>
                          <?=$prs_pageing->order();?>
                        </TBODY>
                      </TABLE>
                    </form>
					
                    <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>No Email to friends To Display</strong></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <?php } else { ?>
                    <FORM id="passionmanage" name="passionmanage"  method="post">
                      <table width="100%" border=0 cellspacing=0 cellpadding="0" class="t-b">
                        <tbody>
                          <tr>
                            <td align="right" height="30" colspan=12><? $result=$prs_pageing->number_pageing($strQueryPerPage,50,10);?></td>
                          </tr>
                          <tr class="form_back" >
							<td width="14%" height="26"  align="left" nowrap><strong>Sender Name</strong></td>
                            <td width="16%"  align="left" ><strong>Sender Email</strong></td>
							<td width="10%"  align="left" ><strong>Friend Name</strong></td>
							<td width="13%"  align="left" ><strong>Friend Email</strong></td>
							<td width="15%"  align="left" ><strong>Event</strong></td>
							<td width="20%"  align="left" ><strong>Sender Message</strong></td>
							<td width="8%"  align="left" ><strong>Date</strong></td>
                            <td width="4%" align="center"><strong>Options</strong></td>
                          </tr>
                          <?
							$k=0;
							$count = 0;
						  while($row =mysql_fetch_object($result))
						  {
								$k=$k+1;
								$count++;
							  ?>
                          <tr>
                            <td align="left" valign="top">
							<? if($row->userid!=''){?>
							<a href="#" title="Click to view user detail" class="folder_linkn" onClick="javascript:openWin('../user_detail.php?id=<?=$row->userid;?>', 'usersDetail<?=$row->userid;?>', 1024,1200, 'yes','yes');"><? echo ucfirst(stripslashes($row->sendername)); ?></a>
							<? }else{?>
							<? echo ucfirst(stripslashes($row->sendername)); ?>
							<? } ?>
							</td>
                            <td align="left" valign="top"><a href="mailto:<? echo $row->senderemail; ?>"><? echo $row->senderemail; ?></a></td>
							<td align="left" valign="top"><? echo ucfirst(stripslashes($row->friendname)); ?></td>
                            <td align="left" valign="top"><a href="mailto:<? echo $row->friendemail; ?>"><? echo $row->friendemail; ?></a></td>
							<td align="left" valign="top"><a href="#" title="Click to view detail" class="folder_linkn"  onClick="javascript:openWin('event_detail.php?id=<?=$row->eventid;?>', 'usersDetail<?=$row->eventid;?>', 500,1200, 'yes','yes');return false;" ><? echo ucfirst(stripslashes(GetName1("events","name","id",$row->eventid))); ?></a></td>
							<td align="left" valign="top"><? echo nl2br(stripslashes($row->message)); ?></td>
							<td align="left" valign="top"><? echo date("m/d/Y",strtotime($row->datesent)); ?></td>
                            <td  align="center" nowrap  valign="top">
						    <input name="button5" type="button" onClick="deleteconfirm('Are you sure you want to delete?. \n','manage_emailfriend.php?id=<?php echo($row->id); ?>');" value="D" alt="Delete User" title="Delete User" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>Delete Message</div>',BORDER,'5');" onMouseOut="return nd();">
							<input type="hidden" name="pid<?=$count; ?>" value="<?=$row->id;?>" >
                            <input type="hidden" name="count" value="<?=$count; ?>" >
							</td>
                          </tr>
                          <? } ?>
                           </tbody>
                      </table>
                    </FORM>
                    <?php } ?>
                    </TD>
                </TR>
              </TABLE></td>
          </tr>
        </table></td>
    </tr>
  </TBODY>
</TABLE>
</BODY>
</HTML>