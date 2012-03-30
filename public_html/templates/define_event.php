<?
    // THUMBNAIL
    $eventThumbLink = $SITE_URL . "onlinethumb.php?nm=Events/" . $eventRow['picture'] . "&mwidth=120&mheight=80";
    
    // DETAIL PAGE
    $eventDetailLink = $SITE_URL . $HOME . "event_detail.php?eventId=" . $eventRow['id'];
    
    // AGES
    $eventAges = $eventRow['ages'];
    
    // WEBSITE
    $eventWebsite = $eventRow['website'];
    
    // MAIN PHOTO
    if($eventRow['picture']!='' && $eventRow['picture_display']=='Y'){
        $eventPhotoMain = $SITE_URL . "Events/" . $eventRow['picture'];
    }else{
        // TODO: replace with image of toshi
        $eventPhotoMain = "http://www.placehold.it/578x378";
    }
    
    // PRICE VARIABLES
    $priceQuery = "SELECT * FROM events_pricelevel where eventid='".$eventId."'"; 
    $priceResult = mysql_query($priceQuery) or die(mysql_error());
    $priceRow = mysql_fetch_array($priceResult);
        
    // PRICE: whether free or buy
    if(!$priceRow['onlineprice'] && !$priceRow['boxofficeprice']) {
        $eventPriceLink = $eventDetailLink;
        $eventPriceType = 'Free';
        $eventPrice = 'Free';
    } else {
        // TODO: add link to cart
        $eventPriceLink = 'CART';
        $eventPriceType = 'Buy';
        $eventPrice = "$" . $priceRow['onlineprice'];
    }
    
    // VENUE VARIABLES
    $venueId = $eventRow['venueid'];
    $venueQuery = "SELECT * FROM event_venues where id='".$venueId."'"; 
    $venueResult = mysql_query($venueQuery) or die(mysql_error());
    $venueRow = mysql_fetch_array($venueResult);
    
    $venueName = stripslashes($venueRow['name']);
    $venueAddressLine1 = stripslashes($venueRow['address']);
    $venueAddressLine2 = stripslashes($venueRow['city'] . ", " . $venueRow['state'] . " " . $venueRow['zipcode']);
    $venuePhone = $venueRow['phone'];
    
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
    
    // DESCRIPTION
    $eventDescription = stripslashes($eventRow['description']);
    
    // EVENTTYPE: sort based on whether PAST or CURRENT
    if(strtotime($eventRow['startdate']) < time()) {
        // event time < current time == PAST event
        $backLink = "gallery.php";
        $eventDate = $eventStartDate;
        
    } else {
        $backLink = "events.php";
        $eventDate = $eventStartDate . " " . $eventStartTime . " - " . $eventEndDate;
    }
    
?>