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
            <section id="calendar_wrapper">
                <div id="calendar">
                    <? include("templates/calendar.php");?>
                </div>
            </section>
            <section class="article_list">
                <?
                include("templates/calendar_sort.php");
                
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
                
                // // GETTING EVENTS (PAST 30)
                // $eventQuery = "SELECT * FROM events WHERE approve='Y' AND startdate < CURDATE() ORDER BY startdate DESC LIMIT 30";
                // $eventResult = mysql_query($eventQuery) or die(mysql_error());
                // 
                // // POPULATE EVENTS
                // while($eventRow = mysql_fetch_array($eventResult)){
                //     $eventId = $eventRow['id'];
                //     include("templates/article_event.php");
                // }
                
                ?>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>