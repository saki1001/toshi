<?
    include("../../connect.php");
    
    if($_FILES["music"]['tmp_name']) {
         $file=$_FILES["music"];
         //$send_name1=ereg_replace (" ", "",$file["name"]);
         $send_name1=ereg_replace("[^A-Za-z0-9.]","_",$file["name"]);
         $filename1=rand().$send_name1;
         $filetoupload=$file['tmp_name'];
         $path="Musics/".$filename1;
         copy($filetoupload,$path);
         $extsql2=",music='$filename1'";
         
         $addMusicQuery="INSERT INTO users_musics SET music='$filename1',caption='".addslashes($_POST['caption'])."',addeddate=curdate(),userid='".$_SESSION['UsErId']."'";     
         $addMusicQueryResult=mysql_query($addMusicQuery);
         
         header('Content-type: application/json');
         echo '{"status": "SUCCESS"}';
         exit;
    } else {
        header('Content-type: application/json');
        echo '{"status": "ERROR"}';
        exit;
    }
    

?>