<?
    $getVideosQuery="SELECT * FROM users_videos WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
    $getVideosResult=mysql_query($getVideosQuery);
    $getVideosTotal=mysql_num_rows($getVideosResult);

    $i = 1;
    if($getVideosTotal>0) {
        while($getVideosRow = mysql_fetch_array($getVideosResult)) {
        
            if ($i === $getVideosTotal) {
                $itemClass = 'last';
            } else {
                $itemClass = "";
            }
        
            $videosLink =  "my_videos_detail.php?id=" . $getVideosRow['id'] . "&userid=" . $_SESSION['UsErId'];
            $videosCaption = ucfirst(stripslashes($getVideosRow['caption']));
            $videoDateAdded = date("m/d/Y",strtotime($getVideosRow['addeddate']));
    ?>
            <li class="<? echo $itemClass; ?>">
                <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $videosLink; ?>', '', 'width=650,height=500'); return false;">
                    <img src="images/play_button.jpg" width="15" height="15" alt="&gt;" />
                    <span><? echo $videosCaption; ?></span>
                </a>
            <? if($pageType === 'EDIT') { ?>
                <a class="delete_item" href='#' onClick="javascript:document.location.href='my_videos.php?Did=<? echo $getVideosRow['id']; ?>';">Delete</a>
            <? } else if($pageType === 'PROFILE') {?>
                <span class="item_date"><? echo $videoDateAdded; ?></span>
            <? } else {
                // do nothing
            }?>
            </li>
        <? 
        $i++;
        } 
        ?>
    <? } else {
        echo "<li class='last'>No Videos.</li>";
    }
?>