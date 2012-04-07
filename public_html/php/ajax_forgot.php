<?
    include("../../connect.php"); 
    
    $matchUserQuery="SELECT * FROM users WHERE email='".trim(addslashes($_POST['email']))."'";
    $matchUserResult=mysql_query($matchUserQuery);
    $matchUserTotalRows=mysql_affected_rows();
    
    
    
    if($_SERVER['HTTP_HOST']!="plus") {
        if($matchUserTotalRows>0) {
            
            $userRow=mysql_fetch_object($matchUserResult);
            $password=$userRow->password;
            $firstname=$userRow->firstname;
            
            $toemail=addslashes($_POST['email']);
            
            $subject1="Your Password Request from ".ucfirst($SITE_NAME)."";
            $from1=$ADMIN_MAIL;
            $mailcontent1="
            <html>
             <body>
                 <table cellpadding=\"3\" cellspacing=\"3\">
                     <tr>
                         <Td align=\"left\" colspan=\"2\">Dear " . $firstname . ",</td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\"></td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\">This email is being sent to you in response to your request for a forgotten password.</td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\"></td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\">Email Address: " . $_POST['email'] . "</td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\">Your password is: " . $password . "</td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\"></td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\">Use this information to access your account at the ".ucfirst($SITE_NAME)." website at: <a href='$SITE_URL' target='_blank'>$SITE_URL</a></td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\"></td>
                     </tr>
                     <tr>
                         <Td align=\"left\" colspan=\"2\">Thank you.</td>
                     </tr>
             </table>
             </body>
            </html>";
        }
        HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
        
        header('Content-type: application/json');
        echo '{"status": "SUCCESS"}';
        exit;
    } else {
        header('Content-type: application/json');
        echo '{"status": "NOT_FOUND"}';
        exit;
    }

?>