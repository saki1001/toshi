<?

// FOR EVENT_DETAIL.PHP
if($_REQUEST['eventId']) {
    $auditionQuery = "SELECT * FROM events_timeslots WHERE eventid='" . $eventId . "' AND status='Available'";
    $auditionResult = mysql_query($auditionQuery);
    $totalAuditions = mysql_affected_rows();
    
    if($totalAuditions>0) {
        while($auditionRow = mysql_fetch_array($auditionResult)) {
?>
            <form name="frmselect" class="audition_select_form" action="php/audition_select.php" method="get">
                <ul class="options_list">
                    <li class="audition_time">
                        <? echo $auditionRow['slot_hour'] . ":" . $auditionRow['slot_minute'] . $auditionRow['slot_ampm']; ?>
                    </li>
                    <li class="audition_duration">
                        <? echo $auditionRow['slot_duration']; ?>&nbsp;minutes
                    </li>
                    <li class="submit_form">
                        <input type="hidden" name="eventid" value="<?=$eventId?>">
                        <input type="hidden" name="timeslotid" value="<?=$auditionRow['id']?>">
                        <input type="submit" class="" value="Select" onClick="return valid();" />
                    </li>
                </ul>
            </form>
<?          }
        } else {
?>
        <p>No auditions available.</p>
<?      }
// FOR MY_ACCOUNT.PHP
} else {
    $auditionQuery = "SELECT * FROM events_timeslots, events WHERE events.approve='Y' AND events_timeslots.status='Available' AND events_timeslots.eventid=events.id AND events.startdate>=CURDATE() ORDER BY events_timeslots.eventid ASC";
    $auditionResult = mysql_query($auditionQuery);
    $totalAuditions = mysql_affected_rows();
    
    if($totalAuditions>0) {
        for($i=1;$i<=$totalAuditions;$i++) {
            
            $auditionRow = mysql_fetch_array($auditionResult);
            // print_r($auditionRow);
            // FIND LAST ITEM
            if ($i === $totalAuditions) {
                $itemClass = "class='last'";
                $listCloseLast = "</li>";
            } else {
                // temporarily all classes set to last
                $itemClass = "class='last'";
                $listCloseLast = "";
            }
            // GET EVENT
            $auditionEventQuery = "SELECT * FROM events WHERE id='" . $auditionRow['eventid'] . "'";
            $auditionEventResult = mysql_query($auditionEventQuery);
            $auditionEventRow = mysql_fetch_array($auditionEventResult);
            
            // SET EVENT ID
            $newEventId = $auditionEventRow['id'];
            
            // TEST IF SAME EVENT
            if($newEventId === $oldEventId) {
?>
                    <form name="frmselect" class="audition_select_form" action="php/audition_select.php" method="get">
                        <div class="item_detail">
                            <span class="event_date">
                                <? echo date('m/d/Y', strtotime($auditionEventRow['startdate'])); ?>
                            </span>
                            <span class="time">
                                <? echo $auditionRow['slot_hour'] . ":" . $auditionRow['slot_minute'] . $auditionRow['slot_ampm']; ?>
                            </span>
                            <span class="duration">
                                <? echo $auditionRow['slot_duration']; ?>&nbsp;minutes
                            </span>
                        </div>
                        <div class="item_submit">
                            <input type="hidden" name="eventid" value="<?=$auditionRow['eventid']?>">
                            <input type="hidden" name="timeslotid" value="<?=$auditionRow[0]?>">
                            <input type="submit" class="select_audition" value="Select"  onClick="return valid();" />
                        </div>
                    </form>
            <? } else if ($oldEventId != "") { ?>
                </li>
                <li <? echo $itemClass; ?>>
                    <h4 class="event_name">
                        <a href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionEventRow['id']; ?>">
                        <? echo stripslashes($auditionEventRow['name']); ?>
                        </a>
                    </h4>
                    <form name="frmselect" class="audition_select_form" action="php/audition_select.php" method="get">
                        <div class="item_detail">
                            <span class="event_date">
                                <?
                                echo date('m/d/Y', strtotime($auditionEventRow['startdate'])); ?>
                            </span>
                            <span class="time">
                                <? echo $auditionRow['slot_hour'] . ":" . $auditionRow['slot_minute'] . $auditionRow['slot_ampm']; ?>
                            </span>
                            <span class="duration">
                                <? echo $auditionRow['slot_duration']; ?>&nbsp;minutes
                            </span>
                        </div>
                        <div class="item_submit">
                            <input type="hidden" name="eventid" value="<?=$auditionRow['eventid']?>">
                            <input type="hidden" name="timeslotid" value="<?=$auditionRow[0]?>">
                            <input type="submit" class="select_audition" value="Select"  onClick="return valid();" />
                        </div>
                    </form>
            <? } else { ?>
                <li <? echo $itemClass; ?>>
                    <h4 class="event_name">
                        <a href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionEventRow['id']; ?>">
                        <? echo stripslashes($auditionEventRow['name']); ?>
                        </a>
                    </h4>
                    <form name="frmselect" class="audition_select_form" action="php/audition_select.php" method="get">
                        <div class="item_detail">
                            <span class="event_date">
                                <?
                                echo date('m/d/Y', strtotime($auditionEventRow['startdate'])); ?>
                            </span>
                            <span class="time">
                                <? echo $auditionRow['slot_hour'] . ":" . $auditionRow['slot_minute'] . $auditionRow['slot_ampm']; ?>
                            </span>
                            <span class="duration">
                                <? echo $auditionRow['slot_duration']; ?>&nbsp;minutes
                            </span>
                        </div>
                        <div class="item_submit">
                            <input type="hidden" name="eventid" value="<?=$auditionRow['eventid']?>">
                            <input type="hidden" name="timeslotid" value="<?=$auditionRow[0]?>">
                            <input type="submit" class="select_audition" value="Select"  onClick="return valid();" />
                        </div>
                    </form>
<?                  echo $listCloseLast;
                }
            $oldEventId = $newEventId;
            }
        } else {
?>
        <li class="last">No auditions available.</li>
<?      }
}
?>