<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='news';
        $PAGETITLE='News & Press';
        
        // SET NEWS TO MOST RECENT 5 YEARS
        $startYear = date('Y');
        $endYear = date('Y') - 5;
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/news.css" type="text/css" media="all">
    
    <script type="text/javascript" src="js/tabs.js"></script>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>
    
    <!-- CONTENT -->
        <div id="content" class="tabs">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <!-- <h3 class="info_title">Articles from $YEAR</h3> -->
            <section id="tabs_nav">
                <ul>
                <?
                    for($i=$startYear; $i>=$endYear; $i--) {
                        echo "<li><a href='#tab_" . $i . "'>" . $i . "</a></li>";
                    }
                ?>
                </ul>
            </section>
            <?
            
            // EVENT TYPE and CSS CLASSES
            $newsType = 'NEWS';
            $articleType = "two_column";
            
            for($i=$startYear; $i>=$endYear; $i--) {
                
                // SECTION OPEN
                echo "<section id='tab_" . $i . "' class='article_list tab'>";

                // GETTING NEWS FOR YEAR
                $newsQuery = "SELECT * FROM press WHERE date_format(date_display,'%Y')='$i' ORDER BY date_display DESC";
                $newsResult = mysql_query($newsQuery) or die(mysql_error());
                $newsTotal = mysql_affected_rows();
                
                // POPULATE PRESS
                if($newsTotal > 0) {                    
                    while($newsRow = mysql_fetch_array($newsResult)){
                        $newsId = $newsRow['id'];
                        include("templates/article_news.php");
                    }

                } else {
                    echo "No News available.";
                }
                
                // SECTION CLOSE
                echo "</section>";
            }
            ?>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>