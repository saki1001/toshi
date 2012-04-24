<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='news';
        $PAGETITLE='News & Press';
        
        // GETTING YEARS FOR NEWS
        $newsYears = array();
        $newsYearQuery = "SELECT * FROM press ORDER BY date_display DESC";
        $newsYearResult = mysql_query($newsYearQuery) or die(mysql_error());
        $newsYearTotal = mysql_affected_rows();
        
        while($newsYearRow = mysql_fetch_array($newsYearResult)){
            
            $currentYear = date('Y', strtotime($newsYearRow['date_display']));
            
            if(in_array($currentYear, $newsYears)) {
                // do nothing
            } else {
                array_push($newsYears, $currentYear);
            }
        }
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/news.css" type="text/css" media="all">
    
    <script type="text/javascript" src="js/tabs.js"></script>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php"); ?>
    
    <!-- CONTENT -->
        <div id="content" class="tabs">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <section id="tabs_nav">
                <ul>
                <?
                if($newsYearTotal > 0) {
                    // LINK BY YEAR
                    for($i=0; $i<count($newsYears); $i++) {
                        echo "<li><a href='#tab_" . $newsYears[$i] . "'>" . $newsYears[$i] . "</a></li>";
                    }
                } else {
                    echo "<li><a href='#tab_" . $newsYears[$i] . "'>" . date('Y') . "</a></li>";
                }
                ?>
                </ul>
            </section>
            <?
            // EVENT TYPE and CSS CLASSES
            $newsType = 'NEWS';
            $articleType = "two_column";
            
            if($newsYearTotal > 0) {
                // SECTION BY YEAR
                for($i=0; $i<count($newsYears); $i++) {
                    $newsQuery = "SELECT * FROM press WHERE date_format(date_display,'%Y')='$newsYears[$i]' ORDER BY date_display DESC";
                    $newsResult = mysql_query($newsQuery) or die(mysql_error());
                    $newsTotal = mysql_affected_rows();
                    
                    // SECTION OPEN
                    echo "<section id='tab_" . $newsYears[$i] . "' class='article_list tab'>";
                    
                    // POPULATE PRESS
                    while($newsRow = mysql_fetch_array($newsResult)){
                        $newsId = $newsRow['id'];
                        include("templates/article_news.php");
                    }
                    
                    // SECTION CLOSE
                    echo "</section>";
                }
            } else {
                echo "<section class='article_list'>";
                echo "<p class='empty'>No articles available.</p>";
                echo "</section>";
            }
            ?>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>