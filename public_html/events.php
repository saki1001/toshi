<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='events';
        $PAGETITLE='Event Calendar';
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <h3 class="info_title">Upcoming Events</h3>
        <section id="calendar_wrapper">
            <div id="calendar">
            </div>
        </section>
        <section class="article_list">
            <article class="full_width">
                <a href="#">
                    <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
                    <div class="info">
                        <h2>Event Title</h2>
                        <span class="price" href="#">Free</span>
                        <p class="date">MM/DD/YYYY 00:00</p>
                        <p class="summary">Event Summary. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum.</p>
                    </div>
                </a>
            </article>
            <article class="full_width">
                <a href="#">
                    <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
                    <div class="info">
                        <h2>Event Title</h2>
                        <span class="price" href="#">Free</span>
                        <p class="date">MM/DD/YYYY 00:00</p>
                        <p class="summary">Event Summary. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum.</p>
                    </div>
                </a>
            </article>
            <article class="full_width">
                <a href="#">
                    <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
                    <div class="info">
                        <h2>Event Title</h2>
                        <span class="price" href="#">Free</span>
                        <p class="date">MM/DD/YYYY 00:00</p>
                        <p class="summary">Event Summary. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum.</p>
                    </div>
                </a>
            </article>
        </section>
        <div class="push"></div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>