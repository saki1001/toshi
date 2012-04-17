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
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>
        
    <!-- CONTENT -->
        <div id="content">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <h3 class="info_title">Past Events</h3>
            <section id="calendar_wrapper">
                <div id="calendar">
                </div>
            </section>
            <section class="article_list">
                <?
                // EVENT TYPE and CSS CLASSES
                $eventType = 'PAST';
                $articleType = "two_column";
                
                // GETTING EVENTS (PAST 30)
                $eventQuery = "SELECT * FROM events WHERE approve='Y' AND startdate < CURDATE() ORDER BY startdate ASC LIMIT 30";
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