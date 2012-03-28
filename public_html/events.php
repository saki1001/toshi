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
        <section id="calendar_wrapper">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <div id="calendar">
            </div>
        </section>
        <section id="event_listing">
            <h3 class="info_title">Upcoming Events</h3>
            <article class="event">
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
            <article class="event">
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
            <article class="event">
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
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>