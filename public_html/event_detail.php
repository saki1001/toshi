<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $eventId = trim(mysql_real_escape_string($_GET['eventId']));
        $eventQuery = "SELECT * FROM events WHERE approve='Y' AND id='".$eventId."'";
        $eventResult = mysql_query($eventQuery) or die(mysql_error());
        $eventRow = mysql_fetch_array($eventResult);
        
        if(strtotime($eventRow['startdate']) < time()) { 
            $ACTIVEPAGE='gallery';
            $eventType = 'PAST';
        } else {
            $ACTIVEPAGE='events';
            $eventType = 'CURRENT';
        }
        
        $SUBPAGE='detail';
        $PAGETITLE= ucfirst(stripslashes($eventRow['name']));
        
        
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/detail.css" type="text/css" media="all">
    
    <script type="text/javascript" src="js/tabs.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#slideshow').cycle({
            fx: 'fade',
            pager: '#slide_nav',
            slideExpr: '.slide'
        });
    });
    </script>
</head>

<body id="<? echo $SUBPAGE; ?>" class="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content" class="tabs">
        <?
        include("templates/define_event.php");
        ?>
        <section class="detail_header">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <div class="nav">
                <a href="<? echo $backLink; ?>">Back</a>
                <a href="#">Share with a Friend</a>
                <a href="#">Venue Details</a>
                <? if($totalVideos>0) { ?>
                    <a href="#videos">Videos</a>
                <? } ?>
            </div>
        </section>
        <section class="detail_info">
            <div class="info_section date">
                <h3 class="date"><? echo $eventDate; ?></h3>
            </div>
            <div class="info_section description">
                <h4>Description</h4>
                <p><? echo $eventDescription; ?></p>
            </div>
            <!-- PAST EVENT -->
            <? if(strtotime($eventRow['startdate']) < time()) { ?>
                <div class="info_section media_links">
                    <a href="#" class="button yellow">More Photos</a>
                    <a href="#" class="button yellow">More Videos</a>
                </div>
            <!-- UPCOMING EVENT -->
            <? } else { ?>
            <div class="info_section tickets">
                <h4>Tickets</h4>
                <? 
                $getEventTicket ="SELECT * FROM events_pricelevel WHERE eventid = '$eventId' AND activeornot='Yes'";
                $eventTicketResult = mysql_query($getEventTicket);
                $totalEventTicketRows=mysql_affected_rows();

                if($totalEventTicketRows>0) {
                  $i=1;
                  while($eventTicketRow = mysql_fetch_assoc($eventTicketResult)) {
                      // $Eventprice ="";
                      // $Eventprice =$eventTicketRow['ticketprice'];
                      $perorderlimit=$eventTicketRow['perorderlimit'];
                      $curdate=strtotime(date("Y-m-d"));
                      
                      if($perorderlimit<=0) {
                          $perorderlimit=10;
                      }
                ?>
                  <form name="frmgen<?=$i?>" id="frmgen<?=$i?>" action="php/cart_add.php" method="get">
                      <ul class="ticket_option">
                        <li class="name">
                          <? echo ucfirst(stripslashes($eventTicketRow['pricelevelname']));?>
                        </li>
                        <li class="price">
                          $<?=GetTicketPrice($eventTicketRow['id']);?>
                        </li>
                        <li class="qty">
                          <select name="quantity" id="quantity">
                          <? for($PO=1;$PO<=$perorderlimit;$PO++){?>
                              <option value="<? echo $PO;?>"><? echo $PO;?></option>
                          <? } ?>
                          </select>
                        </li>
                        <li class="submit_form">
                           <input type="hidden" name="HidPid" id="HidPid" value="<? echo $eventId;?>" />
                           <input type="hidden" name="HidPriceid" id="HidPriceid" value="<? echo $eventTicketRow['id'];?>" />
                           <input type="submit" value="Buy"  class="">
                        </li>
                    </ul>
                  </form>
                <? 
                  $i++;
                  }
                } else { ?>
                  <p><? echo $eventPrice; ?></p>
                <? } ?>
            </div>
            <div class="info_section venue">
                <h4>Venue Location</h4>
                <ul>
                    <li><? echo $venueName; ?></li>
                    <li><? echo $venueAddressLine1; ?></li>
                    <li><? echo $venueAddressLine2; ?></li>
                    <li><? echo $venuePhone; ?></li>
                </ul>
            </div>
            <div class="info_section details">
                <h4>Details</h4>
                <ul>
                    <li><? echo $eventAges; ?></li>
                    <? if(!$eventWebsite || $eventWebsite == 'http://'){
                        // no website
                    } else{ ?>
                        <li><a href="<? echo $eventWebsite; ?>">Visit the Website</a></li>
                    <? } ?>
                </ul>
            </div>
            <?}?>
        </section>
        <section class="detail_pictures">
            <div id="slideshow">
                <? if($totalPictures>0) { ?>
                    
                    <div id="slide_nav">
                        <!-- Links added by cycle plugin -->
                    </div>
                    <div class="slide">
                        <img src="<? echo $eventPhotoMain; ?>" width="578" alt="photo" />
                    </div>
                    
                    <? while($pictureRow = mysql_fetch_array($getPicturesResult)) {
                            $pictureUrl = "../Events/" . $pictureRow['picture'];
                        ?>
                        
                        <div class="slide">
                            <img src="<? echo $pictureUrl; ?>" width="578" alt="photo" />
                        </div>
                        
                    <? } ?>
                    
                <? } else { ?>
                    
                    <div class="slide">
                        <img src="<? echo $eventPhotoMain; ?>" width="578" alt="photo" />
                    </div>
                    
                <? } ?>
            </div>
        </section>
        <section class="detail_videos">
            <? if($totalVideos>0) { ?>
                
                <ul id="tabs_nav">
                <? while($videoRow = mysql_fetch_array($getVideosResult)) { ?>
                    <li>
                        <a href="#tab_<? echo $videoRow['id']; ?>" class="button tab_style"><? echo $videoRow['caption']; ?></a>
                    </li>
                <? } ?>
                </ul>
                
                <!-- reset array to use while loop again -->
                <? mysql_data_seek($getVideosResult, 0); ?>
                
                <div id="videos">
                
                <? while($videoRow = mysql_fetch_array($getVideosResult)) { ?>
                    
                    <? if($videoRow['video']!=""){ ?>
                        <div id="tab_<? echo $videoRow['id']; ?>" class="tab">
                            <? echo stripslashes($videoRow['video']); ?>
                        </div>
                    <? } else if($videoRow['videofile']!=""){ ?>
                        <div id="tab_<? echo $videoRow['id']; ?>" class="tab">
                            <a  href="../Videos/<? echo $videoRow['videofile']; ?>" id="player"></a> 
                            <script language="javascript1.1">flowplayer("player", "flowplayer-3.2.7.swf");</script>
                        </div>
                    <? } else { ?>
                        <!-- do nothing -->
                    <? } ?>
                <? } ?>
                </div>
                
            <? } else { ?>
                <!-- do nothing -->
            <? } ?>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>