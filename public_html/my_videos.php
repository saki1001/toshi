<? include("../connect.php"); 
include("php/get_sess.php");

    if($_REQUEST['Did']>0)
    {
        $Did=trim(mysql_real_escape_string($_REQUEST['Did']));
        $delpuic=mysql_query("DELETE FROM users_videos WHERE id='$Did' AND userid='".$_SESSION['UsErId']."'");
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
             $path="../Videos/".$filename1; 
             copy($filetoupload,$path);
             $extsql2=",videofile='$filename1'";
        }
        $AddUserQry="INSERT INTO users_videos SET video='".addslashes($_POST['video'])."',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),userid='".$_SESSION['UsErId']."' $extsql2";     
        $AddUserQryRs=mysql_query($AddUserQry);
        
        header("location:my_videos.php?msg=Your video has been updated successfully.");
        exit;
    }
    
    $query1="SELECT * FROM users WHERE id='".trim($_SESSION['UsErId'])."' ";
    $res=mysql_query($query1);
    $tot=mysql_affected_rows();
    if($tot>0)
    {
        $Row=mysql_fetch_array($res);
    }
    else
    {
        header("location:login.php?msg=Invalid email or password.&From=".$_GET['From']."");
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
    <link rel="stylesheet" href="css/my_account.css" type="text/css" media="all">
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>" class="upload <? echo $SUBPAGE; ?>">
    <div id="wrap">
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
                    <div class="field">
                        <label>Video</label>
                        <input type="file" name="videofile" id="videofile" />
                    </div>
                    <div class="field">
                        <label>or embed video code:</label>
                        <textarea name="video" id="video"></textarea>
                    </div>
                    <div class="field">
                        <label>Caption</label>
                        <input type="text" name="caption" id="caption" />
                    </div>
                    <div class="field">
                        <input type="hidden" name="HidRegUser" id="HidRegUser" value="0" />
                        <input type="submit" value="Upload Video" class="button red"  onClick="return Proceed();" />
                    </div>
                </form>
            </section>
            <section class="my_items">
                <div class="section_title">
                    <h3>My Videos</h3>
                </div>
                <ul class="section_content">
                    <?
                        $pageType = 'EDIT';
                        include("templates/my_account_videos.php");
                    ?>
                </ul>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
    <script language="javascript">
    function Proceed()
    {
        if(document.getElementById('videofile').value=='' && document.getElementById('video').value=='')
        {
            alert("Please select video file.");
            document.getElementById('videos').focus();
            return false;
        }
        if(document.getElementById('caption').value=='')
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