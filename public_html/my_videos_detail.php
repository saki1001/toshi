<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?  
        $userid=$_GET["userid"];
        $id=$_GET["id"];
        $getVideos="SELECT * FROM users_videos WHERE userid='".trim($userid)."' AND id='".trim($id)."' ";
        $getVideosResult=mysql_query($getVideos);
        $getVideosRow = mysql_fetch_array($getVideosResult);
        $totalVideos=mysql_affected_rows();
        
        $ACTIVEPAGE = 'my_account';
        $PAGETITLE = ucfirst(stripslashes($getVideosRow['caption']));
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- CONTENT -->
    <div id="content">
        <? if($totalVideos>0) { ?>
            <h2 class="page_title">
                <? echo ucfirst(stripslashes($getVideosRow['caption'])); ?>
            </h2>
            <? if($getVideosRow['video']!=""){ ?>
                <? echo stripslashes($getVideosRow['video']); ?>
            <? } else if($getVideosRow['videofile']!="") { ?>
                <!-- <script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
                <a  href="<?=$SITE_URL;?>/Videos/<?=stripslashes($getVideosRow['videofile']);?>"  id="player"></a> 
                <script language="javascript1.1">flowplayer("player", "flowplayer-3.2.7.swf");</script> -->
                <video width="320" height="240" controls="controls">
                  <source src="<?=$SITE_URL;?>/Videos/<?=stripslashes($getVideosRow['videofile']);?>" />
                  Your browser does not support the video tag.
                </video>
            <? } else {
                    echo 'Unable to locate video.';
                }
            ?>
        <? } else {
            echo 'No Videos Uploaded.';
            }
        ?>
    </div>
</body>
</html>