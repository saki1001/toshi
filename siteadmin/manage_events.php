<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");

$mlevel=6;
if(isset($_REQUEST['FirstpageSubmit2']))
{
	$count1 = $_REQUEST['count'];
	for($i = 1;$i <= $count1;$i++)
	{
		$approve = "approve".$i;
		$pid = "pid".$i;
		if(isset($_REQUEST[$approve]))
		{
			if($_REQUEST[$approve] != "")
			$approve = "Y";	
		}
		else
		{
			$approve = "N";
		}
		$query = "update events set approve='".$approve."' where id=".$_REQUEST[$pid];
		mysql_query($query);
	}
	header("location:manage_events.php?msgs=4&start=".$_GET['start']."");
	exit;
}

if($_GET["id"])
{	
	$cid=$_GET["id"];
	$dqry="delete from events where id=$cid";
	mysql_query($dqry);	
	
	$dqry="delete from events_pricelevel where 	eventid=$cid";
	mysql_query($dqry);	
	header("location:manage_events.php?msgs=15");
	exit;
}
	
$order=$_GET["order"];
if(trim($_REQUEST['keyword'])!="")
{
	$AndQry.=" and (events.name like '%".trim(addslashes($_REQUEST['keyword']))."%' or events.description like '%".trim(addslashes($_REQUEST['keyword']))."%' )";
}

$strQueryPerPage="select * from events where 1=1 $AndQry order by id desc  ";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 

if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1 && !$_GET["start"])
{
	$Message2 = "Event Added Successfully!!";
}
if($_GET["msgs"]==3 && !$_GET["start"])
{
	$Message2 = "Event Updated Successfully!!";
}
if($_GET["msgs"]==15 && !$_GET["start"])
{
	$Message2 = "Event Deleted Successfully!!";
}
if($_GET["msgs"]==4 && !$_GET["start"])
{
	$Message2 = "Event status haven been updated successfully!!";
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
            <TD width="100%" height="35" class=form111>Manage Events </TD>
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
                            <td colspan="25" height="20"><b>View By Event name </b></td>
                          </tr>
                          <?=$prs_pageing->order();?>
                        </TBODY>
                      </TABLE>
                    </form>
					<form name="FrmSearchClassifieds" id="FrmSearchClassifieds" enctype="multipart/form-data" action="#" method="get">
						<table width="100%" border="0" cellpadding="3" cellspacing="0" >
						  <tr>
							<td width="6%" align="left" valign="middle" class="textblack14">Search:</td>
							<td width="22%" align="left" valign="middle"><input name="keyword" value="<?=$_REQUEST['keyword'];?>" type="text" id="keyword" class="solidinput" size="40" /></td>
							<td width="72%" align="left" valign="middle"><input name="Searchhh" type="submit" value="Search" class="bttn-s" style="cursor:pointer;" onClick="document.FrmSearchClassifieds.submit();" />
							<input name="Searchhhviewall" type="button" value="View All" class="bttn-s" style="cursor:pointer;" onClick="window.location.href='manage_events.php';" />
							</td>
						  </tr>
						</table>
				  </form>
                    <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>No  Users To Display</strong></div></td>
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
                            <td width="6%" height="26"  align="center" ><strong>Approve</strong></td>
							<td width="33%" height="26"  align="left" nowrap><strong>Event Name</strong></td>
							<td width="34%" height="26"  align="left" nowrap><strong>Venue</strong></td>
                            <?php /*?><td width="29%"  align="left" ><strong>User</strong></td><?php */?>
							<td width="18%"  align="left" ><strong>Start Date</strong></td>
							<td width="9%" align="center"><strong>Options</strong></td>
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
                            <td align="center" valign="top"><input <? if($row->approve=="Y") { echo "checked='checked'"; } ?>  type="checkbox" name="approve<?=$count; ?>" value="<?=$row->id;?>" class="inputCheck"></td>
							<td align="left"><a href="#" title="Click to view detail" class="folder_linkn"  onClick="javascript:openWin('event_detail.php?id=<?=$row->id;?>', 'usersDetail<?=$row->id;?>', 500,1200, 'yes','yes');return false;" > <? echo ucfirst(stripslashes($row->name)); ?></a></td>
							<td align="left"><? echo ucfirst(stripslashes(GetName1("event_venues","name","id",$row->venueid)))." ( " .ucfirst(stripslashes(GetName1("event_venues","city","id",$row->venueid))).", ".ucfirst(stripslashes(GetName1("event_venues","state","id",$row->venueid)))." )"; ?></td>
							<?php /*?><td align="left"><a href="#" title="Click to view detail" class="folder_linkn" onClick="javascript:openWin('user_detail.php?id=<?=$row->userid;?>', 'usersDetail<?=$row->id;?>', 500,1200, 'yes','yes');"> <? echo ucfirst(stripslashes(GetName1("users","firstname","id",$row->userid)))." " .ucfirst(stripslashes(GetName1("users","lastname","id",$row->userid))); ?></a></td><?php */?>
                            <td align="left" nowrap="nowrap"><? echo date("M d, Y",strtotime($row->startdate)); ?> at <? echo ucfirst(stripslashes($row->startdate_hour)); ?>:<? echo ucfirst(stripslashes($row->startdate_minute)); ?> <? echo strtoupper(stripslashes($row->startdate_ampm)); ?></td>
							
                            <td  align="center" nowrap="nowrap" >
							<input name="button2" type="button" onClick="window.location.href='add_event.php?id=<?php echo($row->id); ?>'" value="E" class="bttn-s"  alt="Edit Event" title="Edit Event"  onMouseOver="return overlib('<div class=tooltip>Edit Event</div>',BORDER,'1');" onMouseOut="return nd();">
							<input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete Event. \n','manage_events.php?id=<?php echo($row->id); ?>');" value="D" class="bttn-s"  alt="Delete Event" title="Delete Event"   onMouseOver="return overlib('<div class=tooltip>Delete Event</div>',BORDER,'1');" onMouseOut="return nd();">
							<input type="hidden" name="pid<?=$count; ?>" value="<?=$row->id;?>" >
                            <input type="hidden" name="count" value="<?=$count; ?>" >
							</td>
                          </tr>
                          <? } ?>
						  <tr>
                            <td align="left" colspan="10" ><input type="submit" name="FirstpageSubmit2" value="Approve" class="bttn-s" ></td>
                          </tr>
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