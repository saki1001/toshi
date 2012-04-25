<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='gallery';
        $PAGETITLE='Event Gallery';
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/gallery.css" type="text/css" media="all">
    
    <script src="js/gallery.js" type="text/javascript"></script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>
        
    <!-- CONTENT -->
        <div id="content">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <section id="calendar_wrapper">
                <div id="calendar">
                    <? include("templates/gallery_event_sort.php");?>
                </div>
            </section>
            <section class="article_list">
                <?                
                // EVENT TYPE and CSS CLASSES
                $eventType = 'PAST';
                $articleType = "two_column";
                
                // GETTING EVENTS
                $eventQuery = "SELECT * FROM events WHERE approve='Y' $andqry ORDER BY startdate ASC";
                $eventResult = mysql_query($eventQuery) or die(mysql_error());
                $totalEvents = mysql_affected_rows();
                
                if($totalEvents > 0) {
                    // POPULATE EVENTS
                    while($eventRow = mysql_fetch_array($eventResult)){
                        $eventId = $eventRow['id'];
                        include("templates/article_event.php");
                    }
                } else {
                    echo "<p class='empty'>No events found.</p>";
                }
                
                ?>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>