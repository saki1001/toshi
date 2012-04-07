<?
$Get_Users_Session=mysql_query("SELECT id FROM users WHERE id='".$_SESSION['UsErId']."'");

if((!$_SESSION["UsErId"]) || (mysql_num_rows($Get_Users_Session)<=0)) {
    $_SESSION["UsErId"]=='';
    header("location:../login.php?msg=Not logged in.");
    exit;
}
?>
