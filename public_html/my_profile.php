<? include("../connect.php"); 
include("php/get_sess.php");

if($_POST['HidRegUser']=="1")
{
    $getCustomerQry="SELECT id from users WHERE email='".addslashes($_POST['email'])."' and id!='".$_SESSION['UsErId']."'";    
    $getCustomerQryRs=mysql_query($getCustomerQry);
    $TotgetCustomer=mysql_affected_rows();
    if($TotgetCustomer<=0)
    {
        if(trim($_POST['dob_year'])!="" && trim($_POST['dob_month'])!="" && trim($_POST['dob_day'])!="")
        {
            $dob=trim($_POST['dob_year'])."-".trim($_POST['dob_month'])."-".trim($_POST['dob_day']);
        }
        if($_POST['accounttype']=="Musician")
        {
            $anddd="firstname='".addslashes($_POST['artistname'])."',";
        }
        else
        {
            $anddd="firstname='".addslashes($_POST['firstname'])."',";
        }
        $AddUserQry="UPDATE users SET
                        $anddd
                        lastname='".addslashes($_POST['lastname'])."',                        
                        password='".addslashes($_POST['password'])."',
                        email='".addslashes($_POST['email'])."',
                        gender='".addslashes($_POST['gender'])."',
                        genre='".addslashes($_POST['genre'])."',
                        dob='".addslashes($dob)."',
                        weight='".addslashes($_POST['weight'])."',
                        height='".addslashes($_POST['height'])."',
                        newsletter='".addslashes($_POST['newsletter'])."',
                        aboutme='".addslashes($_POST['aboutme'])."',
                        bust='".addslashes($_POST['bust'])."',
                        hips='".addslashes($_POST['hips'])."',
                        shoesize='".addslashes($_POST['shoesize'])."',
                        inseam='".addslashes($_POST['inseam'])."',
                        neck='".addslashes($_POST['neck'])."',
                        sleeve='".addslashes($_POST['sleeve'])."',
                        displayprofile='".addslashes($_POST['displayprofile'])."'
                         where id='".$_SESSION['UsErId']."'";     
        $AddUserQryRs=mysql_query($AddUserQry);
        
        //////newsletter
        if($_POST['newsletter']=="Y")
        {
            $selQry=mysql_query("SELECT * FROM subscriber WHERE email='".addslashes($_POST['email'])."'");     
            $tot=mysql_affected_rows();
            if($tot<=0)
            {
                $AddUserQry="INSERT INTO subscriber SET email='".addslashes($_POST['email'])."',sdate=now()";     
                $AddUserQryRs=mysql_query($AddUserQry);
            }    
        }
        else
        {
            $selQry=mysql_query("SELECT * FROM subscriber WHERE email='".addslashes($_POST['email'])."'");     
            $tot=mysql_affected_rows();
            if($tot>0)
            {
                $AddUserQry="DELETE FROM subscriber WHERE email='".addslashes($_POST['email'])."'";     
                $AddUserQryRs=mysql_query($AddUserQry);
            }    
        }
        //////end of newsletter
        
        if($_FILES["picture"]['tmp_name'])
        {
            $file=$_FILES["picture"];    
            //$send_name1=ereg_replace (" ", "",$file["name"]);             
            $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);        
            $filename1=rand().$send_name1;        
            $filetoupload=$file['tmp_name'];                 
            $path="../Users/".$filename1; 
            copy($filetoupload,$path);
            $extsql2=",picture='$filename1'";
            if($_POST["picture_old"]!="")
            {
               $oldres=$_POST["picture_old"];
               @unlink("../Users/thumb/$oldres");
               @unlink("../Users/$oldres");
            }
            //Create Thumb 90px tall
               $source=$path;
               $thumb_f2 = $filename1 ;
               $dest2="../Users/thumb/".$thumb_f2;
               $thumb_size_h = 80;
               
               $size = getimagesize($source);
               $width = $size[0];
               $height = $size[1];
               $scale = $thumb_size_h/$height;
               
               if ($scale < 1) 
               {
                    $thumb_size_w = floor($scale*$width);
                    $thumb_size_h = floor($scale*$height);
               }
               else
               {
                    $thumb_size_w = $scale*$width;
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
            
                $AddUserQry="UPDATE users SET picture='$filename1' WHERE id='".$_SESSION['UsErId']."'";     
                $AddUserQryRs=mysql_query($AddUserQry);
        }
    
        header("location:my_account.php?msg=Your account has been updated successfully.");            
        exit;
    }
    else
    {
        header("location:my_profile.php?msg=The email address you provided is already registered.");            
        exit;
    }
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
        $PAGETITLE='My Profile';
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>
        <link rel="stylesheet" href="css/my_account.css" type="text/css" media="all">

    <!-- CONTENT -->
        <div id="content">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <form id="AddeventForm" name="AddeventForm" enctype="multipart/form-data" method="post">
                <div class="form_section">
                    <h3>Account Settings</h3>
                    <div class="field">
                        <label>First Name</label>
                        <input type="text" class="input" name="firstname" id="firstname" value="<? echo stripslashes($Row['firstname']);?>" />
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input type="text" class="input" name="lastname" id="lastname" value="<? echo stripslashes($Row['lastname']);?>" />
                    </div>
                    <!-- <div class="field">
                        <label>Artist Name</label>
                        <input type="text" class="input" name="artistname" id="artistname">
                    </div>
                    <div class="field">
                        <label>Genre</label>
                        <select name="genre" id="genre">
                            <option value="">Select a genre</option>
                            <?=GetDropdown(id,name,genre,'  order by name  asc',stripslashes($_REQUEST['genre']));?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Label Type</label>
                        <select name="labeltype" id="labeltype">
                            <option value="">Select a label</option>
                            <?=GetDropdown(id,name,labeltype,'  order by name  asc',$_REQUEST['labeltype']);?>
                        </select>
                    </div> -->
                    <div class="field">
                        <label>Email</label>
                        <input type="text" class="input" name="email" id="email"  value="<? echo stripslashes($Row['email']);?>" />
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" class="input" name="password" id="password"  value="<? echo stripslashes($Row['password']);?>" />
                    </div>
                </div>
                <div class="form_section">
                    <h3>Personal Info</h3>
                    <div class="field gender">
                        <label>Gender</label>
                        <label class="male">Male</label>
                        <input type="radio" name="gender" id="gender1" value="Male" <? if($Row['gender']=="Male"){echo "checked";}?>>
                        <label class="female">Female</label>
                        <input type="radio" name="gender" id="gender2" value="Female" <? if($Row['gender']=="Female"){echo "checked";}?>>
                    </div>
                    <div class="field">
                        <label>Birthday</label>
                        <? 
                        $dob=$Row['dob'];
                        if($dob!='' && $dob!='0000-00-00')
                        {
                            $expdob=explode("-",$dob);
                            $selyear=$expdob[0];
                            $selmonth=$expdob[1];
                            $selday=$expdob[2];
                        }
                        ?>
                        <select class="date" name="dob_month">
                            <option value="">Month</option>
                            <? echo getMonth($selmonth);?>
                        </select>
                        <select class="date" name="dob_day">
                            <option value="">Day</option><? echo getDayValue($selday);?></select>
                        <select class="date" name="dob_year">
                            <option value="">Year</option>
                            <? echo getYear($selyear,2,'styear',1900);?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Weight</label>
                        <input type="text" class="input" name="weight" id="weight"  value="<? echo stripslashes($Row['weight']);?>">
                    </div>
                    <div class="field">
                        <label>Height</label>
                        <select name="height"  id="height">
                            <option value=""></option>
                            <?
                            for($i="124";$i<220;$i++)
                            {
                                if($Row['height']==$i){$sel='selected';}else{$sel='';}
                                echo '<option value="'.$i.'" '.$sel.'>'.$i.'cm / '.get_height($i).'';
                            }
                            ?>
                        </select>
                    </div>
                    <? if($Row['accounttype']=="Actors" || $Row['accounttype']=="tosh-ette" || $Row['accounttype']=="tosh-hunk") { ?>
                    <div class="field">
                        <label>Bust</label>
                        <input type="text" class="input" name="bust" id="bust" value="<? echo stripslashes($Row['bust']);?>" />
                    </div>
                    <div class="field">
                        <label>Hips</label>
                        <input type="text" class="input" name="hips" id="hips" value="<? echo stripslashes($Row['hips']);?>" />
                    </div>
                    <div class="field">
                        <label>Shoe Size</label>
                        <input type="text" class="input" name="shoesize" id="shoesize" value="<? echo stripslashes($Row['shoesize']);?>" />
                    </div>
                    <div class="field">
                        <label>Inseam</label>
                        <input type="text" class="input" name="inseam" id="inseam" value="<? echo stripslashes($Row['inseam']);?>" />
                    </div>
                    <div class="field">
                        <label>Neck</label>
                        <input type="text" class="input" name="neck" id="neck" value="<? echo stripslashes($Row['neck']);?>" />
                    </div>
                    <div class="field">
                        <label>Sleeve</label>
                        <input type="text" class="input" name="sleeve" id="sleeve" value="<? echo stripslashes($Row['sleeve']);?>" />
                    </div>
                    <? } ?>
                </div>
                <div class="form_section">
                    <h3>Profile Settings</h3>
                    <? if($Row['picture']!=""){?>
                    <div class="field">
                        <label>Current Picture</label>
                        <img src="../Users/thumb/<?=$Row['picture'];?>" />
                    </div>
                    <? } ?>
                    <div class="field">
                        <label>Upload a Picture</label>
                        <input type="file" name="picture" id="picture" />
                        <input type="hidden" name="picture_old" id="picture_old" value="<?=$Row['picture'];?>" />
                    </div>
                    <!-- <div class="field">
                        <label>About You</label>
                        <textarea  class="input" name="aboutme" id="aboutme">
                            <? echo stripslashes($Row['aboutme']);?>
                        </textarea>
                    </div> -->
                    <div class="field checkbox">
                        <input type="checkbox" name="newsletter" value="Y"  <? if($Row['newsletter']=="Y"){?>checked="checked"<? } ?>/>
                        <label>I'm happy to receive newsletters from <? echo $SITE_NAME;?>.</label>
                    </div>
                    <div class="field checkbox">
                        <input type="checkbox" name="displayprofile" value="Y"  <? if($Row['displayprofile']=="Y"){?>checked="checked"<? } ?>/>
                        <label>Display your Profile?</label>
                    </div>
                    <div class="field">
                        <? if($_REQUEST['msg']) {?>
                            <div id="msg" class="active">
                                <? echo $_REQUEST['msg'];?>
                            </div>
                        <? } ?>
                    </div>
                    <div class="field">
                        <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
                        <a href="#" class="button red" onClick="return valid();">Update Profile</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
    
    <script language="javascript" type="text/javascript">
    function valid()
    {
        form=document.AddeventForm;

        if(form.firstname.value.split(" ").join("")=="")
        {
            alert("Please enter first name.")
            form.firstname.focus();
            return false;
        }
        if(form.lastname.value.split(" ").join("")=="")
        {
            alert("Please enter last name.")
            form.lastname.focus();
            return false;
        }
        if(form.email.value.split(" ").join("")=="")
        {
                alert("Please enter your email address.")
                form.email.focus();
                return false;
        }
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)))
        {
                alert("Please enter a proper email address.");
                form.email.focus();
                return false;
        }   
        if(form.password.value.split(" ").join("")=="")
        {
                alert("Please enter your password.")
                form.password.focus();
                return false;
        } 

        if(form.dob_month.value.split(" ").join("")=="" || form.dob_day.value.split(" ").join("")=="" || form.dob_year.value.split(" ").join("")=="")
        {
            alert("Please select date of birth.")
            return false;
        }
        if(form.gender1.checked==false && form.gender2.checked==false)
        {
            alert("Please select gender.")
            return false;
        }


        document.AddeventForm.HidRegUser.value='1';
        document.AddeventForm.submit();
        return  true;    
    }
    </script>
</body>
</html>