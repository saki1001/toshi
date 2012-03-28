<form name="frmsrch" action="manage_product.php" id="frmsrch" method="get" enctype="multipart/form-data">
	<table width="100%" border="0" cellpadding="2" cellspacing="1" >
	  <tr><td colspan="2">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="5%"><img src="images/login/bullet1.jpg" alt="bullet" width="10" height="29" /></td>
			<td width="95%"  background="images/login/leftbg.jpg"  class=form111>Search Products</td>
		  </tr>
		</table>

	  </td></tr>
	  <?php /*?><tr><td colspan="2">&nbsp;</td></tr><?php */?>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>Category</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_maincat" id="left_maincat" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(id,catname,category,' where parentid=0 order by catname asc',$_REQUEST['left_maincat']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>Brand</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_brand" id="left_brand" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(id,name,brands,' where 1=1 order by name asc',$_REQUEST['left_brand']);?>
			</select>
		</td>
	  </tr>
	 <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>Flooring</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_flooringtype" id="left_flooringtype" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(id,name,flooringtype,' where 1=1 order by name asc',$_REQUEST['left_flooringtype']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>Species</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_species" id="left_species" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(name,name,species,' where 1=1 order by name asc',$_REQUEST['left_species']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" nowrap="nowrap" style="padding-left:10px;"><strong>Finish Sys.</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_finishsystem" id="left_finishsystem" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(name,name,finishsystem,' where 1=1 order by name asc',$_REQUEST['left_finishsystem']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>Edge Type</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_edgetype" id="left_edgetype" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(name,name,edgetype,' where 1=1 order by name asc',$_REQUEST['left_edgetype']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>Class</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_perfclass" id="left_perfclass" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(name,name,perfclass,' where 1=1 order by name asc',$_REQUEST['left_perfclass']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" valign="top" style="padding-left:10px;"><strong>DIY Level</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_diylevel" id="left_diylevel" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(name,name,diylevel,' where 1=1 order by name asc',$_REQUEST['left_diylevel']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td width="38%" height="20" align="left" nowrap="nowrap" valign="top" style="padding-left:10px;"><strong>Gloss Level</strong></td>
		<td width="62%" align="left" valign="top">
		  <select name="left_gloss" id="left_gloss" class="solidinput" style="width:155px;" >
					<option value="">All</option>
					<?=GetDropdown(name,name,gloss,' where 1=1 order by name asc',$_REQUEST['left_gloss']);?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td align="left" height="20" width="38%"  valign="top" style="padding-left:10px;"><strong>SKU</strong></td>
		<td align="left" valign="top"><input type="text" name="left_productnumber" id="left_productnumber" value="<? echo htmlentities(stripslashes(trim($_REQUEST["left_productnumber"]))); ?>" style="width:155px;"  class="solidinput"/></td>
	  </tr>
	  <tr>
		<td align="left" height="20" width="38%"  valign="top" style="padding-left:10px;"><strong>Keyword</strong></td>
		<td align="left" valign="top"><input type="text" name="searchname" id="searchname" value="<? echo htmlentities(stripslashes(trim($_REQUEST["searchname"]))); ?>" style="width:155px;"  class="solidinput"/></td>
	  </tr>
	  
	  
	  <tr>
		<td align="left" height="20" width="38%"  valign="top"  style="padding-left:10px;"><strong>Records</strong>
		<td align="left" valign="top">
			 <select name="db_pages" id="db_pages" style="width:155px;" >
				<?
				$arr_pages=array("20","50","100","150","200","500");
				 for ($i6=0;$i6<count($arr_pages);$i6++) { ?>
				<option value="<? echo $arr_pages[$i6] ?>" <? if ($arr_pages[$i6]==$_REQUEST['db_pages']) echo "Selected";?>><? echo $arr_pages[$i6] ?> Records per page</option>
				<? } ?>
			  </select> 
		</td>
	  </tr>
	  <tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="20px" valign="bottom">
		  <input type="submit" name="btnsrch" id="btnsrch" class="bttn-s" value="SEARCH" onChange="frmsrch.submit();" style="width:58px;">
		  <input type="button" name="Viewallbtn" onClick="window.location.href='manage_product.php'" style="width:50px;" value="CLEAR" class="bttn-s">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:105px;" value="NEW PRODUCT" onClick="javascript:location.href='add_product.php';" >
		</td>
	  </tr>
	  <tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="CATEGORY MANAGEMENT" onClick="javascript:location.href='manage_category.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="BRANDS MANAGEMENT" onClick="javascript:location.href='manage_brands.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="FLOORING TYPE MANAGEMENT" onClick="javascript:location.href='manage_flooringtype.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="SPECIES MANAGEMENT" onClick="javascript:location.href='manage_species.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="FINISH SYSTEM MANAGEMENT" onClick="javascript:location.href='manage_finishsystem.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="EDGE TYPE MANAGEMENT" onClick="javascript:location.href='manage_edgetype.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="CLASS MANAGEMENT" onClick="javascript:location.href='manage_perfclass.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="DIY LEVEL MANAGEMENT" onClick="javascript:location.href='manage_diylevel.php';" >
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left"  nowrap="nowrap" style="padding-left:10px;"  height="22px" valign="bottom">
		  <input type="button" name="btnreset" id="btnreset" class="bttn-s" style="width:220px;" value="GLOSS MANAGEMENT" onClick="javascript:location.href='manage_gloss.php';" >
		</td>
	</tr>
	</table>
  </form>