<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $INDEXPAGE='YES';
        $ACTIVEPAGE='home';
        $PAGETITLE='Home';
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#slideshow').cycle({
            fx: 'fade',
            pager: '#slide_nav',
            slideExpr: '.slide'
        });
    });
    </script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <section id="slideshow">
            <div id="slide_nav">
                <!-- Links added by cycle plugin -->
            </div>
            <div class="slide first">
                <h2 class="slide_title">The Stage</h2>
                <img src="images/superbowl-928x428.jpg" alt="The Stage">
            </div>
            <div class="slide">
                <h2 class="slide_title">The Hotel</h2>
                <img src="images/hotel-928x428.jpg" alt="The Hotel">
            </div>
            <div class="slide">
                <h2 class="slide_title">The Bar</h2>
                <img src="images/bar-928x428.jpg" alt="The Bar">
            </div>
        </section>
        <section id="events">
            <h3>Upcoming Events</h3>
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
        <section id="restaurant">
            <div class="wrapper">
                <h2>Toshi's Restaurant</h2>
                <p>Short Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut odio vitae est tempor congue. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum.</p>
                <a class="button red" href="#">View Menu</a>
                <a class="button red" href="#">Reservations</a>
            </div>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>