<?
    include("../../connect.php");
    
    $eventId = trim(mysql_real_escape_string($_GET['eventid']));
    $eventQuery = "SELECT * FROM events WHERE id='" . $eventId . "'";
    $eventResult = mysql_query($eventQuery);
    $eventRow = mysql_fetch_array($eventResult);
    
    $EventName = stripslashes($eventRow['name']);
    $venueId = stripslashes($eventRow['venueid']);
    
    $venueQuery = "SELECT * FROM event_venues WHERE id = '$venueId'";
    $venueResult = mysql_query($venueQuery);
    $venueRow = mysql_fetch_assoc($venueResult);
    $Address_1 = stripslashes($venueRow['address']);
    $city = stripslashes($venueRow['city']);
    $state= stripslashes($venueRow['state']);
    $zipcode = stripslashes($venueRow['zipcode']);
    $country = stripslashes($venueRow['country']);
    $venuename = stripslashes($venueRow['name']);
    
    $auditionResult = "SELECT * FROM events_timeslots WHERE id=".mysql_real_escape_string(trim($_GET['timeslotid']))." ";
    $auditionResult = mysql_query($auditionResult);
    $auditionRow = mysql_fetch_array($auditionResult);
    $totalAuditions = mysql_affected_rows();
    
    if($totalAuditions<=0) {
        header("location:../index.php?msg=Unable to sign up for audition.");
        exit;
    }
    
    $auditionTime = $auditionRow['slot_hour'] . ":" . $auditionRow['slot_minute'] . " " . $auditionRow['slot_ampm'];
    
    $AddUserQry="INSERT INTO events_timeslots_selected SET
                    userid='".addslashes($_SESSION['UsErId'])."',                        
                    eventid='".addslashes($_REQUEST['eventid'])."',                        
                    timeslotid='".addslashes($_REQUEST['timeslotid'])."',
                    slot_hour='".addslashes($auditionRow['slot_hour'])."',
                    slot_minute='".addslashes($auditionRow['slot_minute'])."',
                    slot_ampm='".addslashes($auditionRow['slot_ampm'])."',
                    slot_duration='".addslashes($auditionRow['slot_duration'])."',
                    status='Pending',
                    addeddate=curdate()";     
    $AddUserQryRs=mysql_query($AddUserQry);
    $InserId=mysql_insert_id();
    //$_SESSION['UsErId']=$InserId;
    
    $toemail=$ADMIN_MAIL;
    $subject1="Time slot selection at ".ucfirst($SITE_NAME)."";
    $from1=$ADMIN_MAIL;
    $mailcontent1="
    <html>
        <body>
            <table cellpadding=\"0\" cellspacing=\"0\" width=\"0\">
                <tr>
                    <Td align=\"left\" colspan=\"2\">Hello Admin,</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">&nbsp;</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">Time slot has been selected by user at ".ucfirst($SITE_NAME)."</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">&nbsp;</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">Event Details: <a href='".$SITE_URL.$HOME."event_detail.php?eventId=".$eventId."'>".stripslashes($EventName)."</a></td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">Event Venue: ".$Address_1.", ".$city.", ".$state." ".$zipcode." ".$country."</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">&nbsp;</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">Time Slot: " . stripslashes($auditionTime) . " | " . stripslashes($auditionRow['slot_duration']) . " Minutes</td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">User Name: <a href='".$SITE_URL.$HOME."view_profile.php?id=".$_SESSION['UsErId']."'>".stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId']))." ".stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId']))."</a></td>
                </tr>
                <tr>
                    <Td align=\"left\" colspan=\"2\">Thank you.</td>
                </tr>
        </table>
        </body>
    </html>";
    // echo $toemail;echo $subject1;echo $mailcontent1;echo $from1;
    HtmlMailSend($toemail,$subject1,$mailcontent1,$from1);
    
    $auditionSelectedQuery = "UPDATE events_timeslots SET status='Assigned', userid='" . $_SESSION['UsErId'] . "' WHERE id=" . mysql_real_escape_string(trim($_GET['timeslotid'])) . " ";
    $auditionSelectedResult = mysql_query($auditionSelectedQuery);
    
    header("location:../my_account.php?msg=Your request has been sent to admin.&timeslotid=".$_REQUEST['timeslotid']."&eventid=".$_REQUEST['eventid']."");            
    exit;
    // 
    // if(mysql_real_escape_string(trim($_GET['timeslotid']))>0 && mysql_real_escape_string(trim($_GET['timeslotid']))!="") {
    //     
    //     $auditionResult="SELECT * FROM events_timeslots WHERE id=".mysql_real_escape_string(trim($_GET['timeslotid']))." and eventid=".mysql_real_escape_string(trim($_GET['eventid']))." order by id desc";
    //     $auditionResult=mysql_query($auditionResult);
    //     $totalAuditions=mysql_affected_rows();
    //     if($totalAuditions<=0)
    //     {
    //         header("location:index.php");
    //         exit;
    //     }
    //     $auditionRow=mysql_fetch_array($auditionResult);
    // }
    // else {
    //     header("location:index.php");
    //     exit;
    // }
?>