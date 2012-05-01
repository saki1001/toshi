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
        $userid=$_GET["userid"];
        $id=$_GET["id"];
        $getMusic="SELECT * FROM users_musics WHERE userid='".trim($userid)."' AND id='".trim($id)."' ";
        $getMusicResult=mysql_query($getMusic);
        $getMusicRow = mysql_fetch_array($getMusicResult);
        $totalMusic=mysql_affected_rows();
        
        $ACTIVEPAGE = 'my_account';
        $PAGETITLE = ucfirst(stripslashes($getMusicRow['caption']));
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
</head>
<body id="<? echo $ACTIVEPAGE; ?>">
<!-- CONTENT -->
    <div id="content">
        <? if($totalMusic>0) { ?>
            <h2 class="page_title">
                <? echo ucfirst(stripslashes($getMusicRow['caption'])); ?>
            </h2>
            <? if($getMusicRow['music']!=""){ ?>
                <audio controls="controls">
                  <source src="<?=$SITE_URL?>/Musics/<?=stripslashes($getMusicRow['music']);?>" />
                  Your browser does not support the audio tag.
                </audio>
            <? } else {
                    echo 'Unable to locate audio.';
                }
            ?>
        <? } else {
                echo 'Unable to locate audio.';
            }
        ?>
    </div>
</body>
</html>
