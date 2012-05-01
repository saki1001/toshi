<?

// $auditionQuery = "SELECT * FROM events_timeslots, events WHERE events.approve='Y' AND events_timeslots.status='Available' AND events_timeslots.eventid=events.id AND events.startdate>=CURDATE() ORDER BY events_timeslots.eventid ASC";

$auditionQuery = "SELECT events_timeslots.eventid as 'eventid', GROUP_CONCAT(id) as timeslotids FROM events_timeslots GROUP BY events_timeslots.eventid";
$auditionResult = mysql_query($auditionQuery);
    
    while($row = mysql_fetch_array($auditionResult)){
        $names = split(",",$row["timeslotids"]);
        // print_r($row);
        
        $auditionSelectedQuery = "SELECT EXISTS (SELECT * FROM events WHERE approve='Y' AND id='" . $row['eventid'] . "' ";
        $auditionSelectedResult = mysql_query($auditionSelectedQuery);
        $auditionSelectedRow = mysql_fetch_array($auditionSelectedResult);
        
        if($auditionSelectedRow === '1') {
            $auditionEventQuery = "SELECT * FROM events WHERE id='" . $row['eventid'] . "'";
            $auditionEventResult = mysql_query($auditionEventQuery);
            $auditionEventRow = mysql_fetch_array($auditionEventResult);
        ?>
            <div>
                <?=stripslashes($auditionEventRow['name'])?>
            </div>
            <div>
                <?php echo $names[0]; array_shift($names) ?>
            </div>

            <?php foreach( $names as $name){ ?>
                <div>
                    <?php echo $name ?>
                </div>
        <?
        } else {
            
        }
        
        
    }
    

?>