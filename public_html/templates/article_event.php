<? include("define_event.php"); ?>

<article class="<? echo $articleType; ?>">
    <a href="<? echo $eventDetailLink; ?>" class="price button <? echo $eventPriceColor; ?>"><? echo $eventPriceType; ?></a>
    <a href="<? echo $eventDetailLink ?>" class="detail_link">
        <div class="thumb">
        <? if($eventRow['picture']!='' && $eventRow['picture_display']=='Y'){?>
            <img src="<? echo $eventThumbLink; ?>" width="120" alt="thumbnail" />
        <? }else{ ?>
            <!-- TODO: replace with image of toshi -->
            <img src="images/default_article_thumb.jpg" width="120" height="80" alt="thumbnail" />
        <? } ?>
        </div>
        <div class="info">
            <h2><? echo ucfirst(stripslashes($eventRow['name']));?></h2>
            <p class="date"><? echo $eventDate; ?></p>
            <p class="summary"><? echo stripslashes($eventRow['description']); ?></p>
        </div>
    </a>
</article>