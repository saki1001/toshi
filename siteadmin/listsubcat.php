<?
include("connect.php");
if($_POST["id"])
{
	$id=$_POST["id"];
}
if($_GET["id"])
{
	$id=$_GET["id"];
}
$cid=$_REQUEST['cid'];
if($id!="")
{
	$sql="select * from category where parentid='".$id."' order by catname Asc";
	$rs=mysql_query($sql);
	$tot=mysql_affected_rows();
	$data='<select name="subcat" id="subcat" class="solidinput"  style="width:200px;">';
	if($tot)
	{
		$data.="<option value=''>Select</option>";
		for($w=0;$w<$tot;$w++)
		{
			$aj=mysql_fetch_object($rs);
			$id=stripslashes($aj->id);
			$name=stripslashes($aj->catname);
				$data.="<option value=".$id.">".$name."</option>";
		}
	}
	else
	{
		$data.="<option value=''>No Record</option>";
	}
}
else
{
	$data='<select name="subcat" id="subcat" class="solidinput"  style="width:200px;">';
		$data.="<option value=''>Select</option>";
}	

$data.="</select>";
echo $data; //htmlentities($data,ENT_QUOTES);

//echo $HidVtypeid="<input type='hidden1' id='HidVtypeId' value='$id' >";

?>