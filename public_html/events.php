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
                $eventType = 'CURRENT';
                $articleType = "full_width";
                
                // GETTING EVENTS
                $eventQuery = "SELECT * FROM events WHERE approve='Y' $andqry ORDER BY startdate ASC";
                $eventResult = mysql_query($eventQuery) or die(mysql_error());
                $totalEvents = mysql_affected_rows();
                // $result = $prs_pageing->number_pageing_front($cartsql,10,10,"Y","Y");
                
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