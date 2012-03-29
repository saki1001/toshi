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
            <?
            // EVENT TYPE and CSS CLASSES
            $eventType = 'CURRENT';
            $articleType = "full_width";
            
            // GETTING EVENTS (NEXT 30)
            $eventQuery = "SELECT * FROM events WHERE approve='Y' AND startdate > CURDATE() ORDER BY startdate ASC LIMIT 30";
            $eventResult = mysql_query($eventQuery) or die(mysql_error());
            
            // POPULATE EVENTS
            while($eventRow = mysql_fetch_array($eventResult)){
                $eventId = $eventRow['id'];
                include($ROOT.$TEMPLATES."article_event.php");
                $i++;
            }
            ?>
        </section>
        <div class="push"></div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>