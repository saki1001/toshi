<?php

// Get Name from Any Table GetName(tablename,return field name,where clause, id);
function make_seed() 
{
	list($usec, $sec) = explode(' ', microtime());
	return (float) $sec + ((float) $usec * 100000);
}

function GetName1($tablename,$field,$where,$id)
{
	$uquery="SELECT * FROM $tablename WHERE $where='$id'";
	$uresult=mysql_query($uquery);
	$urow=mysql_fetch_object($uresult);
	$newval=$urow->$field;
	return $newval;
}
// Get Value in combo box from any table GetCombo(select one, tablename,value field name,display field name,where clause optional,orderby,selected value optional)

function GetCombo1($display,$tablename,$fieldname,$disfieldname,$where,$orderby,$selected)
{	
	$hrquery="SELECT * FROM $tablename";
	
	if($where)
	{
		$hrquery.=" WHERE $where";
	}
	$hrquery.=" ORDER BY $orderby";
	
	$hrresult=mysql_query($hrquery);
	$hrtotalrow=mysql_affected_rows();
	
	if($display)
		$Getval="<option value=''>Select $display</option>";
	
	
	for($hr=0;$hr<$hrtotalrow;$hr++)
	{
		$hrrow=mysql_fetch_object($hrresult);
		$newval=stripslashes(ucfirst($hrrow->$disfieldname));
		$val=$hrrow->$fieldname;

		if($val==$selected)
			$sel="selected";
		else
			$sel="";
		
		$Getval.="<option value='$val' $sel>$newval</option>";
	}
	return $Getval;
}


function getname($table,$id,$name,$compvar="id")
{
	$getsql = "select $name from $table where $compvar='$id'";
	$getres = mysql_query($getsql);
	if($getres)
	{
		$getobj = mysql_fetch_array($getres);
		return stripslashes($getobj[0]);
	}
	else
	{
		return "";
	}
}

function getcombo($table,$value,$name,$args="",$sel="")
{
	$comboqry = "select $value,$name from $table ".$args ;
	$combosres = mysql_query($comboqry);
	while($comboobj = mysql_fetch_array($combosres))
	{
		$comboobj[0]  = stripslashes($comboobj[0]);
		$comboobj[1]  = stripslashes($comboobj[1]);	
		if($comboobj[0] == $sel)
		{
			$selected ="selected";
		}
		else
		{
			$selected = "";
		}
		echo "<option $selected value='$comboobj[0]'>".ucfirst(strtolower($comboobj[1]))."</option>" ;
	}
}

function getcombonew($table,$value,$name,$args="",$sel="",$seprator="-")
{
	$comboqry = "select $value,$name from $table ".$args ;
	$combosres = mysql_query($comboqry);
	while($comboobj = mysql_fetch_array($combosres))
	{
		$comboobj[0]  = stripslashes($comboobj[0]);
		$DisplayText = "";
		for($discnt=1;$discnt<count($comboobj);$discnt++)
		{
			$DisplayText .= stripslashes($comboobj[$discnt])."-";
		}
		$DisplayText = rtrim($DisplayText,"-");
		if($comboobj[0] == $sel)
		{
			$selected ="selected";
		}
		else
		{
			$selected = "";
		}
		echo "<option $selected value='$comboobj[0]'>$DisplayText</option>" ;
	}
}

function recursive_remove_directory($directory, $empty=FALSE)
 {
     // if the path has a slash at the end we remove it here
     if(substr($directory,-1) == '/')
     {
         $directory = substr($directory,0,-1);
     }
  
     // if the path is not valid or is not a directory ...
    if(!file_exists($directory) || !is_dir($directory))
     {
         // ... we return false and exit the function
         return FALSE;
  
     // ... if the path is not readable
     }
	 elseif(!is_readable($directory))
     {
         // ... we return false and exit the function
         return FALSE;
  
     // ... else if the path is readable
     }
	 else{
  
         // we open the directory
         $handle = opendir($directory);
  
        // and scan through the items inside
        while (FALSE !== ($item = readdir($handle)))
         {
             // if the filepointer is not the current directory
            // or the parent directory
             if($item != '.' && $item != '..')
             {
                 // we build the new path to delete
                 $path = $directory.'/'.$item;
  
                 // if the new path is a directory
                 if(is_dir($path)) 
                 {
                     // we call this function with the new path
                     recursive_remove_directory($path);
  
                 // if the new path is a file
                 }else{
                     // we remove the file
                     unlink($path);
                 }
             }
         }
         // close the directory
         closedir($handle);
  
         // if the option to empty is not set to true
         if($empty == FALSE)
         {
             // try to delete the now empty directory
             if(!rmdir($directory))
             {
                 // return false if not possible
                 return FALSE;
             }
         }
         // return success
         return TRUE;
    }
 }
 


function dcd($str)
{
	return stripslashes($str); 
}



//to generate date list box...added By 
function getDayValue($id="")
{
	for($d=1; $d < 32; $d++)
	{
		if($d == $id)
			$dayOption .="<option value='$d' selected>$d</option>";
		else
			$dayOption .="<option value='$d'>$d</option>";
	}
	return $dayOption;
}

//THIS FUNCTION IS FOR GETTING ARRAY OF 'YEAR FOR MOT' added By 
//ADDED ONE ARGUMENT FOR GETTING YEAR LIST IF THIRD ARGUMENT IS
//START YEAR THEN FIRST ARG TAKEN AS STARTING YEAR
//OTHER WISE IT WILL BE NO OF YEARS. CHANGED NAME TO GETYEAR

function getYear($id="",$val1="5",$type="styear",$start="1970")
{
	$date = getdate();

	$cur_yr = $date[year];

	if($type == "styear")
		$val1 = $cur_yr - $val1 + 1;
	
	for($c=$start; $c<=$val1; $c++,$cur_yr--)
	{
		if($c==$id)
			$motyOption.="<option value='$c' selected>$c</option>";
		else
			$motyOption.="<option value='$c'>$c</option>";
	}
	return $motyOption;
}

//THIS FUNCTION IS FOR GETTING ARRAY OF 'MONTH' added By 
//CHANGED NAME OF MOTMONTH TO GETMONTH

function getMonth($id="")
{	
		
	$mon=array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	
	$tMonth=$mon;
	$actMonth=$tMonth;
	
	for($m=1; $m < count($actMonth); $m++)
	{
		if($m == $id)
			$motmOption .="<option value='$m' selected>$actMonth[$m]</option>";
		else
			$motmOption .="<option value='$m'>$actMonth[$m]</option>";					
	}
	
	return $motmOption;
}

function my_array_unique($somearray)
{
	$tmparr = array_unique($somearray);
	$i=0;
	$newarr=array();
	foreach ($tmparr as $v)
	{ 
		if(!in_array(trim($v),$newarr))
		{
			$newarr[$i] = trim($v);
			$i++;
		}	
	}
	return $newarr;
}
function fetchvalue($table,$where,$id,$name)
{
	$getsql = "select $name from $table where $where='$id'";
	$getres = mysql_query($getsql);
	if($getres)
	{
		$getobj = mysql_fetch_array($getres);
		return stripslashes($getobj[0]);
	}
	else
	{
		return "";
	}
}

// function by ghanshyam start

function GTG_get_cat_name($id)
{
	$q = "select catname from category where id=".$id;
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
	{
		while($r1 = mysql_fetch_array($r))
		{
			return trim(stripslashes($r1['catname']));
		}
	}
	else
	{
		return "N/A";
	}
}

function GTG_get_main_cat_name($id)
{
	$q = "select * from category where id=".$id;
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
	{
		while($r1 = mysql_fetch_array($r))
		{
			$qq = "select catname from category where id=".$r1['parent'];
			$rr = mysql_query($qq);
			if(mysql_num_rows($rr) > 0)
			{
				while($rr1 = mysql_fetch_array($rr))
				{
					return trim(stripslashes($rr1['catname']));
				}
			}
		}
	}
	else
	{
		return "N/A";
	}
}

function GTG_get_image($pid)
{
	$q = "select * from prodimages where pid=".$pid." order by pimage asc limit 1";
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
	{
		while($r1 = mysql_fetch_array($r))
		{
			return trim($r1['pimage']);
		}
	}
	else
	{
		return "";
	}
}

function GTG_get_pagename($pid)
{
	$q = "select name from `staticpage` where `id`=".$pid;
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
	{
		while($r1 = mysql_fetch_array($r))
		{
			return trim($r1['name']);
		}
	}
}

function GTG_get_pagecontent($pid)
{
	$q = "select content from staticpage where id=".$pid;
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
	{
		while($r1 = mysql_fetch_array($r))
		{
			return trim(stripslashes($r1['content']));
		}
	}
}

function GTG_gtg_password($email)
{
	$q = "select password from users where email='".$email."'";
	$r = mysql_query($q);
	if(mysql_num_rows($r) > 0)
	{
		while($r1 = mysql_fetch_array($r))
		{
			return trim(stripslashes($r1['password']));
		}
	}
	else
	{
		return "NO_PASSWORD_FOUND";
	}
}

function GTG_tocap($str)
{
	echo ucfirst(strtolower($str));
}

## 31 ##
	function getcountry($id)
	{
		if($id != "" && $id > 0)
		{
			$q = "select * from country where id=".$id;
			$r = mysql_query($q);
			while($r1 = mysql_fetch_array($r))
			{
				return $r1['name'];
			}
		}
		else
		{
			return "N/A";
		}
	}
function getMonthpraful($id="")
{	
		
	$mon=array("","January","February","March","April","May","June","July","August","September","October","November","December");
	
	$tMonth=$mon;
	$actMonth=$tMonth;
	return $actMonth[$id];
}
// function by ghanshyam end
//Special Character  REmove //Alti
function replace_praful($str) 
{
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","n",$str);
	$str=ereg_replace("&","and",$str);
	$str=ereg_replace("&amp;","and",$str);
	
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","c",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","n",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","u",$str);	
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","y",$str);
	$str=ereg_replace("","y",$str);
	
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);	
	$str=ereg_replace("","C",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","I",$str);	
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","N",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);	
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);	
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","Y",$str);	
	//$str=ereg_replace("'","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	
	
	return $str;
}
//
function replace_praful_1($str) 
{
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","n",$str);
	//$str=ereg_replace("&","and",$str);
	$str=ereg_replace("&amp;","and",$str);
	
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","c",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","n",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","u",$str);	
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","y",$str);
	$str=ereg_replace("","y",$str);
	
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);	
	$str=ereg_replace("","C",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","I",$str);	
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","N",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);	
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);	
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","Y",$str);	
	//$str=ereg_replace("'","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	
	
	return $str;
}

function replace_praful_runner($str) 
{
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","n",$str);
	//$str=ereg_replace("&","and",$str);
	//$str=ereg_replace("&amp;","and",$str);
	
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","c",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","n",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","u",$str);	
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","y",$str);
	$str=ereg_replace("","y",$str);
	
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);	
	$str=ereg_replace("","C",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","I",$str);	
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","N",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);	
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);	
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","Y",$str);	
	//$str=ereg_replace("'","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	//$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	//$str=ereg_replace("","",$str);	
	//$str=ereg_replace("","",$str);	
	//$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	//$str=ereg_replace("","",$str);	
	//$str=ereg_replace("","",$str);	
	
	
	return $str;
}
//SQL injection functoin 
function pyp_add($str) 
{
	$str=ereg_replace("script=","",$str);
	$str=ereg_replace("script","",$str);
	$str=ereg_replace("select","",$str);
	$str=ereg_replace("union","",$str);
	$str=ereg_replace("drop","",$str);
	$str=ereg_replace("<","&lt;",$str);
	$str=ereg_replace("%3C","",$str);
	$str=ereg_replace(">","&gt;",$str);
	$str=ereg_replace("%3E","",$str);
	//$str=ereg_replace("&lt;","",$str);
	//$str=ereg_replace("&gt;","",$str);
	$str=ereg_replace(";","",$str);
	$str=ereg_replace("%3B","",$str);
	$str=ereg_replace("--","",$str);
	$str=ereg_replace("insert","",$str);
	$str=ereg_replace("delete","",$str);
	$str=ereg_replace("xp_","",$str);
	$str=ereg_replace("\*","",$str);
	$str=ereg_replace("sysobjects","",$str);
	$str=ereg_replace(".exe","",$str);
	$str=ereg_replace("exec","",$str);
	$str=ereg_replace("^","",$str);
	$str=ereg_replace("%5E","",$str);
	
	$str=addslashes(htmlentities($str, ENT_QUOTES)); 
	
	return $str;
}
function pyp_strip($str) 
{
	$str=ereg_replace("script=","",$str);
	$str=ereg_replace("script","",$str);
	$str=ereg_replace("select","",$str);
	$str=ereg_replace("union","",$str);
	$str=ereg_replace("drop","",$str);
	$str=ereg_replace("<","&lt;",$str);
	$str=ereg_replace("%3C","",$str);
	$str=ereg_replace(">","&gt;",$str);
	$str=ereg_replace("%3E","",$str);
	//$str=ereg_replace("&lt;","",$str);
	//$str=ereg_replace("&gt;","",$str);
	$str=ereg_replace(";","",$str);
	$str=ereg_replace("%3B","",$str);
	$str=ereg_replace("--","",$str);
	$str=ereg_replace("insert","",$str);
	$str=ereg_replace("delete","",$str);
	$str=ereg_replace("xp_","",$str);
	$str=ereg_replace("\*","",$str);
	$str=ereg_replace("sysobjects","",$str);
	$str=ereg_replace(".exe","",$str);
	$str=ereg_replace("exec","",$str);
	$str=ereg_replace("^","",$str);
	$str=ereg_replace("%5E","",$str);
	
	//Special Characters//
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","n",$str);
	//$str=ereg_replace("&","and",$str);
	$str=ereg_replace("&amp;","and",$str);	
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","a",$str);
	$str=ereg_replace("","c",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","e",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","i",$str);
	$str=ereg_replace("","n",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","o",$str);
	$str=ereg_replace("","u",$str);	
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","u",$str);
	$str=ereg_replace("","y",$str);
	$str=ereg_replace("","y",$str);	
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);
	$str=ereg_replace("","A",$str);	
	$str=ereg_replace("","C",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","E",$str);
	$str=ereg_replace("","I",$str);	
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","I",$str);
	$str=ereg_replace("","N",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);	
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","O",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);	
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","U",$str);
	$str=ereg_replace("","Y",$str);	
	//$str=ereg_replace("'","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	$str=ereg_replace("","",$str);	
	
	$str=stripslashes($str);
}

function getPureText($catnm)
{
	$catnm1=ereg_replace(" & ","",$catnm);
	$catnm1=ereg_replace(" / ","",$catnm1);
	$catnm1=ereg_replace("--","",$catnm1);
	$catnm1=ereg_replace("'","",$catnm1);
	$catnm1=ereg_replace(" ","",$catnm1);
	$catnm1=ereg_replace("/","",$catnm1);
	$catnm1=ereg_replace(":","",$catnm1);
	$catnm1=ereg_replace("/","",$catnm1);
	$catnm1=ereg_replace("[^A-Za-z0-9]","",$catnm1);
	return $catnm1;
}

function getExtension($filename)
{
	$path_info = pathinfo($filename);
	return ".".$path_info['extension'];
}
function GetDropdown($value,$name,$table,$args="",$sel="")
{
	$comboqry = "select $value,$name from $table ".$args ;
	$combosres = mysql_query($comboqry);
	while($comboobj = mysql_fetch_array($combosres))
	{
		$comboobj[0]  = stripslashes($comboobj[0]);
		$comboobj[1]  = stripslashes($comboobj[1]);	
		if($comboobj[0] == $sel)
		{
			$selected ="selected";
		}
		else
		{
			$selected = "";
		}
		echo "<option $selected value='$comboobj[0]'>".trim($comboobj[1])."</option>" ;
	}
}
//EXIRE YEAR
function expYear($id="")
{
	$date = getdate();

	$cur_yr = $date[year];
	$val1 = $cur_yr + 10;
		

	for($c=$cur_yr; $c<=$val1; $c++)
	{
		if($c == $id)
			$motyOption .="<option value='$c' selected>$c</option>";
		else
			$motyOption .="<option value='$c'>$c</option>";
	}
	return $motyOption;
}

//expire hour
function expHour($id="")
{

	for($c=1; $c<=12; $c++)
	{
		$selected = ($c == $id)?"SELECTED":"";
		$motyOption .="<option value='".str_pad($c,2,"0",STR_PAD_LEFT)."' $selected>".str_pad($c,2,"0",STR_PAD_LEFT)."</option>";
	}
	return $motyOption;
}

//expire minute
function expMin($id="")
{

	for($c=1; $c<=59; $c++)
	{
		$selected = ($c == $id)?"SELECTED":"";
		$motyOption .="<option value='".str_pad($c,2,"0",STR_PAD_LEFT)."' $selected>".str_pad($c,2,"0",STR_PAD_LEFT)."</option>";
	}
	return $motyOption;
}

function getMonth_new($id="")
{	
	//$mon=array("","January","February","March","April","May","June","July","August","September","Octomber","November","December");
	$mon=array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	
	$tMonth=$mon;
	$actMonth=$tMonth;
	
	for($m=1; $m < count($actMonth); $m++)
	{
		if($m == $id)
			$motmOption .="<option value='".str_pad($m,2,"0",STR_PAD_LEFT)."' selected>".str_pad($actMonth[$m],2,"0",STR_PAD_LEFT)."</option>";
		else
			$motmOption .="<option value='".str_pad($m,2,"0",STR_PAD_LEFT)."'>".str_pad($actMonth[$m],2,"0",STR_PAD_LEFT)."</option>";					
	}
	
	return $motmOption;
}
function getDay_new($id="")
{	
	for($m=1; $m <=31; $m++)
	{
		if($m == $id)
			$motmOption .="<option value='".str_pad($m,2,"0",STR_PAD_LEFT)."' selected>".str_pad($m,2,"0",STR_PAD_LEFT)."</option>";
		else
			$motmOption .="<option value='".str_pad($m,2,"0",STR_PAD_LEFT)."'>".str_pad($m,2,"0",STR_PAD_LEFT)."</option>";					
	}
	
	return $motmOption;
}
function getYear_new($id="",$max="20",$min="")
{
	$date = getdate();

	$cur_yr = $date[year];
	if($min=="")
	{
		$min=2009;
	}
	else
	{
		$min=$date[year]-$min;
	}
	$lastyr=2009+$max;
	for($c=$min; $c<=$lastyr; $c++)
	{
		if($c==$id)
			$motyOption.="<option value='$c' selected>$c</option>";
		else
			$motyOption.="<option value='$c'>$c</option>";
	}
	return $motyOption;
}
function dateDiff($start, $end)
{
	$start_ts = strtotime($start);
	$end_ts = strtotime($end);
	$diff = $end_ts - $start_ts;
	return round($diff / 86400);
}
function WebsiteWithProperUrl($website)
{
	 if($website!="")
	 {
		 if(substr($website,0,8)=="https://")
		 {
			$Htttpth="";
		 }
		 else if(substr($website,0,7)=="http://")
		 {
			$Htttpth="";
		 }
		 else 
		 {
			$Htttpth="http://";
		 }
		 return $Htttpth.$website;
	}
	else
	{
		return "#";
	}
	
}
function get_post($value)
{
$value=addslashes(trim($_POST[$value]));
return $value;
}
function get_value($fetch,$value)
{
$value=stripslashes(trim($fetch->$value));
return $value;
}
function get_get($value)
{

$value=strip_tags(addslashes(trim($_GET[$value])));
return $value;
}
function get_value_first($fetch,$value)
{
$value=ucfirst(stripslashes(trim($fetch->$value)));
return $value;
}

function GetDropdown_states($value,$name,$table,$args="",$sel="")
{
	$comboqry = "select $value,$name from $table where ( id_country=170  ) order by state_name asc";
	$combosres = mysql_query($comboqry);
	while($comboobj = mysql_fetch_array($combosres))
	{
		$comboobj[0]  = stripslashes($comboobj[0]);
		$comboobj[1]  = stripslashes($comboobj[1]);	
		if($comboobj[0] == $sel)
		{
			$selected ="selected";
		}
		else
		{
			$selected = "";
		}
		echo "<option $selected value='$comboobj[0]'>".trim($comboobj[1])."</option>" ;
	}
	echo '<option value="">---Province---</option>';
	$comboqry = "select $value,$name from $table where ( id_country=36  ) order by state_name asc";
	$combosres = mysql_query($comboqry);
	while($comboobj = mysql_fetch_array($combosres))
	{
		$comboobj[0]  = stripslashes($comboobj[0]);
		$comboobj[1]  = stripslashes($comboobj[1]);	
		if($comboobj[0] == $sel)
		{
			$selected ="selected";
		}
		else
		{
			$selected = "";
		}
		echo "<option $selected value='$comboobj[0]'>".trim($comboobj[1])."</option>" ;
	}
	echo '<option value="International">International</option>';
}
function expMin_new($id="")
{
	if($id == "00"){$selected1 ="selected";}else{$selected1 = "";}
	if($id == "15"){$selected2 ="selected";}else{$selected2 = "";}
	if($id == "30"){$selected3 ="selected";}else{$selected3 = "";}
	if($id == "45"){$selected4 ="selected";}else{$selected4 = "";}
	$motyOption .="<option value='00' $selected1>00</option>";
	$motyOption .="<option value='15' $selected2>15</option>";
	$motyOption .="<option value='30' $selected3>30</option>";
	$motyOption .="<option value='45' $selected4>45</option>";
	return $motyOption;
}
function CryptK($string,$Key)
{
	$sLen=strlen($string);
	for ($i=0;$i<$sLen;$i++)
		$RetStr.=ord(substr($string,$i,1))+$Key;
	return $RetStr;	
}
function DeCryptK($string,$Key)
{
	$sLen=strlen($string)/2;
	$j=0;
	for ($i=0;$i<$sLen;$i++)
	{
		$RetStr.=chr(substr($string,$j,2)-$Key);
		$j+=2;
	}
	return $RetStr;	
}
function GetTotalUserPackage($userid)
{
	$GetUserPcakageQry=mysql_query("SELECT * FROM users_packages where userid='".$userid."' and paidstatus ='Y'");
	$TotGetUserPcakageQry=mysql_affected_rows();
	return $TotGetUserPcakageQry;
}
function GetTotalUserPackageDetail($userid)
{
	$GetUserPcakageQry=mysql_query("SELECT * FROM users_packages where userid='".$userid."'");
	$TotGetUserPcakageQry=mysql_affected_rows();
	$GetUserPcakageQryRow=mysql_fetch_array($GetUserPcakageQry);
	return $GetUserPcakageQryRow['packageid'];
}
function GetMemberShipType($userid)
{
	$GetUserPackageQry=mysql_query("SELECT * from users_packages where userid='".trim($userid)."'");
	$TotGetUserPackage=mysql_affected_rows();
	if($TotGetUserPackage>0)
	{
		$GetUserPackageQryRow=mysql_fetch_object($GetUserPackageQry);
		if($GetUserPackageQryRow->packagetype=="FREE")
		{
			$PackageName="Basic Membership";
		}
		else
		{
			$PackageName="Premium Member";
		}
		//$PackageName=stripslashes(GetName1("packages","name","id",$GetUserPackageQryRow->packageid));
	}
	else
	{
		$PackageName="Basic Membership";
	}
	return $PackageName;
}
function GetAppliedforJobOrNot($userid,$jobid)
{
	if($userid=="")
	{
		$Returnval='<a href="job-apply.php?jid='.$jobid.'" class="link-red"><strong>Apply</strong></a>';
	}
	else
	{
		$GetUserPcakageQry=mysql_query("SELECT * FROM job_apply where jobapplyid='".$userid."' and  jobid ='".$jobid."'");
		$TotGetUserPcakageQry=mysql_affected_rows();
		if($TotGetUserPcakageQry>0)
		{
			$GetUserPcakageQryRow=mysql_fetch_array($GetUserPcakageQry);
			$applieddate=date("m/d/Y",strtotime($GetUserPcakageQryRow['applydate']));
			$Returnval='<span class="font-11-red">You applied to this job on '.$applieddate.'</span>';
		}
		else
		{
			$Returnval='<a href="job-apply.php?jid='.$jobid.'" class="link-red"><strong>Apply</strong></a>';
		}	
	}
	
	return $Returnval;
}
function int_to_Decimal($Intnumber)
{
	return number_format($Intnumber, 2, '.', '');
}

////////////////URL REWRITE
function GetUrl_MainCatPage($id,$start=0)
{
	session_start();	
	global $SITE_URL;
	//$name=strtolower(getname("category",$id,"name"));	
	$name=strtolower(GetName1("category","catname","id",$id));	
	$name1=getModifiedUrlNamechange($name);
	$stag1=str_replace("___","_",$name1);
	$name=str_replace("__","_",$stag1);
	
	if ($_SERVER['HTTP_HOST']=='plus')
		return "products.php?mcat=$id&start=$start";
	else
		return "$SITE_URL/catalog/$name/$id/$start"; 	
}
function GetUrl_SubCatPage($id,$start=0)
{
	session_start();	
	global $SITE_URL;
	//$name=strtolower(getname("category",$id,"name"));	
	$Parentid=strtolower(GetName1("category","parentid","id",$id));
	$maincatname=strtolower(GetName1("category","catname","id",$Parentid));	
	
	$name=strtolower(GetName1("category","catname","id",$id));	
	$name1=getModifiedUrlNamechange($name);
	$stag1=str_replace("___","_",$name1);
	$subcatname=str_replace("__","_",$stag1);
	
	if ($_SERVER['HTTP_HOST']=='plus')
	{
		return "products.php?mcat=$Parentid&scat=$id&start=$start";
		//return "$SITE_URL/catalog/$maincatname/$subcatname/$id/$start"; 	
	}	
	else
	{
		return "$SITE_URL/catalog/$maincatname/$subcatname/$id/$start"; 	
	}	
}
function GetUrl_StaticPage($id)
{
	session_start();	
	global $SITE_URL;
	//$name=strtolower(getname("category",$id,"name"));	
	$name=strtolower(GetName1("staticpage","name","id",$id));	
	$name1=getModifiedUrlNamechange($name);
	$stag1=str_replace("___","_",$name1);
	$name=str_replace("__","_",$stag1);
	
	if ($_SERVER['HTTP_HOST']=='plus')
		return "staticpage.php?Pageid=$id";
	else
		return "$SITE_URL/content/$name/$id"; 	
}
function ProductDetailPage($PId)
{
	global $SITE_URL;
	
	$select_prod=mysql_query("select maincat,subcat,name from products where id='$PId'");
	$fetch_prod=mysql_fetch_object($select_prod);
	$catname=strtolower(getname("category",$fetch_prod->maincat,'catname'));
	$subcatname=strtolower(getname("category",$fetch_prod->subcat,'catname'));
	
	if($fetch_prod->maincat!="" && $catname!="")
	{
		$name1=getModifiedUrlNamechange($catname);
		$stag1=str_replace("___","_",$name1);
		$name=str_replace("__","_",$stag1);
		$CnameFinal.=$name;
	}
	if($fetch_prod->subcat!="" && $subcatname!="")
	{
		$subcatname1=getModifiedUrlNamechange($subcatname);
		$stagsubcatname1=str_replace("___","_",$subcatname1);
		$subcatname=str_replace("__","_",$stagsubcatname1);
		$CnameFinal.="/".$subcatname;
	}
	
	$prodname1=strtolower(getModifiedUrlNamechange($fetch_prod->name));
	$prodname1stag1=str_replace("___","_",$prodname1);
	$productname=str_replace("__","_",$prodname1stag1);
	// Local Url
	if($_SERVER['HTTP_HOST']=="plus")
	{
		$McUrl=$SITE_URL."/product-details.php?id=".$PId;
		//$McUrl=$SITE_URL."/".$CnameFinal."/".$productname."-".$PId.".html";
	}
	else
	{
		$McUrl=$SITE_URL."/product/".$CnameFinal."/".$productname."-".$PId.".html";
	}	
	
	return $McUrl;
}
function getModifiedUrlNamechange($catnm)
{
	$catnm=trim($catnm);

	$catnm1=ereg_replace(" & ","_",$catnm);
	$catnm1=ereg_replace(" / ","_",$catnm1);
	$catnm1=ereg_replace("--","_",$catnm1);
	$catnm1=ereg_replace(" ","_",$catnm1);
	$catnm1=ereg_replace("--","_",$catnm1);
	$catnm1=ereg_replace("/","_",$catnm1);
	$catnm1=ereg_replace("--","_",$catnm1);
	$catnm1=ereg_replace(":","_",$catnm1);
	$catnm1=ereg_replace("/","_",$catnm1);
	$catnm1=ereg_replace("[^A-Za-z0-9]","_",$catnm1);
	$catnm1=ereg_replace("--","_",$catnm1);
	$catnm1=ereg_replace("--","_",$catnm1);
	return $catnm1;
}
function getTotalEvent($curdate)
{
	$SelEventsQry="SELECT id FROM events WHERE 1=1 and DATE_FORMAT(start_date,'%Y-%m-%d')='$curdate'";
	$SelEventsQryRs=mysql_query($SelEventsQry);
	$TotSelEvents=mysql_affected_rows();
	return $TotSelEvents;
}
function get_height($cms) 
{
	$inches = $cms/2.54;
	$feet = intval($inches/12);
	$inches = $inches%12;
	return $feet."'  ".$inches."\"";
}
function genRandomString($lnth=10) {
    $length = $lnth;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    return $string;
}
function ymd_to_mdy($olddate)
{
	$DATEENTERED= explode("-",$olddate);
	return $DATEENTERED[1]."/".$DATEENTERED[2]."/".$DATEENTERED[0];
}
function mdy_to_ymd($olddate)
{
	$DATEENTERED= explode("/",$olddate);
	return $DATEENTERED[2]."-".$DATEENTERED[0]."/".$DATEENTERED[1];
}
function GetTicketPrice($PID)
{
	$selecteventticketoption ="select * from events_pricelevel where id='$PID'";
	$rseventticketoption = mysql_query($selecteventticketoption);
	$rowselecteventticketoption = mysql_fetch_array($rseventticketoption);
	$curdate=strtotime(date("Y-m-d"));
	/*echo "<br>cur=".$curdate=strtotime(date("Y-m-d"));
	echo "<br>earlybird_startdate=".strtotime($rowselecteventticketoption['earlybird_startdate']);
	echo "<br>earlybird_enddate=".strtotime($rowselecteventticketoption['earlybird_enddate']);
	echo "<br>";*/
	if($rowselecteventticketoption['earlybird_active']=="Y" && strtotime($rowselecteventticketoption['earlybird_startdate'])<=$curdate && strtotime($rowselecteventticketoption['earlybird_enddate'])>=$curdate)
	{
		return $rowselecteventticketoption['earlybird_price'];
	}
	else if($rowselecteventticketoption['advanced_active']=="Y" && strtotime($rowselecteventticketoption['advanced_startdate'])<=$curdate && strtotime($rowselecteventticketoption['advanced_enddate'])>=$curdate)
	{
		return $rowselecteventticketoption['advanced_price'];
	}
	else if($rowselecteventticketoption['full_active']=="Y" && strtotime($rowselecteventticketoption['full_startdate'])<=$curdate && strtotime($rowselecteventticketoption['full_enddate'])>=$curdate)
	{
		return $rowselecteventticketoption['full_price'];
	}
	else
	{
		return $rowselecteventticketoption['onlineprice'];
	}
}
?>