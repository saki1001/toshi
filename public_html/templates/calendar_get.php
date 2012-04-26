<?
include("../../connect.php");
if(isset($_REQUEST['mn'])) $mn=$_REQUEST['mn'];
else $mn=date("m");
if(isset($_REQUEST['yr'])) $yr=$_REQUEST['yr'];
else $yr=date("Y");

$dddate=$_REQUEST['yr']."-".$_REQUEST['mn']."-".$_REQUEST['pg'];
$getDateee=date("Y-m-d",strtotime($dddate));

if($_REQUEST['viewtype']) { $viewtype=$_REQUEST['viewtype']; } else {     $viewtype="week"; }

$montharr=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April",    "05"=>"May","06"=>"June","07"=>"July","08"=>"August",    "09"=>"September","10"=>"October","11"=>"November","12"=>"December");
$dayarr=array("Sun"=>"01","Mon"=>"02","Tue"=>"03","Wed"=>"04","Thu"=>"05","Fri"=>"06","Sat"=>"07");

if($mn==1)
{
    $plink="?yr=".($yr-1)."&mn=12";
    $prvyrr=$yr-1;
    $prvmnn="12";
}
else
{
    $plink="?yr=".$yr."&mn=".substr("0".($mn-1),-2);
    $prvyrr=$yr;
    $prvmnn=$mn-1;
}

if($mn==12)
{
    $nlink="?yr=".($yr+1)."&mn=01";
    $nxtyrr=$yr+1;
    $nxtmnn="01";
}
else
{
    $nlink="?yr=".$yr."&mn=".substr("0".($mn+1),-2);
    $nxtyrr=$yr;
    $nxtmnn=$mn+1;
}    

if(strlen($nxtmnn)=="1") { $nxtmnn="0".$nxtmnn; }
if(strlen($prvmnn)=="1") { $prvmnn="0".$prvmnn; }

$pday=date("t",mktime(0,0,0,$mn-1,1,$yr));
$cday=$dayarr[date("D",mktime(0,0,0,$mn,1,$yr))];
$tday=date("t",mktime(0,0,0,$mn,1,$yr));
$cd=1;
$chk=1;

if($tday>=30 && $cday==7) { $cd=30; $chk=0; }
if($tday==31 && $cday==6) { $cd=31; $chk=0; }

$prevdate=$prvyrr."-".$prvmnn."-01";
$nextdate=$nxtyrr."-".$nxtmnn."-01";

$allcaldta='';
$allcaldta.='<table width="220"  border="0" align="left" cellpadding="2" cellspacing="2">
    <tr align="center" valign="middle">
      <td width="100%" height="34" valign="middle" ><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15%" align="left" valign="middle" >
                <a href="#" class="calendar_arrow left" onclick="window.location.href=\'events.php?cdate='.$prevdate.'&viewtype=month\';"  ></a>
            </td>
            <td id="calendar_title" width="70%" align="center" valign="middle" >'.$montharr[$mn].', '.$yr.'</td>
            <td width="15%" align="right" valign="middle" >
                <a href="#" class="calendar_arrow right" onclick="window.location.href=\'events.php?cdate='.$nextdate.'&viewtype=month\';"  ></a>
            </td>
          </tr>
        </table></td>
    </tr>
    <tr align="center" valign="top">
      <td width="100%" height="5" valign="middle"  >&nbsp;</td>
    </tr>
    <tr>
      <td width="100%"  valign="top"><table  width="100%" border="3" cellpadding="3" cellspacing="1">
        <tr>
        <td width="25" height="20" align="center" valign="middle"><strong>S</strong></td>
        <td width="25" align="center" valign="middle"><strong>M</strong></td>
        <td width="25" align="center" valign="middle"><strong>T</strong></td>
        <td width="25" align="center" valign="middle"><strong>W</strong></td>
        <td width="25" align="center" valign="middle"><strong>T</strong></td>
        <td width="25" align="center" valign="middle"><strong>F</strong></td>
        <td width="27" align="center" valign="middle"><strong>S</strong></td>
      </tr>
        <tr>';
        $add7day=0;
        if($viewtype=="week")
        {
            $add7day=$_REQUEST['pg']+7;
        }
        if($viewtype=="month")
        {
            $add7day=$_REQUEST['pg']+35;
        }
        $a222=1;
           for($a=1;$a<=35;$a++) 
           { 
                if((($a>=$cday && $cd<=$tday) || ($a<=7 && $cd>=30)) && $chk<=1) 
                { 
                    $a222++;
                    $chkdt=date("Y-m-d",mktime(0,0,0,$mn,$cd,$yr));
                    $checkdate=0;
                    if($chkdt==date("Y-m-d")){ $fontcolodr="color:#F2F2F2;"; } else { $fontcolodr="color:#CCCCCC;"; } 
                    
                    if($getDateee==$chkdt)
                    { 
                        $bgcolodr="background-color:#D6767D;";$fontcolodr="color:#F2F2F2;"; 
                    } 
                    else 
                    { 
                        $bgcolodr="background-color:#555555;"; 
                    } 
                    if($a222<=$add7day && $a222>$_REQUEST['pg'])
                    { 
                        $bgcolodr="background-color:#D6767D;";$fontcolodr="color:#FFFFFF;"; 
                    } 
                                        
                    //$add7day--;
                    if(strtotime($chkdt)>strtotime(date("Y-m-d")) || $chkdt==date("Y-m-d"))
                    {
                        $allcaldta.='<td bgcolor="#C3C3C3" height="30" ><table width="100%" border="0" cellspacing="0" cellpadding="0">';                    
                        $allcaldta.='<tr><td align="center" valign="middle"  height="25" style="font-size:12px;cursor:pointer;'.$fontcolodr.''.$bgcolodr.'" onclick="window.location.href=\'events.php?cdate='.$chkdt.'&viewtype='.$viewtype.'\';">'.$cd.'</td></tr>';
                    }
                    else
                    {
                        $allcaldta.='<td bgcolor="#C3C3C3" height="30" ><table width="100%" border="0" cellspacing="0" cellpadding="0">';                    
                        $allcaldta.='<tr><td align="center" valign="middle"  height="25" style="font-size:12px;background-color:#333333;color:#555555;" >'.$cd.'</td></tr>';
                    }
                    $allcaldta.='</table></td>';
                    $cd++; 
                } 
                else 
                { 
                    $allcaldta.='<td bgcolor="#FFFFFF" >&nbsp;</td>';
                } 
                
                if($cd>$tday) { $cd=1; $chk++; }
                    
                if($a%7==0 && $chk>1) { break; } elseif($a%7==0) 
                { 
                    $allcaldta.='</tr><tr>';
                } 
           } 
$allcaldta.='</tr></table></td></tr>';


if($viewtype=="week"){$weekcolor='#D6767D';}else{$weekcolor='#777272';}
if($viewtype=="day"){$daycolor='#D6767D';}else{$daycolor='#777272';}
if($viewtype=="month"){$monthcolor='#D6767D';}else{$monthcolor='#777272';}

$dddate=$_REQUEST['yr']."-".$_REQUEST['mn']."-".$_REQUEST['pg'];

$allcaldta.='<tr><td align="center" valign="middle"  height="25" >
<a style="font-size:12px;cursor:pointer;color:'.$daycolor.'" onclick="window.location.href=\'events.php?cdate='.$dddate.'&viewtype=day\';">Day</a> | 
<a style="font-size:12px;cursor:pointer;color:'.$weekcolor.'" onclick="window.location.href=\'events.php?cdate='.$dddate.'&viewtype=week\';">Week</a> | 
<a style="font-size:12px;cursor:pointer;color:'.$monthcolor.'" onclick="window.location.href=\'events.php?cdate='.$dddate.'&viewtype=month\';">Month</a> 
</td></tr>';
$allcaldta.='</table>';
echo $allcaldta;
?>
