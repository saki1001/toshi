<?  
    // EVENT NAME
    $eventName = ucfirst(stripslashes($eventRow['name']));
    
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
        $eventPhotoMain = "images/default_article_thumb.jpg";
    }
    
    // FLICKR LINK
    $flickrUrl = $eventRow['flickerurl'];
    
    // VIMEO LINK
    $vimeoUrl = $eventRow['vimeourl'];
    
    // PICTURES
    $getPicturesQuery = "SELECT * FROM events_pictures WHERE eventid='".trim($eventId)."' order by id desc";
    $getPicturesResult = mysql_query($getPicturesQuery);
    $totalPictures = mysql_affected_rows();
    
    // VIDEOS
    $getVideosQuery = "SELECT * FROM events_videos WHERE eventid='".trim($eventId)."' ORDER BY id desc";
    $getVideosResult = mysql_query($getVideosQuery);
    $totalVideos = mysql_affected_rows();
    
    // PRICE VARIABLES
    $priceQuery = "SELECT * FROM events_pricelevel WHERE eventid='".$eventId."'"; 
    $priceResult = mysql_query($priceQuery) or die(mysql_error());
    $priceRow = mysql_fetch_array($priceResult);
    
    // PRICE: whether free or buy
    if(!$priceRow['onlineprice'] && !$priceRow['boxofficeprice']) {
        $eventPrice = 'Free';
    } else {
        $eventPrice = "$" . $priceRow['onlineprice'];
    }
    
    // DO AUDITIONS EXISTS?
    $auditionExistsQuery = "SELECT EXISTS(SELECT * FROM events_timeslots WHERE eventid='".$eventId."' AND status='Available')";
    $auditionExistsResult = mysql_query($auditionExistsQuery);
    $auditionExists = mysql_fetch_array($auditionExistsResult);
    
    // SETTING CALLOUT BUTTON
    if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0) {
        // NOT LOGGGED IN
        if($eventPrice === 'Free') {
            $eventCalloutColor = 'red';
            $eventCalloutName = 'Free';
        } else {
            $eventCalloutColor = 'yellow';
            $eventCalloutName = 'Buy';
        }
    } else {
        // LOGGED IN
        if($auditionExists[0] === '1') {
            $eventCalloutColor = 'yellow';
            $eventCalloutName = 'Auditions';
        } else {
            $eventCalloutColor = 'red';
            $eventCalloutName = 'Details';
        }
    }
    
    // VENUE VARIABLES
    $venueId = $eventRow['venueid'];
    $venueQuery = "SELECT * FROM event_venues WHERE id='".$venueId."'"; 
    $venueResult = mysql_query($venueQuery) or die(mysql_error());
    $venueRow = mysql_fetch_array($venueResult);
    
    $venueName = stripslashes($venueRow['name']);
    $venueAddressLine1 = stripslashes($venueRow['address']);
    $venueAddressLine2 = stripslashes($venueRow['city'] . ", " . $venueRow['state'] . " " . $venueRow['zipcode']);
    $venuePhone = $venueRow['phone'];
    $venueEmail = $venueRow['email'];
    $venuePicture = "../Venues/" . $venueRow['picture'];
    $venueSeatingChart = "../Venues/" . $venueRow['seatingchart'];
    $venueDescription = $venueRow['description'];
    
    // DATE VARIBLES
    $eventStartDate = date('M j', strtotime($eventRow['startdate']));
    $eventStartTime = date('g:i', strtotime($eventRow['startdate_hour'] . ":" . $eventRow['startdate_minute'])) . $eventRow['startdate_ampm'];
    
    $eventPastDate = date('F j, Y', strtotime($eventRow['startdate']));
    
    // DATE: based on end date
    if($eventRow['startdate'] == $eventRow['enddate']) {
        // same startdate and endate
        $eventEndDate = date('g:i', strtotime($eventRow['enddate_hour'] . $eventRow['enddate_minute'])) . $eventRow['enddate_ampm'];
    } else if($eventRow['enddate'] == '0000-00-00'){
        // no enddate
        $eventEndDate = '?';
    } else {
        $eventEndDate = date('M j, g:i', strtotime($eventRow['enddate'] . " " . $eventRow['enddate_hour'] . ":" . $eventRow['enddate_minute'])) . $eventRow['enddate_ampm'];
    }
    
    // DESCRIPTION
    $eventDescription = stripslashes($eventRow['description']);
    
    // EVENTTYPE: sort based on whether PAST or CURRENT
    if($eventType === 'PAST') {
        $backLink = "gallery.php";
        $eventDate = $eventPastDate;
        
    } else {
        $backLink = "events.php";
        $eventDate = $eventStartDate . ", " . $eventStartTime . " - " . $eventEndDate;
    }
    
?>