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
            $userId = trim($_SESSION['UsErId']);
            
            $getUserQuery="SELECT * FROM users where id='".$userId."' ";
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
                                $pageType = 'PROFILE';
                                include("templates/my_account_pictures.php");
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
                                $pageType = 'PROFILE';
                                include("templates/my_account_music.php");
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
                                $pageType = 'PROFILE';
                                include("templates/my_account_videos.php");
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
                                    include("templates/auditions_available.php");
                                    // include("templates/auditions_test.php");
                                ?>
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
                                <? include("templates/auditions_selected.php"); ?>
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