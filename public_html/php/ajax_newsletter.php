<?
include("../../connect.php"); 
if($_GET['email']!="")
{
    $query1subs="SELECT * FROM subscriber WHERE email='".addslashes($_GET['email'])."'";
    $ressubs=mysql_query($query1subs);
    $totsubs=mysql_affected_rows();
    if($totsubs>0)
    {
        echo 3;
    }
    else
    {
        $AddUserQry="INSERT INTO subscriber SET email='".addslashes($_GET['email'])."',sdate=now()";    
        mysql_query($AddUserQry);
        echo 2;
    }
}
else
{
    echo 1;
}
?>