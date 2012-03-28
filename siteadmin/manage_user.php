<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");

$mlevel=5;

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
		$query = "update users set approve='".$approve."' where id=".$_REQUEST[$pid];
		mysql_query($query);
	}
	header("location:manage_user.php?msgs=4&start=".$_GET['start']."");
	exit;
}
if(isset($_REQUEST['FirstpageSubmit3']))
{
	$count1 = $_REQUEST['count'];
	for($i = 1;$i <= $count1;$i++)
	{
		$displayprofile = "displayprofile".$i;
		$pid = "pid".$i;
		if(isset($_REQUEST[$displayprofile]))
		{
			if($_REQUEST[$displayprofile] != "")
			$displayprofile = "Y";	
		}
		else
		{
			$displayprofile = "N";
		}
		$query = "update users set displayprofile='".$displayprofile."' where id=".$_REQUEST[$pid];
		mysql_query($query);
	}
	header("location:manage_user.php?msgs=4&start=".$_GET['start']."");
	exit;
}


if($_GET["id"])
{	
	$cid=$_GET["id"];
	$dqry="delete from users where id=$cid";
	mysql_query($dqry);	
	
	$dqry="delete from users_musics where userid=$cid";
	mysql_query($dqry);	
	
	$dqry="delete from users_pictures where userid=$cid";
	mysql_query($dqry);	
	
	$dqry="delete from users_videos where userid=$cid";
	mysql_query($dqry);	
	
	$dqry="delete from events where userid=$cid";
	mysql_query($dqry);
	
	$dqry="delete from events_pricelevel where userid=$cid";
	mysql_query($dqry);
	
	header("location:manage_user.php?msgs=15");
	exit;
}
	
$order=$_GET["order"];
if(trim($_REQUEST['keyword'])!="")
{
	$AndQry.=" and (users.firstname like '%".trim($_REQUEST['keyword'])."%' or users.lastname like '%".trim($_REQUEST['keyword'])."%'  or users.address1 like '%".trim($_REQUEST['keyword'])."%' or users.address2 like '%".trim($_REQUEST['keyword'])."%' or users.city like '%".trim($_REQUEST['keyword'])."%' or users.state like '%".trim($_REQUEST['keyword'])."%'  or users.country like '%".trim($_REQUEST['keyword'])."%' or users.zip like '%".trim($_REQUEST['keyword'])."%' or users.phone like '%".trim($_REQUEST['keyword'])."%' or users.email like '%".trim($_REQUEST['keyword'])."%')";
}

$strQueryPerPage="select * from users where firstname like '$order%' $AndQry order by id desc  ";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 

if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1 && !$_GET["start"])
{
	$Message2 = "User Added Successfully!!";
}
if($_GET["msgs"]==3 && !$_GET["start"])
{
	$Message2 = "User Updated Successfully!!";
}
if($_GET["msgs"]==15 && !$_GET["start"])
{
	$Message2 = "User Deleted Successfully!!";
}
if($_GET["msgs"]==4 && !$_GET["start"])
{
	$Message2 = "Users have been approved successfully!!";
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
            <TD width="100%" height="35" class=form111>Manage Talents </TD>
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
					<form name="FrmSearchClassifieds" id="FrmSearchClassifieds" enctype="multipart/form-data" action="#" method="get">
						<table width="100%" border="0" cellpadding="3" cellspacing="0" >
						  <tr>
							<td width="6%" align="left" valign="middle" class="textblack14">Search:</td>
							<td width="22%" align="left" valign="middle"><input name="keyword" value="<?=$_REQUEST['keyword'];?>" type="text" id="keyword" class="solidinput" size="40" /></td>
							<td width="72%" align="left" valign="middle"><input name="Searchhh" type="submit" value="Search" class="bttn-s" style="cursor:pointer;" onClick="document.FrmSearchClassifieds.submit();" />
							<input name="Searchhhviewall" type="button" value="View All" class="bttn-s" style="cursor:pointer;" onClick="window.location.href='manage_user.php';" />
							<a href="../browse.php" target="_blank" class="bttn-a" style="height:25px;padding:2px;text-decoration:none;">View Talent Page</a> 
							</td>
						  </tr>
						</table>
				  </form>
                    <?php if(!$strTotalPerPage) { ?>
                    <table width="70%" border="0"   cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-a2">
                            <tr>
                              <td class=th-a><div align="center" ><strong>No  Talents To Display</strong></div></td>
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
							<td width="6%" height="26"  align="center" ><strong>Display</strong></td>
							<td width="17%" height="26"  align="left" nowrap><strong>Name</strong></td>
                            <td width="30%"  align="left" ><strong>Email</strong></td>
							<td width="9%"  align="center" ><strong>Gender</strong></td>
							<td width="19%"  align="center" ><strong>Account Type</strong></td>
							<td width="17%"  align="left" ><strong>Date</strong></td>
                            <td width="7%" align="center"><strong>Options</strong></td>
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
							<td align="center" valign="top"><input <? if($row->displayprofile=="Y") { echo "checked='checked'"; } ?>  type="checkbox" name="displayprofile<?=$count; ?>" value="<?=$row->id;?>" class="inputCheck"></td>
							<td align="left"><a href="#" title="Click to view detail" class="folder_linkn" onClick="javascript:openWin('../user_detail.php?id=<?=$row->id;?>', 'usersDetail<?=$row->id;?>', 1024,1200, 'yes','yes');"><? echo ucfirst(stripslashes($row->firstname)." ".stripslashes($row->lastname)); ?></a></td>
                            <td align="left"><a href="mailto:<? echo $row->email; ?>"><? echo $row->email; ?></a></td>
							<td align="center"><? echo htmlentities(stripslashes($row->gender)); ?></td>
							<td align="center"><? echo htmlentities(stripslashes($row->accounttype)); ?></td>
							<td align="left"><? echo date("m/d/Y",strtotime($row->regdate)); ?></td>
                            <td  align="center" nowrap >
							<?
							$GetTotalPictureQry="SELECT * FROM users_pictures WHERE userid='".trim($row->id)."' order by id desc";
							$GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
							$TotGetTotalPicture=mysql_affected_rows();
							
							$GetTotalVideoQry="SELECT * FROM users_videos WHERE userid='".trim($row->id)."' order by id desc";
							$GetTotalVideoQryRs=mysql_query($GetTotalVideoQry);
							$TotGetTotalVideo=mysql_affected_rows();
							
							$GetTotalMusicQry="SELECT * FROM users_musics WHERE userid='".trim($row->id)."' order by id desc";
							$GetTotalMusicQryRs=mysql_query($GetTotalMusicQry);
							$TotGetTotalMusic=mysql_affected_rows();
							
							/*$GetTotalEventQry="SELECT * FROM events WHERE userid='".trim($row->id)."' order by id desc";
							$GetTotalEventQryRs=mysql_query($GetTotalEventQry);
							$TotGetTotalEvent=mysql_affected_rows();*/
							?>
							<input name="button0" type="button" onClick="javascript:openWin('../user_detail.php?id=<?=$row->id;?>', 'usersDetail<?=$row->id;?>', 1024,1200, 'yes','yes');" value="View Profile" alt="View Profile" title="View Profile" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>View Profile</div>',BORDER,'5');" onMouseOut="return nd();">			
							<input name="button1" type="button" onClick="javascript:openWin('user_pictures.php?id=<?=$row->id;?>', 'userpictures<?=$row->id;?>', 1000,1200, 'yes','yes');" value="I (<?=$TotGetTotalPicture;?>)" alt="Images" title="Images" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>View Images</div>',BORDER,'5');" onMouseOut="return nd();">			
							<input name="button2" type="button" onClick="javascript:openWin('user_videos.php?id=<?=$row->id;?>', 'uservideos<?=$row->id;?>', 1000,1200, 'yes','yes');" value="V (<?=$TotGetTotalVideo;?>)" alt="Videos" title="Videos" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>View Videos</div>',BORDER,'5');" onMouseOut="return nd();">			
							<input name="button3" type="button" onClick="javascript:openWin('user_musics.php?id=<?=$row->id;?>', 'usermusics<?=$row->id;?>', 1000,1200, 'yes','yes');" value="A (<?=$TotGetTotalMusic;?>)" alt="Audios" title="Audios" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>View Audios</div>',BORDER,'5');" onMouseOut="return nd();">			
							<?php /*?><input name="button4" type="button" onClick="javascript:openWin('user_events.php?id=<?=$row->id;?>', 'eventdetail<?=$row->id;?>', 500,1200, 'yes','yes');return false;" value="E (<?=$TotGetTotalEvent;?>)" alt="Events" title="Events" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>View Events</div>',BORDER,'5');" onMouseOut="return nd();">			<?php */?>
						    <input name="button5" type="button" onClick="deleteconfirm('Are you sure you want to delete Talent. \n','manage_user.php?id=<?php echo($row->id); ?>');" value="D" alt="Delete User" title="Delete User" class="bttn-s" onMouseOver="return overlib('<div class=tooltip>Delete User</div>',BORDER,'5');" onMouseOut="return nd();">
							<input name="button6" type="button" onClick="window.location.href='add_user.php?id=<?php echo($row->id); ?>'" value="E" alt="Edit User" title="Edit User" class="bttn-s"  onMouseOver="return overlib('<div class=tooltip>Edit User</div>',BORDER,'5');" onMouseOut="return nd();">
							<input type="hidden" name="pid<?=$count; ?>" value="<?=$row->id;?>" >
                            <input type="hidden" name="count" value="<?=$count; ?>" >
							</td>
                          </tr>
                          <? } ?>
						   <tr>
                            <td align="left" colspan="10" ><input type="submit" name="FirstpageSubmit2" value="Approve" class="bttn-s" ><input type="submit" name="FirstpageSubmit3" value="Display Profile" class="bttn-s" ></td>
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