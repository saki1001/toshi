<?
include("connect.php");
if(mysql_real_escape_string(trim($_GET['venueid']))>0 && mysql_real_escape_string(trim($_GET['venueid']))!="")
{
	$ProductQry="SELECT * FROM event_venues WHERE id=".mysql_real_escape_string(trim($_GET['venueid']))." order by id desc";
	$ProductQryRs=mysql_query($ProductQry);
	$TotProduct=mysql_affected_rows();
	if($TotProduct<=0)
	{
		header("location:index.php");
		exit;
	}
	$ProductQryRow=mysql_fetch_array($ProductQryRs);
}
else
{
	header("location:index.php");
	exit;
}

$Address_1 = stripslashes($ProductQryRow['address']);
$city = stripslashes($ProductQryRow['city']);
$state= stripslashes($ProductQryRow['state']);
$zipcode = stripslashes($ProductQryRow['zipcode']);
$country = stripslashes($ProductQryRow['country']);
$venuename = stripslashes($ProductQryRow['name']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Event Venue | <? echo $venuename;?> | <? echo $Address_1;?> | <? echo $city;?> | <? echo $state;?> | <? echo $SITE_NAME;?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script language="javascript1.1" type="text/javascript" src="ajax_validation.js"></script>


<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAP7O6asA4s-Lj9mxPSov7bBSiwO7XqZxZOl7arWrP8gQ7-qW6yhQhezlKHaWMYqnD5XtBF_w_cV4OrQ" type="text/javascript"></script>

<script type="text/javascript">
var map ;
function load() {
  if (GBrowserIsCompatible()) {
	map = new GMap2(document.getElementById("map"));
	map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());
	map.addControl(new GOverviewMapControl ()); 
  }
}
var geocoder = new GClientGeocoder();
function showaddresses()
{
  //var hideaddress ='84 Hillside Avenue, Williston Park, NY, 11596';
  var hideaddress ='<?=$Address_1?> , <?=$city?>, <?=$state?>, <?=$zipcode?>';
  showAddress(hideaddress);
}
function showAddress(address) {
  geocoder.getLatLng(
    address,
    function(point) {
      if (!point) {
        alert(address + " not found");
      } else {
        map.setCenter(point, 15);
        var marker = createMarker(point,address);
        map.addOverlay(marker);
      }
    }
  );
}
function createMarker(point,address) 
{
var marker = new GMarker(point);  
GEvent.addListener(marker, "click", function() {	
http://watsonmatthews.com/beta/property-{$pr.id}.php
 marker.openInfoWindowHtml("<div style='width:200px;height:150; class=gray12' ><table celspacing=5><tr><td class=gray12 ><strong><? echo $venuename;?><br></strong>"+ address + "</td></tr></div>");
});
return marker;
}
function myclick(i) {
GEvent.trigger(gmarkers[i],"click");
window.location.href="#showmethemap";
}
</script>
</head>
<body id="page5" onload="load();showaddresses()" onUnload="GUnload();">
<div class="body1">
<form name="FrmProdetailpageRating" id="FrmProdetailpageRating" enctype="multipart/form-data" method="post">
  <table width="850" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr align="left" valign="top">
      <td ><table width="850" align="center" cellpadding="0" cellspacing="0">
          
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="850" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="top" ><table width="100%" border="0" cellpadding="8" cellspacing="0" class="border_red">
                            <tr>
                              <td height="34" align="left" valign="top" style="padding:5px;font-size:18px;" ><strong>Venue Details</strong></td>
                            </tr>
                            <? if($message==""){?>
							<tr>
                              <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="400" align="left" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td align="left" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
													<Td colspan="3" style="padding:5px;">
													<Table cellpadding="0" cellspacing="0" width="100%"> 
															<tr>
																<Td colspan="2">
																	<A HREF='#' class="link1" style="color:#990000;"><font size=2><b><u><? echo stripslashes($venuename);?></u></b></font></A> <font size="1"></font>															</Td>
															</tr>
															<tr>
																<td width="31%" align="left">Address:</td>
																<td width="69%" align="left"><? echo $Address_1;?></td>
															</tr>
															<tr>
																<td align="left">City:</td>
																<td align="left"><? echo $city;?></td>
															</tr>
															<tr>
																<td align="left">State:</td>
																<td align="left"><? echo $state;?></td>
															</tr>
															<tr>
																<td align="left">Zipcode:</td>
																<td align="left"><? echo $zipcode;?></td>
															</tr>
															<tr>
																<td align="left">Country:</td>
																<td align="left"><? echo $country;?></td>
															</tr>
															<? if($ProductQryRow['timezone']!=''){?>
															<tr>
																<td align="left">Timezone:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['timezone']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['contactname']!=''){?>
															<tr>
																<td align="left">Contact Name:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['contactname']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['status']!=''){?>
															<tr>
																<td align="left">Status:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['status']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['capacity']!=''){?>
															<tr>
																<td align="left">Capacity:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['capacity']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['url']!=''){?>
															<tr>
																<td align="left">Url:</td>
																<td align="left"><a href="<? echo WebsiteWithProperUrl(stripslashes($ProductQryRow['url']));?>" target="_blank"><? echo stripslashes($ProductQryRow['url']);?></a></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['phone']!=''){?>
															<tr>
																<td align="left">Phone No.:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['phone']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['fax']!=''){?>
															<tr>
																<td align="left">Fax:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['fax']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['email']!=''){?>
															<tr>
																<td align="left">Email:</td>
																<td align="left"><? echo stripslashes($ProductQryRow['email']);?></td>
															</tr>
															<? } ?>
															<? if($ProductQryRow['seatingchart']!=''){?>
															<tr>
																<td align="left">Seating Chart:</td>
																<td align="left"><a href="Venues/<? echo stripslashes($ProductQryRow['seatingchart']);?>" target="_blank"><img src="onlinethumb.php?nm=Venues/<? echo stripslashes($ProductQryRow['seatingchart']);?>&mheight=150&mwidth=200"></a></td>
															</tr>
															<? } ?>
														</Table></td>
												  </tr>
                                                    
													<tr>
                                                      <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                  </table></td>
                                              </tr>
                                              
                                            </table></td>
                                        </tr>
                                      </table></td>
                                    <td valign="top">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="center">&nbsp;</td>
											</tr>
										    <? if($ProductQryRow['picture']!=''){?>
											<tr>
												<td align="center" style="padding-bottom:15px;"><a href="Venues/<? echo stripslashes($ProductQryRow['picture']);?>" target="_blank"><img src="onlinethumb.php?nm=Venues/<? echo stripslashes($ProductQryRow['picture']);?>&mheight=150&mwidth=400"></a></td>
											</tr>
											<? } ?>
											<tr>
												<td align="center"><div id="map" class="gray12" style="width: 400px; height: 270px"></div></td>
											</tr>
										</table>
									</td>
                                    
                                  </tr>
                                </table></td>
                            </tr>
							<? }else {?>
							<tr><td align="center" height="380" valign="middle" class="font-12-red"><?=$message;?></td></tr>
							<? } ?>
                          </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<script language="javascript" type="text/javascript">
function frmcheck()
{
	form=document.FrmProdetailpageRating;	
	if(form.friendname.value=="")
	{
		alert("Please enter friend's name.");
		form.friendname.focus();
		return false;
	}
	else if(form.friendemail.value=="")
	{
		alert("Please enter friend's email address.");
		form.friendemail.focus();
		return false;
	}
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.friendemail.value)))
	{
		alert("Please enter a proper email address.");
		form.friendemail.focus();
		return false;
	}
	else if(form.yourname.value=="")
	{
		alert("Please enter your name.");
		form.yourname.focus();
		return false;
	}
	else if(form.youremail.value=="")
	{
		alert("Please enter your email.");
		form.youremail.focus();
		return false;
	}
	else if(form.emailsubject.value=="")
	{
		alert("Please enter subject.");
		form.emailsubject.focus();
		return false;
	}
	else if(form.message.value=="")
	{
		alert("Please enter your message.");
		form.message.focus();
		return false;
	}
	else
	{
		form.HidSubmitAddUser.value=1;
		//form.submit();
		return  true;	
	}	
}
</script>
</div>
</body>
</html>