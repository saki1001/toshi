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

<!-- CONTENT -->
    <div id="content">
        <?
        include("../getsess.php");
        $getUserQuery="select * from users where id='".trim($_SESSION['UsErId'])."' ";
        $getUser=mysql_query($getUserQuery);
        $totalRows=mysql_affected_rows();
        
        if($totalRows>0) {
            $userRow=mysql_fetch_array($getUser);
        } else {
            header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."");
            exit;
        }
        ?>
        <section class="profile">
            <h4 class="color3"><span>Welcome <? echo ucfirst(stripslashes($userRow['firstname']));?> <? echo ucfirst(stripslashes($userRow['lastname']));?></span></h4>
            <? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
            <div>
                <img src="<? if($userRow['picture']!=""){?>Users/thumb/<?=$userRow['picture'];?><? }else{?>images/noimage-135-135.jpg<? }?>" border="0"/>
            </div>
            <div>
            <? echo ucfirst(stripslashes($userRow['firstname']));?> <? echo ucfirst(stripslashes($userRow['lastname']));?>
    
            <strong>Email</strong>:
                <? echo (stripslashes($userRow['email']));?>
            <strong>Gender</strong>:
                <? echo (stripslashes($userRow['gender']));?>
            <strong>DOB</strong>:
                <? echo (stripslashes($userRow['dob']));?>
            <strong>Weight</strong>:
                <? echo (stripslashes($userRow['weight']));?>
            <? if($userRow['height']!=''){?>
                <strong>Height</strong>:
                    <? echo get_height(stripslashes($userRow['height']));?>
            <? } ?>
            <? if($userRow['bust']!=''){?>
                <strong>Bust</strong>:
                    <? echo (stripslashes($userRow['bust']));?>
            <? } ?>
            <? if($userRow['hips']!=''){?>
                <strong>Hips</strong>:
                    <? echo (stripslashes($userRow['hips']));?>
            <? } ?>
            <? if($userRow['shoesize']!=''){?>
                <strong>Shoe</strong>:
                    <? echo (stripslashes($userRow['shoesize']));?>
            <? } ?>
            <? if($userRow['inseam']!=''){?>
                <strong>Inseam</strong>:
                    <? echo (stripslashes($userRow['inseam']));?>
            <? } ?>
            <? if($userRow['neck']!=''){?>
                <strong>Neck</strong>:
                    <? echo (stripslashes($userRow['neck']));?>
            <? } ?>
            <? if($userRow['sleeve']!=''){?>
                <strong>Sleeve</strong>:
                    <? echo (stripslashes($userRow['sleeve']));?>
            <? } ?>
            <div>
                <a href="editprofile.php" class="">Edit Profile</a>
                <a href="php/logout.php" class="">Logout</a>
            </div>
        </section>
        <section class="pictures">
            <h3>My Pictures</h3>
            <div>
                <?
                    $GetTotalPictureQry="SELECT * FROM users_pictures WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                    $GetTotalPictureQryRs=mysql_query($GetTotalPictureQry);
                    $TotGetTotalPicture=mysql_affected_rows();
            
                    if($TotGetTotalPicture>0) {
                        for($F=0;$F<$TotGetTotalPicture;$F++) {
                            $GetTotalPictureQryRow=mysql_fetch_array($GetTotalPictureQryRs);
                            if($F%3==0 && $F!=0) {
                                echo "<div>";
                            }
                ?>
                    <a href="#" onClick="javascript:window.open('<? echo "Users/".$GetTotalPictureQryRow['picture'];?>', '','width=650,height=500');return false;">
                        <img src="<? echo "Users/thumb/".$GetTotalPictureQryRow['picture'];?>"  border="0" width="105"/>
                    </a>
                <?
                        }
                    } else {
                      echo "No Pictures";
                    }
                ?>
            </div>
            <a href="uploadpics.php" style="float:none;" class="button1" >Upload Pictures</a>
        </section>
        <section class="Music">
            <h3>My Music</h3>
            <div>
                <?
                    $GetTotalMusicQry="SELECT * FROM users_musics WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                    $GetTotalMusicQryRs=mysql_query($GetTotalMusicQry);
                    $TotGetTotalPicture=mysql_affected_rows();
                    if($TotGetTotalPicture>0)
                    {
                        for($F=0;$F<$TotGetTotalPicture;$F++)
                        {
                            $GetTotalMusicQryRow=mysql_fetch_array($GetTotalMusicQryRs);
                ?>
                                <a href="#" onClick="javascript:window.open('user_music.php?id=<?=$GetTotalMusicQryRow['id'];?>&userid=<?=$_SESSION['UsErId'];?>', '','width=650,height=500');return false;" >
                            <? if($GetTotalMusicQryRow['caption']!=''){
                                echo ucfirst(stripslashes($GetTotalMusicQryRow['caption']));
                                } else {
                            ?>
                                Music File
                            <? }?>
                                </a>
                            <? echo date("m/d/Y",strtotime($GetTotalMusicQryRow['addeddate']));
                        }
                    }
                    else
                    {
                        echo "No Music";
                    }
                ?>
            </div>
            <a href="uploadmusic.php" style="float:none;" class="button1" >Upload Music</a>
        </section>
        <section class="videos">
            <h3>My Videos</h3>
            <div>
                <?
                    $GetTotalVideoQry="SELECT * FROM users_videos WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                    $GetTotalVideoQryRs=mysql_query($GetTotalVideoQry);
                    $TotGetTotalVideo=mysql_affected_rows();
                    if($TotGetTotalVideo>0)
                    {
                        for($F=0;$F<$TotGetTotalVideo;$F++)
                        {
                            $GetTotalVideoQryRow=mysql_fetch_array($GetTotalVideoQryRs);
                ?>
                            <a href="#" onClick="javascript:window.open('user_videos.php?id=<?=$GetTotalVideoQryRow['id'];?>&userid=<?=$_SESSION['UsErId'];?>', '','width=650,height=500');return false;" >
                            <? if($GetTotalVideoQryRow['caption']!=''){?>
                                <? echo ucfirst(stripslashes($GetTotalVideoQryRow['caption']));?>
                            <? }else{?>
                              Video File
                            <? }?>
                              </a>
                                <? echo date("m/d/Y",strtotime($GetTotalVideoQryRow['addeddate']));?>
                            <?
                        }
                    }
                    else
                    {
                        echo "No Video";
                    }
                ?>
            </div>
            <a href="uploadvideo.php" style="float:none;" class="button1"  >Upload Video</a>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
</body>
</html>