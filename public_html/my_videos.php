<? include("../connect.php"); 
include("php/get_sess.php");

    if($_REQUEST['Did']>0)
    {
        $Did=trim(mysql_real_escape_string($_REQUEST['Did']));
        $delpuic=mysql_query("delete from users_videos where id='$Did' and userid='".$_SESSION['UsErId']."'");
        header("location:my_videos.php?msg=Your video has been deleted successfully.");            
        exit;
    }



    if($_POST['HidRegUser']=="1")
    {
        if($_FILES["videofile"]['tmp_name'])
        {
             $file=$_FILES["videofile"];    
             //$send_name1=ereg_replace (" ", "",$file["name"]);             
             $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);        
             $filename1=rand().$send_name1;        
             $filetoupload=$file['tmp_name'];                 
             $path="Musics/".$filename1; 
             copy($filetoupload,$path);
             $extsql2=",videofile='$filename1'";
        }
        $AddUserQry="INSERT INTO users_videos SET video='".addslashes($_POST['video'])."',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),userid='".$_SESSION['UsErId']."' $extsql2";     
        $AddUserQryRs=mysql_query($AddUserQry);
        header("location:my_videos.php?msg=Your video has been updated successfully.");            
        exit;
    }

    $query1="select * from users where id='".trim($_SESSION['UsErId'])."' ";
    $res=mysql_query($query1);
    $tot=mysql_affected_rows();
    if($tot>0)
    {
        $Row=mysql_fetch_array($res);
    }
    else
    {
        header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='my_account';
        $SUBPAGE='my_videos';
        $PAGETITLE='My Videos';
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    
    <script src="js/my_account_upload.js" type="text/javascript"></script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>" class="upload <? echo $SUBPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <section class="upload_items">
            <div class="section_title">
                <h3>Upload Videos</h3>
                <a href="my_account.php">Back to My Account</a>
            </div>
            <form name="upload_form" id="upload_form" enctype="multipart/form-data" method="post">
                <div class="field full msg">
                    <p id="msg" class="active">
                        <? if($_REQUEST['msg']){
                                echo $_REQUEST['msg'];
                            }
                        ?>
                    </p>
                </div>
                <div class="field half">
                    <label>Video</label>
                    <input type="file" name="videofile" id="videofile" />
                </div>
                <div class="field half">
                    <label>or embed video code:</label>
                    <textarea name="video" id="video"></textarea>
                </div>
                <div class="field half">
                    <label>Caption</label>
                    <input type="text" name="caption" id="caption" />
                </div>
                <div class="field full">
                    <input type="hidden" name="HidRegUser" id="HidRegUser" value="0" />
                    <input type="submit" value="Upload Video" class="button red"  onClick="return Proceed();" />
                    <!-- <a href="#" id="submit" class="button red">Upload Music</a> -->
                    
                </div>
            </form>
        </section>
        <section class="my_items">
            <div class="section_title">
                <h3>My Videos</h3>
            </div>
            <ul class="section_content">
                <?
                $getVideosQuery="SELECT * FROM users_videoss WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                $getVideosResult=mysql_query($getVideosQuery);
                $getVideosTotal=mysql_affected_rows();
                
                if($getVideosTotal>0) {
                    for($i=1;$i<=$getVideosTotal;$i++) {
                        
                        if ($i == $getVideosTotal) {
                            $itemClass = 'last';
                        }
                        
                        $getVideosRow = mysql_fetch_array($getVideosResult);
                        $videosLink .=  "my_videos_detail.php?id=" . $getVideosRow['id'] . "&userid=" . $_SESSION['UsErId'];
                        $videosCaption = ucfirst(stripslashes($getVideosRow['caption']));
                ?>
                        <li class="<? echo $itemClass; ?>">
                            <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $videosLink; ?>', '', 'width=650,height=500'); return false;">
                                <img src="images/play_button.jpg" width="15" height="15" alt="&gt;" />
                                <span><? echo $videosCaption; ?></span>
                            </a>
                            <a class="delete_item" href='#' onClick="javascript:document.location.href='my_videos.php?Did=<? echo $getVideosRow['id']; ?>';">Delete</a>
                        </li>
                <? } ?>
                <? } else {
                    echo "<li class='last'>No Videos.</li>";
                }
                ?>
            </ul>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
    <script language="javascript">
    function Proceed()
    {
        if(document.getElementById('videos').value=='')
        {
            alert("Please select video file.");
            document.getElementById('videos').focus();
            return false;
        }if(document.getElementById('caption').value=='')
        {
            alert("Please enter video caption text.");
            document.getElementById('caption').focus();
            return false;
        }
    
        document.upload_form.HidRegUser.value='1';
        document.upload_form.submit();
        return  true;    
    }

    </script>

</body>
</html>