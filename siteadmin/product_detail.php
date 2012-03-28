<?php
include_once("admin.config.inc.php");
include("admin.cookie.php");
include("connect.php"); 
$mlevel=3;
$id=$_GET["id"];
$seli="select * from products where  products.id=$id ";
$runi=mysql_query($seli);
$geti=mysql_fetch_object($runi);

?>
<!doctype html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<title> <?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link href="demo.css" type=text/css rel=stylesheet>
<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<script language=javascript src="body.js"></script>
<script language="javascript" type="text/javascript">
function MM_openBrWindow(theURL,winName,features)
{ 
  	window.open(theURL,winName,features);
}
</script>
<table cellSpacing=10 cellPadding=0  border=0 width="98%" align="center">
	<tbody>
		<tr>
		  <td width="100%" class="form_back" height="20">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left"><span class="form111">Product Details</span></td>
				<td align="right"><a href="#" onClick="javascript:window.close();">Close</a></td>
			  </tr>
			</table>
		 </td>
		</tr>
		<tr>
			<td>			  
				<form name="form2" action="#" method="post" enctype="multipart/form-data">        
					<table width="100%" border=0 cellSpacing=0 cellpadding="0" class="t-b">
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>SPECIFICATIONS&nbsp;</strong></td>
						</tr>
						 <tr>
						  <td width="19%" height="25" align="left" class="black12"><strong>Categry:</strong></td>
						  <td width="81%"><? echo ucfirst(getname("category",$geti->category,"catname")); ?>&nbsp;</td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" class="black12"><strong>Flooring type:</strong></td>
						  <td width="81%"><? echo ucfirst(getname("flooringtype",$geti->flooringtype,"name")); ?>&nbsp;</td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Name:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->name);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Product Number:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->productnumber);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" class="black12"><strong>Price:</strong></td>
						  <td width="81%">$<?=stripslashes($geti->price);?>&nbsp;</td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Species:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->species);?>&nbsp;</td>
					    </tr>
						
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Collection:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->collection);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Performance Class:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->performanceclass);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Warranty:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->warranty);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Construction:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->construction);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Finish System:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->finishsystem);?>&nbsp;</td>
					    </tr>
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>LOOK&nbsp;</strong></td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Color:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->color);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Design / Texture:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->look);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Gloss Level:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->gloss);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Edge Type:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->edgetype);?>&nbsp;</td>
					    </tr>
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>MEASURMENT&nbsp;</strong></td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Width:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->widthh);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Length:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->lengthh);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Thickness:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->thickness);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Sq. Foot per Carton:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->sqftperbox);?>&nbsp;</td>
					    </tr>
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>INSTALLATION&nbsp;</strong></td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>DIY Level:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->DIYlevel);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Installation Location:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->installationlocation);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Installation Method:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->installationmethod);?>&nbsp;</td>
					    </tr>
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>IMAGES&nbsp;</strong></td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" class="black12"><strong>Main Picture:</strong></td>
						  <td width="81%">
						  <? if(trim($geti->mainimage)!="") { ?>
						  <img src="<?=$geti->mainimage;?>" border="0" >	
						  <br>				  
						  <? } ?>&nbsp;
						  </td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" class="black12"><strong>Swatch Picture:</strong></td>
						  <td width="81%">
						  <? if(trim($geti->swatchimage)!="") { ?>
						  <img src="<?=$geti->swatchimage;?>" border="0" >	
						  <br>				  
						  <? } ?>&nbsp;
						  </td>
						</tr>
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>EXTRA PARAMETERS &nbsp;</strong></td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>On or above ground:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->onoraboveground);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Below ground:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->belowground);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Wood sub floor:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->woodsubfloor);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Float:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->floatt);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Glue:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->glue);?>&nbsp;</td>
					    </tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Nail:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->nail);?>&nbsp;</td>
					    </tr>
						<tr  class="blue">
						  <td colspan="4" height="25" align="center" valign="top" class="blue" ><strong>DESCRIPTION&nbsp;</strong></td>
						</tr>
						<tr>
						  <td width="19%" height="25" align="left" valign="top" ><strong>Product Description:&nbsp;</strong></td>
						  <td height="25" colSpan=3 valign="top"><?=stripslashes($geti->description);?>&nbsp;</td>
					    </tr>
					</table>
				</form></td>
		</tr>		
	</tbody>
</table>
</body>
</html>