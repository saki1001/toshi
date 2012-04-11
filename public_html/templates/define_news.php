<?
    // THUMBNAIL
    $newsThumbLink = $SITE_URL . "onlinethumb.php?nm=Events/" . $newsRow['picture'] . "&mwidth=120&mheight=80";
    
    // DETAIL PAGE
    $newsDetailLink = $SITE_URL . $HOME . "news_detail.php?eventId=" . $newsRow['id'];
    
    // WEBSITE
    $newsWebsite = $newsRow['website'];
    
    // MAIN PHOTO
    if($newsRow['picture']!='' && $newsRow['picture_display']=='Y'){
        $newsPhotoMain = $SITE_URL . "Events/" . $newsRow['picture'];
    }else{
        // TODO: replace with image of toshi
        $newsPhotoMain = "http://www.placehold.it/578x378";
    }
    
    // AUTHOR
    $newsAuthor = 'Author Name';
    
    // PUBLICATION
    $newsPublication = 'Publication Name';
    
    // DATE
    $newsDate = date('n/j/Y', strtotime($newsRow['startdate']));
    
    // DESCRIPTION
    $newsDescription = stripslashes($newsRow['description']);
    
    // PDF
    $pdfLink = 'images/Saki-Sato-Resume-2-2012.pdf';
    
?>