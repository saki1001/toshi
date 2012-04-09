<? include("../connect.php"); 
include("php/get_sess.php");

    if($_REQUEST['Did']>0)
    {
        $Did=trim(mysql_real_escape_string($_REQUEST['Did']));
        $delpuic=mysql_query("delete from users_pictures where id='$Did' and userid='".$_SESSION['UsErId']."'");
        header("location:my_pictures.php?msg=Your picture has been deleted successfully.");            
        exit;
    }



    if($_POST['HidRegUser']=="1")
    {
            if($_FILES["picture"]['tmp_name'])
            {
                 $file=$_FILES["picture"];    
                 //$send_name1=ereg_replace (" ", "",$file["name"]);             
                 $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);        
                 $filename1=rand().$send_name1;        
                 $filetoupload=$file['tmp_name'];                 
                 $path="Users/".$filename1; 
                 copy($filetoupload,$path);
                 $extsql2=",picture='$filename1'";
                 if($_POST["picture_old"]!="")
                 {
                    $oldres=$_POST["picture_old"];
                    @unlink("../Users/thumb/$oldres");
                    @unlink("../Users/$oldres");
                 }
                 //Create Thumb 90 x 90
                    $source=$path;
                    $thumb_f2 = $filename1 ;
                    $dest2="../Users/thumb/".$thumb_f2;
                    $thumb_size_w = 90;
                    $thumb_size_h = 90;
                
                    $size = getimagesize($source);
                    $width = $size[0];
                    $height = $size[1];
                    $scale = min($thumb_size_w/$width, $thumb_size_h/$height);
                
                    if ($scale < 1) 
                    {
                         $thumb_size_w = floor($scale*$width);
                         $thumb_size_h = floor($scale*$height);
                    }
                    else
                    {
                         $thumb_size_w = $width;
                         $thumb_size_h = $height;
                    }
                
                    $new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
                    $system=explode(".",$thumb_f2);
                    if (preg_match("/jpg|jpeg/",$system[1])){
                        $im=imagecreatefromjpeg($source);                
                    }else if (preg_match("/png/",$system[1])){
                        $im=imagecreatefrompng($source);                
                    }else if (preg_match("/gif/",$system[1])){
                        $im=imagecreatefromgif($source);                
                    }else if (preg_match("/bmp/",$system[1])){
                        $im=imagecreatefromwbmp($source);                
                    }else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
                        $im=imagecreatefromjpeg($source);
                    }else if($ext=="gif" || $ext=="GIF"){
                        $im=imagecreatefromgif($source);
                    }else if($ext=="png" || $ext=="PNG"){
                        $im=imagecreatefrompng($source);
                    }else if($ext=="bmp" || $ext=="BMP"){
                        $im=imagecreatefromwbmp($source);
                    }else{
                        $im=imagecreatefromjpeg($source);
                    }    
                    // $im = imagecreatefromjpeg($source);
                    imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
                    imagejpeg($new_im,$dest2,100);
                    //End thumb
            
                    $AddUserQry="INSERT INTO users_pictures SET picture='$filename1',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),userid='".$_SESSION['UsErId']."'";     
                    $AddUserQryRs=mysql_query($AddUserQry);
            }
            
            header("location:my_pictures.php?msg=Your picture has been updated successfully.");            
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
        $SUBPAGE='my_pictures';
        $PAGETITLE='My Pictures';
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
                <h3>Upload Pictures</h3>
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
                    <label>Picture</label>
                    <input type="file" name="picture" id="picture" />
                </div>
                <div class="field half">
                    <label>Caption</label>
                    <input type="text" name="caption" id="caption" />
                </div>
                <div class="field full">
                    <input type="hidden" name="HidRegUser" id="HidRegUser" value="0" />
                    <input type="submit" value="Upload Picture" class="button red"  onClick="return Proceed();" />
                    <!-- <a href="#" id="submit" class="button red">Upload Picture</a> -->
                    
                </div>
            </form>
        </section>
        <section class="my_items picture_list">
            <div class="section_title">
                <h3>My Pictures</h3>
            </div>
            <ul class="section_content">
                <?
                $getPicturesQuery="SELECT * FROM users_pictures WHERE userid='".trim($_SESSION['UsErId'])."' order by id desc";
                $getPicturesResult=mysql_query($getPicturesQuery);
                $getPicturesTotal=mysql_affected_rows();
                
                if($getPicturesTotal>0) {
                    for($i=1;$i<=$getPicturesTotal;$i++) {
                        
                        if ($i == $getPicturesTotal) {
                            $itemClass = 'last';
                        }
                        
                        $getPicturesRow = mysql_fetch_array($getPicturesResult);
                        $pictureLink =  "../Users/" . $getPicturesRow['picture'];
                        $pictureThumb = "../Users/thumb/" .  $getPicturesRow['picture'];
                        $pictureCaption = ucfirst(stripslashes($getPicturesRow['caption']));
                ?>
                        <li class="<? echo $itemClass; ?>">
                            <a class="item_detail" href="#" onClick="javascript:window.open('<? echo $pictureLink; ?>', '', 'width=650,height=500'); return false;">
                                <img src="<? echo $pictureThumb; ?>" width="90" alt="Picture" />
                                <span><? echo $pictureCaption; ?></span>
                            </a>
                            <a class="delete_item" href='#' onClick="javascript:document.location.href='my_pictures.php?Did=<? echo $getPicturesRow['id']; ?>';">Delete</a>
                        </li>
                <? } ?>
                <? } else {
                    echo "<li class='last'>No Pictures.</li>";
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
        if(document.getElementById('picture').value=='')
        {
            alert("Please select picture.");
            document.getElementById('picture').focus();
            return false;
        }
        if(document.getElementById("picture").value!="")
        {
            if(!in_ext_lib_all(document.getElementById("picture").value))
            {
                return false;
            }
        }
        if(document.getElementById('caption').value=='')
        {
            alert("Please enter picture caption text.");
            document.getElementById('caption').focus();
            return false;
        }

        document.upload_form.HidRegUser.value='1';
        document.upload_form.submit();
        return  true;    
    }
    function in_ext_lib_all(str)
    {
        var x;
        var flag = 0;
        var myext = new Array();
        myext[0] = ".jpg";
        myext[1] = ".jpeg";
        myext[2] = ".gif";
        myext[3] = ".png";
        myext[4] = ".bmp";

        for (x in myext)
        {
            if(str.substr(str.lastIndexOf(".",str)).toLowerCase() == myext[x])
            {
                flag = 1;
                break;    
            }
        }
        if(flag == 0)
        {
            alert("Please upload only .jpg, .gif, .png, .bmp file format.");
            return false;
        }
        else
        {
            return true;
        }
    }
    </script>

</body>
</html>