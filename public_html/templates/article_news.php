<? include("define_news.php"); ?>

<article class="<? echo $articleType; ?>">
    <a href="<? echo $newsDetailLink ?>" class="event_detail_link">
        <div class="thumb">
            <img src="<? echo $newsThumbLink; ?>" height="80" alt="thumbnail" />
        </div>
        <div class="info">
            <h2><? echo ucfirst(stripslashes($newsRow['name']));?></h2>
            <p class="date"><? echo $newsDate; ?></p>
            <p class="summary"><? echo $newsSummary; ?></p>
        </div>
    </a>
</article>