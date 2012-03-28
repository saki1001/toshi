<? 
  include("admin.config.inc.php");
  include("connect.php");
  //$db=mysql_connect($DBSERVER, $USERNAME, $PASSWORD) or die ("Couldnt connect")	;
  //mysql_select_db($DATABASENAME,$db) or die("Couldnt find database")	;	
	
  $name=$_POST['name'];
  $password=$_POST['password'];
 
  $query=mysql_query("select * from admin WHERE username='$name' AND password='$password'");  
  $row=mysql_fetch_assoc($query);
  $total_rows=mysql_num_rows($query);
  $ADMIN_USERNAME=$row["username"];
  $ADMIN_PASSWORD=$row["password"];
  
   $UID=$row["userid"];
   if(isset($UsErIdAdMiN))
		{
		  setcookie("UsErIdAdMiN","");
		  $UsErIdAdMiN="";
		}
 
		if(($name==$ADMIN_USERNAME) && ($password==$ADMIN_PASSWORD) && ($total_rows>0))
		{
			setcookie("UsErIdAdMiN",1);
			setcookie("UsErOfAdMiN",$ADMIN_USERNAME);
			setcookie('ReSoUrCe','');
			//echo "Heeeeeeeeee";			
			header("Location:inner.php");
	  }
	  else
	  {		   
			header("Location:index.php?Err=1");
	  }

?>



