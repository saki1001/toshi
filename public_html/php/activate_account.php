<? include("../../connect.php");

if($_REQUEST['activationkey']!="")
{
    $GetUserQry="SELECT id,email,firstname FROM users WHERE activationkey='".trim(mysql_real_escape_string($_REQUEST['activationkey']))."'";
    $GetUserQryRs=mysql_query($GetUserQry);
    $TotGetUser=mysql_affected_rows();
    if($TotGetUser>0)
    {
        $GetUserQryRow=mysql_fetch_array($GetUserQryRs);
        $SelectUserQry="UPDATE users SET approve='Y' WHERE activationkey='".trim(mysql_real_escape_string($_REQUEST['activationkey']))."'";
        $SelectUserQryRs=mysql_query($SelectUserQry);
        $TotSelectUser=mysql_affected_rows();
        if($TotSelectUser>0)
        {
            $_SESSION['UsErId']=$GetUserQryRow['id'];
            $toemail=$GetUserQryRow['email'];
            $FinalName=ucfirst($GetUserQryRow['firstname']);
            $subject1="Thank you for auditions at Toshi's Playhouse";
            $from1=$ADMIN_MAIL;    
            $mailcontent1="<html>
                        <body>
                                <table cellpadding=\"2\" cellspacing=\"2\">
                                        <tr>
                                                <Td align=\"left\" colspan=\"2\">Hi $FinalName,</td>
                                        </tr>
                                        <tr>
                                                <Td align=\"left\" colspan=\"2\">Your account has been activated. Sign in now and browse our website to find auditions for our upcoming events.</td>
                                        </tr>
                                        <tr>
                                                <Td align=\"left\" colspan=\"2\">Thank you for signing up at $SITE_NAME.</td>
                                        </tr>
                                        <tr>
                                                <Td align=\"left\" colspan=\"2\">&nbsp;</td>
                                        </tr>
                                        <tr>
                                                <Td align=\"left\" colspan=\"2\">Thanks,<br>$SITE_URL</td>
                                        </tr>
                        </table>
                        </body>
                </html>";
            //echo $toemail;echo $subject1;echo $mailcontent1;echo $from1;
            HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
            
            header("location:../my_account.php");
            exit;
        }
    }
    else
    {
        header("location:../index.php");
        exit;
    }
}
else
{    
    header("location:../index.php");
    exit;
}
?>