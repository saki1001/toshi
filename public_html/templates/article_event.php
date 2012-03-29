<?
    // LINK VARIABLES
    $eventDetailLink = $SITE_URL . $HOME . "eventdetail.php?eventId=" . $eventRow['id'];
    $eventThumbLink = $SITE_URL . "onlinethumb.php?nm=Events/" . $eventRow['picture'] . "&mwidth=120&mheight=80";
    
    // PRICE VARIABLES
    $priceQuery = "SELECT * FROM events_pricelevel where eventid='".$eventRow['id']."'"; 
    $priceResult = mysql_query($priceQuery) or die(mysql_error());
    $priceRow = mysql_fetch_array($priceResult);
    
    // PRICE: whether free or buy
    if(!$priceRow['onlineprice']) {
        $eventPriceLink = $eventDetailLink;
        $eventPrice = 'Free';
    } else {
        // TODO: add link to cart
        $eventPriceLink = 'CART';
        $eventPrice = 'Buy';
    }
    
    // DATE VARIBLES
    $eventStartDate = date('F j, Y', strtotime($eventRow['startdate']));
    $eventStartTime = date('g:i', strtotime($eventRow['startdate_hour'] . ":" . $eventRow['startdate_minute'])) . $eventRow['startdate_ampm'];
    
    // DATE: based on end date
    if($eventRow['startdate'] == $eventRow['enddate']) {
        // same startdate and endate
        $eventEndDate = date('g:i', strtotime($eventRow['enddate_hour'] . $eventRow['enddate_minute'])) . $eventRow['enddate_ampm'];
    } else if($eventRow['enddate'] == '0000-00-00'){
        // no enddate
        $eventEndDate = '?';
    } else {
        $eventEndDate = date('F j, Y, g:i', strtotime($eventRow['enddate'] . " " . $eventRow['enddate_hour'] . ":" . $eventRow['enddate_minute'])) . $eventRow['enddate_ampm'];
    }
    
    // DATE: based on eventType, either PAST or CURRENT
    if($eventType == 'PAST') {
        $eventDate = $eventStartDate;
    } else {
        $eventDate = $eventStartDate . " " . $eventStartTime . " - " . $eventEndDate;
    }
?>
<article class="<? echo $articleType; ?>">
    <a href="<? echo $eventPriceLink; ?>" class="price button yellow"><? echo $eventPrice; ?></a>
    <a href="<? echo $eventDetailLink ?>" class="event_detail_link">
        <div class="thumb">
        <? if($eventRow['picture']!='' && $eventRow['picture_display']=='Y'){?>
            <img src="<? echo $eventThumbLink; ?>" height="80" alt="thumbnail" />
        <? }else{ ?>
            <!-- TODO: replace with image of toshi -->
            <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
        <? } ?>
        </div>
        <div class="info">
            <h2><? echo ucfirst(stripslashes($eventRow['name']));?></h2>
            <p class="date"><? echo $eventDate; ?></p>
            <p class="summary"><? echo stripslashes($eventRow['description']); ?></p>
        </div>
    </a>
</article>