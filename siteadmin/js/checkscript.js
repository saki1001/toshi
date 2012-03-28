/* to be used
function checkfrm()
{
		if(!(isFloat(document.form1.amt.value)))
	{
		document.form1.amt.select();
		alert("Not a Valid Amount");
		return false;
	}
	dom=document.frm;
	if (emailcheck(dom.email.value)) { msg("Enter valid Email address");dom.email.focus();return false; }
	if (emailcheck(dom.cemail.value)) { msg("Enter valid Email address");dom.cemail.focus();return false; }	
	if (!checknull(dom.pword,"Enter Password")) {  return false; }
	if (!checknull(dom.cpword,"Enter Confirm Password")) {  return false; }	
	if (!checknull(dom.paylast,"Enter your last pay")) {  return false; }		
	if (dom.location.options[dom.location.options.selectedIndex].value=="Select")
	{
		msg("select a state of residence");
		dom.location.focus();
		return false;
	}
	if (dom.qsel.options[dom.qsel.options.selectedIndex].value=="Select")
	{
		msg("select a Secret Question");
		dom.qsel.focus();
		return false;
	}
	if (!checknull(dom.answere,"Enter Secret Question Answere")) {  return false; }		
}


*/

// JavaScript Document

function statustxt(val)
{
// onMouseDown="return statustxt('<? echo $ChildLinkTitle?>')" onMouseMove="return statustxt('<? echo $ChildLinkTitle?>')" onmouseout="return statustxt('<? echo $ChildLinkTitle?>')" onMouseUp="return statustxt('<? echo $ChildLinkTitle?>')" onmouseover="return statustxt('<? echo $ChildLinkTitle?>')"
  status=val;
  return true;

}
function checkdt()
{
	dom=document.placefrm;
	if (Date.parse(dom.bill_end_dt.value) <= Date.parse(dom.bill_start_dt.value)) {
		alert("The dates are valid.");
	}
}
function checkhttp(strpassed)
{
		var strr=strpassed.value
		strextn=strr.substr(0,4)
		strextn=strextn.toUpperCase();
		
		if(strextn=='HTTP')
		{
			alert("Do not add http:// before your website URL (eg.www.billboard.com)");
			
		}	
		
		return true;
}
//if (!chkcardno(dom.password,"Enter Password with Minimum 3 Characters")) {  return false; }
/*function chkcardno(str,msg)
{	
	var strr=str.value;
	var strlen=strr.length;
	if(strlen!=16 || strlen!=15)
	{
		alert(msg);
		str.focus();
		return false;
	}
	return true;
}
function chkcardno16(str,msg)
{	
	var strr=str.value;
	var strlen=strr.length;
	if(strlen!=16)
	{
		alert(msg);
		str.focus();
		return false;
	}
	return true;
}*/

//Enter Password with Minimum 3 Characters
//if (!chkstrlen(dom.password,"Enter Password with Minimum 3 Characters")) {  return false; }
function chkcommentf(str,msg)
{	
	var strr=str.value;
	var strlen=strr.length;
	if(strlen>50)
	{
		alert(msg);
		str.focus();
		return false;
	}
	return true;
}
function chkcomment(str,msg)
{	
	var strr=str.value;
	var strlen=strr.length;
	if(strlen>200)
	{
		alert(msg);
		str.focus();
		return false;
	}
	return true;
}
function chkstrlen(str,msg)
{	
	var strr=str.value;
	var strlen=strr.length;
	if(strlen<5)
	{
		alert(msg);
		str.focus();
		return false;
	}
	return true;
}
function checkext(strpassed)
{

		var strr=strpassed.value
		
		var lenstrn=strr.length;
		strextn=strr.substr(lenstrn-4)
		strextn=strextn.toUpperCase();
		
		if(strextn!='JPEG' && strextn!='.JPG' && strextn!='.GIF' && strextn!='.PNG' )
		{
			alert("Format of files allowed to upload: GIF, JPEG OR PNG");
			strpassed.focus();
			return false;
		}	
		
		return true;
}
function trim(inputString) {
   // Removes leading and trailing spaces from the passed string. Also removes
   // consecutive spaces and replaces it with one space. If something besides
   // a string is passed in (null, custom object, etc.) then return the input.
   if (typeof inputString != "string") { return inputString; }
   var retValue = inputString;
   var ch = retValue.substring(0, 1);
   while (ch == " ") { // Check for spaces at the beginning of the string
      retValue = retValue.substring(1, retValue.length);
      ch = retValue.substring(0, 1);
   }
   ch = retValue.substring(retValue.length-1, retValue.length);
   while (ch == " ") { // Check for spaces at the end of the string
      retValue = retValue.substring(0, retValue.length-1);
      ch = retValue.substring(retValue.length-1, retValue.length);
   }
   while (retValue.indexOf(" ") != -1) { // Note that there are two spaces in the string - look for multiple spaces within the string
      retValue = retValue.substring(0, retValue.indexOf(" ")) + retValue.substring(retValue.indexOf(" ")+1, retValue.length); // Again, there are two spaces in each of the strings
   }
   return retValue; // Return the trimmed string back to the user
} // Ends the "trim" function
function msg(msg)
{
	
	alert(msg);
}
function emailcheck(email) 	                                        
{                                                                       
	                                                                
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
	{                                                               
		return false;                                           
	}                                                               
	return true;                                                    
}    
function isFloat(s) 
{
		if(!s.match(/^\d{0,10}[.]{0,1}\d{0,2}$/))
			return false;
		else
			return true ;
}

function isphoneNumber(s) 
{
	//alert("Dfsdfsdf");
	if(s.match(/^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,3})|(\(?\d{2,3}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/))
		return true;		
	else
	    return false ;
}
function isNumber(s) 
{
	
	if(s.match(/^\d{0,10}$/) && s <= 2147483647)
		return true;		
	return false ;
}
function isNum(argvalue) {
argvalue = argvalue.toString();

if (argvalue.length == 0)
return false;

for (var n = 0; n < argvalue.length; n++)
if (argvalue.substring(n, n+1) < "0" || argvalue.substring(n, n+1) > "9")
return false;

return true;
}
function checknull(Obj,Msg)
{

	if (trim(Obj.value)=="")
		{
			msg(Msg);
			Obj.focus();
			return false;
		}
	else
		{
		return true;
		}
}
function checkoption(Obj,Msg)
{
	/*alert(Obj.options[0].value);
	alert(Obj);*/
	if (trim(Obj.options[Obj.selectedIndex].value)=="")
		{
			msg(Msg);
			Obj.focus();
			return false;
		}
		else
		{
			return true;
		}
}