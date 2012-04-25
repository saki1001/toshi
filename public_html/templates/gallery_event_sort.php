<?
    $curDate = date("Y-m-d");
    
    if($_REQUEST['mn']!='' && $_REQUEST['yr']!='') {
        $startDate = $_REQUEST['yr'] . "-" . $_REQUEST['mn'] . "-" . "01";
        
        $daysInMonth = date('t', strtotime($startDate));
        $endDate = $_REQUEST['yr'] . "-" . $_REQUEST['mn'] . "-" . $daysInMonth;
        
        if($endDate > $curDate) {
            $endDate = $curDate;
        }
        
        if($_REQUEST['cat']!='default') {
            $andqry = " AND ( (startdate BETWEEN '" . $startDate . "' AND '" . $endDate . "' ) OR ( (startdate<='" . $startDate . "' AND enddate='0000-00-00') OR (enddate!='0000-00-00' AND (enddate BETWEEN '" . $startDate . "' AND '" . $endDate . "'))) ) AND category='" . $_REQUEST['cat'] . "' ";
            
        } else {
            $andqry = " AND ( (startdate BETWEEN '" . $startDate . "' AND '" . $endDate . "' ) OR ( (startdate<='" . $startDate . "' AND enddate='0000-00-00') OR (enddate!='0000-00-00' AND (enddate BETWEEN '" . $startDate . "' AND '" . $endDate . "'))) ) ";
        }
        
        
    } else {
        $startDate = date("Y-m-d", strtotime('-1 month', strtotime($curDate)));
        $endDate = $curDate;
        $andqry = " AND ( (startdate BETWEEN '" . $startDate . "' AND '" . $endDate . "' ) OR ( (startdate<='" . $startDate . "' AND enddate='0000-00-00') OR (enddate!='0000-00-00' AND (enddate BETWEEN '" . $startDate . "' AND '" . $endDate . "'))) ) ";
        
    }
    
    
    $monthArray = Array(
                    Array("month"=>"January", "m"=>"01"),
                    Array("month"=>"February", "m"=>"02"),
                    Array("month"=>"March", "m"=>"03"),
                    Array("month"=>"April", "m"=>"04"),
                    Array("month"=>"May", "m"=>"05"),
                    Array("month"=>"June", "m"=>"06"),
                    Array("month"=>"July", "m"=>"07"),
                    Array("month"=>"August", "m"=>"08"),
                    Array("month"=>"September", "m"=>"09"),
                    Array("month"=>"October", "m"=>"10"),
                    Array("month"=>"November", "m"=>"11"),
                    Array("month"=>"December", "m"=>"12")
                    );
?>
<section class="filter_wrapper">
    <div id="filters">
        <form id="filter_event_form" name="filterEventForm" enctype="multipart/form-data" method="get">
            <div class="field full">
                <h3>Sort Events by Month</h3>
                <select name="mn" id="month" class="date">
                    <? 
                    for($i=0;$i<count($monthArray);$i++) {
                    ?>
                    <option value="<?=$monthArray[$i]['m']?>" 
                        <?
                        // SELECT MONTH
                        if($_REQUEST['mn'] != '') {
                            if ($monthArray[$i]['m'] === $_REQUEST['mn']) {
                                echo "selected='selected'";
                            }
                        } else { 
                            if ($monthArray[$i]['m'] === date('m')) {
                                echo "selected='selected'";
                            }
                        }
                    
                        // FIND FUTURE MONTHS
                        if($monthArray[$i]['m'] > date('m')) {
                            echo "class='future_month'";
                        }
                        ?>>
                        <?=$monthArray[$i]['month']?>
                    </option>
                    <? }?>
                </select>
                <select name="yr" id="year" class="date">
                    <?
                    $eventYearQuery = "SELECT * FROM events WHERE approve='Y' ORDER BY startdate ASC";
                    $eventYearResult = mysql_query($eventYearQuery);
                    $eventYear = mysql_fetch_array($eventYearResult);
                    
                    $earliestEventYear = date('Y', strtotime($eventYear['startdate']));
                    
                    for($i=$earliestEventYear;$i<=date('Y');$i++) {
                    ?>
                    <option value="<?=$i?>"
                        <?
                        if($_REQUEST['yr'] != '') {
                            if(strval($i) === $_REQUEST['yr']) {
                                echo "selected='selected'";
                            }
                        } else {
                            if(strval($i) === date('Y')) {
                                echo "selected='selected'";
                            }
                        } 
                    
                        // FIND CURRENT YEAR
                        if($i == date('Y')) {
                            echo "id='current_year'";
                        }
                    
                        ?>>
                        <?=$i?>
                    </option>
                    <? }?>
                </select>
            </div>
            <div class="field full">
                <h3>Filter by Category</h3>
                <select name="cat" id="category">
                    <option value="default">All Categories</option>
                    <? 
                    $eventCategoryQuery = "SELECT * FROM event_category ORDER BY name ASC";
                    $eventCategoryResult = mysql_query($eventCategoryQuery);
                    $totalEventCategories = mysql_affected_rows();

                    for($i=0;$i<$totalEventCategories;$i++) {
                    $eventCategory = mysql_fetch_array($eventCategoryResult);
                    ?>
                    <option value="<?=$eventCategory['id']?>"
                        <?
                        // SELECT CATEGORY
                        if($eventCategory['id'] === $_REQUEST['cat']) {
                            echo "selected='selected'";
                        } else {
                            // do nothing
                        }
                        ?>>
                        <?=stripslashes($eventCategory["name"]); ?>
                    </option>
                    <? }?>
                </select>
            </div>
        </form>
    </div>
</section>
