<?
    $getPicturesQuery="SELECT * FROM users_pictures WHERE userid='".trim($_SESSION['UsErId'])."' ORDER BY id ASC";
    $getPicturesResult=mysql_query($getPicturesQuery);
    $getPicturesTotal=mysql_num_rows($getPicturesResult);

    $i = 1;
    if($getPicturesTotal>0) {
        while($getPicturesRow = mysql_fetch_array($getPicturesResult)) {
            
            if ($i === $getPicturesTotal) {
                $itemClass = 'last';
            } else {
                $itemClass = "";
            }
            
            $pictureLink =  "../Users/" . $getPicturesRow['picture'];
            $pictureThumb = "../Users/thumb/" .  $getPicturesRow['picture'];
            $pictureCaption = ucfirst(stripslashes($getPicturesRow['caption']));
            
        if($pageType === 'EDIT') {?>
            <li class="<? echo $itemClass; ?>">
                <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $pictureLink; ?>', '', 'width=650,height=500'); return false;">
                    <img src="<? echo $pictureThumb; ?>" height="80" alt="Picture" />
                    <span><? echo $pictureCaption; ?></span>
                </a>
                <a class="delete_item" href='#' onClick="javascript:document.location.href='my_pictures.php?Did=<? echo $getPicturesRow['id']; ?>';">Delete</a>
            </li>
        <? } else if($pageType = 'PROFILE') { ?>
            <a href="#" <? echo $itemClass; ?> onClick="javascript:window.open('<? echo $pictureLink; ?>', '','width=650,height=500');return false;">
                <img src="<? echo $pictureThumb; ?>" height="80" alt="Picture" />
            </a>
        <? } else {
            // do nothing
        }
        
        $i++;
        }
    ?>
    <? } else {
        echo "<li class='last'>No Pictures.</li>";
    }
?>
