<?
include("connect.php");
include("linkvars.php");
include_once("admin.config.inc.php");

$name=$_POST['name'];
if($_POST['ForgotPss'])
{
	if($name!="")
	{
		$query=mysql_query("select * from admin WHERE adminmail='$name'");  
		if(mysql_affected_rows()>0)
		{
			$roww=mysql_fetch_object($query);
			$usernm=$roww->username;
			$pasord=$roww->password;
			$subject1=$SITE_NAME." - Password Assistance";			
			$from1=$ADMIN_MAIL;	
			$mailcontent1="<html>
				<head>
				<title>$SITE_TITLE</title>
				</head>
				<body>
				<table width='800' border='0' cellspacing='2' cellpadding='0'>
				  <tr>
					<td align='left'>
					<p>Hi,</p>
						<p>
							Admin login information is as follows:<br />
							  <strong>Username: ".$usernm."<br />
							  Password: ".$pasord."</strong>
							  </p>
						<p>Regards,<br />
						$SITE_NAME Admin</p>
					</td>
				  </tr>
				</table>
				</body>
				</html>";
			//echo $name;echo $subject1;echo $mailcontent1;echo $name;exit;
			if($_SERVER['HTTP_HOST']!="plus")
			{
				HtmlMailSend($name,$subject1,$mailcontent1,$from1);
			}
			$Err="2";
		}
		else
		{
			$Err="1";
		}
	}
	else
	{
		$Err="1";
	}
}
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
<form  method="post" name="loginfrm" id="loginfrm" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="69" valign="middle"  style="background-color:#000000;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td  width="22%"  valign="middle" ><h1 style="color:#FFFFFF;">Toshi's PlayHouse</h1></td>
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
                        <td height="20" align="center" valign="top" class="greybold">&nbsp;<strong>Please enter your email address.</strong></td>
                      </tr>
                      <tr>
                        <td><table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <? if ($Err=="1") { ?>
                            <tr>
                              <td align="right" class="greybold">Error : </td>
                              <td>&nbsp;</td>
                              <td ><span class="style1"><font color="#FF0000" >Please specify valid email address.</font></span></td>
                            </tr>
                            <?  } ?>
							<? if ($Err=="2") { ?>
                            <tr>
                              <td colspan="3" height="25" valign="middle"  align="center"><span class="style1"><font color="#FF0000" >Password has been sent successfully to provided email address.</font></span></td>
                            </tr>
                            <?  } ?>
                            <tr>
                              <td align="right" class="greybold">Email Address : </td>
                              <td>&nbsp;</td>
                              <td height="25"><input type="text" size='35' id="name" name="name"  value=""/></td>
                            </tr>
                            <tr>
                              <td align="right" class="greybold">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td height="30" valign="bottom"><input type="submit" class="button" name="ForgotPss" value="Submit" >&nbsp;&nbsp;
							  <input type="button" class="button" onclick="window.location.href='index.php';" name="sussbmit" value="Login" >
							  </td>
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