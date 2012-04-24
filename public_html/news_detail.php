<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $newsId = trim(mysql_real_escape_string($_GET['eventId']));
        $newsQuery = "SELECT * FROM press WHERE id='".$newsId."'";
        $newsResult = mysql_query($newsQuery) or die(mysql_error());
        $newsRow = mysql_fetch_array($newsResult);
        
        // defines all news variables
        include("templates/define_news.php");
        
        $ACTIVEPAGE='news';
        $SUBPAGE='detail';
        $PAGETITLE= ucfirst(stripslashes($newsRow['name']));
        
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/detail.css" type="text/css" media="all">
    
</head>

<body id="<? echo $SUBPAGE; ?>" class="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <section class="detail_nav">
                    <a href="news.php">Back</a>
                <? if($newsWebsite != '' && $newsWebsite != 'http://') { ?>
                    <a href="<? echo $newsWebsite; ?>">Visit Article Website</a>
                <? } ?>
                <? if($newsPdfLink != '') { ?>
                    <a href="../download.php?file=<? echo $newsPdfLink; ?>">Download PDF</a>
                <? } ?>
            </section>
            <section class="detail_info">
                <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
                <div class="info_section sub_head">
                <? if($newsDate != '') { ?>
                    <p>Published <? echo $newsDate; ?></p>
                <? } ?>
                <? if($newsAuthor != '' && $newsPublication != '') { ?>
                    <p>By <? echo $newsAuthor; ?>, <? echo $newsPublication; ?></p>
                <? } else if($newsAuthor != '') { ?>
                    <p>By <? echo $newsAuthor; ?></p>
                <? } else if($newsPublication != '') { ?>
                    <p><? echo $newsPublication; ?></p>
                <? } else {
                    // do nothing
                }?>
                </div>
                <div class="info_section description">
                <? if($newsFullText != '') { ?>
                    <p><? echo $newsFullText; ?></p>
                <? } else { ?>
                    <p><? echo $newsSummary; ?></p>
                <? } ?>
                </div>
            </section>
            <section class="detail_image">
                <div id="image">
                <? if($newsVideo != '') { ?>
                    <!-- <object data="<? echo $newsPdfLink; ?>" type="application/pdf" width="100%" height="100%">
                    
                      <p>It appears you don't have a PDF plugin for this browser.
                      Click <a href="../download.php?file=<? echo $newsPdfLink; ?>">here</a> to download the PDF file.</p>
                  
                    </object> -->
                <? } else { ?>
                    <img src="<? echo $newsPicture; ?>" width="478" alt="news photo" />
                <? } ?>
                </div>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>