<?
include("connect.php");
include("linkvars.php");
include_once("admin.config.inc.php");
$Err=$_GET["Err"];
setcookie("UsErTyPe","");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? echo $ADMIN_MAIN_SITE_NAME; ?></title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style1_pr {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 28px;
	color:#990033;
	FONT-WEIGHT: bold;
}
-->
</style>
<link href="css/biz.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="password.php" method="post" name="loginfrm" id="loginfrm">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="69" valign="middle"  style="background-color:#000000;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td  width="22%"  valign="middle" ><img src="../images/logo.png" border="0" /></td>
                  <td width="78%">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td height="36" class="menubg">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="115">&nbsp;</td>
          </tr>
          <tr>
            <td><table width="35%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td height="172" valign="top" class="midbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="20" align="center" valign="top" class="greybold">Please enter your username and password.</td>
                      </tr>
                      <tr>
                        <td><table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="25%">&nbsp;</td>
                              <td width="4%">&nbsp;</td>
                              <td width="71%">&nbsp;</td>
                            </tr>
                            <? if ($Err=="1") { ?>
                            <tr>
                              <td align="right" class="greybold">Error : </td>
                              <td>&nbsp;</td>
                              <td ><span class="style1"><font color="#FF0000" >Please specify a valid username and password.</font></span></td>
                            </tr>
                            <?  } ?>
                            <tr>
                              <td align="right" class="greybold">Username : </td>
                              <td>&nbsp;</td>
                              <td height="25"><input type="text" size='20' id="name" name="name"  value=""/></td>
                            </tr>
                            <tr>
                              <td align="right" class="greybold">Password : </td>
                              <td>&nbsp;</td>
                              <td height="25"><input type="password" size='20'  id="password" name="password" value=""/></td>
                            </tr>
                            <tr>
                              <td align="right" class="greybold">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td height="30" valign="bottom"><input type="submit" class="button" name="submit" value="Login" > <input type="button" class="button" onclick="window.location.href='forgotpass.php';" name="sussbmit" value="Forgot Password?" ></td>
                            </tr>
                            <tr>
                              <td align="right" class="greybold">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td valign="bottom">&nbsp;</td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td height="115">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#F6F6F6" class="greybold">&copy;<?=$SITE_TITLE?> All Right Reserved.</td>
    </tr>
  </table>
</form>
</body>
</html>