<? include("connect.php"); 
$ACTIVEPAGE='events';
$SESSION_PRODUCTID2 = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
if($SESSION_PRODUCTID2 > 0)
{}
else
{
	header("Location:$SITE_URL/viewcart.php");
	exit;
}


if($_POST['HidContinueCheckout']=="1")
{
		$_SESSION['cctype'] = addslashes($_POST['cardtype']);
		$_SESSION['ccnumber'] = addslashes($_POST['cnumber']);	
		$_SESSION['ccmonth'] = addslashes($_POST['month']);	
		$_SESSION['ccyear'] = addslashes($_POST['year']);	
		$_SESSION['cvv'] = addslashes($_POST['cvv']);							
		$_SESSION['ship_fname'] = addslashes($_POST['ship_firstname']);					
		$_SESSION['ship_lname'] = addslashes($_POST['ship_lastname']);
		$_SESSION['ship_address1'] = addslashes($_POST['ship_address1']);
		$_SESSION['ship_address2'] = addslashes($_POST['ship_address2']);
		$_SESSION['ship_city'] = addslashes($_POST['ship_city']);
		$_SESSION['ship_state'] = addslashes($_POST['ship_state']);
		$_SESSION['ship_country'] = addslashes($_POST['ship_country']);
		$_SESSION['ship_zipcode'] = addslashes($_POST['ship_zip']);
		$_SESSION['ship_day_telephone'] = addslashes($_POST['ship_phone']);					
		$_SESSION['fname'] = addslashes($_POST['firstname']);					
		$_SESSION['lname'] = addslashes($_POST['lastname']);
		$_SESSION['address1'] = addslashes($_POST['address1']);
		$_SESSION['address2'] = addslashes($_POST['address2']);
		$_SESSION['city'] = addslashes($_POST['city']);
		$_SESSION['state'] = addslashes($_POST['state']);
		$_SESSION['country'] = addslashes($_POST['country']);
		$_SESSION['zipcode'] = addslashes($_POST['zip']);
		$_SESSION['day_telephone'] = addslashes($_POST['phone']);
		$_SESSION['email'] = addslashes($_POST['email']);
			
		header("location:orderreview.php");
		exit;
}


  function fillsstate($scountry, $sstate)
  {
	if($scountry!="")
	{
		$qry="SELECT state_name from state where id_country=(SELECT id_country from country where country_name='".$scountry."') order by state_name";
		$res=mysql_query($qry);
		$statelist="<select name='ship_state' id='ship_state' class='register_textfield2' style='width:153px; ' ><option value=''>Select State</option>";
		if(mysql_affected_rows()>0)
		{
		  while($row=mysql_fetch_array($res))
		  {
			if($sstate==$row['state_name'])
			  $statelist.="<option value='".$row['state_name']."' selected>".$row['state_name']."</option>";
			else
			  $statelist.="<option value='".$row['state_name']."'>".$row['state_name']."</option>";
		  }
		}
		$statelist.="</select>";
		echo $statelist;
	}
  }

  function fillbstate($bcountry, $bstate)
  {
	if($bcountry!="")
	{
		$qry="SELECT state_name from state where id_country=(SELECT id_country from country where country_name='".$bcountry."') order by state_name";
		$res=mysql_query($qry);
		$statelist="<select name='state' id='state' class='register_textfield2' style='width:153px;' ><option value=''>Select State</option>";
		if(mysql_affected_rows()>0)
		{
		  while($row=mysql_fetch_array($res))
		  {
			if($bstate==$row['state_name'])
			  $statelist.="<option value='".$row['state_name']."' selected>".$row['state_name']."</option>";
			else
			  $statelist.="<option value='".$row['state_name']."'>".$row['state_name']."</option>";
		  }
		}
		$statelist.="</select>";
		echo $statelist;
	}
  }
if($SelUserInfoRow->ship_country=="") {$scountry="USA";}else{$scountry=$SelUserInfoRow->ship_country;}
if($SelUserInfoRow->country=="") {$bcountry="USA";}else{$bcountry=$SelUserInfoRow->country;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo $SITE_NAME;?></title>
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

<script type="text/JavaScript" language="javascript" src="ajax_validation.js"></script>
</head>
<body id="page5">
<script language="javascript" type="text/javascript">
var xmlHttp;
function ajaxFunction()
{
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
}
function updatestate(cname,updatename,spanid)
{
  ajaxFunction();
  xmlHttp.open("GET","updatestate.php?name="+cname+"&cmbname="+updatename,true);
  xmlHttp.onreadystatechange=function()
    {
    if(xmlHttp.readyState==4)
      {
	  	document.getElementById(spanid).innerHTML=xmlHttp.responseText;
      }
    }
  xmlHttp.send(null);
}
function fillst()
{
	form=document.frmShipInfo;
	form.ship_state.selectedIndex=form.state.selectedIndex;
}

ocntid=0;
ostid=0;
function chk_ship()
{
	form=document.frmShipInfo;
	if(form.sameasship.checked)
	{
		form.ship_firstname.value=form.firstname.value;
		form.ship_lastname.value=form.lastname.value;		
		form.ship_address1.value=form.address1.value;
		form.ship_address2.value=form.address2.value;
		form.ship_city.value=form.city.value;
		form.ship_zip.value=form.zip.value;
		form.ship_phone.value=form.phone.value;
		ocntid=form.country.selectedIndex;
		if(ocntid!=0)
		   ostid=form.state.selectedIndex;
		form.ship_country.selectedIndex=form.country.selectedIndex;
		//updatestate(form.country.value,'sstate','sstate1');
		LoadCountry_States('LoadCountr_States_ID2',form.country.value,'ship_state','188')
		//r=setTimeout("fillst()",1000);
	}
	else
	{
		form.ship_firstname.value="";
		form.ship_lastname.value="";
		form.ship_address1.value="";
		form.ship_address2.value="";
		form.ship_city.value="";
		form.ship_zip.value="";
		form.ship_phone.value="";
		form.ship_country.selectedIndex=0;
		//updatestate(form.ship_country.value,'sstate','sstate1');
		LoadCountry_States('LoadCountr_States_ID2',form.ship_country.value,'ship_state','188')
		//r=setTimeout("fillst2()",1000);
	}
}

function fillst2()
{
	form=document.frmShipInfo;
	form.ship_state.selectedIndex=ostid;
}
function FrmChkInfo()
{
	form=document.frmShipInfo;
	if(form.firstname.value.split(" ").join("")=="")
	{
		alert("Please enter first name.")
		form.firstname.focus();
		return false;
	}
	if(form.lastname.value.split(" ").join("")=="")
	{
		alert("Please enter last name.")
		form.lastname.focus();
		return false;
	}
	if(form.address1.value.split(" ").join("")=="")
	{
		alert("Please enter billing address line 1.")
		form.address1.focus();
		return false;
	}
	if(form.city.value.split(" ").join("")=="")
	{
		alert("Please enter city.")
		form.city.focus();
		return false;
	}
	
	if(form.country.value.split(" ").join("")=="")
	{
		alert("Please enter billing country.")
		form.country.focus();
		return false;
	}
	if(form.state.value.split(" ").join("")=="")
	{
		alert("Please select billing state.")
		form.state.focus();
		return false;
	}
	if(form.zip.value.split(" ").join("")=="")
	{
		alert("Please enter billing zip code.")
		form.zip.focus();
		return false;
	}
	if(form.phone.value.split(" ").join("")=="")
	{
		alert("Please enter billing phone number.")
		form.phone.focus();
		return false;
	}
	if(form.email.value.split(" ").join("")=="")
	{
		alert("Please enter email address.")
		form.email.focus();
		return false;
	}
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)))
	{
			alert("Please enter a proper email address.");
			form.email.focus();
			return false;
	}
	if(form.ship_firstname.value.split(" ").join("")=="")
	{
		alert("Please enter shipping first name.")
		form.ship_firstname.focus();
		return false;
	}
	if(form.ship_lastname.value.split(" ").join("")=="")
	{
		alert("Please enter shipping first name.")
		form.ship_lastname.focus();
		return false;
	}
	if(form.ship_address1.value.split(" ").join("")=="")
	{
		alert("Please enter shipping address line 1.")
		form.ship_address1.focus();
		return false;
	}
	if(form.ship_city.value.split(" ").join("")=="")
	{
		alert("Please enter shipping city.")
		form.ship_city.focus();
		return false;
	}
	
	if(form.ship_country.value.split(" ").join("")=="")
	{
		alert("Please enter shipping country.")
		form.ship_country.focus();
		return false;
	}
	if(form.ship_state.value.split(" ").join("")=="")
	{
		alert("Please select shipping state.")
		form.ship_state.focus();
		return false;
	}
	if(form.ship_zip.value.split(" ").join("")=="")
	{
		alert("Please enter shipping zip code.")
		form.ship_zip.focus();
		return false;
	}
	if(form.ship_phone.value.split(" ").join("")=="")
	{
		alert("Please enter shipping phone number.")
		form.ship_phone.focus();
		return false;
	}
	/*if(form.shippingmethod.value.split(" ").join("")=="")
	{
		alert("Please select shipping method.")
		form.shippingmethod.focus();
		return false;
	}*/
	
	if(document.frmShipInfo.cardtype.value=="")	
    {
    	alert("Please select the credit card type.");
		document.frmShipInfo.cardtype.focus();
		return false;
 	}
  
  	if(document.frmShipInfo.cnumber.value=="")
  	{
  		alert("Please enter credit card number.");
		document.frmShipInfo.cnumber.select();
		return false;
  	}
	if(document.frmShipInfo.cnumber.value)
  	{
    	var ccnum = document.frmShipInfo.cnumber.value;
	
		if(isNaN(ccnum))
		{
	   		alert("Invalid credit card number.") ;
	  		document.frmShipInfo.cnumber.select();
	  		return false;
	  	}
		if(document.frmShipInfo.cnumber.value.length < 13 || document.frmShipInfo.cnumber.value.length > 16)
		{
	   		alert("Please check the credit card number.") ;
	  		document.frmShipInfo.cnumber.select();
	  		return false;
	    }
		if(document.frmShipInfo.cvv.value == "")
		{
			alert("Please enter card security code.");
			document.frmShipInfo.cvv.focus();
			return false;
		}
		if(isNaN(document.frmShipInfo.cvv.value))
		{
		  alert("Invalid card security code.");
		  document.frmShipInfo.cvv.focus();
		  return false;
		}
		  if(document.frmShipInfo.month.value=="")
		  {
			 alert("Please select the month.");
			 document.frmShipInfo.month.focus();
			 return false;
		  }
		  else
		  {
			 var today;
			 today=new Date();
			 
			 var mon;
			 mon=today.getMonth();
			
			 var year;
			 jyear=today.getYear();
			 if(document.frmShipInfo.year.value!="")
			 {
				if(document.frmShipInfo.year.value==jyear && document.frmShipInfo.month.value < mon)
				{
				  alert("Credit card is expired.");
				  document.frmShipInfo.month.focus();
				  return false;
				}
				else
				{
				   if(document.frmShipInfo.year.value < jyear)
				   {
						alert("Credit card is expired.");
						document.frmShipInfo.year.focus();
						return false;
				   }
				}
			}	
		  }
		if(document.frmShipInfo.year.value=="")
		{
	   		alert("Please select the year of credit card expiration.");
	   		document.frmShipInfo.year.focus();
	   		return false;
		}
		else
		{
			var today;
	 		today=new Date();
	 
	 		var mon;
	 		var tempmonth;
	 
	 		mon=today.getMonth();
	 
	 		var year;
	 		jyear=today.getYear();
	 
	 		var m = document.frmShipInfo.month.value;
	  
	 		var ml = m.length;
	 		var mchat = m.substring(0,1);
	 
	 		if(mchat==0)
	 		{
	  
	   			var lchr=m.substring(1);
		 		if(m=='01')  
		 		{
		   			tempmonth=0;
		 		}
		 		else
		 		{
	       			tempmonth=lchr;
		 		}  
	 		} 
	 		else
	 		{
	   			tempmonth=document.frmShipInfo.month.value;
	 		}
	
	 		if(document.frmShipInfo.year.value==jyear && tempmonth < mon)
	 		{
		  		alert("Credit card is expired.");
		  		document.frmShipInfo.month.focus();
		  		return false;
	 		}
	 		else
	 		{
		 		if(document.frmShipInfo.year.value < jyear)
		 		{
					alert("Credit card is expired.");
					document.frmShipInfo.year.focus();
					return false;
		 		}
     		}
		}
	}
	
	form.HidContinueCheckout.value=1;
	form.submit();
	return true;
}

var xmlHttp;
function ajaxFunction()
{
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
/*  xmlHttp.onreadystatechange=function()
    {
    if(xmlHttp.readyState==4)
      {
      document.myForm.time.value=xmlHttp.responseText;
      }
    }
  xmlHttp.open("GET","time.asp",true);
  xmlHttp.send(null);  */
}
function promodisc(pmcode)
{
  ajaxFunction();
//  document.getElementById('btn1').style.visibility="hidden";
//  document.getElementById('proc').style.visibility="visible";
  tot=0; 
  spcost1=document.getElementById("carttotal").value;
  xmlHttp.open("GET","getpromodisc.php?pmcode="+pmcode+"&tot="+spcost1,true);
  xmlHttp.onreadystatechange=function()
    {
    if(xmlHttp.readyState==4)
      {
	  	//prompt("no",xmlHttp.responseText);
	  	discval=parseFloat(xmlHttp.responseText);
		document.getElementById("promomsg").innerHTML="";
		if(discval=="0")
		{
			//alert("No such promocode available.");
			document.getElementById("promomsg").innerHTML="No such promocode available.";
			discval=0;
			
		}
		else if(discval=="-1")
		{
			//alert("No such promocode available.");
			document.getElementById("promomsg").innerHTML="Sorry, this promocode is no longer valid.";
			discval=0;
					
		}
		else if(discval=="-2")
		{
			//alert("No such promocode available.");
			document.getElementById("promomsg").innerHTML="Promocode not avilable for this amount.";
			discval=0;
			
		}
		else if(discval=="-3")
		{
			//alert("No such promocode available.");
			document.getElementById("promomsg").innerHTML="Sorry, Promocode already used.";
			discval=0;
		}
		else if(discval=="-4")
		{
			//alert("No such promocode available.");
			document.getElementById("promomsg").innerHTML="Promocode is not avilable for you.";
			discval=0;
		}
		else if((eval(tot)+eval(spcost1)-eval(discval))<0)
		{
			// alert("Please note, this promo code is invalid for this purchase. The promo code amount must be equal to or less than the purchase amount.");
			document.getElementById("promomsg").innerHTML="Please note, this promo code is invalid for this purchase. The promo code amount must be equal to or less than the purchase amount.";
			discval=0;
		}
		else
		{
			document.getElementById("promomsg").innerHTML="You will get $"+discval.toFixed(2)+" discount.";
		}
//		document.getElementById('proc').style.visibility="hidden";
//		document.getElementById('btn1').style.visibility="visible"; 
      }
    }
  xmlHttp.send(null);
}
</script>
<div class="body1">
  <div class="main">
    <!-- header -->
    <? include("top.php");?>
    <div class="ic">
      <div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div>
    </div>
    <!-- / header -->
    <!-- content -->
    <article id="content">
      <div class="wrapper">
        <div class="pad_left2 relative">
          <h4 class="color3"><span>Buy Ticket </span></h4>
          <? if($_REQUEST['msg']){?>
          <div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div>
          <? } ?>
          <div class="wrapper">
            <div class="box1" >
              <div class="" >
                <div class="wrapper" >
                  <section class="col1_1" style="width:830px;">
                    <h2><strong style="width:155px;">Checkout</strong></h2>
                    <div class="pad_bot1" style="border:10px solid;" align="center">
                      <figure>
                        <form name="frmShipInfo" id="frmShipInfo"  enctype="multipart/form-data" method="post">
									  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
										<tr>
										  <td style="padding:5px;" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td align="center" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
													<tr>
														<td align="left" valign="middle" >&nbsp;</td>
													</tr>
													<?
													$SESSION_PRODUCTID = isset($_SESSION['SESSION_PRODUCTID']) ? $_SESSION['SESSION_PRODUCTID'] : 0;
													$SESSION_QUANTITY = isset($_SESSION['SESSION_QUANTITY']) ? $_SESSION['SESSION_QUANTITY'] : 0;
													$SESSION_CUSTOMIZE = isset($_SESSION['SESSION_CUSTOMIZE']) ? $_SESSION['SESSION_CUSTOMIZE'] : 0;
													$SESSION_PRICE = isset($_SESSION['SESSION_PRICE']) ? $_SESSION['SESSION_PRICE'] : 0;
													if($SESSION_PRODUCTID > 0)
													{
														$cartflag = 1;
												  ?>
													<tr>
													  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
														  <tr>
															<td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																  <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="search_box_bg">
																	  <tr>
																	   <td width="48%" align="left" style="padding-left:3px;" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Event</strong></td>
																		<td width="6%" align="center" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Qty.</strong></td>
																		<td width="16%" align="center" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Price</strong></td>
																		<td width="15%" align="center" valign="middle" bgcolor="#999999" class="font-12-wit"><strong>Sub Total</strong></td>
																		<td width="3%" align="center" valign="middle" bgcolor="#999999">&nbsp;</td>
																	  </tr>
																	  <?
																	  for($i=0;$i<count($SESSION_PRODUCTID);$i++)
																	  {
																		$totalcost = $SESSION_PRICE[$i]*$SESSION_QUANTITY[$i];
																		$subtotal = $subtotal +  $totalcost;
																		$_SESSION['total'] = int_to_Decimal($subtotal);
																		$_SESSION['SESSION_TOTAL'] = int_to_Decimal($subtotal);
																		$_SESSION['finaltotal']=int_to_Decimal($subtotal);
																		$ProductName=stripslashes(GetName1("events","name","id",$SESSION_PRODUCTID[$i]));
																	  ?>
																	  <tr  style="background-color:#FFFFFF;">
																		<td height="35" align="left" style="padding-left:2px;background-color:#FFFFFF;" valign="middle" class="border-right">
																		<a href="eventdetail.php?eventId=<?=$SESSION_PRODUCTID[$i];?>"><?=$ProductName;?></a>
																		<input type="hidden" name="val<?=$i;?>" value="<?=$i;?>@<?=$SESSION_PRODUCTID[$i];?>" />
																	  <input type="hidden" name="i" value="<?=$i;?>"  />
																	  <input type="hidden" name="size<?=$i;?>" value="<?=$SESSION_CUSTOMIZE[$i];?>" />
																		</td>
																		<td height="35" align="center" valign="middle" class="border-right" style="background-color:#FFFFFF;"><?=$SESSION_QUANTITY[$i];?></td>
																		<td height="35" align="center" valign="middle" class="border-right" style="background-color:#FFFFFF;">$<?=int_to_Decimal($SESSION_PRICE[$i]);?></td>
																		<td height="35" align="center" valign="middle" class="border-right" style="background-color:#FFFFFF;">$<?=int_to_Decimal($totalcost);?></td>
																		<td height="35" align="center" valign="middle" style="background-color:#FFFFFF;"><img src="images/close.png" onClick="window.location.href='update_cart.php?DelItem=YES&priceid=<?=$SESSION_CUSTOMIZE[$i];?>&pid=<?=$SESSION_PRODUCTID[$i];?>'" style="cursor:pointer;"  alt="Click to remove item" height="20" title="Click to remove item"/></td>
																	  </tr>
																	  <? } ?>
																	</table></td>
																</tr>
																
															  </table></td>
														  </tr>
														</table></td>
													</tr>
													<? }  ?>
													<tr>
														<td align="left" valign="middle" >&nbsp;</td>
													</tr>
													<tr>
													  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
														  <tr>
															<td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
																<tr>
																	<td align="left" valign="middle" bgcolor="#999999" class="font_13_blk"><strong>Addresses</strong></td>
																  </tr>
																<tr>
																  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																	  <tr>
																		<td width="50%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																			  <td height="30" align="left" valign="top" class="font_14_blu"  ><strong>Billing Information</strong></td>
																			</tr>
																			<tr>
																			  <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
																				  <tr>
																					<td width="32%" align="left" valign="middle">First Name: <span class="font_13_red">*</span></td>
																					<td width="68%" align="left" valign="middle"><input name="firstname" type="text" style="width:153px;" class="register_textfield2" id="firstname" value="<?=$_SESSION['fname'];?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Last Name: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="lastname" type="text" style="width:153px;" class="register_textfield2" id="lastname" value="<?=stripslashes($_SESSION['lname']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Address1: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="address1" type="text" style="width:153px;" class="register_textfield2" id="address1" value="<?=stripslashes($_SESSION['address1']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Address2:</td>
																					<td align="left" valign="middle"><input name="address2" type="text" style="width:153px;" class="register_textfield2" id="address2" value="<?=stripslashes($_SESSION['address2']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">City: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="city" type="text" style="width:153px;" class="register_textfield2" id="city" value="<?=stripslashes($_SESSION['city']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Country: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><select name="country" id="country"  class="register_textfield2" style="width:153px;" onChange="LoadCountry_States('LoadCountr_States_ID',this.value,'state','153');" >
																						<option value="">Select Country</option>
																						<?=GetDropdown(country_name,country_name,country,' order by country_name asc',$_SESSION['country']);?>
																				  </select></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">State/Province: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle" id="LoadCountr_States_ID"><span id="bstate2"><?  fillbstate($bcountry,$_SESSION['state']); ?></span></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Zip Code: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="zip" type="text" style="width:153px;" class="register_textfield2" id="zip" value="<?=stripslashes($_SESSION['zipcode']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Phone#: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="phone" type="text" style="width:153px;" class="register_textfield2" id="phone" value="<?=stripslashes($_SESSION['day_telephone']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle">Email: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="email" type="text" style="width:153px;" class="register_textfield2" id="email" value="<?=stripslashes($_SESSION['email']);?>"/></td>
																				  </tr>
																				</table></td>
																			</tr>
																		  </table></td>
																		<td width="50%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																			  <td height="30" align="left" valign="top" class="font_14_blu"><strong>Shipping Information</strong><span class="font-12-gra">&nbsp;<input type="checkbox" name="sameasship" onClick="chk_ship();" /> Same as Billing</span></td>
																			</tr>
																			<tr>
																			  <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
																				  <tr>
																					<td width="32%" align="left" valign="middle" class="txt_grey12_ari">First Name: <span class="font_13_red">*</span></td>
																					<td width="68%" align="left" valign="middle"><input name="ship_firstname" type="text" style="width:153px;" class="register_textfield2" id="ship_firstname" value="<?=stripslashes($_SESSION['ship_fname']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">Last Name: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="ship_lastname" type="text" style="width:153px;" class="register_textfield2" id="ship_lastname" value="<?=stripslashes($_SESSION['ship_lname']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">Address1: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="ship_address1" type="text" style="width:153px;" class="register_textfield2" id="ship_address1" value="<?=stripslashes($_SESSION['ship_address1']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">Address2:  </td>
																					<td align="left" valign="middle"><input name="ship_address2" type="text" style="width:153px;" class="register_textfield2" id="ship_address2" value="<?=stripslashes($_SESSION['ship_address2']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">City: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="ship_city" type="text" style="width:153px;" class="register_textfield2" id="ship_city" value="<?=stripslashes($_SESSION['ship_city']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">Country: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><select name="ship_country" id="ship_country"  class="register_textfield2"   style="width:153px;"   onchange="LoadCountry_States('LoadCountr_States_ID2',this.value,'ship_state','153');" >
																								<option value="">Select Country</option>
																								<?=GetDropdown(country_name,country_name,country,' order by country_name asc',$_SESSION['ship_country']);?>
																						  </select></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">State/Province: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle" id="LoadCountr_States_ID2"><span id="sstate1"><? fillsstate($scountry,$_SESSION['ship_state']); ?></span></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">Zip Code: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="ship_zip" type="text" style="width:153px;" class="register_textfield2" id="ship_zip" value="<?=stripslashes($_SESSION['ship_zipcode']);?>"/></td>
																				  </tr>
																				  <tr>
																					<td align="left" valign="middle" class="txt_grey12_ari">Phone#: <span class="font_13_red">*</span></td>
																					<td align="left" valign="middle"><input name="ship_phone" type="text" style="width:153px;" class="register_textfield2" id="ship_phone" value="<?=stripslashes($_SESSION['ship_day_telephone']);?>"/></td>
																				  </tr>
																				</table></td>
																			</tr>
																		  </table></td>
																	  </tr>
																	</table></td>
																</tr>
																
																<?php /*?><tr>
																	<td align="left" valign="middle" bgcolor="#999999" class="font_13_blk"><strong>Shipping </strong></td>
																</tr>
																<tr>
																	<td valign="top">
																		<table width="100%" align="right" border="0" cellspacing="5" cellpadding="0">
                                                                    		<tr>
																			  <td width="16%" align="left">Shipping Method: <span class="font_13_red">*</span></td>
																			  <td width="34%"><select name="shippingmethod" id="shippingmethod" class="register_textfield2" style="width:153px;" onchange="ShippingMethoadChange('ShippingMethoadChange_ID',this.value,'Finaltotal_ID')">
                                                                                <option value="">Select</option>
                                                                                <?=GetDropdown(id,methoad,shippingmethoad,' order by methoad asc',$_SESSION['ShippingMethoad']);?>
                                                                              </select></td>
																			  <td width="50%" align="left" class="font_13_red" ><span id="ShippingMethoadChange_ID"></span></td>
																			</tr>
																		  </table>
																	</td>
																</tr> <?php */?> 
																<tr>
																	<td align="left" valign="middle" >&nbsp;</td>
																</tr>
																<tr>
																	<td align="left" valign="middle" bgcolor="#999999" class="font_13_blk"><strong>Payment Information </strong></td>
																</tr>
																<tr>
																	<td valign="top" style="padding-top:10px;">
																		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
																		<tr>
																		  <td width="16%" align="left" valign="middle" >Card Type: <span class="font_13_red">*</span></td>
																		  <td width="84%"  align="left" valign="middle"><select name="cardtype" id="cardtype" class="register_textfield2" style="width:153px;">
																			  <option value="">Select Card Type</option>
																			  <?=GetDropdown(cardtype,cardtype,cardtype,' order by id asc',$_SESSION['cctype']);?>
																		  </select></td>
																		</tr>
																		<tr>
																		  <td align="left" valign="middle">Card Number: <span class="font_13_red">*</span></td>
																		  <td  align="left" valign="middle"><input name="cnumber" type="text" style="width:153px;" class="register_textfield2" id="cnumber" value="<? echo $_SESSION['ccnumber'];?>"  maxlength="16" autocomplete="off"/></td>
																		</tr>
																		<tr>
																		  <td align="left" valign="middle">Expiration: <span class="font_13_red">*</span></td>
																		  <td  align="left" valign="middle"><select name="month" size="1" class="register_textfield2"  style="width:83px;">
																			  <option value="" >Month </option>
																			  <option value="01" <? if($_SESSION['ccmonth']=="01") echo selected;?>>January </option>
																			  <option value="02" <? if($_SESSION['ccmonth']=="02") echo selected;?>>February </option>
																			  <option value="03" <? if($_SESSION['ccmonth']=="03") echo selected;?>>March </option>
																			  <option value="04" <? if($_SESSION['ccmonth']=="04") echo selected;?>>April </option>
																			  <option value="05" <? if($_SESSION['ccmonth']=="05") echo selected;?>>May </option>
																			  <option value="06" <? if($_SESSION['ccmonth']=="06") echo selected;?>>June </option>
																			  <option value="07" <? if($_SESSION['ccmonth']=="07") echo selected;?>>July </option>
																			  <option value="08" <? if($_SESSION['ccmonth']=="08") echo selected;?>>August </option>
																			  <option value="09" <? if($_SESSION['ccmonth']=="09") echo selected;?>>September </option>
																			  <option value="10" <? if($_SESSION['ccmonth']=="10") echo selected;?>>October </option>
																			  <option value="11" <? if($_SESSION['ccmonth']=="11") echo selected;?>>November </option>
																			  <option value="12" <? if($_SESSION['ccmonth']=="12") echo selected;?>>December </option>
																			</select>
																			<select name="year" class="register_textfield2" style="width:66px;" >
																			  <option value="" selected="selected">Year</option>
																			  <? for($i=date('Y');$i<date('Y')+15;$i++){ ?>
																			  <option value="<?=$i;?>" <? if($_SESSION['ccyear']==$i) echo "selected='selected'";?>><? echo $i; ?></option>
																			  <? } ?>
																			</select>
																		  </td>
																		</tr>
																		<tr>
																		  <td align="left" valign="middle">CVV Number: <span class="font_13_red">*</span></td>
																		  <td  align="left" valign="middle"><input name="cvv" type="password" style="width:153px;"  class="register_textfield2" id="cvv" value="<? echo $_SESSION['cvv'];?>" maxlength="4" autocomplete="off"/></td>
																		</tr>
																	  </table>
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="middle" >&nbsp;</td>
																</tr>
																<tr>
																	<td align="left" valign="middle" bgcolor="#999999" class="font_13_blk"><strong>Promotional Information </strong></td>
																</tr>
																<tr>
																	<td align="left" style="padding-top:10px;">
																		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
																			<tr>
																			  <td width="16%" align="left" valign="middle" >Promotional Code:</td>
																			  <td width="84%"  align="left" valign="middle"><input type="hidden" id="carttotal" name="carttotal" value="<?=$_SESSION['total'];?>" >
																				<input name="promocode" type="text" class="register_textfield2" id="promocode" style="width:153px;"   value="<?=$_SESSION["promocode"];?>" autocomplete="off"/> 
																				<input type="button" name="applycoupon" style="float:none;" class="button1" onClick="promodisc(document.frmShipInfo.promocode.value); return false;"  value="Apply"/>
																				<?php /*?><img onClick="promodisc(document.frmShipInfo.promocode.value); return false;"  src="images/apply.jpg"  border="0" style="cursor:pointer;"  align="absmiddle" /><?php */?>
																			  </td>
																			</tr>
																			<tr><td></td><td><span id="promomsg" style="color:#FF0000;"></span></td></tr>
																			
																		  </table>
																	</td>
																</tr>
															  </table></td>
														  </tr>
														  <tr>
																<td height="60" align="center" valign="middle"  >
																&nbsp;
																<input type="hidden" name="HidContinueCheckout" id="HidContinueCheckout" value="" /> 
																<input type="button" style="float:none;" name="SubmitOrder" value="Submit Order" onClick="return FrmChkInfo();"  class="button1"/>
																<?php /*?><img src="images/submit_order.jpg" onclick="return FrmChkInfo();" style="cursor:pointer;"  border="0" /><?php */?>
																</td>
														  </tr>
														  
														</table></td>
													</tr>
												  </table></td>
											  </tr>
											</table></td>
										</tr>
									  </table>
									  </form>
                      </figure>
                    </div>
                  </section>
                </div>
              </div>
            </div>
            <div style="height:30px;"></div>
          </div>
        </div>
      </div>
    </article>
    <!-- / content -->
    <!-- footer -->
    <? include("footer.php");?>
    <!-- / footer -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>