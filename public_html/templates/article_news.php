<? include("define_news.php"); ?>

<article class="<? echo $articleType; ?>">
    <a href="<? echo $newsDetailLink ?>" class="event_detail_link">
        <div class="thumb">
        <? if($newsRow['picture']!='' && $newsRow['picture_display']=='Y'){?>
            <img src="<? echo $newsThumbLink; ?>" height="80" alt="thumbnail" />
        <? }else{ ?>
            <!-- TODO: replace with image of toshi -->
            <img src="images/default_article_thumb.jpg" width="120" height="80" alt="thumbnail" />
        <? } ?>
        </div>
        <div class="info">
            <h2><? echo ucfirst(stripslashes($newsRow['name']));?></h2>
            <p class="date"><? echo $newsDate; ?></p>
            <p class="summary"><? echo stripslashes($newsRow['description']); ?></p>
        </div>
    </a>
</article>