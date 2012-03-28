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