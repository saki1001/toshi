<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $INDEXPAGE='YES';
        $ACTIVEPAGE='home';
        $PAGETITLE='Home';
        
        // FOR EDITING RESTAURANT INFO
        $staticPageId = '2';
        $staticPageQuery = "SELECT * FROM staticpage WHERE id='$staticPageId' ";
        $staticPageResult = mysql_query($staticPageQuery);
        $staticPageRow = mysql_fetch_array($staticPageResult);
        
        $staticPageName = stripslashes($staticPageRow['name']);
        $staticPageContent = stripslashes($staticPageRow['content']);
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/index.css" type="text/css" media="all">
    
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
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <section id="slideshow">
                <div id="slide_nav">
                    <!-- Links added by cycle plugin -->
                </div>
                <?
                // GETTING BANNERS
                $bannerQuery = "SELECT * FROM banners ORDER BY id";
                $bannerResult = mysql_query($bannerQuery) or die(mysql_error());
            
                // POPULATE BANNERS
                while($bannerRow = mysql_fetch_array($bannerResult)){
                    $bannerTitle = stripslashes($bannerRow['title']);
                    $bannerImageUrl = $SITE_URL . $BANNERS . $bannerRow['image'];
                    echo "<div class='slide'>";
                    echo "<h2 class='slide_title'>" . $bannerTitle . "</h2>";
                    echo "<img src='" . $bannerImageUrl . "' alt='" . $bannerTitle . "' />";
                    echo "</div>";
                }
                ?>
            </section>
            <section id="restaurant">
                <div class="wrapper">
                    <!-- TITLE SET IN SITEADMIN -->
                    <h2><? echo $staticPageName; ?></h2>
                    <!-- CONTENTS SET IN SITEADMIN -->
                    <div class="text"><? echo $staticPageContent; ?></div>
                    <div class="button_wrapper">
                        <a class="button red" href="#">View Menu</a>
                        <a class="button red" href="#">Reservations</a>
                    </div>
                </div>
            </section>
            <section class="article_list">
                <h3>Upcoming Events</h3>
                <?
                // EVENT TYPE and CSS CLASSES
                $eventType = 'CURRENT';
                $articleType = "full_width short";
            
                // GETTING EVENTS (NEXT 3)
                $eventQuery = "SELECT * FROM events WHERE approve='Y' AND startdate >= CURDATE() ORDER BY startdate ASC LIMIT 3";
                $eventResult = mysql_query($eventQuery) or die(mysql_error());
            
                // POPULATE EVENTS
                while($eventRow = mysql_fetch_array($eventResult)){
                    $eventId = $eventRow['id'];
                    include("templates/article_event.php");
                }
                ?>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>