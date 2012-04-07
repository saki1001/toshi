<?
    include("../../connect.php");
    $customerQuery="SELECT id from users WHERE email='".addslashes($_POST['email'])."'";    
    $customerResult=mysql_query($customerQuery);
    $totalRows=mysql_affected_rows();
    
    if($totalRows<=0) {
        
        // DATE OF BIRTH
        if(trim($_POST['dob_year'])!="" && trim($_POST['dob_month'])!="" && trim($_POST['dob_day'])!="") {
        
            $dob = trim($_POST['dob_year']) . "-" . trim($_POST['dob_month']) . "-" . trim($_POST['dob_day']);
        }
        
        // FIRSTNAME or ARTISTNAME
        if($_POST['accounttype']=="Musician") {
            $anddd="firstname='".addslashes($_POST['artistname'])."',";
        } else {
            $anddd="firstname='".addslashes($_POST['firstname'])."',";
        }
        
        // ACCOUNT TYPE
        if($_POST['accounttype_other']!="" && $_POST['accounttype']=="Other") {
            $accounttype=addslashes($_POST['accounttype_other']);
        } else {
            $accounttype=addslashes($_POST['accounttype']);
        }
        
        // ADDING USER
        $activationkey=genRandomString(40);
        $addUserQuery="INSERT INTO users SET
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
        
        $addUserQueryResult=mysql_query($addUserQuery);
        $insertId=mysql_insert_id();
        
        //$_SESSION['UsErId']=$insertId;
        
        // NEWSLETTER
        if($_POST['newsletter']=="Y") {
            $userEmailQuery = mysql_query("SELECT * FROM subscriber WHERE email='".addslashes($_POST['email'])."'");     
            $userEmailTotalRows = mysql_affected_rows();
            
            if($userEmailTotalRows<=0) {
                $addUserQuery="INSERT INTO subscriber SET email='".addslashes($_POST['email'])."',sdate=now()";     
                $addUserQueryResult=mysql_query($addUserQuery);
            }
        }
        
        // SENDING EMAIL
        $toemail=$_POST['email'];
        $from1=$ADMIN_MAIL;    
        $subject1=stripslashes(GetName1("staticpage","name","id",10));
        
        $activationlink="<a href='" . $SITE_URL . $PHP . "activate_account.php?activationkey=" . $activationkey . "'>here</a>";
        $activationurl="<a href='" . $SITE_URL . $PHP . "activate_account.php?activationkey=" . $activationkey . "'>" . $SITE_URL . $PHP . "activate_account.php?activationkey=" . $activationkey . "</a>";
        
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
        if($_SERVER['HTTP_HOST']!="plus") {
            HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
        }
        
        // UNSET CAPTCHA CODE
        unset($_SESSION['security_code']);
        
        header('Content-type: application/json');
        echo '{"status": "SUCCESS"}';
        exit;
    } else {
        header('Content-type: application/json');
        echo '{"status": "ERROR_DUPLICATE"}';
        exit;
    }

?>