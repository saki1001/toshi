<?
if($_POST['HidSubmitAddUser']=="1") {
    $subject1=stripslashes($_POST['emailsubject']);
    
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
            <td align=left bgcolor='#ffffff'><a href='$SITE_URL'><img src='$SITE_URL/images/toshi-logo.png' border='0'></a></td>
          </tr>
          <tr>
            <td  align=center bgcolor='#ffffff'><table width='98%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><br>Hello, ".stripslashes($_POST['friendname'])."!<br><br>
                    Your friend, ".stripslashes($_POST['yourname']).", thought you might be interested in this event they found on our site. Here is their message:
                    <br><br>" . nl2br(stripslashes($_POST['message'])) . "<br><br>
                    </td>
                </tr>
                <tr>
                  <td valign='top'><table width='100%' border='0' cellspacing='2' cellpadding='0'>
                      <tr>
                        <td valign='top'>
                            <table width='100%' border='0' cellspacing='2' cellpadding='3'>
                              <tr>
                                <td align='left'><a href='" . $SITE_URL . $HOME . "event_detail.php?eventId=" . $eventId . "'>" . $eventName . "</a></td>
                              </tr>
                              <tr>
                                <td align='left'>".nl2br($eventDescription)."</td>
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
    if($_SERVER['HTTP_HOST']!="plus") {
        HtmlMailSend(stripslashes($_POST['friendemail']), $subject1, $mailcontent1, $ADMIN_MAIL);
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

?>

<div id="dialog">
<div class="dialog_wrapper">
    <a href="#" id="close_dialog">
        <img src="images/close_x.png" />
    </a>
    <section id="event_share">
        <h2 class="page_title">Email to a Friend</h2>
        <div class="instructions">
            <? if($msg!=""){ ?>
                <p id="msg" class="active"><?=$msg;?></p>
            <? } else { ?>
                <p>Tell a friend about this event!</p>
                <p>Just complete this simple form and click Submit. We will not use email addresses provided for any purpose other than this notification.</p>
            <? } ?>
        </div>
        <form name="FrmProdetailpageRating" id="FrmProdetailpageRating" enctype="multipart/form-data" method="post">
            <div class="form_section">
                <div class="field full">
                    <label>Friend's Name</label>
                    <input type="text" name="friendname" id="friendname" value="" />
                </div>
                <div class="field full">
                    <label>Friend's Email</label>
                    <input type="text" name="friendemail" id="friendemail" value="" />
                </div>
                <div class="field full">
                    <label>Your Name</label>
                    <input type="text" name="yourname" id="yourname" value="" />
                </div>
                <div class="field full">
                    <label>Your Email</label>
                    <input type="text" name="youremail" id="youremail" value="" />
                </div>
            </div>
            <div class="form_section last">
                <div class="field full">
                    <label>Email Subject</label>
                    <input type="text" name="emailsubject" id="emailsubject" value="" />
                </div>
                <div class="field full">
                    <label>Email Message</label>
                    <textarea name="message" id="message"></textarea>
                </div>
                <div class="field full">
                    <input type="hidden" name="HidSubmitAddUser" id="HidSubmitAddUser" value="0"  />
                    <input type="submit" class="button red" id="SubmitRating" name="SubmitRating" value="Submit" onclick="return frmcheck();" />
                </div>
            </div>
        </form>
    </section>
    <section id="venue_details">
        <h2 class="page_title"><? echo $venueName; ?></h2>
        <div class="text_wrapper">
            <div class="info description">
                <h3>Description</h3>
                <p><? echo $venueDescription; ?></p>
            </div>
            <div class="info location">
                <h3>Location</h3>
                <ul>
                    <li><? echo $venueAddressLine1; ?></li>
                    <li><? echo $venueAddressLine2; ?></li>
                </ul>
            </div>
            <div class="info contact">
                <h3>Contact</h3>
                <ul>
                    <li><? echo $venuePhone; ?></li>
                    <li><? echo $venueEmail; ?></li>
                </ul>
            </div>
        </div>
        <div class="pictures">
            <img class="venue_pic" src="<? echo $venuePicture; ?>" width="300" alt="Venue Photo" />
            <img class="seating_pic" src="<? echo $venueSeatingChart; ?>" width="300" alt="Seating Chart" />
        </div>
    </section>
</div>
</div>