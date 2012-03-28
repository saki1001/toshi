<?
   include_once("admin.config.inc.php");
   include("admin.cookie.php");
   include("connect.php");
	
	if($_POST["Submit"])
    {		
		$pid=$_POST["pid"];
		$title=$_POST["title"];
		$imagecaption = "";
	
	if(isset($_FILES["img"]['tmp_name']))
	{
		$img_name=$_FILES["img"]['tmp_name'];
		$img_name1=$_FILES['img']['name'];
		/*$imagename=$img_name1;
		$imagename=ereg_replace(" ","_",$imagename);
		$imagename=ereg_replace("'","_",stripslashes($imagename));
		$imagename=ereg_replace("#","_",stripslashes($imagename));
		$imagename=ereg_replace("%","_",stripslashes($imagename));
		$imagename=ereg_replace('"','_',stripslashes($imagename));
		$imagename=ereg_replace('&','_',stripslashes($imagename));
		$imagename=ereg_replace('\+','_',stripslashes($imagename));
		$imagename=ereg_replace('=','_',stripslashes($imagename));
		$imagename=ereg_replace('/','_',stripslashes($imagename));
		$imagename=ereg_replace('\|','_',stripslashes($imagename));
		$maxid=$mid;
		srand(make_seed());
		$randval = rand();*/
		
		$imagename=ereg_replace("[^A-Za-z0-9.]","_",$_FILES['img']['name']);
		$imagename=rand()."_".$imagename;
		//$f1 = $randval.$imagename ;			
		$f1 = $imagename;			

		$path1 ="../Products/".$f1;
				
		if((!ereg(".jpg",$img_name1)) && (!ereg(".jpeg",$img_name1)) && (!ereg(".gif",$img_name1)) && (!ereg(".JPG",$img_name1)) && (!ereg(".JPEG",$img_name1)) && (!ereg(".GIF",$img_name1)) && (!ereg(".png",$img_name1)) && (!ereg(".PNG",$img_name1)))
		{
			$msg="Invalid Photo Please Check it again";
		}
		else
		{					
			$image=$img_name;
				
			if(!$msg)
			{
				copy($image,$path1);
				//$imgclass1=new imageresize($path1,$path1,500,500);
				//pjresize($path1,$path1,540,500,'Y');
				
				//////////added
				$path3="../Products/".$imagename; 
				$source=$path3;
				$thumb_f2 = $imagename ;
				$dest2="../Products/thumb1/".$thumb_f2;
				$thumb_size_w = 102;
				$thumb_size_h = 102;
				
				$size = getimagesize($source);
				$width = $size[0];
				$height = $size[1];
				$scale = min($thumb_size_w/$width, $thumb_size_h/$height);
				
				if ($scale < 1) 
				{
					 $thumb_size_w = floor($scale*$width);
					 $thumb_size_h = floor($scale*$height);
				}
				
				$new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
				$system=explode(".",$thumb_f2);
				if (preg_match("/jpg|jpeg/",$system[1])){
					$im=imagecreatefromjpeg($source);				
				}else if (preg_match("/png/",$system[1])){
					$im=imagecreatefromjpeg($source);
				}else if($ext=="gif" || $ext=="GIF"){
					$im=imagecreatefromgif($source);
				}else if($ext=="png" || $ext=="PNG"){
					$im=imagecreatefrompng($source);
				}else if($ext=="bmp" || $ext=="BMP"){
					$im=imagecreatefrompng($source);				
				}else if (preg_match("/gif/",$system[1])){
					$im=imagecreatefromgif($source);				
				}else if (preg_match("/bmp/",$system[1])){
					$im=imagecreatefromwbmp($source);				
				}else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
					$im=imagecreatefromwbmp($source);
				}else{
					$im=imagecreatefromjpeg($source);
				}	
				//$im = imagecreatefromjpeg($source);
				imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
				imagejpeg($new_im,$dest2,100);
				//End thumb	
				
				
				
				
				$path3="../Products/".$imagename; 
				$source=$path3;
				$thumb_f2 = $imagename ;
				$dest2="../Products/thumb2/".$thumb_f2;
				$thumb_size_w = 167;
				$thumb_size_h = 143;
				
				$size = getimagesize($source);
				$width = $size[0];
				$height = $size[1];
				$scale = min($thumb_size_w/$width, $thumb_size_h/$height);
				
				if ($scale < 1) 
				{
					 $thumb_size_w = floor($scale*$width);
					 $thumb_size_h = floor($scale*$height);
				}
				
				$new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
				$system=explode(".",$thumb_f2);
				if (preg_match("/jpg|jpeg/",$system[1])){
					$im=imagecreatefromjpeg($source);				
				}else if (preg_match("/png/",$system[1])){
					$im=imagecreatefromjpeg($source);
				}else if($ext=="gif" || $ext=="GIF"){
					$im=imagecreatefromgif($source);
				}else if($ext=="png" || $ext=="PNG"){
					$im=imagecreatefrompng($source);
				}else if($ext=="bmp" || $ext=="BMP"){
					$im=imagecreatefrompng($source);				
				}else if (preg_match("/gif/",$system[1])){
					$im=imagecreatefromgif($source);				
				}else if (preg_match("/bmp/",$system[1])){
					$im=imagecreatefromwbmp($source);				
				}else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
					$im=imagecreatefromwbmp($source);
				}else{
					$im=imagecreatefromjpeg($source);
				}	
				//$im = imagecreatefromjpeg($source);
				imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
				imagejpeg($new_im,$dest2,100);
				//End thumb	
				
				
				
				$path3="../Products/".$imagename; 
				$source=$path3;
				$thumb_f2 = $imagename ;
				$dest2="../Products/thumb3/".$thumb_f2;
				$thumb_size_w = 304;
				$thumb_size_h = 239;
				
				$size = getimagesize($source);
				$width = $size[0];
				$height = $size[1];
				$scale = min($thumb_size_w/$width, $thumb_size_h/$height);
				
				if ($scale < 1) 
				{
					 $thumb_size_w = floor($scale*$width);
					 $thumb_size_h = floor($scale*$height);
				}
				
				$new_im = @imagecreatetruecolor($thumb_size_w,$thumb_size_h);
				$system=explode(".",$thumb_f2);
				if (preg_match("/jpg|jpeg/",$system[1])){
					$im=imagecreatefromjpeg($source);				
				}else if (preg_match("/png/",$system[1])){
					$im=imagecreatefromjpeg($source);
				}else if($ext=="gif" || $ext=="GIF"){
					$im=imagecreatefromgif($source);
				}else if($ext=="png" || $ext=="PNG"){
					$im=imagecreatefrompng($source);
				}else if($ext=="bmp" || $ext=="BMP"){
					$im=imagecreatefrompng($source);				
				}else if (preg_match("/gif/",$system[1])){
					$im=imagecreatefromgif($source);				
				}else if (preg_match("/bmp/",$system[1])){
					$im=imagecreatefromwbmp($source);				
				}else if($ext=="jpg" || $ext=="jpeg" || $ext=="JPEG" || $ext=="JPG"){
					$im=imagecreatefromwbmp($source);
				}else{
					$im=imagecreatefromjpeg($source);
				}	
				//$im = imagecreatefromjpeg($source);
				imagecopyresampled($new_im,$im,0,0,0,0,$thumb_size_w,$thumb_size_h,$width,$height);
				imagejpeg($new_im,$dest2,100);
				//End thumb	
				
				
				$selsql = " select * from prodimages where pid=$pid " ;
				$selres = mysql_query($selsql);	
				$totalpics = mysql_num_rows($selres) + 1;
				
				$que="insert into prodimages set `pid`=$pid,`pimage` ='$f1',`displayorder`='$totalpics'";			
				$run=mysql_query($que);
				 //print $que;
				header("location:prodimages.php?pid=$pid");
			}
		}
	}
}
?>