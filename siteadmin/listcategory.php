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

$sql1="select * from country where  country_name='".$id."'";
$rs1=mysql_query($sql1);
$rrow=mysql_fetch_array($rs1);


$sql="select * from classifieds_category where type='".$id."' order by 	name";
$rs=mysql_query($sql);
$tot=mysql_affected_rows();

$data='<select name="category" id="category" class="solidinput" style="width:375px;">';
if($tot)
{
	$data.="<option value=''>Select Classified Category</option>";
	for($w=0;$w<$tot;$w++)
	{
		$aj=mysql_fetch_object($rs);
		//$id=$aj->state_name;
		$id=stripslashes(htmlentities($aj->id));
		$name=stripslashes(html_entity_decode($aj->name));
			$data.="<option value='".$id."'>".$name."</option>";
	}
}
else
{
		$data.="<option>No Category</option>";
}

echo $data; //htmlentities($data,ENT_QUOTES);

//echo $HidVtypeid="<input type='hidden1' id='HidVtypeId' value='$id' >";

?>