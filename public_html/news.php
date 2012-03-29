<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='news';
        $PAGETITLE='News & Press';
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
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <h3 class="info_title">Articles from $YEAR</h3>
        <section id="news_nav">
            <ul>
                <li><a class="active" href="#">2011</a></li>
                <li><a href="#">2010</a></li>
                <li><a href="#">2009</a></li>
                <li><a href="#">2008</a></li>
                <li><a href="#">2007</a></li>
                <li><a href="#">2006</a></li>
            </ul>
        </section>
        <section class="article_list">
            <article class="two_column">
                <a href="#">
                    <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
                    <div class="info">
                        <h2>News Title</h2>
                        <p class="date">MM/DD/YYYY 00:00</p>
                        <p class="summary">Event Summary. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum.</p>
                    </div>
                </a>
            </article>
            <article class="two_column">
                <a href="#">
                    <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
                    <div class="info">
                        <h2>News Title</h2>
                        <p class="date">MM/DD/YYYY 00:00</p>
                        <p class="summary">Event Summary. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum. Nulla orci libero, molestie ut pulvinar sit amet, adipiscing sit amet purus. Praesent at nulla nec tortor sagittis vestibulum.</p>
                    </div>
                </a>
            </article>
            <article class="two_column">
                <a href="#">
                    <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
                    <div class="info">
                        <h2>News Title</h2>
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