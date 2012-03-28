var http = false;

if(navigator.appName == "Microsoft Internet Explorer") {
  http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
  http = new XMLHttpRequest();
}
///////////////////Index page Collaborators loading
function Load_Index_Collaborators(Load_Index_Collaborators_ID,uid)
{
  var http1 = false;

	if(navigator.appName == "Microsoft Internet Explorer") {
	  http1 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http1 = new XMLHttpRequest();
	}
  http1.abort();
  http1.open("GET", "ajax_validation.php?Type=Load_Index_Collaborators&uid="+uid, true);
  document.getElementById(Load_Index_Collaborators_ID).innerHTML = "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' height='170' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http1.onreadystatechange=function()
  {
	  if(http1.readyState == 4)
	  {
		  document.getElementById(Load_Index_Collaborators_ID).innerHTML= http1.responseText;
	  } 
  }
  http1.send(null);
}
function Load_Index_Collaborators_patron(Load_Index_Collaborators_ID,uid)
{
  var http1 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http1 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http1 = new XMLHttpRequest();
	}
  http1.abort();
  http1.open("GET", "ajax_validation.php?Type=Load_Index_Collaborators_patron&uid="+uid, true);
  document.getElementById(Load_Index_Collaborators_ID).innerHTML = "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' height='170' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http1.onreadystatechange=function()
  {
	  if(http1.readyState == 4)
	  {
		  document.getElementById(Load_Index_Collaborators_ID).innerHTML= http1.responseText;
	  } 
  }
  http1.send(null);
}
function Load_Index_Fellowpatron(Load_Index_Fellowpatron_ID)
{
  var http1555 = false;

	if(navigator.appName == "Microsoft Internet Explorer") {
	  http1555 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http1555 = new XMLHttpRequest();
	}
  http1555.abort();
  http1555.open("GET", "ajax_validation.php?Type=Load_Index_Fellowpatron", true);
  document.getElementById(Load_Index_Fellowpatron_ID).innerHTML = "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' height='170' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http1555.onreadystatechange=function()
  {
	  if(http1555.readyState == 4)
	  {
		  document.getElementById(Load_Index_Fellowpatron_ID).innerHTML= http1555.responseText;
	  } 
  }
  http1555.send(null);
}

///////////////////Index page Collaborators loading
function Load_Index_UpcomingEvent(Load_Index_UpcomingEvent_ID)
{
 var http2 = false;

	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
 http2.abort();
  http2.open("GET", "ajax_validation.php?Type=Load_Index_UpcomingEvent", true);
  document.getElementById(Load_Index_UpcomingEvent_ID).innerHTML = "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' height='150' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  document.getElementById(Load_Index_UpcomingEvent_ID).innerHTML= http2.responseText;
	  } 
  }
  http2.send(null);
}
///////////////////Artist Signup User Name Checking
function IsUserNameAvailable(IsUserNameAvailable_ID,txtboxname,name)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=IsUserNameAvailable&name="+name, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  document.getElementById(txtboxname).value="";
			  document.getElementById(IsUserNameAvailable_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
		  }
		  else
		  {
			  document.getElementById(IsUserNameAvailable_ID).innerHTML= "";
		  }
	  } 
  }
  http2.send(null);
}
///////////////////Artist Signup User Name Checking
function IsEmailNameAvailable(IsEmailNameAvailable_ID,txtboxname,name)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=IsEmailNameAvailable&name="+name, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  document.getElementById(txtboxname).value="";
			  document.getElementById(IsEmailNameAvailable_ID).innerHTML= "<span style='color:#FF0000'><br><br>"+http2.responseText+"</span>";
		  }
		  else
		  {
			  document.getElementById(IsEmailNameAvailable_ID).innerHTML= "";
		  }
	  } 
  }
  http2.send(null);
}


///////////////////Artist Signup Guild Name Checking
function IsGuildAvailable(IsGuildAvailable_ID,name)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=IsGuildAvailable&name="+name, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  document.getElementById("guildid_1_other").value="";
			  document.getElementById(IsGuildAvailable_ID).innerHTML= "<span style='color:#FF0000'><br><br>"+http2.responseText+"</span>";
		  }
		  else
		  {
			  document.getElementById(IsGuildAvailable_ID).innerHTML= "";
		  }
	  } 
  }
  http2.send(null);
}
///////////////////Login Checking
function CheckLoginDetail(CheckLoginDetail_ID,name,password,pagename)
{
	//alert(name);
	//alert(password);
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=CheckLoginDetail&name="+name+"&password="+password+"&pagename="+pagename, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  //alert(http2.responseText);
		  if(http2.responseText!="")
		  {
			  document.getElementById(CheckLoginDetail_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  else
		  {
			  document.getElementById(CheckLoginDetail_ID).innerHTML= "";
			  if(pagename!="")
			  {	
					window.location.href=pagename;
			  }
			  else
			  {
				  window.location.href='myaccount.php';
			  }
			  return  true;
		  }
	  } 
  }
  http2.send(null);
}

///////////////////LoadAnother ViewImages
function LoadAnotherViewImages(LoadAnotherViewImages_ID)
{
	//alert(name);
	//alert(password);
  var http289 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http289 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http289 = new XMLHttpRequest();
	}
  http289.abort();
  http289.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages", true);
  http289.onreadystatechange=function()
  {
	  if(http289.readyState == 4)
	  {
		  if(http289.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http289.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http289.send(null);
}
//////////////////LoadAnother ViewImages
function LoadAnotherViewImages_Edit(LoadAnotherViewImages_ID,eid,Iid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_Edit&eid="+eid+"&Iid="+Iid, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  //alert(http2.responseText);
			  document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
///////////////////LoadAnother ViewImages
function LoadAnotherViewImages_Del(LoadAnotherViewImages_ID,eid,Iid,Did)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_Del&eid="+eid+"&Iid="+Iid+"&Did="+Did, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  //alert(http2.responseText);
			  //document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  LoadAnotherViewImages_Edit(LoadAnotherViewImages_ID,eid,Iid);
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}

///////////////////LoadAnotherViewMainImage
function LoadAnotherViewMainImage(LoadAnotherViewMainImage_ID)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadAnotherViewMainImage", true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewMainImage_ID).innerHTML= "<span style='color:#FF0000'>"+http3.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http3.send(null);
}

function LoadAnotherViewMainImage_Edit(LoadAnotherViewMainImage_ID,eid,Iid)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadAnotherViewMainImage_Edit&eid="+eid+"&Iid="+Iid, true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewMainImage_ID).innerHTML= "<span style='color:#FF0000'>"+http3.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http3.send(null);
}

/////////////Load states of countries
function LoadCountry_States(LoadCountry_States_ID,CountryName,statefieldname)
{
	//alert(name);
	//alert(password);
  var http4 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http4 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http4 = new XMLHttpRequest();
	}
  http4.abort();
  http4.open("GET", "ajax_validation.php?Type=LoadCountry_States&CountryName="+CountryName+"&statefieldname="+statefieldname, true);
  document.getElementById(LoadCountry_States_ID).innerHTML= "Loading....";
  http4.onreadystatechange=function()
  {
	  if(http4.readyState == 4)
	  {
		  if(http4.responseText!="")
		  {
			  document.getElementById(LoadCountry_States_ID).innerHTML= http4.responseText;
			  return  false;
		  }
	  } 
  }
  http4.send(null);
}

///////////////////LoadAnother ViewImages
function LoadClassifiedImage(LoadClassifiedImage_ID)
{
	//alert(name);
	//alert(password);
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadClassifiedImage", true);
  document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  document.getElementById(LoadClassifiedImage_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
///////////////////LoadAnother ViewImages
function LoadClassifiedImage_EDIT(LoadClassifiedImage_ID,cid)
{
	//alert(name);
	//alert(password);
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadClassifiedImage_EDIT&cid="+cid, true);
  document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  document.getElementById(LoadClassifiedImage_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
function nl2br (str, is_xhtml) 
{
    var breakTag = '';
 
    breakTag = '<br />';
    if (typeof is_xhtml != 'undefined' && !is_xhtml) {
        breakTag = '<br>';
    }
 
    return (str + '').replace(/([^>]?)\n/g, '$1'+ breakTag +'\n');
}

///////////////////LoadAnother ViewImages
function SaveProjectImageSet(SaveProjectImageSet_ID,imagetitle,description,size,price,backgroundcolor,fonts,comments)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet&imagetitle="+imagetitle+"&description="+nl2br(description)+"&size="+size+"&price="+price+"&backgroundcolor="+backgroundcolor+"&fonts="+fonts+"&comments="+nl2br(comments), true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Image Title")
		  {
			  alert("Please Enter Image Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("description_image").src= "images/add-new.jpg";
			  document.getElementById("size_image").src= "images/add-new.jpg";
			  document.getElementById("price_image").src= "images/add-new.jpg";
			  
			  document.getElementById("description_title").style.display='inline';
			  document.getElementById("size_title").style.display='inline';
			  document.getElementById("price_title").style.display='inline';
			  document.getElementById("description").style.display='none';
			  document.getElementById("size").style.display='none';
			  document.getElementById("price").style.display='none';
			  
			  document.getElementById("description_textfieldrow").style.display='none';
			  document.getElementById("size_textfieldrow").style.display='none';
			  document.getElementById("price_textfieldrow").style.display='none';
			  
			  
			  
			  document.getElementById("TotalTempImageSetAdded").value='1';
			  //document.getElementById("backgroundcolor").value= "FFFFFF";
			  //document.getElementById("fonts").value= "Arial";
			  //document.getElementById("comments").value= "";
			  //document.getElementById('White_id').className='borderGreen';
			  //document.getElementById('Black_id').className='border';
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  LoadAnotherViewImages('LoadAnotherViewImages_ID');
			  LoadAnotherViewMainImage('MainImageId');
			  //LoadProjectAddDoneButton('LoadProjectAddDoneButton_ID');
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}

function SaveProjectImageSet_Edit(SaveProjectImageSet_ID,imagetitle,description,size,price,backgroundcolor,fonts,comments,Iid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_Edit&imagetitle="+imagetitle+"&description="+nl2br(description)+"&size="+size+"&price="+price+"&Iid="+Iid, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  //alert(http2.responseText);
		  if(http2.responseText=="Please Enter Image Title")
		  {
			  alert("Please Enter Image Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  /*document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  document.getElementById('White_id').className='borderGreen';
			  document.getElementById('Black_id').className='border';*/
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}

function SaveProjectImageSet_Edit2(SaveProjectImageSet_ID,imagetitle,description,size,price,backgroundcolor,fonts,comments,eid,Iid)
{
  //alert(Iid);
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_Edit2&imagetitle="+imagetitle+"&description="+description+"&size="+size+"&price="+price+"&Iid="+Iid+"&eid="+eid, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Image Title")
		  {
			  alert("Please Enter Image Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  /*document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  document.getElementById('White_id').className='borderGreen';
			  document.getElementById('Black_id').className='border';*/
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  document.FrmTopItemDrp.submit();
			  return  true;
		  }
	  } 
  }
  http2.send(null);
}

///////////////////SendToFriend
function SendToFriend(SendToFriend_ID,fname,femail,yname,yemail,message,pid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SendToFriend&fname="+fname+"&femail="+femail+"&yname="+yname+"&yemail="+yemail+"&message="+nl2br(message)+"&pid="+pid, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText=="Sent")
		  {
			  document.getElementById(SendToFriend_ID).innerHTML= "<span style='color:#FF0000'>Email has been sent to your friend "+fname+"</span>";
		  }
		  else
		  {
			  document.getElementById(SendToFriend_ID).innerHTML= http2.readyState;
		  }
	  } 
  }
  http2.send(null);
}

///////////////////Add to Watchlist
function AddToFavourite(AddToFavourite_ID,pid,userid)
{
	http.abort();
	http.open("GET", "ajax_validation.php?Type=AddToFavourite&pid=" + pid + "&userid=" + userid, true);
	document.getElementById(AddToFavourite_ID).innerHTML = "<span class='message-redbg' style='text-decoration:blink'>Please wait...</span>";
	http.onreadystatechange=function()
	{
	  if(http.readyState == 4)
	  {
		  if(http.responseText=="OWN")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "You can't save your project.";
		  }
		  if(http.responseText=="Added")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "This project has been added to your save list.";
		  }
		  if(http.responseText=="Alreadyadded")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "This project already been added to your saved list.";
		  }
		  if(http.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "Please login to save this project.";
		  }
	  } 
	}
	http.send(null);
}

function SendMessage(SendMessage_ID,emailto,subject,message,userid)
{
	//alert(message);
	http.abort();
	http.open("GET", "ajax_validation.php?Type=SendMessage&emailto=" + emailto + "&subject=" + subject+ "&message=" + nl2br(message)+ "&userid=" + userid, true);
	document.getElementById(SendMessage_ID).innerHTML = "<span class='message-redbg' style='text-decoration:blink'>Please wait...</span>";
	http.onreadystatechange=function()
	{
	  if(http.readyState == 4)
	  {
		  if(http.responseText=="SENT")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "Message have been sent to your friends..";
		  }
		  else if(http.responseText=="OWN")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "You can't send message to your own email address";
		  }
		  else if(http.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "Please login to send a message to this user.";
		  }
		  else
		  {
			  document.getElementById(SendMessage_ID).innerHTML= http.responseText;
		  }
	  } 
	}
	http.send(null);
}

///////////////////LoadEventDrpdown
function SLoadEventDrpdown_Month(SLoadEventDrpdown_Month_ID,day,month,year)
{
	/*alert(day);
	alert(month);
	alert(year);*/
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=SLoadEventDrpdown_Month&day="+day+"&month="+month+"&year="+year, true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			 // alert(http3.responseText)	;
			  document.getElementById(SLoadEventDrpdown_Month_ID).innerHTML= http3.responseText;
			  return  false;
		  }
	  } 
  }
  http3.send(null);
}
///////////////////LoadEventDrpdown
function SLoadEventDrpdown_Day(SLoadEventDrpdown_Day_ID,day,month,year)
{
	/*alert(day);
	alert(month);
	alert(year);*/
  var http4 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http4 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http4 = new XMLHttpRequest();
	}
  http4.abort();
  http4.open("GET", "ajax_validation.php?Type=SLoadEventDrpdown_Day&day="+day+"&month="+month+"&year="+year, true);
  http4.onreadystatechange=function()
  {
	  if(http4.readyState == 4)
	  {
		  if(http4.responseText!="")
		  {
			 // alert(http4.responseText)	;
			  document.getElementById(SLoadEventDrpdown_Day_ID).innerHTML= http4.responseText;
			  return  false;
		  }
	  } 
  }
  http4.send(null);
}
function ELoadEventDrpdown_Month(ELoadEventDrpdown_Month_ID,day,month,year)
{
	/*alert(day);
	alert(month);
	alert(year);*/
  var http5 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http5 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http5 = new XMLHttpRequest();
	}
  http5.abort();
  http5.open("GET", "ajax_validation.php?Type=ELoadEventDrpdown_Month&day="+day+"&month="+month+"&year="+year, true);
  http5.onreadystatechange=function()
  {
	  if(http5.readyState == 4)
	  {
		  if(http5.responseText!="")
		  {
			 // alert(http5.responseText)	;
			  document.getElementById(ELoadEventDrpdown_Month_ID).innerHTML= http5.responseText;
			  return  false;
		  }
	  } 
  }
  http5.send(null);
}
function ELoadEventDrpdown_Day(ELoadEventDrpdown_Day_ID,day,month,year)
{
	/*alert(day);
	alert(month);
	alert(year);*/
  var http6 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http6 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http6 = new XMLHttpRequest();
	}
  http6.abort();
  http6.open("GET", "ajax_validation.php?Type=ELoadEventDrpdown_Day&day="+day+"&month="+month+"&year="+year, true);
  http6.onreadystatechange=function()
  {
	  if(http6.readyState == 4)
	  {
		  if(http6.responseText!="")
		  {
			 // alert(http6.responseText)	;
			  document.getElementById(ELoadEventDrpdown_Day_ID).innerHTML= http6.responseText;
			  return  false;
		  }
	  } 
  }
  http6.send(null);
}
///////////////////LoadAnotherViewMainImage
function LoadProfilePicture(LoadProfilePicture_ID)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadProfilePicture", true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadProfilePicture_ID).innerHTML= http3.responseText;
			  return  false;
		  }
	  } 
  }
  http3.send(null);
}

function LoadProfileVideo(LoadProfileVideo_ID)
{
	//alert(name);
	//alert(password);
  var http4 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http4 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http4 = new XMLHttpRequest();
	}
  http4.abort();
  http4.open("GET", "ajax_validation.php?Type=LoadProfileVideo", true);
  http4.onreadystatechange=function()
  {
	  if(http4.readyState == 4)
	  {
		  if(http4.responseText!="")
		  {
			  document.getElementById(LoadProfileVideo_ID).innerHTML= http4.responseText;
			  return  false;
		  }
	  } 
  }
  http4.send(null);
}

function SaveRating(SaveRating_ID,pid,userid,rateid)
{
	//alert(name);
	//alert(password);
  var http4 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http4 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http4 = new XMLHttpRequest();
	}
  http4.abort();
  http4.open("GET", "ajax_validation.php?Type=SaveRating&pid="+pid+"&userid="+userid+"&rateid="+rateid, true);
  http4.onreadystatechange=function()
  {
	  if(http4.readyState == 4)
	  {
		  if(http4.responseText!="")
		  {
			  //alert(http4.responseText);
			  document.getElementById(SaveRating_ID).innerHTML= http4.responseText;
			  alert("Rated successfully!");
			  return  false;
		  }
	  } 
  }
  http4.send(null);
}

function SendComment(SendComment_ID,comment,pid,ProjectUserId)
{
 var http233 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http233 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http233 = new XMLHttpRequest();
	}
  http233.abort();
  http233.open("GET", "ajax_validation.php?Type=SendComment&comment="+nl2br(comment)+"&pid="+pid+"&ProjectUserId="+ProjectUserId, true);
  http233.onreadystatechange=function()
  {
	  if(http233.readyState == 4)
	  {
		  //alert(http233.responseText)	;
		  if(http233.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(SendComment_ID).innerHTML= "Please login to comment on this user\'s project.";
		  }
		  else if(http233.responseText=="OWN")
		  {	
		  		document.getElementById(SendComment_ID).innerHTML= "You can't send comments to your own project.";
		  }
		  else if(http233.responseText=="Sent")
		  {
			  document.getElementById(SendComment_ID).innerHTML= "<span style='color:#FF0000'>Comment has been sent successfully.</span>";
		  }
		  else
		  {
			  document.getElementById(SendComment_ID).innerHTML= http233.responseText;
		  }
	  } 
  }
  http233.send(null);
}

function SendProjectNote(SendProjectNote_ID,notes,pid,sentby)
{
 var http233 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http233 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http233 = new XMLHttpRequest();
	}
  http233.abort();
  http233.open("GET", "ajax_validation.php?Type=SendProjectNote&notes="+nl2br(notes)+"&pid="+pid+"&sentby="+sentby, true);
  http233.onreadystatechange=function()
  {
	  if(http233.readyState == 4)
	  {
		  //alert(http233.responseText)	;
		  if(http233.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(SendProjectNote_ID).innerHTML= "Please login to send note on this user\'s project.";
		  }
		  else if(http233.responseText=="OWN")
		  {	
		  		document.getElementById(SendProjectNote_ID).innerHTML= "You can't send note to your own project.";
		  }
		  else if(http233.responseText=="Alreadyadded")
		  {	
		  		document.getElementById(SendProjectNote_ID).innerHTML= "This project already been added to your saved list.";
		  }
		  else if(http233.responseText=="Added")
		  {	
		  		document.getElementById(SendProjectNote_ID).innerHTML= "This project has been added to your save list.";
				document.getElementById("notes").value= "";
		  }
		  else if(http233.responseText=="Sent")
		  {
			  document.getElementById(SendProjectNote_ID).innerHTML= "<span style='color:#FF0000'>Note has been added successfully.</span>";
			  document.getElementById("notes").value= "";
		  }
		  else
		  {
			  document.getElementById(SendProjectNote_ID).innerHTML= http233.responseText;
		  }
	  } 
  }
  http233.send(null);
}

function LoadUsersComments(LoadUsersComments_ID,userid)
{
	//alert(name);
	//alert(password);
  var http42 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http42 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http42 = new XMLHttpRequest();
	}
  http42.abort();
  http42.open("GET", "ajax_validation.php?Type=LoadUsersComments&userid="+userid, true);
  http42.onreadystatechange=function()
  {
	  if(http42.readyState == 4)
	  {
		  if(http42.responseText!="")
		  {
			  document.getElementById(LoadUsersComments_ID).innerHTML= http42.responseText;
			  return  false;
		  }
	  } 
  }
  http42.send(null);
}
function DelLoadUsersComments(delid,userid)
{
	//alert(name);
	//alert(password);
  var http421 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http421 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http421 = new XMLHttpRequest();
	}
  http421.abort();
  http421.open("GET", "ajax_validation.php?Type=DelLoadUsersComments&delid="+delid+"&userid="+userid, true);
  document.getElementById('LoadUsersComments_ID').innerHTML='<img src="images/ajax-loader.gif" />';
  http421.onreadystatechange=function()
  {
	  if(http421.readyState == 4)
	  {
		  if(http421.responseText!="")
		  {
			  LoadUsersComments('LoadUsersComments_ID',userid);
		  }
	  } 
  }
  http421.send(null);
}

function LoadUsersCommentsPublic(LoadUsersCommentsPublic_ID,userid)
{
	//alert(name);
	//alert(password);
  var http42 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http42 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http42 = new XMLHttpRequest();
	}
  http42.abort();
  http42.open("GET", "ajax_validation.php?Type=LoadUsersCommentsPublic&userid="+userid, true);
  http42.onreadystatechange=function()
  {
	  if(http42.readyState == 4)
	  {
		  if(http42.responseText!="")
		  {
			  document.getElementById(LoadUsersCommentsPublic_ID).innerHTML= http42.responseText;
			  return  false;
		  }
	  } 
  }
  http42.send(null);
}
function LoadProjectItemdetail(id,imagesetid)
{
/*	alert(id);
	alert(imagesetid);*/
  var http42 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http42 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http42 = new XMLHttpRequest();
	}
  http42.abort();
  http42.open("GET", "ajax_validation.php?Type=LoadProjectItemdetail&id="+id+"&imagesetid="+imagesetid, true);
  http42.onreadystatechange=function()
  {
	  if(http42.readyState == 4)
	  {
		  if(http42.responseText!="")
		  {
			  var aa,bb,dd;
			  aa=http42.responseText;
			  bb=aa.split("##########");
			  document.getElementById("IMAGETITLE_ID").innerHTML= "<b>"+bb[0]+"</b>";
			  document.getElementById("IMAGEDESCRIPTION_ID").innerHTML= nl2br(bb[1]);
			  document.getElementById("IMAGESIZE_ID").innerHTML= "Size: "+bb[2];
			  document.getElementById("IMAGEPRICE_ID").innerHTML= "Price: "+bb[3];
			  if(bb[4]!="")
			  {
			  	document.getElementById("COMMENTS_ID").innerHTML= nl2br(bb[4]);
			  }
			  else
			  {
				document.getElementById("COMMENTS_ID").innerHTML= "No Comments";  
			  }
			  document.getElementById("MAINIMAGE_ID").innerHTML=' <img src="onlinethumb.php?nm=ProjectViews/'+bb[5]+'&mwidth=548&mheight=330" border="0">';
			  document.getElementById("Numberoflike_ID").innerHTML= bb[6];
			  document.getElementById("span_Sharethis_image_ID").innerHTML='<link rel="image_src" id="Sharethis_image_ID" href="http://www.rpaxis.net/localguild/ProjectViews/'+bb[5]+'" />';
			  
		  }
	  } 
  }
  http42.send(null);
}

function SendConnectRequest(SendMessage_ID,to,from)
{
	//alert(message);
	http.abort();
	http.open("GET", "ajax_validation.php?Type=SendConnectRequest&to=" + to + "&from=" + from, true);
	document.getElementById(SendMessage_ID).innerHTML = "<span class='message-redbg' style='text-decoration:blink'>Please wait...</span>";
	http.onreadystatechange=function()
	{
	  if(http.readyState == 4)
	  {
		  if(http.responseText=="SENT")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "Request has been sent.";
		  }
		  else if(http.responseText=="OWN")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "You can't send reqest to yourself";
		  }
		  else if(http.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "Please login to send request.";
		  }
		  else if(http.responseText=="Already")
		  {	
		  		document.getElementById(SendMessage_ID).innerHTML= "Request already sent.";
		  }
		  else
		  {
			  document.getElementById(SendMessage_ID).innerHTML= http.responseText;
		  }
	  } 
	}
	http.send(null);
}

function LoadAnotherViewImages_SHOP(LoadAnotherViewImages_ID)
{
	//alert(name);
	//alert(password);
  var http289 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http289 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http289 = new XMLHttpRequest();
	}
  http289.abort();
  http289.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_SHOP", true);
  http289.onreadystatechange=function()
  {
	  if(http289.readyState == 4)
	  {
		  if(http289.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http289.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http289.send(null);
}
function LoadAnotherViewMainImage_SHOP(LoadAnotherViewMainImage_ID)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadAnotherViewMainImage_SHOP", true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewMainImage_ID).innerHTML= "<span style='color:#FF0000'>"+http3.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http3.send(null);
}

function SaveProjectImageSet_SHOP(SaveProjectImageSet_ID,imagetitle,description,size,price,backgroundcolor,fonts,comments)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_SHOP&imagetitle="+imagetitle+"&description="+nl2br(description)+"&size="+size+"&price="+price+"&backgroundcolor="+backgroundcolor+"&fonts="+fonts+"&comments="+nl2br(comments), true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Image Title")
		  {
			  alert("Please Enter Image Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  //document.getElementById('White_id').className='borderGreen';
			  //document.getElementById('Black_id').className='border';
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  LoadAnotherViewImages_SHOP('LoadAnotherViewImages_ID');
			  LoadAnotherViewMainImage_SHOP('MainImageId');
			  LoadShopAddDoneButton('LoadShopAddDoneButton_ID');
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}

function IsShopcatAvailable(IsGuildAvailable_ID,name)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=IsShopcatAvailable&name="+name, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  document.getElementById("projecttitle_other").value="";
			  document.getElementById(IsGuildAvailable_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
		  }
		  else
		  {
			  document.getElementById(IsGuildAvailable_ID).innerHTML= "";
		  }
	  } 
  }
  http2.send(null);
}

function LoadShopItemdetail(id,imagesetid)
{
/*	alert(id);
	alert(imagesetid);*/
  var http42 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http42 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http42 = new XMLHttpRequest();
	}
  http42.abort();
  http42.open("GET", "ajax_validation.php?Type=LoadShopItemdetail&id="+id+"&imagesetid="+imagesetid, true);
  http42.onreadystatechange=function()
  {
	  if(http42.readyState == 4)
	  {
		  if(http42.responseText!="")
		  {
			  var aa,bb,dd;
			  aa=http42.responseText;
			  bb=aa.split("##########");
			  document.getElementById("IMAGETITLE_ID").innerHTML= "<b>"+bb[0]+"</b>";
			  document.getElementById("IMAGEDESCRIPTION_ID").innerHTML= nl2br(bb[1]);
			  document.getElementById("IMAGESIZE_ID").innerHTML= "Size: "+bb[2];
			  document.getElementById("IMAGEPRICE_ID").innerHTML= "Price: "+bb[3];
			  if(bb[4]!="")
			  {
			  	document.getElementById("COMMENTS_ID").innerHTML= nl2br(bb[4]);
			  }
			  else
			  {
				document.getElementById("COMMENTS_ID").innerHTML= "No Comments";  
			  }
			  document.getElementById("MAINIMAGE_ID").innerHTML=' <img src="onlinethumb.php?nm=ShopViews/'+bb[5]+'&mwidth=548&mheight=330" border="0">';
		  }
	  } 
  }
  http42.send(null);
}

function LoadProjectAddDoneButton(LoadProjectAddDoneButton_ID)
{
	//alert(name);
	//alert(password);
  var http2891 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2891 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2891 = new XMLHttpRequest();
	}
  http2891.abort();
  http2891.open("GET", "ajax_validation.php?Type=LoadProjectAddDoneButton", true);
  http2891.onreadystatechange=function()
  {
	  if(http2891.readyState == 4)
	  {
		  if(http2891.responseText!="")
		  {
			  document.getElementById(LoadProjectAddDoneButton_ID).innerHTML= "<span style='color:#FF0000'>"+http2891.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http2891.send(null);
}
function LoadShopAddDoneButton(LoadShopAddDoneButton_ID)
{
	//alert(name);
	//alert(password);
  var http2891 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2891 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2891 = new XMLHttpRequest();
	}
  http2891.abort();
  http2891.open("GET", "ajax_validation.php?Type=LoadShopAddDoneButton", true);
  http2891.onreadystatechange=function()
  {
	  if(http2891.readyState == 4)
	  {
		  if(http2891.responseText!="")
		  {
			  document.getElementById(LoadShopAddDoneButton_ID).innerHTML= "<span style='color:#FF0000'>"+http2891.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http2891.send(null);
}

function LoadAnotherViewImages_Edit_SHOP(LoadAnotherViewImages_ID,eid,Iid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_Edit_SHOP&eid="+eid+"&Iid="+Iid, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  //alert(http2.responseText);
			  document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}

function LoadAnotherViewMainImage_Edit_SHOP(LoadAnotherViewMainImage_ID,eid,Iid)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadAnotherViewMainImage_Edit_SHOP&eid="+eid+"&Iid="+Iid, true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewMainImage_ID).innerHTML= "<span style='color:#FF0000'>"+http3.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http3.send(null);
}

function SaveProjectImageSet_Edit2_SHOP(SaveProjectImageSet_ID,imagetitle,description,size,price,backgroundcolor,fonts,comments,eid,Iid)
{
  //alert(Iid);
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_Edit2_SHOP&imagetitle="+imagetitle+"&description="+description+"&size="+size+"&price="+price+"&backgroundcolor="+backgroundcolor+"&fonts="+fonts+"&comments="+nl2br(comments)+"&Iid="+Iid+"&eid="+eid, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Image Title")
		  {
			  alert("Please Enter Image Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  /*document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  document.getElementById('White_id').className='borderGreen';
			  document.getElementById('Black_id').className='border';*/
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  document.FrmTopItemDrp.submit();
			  return  true;
		  }
	  } 
  }
  http2.send(null);
}

function LoadAnotherViewImages_Del_SHOP(LoadAnotherViewImages_ID,eid,Iid,Did)
{
  
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_Del_SHOP&eid="+eid+"&Iid="+Iid+"&Did="+Did, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  //alert(http2.responseText);
			  //document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  LoadAnotherViewImages_Edit_SHOP(LoadAnotherViewImages_ID,eid,Iid);
			  
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}

function SaveProjectImageSet_Edit_SHOP(SaveProjectImageSet_ID,imagetitle,description,size,price,backgroundcolor,fonts,comments,Iid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_Edit_SHOP&imagetitle="+imagetitle+"&description="+nl2br(description)+"&size="+size+"&price="+price+"&backgroundcolor="+backgroundcolor+"&fonts="+fonts+"&comments="+nl2br(comments)+"&Iid="+Iid, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Image Title")
		  {
			  alert("Please Enter Image Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  /*document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  document.getElementById('White_id').className='borderGreen';
			  document.getElementById('Black_id').className='border';*/
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
function LoadLocalActivity(LoadLocalActivity_ID,userid)
{
	//alert(name);
	//alert(password);
  var http42 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http42 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http42 = new XMLHttpRequest();
	}
  http42.abort();
  http42.open("GET", "ajax_validation.php?Type=LoadLocalActivity&userid="+userid, true);
  http42.onreadystatechange=function()
  {
	  if(http42.readyState == 4)
	  {
		  if(http42.responseText!="")
		  {
			  document.getElementById(LoadLocalActivity_ID).innerHTML= http42.responseText;
			  return  false;
		  }
	  } 
  }
  http42.send(null);
}
function IlikeIt(AddToFavourite_ID,pid,iid,userid)
{
	http.abort();
	http.open("GET", "ajax_validation.php?Type=IlikeIt&pid=" + pid + "&iid=" + iid + "&userid=" + userid, true);
	document.getElementById(AddToFavourite_ID).innerHTML = "<span class='message-redbg' style='text-decoration:blink'>Please wait...</span>";
	http.onreadystatechange=function()
	{
	  if(http.readyState == 4)
	  {
		  if(http.responseText=="OWN")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "You can't vote your project.";
		  }
		  else if(http.responseText=="Alreadyadded")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "You have already rated this item.";
		  }
		  else if(http.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(AddToFavourite_ID).innerHTML= "Please login to submit your vote.";
		  }
		  else
		  {
		  		//document.getElementById(AddToFavourite_ID).innerHTML= "This project has been voted.";
				document.getElementById("Numberoflike_ID").innerHTML= http.responseText;
				document.getElementById(AddToFavourite_ID).innerHTML ="";
		  }
	  } 
	}
	http.send(null);
}

function SaveRatingEducation(SaveRating_ID,pid,userid,rateid)
{
	//alert(name);
	//alert(password);
  var http4 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http4 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http4 = new XMLHttpRequest();
	}
  http4.abort();
  http4.open("GET", "ajax_validation.php?Type=SaveRatingEducation&pid="+pid+"&userid="+userid+"&rateid="+rateid, true);
  http4.onreadystatechange=function()
  {
	  if(http4.readyState == 4)
	  {
		  if(http4.responseText!="")
		  {
			   if(http4.responseText=="Already")		
			   {
					alert("You have already rated");   
			   }
			   else if(http4.responseText=="Rated")		
			   {
					alert("Rated successfully!");   
			   }
			   else
			   {
			  	 document.getElementById(SaveRating_ID).innerHTML= http4.responseText;
			   }
			  return  false;
		  }
	  } 
  }
  http4.send(null);
}

function LoadAnotherViewImages_PRESS(LoadAnotherViewImages_ID)
{
	//alert(name);
	//alert(password);
  var http289 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http289 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http289 = new XMLHttpRequest();
	}
  http289.abort();
  http289.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_PRESS", true);
  http289.onreadystatechange=function()
  {
	  if(http289.readyState == 4)
	  {
		  if(http289.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http289.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http289.send(null);
}
function SaveProjectImageSet_PRESS(SaveProjectImageSet_ID,imagetitle,description)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_PRESS&imagetitle="+imagetitle+"&description="+description, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Item Title")
		  {
			  alert("Please Enter Item Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  document.getElementById("imagetitle").value= "Item Title";
			  document.getElementById("description").value= "description";
			  //document.getElementById("size").value= "size / dimensions";
			  //document.getElementById("price").value= "price";
			  //document.getElementById("backgroundcolor").value= "FFFFFF";
			  //document.getElementById("fonts").value= "Arial";
			  //document.getElementById("comments").value= "";
			  //document.getElementById('White_id').className='borderGreen';
			  //document.getElementById('Black_id').className='border';
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  LoadAnotherViewImages_PRESS('LoadAnotherViewImages_ID');
			  LoadAnotherViewMainImage_PRESS('MainImageId');
			  LoadProjectAddDoneButton_PRESS('LoadProjectAddDoneButton_ID');
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
function LoadAnotherViewMainImage_PRESS(LoadAnotherViewMainImage_ID)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadAnotherViewMainImage_PRESS", true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewMainImage_ID).innerHTML= "<span style='color:#FF0000'>"+http3.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http3.send(null);
}

function LoadProjectAddDoneButton_PRESS(LoadProjectAddDoneButton_ID)
{
	//alert(name);
	//alert(password);
  var http2891 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2891 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2891 = new XMLHttpRequest();
	}
  http2891.abort();
  http2891.open("GET", "ajax_validation.php?Type=LoadProjectAddDoneButton_PRESS", true);
  http2891.onreadystatechange=function()
  {
	  if(http2891.readyState == 4)
	  {
		  if(http2891.responseText!="")
		  {
			  document.getElementById(LoadProjectAddDoneButton_ID).innerHTML= "<span style='color:#FF0000'>"+http2891.responseText+"</span>";
			  return  true;
		  }
	  } 
  }
  http2891.send(null);
}
function LoadAnotherViewImages_Edit_PRESS(LoadAnotherViewImages_ID,eid,Iid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_Edit_PRESS&eid="+eid+"&Iid="+Iid, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  //alert(http2.responseText);
			  document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
function LoadAnotherViewImages_Del_PRESS(LoadAnotherViewImages_ID,eid,Did)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=LoadAnotherViewImages_Del_PRESS&eid="+eid+"&Did="+Did, true);
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText!="")
		  {
			  //alert(http2.responseText);
			  //document.getElementById(LoadAnotherViewImages_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  var Iid='';
			  LoadAnotherViewImages_Edit_PRESS(LoadAnotherViewImages_ID,eid,Iid);
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
function SaveProjectImageSet_Edit_PRESS(SaveProjectImageSet_ID,imagetitle,description,Iid)
{
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_Edit_PRESS&imagetitle="+imagetitle+"&description="+description+"&Iid="+Iid, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		 	if(http2.responseText=="Please Enter Item Title")
		  {
			  alert("Please Enter Item Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  /*document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  document.getElementById('White_id').className='borderGreen';
			  document.getElementById('Black_id').className='border';*/
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  document.FrmTopItemDrp.submit();
			  return  false;
		  }
	  } 
  }
  http2.send(null);
}
function SaveProjectImageSet_Edit2_PRESS(SaveProjectImageSet_ID,imagetitle,description,eid,Iid)
{
  //alert(Iid);
  var http2 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http2 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http2 = new XMLHttpRequest();
	}
  http2.abort();
  http2.open("GET", "ajax_validation.php?Type=SaveProjectImageSet_Edit2_PRESS&imagetitle="+imagetitle+"&description="+description+"&Iid="+Iid+"&eid="+eid, true);
  //document.getElementById(LoadClassifiedImage_ID).innerHTML= "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'><tr><td valign='middle' align='center'><img src='images/ajax-loader.gif'></td></tr></table>";
  http2.onreadystatechange=function()
  {
	  if(http2.readyState == 4)
	  {
		  if(http2.responseText=="Please Enter Item Title")
		  {
			  alert("Please Enter Item Title");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		   if(http2.responseText=="Please upload the picture")
		  {
			  alert("Please upload the picture");
			  //document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>"+http2.responseText+"</span>";
			  return  false;
		  }
		  if(http2.responseText=="DONE")
		  {
			  /*document.getElementById("imagetitle").value= "Image Title";
			  document.getElementById("description").value= "description";
			  document.getElementById("size").value= "size / dimensions";
			  document.getElementById("price").value= "price";
			  document.getElementById("backgroundcolor").value= "FFFFFF";
			  document.getElementById("fonts").value= "Arial";
			  document.getElementById("comments").value= "";
			  document.getElementById('White_id').className='borderGreen';
			  document.getElementById('Black_id').className='border';*/
			  document.getElementById(SaveProjectImageSet_ID).innerHTML= "<span style='color:#FF0000'>Items saved successfully</span>";
			  alert("Items saved successfully!!");
			  document.FrmTopItemDrp.submit();
			  return  true;
		  }
	  } 
  }
  http2.send(null);
}

function LoadAnotherViewMainImage_Edit_PRESS(LoadAnotherViewMainImage_ID,eid,Iid)
{
	//alert(name);
	//alert(password);
  var http3 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http3 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http3 = new XMLHttpRequest();
	}
  http3.abort();
  http3.open("GET", "ajax_validation.php?Type=LoadAnotherViewMainImage_Edit_PRESS&eid="+eid+"&Iid="+Iid, true);
  http3.onreadystatechange=function()
  {
	  if(http3.readyState == 4)
	  {
		  if(http3.responseText!="")
		  {
			  document.getElementById(LoadAnotherViewMainImage_ID).innerHTML= "<span style='color:#FF0000'>"+http3.responseText+"</span>";
			  return  false;
		  }
	  } 
  }
  http3.send(null);
}

function LoadPressItemdetail(id,imagesetid)
{
/*	alert(id);
	alert(imagesetid);*/
  var http42 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http42 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http42 = new XMLHttpRequest();
	}
  http42.abort();
  http42.open("GET", "ajax_validation.php?Type=LoadPressItemdetail&id="+id+"&imagesetid="+imagesetid, true);
  http42.onreadystatechange=function()
  {
	  if(http42.readyState == 4)
	  {
		  if(http42.responseText!="")
		  {
			  var aa,bb,dd;
			  aa=http42.responseText;
			  bb=aa.split("##########");
			  document.getElementById("IMAGETITLE_ID").innerHTML= "<b>"+bb[0]+"</b>";
			  document.getElementById("IMAGEDESCRIPTION_ID").innerHTML= nl2br(bb[1]);
			  /*if(bb[2]!="")
			  {
			  	document.getElementById("COMMENTS_ID").innerHTML= nl2br(bb[2]);
			  }
			  else
			  {
				document.getElementById("COMMENTS_ID").innerHTML= "No Comments";  
			  }*/
			  document.getElementById("MAINIMAGE_ID").innerHTML=' <img src="onlinethumb.php?nm=PressViews/'+bb[2]+'&mwidth=548&mheight=330" border="0">';
		  }
	  } 
  }
  http42.send(null);
}
function SendComment_PRESS(SendComment_ID,comment,pid,ProjectUserId)
{
 var http233 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http233 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http233 = new XMLHttpRequest();
	}
  http233.abort();
  http233.open("GET", "ajax_validation.php?Type=SendComment_PRESS&comment="+nl2br(comment)+"&pid="+pid+"&ProjectUserId="+ProjectUserId, true);
  http233.onreadystatechange=function()
  {
	  if(http233.readyState == 4)
	  {
		  //alert(http233.responseText)	;
		  if(http233.responseText=="NotLoggedin")
		  {	
		  		document.getElementById(SendComment_ID).innerHTML= "Please login to comment on this user\'s press.";
		  }
		  else if(http233.responseText=="OWN")
		  {	
		  		document.getElementById(SendComment_ID).innerHTML= "You can't send comments to your own press.";
		  }
		  else if(http233.responseText=="Sent")
		  {
			  document.getElementById(SendComment_ID).innerHTML= "<span style='color:#FF0000'>Comment has been sent successfully.</span>";
		  }
		  else
		  {
			  document.getElementById(SendComment_ID).innerHTML= http233.readyState;
		  }
	  } 
  }
  http233.send(null);
}

function venuedropdown(venuedropdown_ID)
{
	var http7 = false;
	if(navigator.appName == "Microsoft Internet Explorer") { http7 = new ActiveXObject("Microsoft.XMLHTTP");} else { http7 = new XMLHttpRequest();}
	http7.abort();
	http7.open("GET", "ajax_validation.php?Type=venuedropdown", true);
	http7.onreadystatechange=function()
	{
		  if(http7.readyState == 4){document.getElementById(venuedropdown_ID).innerHTML=http7.responseText;} 
	}
	http7.send(null);
}
function LoadCountry_States(LoadCountry_States_ID,CountryName,statefieldname,totalwidth)
{
	//alert(name);
	//alert(password);
  var http4 = false;
	if(navigator.appName == "Microsoft Internet Explorer") {
	  http4 = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  http4 = new XMLHttpRequest();
	}
  http4.abort();
  http4.open("GET", "ajax_validation.php?Type=LoadCountry_States&CountryName="+CountryName+"&statefieldname="+statefieldname+"&totalwidth="+totalwidth, true);
  document.getElementById(LoadCountry_States_ID).innerHTML= "Loading....";
  http4.onreadystatechange=function()
  {
	  if(http4.readyState == 4)
	  {
		  if(http4.responseText!="")
		  {
			  document.getElementById(LoadCountry_States_ID).innerHTML= http4.responseText;
			  return  false;
		  }
	  } 
  }
  http4.send(null);
}
//////////////////////////////////////
