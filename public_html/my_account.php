<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='my_account';
        $PAGETITLE='My Account';
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/my_account.css" type="text/css" media="all">
    
    <script src="js/audition_select.js" type="text/javascript"></script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <?
            include("php/get_sess.php");
            $getUserQuery="SELECT * FROM users where id='".trim($_SESSION['UsErId'])."' ";
            $getUser=mysql_query($getUserQuery);
            $totalRows=mysql_affected_rows();
        
            if($totalRows>0) {
                $userRow=mysql_fetch_array($getUser);
            } else {
            
                exit;
            }
        
            if($userRow['picture']!=""){
                $profilePic = "../Users/" . $userRow['picture']; 
            } else {
                $profilePic = "images/user_silhouette.png";
            }
        
            ?>
            <div class="side">
                <section class="photo_wrapper">
                    <img src="<? echo $profilePic; ?>" width="248" alt="Profile_Photo"/>
                </section>
                <? if($_REQUEST['msg']) {?>
                    <div id="msg" class="active"><? echo $_REQUEST['msg'];?></div>
                <? } ?>
            </div>
            <div class="main">
                <h2 class="page_title"><? echo ucfirst(stripslashes($userRow['firstname']));?> <? echo ucfirst(stripslashes($userRow['lastname']));?></h2>
                <div class="column profile">
                    <section class="info">
                        <div class="section_title">
                            <h3>My Profile</h3>
                            <a href="my_profile.php" class="">Edit Profile</a>
                        </div>
                        <ul class="section_content">
                            <li>
                                <span>Email</span>
                                <? echo (stripslashes($userRow['email']));?>
                            </li>
                            <li>
                                <span>Gender</span>
                                <? echo (stripslashes($userRow['gender']));?>
                            <li>
                                <span>DOB</span>
                                <? echo (stripslashes($userRow['dob']));?>
                            </li>
                            <li>
                                <span>Weight</span>
                                <? echo (stripslashes($userRow['weight']));?>
                            </li>
                        <? if($userRow['height']!=''){?>
                            <li>
                                <span>Height</span>
                                <? echo get_height(stripslashes($userRow['height']));?>
                            </li>
                        <? } ?>
                        <? if($userRow['bust']!=''){?>
                            <li>
                                <span>Bust</span>
                                <? echo (stripslashes($userRow['bust']));?>
                            </li>
                        <? } ?>
                        <? if($userRow['hips']!=''){?>
                            <li>
                                <span>Hips</span>
                                <? echo (stripslashes($userRow['hips']));?>
                            </li>
                        <? } ?>
                        <? if($userRow['shoesize']!=''){?>
                            <li>
                                <span>Shoe</span>
                                <? echo (stripslashes($userRow['shoesize']));?>
                            </li>
                        <? } ?>
                        <? if($userRow['inseam']!=''){?>
                            <li>
                                <span>Inseam</span>
                                <? echo (stripslashes($userRow['inseam']));?>
                            </li>
                        <? } ?>
                        <? if($userRow['neck']!=''){?>
                            <li>
                                <span>Neck</span>
                                <? echo (stripslashes($userRow['neck']));?>
                            </li>
                        <? } ?>
                        <? if($userRow['sleeve']!=''){?>
                            <li>
                                <span>Sleeve</span>
                                <? echo (stripslashes($userRow['sleeve']));?>
                            </li>
                        <? } ?>
                        </ul>
                    </section>
                    <section class="my_items picture_gallery">
                        <div class="section_title">
                            <h3>My Pictures</h3>
                            <a href="my_pictures.php">Edit Pictures</a>
                        </div>
                        <div class="section_content">
                            <?
                                $getPicturesQuery="SELECT * FROM users_pictures WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                                $getPicturesResult=mysql_query($getPicturesQuery);
                                $totalPictures=mysql_affected_rows();
                                
                                if($totalPictures>0) {
                                    for($i=1;$i<=$totalPictures;$i++) {
                                        $pictureRow=mysql_fetch_array($getPicturesResult);
                                        if ($i === $totalPictures) {
                                            $itemClass = "class='last'";
                                        } else {
                                            $itemClass = "";
                                        }
                            ?>
                                <a href="#" <? echo $itemClass; ?> onClick="javascript:window.open('<? echo "../Users/".$pictureRow['picture'];?>', '','width=650,height=500');return false;">
                                    <img src="<? echo "../Users/thumb/".$pictureRow['picture'];?>" height="80" alt="Picture" />
                                </a>
                            <?
                                    }
                                } else {
                                  echo "No Pictures.";
                                }
                            ?>
                        </div>
                    </section>
                    <section class="my_items music">
                        <div class="section_title">
                            <h3>My Music</h3>
                            <a href="my_music.php">Edit Music</a>
                        </div>
                        <ul class="section_content">
                            <?
                            $getMusicQuery="SELECT * FROM users_musics WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                            $getMusicResult=mysql_query($getMusicQuery);
                            $getMusicTotal=mysql_affected_rows();
                            
                            if($getMusicTotal>0) {
                                for($i=1;$i<=$getMusicTotal;$i++) {
                                    
                                    if ($i === $getMusicTotal) {
                                        $itemClass = "class='last'";
                                    } else {
                                        $itemClass = "";
                                    }
                                    
                                    $getMusicRow = mysql_fetch_array($getMusicResult);
                                    $musicLink .=  "my_music_detail.php?id=" . $getMusicRow['id'] . "&userid=" . $_SESSION['UsErId'];
                                    $musicCaption = ucfirst(stripslashes($getMusicRow['caption']));
                                    $musicDateAdded = date("m/d/Y",strtotime($getMusicRow['addeddate']));                            
                            ?>
                                    <li <? echo $itemClass; ?>>
                                        <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $musicLink; ?>', '', 'width=650,height=500'); return false;">
                                            <img src="images/play_button.jpg" width="15" height="15" alt="&gt;" />
                                            <span><? echo $musicCaption; ?></span>
                                        </a>
                                        <span class="item_date"><? echo $musicDateAdded; ?></span>
                                    </li>
                            <? } ?>
                            <? } else {
                                echo "<li class='last'>No Music.</li>";
                            }
                            ?>
                        </ul>
                    </section>
                    <section class="my_items videos">
                        <div class="section_title">
                            <h3>My Videos</h3>
                            <a href="my_videos.php">Edit Videos</a>
                        </div>
                        <ul class="section_content">
                            <?
                            $getVideoQuery="SELECT * FROM users_videos WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                            $getVideoResult=mysql_query($getVideoQuery);
                            $getVideoTotal=mysql_affected_rows();
                            
                            if($getVideoTotal>0) {
                                for($i=1;$i<=$getVideoTotal;$i++) {
                                    
                                    if ($i === $getVideoTotal) {
                                        $itemClass = "class='last'";
                                    } else {
                                        $itemClass = "";
                                    }
                                    
                                    $getVideoRow = mysql_fetch_array($getVideoResult);
                                    $videoLink .=  "my_videos_detail.php?id=" . $getVideoRow['id'] . "&userid=" . $_SESSION['UsErId'];
                                    $videoCaption = ucfirst(stripslashes($getVideoRow['caption']));
                                    $videoDateAdded = date("m/d/Y",strtotime($getVideoRow['addeddate']));                            
                            ?>
                                    <li <? echo $itemClass; ?>>
                                        <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $videoLink; ?>', '', 'width=650,height=500'); return false;">
                                            <img src="images/play_button.jpg" width="15" height="15" alt="&gt;" />
                                            <span><? echo $videoCaption; ?></span>
                                        </a>
                                        <span class="item_date"><? echo $videoDateAdded; ?></span>
                                    </li>
                            <? } ?>
                            <? } else {
                                echo "<li class='last'>No Videos.</li>";
                            }
                            ?>
                        </ul>
                    </section>
                </div>
                <div class="column auditions">
                    <section class="my_items available_auditions">
                        <div class="section_title">
                            <h3>Available Auditions</h3>
                            <a href="events.php">Browse Events</a>
                        </div>
                        <div class="section_content">
                            <ul>
                            <?
                            $auditionQuery = "SELECT * FROM events_timeslots, events WHERE events_timeslots.status='Available' AND events_timeslots.eventid=events.id AND events.startdate>=CURDATE() ORDER BY events_timeslots.eventid ASC";
                            $auditionResult = mysql_query($auditionQuery);
                            $totalAuditions = mysql_affected_rows();
                            ?>
                            <? if($totalAuditions>0) {
                                for($i=1;$i<=$totalAuditions;$i++) {
                                    
                                    $auditionRow = mysql_fetch_array($auditionResult);
                                    // FIND LAST ITEM
                                    if ($i === $totalAuditions) {
                                        $itemClass = "class='last'";
                                        $listCloseLast = "</li>";
                                    } else {
                                        $itemClass = "";
                                        $listCloseLast = "";
                                    }
                                    // GET EVENT
                                    $auditionEventQuery = "SELECT * FROM events WHERE id='" . $auditionRow['eventid'] . "'";
                                    $auditionEventResult = mysql_query($auditionEventQuery);
                                    $auditionEventRow = mysql_fetch_array($auditionEventResult);
                                    
                                    // GET SELECTED SLOTS
                                    $auditionSelectedQuery = "SELECT EXISTS (SELECT * FROM events_timeslots_selected WHERE userid='" . trim($_SESSION['UsErId']) . "' AND timeslotid='" . $auditionRow['id'] . "')";
                                    $auditionSelectedResult = mysql_query($auditionSelectedQuery);
                                    $auditionSelectedRow = mysql_fetch_array($auditionSelectedResult);
                                    
                                    // TEST IF SELECTED
                                    if($auditionSelectedRow === '1') {
                                        $selectedClass = "selected";
                                    } else {
                                        $selectedClass = "";
                                    }
                                    
                                    
                                    // SET EVENT ID
                                    $newEventId = $auditionEventRow['id'];
                                    
                                    // TEST IF SAME EVENT
                                    if($newEventId === $oldEventId) { ?>
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
                                                <div class="item_submit <?=$selectedClass?>">
                                                    <span>Selected</span>
                                                    <input type="hidden" name="eventid" value="<?=$auditionRow['eventid']?>">
                                                    <input type="hidden" name="timeslotid" value="<?=$auditionRow['id']?>">
                                                    <input type="submit" class="select_audition" value="Sign Up"  onClick="return valid();" />
                                                </div>
                                            </form>
                                    <? } else if ($oldEventId != "") { ?>
                                        </li>
                                        <li <? echo $itemClass; ?>>
                                            <a class="event_name" href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionEventRow['id']; ?>">
                                                <? echo stripslashes($auditionEventRow['name']); ?>
                                            </a>
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
                                                <div class="item_submit <?=$selectedClass?>">
                                                    <span>Selected</span>
                                                    <input type="hidden" name="eventid" value="<?=$auditionRow['eventid']?>">
                                                    <input type="hidden" name="timeslotid" value="<?=$auditionRow['id']?>">
                                                    <input type="submit" class="select_audition" value="Sign Up"  onClick="return valid();" />
                                                </div>
                                            </form>
                                    <? } else { ?>
                                        <li <? echo $itemClass; ?>>
                                            <a class="event_name" href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionEventRow['id']; ?>">
                                                <? echo stripslashes($auditionEventRow['name']); ?>
                                            </a>
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
                                                <div class="item_submit <?=$selectedClass?>">
                                                    <span>Selected</span>
                                                    <input type="hidden" name="eventid" value="<?=$auditionRow['eventid']?>">
                                                    <input type="hidden" name="timeslotid" value="<?=$auditionRow['id']?>">
                                                    <input type="submit" class="select_audition" value="Sign Up"  onClick="return valid();" />
                                                </div>
                                            </form>
                                        <? echo $listCloseLast; ?>
                                    <? } ?>
                                    <? $oldEventId = $newEventId; ?>
                                <? } ?>
                            <? } else { ?>
                                <li class="last">No auditions available.</li>
                            <? } ?>
                            </ul>
                        </div>
                    </section>
                    <section class="my_items selected_auditions">
                        <div class="section_title">
                            <h3>Selected Auditions</h3>
                            <a href="events.php">Browse Events</a>
                        </div>
                        <div class="section_content">
                            <ul>
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
                                        $itemClass = "";
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
                                                <a class="delete_item" href='#' onClick="javascript:document.location.href='php/audition_delete.php?Did=<?=$auditionSelectedRow['id']?>';">Delete</a>
                                            </div>
                                        <? echo $listCloseLast; ?>
                                    <? } else if ($oldSelectedEventId != "") { ?>
                                        </li>
                                        <li <? echo $itemClass; ?>>
                                            <a class="event_name" href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionSelectedEventRow['id']; ?>">
                                                <? echo stripslashes($auditionSelectedEventRow['name']); ?>
                                            </a>
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
                                                <a class="delete_item" href='#' onClick="javascript:document.location.href='php/audition_delete.php?Did=<?=$auditionSelectedRow['id']?>';">Delete</a>
                                            </div>
                                        <? echo $listCloseLast; ?>
                                    <? } else { ?>
                                        <li <? echo $itemClass; ?>>
                                            <a class="event_name" href="<? echo $SITE_URL . $HOME . "event_detail.php?eventId=" . $auditionSelectedEventRow['id']; ?>">
                                                <? echo stripslashes($auditionSelectedEventRow['name']); ?>
                                            </a>
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
                                                <a class="delete_item" href='#' onClick="javascript:document.location.href='php/audition_delete.php?Did=<?=$auditionSelectedRow['id']?>';">Delete</a>
                                            </div>
                                        <? echo $listCloseLast; ?>
                                    <? } ?>
                                <? $oldSelectedEventId = $newSelectedEventId; ?>
                                <? } ?>
                                </li>
                            <? } else { ?>
                                <li class="last">No auditions selected.</li>
                            <? } ?>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
</body>
</html>