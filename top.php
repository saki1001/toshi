<script language="javascript"  type="text/javascript" src="top_js.js"></script>
<style>
#TopAdvanceSearchBoxSS
{
left:50%;
top:25px;
width:400px;
position:absolute;
background-color:#FFBE1D;
filter:alpha(opacity=100);
opacity: 1;
-moz-opacity:1;
padding:10px;
visibility:hidden;
z-index:1000px;
}
#TopAdvanceSearchBox_divSS
{
width:400px;
background-color:#FFFFFF;
visibility:hidden;
z-index:1000px;
height=150px;
}
</style>
<header>
	<div class="wrapper">
		<span style="float:left;padding:44px 0 0 0px"><a href="index.php" id="logo">Toshi's PlayHouse</a></span>
		<nav>
			<ul id="top_nav">
				<li>Welcome <? if($_SESSION['UsErId']=="" || $_SESSION['UsErId']<0){?>Guest<? }else{?><a href="myaccount.php" style="color:#CCCCCC;"><?=ucfirst(stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId'])));?> <?=ucfirst(stripslashes(GetName1("users","lastname","id",$_SESSION['UsErId'])));?></a><? } ?></li>
				<li><a href="index.php" onclick="MM_showHideLayersTop('TopAdvanceSearchBoxSS','','show');MM_showHideLayersTop('TopAdvanceSearchBox_divSS','','show');return false;" >Subscribe</a></li>
				<li><a href="viewcart.php">Cart</a></li>
				<li class="end"><? if($_SESSION['UsErId']=="" || $_SESSION['UsErId']<0){?><a href="login.php">Sign In</a><? }else{?><a href="logout.php">Logout</a><? }?></li>
                <!-- <li class="end"><a href="login.php">Sign In</a></li> -->
			</ul>
		</nav>
		<nav>
			<ul id="menu">
				<li <? if($ACTIVEPAGE=='home'){?>id="menu_active"<? }?> ><a href="index.php">Home</a></li>
				<li <? if($ACTIVEPAGE=='events'){?>id="menu_active"<? }?>><a href="events.php">Events</a></li>
				<li <? if($ACTIVEPAGE=='gallery'){?>id="menu_active"<? }?>><a href="gallery.php">Gallery</a></li>
				<li <? if($ACTIVEPAGE=='news'){?>id="menu_active"<? }?> style='width:145px;'><a href="news.php">News &amp; Press</a></li>
				<?php /*?><li <? if($ACTIVEPAGE=='browse'){?>id="menu_active"<? }?>><a href="browse.php">Talents</a></li><?php */?>
				<? if($_SESSION['UsErId']=="" || $_SESSION['UsErId']<0){?><li <? if($ACTIVEPAGE=='register'){?>id="menu_active"<? }?>><a href="register.php">Auditions</a></li><? }else{?><li <? if($ACTIVEPAGE=='myaccount'){?>id="menu_active"<? }?>><a href="myaccount.php">Account</a></li><? }?>
				<li <? if($ACTIVEPAGE=='contact'){?>id="menu_active"<? }?>><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
</header>
<div id="TopAdvanceSearchBoxSS" align="center">
<div id="TopAdvanceSearchBox_divSS"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="center"><form name="FrmSubsbe" id="FrmSubsbe" class="rightColForm" method="post"><table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr><td width="100%" valign="top" class="splash-bg" ><table border="0" width="100%" cellpadding="2" cellspacing="4">
<tr><td colspan="4" valign="top" height="30" align="left" ><strong style="color:#990000;font-size:16px;padding-left:10px;">Subscribe to our Newsletter</strong></td></tr>
<tr><td height="18" colspan="2" align="left"  class="font-11-blue" style="padding-left:10px;">Email Address</td><td width="75%" colspan="2" align="left" valign="top" ><input name="TpoSubsEmail" id="TpoSubsEmail"  class="text"  type="text" style="border:1px solid #666666;width:250px;" />&nbsp; </td></tr>
<tr><td colspan="2"  align="left" valign="top">&nbsp;</td><td colspan="2"  align="left" valign="top" style="padding-top:2px;"><img src="<? echo $SITE_URL; ?>/images/subscribe_btn.jpg" onclick="return TopSubsCheck();return false;" border="0" style="cursor:pointer;">&nbsp;&nbsp;<img onclick="MM_showHideLayersTop('TopAdvanceSearchBoxSS','','hide');MM_showHideLayersTop('TopAdvanceSearchBox_divSS','','hide');return false;" id="submit12344" src="<? echo $SITE_URL; ?>/images/close-black.jpg" alt="<? echo $SITENAME; ?>" title="<? echo $SITENAME; ?>"  style="cursor:pointer;"   /></td></tr>
</table></td></tr></table></form></td></tr><tr><td align="right" height="13" valign="top">&nbsp;</td></tr></table></div>
</div>
<script>
function TopSubsCheck()
{
	form=document.FrmSubsbe;
	if(form.TpoSubsEmail.value.split(" ").join("")=="")
	{
		alert("Please enter your email address.")
		form.TpoSubsEmail.focus();
		return false;
	}
	else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.TpoSubsEmail.value)))
	{
		alert("Please enter a proper email address.");
		form.TpoSubsEmail.focus();
		return false;
	}
	else
	{
		TpoSubsEmail_LoadAllColors();	
		return false;
	}
}
function TpoSubsEmail_LoadAllColors()
{
    email=document.getElementById("TpoSubsEmail").value;
    var http3_SDLS1 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3_SDLS1 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3_SDLS1 = new XMLHttpRequest();
	}
	http3_SDLS1.abort();
	http3_SDLS1.open("GET", "<? echo $SITE_URL; ?>/ajax_newlater.php?email="+email, true);
	http3_SDLS1.onreadystatechange=function()
	{
	  if(http3_SDLS1.readyState == 4)
	  {  
		  if(http3_SDLS1.responseText==1)
		  {
			//document.getElementById("TopSubsCheckP_Colors").innerHTML="Please enter email address.";
			alert("Please enter email address.");
			return false;
		  }
		  else if(http3_SDLS1.responseText==3)
		  {
			//document.getElementById("TopSubsCheckP_Colors").innerHTML="Your email address is already subscribed.";
			alert("Your email address is already subscribed.");
			return false;
		  }
		  if(http3_SDLS1.responseText==2)
		  {
			MM_showHideLayersTop('TopAdvanceSearchBoxSS','','hide');
			MM_showHideLayersTop('TopAdvanceSearchBox_divSS','','hide');
			document.getElementById("TpoSubsEmail").value="";
			alert("Thank you for subscribe to our newsletter.");
			return false;
		  }
	  } 
	}
	http3_SDLS1.send(null);
}
</script>