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
        form.ship_state.selectedIndex=form.state.selectedIndex;
        //updatestate(form.country.value,'sstate','sstate1');
        // LoadCountry_States('LoadCountr_States_ID2',form.country.value,'ship_state','188')
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
        form.ship_state.selectedIndex=0;
        //updatestate(form.ship_country.value,'sstate','sstate1');
        // LoadCountry_States('LoadCountr_States_ID2',form.ship_country.value,'ship_state','188')
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
//        document.getElementById('proc').style.visibility="hidden";
//        document.getElementById('btn1').style.visibility="visible"; 
      }
    }
  xmlHttp.send(null);
}