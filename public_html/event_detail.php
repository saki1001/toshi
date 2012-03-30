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
        
        $ACTIVEPAGE='events';
        $SUBPAGE='detail';
        $PAGETITLE= ucfirst(stripslashes($eventRow['name']));
        
        
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>" class="<? echo $SUBPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <?
        // EVENT TYPE and CSS CLASSES
        $eventType = 'CURRENT';
        
        include("templates/define_event.php");
        ?>
        
        <section class="event_pictures">
            <h2 class="section_title"><? echo $PAGETITLE; ?></h2>
            <div id="slideshow">
                <div id="slide_nav">
                    <!-- Links added by cycle plugin -->
                </div>
                <div class="slide">
                    <img src="<? echo $eventPhotoMain; ?>" width="578" alt="photo" />
                </div>
            </div>
        </section>
        <section class="event_info">
            <div class="detail_section nav">
                <a href="<? echo $backLink; ?>" class="button red">Back</a>
                <a href="#" class="button red">Share</a>
            </div>
            <div class="detail_section date">
                <h3 class="date"><? echo $eventDate; ?></h3>
            </div>
            <div class="detail_section description">
                <h4>Description</h4>
                <p><? echo $eventDescription; ?></p>
            </div>
            <? if(strtotime($eventRow['startdate']) < time()) { ?>
            <div class="detail_section media_links">
                <a href="#" class="button yellow">More Photos</a>
                <a href="#" class="button yellow">More Videos</a>
            </div>
            <? } else { ?>
            <div class="detail_section price">
                <h4>Price</h4>
                <p><? echo $eventPrice; ?></p>
            </div>
            <div class="detail_section venue">
                <h4>Venue Location</h4>
                <ul>
                    <li><? echo $venueName; ?></li>
                    <li><? echo $venueAddressLine1; ?></li>
                    <li><? echo $venueAddressLine2; ?></li>
                    <li><? echo $venuePhone; ?></li>
                </ul>
                <a href="#" class="button red">Venue Details</a>
            </div>
            <div class="detail_section details">
                <h4>Details</h4>
                <ul>
                    <li><? echo $eventAges; ?></li>
                    <li><? echo $eventWebsite; ?></li>
                </ul>
                <? if(!$priceRow['onlineprice'] && !$priceRow['boxofficeprice']) { ?>
                    <!-- no button if free -->
                <? } else { ?>
                    <a href="<? echo $eventPriceLink; ?>" class="button yellow">Buy Now</a>
                <? } ?>
            </div>
            <?}?>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>