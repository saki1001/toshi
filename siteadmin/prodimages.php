<?php
  include_once("admin.config.inc.php");
  include("admin.cookie.php");
  include("connect.php") ;
  $mlevel=1;
  $Error=0;
    
  if($_POST["chseq"]!="")
  {
	$pid = $_POST["chseq"];
	$orgseq = $_POST["orgseq"];
	$newseq	= $_POST[$pid];
		
	$upqry1 = "update prodimages set displayorder='$newseq' where id='$pid'";
	$upqry2 = "update prodimages set displayorder='$orgseq' where displayorder='$newseq' and pid='".$_POST["ProdId"]."'";
	
	$upres2 = mysql_query($upqry2);
	$upres1 = mysql_query($upqry1);	
	$msg = "Display Sequence Updated Successfully";			
  }
  
  
  if($_POST["imageset"])
  {
	  $pid=$_GET["pid"];	 
	  $selsql33 = " select * from prodimages where pid=$pid order by displayorder" ;
	  $selres33 = mysql_query($selsql33);
	  while($obj33=mysql_fetch_object($selres33))
	  {
	  	   if($obj33->id==$_POST["imgset"])
		   { 
		   		 $qryy = " update prodimages set featured='Y' where id=".$obj33->id;
 				mysql_query($qryy);
		   }
		   else
		   {
		   		 $qryy = " update prodimages set featured='N' where id=".$obj33->id;
 				mysql_query($qryy);
		   }
	  }	  
	  $msg = "Feature Image Updated Successfully";			
  }
  
  $pid=$_GET["pid"];
  $title=$_GET["title"];	
  $selsql = " select * from prodimages where pid=$pid order by displayorder asc" ;
  $selres = mysql_query($selsql);
  $totpics = mysql_affected_rows();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $ADMIN_MAIN_SITE_NAME ?></title>
<link href="main.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</head>
<body leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<script language=javascript src="body.js"></script>
<script language="javascript">
function testings()
{	
  dom=document.frm;	
	if(dom.img.value == "")
	{
		alert("Please enter image.");
		dom.img.focus();
		return false; 
	}	
	else 
	{
		return true;
	}
}
function chseqfun(cid,oid)
{
	var cidobj = document.getElementById(cid);
	if(cidobj.value=="0")
	{
		alert("Select a sequence number to change sequence.");
		cidobj.focus();
		return false;
	}
	else
	{
		document.form2.chseq.value = cid;
		//alert(document.form2.chseq.value);
		document.form2.orgseq.value = oid;
		document.form2.submit();
	}
}
</script>
<table align="left" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="75"><? include ("top.php"); ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
  <td>
  <table cellSpacing=0 cellPadding=0 width="100%" border=0>
    <tbody>
      <tr>
      
      <td width="20%"  valign="top" class="rightbdr" ><? include("inner_left_admin.php"); ?>
      </td>
      <td width="80%" valign="top" align="center">
      
      <table width="100%"  border=0 cellpadding="2" cellspacing="2">
        <tr>
          <TD height="35" class="form111">Manage Product Images </TD>
        </tr>
        <tr>
          <td class="formbg" valign="top"><form action="saveprodpics.php" method="post" enctype="multipart/form-data" name="frm" id="frm">
              <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" >
                <tr>
                  <td colspan="2" align="center"><strong>Add images to product [
                    <?=getname("products",$pid,"name");?>
                    ]</strong></td>
                </tr>
                <? if($msg){?>
                <tr>
                  <td colspan="2" align="center" class="a-l"><font ><? echo $msg; ?></font></td>
                </tr>
                <? } ?>
                <tr>
                  <td width="6%">&nbsp;</td>
                  <td width="94%"><div align="right"><span class="a">* indicates required field </span></div></td>
                </tr>
                <tr>
                  <td ><strong>Image</strong></td>
                  <td ><input name="img" type="file" class="buttonclass" id="img" />&nbsp;<?php /*?><font color="red">[Ideal Image Size width=360 height=350]</font><?php */?> </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input name="Submit" type="submit"  value="Add" onClick="return testings();" class="bttn-s" />
                    &nbsp;
                    <input name="Reset" type="reset"  value="Reset" onClick="javascript:document.frm.reset();" class="bttn-s"/>
                    &nbsp;
                    <input name="Finish" type="button"  value="Finish" onClick="javascript:document.location.href='manage_product.php'" class="bttn-s"/>
                    <input type="hidden" name="pid" value="<?=$pid;?>"/>
                    <input type="hidden" name="title" value="<?=$title;?>"/></td>
                </tr>
              </table>
            </form></td>
        </tr>
        <tr>
          <td class="formbg">
          <!--start-->
          <form name="form2" method="post" id="form2">
            <table width="98%" align="center" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td colspan="3" align="center" height="35" ><strong>Current Images in [
                  <?=getname("products",$pid,"name");?>
                  ]</strong></td>
              </tr>
              <?
				$c=1;
				if($totpics==0)
				{
					echo "<pre><td>
					<table width='100%' border='1' cellpadding='2' cellspacing='2' bordercolor='#FFD447'>
					  <tr>
						<td align='center' class='yellowbold'>No Pictures Added</td>
					  </tr>
					</table></td></pre>";
				}
				while($obj=mysql_fetch_object($selres))
				{
				?>
              <td width="172" valign="top" >
                <table border='1' cellpadding='0' cellspacing='0' class="proimagetable">
                  <tr>
                    <td align='center' height="105" width="105"><img src="../onlinethumb.php?nm=<? echo "Products/".$obj->pimage ;?>&mwidth=101&mheight=102" /></td>
                  </tr>
                  <tr>
                    <td align='center' ><a class='linktop' href='#' onClick="javascript:document.location.href='delprodimg.php?<? echo "imgid=".$obj->id."&img=".$obj->pimage."&pid=$pid"; ?>';">Remove</a></td>
                  </tr>
				  <?php /*?> <tr>
					<td align='center' height="30px">Display Sequence : 
						<select name="<? echo $obj->id; ?>" id="<? echo $obj->id; ?>" onChange="chseqfun(<? echo $obj->id; ?>,<? echo $obj->displayorder; ?>);">
						 <option value="0">Select</option>
						<? for($fc=1;$fc<=$totpics;$fc++){ ?>
							<option value="<? echo $fc; ?>" <? if($fc==$obj->displayorder){echo "selected";} ?>><? echo $fc; ?></option>
						<?	} ?>
					  </select>
					  </td>
                  </tr><?php */?>
				  <tr>
					<td align='center' height="30px">Set Feature Image : 
						<input type="radio" name="imgset" class="inputCheck" <? if($obj->featured=='Y') { ?> checked="checked" <? } ?> value="<? echo $obj->id; ?>">
					  </td>
                  </tr>
                </table>
              </td>
              <?
					if($c%5==0) echo "</tr>";
					$c++;
				}
			  ?>
			   <tr>
				  <td colspan="4" align="center" height="35" >
				  <input name="imageset" type="submit"  value="Set Feature Image"  class="bttn-s" />
				   </td>
				</tr>
              <input type="hidden" name="chseq">
              <input type="hidden" name="orgseq">
              <input type="hidden" name="ProdId" value="<?=$_GET["pid"];?>" >
            </table>
          </form>
        </td>
        </tr>
      </table>
    </td>
    </tr>
    </tbody>
  </table>
  </td>
  </tr>
</table>
</body>
</html>