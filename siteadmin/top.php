<?
$username= $_COOKIE["UsErOfAdMiN"];
$userid=$_COOKIE["UsErIdAdMiN"];

if (!isset($userid))
{
	header("location:index.php");
}
?>
<link href="css/biz.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1_pr {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 28px;
	color:#990033;
	FONT-WEIGHT: bold;
	text-decoration:none;
}
-->
</style>
<script type="text/JavaScript">
<!--
function mmLoadMenus() {
  if (window.mm_menu_1229121137_0) return;
  window.mm_menu_1229121137_0 = new Menu("root",125,20,"Tahoma",11,"#000000","#000000","#F6F6F6","#FFFFFF","left","middle",3,0,1000,-5,7,true,true,true,0,true,false);
  mm_menu_1229121137_0.addMenuItem("Archieve","location='inner_archieve.php'");
  mm_menu_1229121137_0.addMenuItem("Folders","location='folder_mng.php'");
  mm_menu_1229121137_0.addMenuItem("Mails","location='admin_mails.php'");
 mm_menu_1229121137_0.hideOnMouseOut=true;
   mm_menu_1229121137_0.bgColor='#C5C5C5';
   mm_menu_1229121137_0.menuBorder=1;
   mm_menu_1229121137_0.menuLiteBgColor='#FFFFFF';
   mm_menu_1229121137_0.menuBorderBgColor='#C5C5C5';
mm_menu_1229121137_0.writeMenus();
} // mmLoadMenus()



function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script language="JavaScript" src="js/mm_menu.js"></script>
<script language="JavaScript1.2">mmLoadMenus();</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="70" valign="top"  style="background-color:#000000;"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="60%"><table width="94%" height="68" border="0">
                <tr>
                  <td valign="middle"  class="H1"><a href="inner.php"><img src="../images/logo.png" border="0" /></a></td>
                </tr>
              </table></td>
            <td width="33%" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" background="images/login/topmenubg.jpg" class="greybdr">
              <tr>
                <td width="33%" height="28" align="center" class="greyrightbdr">Welcome <? echo ucfirst($username); ?> </td>
				 <td width="10%" valign="bottom" align="right"><a href="logout.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/login/logour-hover.jpg',1)"><img src="images/login/logour.jpg" name="Image6" width="50" height="24" border="0" id="Image6" /></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="46" valign="top" class="menubg2">
		
		<? /* if ($UsErIdAdMiN=='admin') {
				include('top_admin.php');
		 }else if ($UsErIdAdMiN=='Writer') {
				include('top_writer.php');
		 }else if ($UsErIdAdMiN=='Photo Editor') {
					include('top_ph.php');
		 }else if ($UsErIdAdMiN=='Copy Editor') {
					include('top_ce.php');
		 			
		
 }*/ include('top_admin.php');?></td>
      </tr>
      <tr>
        <td height="10" valign="top"></td>
      </tr>
    </table>