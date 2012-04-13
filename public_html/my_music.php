<? include("../connect.php"); 
include("php/get_sess.php");

    if($_REQUEST['Did']>0)
    {
        $Did=trim(mysql_real_escape_string($_REQUEST['Did']));
        $delpuic=mysql_query("DELETE FROM users_musics WHERE id='$Did' AND userid='".$_SESSION['UsErId']."'");
        header("location:my_music.php?msg=Your music has been deleted successfully.");            
        exit;
    }

    if($_POST['HidRegUser']=="1")
    {
            if($_FILES["music"]['tmp_name'])
            {
                 $file=$_FILES["music"];    
                 //$send_name1=ereg_replace (" ", "",$file["name"]);             
                 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);        
                 $filename1=rand().$send_name1;        
                 $filetoupload=$file['tmp_name'];                 
                 $path="Musics/".$filename1; 
                 copy($filetoupload,$path);
                 $extsql2=",music='$filename1'";
             
                 $AddUserQry="INSERT INTO users_musics SET music='$filename1',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),userid='".$_SESSION['UsErId']."'";     
                 $AddUserQryRs=mysql_query($AddUserQry);
            }
    
            header("location:my_music.php?msg=Your music has been updated successfully.");            
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
        $SUBPAGE='my_music';
        $PAGETITLE='My Music';
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    <link rel="stylesheet" href="css/my_account.css" type="text/css" media="all">
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>" class="upload <? echo $SUBPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <section class="upload_items">
            <div class="section_title">
                <h3>Upload Music</h3>
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
                    <label>Music</label>
                    <input type="file" name="music" id="music" />
                </div>
                <div class="field">
                    <label>Caption</label>
                    <input type="text" name="caption" id="caption" />
                </div>
                <div class="field">
                    <input type="hidden" name="HidRegUser" id="HidRegUser" value="0" />
                    <input type="submit" value="Upload Music" class="button red"  onClick="return Proceed();" />
                    <!-- <a href="#" id="submit" class="button red">Upload Music</a> -->
                    
                </div>
            </form>
        </section>
        <section class="my_items">
            <div class="section_title">
                <h3>My Music</h3>
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
                ?>
                        <li class="<? echo $itemClass; ?>">
                            <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $musicLink; ?>', '', 'width=650,height=500'); return false;">
                                <img src="images/play_button.jpg" width="15" height="15" alt="&gt;" />
                                <span><? echo $musicCaption; ?></span>
                            </a>
                            <a class="delete_item" href='#' onClick="javascript:document.location.href='my_music.php?Did=<? echo $getMusicRow['id']; ?>';">Delete</a>
                        </li>
                <? } ?>
                <? } else {
                    echo "<li class='last'>No Music.</li>";
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
        if(document.getElementById('music').value=='')
        {
            alert("Please select music file.");
            document.getElementById('music').focus();
            return false;
        }
        
        if(document.getElementById('caption').value=='')
        {
            alert("Please enter music caption text.");
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