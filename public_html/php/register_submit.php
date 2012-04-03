<?

if($_POST['HidRegUser']=="1")
{
    $getCustomerQry="SELECT id from users WHERE email='".addslashes($_POST['email'])."'";    
    $getCustomerQryRs=mysql_query($getCustomerQry);
    $TotgetCustomer=mysql_affected_rows();
    if($TotgetCustomer<=0)
    {
        if(trim($_POST['dob_year'])!="" && trim($_POST['dob_month'])!="" && trim($_POST['dob_day'])!="")
        {
            $dob=trim($_POST['dob_year'])."-".trim($_POST['dob_month'])."-".trim($_POST['dob_day']);
        }
        if($_POST['accounttype']=="Musician")
        {
            $anddd="firstname='".addslashes($_POST['artistname'])."',";
        }
        else
        {
            $anddd="firstname='".addslashes($_POST['firstname'])."',";
        }
        
        if($_POST['accounttype_other']!="" && $_POST['accounttype']=="Other")
        {
            $accounttype=addslashes($_POST['accounttype_other']);
        }
        else
        {
            $accounttype=addslashes($_POST['accounttype']);
        }
                
        $activationkey=genRandomString(40);        
        $AddUserQry="INSERT INTO users SET
                        $anddd
                        lastname='".addslashes($_POST['lastname'])."',                        
                        password='".addslashes($_POST['password'])."',
                        email='".addslashes($_POST['email'])."',
                        gender='".addslashes($_POST['gender'])."',
                        genre='".addslashes($_POST['genre'])."',
                        dob='".addslashes($dob)."',
                        labeltype='".addslashes($_POST['labeltype'])."',
                        accounttype='".addslashes($accounttype)."',
                        weight='".addslashes($_POST['weight'])."',
                        height='".addslashes($_POST['height'])."',
                        newsletter='".addslashes($_POST['newsletter'])."',
                        bust='".addslashes($_POST['bust'])."',
                        hips='".addslashes($_POST['hips'])."',
                        shoesize='".addslashes($_POST['shoesize'])."',
                        inseam='".addslashes($_POST['inseam'])."',
                        neck='".addslashes($_POST['neck'])."',
                        sleeve='".addslashes($_POST['sleeve'])."',
                        approve='N',
                        activationkey='$activationkey',
                        regdate=now()";     
        $AddUserQryRs=mysql_query($AddUserQry);
        $InserId=mysql_insert_id();
        //$_SESSION['UsErId']=$InserId;
        
        if($_POST['newsletter']=="Y")
        {
            $selQry=mysql_query("SELECT * FROM subscriber WHERE email='".addslashes($_POST['email'])."'");     
            $tot=mysql_affected_rows();
            if($tot<=0)
            {
                $AddUserQry="INSERT INTO subscriber SET email='".addslashes($_POST['email'])."',sdate=now()";     
                $AddUserQryRs=mysql_query($AddUserQry);
            }    
        }
        
        $toemail=$_POST['email'];
        $from1=$ADMIN_MAIL;    
        $subject1=stripslashes(GetName1("staticpage","name","id",10));
        
        $activationlink="<a href='$SITE_URL/activateaccount.php?activationkey=".$activationkey."'>here</a>";
        $activationurl="<a href='$SITE_URL/activateaccount.php?activationkey=".$activationkey."'>$SITE_URL/activateaccount.php?activationkey=".$activationkey."</a>";
        
        $detail=stripslashes(GetName1("staticpage","content","id",10));
        $detail=str_replace("[NAME]",stripslashes($_POST['firstname']),$detail);
        $detail=str_replace("[ACTIVATIONLINK]",$activationlink,$detail);
        $detail=str_replace("[ACTIVATIONURL]",$activationurl,$detail);
        $detail=str_replace("[SITEURL]",$SITE_URL,$detail);
        
        $mailcontent1="<html>
            <head>
            <title>$SITE_TITLE</title>
            </head>
            <body>
            <table width='100%' border='0' cellspacing='2' cellpadding='0'>
              <tr>
                <td align='left'>".$detail."</td>
              </tr>
            </table>
            </body>
            </html>
            ";
        //echo $toemail;echo $subject1;echo $mailcontent1;echo $from1;
        if($_SERVER['HTTP_HOST']!="plus")
        {
            HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
        }
        
        header("location:register.php?msg=Please check your email and activate your account.");            
        exit;
    }
    else
    {
        $response_text="The email address you provided is already registered.";    
    }
}

?>