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
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>
    <link rel="stylesheet" href="css/my_account.css" type="text/css" media="all">

<!-- CONTENT -->
    <div id="content">
        <?
        include("php/get_sess.php");
        $getUserQuery="select * from users where id='".trim($_SESSION['UsErId'])."' ";
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
        <div class="column profile_photo">
            <section class="photo_wrapper">
                <img src="<? echo $profilePic; ?>" width="248" alt="Profile_Photo"/>
            </section>
            <? if($_REQUEST['msg']) {?>
                <div id="msg" class="active"><? echo $_REQUEST['msg'];?></div>
            <? } ?>
        </div>
        <div class="column profile_title">
            <h2 class="page_title"><? echo ucfirst(stripslashes($userRow['firstname']));?> <? echo ucfirst(stripslashes($userRow['lastname']));?></h2>
        </div>
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
                            
                            if ($i == $getMusicTotal) {
                                $itemClass = 'last';
                            }
                            
                            $getMusicRow = mysql_fetch_array($getMusicResult);
                            $musicLink .=  "my_music_detail.php?id=" . $getMusicRow['id'] . "&userid=" . $_SESSION['UsErId'];
                            $musicCaption = ucfirst(stripslashes($getMusicRow['caption']));
                            $musicDateAdded = date("m/d/Y",strtotime($getMusicRow['addeddate']));                            
                    ?>
                            <li class="<? echo $itemClass; ?>">
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

                            if ($i == $getVideoTotal) {
                                $itemClass = 'last';
                            }

                            $getVideoRow = mysql_fetch_array($getVideoResult);
                            $videoLink .=  "my_video_detail.php?id=" . $getVideoRow['id'] . "&userid=" . $_SESSION['UsErId'];
                            $videoCaption = ucfirst(stripslashes($getVideoRow['caption']));
                            $videoDateAdded = date("m/d/Y",strtotime($getVideoRow['addeddate']));                            
                    ?>
                            <li class="<? echo $itemClass; ?>">
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
        <div class="column profile_pictures">
            <section class="my_items picture_gallery">
                <div class="section_title">
                    <h3>My Pictures</h3>
                    <a href="my_pictures.php">Edit Pictures</a>
                </div>
                <div class="section_content">
                    <?
                        $GetTotalPictureQry="SELECT * FROM users_pictures WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                        $GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
                        $TotGetTotalPicture=mysql_affected_rows();
                    
                        if($TotGetTotalPicture>0) {
                            for($i=1;$i<=$TotGetTotalPicture;$i++) {
                                $GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
                                if($i == $TotGetTotalPicture ) {
                                    $itemClass = "class='last'";
                                } else {
                                    $itemClass = '';
                                }
                    ?>
                        <a href="#" <? echo $itemClass; ?> onClick="javascript:window.open('<? echo "../Users/".$GetTotalPictureQryRow['picture'];?>', '','width=650,height=500');return false;">
                            <img src="<? echo "../Users/thumb/".$GetTotalPictureQryRow['picture'];?>" height="80" alt="Picture" />
                        </a>
                    <?
                            }
                        } else {
                          echo "No Pictures.";
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
</body>
</html>