<?
    // MAIN PHOTO
    if($newsRow['thumbnail']!=''){
        $newsPicture = $SITE_URL . "presspdf/" . $newsRow['thumbnail'];
    }else{
        $newsPicture = $SITE_URL . $HOME . "images/default_article_thumb.jpg";
    }
    
    // THUMBNAIL
    $newsThumbLink = $SITE_URL . "onlinethumb.php?nm=" . $newsPicture . "&mwidth=120&mheight=80";
    
    // DETAIL PAGE
    $newsDetailLink = $SITE_URL . $HOME . "news_detail.php?eventId=" . $newsRow['id'];
    
    // SOURCE LINK
    $newsWebsite = $newsRow['linktosite'];
    
    // AUTHOR
    $newsAuthor = stripslashes($newsRow['author']);
    
    // PUBLICATION
    $newsPublication = stripslashes($newsRow['publication']);
    
    // DATE
    $newsDate = date('n/j/Y', strtotime($newsRow['date_display']));
    
    // SUMMARY
    $newsSummary = stripslashes($newsRow['shortdesc']);
    
    // FULL TEXT
    $newsFullText = stripslashes($newsRow['description']);
    
    // PDF
    $newsPdfLink = "presspdf/" . $newsRow['picture'];
    
?>