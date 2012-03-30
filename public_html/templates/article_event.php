<? include("define_event.php"); ?>

<article class="<? echo $articleType; ?>">
    <a href="<? echo $eventPriceLink; ?>" class="price button yellow"><? echo $eventPriceType; ?></a>
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