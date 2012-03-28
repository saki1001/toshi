<?php 
include("admin.config.inc.php"); 
include("connect.php");
include("admin.cookie.php");
include("fckeditor/fckeditor.php") ;

$mlevel=8;
if($_GET["id"])
{	
	$cid=$_GET["id"];
	
	$dqry="update users set newsletter='N' where email='".addslashes($_GET['email'])."'";
	mysql_query($dqry);	
	
	$AddUserQry="delete from subscriber where id='".addslashes($_GET['id'])."'";	 
	$AddUserQryRs=mysql_query($AddUserQry);
				
	header("location:manage_newsletter.php?msgs=15&start=".$_GET['start']."");
	exit;
}

if($_POST["sendnews"])
{
	$subject = stripslashes($_POST["news_subject"]);
	$mailnews = stripslashes($_POST["rte1"]);
	$semail = $_POST["sendn"];	
	
	//$mailcontent = "<html><body><table align='left' width='100%' cellpadding='2' cellspacing='2'><tr><td align='left'>".$mailnews."</td></tr><tr><td align='left'>&nbsp;</td></tr></table></body></html>";			
	$mailcontent="<html>
					<body>
							<table cellpadding=\"2\" cellspacing=\"2\">
									<tr>
											<Td align=\"left\" colspan=\"2\">$mailnews</td>
									</tr>
					</table>
					</body>
			</html>";
	for($i=0;$i<count($semail);$i++)
	{
		$toemail = $semail[$i];
		HtmlMailSend($toemail,$subject,$mailcontent,$ADMIN_MAIL);
	}	
	$Message="E-Mail successfully sent to $i subscriber(s)<br>";
}
	
$order=$_GET["order"];

$strQueryPerPage="select * from subscriber where 1=1 and email like '$order%' order by id desc  ";
$strResultPerPage=mysql_query($strQueryPerPage);
$strTotalPerPage=mysql_affected_rows(); 
	
if($strTotalPerPage<1)
$Error = 1;
	
if($_GET["msgs"]==1 && !$_GET["start"])
{
	$Message2 = "Newsletter subscriber added Successfully!!";
}
if($_GET["msgs"]==3 && !$_GET["start"])
{
	$Message2 = "Newsletter subscriber updated Successfully!!";
}
if($_GET["msgs"]==15 && !$_GET["start"])
{
	$Message2 = "Newsletter subscriber deleted Successfully!!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta content="MSHTML 6.00.2600.0" name=GENERATOR>
<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body bgColor="#ffffff" leftMargin="0" topMargin="0" marginwidth="0" marginheight="0">
<script language="javascript" src="body.js" ></script>
<script language="javascript" type="text/javascript"> 
<!--
function checkall()
{
	var dom = document.mngnewsletter;
	if(dom.chkall.checked == true)
	{
		for(i=0;i<dom.length;i++)
		{
			if(dom.elements[i].type == "checkbox")
			{
				dom.elements[i].checked = true;
			}
		}
	}
	else
	{
		for(i=0;i<dom.length;i++)
		{
			if(dom.elements[i].type == "checkbox")
			{
				dom.elements[i].checked = false;
			}
		}
	}
}
function checkall2()
{
	var dom = document.mngnewsletter;
	if(dom.chkall2.checked == true)
	{
		for(i=0;i<dom.length;i++)
		{
			if(dom.elements[i].type == "checkbox")
			{
				dom.elements[i].checked = true;
			}
		}
	}
	else
	{
		for(i=0;i<dom.length;i++)
		{
			if(dom.elements[i].type == "checkbox")
			{
				dom.elements[i].checked = false;
			}
		}
	}
}
function frmvalidate()
{
	var dom1 = document.mngnewsletter;
	var dom2 = document.mngnewsletter;
	var chkcount =0 ;
	
		for(i=0;i<dom1.length;i++)
		{
			if(dom1.elements[i].type == "checkbox")
			{
				if(dom1.elements[i].checked == true)
				{
					chkcount++;
				}
			}
		}
	
	if(chkcount==0)
	{
		alert("Please select atleast one E-Mail to send newsletter");
		return false;
	}
	else if(dom2.news_subject.value == "")
	{
		alert("Please enter subject for newsletter");
		dom2.news_subject.focus();
		return false;
	}
	else
	{
		return true;
	}
}//-->
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
      <td width="80%" valign="top"><table width="100%"  border=0 cellpadding="2" cellspacing="2">
          <tr>
            <td width="100%" height="35" class=form111>Manage Newsletter Subscribers </td>
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
                <td valign="top"><table cellSpacing=0 cellPadding=1 border=0  >
                      <tbody>
                        <tr>
                          <td colspan="25" height="20"><b>View By Email </b></td>
                        </tr>
                        <?=$prs_pageing->order();?>
                      </tbody>
                    </table>
					
                    <?php if(!$strTotalPerPage) { ?>
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" align="center" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="t-b">
                            <tr>
                              <td height="150" ><div align="center" ><strong>No  Newsletter Subscribers To Display</strong></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <?php } else { ?>
                    <form id="mngnewsletter" name="mngnewsletter"  method="post" enctype="multipart/form-data" action="#">
                      <table class="t-b" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                          <tr>
                            <td align="right" height="30" colspan=12><? $result=$prs_pageing->number_pageing($strQueryPerPage,$strTotalPerPage,10,"Y");?></td>
                          </tr>
                          <? if($Message) {?>
                          <tr>
                            <td colspan="3" align="center"  ><font color="#FF0000"><? echo $Message; ?></font></td>
                          </tr>
                          <? } ?>
                          <tr class="form_back" >
                            <td  align="left"><strong>Newsletter Subscribers </strong></td>
							<td  align="left" ><strong>Date</strong></td>
                            <td   align="center" nowrap="nowrap"><strong>All</strong>&nbsp;
                              <input type="checkbox" name="chkall2" value="Y" onClick="checkall2();" class="inputCheck"/></td>
                            <td align="center" nowrap="nowrap"><strong>Options</strong> </td>
                          </tr>
                          <?
								  while($row =mysql_fetch_object($result))
								  {
							  ?>
                          <tr>
                            <td  align="left"><a href="mailto:<? echo $row->email; ?>" ><? echo $row->email; ?></a>&nbsp;</td>
							<td  align="left"><? echo date("m/d/Y h:i:s",strtotime($row->sdate)); ?>&nbsp;</td>
                            <td  align="center" width="63"><input type="checkbox" value="<?php echo($row->email); ?>" name="sendn[]" class="inputCheck"/>
                            </td>
                            <td  align="center" width="90"><input name="button2" type="button" onClick="deleteconfirm('Are you sure you want to delete Newsletter subscriber?. \n','manage_newsletter.php?id=<?php echo($row->id); ?>&email=<?php echo($row->email); ?>');" value="Delete" class="bttn-s">
                            </td>
                          </tr>
                          <? } ?>
                          <tr>
                            <td align="right" colspan="2" >Check/Uncheck All</td>
                            <td align="center" ><input type="checkbox" name="chkall" value="Y" onClick="checkall();" class="inputCheck"/></td>
                            <td  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td  colspan="4"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="18%" align="right" ><strong>Mail Subject:&nbsp;</strong></td>
                                  <td width="80%" ><input name="news_subject" type="text" size="100" class="solidinput"/></td>
                                </tr>
                                <tr>
                                  <td   align="right" valign="top"><strong>Mail Content:&nbsp;</strong></td>
                                  <td >
								  <?php
										$oFCKeditor = new FCKeditor('rte1') ;
										$oFCKeditor->BasePath = 'fckeditor/';
										$oFCKeditor->Value = $pgdes;
										$oFCKeditor->Height = 450;
										$oFCKeditor->Width = 650;
										$oFCKeditor->Create() ;
								?>
								  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td  align="left" ><input type="submit" value="Send Newsletter" name="sendnews" id="sendnews" class="bttn-s" onClick="return frmvalidate();"></td>
                                </tr>
                              </table></td>
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