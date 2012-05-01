<?
// GET SELECTED SLOTS
$auditionSelectedQuery = "SELECT * FROM events_timeslots_selected WHERE userid='" . trim($_SESSION['UsErId']) . "' ORDER BY eventid ASC";
$auditionSelectedResult = mysql_query($auditionSelectedQuery);
$totalSelectedAuditions = mysql_affected_rows();

// TEST IF SELECTED
if($totalSelectedAuditions>0) {
    
    for($i=1;$i<=$totalSelectedAuditions;$i++) {
        
        $auditionSelectedRow = mysql_fetch_array($auditionSelectedResult);
        
        // FIND LAST ITEM
        if ($i === $totalSelectedAuditions) {
            $itemClass = "class='last'";
            $listCloseLast = "</li>";
        } else {
            // temporarily all classes set to last
            $itemClass = "class='last'";
            $listCloseLast = "";
        }
        
        // GET EVENT
        $auditionSelectedEventQuery = "SELECT * FROM events WHERE id='" . $auditionSelectedRow['eventid'] . "'";
        $auditionSelectedEventResult = mysql_query($auditionSelectedEventQuery);
        $auditionSelectedEventRow = mysql_fetch_array($auditionSelectedEventResult);
        
        // SET EVENT ID
        $newSelectedEventId = $auditionSelectedEventRow['id'];
    
        // TEST IF SAME EVENT
        if($newSelectedEventId === $oldSelectedEventId) { ?>
                <div class="item_detail">
                    <span class="event_date">
                        <?
                        echo date('m/d/Y', strtotime($auditionSelectedEventRow['startdate'])); ?>
                    </span>
                    <span class="time">
                        <? echo $auditionSelectedRow['slot_hour'] . ":" . $auditionSelectedRow['slot_minute'] . $auditionSelectedRow['slot_ampm']; ?>
                    </span>
                    <span class="duration">
                        <? echo $auditionSelectedRow['slot_duration']; ?>&nbsp;minutes
                    </span>
                </div>
                <div class="item_submit">
                    <a class="delete_item" href='#' onClick="javascript:document.location.href='php/audition_delete.php?Did=<?=$auditionSelectedRow['id']?>&Tid=<?=$auditionSelectedRow['timeslotid']?>';">Delete</a>
                </div>
            <? echo $listCloseLast; ?>
        <? } else if ($oldSelectedEventId != "") { ?>
            </li>
            <li <? echo $itemClass; ?>>
                <h4 class="event_name">
                    <a href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionSelectedEventRow['id']; ?>">
                    <? echo stripslashes($auditionSelectedEventRow['name']); ?>
                    </a>
                </h4>
                <div class="item_detail">
                    <span class="event_date">
                        <?
                        echo date('m/d/Y', strtotime($auditionSelectedEventRow['startdate'])); ?>
                    </span>
                    <span class="time">
                        <? echo $auditionSelectedRow['slot_hour'] . ":" . $auditionSelectedRow['slot_minute'] . $auditionSelectedRow['slot_ampm']; ?>
                    </span>
                    <span class="duration">
                        <? echo $auditionSelectedRow['slot_duration']; ?>&nbsp;minutes
                    </span>
                </div>
                <div class="item_submit">
                    <a class="delete_item" href='#' onClick="javascript:document.location.href='php/audition_delete.php?Did=<?=$auditionSelectedRow['id']?>&Tid=<?=$auditionSelectedRow['timeslotid']?>';">Delete</a>
                </div>
            <? echo $listCloseLast; ?>
        <? } else { ?>
            <li <? echo $itemClass; ?>>
                <h4 class="event_name">
                    <a href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionSelectedEventRow['id']; ?>">
                    <? echo stripslashes($auditionSelectedEventRow['name']); ?>
                    </a>
                </h4>
                <div class="item_detail">
                    <span class="event_date">
                        <?
                        echo date('m/d/Y', strtotime($auditionSelectedEventRow['startdate'])); ?>
                    </span>
                    <span class="time">
                        <? echo $auditionSelectedRow['slot_hour'] . ":" . $auditionSelectedRow['slot_minute'] . $auditionSelectedRow['slot_ampm']; ?>
                    </span>
                    <span class="duration">
                        <? echo $auditionSelectedRow['slot_duration']; ?>&nbsp;minutes
                    </span>
                </div>
                <div class="item_submit">
                    <a class="delete_item" href='#' onClick="javascript:document.location.href='php/audition_delete.php?Did=<?=$auditionSelectedRow['id']?>&Tid=<?=$auditionSelectedRow['timeslotid']?>';">Delete</a>
                </div>
            <? echo $listCloseLast; ?>
        <? } ?>
    <? $oldSelectedEventId = $newSelectedEventId; ?>
    <? } ?>
    </li>
<? } else { ?>
    <li class="last">No auditions selected.</li>
<? } ?>