<? include("../connect.php"); 
    $mlevel=3;
    $userid=$_GET["userid"];
    $id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='my_account';
        $PAGETITLE='';
        
        $getVideos="SELECT * FROM users_videos WHERE userid='".trim($userid)."' and id='".trim($id)."' order by id desc";
        $getVideosResult=mysql_query($getVideos);
        $totalVideos=mysql_affected_rows();
        $getVideosRow = mysql_fetch_array($getVideosResult);
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- CONTENT -->
    <div id="content"><script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
        <h2 class="page_title"><? echo ucfirst(stripslashes($getVideosRow['caption'])); ?><h2>
        <? if($totalVideos>0) { ?>
            <? if($getVideosRow['video']!=""){?>
                <? echo stripslashes($getVideosRow['video']); ?>
            <? } else if($getVideosRow['videofile']!="") { ?>
                <a  href="<?=$SITE_URL;?>/Videos/<?=stripslashes($getVideosRow['videofile']);?>"  id="player"></a> 
                <script language="javascript1.1">flowplayer("player", "flowplayer-3.2.7.swf");</script>
            <? } else { }?>
        <? } else ?>
            No Videos Uploaded.
        <? } >?>
    </div>
</body>
</html>