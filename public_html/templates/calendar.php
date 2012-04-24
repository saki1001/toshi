<script language="javascript" type="text/javascript">
var xmlHttp111; 

function GetXmlHttpObject1()
{ 
var objXMLHttp=null
if (window.XMLHttpRequest)
{
objXMLHttp=new XMLHttpRequest()


}
else if (window.ActiveXObject)
{
objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
}
return objXMLHttp
}
function Get_Result111(divname,yr,mn,pg,viewtype)
{
	
	document.getElementById("caltdd").innerHTML="<img src='images/loading.gif' alt='Loading...'>";
	xmlHttp111=GetXmlHttpObject1();
	if (xmlHttp111==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	
	var url="templates/calendar_get.php?div="+divname+"&yr="+yr+"&mn="+mn+"&pg="+pg+"&viewtype="+viewtype;
    // alert(url);
	xmlHttp111.onreadystatechange=stateSubChanged111;
	xmlHttp111.open("GET",url,true);
	xmlHttp111.send(null);
} 
function stateSubChanged111() 
{ 	
	if (xmlHttp111.readyState==4)
	{ 		
		document.getElementById("caltdd").innerHTML=xmlHttp111.responseText;
		
	}
}
function Get_Dateet(dtttt)
{
	document.bokkfrm.day.value=dtttt;
	document.bokkfrm.submit();
}
</script>
<?
if($_GET["day"]!="")
{
	$mmm=date("m",strtotime($_GET["day"]));
	$yyy=date("Y",strtotime($_GET["day"]));
}
else
{
	$mmm=date("m");
	$yyy=date("Y");
}
$ddd=date("d");

if($_REQUEST['cdate'])
{
	$mmm=date("m",strtotime($_GET["cdate"]));
	$ddd=date("d",strtotime($_GET["cdate"]));
	$yyy=date("Y",strtotime($_GET["cdate"]));
}
if($_REQUEST['viewtype'])
{
	$viewtype=$_REQUEST['viewtype'];
}
else
{
	$viewtype="week";
}
?>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">
        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td width="100%" height="193" align="left" valign="top" id="caltdd">
    		  <script language="javascript">Get_Result111('user_all','<?=$yyy;?>','<?=$mmm;?>','<?=$ddd;?>','<?=$viewtype;?>');</script>		  
               </td>
            </tr>
        </table>
      </td>
  </tr>
</table>
