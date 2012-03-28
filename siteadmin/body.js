/*function framecheck(section)
{
	if( self == top )
	{
		var url = "/webadmin/home.aspx";
		
		switch(section)
		{
			case "home":
				url = '/webadmin/home.aspx';
				break;
			case "contacts":
				url = '/webadmin/contacts.aspx';
				break;
			case "accounts":
				url = '/webadmin/accounts.aspx';
				break;
			case "settings":
				url = '/webadmin/settings.aspx';
				break;
			case "site":
				url = '/webadmin/site.aspx';
				break;
		}	
		this.location = url ;
	}
}*/
function smsg(msgStr) { //v1.0
  status=msgStr;
  document.prs_return = true;
}
function nosmsg(msgStr) { //v1.0
  status=msgStr;
  document.prs_return = true;
}
function openWin(pageToLoad, winName, width, height, center,scrollbar){
	  if ((parseInt(navigator.appVersion) >= 4 ) && (center)){
		        xposition = (screen.width - width) / 2;
		        yposition = (screen.height - height) / 2;
	args = "width=" + width + "," + "height=" + height + "," + "location=0," + "menubar=0," + "resizable=1," + "scrollbars=" + scrollbar + "," + "status=1," + "titlebar=0," + "toolbar=0," + "hotkeys=0," + "screenx=" + xposition + "," + "screeny=" + yposition + "," + "left=" + xposition + "," + "top=" + yposition;
	newWindow = window.open(pageToLoad,winName,args)
	window.focus
	}
}
function openWin2(pageToLoad, winName, width, height, center,scrollbar){
	  if ((parseInt(navigator.appVersion) >= 4 ) && (center)){
		        xposition = (screen.width - width) / 2;
		        yposition = (screen.height - height) / 2;
	args = "width=" + width + "," + "height=" + height + "," + "location=0," + "menubar=0," + "resizable=0," + "scrollbars=" + scrollbar + "," + "status=1," + "titlebar=0," + "toolbar=0," + "hotkeys=0," + "screenx=" + xposition + "," + "screeny=" + yposition + "," + "left=" + xposition + "," + "top=" + yposition;
	newWindow = window.open(pageToLoad,winName,args)
	window.focus
	}
}
function deleteconfirm(str,strurl)
{
	if (confirm(str)) 
	{
		this.location=strurl;
	}
}	
function displaysub(the_sub)
{
	var my_sub = document.getElementById('idd' + the_sub);
	var my_img = document.getElementById('img' + the_sub);
	
	var img_plus = 'images/plus.gif';
	var img_minus = 'images/minus.gif';
	
	if (my_sub.style.display=="none")
	{
		my_sub.style.display="inline";
		my_img.src = img_minus ;
		return
	}
	else
	{
		my_sub.style.display="none";
		my_img.src = img_plus ;
		return
	}
}
function in_ext_lib_onlyimages(str)
{
	var x;
	var flag = 0;
	var myext = new Array();
	myext[0] = ".gif";
	myext[1] = ".jpg";
	myext[2] = ".jpeg";
	myext[3] = ".png";
	myext[4] = ".JPG";
	myext[5] = ".JPEG";
	myext[6] = ".GIF";
	myext[7] = ".PNG";
	myext[8] = ".bmp";
	
	for (x in myext)
	{
		if(str.substr(str.lastIndexOf(".",str)).toLowerCase() == myext[x])
		{
			flag = 1;
			break;	
		}
	}
	if(flag == 0)
	{
		alert("Please upload only .gif, .jpg or .png file.");
		return false;
	}
	else
	{
		return true;
	}
}
function in_ext_lib_onlyvideos(str)
{
	var x;
	var flag = 0;
	var myext = new Array();
	myext[0] = ".3g2";
	myext[1] = ".3gp";
	myext[2] = ".3gpp";
	myext[3] = ".asf";
	myext[4] = ".avi";
	myext[5] = ".dat";
	myext[6] = ".flv";
	myext[7] = ".m4v";
	myext[8] = ".mkv";
	myext[9] = ".mod";
	myext[10] = ".mov";
	myext[11] = ".mp4";
	myext[12] = ".mpe";
	myext[13] = ".mpeg";
	myext[14] = ".mpeg4";
	myext[15] = ".mpg";
	myext[16] = ".nsv";
	myext[17] = ".ogm";
	myext[18] = ".ogv";
	myext[19] = ".qt";
	myext[20] = ".tod";
	myext[21] = ".vob";
	myext[22] = ".wmv";
	
	for (x in myext)
	{
		if(str.substr(str.lastIndexOf(".",str)).toLowerCase() == myext[x])
		{
			flag = 1;
			break;	
		}
	}
	if(flag == 0)
	{
		alert("Please upload only movie file.");
		return false;
	}
	else
	{
		return true;
	}
}
function in_ext_lib_onlydocs(str)
{
	var x;
	var flag = 0;
	var myext = new Array();
	myext[0] = ".doc";
	myext[1] = ".docx";
	myext[2] = ".pdf";
	myext[3] = ".txt";
	
	for (x in myext)
	{
		if(str.substr(str.lastIndexOf(".",str)).toLowerCase() == myext[x])
		{
			flag = 1;
			break;	
		}
	}
	if(flag == 0)
	{
		alert("Please upload only .doc, .pdf or .txt file.");
		return false;
	}
	else
	{
		return true;
	}
}