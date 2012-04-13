<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $newsId = trim(mysql_real_escape_string($_GET['eventId']));
        $newsQuery = "SELECT * FROM events WHERE approve='Y' AND id='".$newsId."'";
        $newsResult = mysql_query($newsQuery) or die(mysql_error());
        $newsRow = mysql_fetch_array($newsResult);
        
        $ACTIVEPAGE='news';
        $SUBPAGE='detail';
        $PAGETITLE= ucfirst(stripslashes($newsRow['name']));
        
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/detail.css" type="text/css" media="all">
    
</head>

<body id="<? echo $SUBPAGE; ?>" class="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <?
        include("templates/define_news.php");
        ?>
        <section class="detail_header">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <div class="nav">
                <a href="news.php">Back</a>
                <a href="#">Share with a Friend</a>
                <a href="<? echo $newsWebsite; ?>">Visit Article Website</a>
            </div>
        </section>
        <section class="detail_info">
            <div class="info_section sub_head">
                <p>Published <? echo $newsDate; ?></p>
                <p>By <? echo $newsAuthor; ?>, <? echo $newsPublication; ?></p>
            </div>
            <div class="info_section description">
                <p><? echo $newsDescription; ?></p>
            </div>
        </section>
        <section class="detail_pdf">
            <div id="pdf">
                <object data="<? echo $pdfLink; ?>" type="application/pdf" width="100%" height="100%">
                    
                  <p>It appears you don't have a PDF plugin for this browser.
                  Click <a href="<? echo $pdfLink; ?>">here</a> to download the PDF file.</p>
                  
                </object>
            </div>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>