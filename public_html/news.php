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
    
    <script type="text/javascript" src="js/tabs.js"></script>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content" class="tabs">
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <!-- <h3 class="info_title">Articles from $YEAR</h3> -->
        <section id="tabs_nav">
            <ul>
                <li><a class="active" href="#tab_2011">2011</a></li>
                <li><a href="#tab_2010">2010</a></li>
                <li><a href="#tab_2009">2009</a></li>
                <li><a href="#tab_2008">2008</a></li>
                <li><a href="#tab_2007">2007</a></li>
                <li><a href="#tab_2006">2006</a></li>
            </ul>
        </section>
        <section id="tab_2011" class="article_list tab active">
            <?
            // EVENT TYPE and CSS CLASSES
            $newsType = 'NEWS';
            $articleType = "two_column";
            
            // GETTING EVENTS (NEXT 30)
            $newsQuery = "SELECT * FROM events WHERE approve='Y' AND startdate >= CURDATE() ORDER BY startdate ASC LIMIT 30";
            $newsResult = mysql_query($newsQuery) or die(mysql_error());
            
            // POPULATE EVENTS
            while($newsRow = mysql_fetch_array($newsResult)){
                $newsId = $newsRow['id'];
                include("templates/article_news.php");
            }
            ?>
        </section>
        <section id="tab_2010" class="article_list tab">
            <?
            // EVENT TYPE and CSS CLASSES
            $articleType = "two_column";
            
            // GETTING EVENTS (NEXT 30)
            $newsQuery = "SELECT * FROM events WHERE approve='Y' AND startdate <= CURDATE() ORDER BY startdate ASC LIMIT 30";
            $newsResult = mysql_query($newsQuery) or die(mysql_error());
            
            // POPULATE EVENTS
            while($newsRow = mysql_fetch_array($newsResult)){
                $newsId = $newsRow['id'];
                include("templates/article_news.php");
            }
            ?>
        </section>
        <section id="tab_2009" class="article_list tab">
            2009
        </section>
        <section id="tab_2008" class="article_list tab">
            2008
        </section>
        <section id="tab_2007" class="article_list tab">
            2007
        </section>
        <section id="tab_2006" class="article_list tab">
            2006
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>