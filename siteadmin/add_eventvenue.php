<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php");
$mlevel=6;
$Message="";
if($_REQUEST['del']!="")
{
	$qrr=$_REQUEST['del'].'= \'\'' ;
	//echo "UPDATE products SET $qrr where id='".trim($_GET['id'])."'";
	$sql=mysql_query("UPDATE event_venues SET $qrr where id='".trim($_GET['id'])."'");	
	header("location:add_eventvenue.php?id=".$_REQUEST['id']);
	exit;
}

if(isset($_POST['Submit']))
{
	if($_GET['id'])
	{
		$strQueryPerPage="select * from event_venues where name='".addslashes($_POST["name"])."' and address='".addslashes($_POST["address"])."' and city='".addslashes($_POST["city"])."' and id!='".$_REQUEST['id']."'";
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="UPDATE event_venues SET 
					name='".addslashes($_POST["name"])."',
					country='".addslashes($_POST["country"])."',
					address='".addslashes($_POST["address"])."',
					city='".addslashes($_POST["city"])."',
					state='".addslashes($_POST["state"])."',
					zipcode='".addslashes($_POST["zipcode"])."',
					timezone='".addslashes($_POST["timezone"])."',
					contactname='".addslashes($_POST["contactname"])."',
					description='".addslashes($_POST["description"])."',
					status='".addslashes($_POST["status"])."',
					capacity='".addslashes($_POST["capacity"])."',
					url='".addslashes($_POST["url"])."',
					phone='".addslashes($_POST["phone"])."',
					fax='".addslashes($_POST["fax"])."',
					email='".addslashes($_POST["email"])."' where id='".$_REQUEST['id']."'";	
			$q=mysql_query($sql,$db);
			
			
			if($_FILES["picture"]['tmp_name'])
			{
				 $file=$_FILES["picture"];	
				//$send_name1=ereg_replace (" ", "",$file["name"]); 	
				 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
				 $filename1=rand().$send_name1;		
				 $filetoupload=$file['tmp_name'];				 
				 $path="../Venues/".$filename1; 
				 copy($filetoupload,$path);
				 $extsql2=",picture='$filename1'";
				 if($_POST["picture_old"]!="")
				 {
					$oldres=$_POST["picture_old"];
					@unlink("../Venues/$oldres");
				 }
				$AddUserQry="UPDATE event_venues SET picture='$filename1' where id='".$_REQUEST['id']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			if($_FILES["seatingchart"]['tmp_name'])
			{
				 $file=$_FILES["seatingchart"];	
				//$send_name1=ereg_replace (" ", "",$file["name"]); 	
				 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
				 $filename1=rand().$send_name1;		
				 $filetoupload=$file['tmp_name'];				 
				 $path="../Venues/".$filename1; 
				 copy($filetoupload,$path);
				 $extsql2=",seatingchart='$filename1'";
				 if($_POST["picture_old"]!="")
				 {
					$oldres=$_POST["picture_old"];
					@unlink("../Venues/$oldres");
				 }
				$AddUserQry="UPDATE event_venues SET seatingchart='$filename1' where id='".$_REQUEST['id']."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}			
			header("location:manage_eventvenue.php?msgs=3");
			exit;
		}
		else 
		{
			$Message="Event Venue already exists.";
		}
	}
	else
	{
		$strQueryPerPage="select * from event_venues where name='".addslashes($_POST["name"])."' and address='".addslashes($_POST["address"])."' and city='".addslashes($_POST["city"])."'";
		$strResultPerPage=mysql_query($strQueryPerPage);
		$strTotalPerPage=mysql_affected_rows(); 
		if($strTotalPerPage<1)
		{
			$sql="INSERT INTO event_venues SET 
					name='".addslashes($_POST["name"])."',
					country='".addslashes($_POST["country"])."',
					address='".addslashes($_POST["address"])."',
					city='".addslashes($_POST["city"])."',
					state='".addslashes($_POST["state"])."',
					zipcode='".addslashes($_POST["zipcode"])."',
					timezone='".addslashes($_POST["timezone"])."',
					contactname='".addslashes($_POST["contactname"])."',
					description='".addslashes($_POST["description"])."',
					status='".addslashes($_POST["status"])."',
					capacity='".addslashes($_POST["capacity"])."',
					url='".addslashes($_POST["url"])."',
					phone='".addslashes($_POST["phone"])."',
					fax='".addslashes($_POST["fax"])."',
					email='".addslashes($_POST["email"])."',
					addeddate=curdate()";	
			$q=mysql_query($sql,$db);
			$insertedid=mysql_insert_id();
			
			
			if($_FILES["picture"]['tmp_name'])
			{
				 $file=$_FILES["picture"];	
				//$send_name1=ereg_replace (" ", "",$file["name"]); 	
				 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
				 $filename1=rand().$send_name1;		
				 $filetoupload=$file['tmp_name'];				 
				 $path="../Venues/".$filename1; 
				 copy($filetoupload,$path);
				 $extsql2=",picture='$filename1'";
				 if($_POST["picture_old"]!="")
				 {
					$oldres=$_POST["picture_old"];
					@unlink("../Venues/$oldres");
				 }
				$AddUserQry="UPDATE event_venues SET picture='$filename1' where id='".$insertedid."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}
			if($_FILES["seatingchart"]['tmp_name'])
			{
				 $file=$_FILES["seatingchart"];	
				//$send_name1=ereg_replace (" ", "",$file["name"]); 	
				 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);	
				 $filename1=rand().$send_name1;		
				 $filetoupload=$file['tmp_name'];				 
				 $path="../Venues/".$filename1; 
				 copy($filetoupload,$path);
				 $extsql2=",seatingchart='$filename1'";
				 if($_POST["picture_old"]!="")
				 {
					$oldres=$_POST["picture_old"];
					@unlink("../Venues/$oldres");
				 }
				$AddUserQry="UPDATE event_venues SET seatingchart='$filename1' where id='".$insertedid."'";	 
				$AddUserQryRs=mysql_query($AddUserQry);
			}			
			header("location:manage_eventvenue.php?msgs=1");
			exit;
		}
		else 
		{
			$Message="Event Venue already exists.";
		}
	}	
}
if($_GET['id'])
{
	$Buttitle="Save changes";
	$SEL="SELECT * from event_venues where id='".$_GET['id']."'";
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
		alert("Please enter Event Venue name.");
		form.name.focus();
		return false;
	}
	else if(form.address.value.split(" ").join("")=="")
	{
		alert("Please enter Event Venue address.");
		form.address.focus();
		return false;
	}
	else if(form.city.value.split(" ").join("")=="")
	{
		alert("Please enter Event Venue city.");
		form.city.focus();
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
                  <td height="35" class="form111"><? if($_GET['id']){?>Edit<? } else {?>Add<? } ?> Event Venue</td>
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
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span> Venue Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="name" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->name));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"> </span> Country:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><select name="country"  id="country" class="solidinput" style="width:270px;">
								  <option value="">Select country</option>
									  <? 
										$rs11=mysql_query("select * from country    order by country_name ASC ");
										$tot11=mysql_affected_rows();
										for($m=0;$m<$tot11;$m++)
										{
										$gr22=mysql_fetch_object($rs11);
									  ?>
									  <option value="<?=$gr22->country_name?>" <? if($ROW->country==$gr22->country_name){ echo "selected";}?> ><?=stripslashes($gr22->country_name); ?></option>
									  <? }?>
								</select></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span>  Address:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="address" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->address));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a">*</span>  City:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="city" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->city));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"> </span>  State:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <select name="state"  id="state" class="solidinput" style="width:270px;">
								  <option value="">Select state</option>
									  <? 
										$rs11=mysql_query("select * from state where 	id_country=170   order by state_name ASC ");
										$tot11=mysql_affected_rows();
										for($m=0;$m<$tot11;$m++)
										{
										$gr22=mysql_fetch_object($rs11);
									  ?>
									  <option value="<?=$gr22->state_name?>" <? if($ROW->state==$gr22->state_name){ echo "selected";}?> ><?=stripslashes($gr22->state_name); ?></option>
									  <? }?>
								</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Zip / Post Code:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="zipcode" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->zipcode));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Timezone Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  	<select name="timezone" id="timezone" class="solidinput" style="width:270px;">
								<option value="America/New_York"  <? if($ROW->timezone=="America/New_York"){echo "selected";}?>>Eastern Time</option>
								<option value="America/Chicago"  <? if($ROW->timezone=="America/Chicago"){echo "selected";}?>>Central Time</option>
								<option value="America/Denver"  <? if($ROW->timezone=="America/Denver"){echo "selected";}?>>Mountain Time</option>
								<option value="America/Phoenix"  <? if($ROW->timezone=="America/Phoenix"){echo "selected";}?>>Mountain Time (Arizona)</option>
								<option value="America/Los_Angeles"  <? if($ROW->timezone=="America/Los_Angeles"){echo "selected";}?>>Pacific Time</option>
								<option value="America/Juneau"  <? if($ROW->timezone=="America/Juneau"){echo "selected";}?>>Alaskan Time</option>
								<option value="Pacific/Honolulu"  <? if($ROW->timezone=="Pacific/Honolulu"){echo "selected";}?>>Hawaiian Time</option>
								<option value="Pacific/Samoa"  <? if($ROW->timezone=="Pacific/Samoa"){echo "selected";}?>>Samoa Standard Time</option>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Contact Name:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="contactname" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->contactname));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Description:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><textarea name="description" style="width:270px;height:85px;"  type="text"  class="solidinput"><? echo (stripslashes($ROW->description));?></textarea></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Status :&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <select name="status" id="status" class="solidinput" style="width:270px;">
								<option value="General Admission" <? if($ROW->status=="General Admission"){echo "selected";}?>>General Admission</option>
								<option value="Seated" <? if($ROW->status=="Seated"){echo "selected";}?> >Seated</option>
							</select>
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Capacity:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="capacity" style="width:70px;"  value="<? echo htmlentities(stripslashes($ROW->capacity));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  URL:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="url" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->url));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Phone:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="phone" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->phone));?>" type="text"  class="solidinput"></td>
                        </tr>
                        <tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Fax:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="fax" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->fax));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Email:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top"><input name="email" style="width:270px;"  value="<? echo htmlentities(stripslashes($ROW->email));?>" type="text"  class="solidinput"></td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Picture:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <input name="picture" type="file" class="buttonclass" id="picture" />&nbsp;
						  <? if(trim($ROW->picture)!="") { ?>
						  <br>Current Image:<br><br> <img src="../Venues/<?=$ROW->picture;?>" border="0" width="200" >	
						  <? } ?>
						  <input type="hidden" id="picture_old" name="picture_old" value="<? echo $ROW->picture; ?>">
						  </td>
                        </tr>
						<tr>
                          <td width="21%" height="25" align="right" valign="top"><strong><span class="a"></span>  Seating Chart:&nbsp;</strong></td>
                          <td height="25" colspan="3" valign="top">
						  <input name="seatingchart" type="file" class="buttonclass" id="seatingchart" />&nbsp;
						  <? if(trim($ROW->seatingchart)!="") { ?>
						  <br>Current Image:<br><br> <img src="../Venues/<?=$ROW->seatingchart;?>" border="0" width="200" >	
						  <? } ?>
						  <input type="hidden" id="seatingchart_old" name="seatingchart_old" value="<? echo $ROW->seatingchart; ?>">
						  </td>
                        </tr>
						<tr>
                          <td align="right">&nbsp;</td>
                          <td width="79%" colspan="3"><INPUT type=submit name="Submit" value="<? echo $Buttitle;?>" onClick="return valid();" class="bttn-s">                          </td>
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