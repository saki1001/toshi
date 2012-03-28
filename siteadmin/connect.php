<?php
	session_start();
	include ("../include/config.inc.php");
	include ("../include/functions.php");
	//include_once ("../include/CryToGraphy.php");
	
	//include ("../include/phpfunctions.php");
	include_once ("../include/sendmail.php");
	include_once ("../include/prs_function.php");
	include_once ("../include/gtg_functions.php");
	include_once ("linkvars.php");	
	$imagewidth="85";
	$imageheight="112";
	$bimagew=200;
	$bimageh=300;
	$db=mysql_connect($DBSERVER, $USERNAME, $PASSWORD) or die ("Couldnt connect")	;
	mysql_select_db($DATABASENAME,$db) or die("Couldnt find database")	;
	

function Fcase($PString)
{
	return strtoupper(substr($PString,0,1)).substr($PString,1,strlen($PString));
}
function getLinkText($str)
{
	return "onmouseover=\"window.status='$str'\" onmouseout=\"window.status='$str'\" onMouseMove=\"window.status='$str'\"";
}
function generateListLinks($link,$classname,$viewallmsg,$sortmsg)
{
	$fvar_linktext_ini=getLinkText($viewallmsg);//"View All Models"
	echo "<a href='$link?order=%' class='$classname' $fvar_linktext_ini> All </a>";
	for ($fvar_i=65;$fvar_i<91;$fvar_i++)
	{
		$fvar_chr=chr($fvar_i);
		$fvar_linktext=getLinkText($sortmsg.$fvar_chr);//"Sort Model with name starting with "
		echo "<a href='$link?order=$fvar_chr' class='$classname' $fvar_linktext> $fvar_chr </a>";
	}
}

?>