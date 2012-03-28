<?php
include("connect.php");
global $THUMBNAIL_IMAGEPATH;
//////////Username Validation//////////
if($_REQUEST["Type"]=="venuedropdown")
{
	function validate12()
	{	
		$RightTop20BestSelllerQry2="SELECT *  from event_venues order by id desc";
		$RightTop20BestSelllerQryRs2=mysql_query($RightTop20BestSelllerQry2);
		$RightTop20BestSelllerQryRow2=mysql_fetch_object($RightTop20BestSelllerQryRs2);	
		$lastid=$RightTop20BestSelllerQryRow2->id;
		
		$RightTop20BestSelllerQry="SELECT *  from event_venues order by name asc ";
		$RightTop20BestSelllerQryRs1=mysql_query($RightTop20BestSelllerQry);
		$TotRightTop20BestSelller=mysql_num_rows($RightTop20BestSelllerQryRs1);
		$Data.='<select name="venueid" id="venueid" style="width:260px;background:#999999;padding:1px 2px;color:#FFFFFF;font:11px;height:20px"><option value="">Select a venue</option>';
		if($TotRightTop20BestSelller>0)
		{
			for($RBSD1=0;$RBSD1<$TotRightTop20BestSelller;$RBSD1++)
			{
				$RightTop20BestSelllerQryRow1=mysql_fetch_object($RightTop20BestSelllerQryRs1);	
				
				
				
				if($lastid==$RightTop20BestSelllerQryRow1->id){$sel='selected';}else{$sel='';}
				
				$Data.="<option value='".$RightTop20BestSelllerQryRow1->id."'  ".$sel." >".stripslashes($RightTop20BestSelllerQryRow1->name)." in ".stripslashes($RightTop20BestSelllerQryRow1->city).", ".stripslashes($RightTop20BestSelllerQryRow1->state)."</option>";
			}
		}
		$Data.='</select>';		
		return $Data;
	}
	echo validate12();
}
else if($_REQUEST["Type"]=="LoadCountry_States")
{
	function validate($CountryName,$statefieldname,$totalwidth)
	{
		$sql1="select id_country from country where country_name='".$CountryName."'";
		$rs1=mysql_query($sql1);
		$rrow=mysql_fetch_array($rs1);
		
		
		$sql="select * from state where id_country='".$rrow['id_country']."' order by 	state_name";
		$rs=mysql_query($sql);
		$tot=mysql_affected_rows();
		
		$Data='<select name="'.$statefieldname.'" id="'.$statefieldname.'" class="register_textfield2" style="width:153px;">';
		if($tot)
		{
			$Data.="<option value=''>Select</option>";
			for($w=0;$w<$tot;$w++)
			{
				$aj=mysql_fetch_object($rs);
				$id=$aj->state_name;
				$name=stripslashes(htmlentities($aj->state_name));
				$Data.="<option value='".$id."'>".$name."</option>";
			}
		}
		else
		{
				$Data.="<option value=''>No Record</option>";
		}
		return $Data;
	}
	echo validate(trim($_REQUEST['CountryName']),trim($_REQUEST['statefieldname']),trim($_REQUEST['totalwidth']));
}
?>