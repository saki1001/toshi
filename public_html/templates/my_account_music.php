<?
$getMusicQuery="SELECT * FROM users_musics WHERE userid='".trim($_SESSION['UsErId'])."' ORDER BY id ASC";
$getMusicResult=mysql_query($getMusicQuery);
$getMusicTotal=mysql_num_rows($getMusicResult);

$i = 1;
if($getMusicTotal>0) {
    while($getMusicRow = mysql_fetch_array($getMusicResult)) {
        
        if ($i === $getMusicTotal) {
            $itemClass = 'last';
        } else {
            $itemClass = "";
        }
        
        $musicLink =  "my_music_detail.php?id=" . $getMusicRow['id'] . "&userid=" . $_SESSION['UsErId'];
        $musicCaption = ucfirst(stripslashes($getMusicRow['caption']));
        $musicDateAdded = date("m/d/Y",strtotime($getMusicRow['addeddate']));
?>
        <li class="<? echo $itemClass; ?>">
            <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $musicLink; ?>', '', 'width=650,height=500'); return false;">
                <img src="images/play_button.jpg" width="15" height="15" alt="&gt;" />
                <span><? echo $musicCaption; ?></span>
            </a>
            
        <? if($pageType === 'EDIT') {?>
            <a class="delete_item" href='#' onClick="javascript:document.location.href='my_music.php?Did=<? echo $getMusicRow['id']; ?>';">Delete</a>
        <? } else if($pageType === 'PROFILE') { ?>
            <span class="item_date"><? echo $musicDateAdded; ?></span>
        <? } else {
            // do nothing
        } ?>
        </li>
    <?
    $i++;
    } 
    ?>
<? } else {
    echo "<li class='last'>No Music.</li>";
}
?>