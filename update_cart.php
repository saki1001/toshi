<?	include("connect.php");
if($_REQUEST['FROM_REVIEW']=="YES")
{
	GTG_remove_from_cart($_REQUEST['pid']);
	header("Location:orderreview.php");
	exit;
}
else if($_REQUEST['DelItem']=="YES")
{
	GTG_remove_from_cart($_REQUEST['pid'],$_REQUEST['priceid']);
	header("Location:viewcart.php?Update=yes");
	exit;
}
else
{
	$ii = $_REQUEST['i'];
	for($i=0;$i<=$ii;$i++)
	{
		$val = "val".$i;
		//$chk = "chk".$i;
		$customize = "customize".$i;
		if(isset($_REQUEST[$val]))
		{
			update($_REQUEST[$val]);
		}	
	}	
	header("Location:viewcart.php?Update=yes");
	exit;
}	
function update($val)
{
	$update = explode('@',$val);
	$i = $update[0];
	$p = $update[1]; 
	$textname = "quantity".$i;
	$size = "size".$i;
	$customize = "customize".$i;
	$q = (int)$_REQUEST[$textname];
	$c = $_REQUEST[$customize];
	$s = $_REQUEST[$size]; 
	if($q>0)
	{
		GTG_add_to_cart_individual($p,$q,$s);
	}
	else
	{
		?>
		<script language="javascript">
		alert("Please enter valid quantity");
		location.href = "<?=$_SERVER['HTTP_REFERER'];?>";
		</script>
		<?
	}
}

function delete($val,$customize)
{
	$update = explode('@',$val);
	$p = $update[1]; 
	GTG_remove_from_cart($p);
}
?>