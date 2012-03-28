<?
	include_once("admin.config.inc.php");
    include("admin.cookie.php");
	include("connect.php");
	$imgid= $_GET["imgid"];
	$img = $_GET["img"];
	$pid=$_GET["pid"];
	if(file_exists("../Products/$img") && $img != "")
	{
		@unlink("../Products/$img");
	}
	$delsql = " delete from prodimages where id=$imgid " ;
	$delres = mysql_query($delsql);
	header("location:prodimages.php?pid=$pid");
?>