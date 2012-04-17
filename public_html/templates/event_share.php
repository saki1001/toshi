<?
if($_POST['HidSubmitAddUser']=="1") {
    $subject1=stripslashes($_POST['emailsubject']);
    
    $ProductQry="SELECT * FROM events WHERE id=".mysql_real_escape_string(trim($_GET['eventid']))." ORDER BY id desc";
    $ProductQryRs=mysql_query($ProductQry);
    $TotProduct=mysql_affected_rows();
    if($TotProduct<=0)
    {
        header("location:index.php");
        exit;
    }
    $ProductQryRow=mysql_fetch_array($ProductQryRs);
    $EventName = stripslashes($ProductQryRow['name']);
    $venueid = stripslashes($ProductQryRow['venueid']);
    
    $selectvenee = "select * from event_venues where id = '$venueid'";
    $rsselectvenue = mysql_query($selectvenee);
    $rowselectvenue = mysql_fetch_array($rsselectvenue);
    $Address_1 = stripslashes($rowselectvenue['address']);
    $city = stripslashes($rowselectvenue['city']);
    $state= stripslashes($rowselectvenue['state']);
    $zipcode = stripslashes($rowselectvenue['zipcode']);
    $country = stripslashes($rowselectvenue['country']);
    $venuename = stripslashes($rowselectvenue['name']);
    $alladdress="<br>".$Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
    $update1=$getitem->startdate;
    if($update1!="")
    {
        list($year, $month, $day) = split('-', $update1);
    }
    if($year!='' && $month!='' && $day!='')
    {
            $disdate1=date("l, F j, Y", mktime(0, 0, 0, $month, $day, $year));
    }
    $disptime="";
    if($getitem->startdate_hour!='')
    {
        $disptime = "(".$getitem->startdate_hour.":".$getitem->startdate_minute." ".$getitem->startdate_ampm.")";
    }
    
    $mailcontent1="<html>
        <head>
        <style>
        td {
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
            color:#000000;
            text-decoration:none;
        }
        </style>
        </head>
        <body>
        <table  bgcolor='#ffffff' width=800 cellpadding=2 cellspacing=2 border=0>
          <tr>
            <td align=left bgcolor='#ffffff'><a href='$SITE_URL'><img src='$SITE_URL/images/logo.jpg' border='0'></a></td>
          </tr>
          <tr>
            <td  align=center bgcolor='#ffffff'><table width='98%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><br>Hello, ".stripslashes($_POST['friendname'])."!<br><br>
                    Your friend, ".stripslashes($_POST['yourname']).", thought you might be interested in this event they found on our site.
                    <br>
                    ".nl2br(stripslashes($_POST['message']))."<br>
                    </td>
                </tr>
                <tr>
                  <td valign='top'><table width='100%' border='0' cellspacing='2' cellpadding='0'>
                      <tr>
                        <td valign='top'>
                            <table width='100%' border='0' cellspacing='2' cellpadding='3'>
                              <tr>
                                <td align='left'><a href='$SITE_URL/eventdetail.php?eventId=".stripslashes($ProductQryRow['id'])."'><strong>".ucfirst(stripslashes($ProductQryRow['name']))."</strong></a></td>
                              </tr>
                              <tr>
                                <td align='left'>".$venuename.$alladdress."</td>
                              </tr>
                              <tr>
                                <td align='left'>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align='left'><strong>Description</strong></td>
                              </tr>
                              <tr>
                                <td align='left'>".nl2br(stripslashes($ProductQryRow['description']))."</td>
                              </tr>
                            </table>
                        </td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td><br>Sincerely,<br>Your new friends at $SITE_NAME<br></td>
                </tr>
              </table></td>
          </tr>
        </table>
        </body>
        </html>";                            
    //echo $mailcontent1;
    if($_SERVER['HTTP_HOST']!="plus")
    {
            HtmlMailSend(stripslashes($_POST['friendemail']),$subject1,$mailcontent1,$ADMIN_MAIL);
    }    
    
    $AddUserQry="INSERT INTO emailafriend SET
                userid='".addslashes($_SESSION['UsErId'])."',
                eventid='".addslashes($_REQUEST['eventid'])."',
                friendname='".addslashes($_POST['friendname'])."',
                friendemail='".addslashes($_POST['friendemail'])."',
                sendername='".addslashes($_POST['yourname'])."',
                senderemail='".addslashes($_POST['youremail'])."',
                emailsubject='".addslashes($_POST['emailsubject'])."',
                message='".addslashes($_POST['message'])."',
                datesent=now()";     
    $AddUserQryRs=mysql_query($AddUserQry);
    $InserId=mysql_insert_id();
    //$_SESSION['UsErId']=$InserId;
    
    $msg="Thank You. Your email has been sent.";
}

if(mysql_real_escape_string(trim($_GET['eventid']))>0 && mysql_real_escape_string(trim($_GET['eventid']))!="")
{
    $ProductQry="SELECT * FROM events WHERE id=".mysql_real_escape_string(trim($_GET['eventid']))." order by id desc";
    $ProductQryRs=mysql_query($ProductQry);
    $TotProduct=mysql_affected_rows();
    if($TotProduct<=0)
    {
        header("location:index.php");
        exit;
    }
    $ProductQryRow=mysql_fetch_array($ProductQryRs);
}
else
{
    header("location:index.php");
    exit;
}

?>

<div class="event_share">
    <form name="FrmProdetailpageRating" id="FrmProdetailpageRating" enctype="multipart/form-data" method="post">
        <h2 class="page_title">Email to a Friend</h2>
            
        <?
        $eventId = trim(mysql_real_escape_string($_GET['eventid']));
        $selectevent = "SELECT * FROM events WHERE id='$eventId'";
        $rsselectevent = mysql_query($selectevent);
        $rowselectevent = mysql_fetch_array($rsselectevent);
        $EventName = stripslashes($rowselectevent['name']);
        $venueid = stripslashes($rowselectevent['venueid']);
        ?>
        <a href='#' class="link1" style="color:#990000;">
            <? echo stripslashes($EventName);?>
        </a>
        <?
        $selectvenee = "SELECT * FROM event_venues WHERE id = '$venueid'";
        $rsselectvenue = mysql_query($selectvenee);
        $rowselectvenue = mysql_fetch_array($rsselectvenue);
        $Address_1 = stripslashes($rowselectvenue['address']);
        $city = stripslashes($rowselectvenue['city']);
        $state= stripslashes($rowselectvenue['state']);
        $zipcode = stripslashes($rowselectvenue['zipcode']);
        $country = stripslashes($rowselectvenue['country']);
        $venuename = stripslashes($rowselectvenue['name']);
        echo $venuename."<br>";
        echo $Address_1.", ".$city.", ".$state." ".$zipcode." ".$country;
        $update1=$getitem->startdate;
        
        if($update1!="") {
            list($year, $month, $day) = split('-', $update1);
        }
        if($year!='' && $month!='' && $day!='') {
                $disdate1=date("l, F j, Y", mktime(0, 0, 0, $month, $day, $year));
        }
        $disptime="";
        if($getitem->startdate_hour!='') {
            $disptime = "(".$getitem->startdate_hour.":".$getitem->startdate_minute." ".$getitem->startdate_ampm.")";
        }
        ?>
        
        <? echo stripslashes($disdate1);?>
        <? echo $disptime;?></td>
        
        <p>Tell a friend about this event!</p>
        <p>Just complete this simple form and click Submit. We will not use email addresses provided for any purpose other than this notification.</p>
        
        <h3>Event Detail</h3>
        <? if($msg!=""){ ?>
            <?=$msg;?>
        <? }  ?>
        
        <div class="field">
            <label>Friend's Name</label>
            <input type="text" name="friendname" id="friendname" value="" />
        </div>
        <div class="field">
            <label>Friend's Email</label>
            <input type="text" name="friendemail" id="friendemail" value="" />
        </div>
        <div class="field">
            <label>Your Name</label>
            <input type="text" name="yourname" id="yourname" value="" />
        </div>
        <div class="field">
            <label>Your Email</label>
            <input type="text" name="youremail" id="youremail" value="" />
        </div>
        <div class="field">
            <label>Email Subject</label>
            <input type="text" name="emailsubject" id="emailsubject" value="" />
        </div>
        <div class="field">
            <label>Email Message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <div class="field">
            <input type="hidden" name="HidSubmitAddUser" id="HidSubmitAddUser" value="0"  />
            <input type="submit" class="button red" id="SubmitRating" name="SubmitRating" value="Submit" onclick="return frmcheck();" />
        </div>
        <? }else {?>
            <?=$msg;?>
        <? } ?>
    </form>
</div>
<script language="javascript" type="text/javascript">
    function frmcheck() {
        form=document.FrmProdetailpageRating;
        if(form.friendname.value=="") {
            alert("Please enter friend's name.");
            form.friendname.focus();
            return false;
        }
        else if(form.friendemail.value=="") {
            alert("Please enter friend's email address.");
            form.friendemail.focus();
            return false;
        }
        else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.friendemail.value))) {
            alert("Please enter a proper email address.");
            form.friendemail.focus();
            return false;
        }
        else if(form.yourname.value=="") {
            alert("Please enter your name.");
            form.yourname.focus();
            return false;
        }
        else if(form.youremail.value=="") {
            alert("Please enter your email.");
            form.youremail.focus();
            return false;
        }
        else if(form.emailsubject.value=="") {
            alert("Please enter subject.");
            form.emailsubject.focus();
            return false;
        }
        else if(form.message.value=="") {
            alert("Please enter your message.");
            form.message.focus();
            return false;
        }
        else {
            form.HidSubmitAddUser.value=1;
            //form.submit();
            return  true;
        }
    }
    
    $(document).ready(function() {
        
        var showNewsletterSignUp = function() {
            
            if($('.newsletter_signup').hasClass('active')) {
                $('.newsletter_signup').removeClass('active');
            } else {
                $('.newsletter_signup').addClass('active');
            }
        };
        
        $('#newsletter_signup_link').bind('click', showNewsletterSignUp);
    });
</script>
