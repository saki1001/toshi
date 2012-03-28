<?php
include("connect.php");
global $THUMBNAIL_IMAGEPATH;
///////////Username Validation//////////
if($_REQUEST["Type"]=="UsernameValidation")
{
	function validate($name)
	{
		$SE="SELECT * FROM employee";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		for($T=0;$T<$TOT;$T++)
		{
			$FOBJ=mysql_fetch_object($SERs);
			if($name==$FOBJ->username)
			{
			  return "<span id=\"warn\">Username already taken</span>\n";
			} 
		}  
		if($name == '')
		{
			return 'Please Enter User Name';
		} 
		if(strlen($name) < 6)
		{
			return "<span id=\"warn\">Username must be greater than 6 characters.</span>\n";
		}
		return "<span id=\"notice\">Username ok!</span>\n";
	}
	echo validate(trim($_REQUEST['name']));
}
///////////End of Username Validation//////////

////////////////////////////////////Load index AVAILABLE INVENTORY
///////////////////Load index  Collaborators
if($_REQUEST["Type"]=="Load_Index_Collaborators")
{
	function validate22($uid)
	{	
		$Data='<table  border="0" align="left" cellpadding="2" cellspacing="0" style="padding-top:0px;" ><tr><td align="left" valign="top" width="52px">';
		$SelFrndListQryRs=mysql_query("SELECT * FROM friends where 	userid='".$_SESSION['UsErIdAdMiN']."'  and status='APPROVED'  limit 0,12");
		$TotSelFrndList=mysql_affected_rows();
		if($TotSelFrndList>0)
		{
				for($MK=0;$MK<$TotSelFrndList;$MK++)
				{
					$SelFrndListQryRow=mysql_fetch_object($SelFrndListQryRs);				
					$FRNDID=$SelFrndListQryRow->friendid;
										
					if($MK%6==0)
					{
						$Data.="</tr><tr>";
					}
					
					////////////get user detail
					$seluserdetailRs=mysql_query("select fname,lname,id,photo from users where id='".$FRNDID."'");
					$Totseluserdetail=mysql_affected_rows();
					if($Totseluserdetail>0) 
					{
						$seluserdetailRow=mysql_fetch_object($seluserdetailRs);
						if($seluserdetailRow->photo!="")
						{
							$IMG="<img src='onlinethumb.php?nm=User_Photo/".$seluserdetailRow->photo."&mwidth=52&mheight=52' border='0'>";
						} 
						else 
						{
							$IMG='<img src="onlinethumb.php?nm=images/noimage.jpg&mwidth=52&mheight=52" border="0" >';
						}
						
						$Data.=
							'<td valign="top" width="60px"	 ><table cellpadding="0" cellspacing="0" width="60px;" ><tr>
							  <td align="center" valign="top" height="54"><a href="'.PublicProfilePageUrl($seluserdetailRow->id).'" class="link_tom">'.$IMG.'</a></td>
							 </tr>
							<tr>
							  <td align="center" height="30" valign="middle" class="textblack14"><a href="'.PublicProfilePageUrl($seluserdetailRow->id).'" class="textblack14">'.stripslashes($seluserdetailRow->fname).'</a></td>
							  </tr>
							</table></td>';
						
					}
				}
		  }
		  else
		  {
		  		$Data.='<table cellpadding="0" cellspacing="0" width="100px;" ><tr>
							  <td align="center" valign="middle" height="70" >No Collaborators.</td></tr></table>';
		  }			
	  $Data.="</td></tr></table>";				  
	  return $Data;
	}
	echo validate22($_REQUEST['uid']);
}

if($_REQUEST["Type"]=="Load_Index_Collaborators_patron")
{
	function validate22($uid)
	{	
		$Data='<table  border="0" align="left" cellpadding="2" cellspacing="0" style="padding-top:0px;" ><tr><td align="left" valign="top" width="52px">';
		$SelFrndListQryRs=mysql_query("SELECT * FROM friends where 	friendid ='".$_SESSION['UsErIdAdMiN']."'  and status='APPROVED'  limit 0,12");
		$TotSelFrndList=mysql_affected_rows();
		if($TotSelFrndList>0)
		{
				for($MK=0;$MK<$TotSelFrndList;$MK++)
				{
					$SelFrndListQryRow=mysql_fetch_object($SelFrndListQryRs);				
					$FRNDID=$SelFrndListQryRow->friendid;
										
					if($MK%6==0)
					{
						$Data.="</tr><tr>";
					}
					
					////////////get user detail
					$seluserdetailRs=mysql_query("select fname,lname,id,photo from users where id='".$FRNDID."'");
					$Totseluserdetail=mysql_affected_rows();
					if($Totseluserdetail>0) 
					{
						$seluserdetailRow=mysql_fetch_object($seluserdetailRs);
						if($seluserdetailRow->photo!="")
						{
							$IMG="<img src='onlinethumb.php?nm=User_Photo/".$seluserdetailRow->photo."&mwidth=52&mheight=52' border='0'>";
						} 
						else 
						{
							$IMG='<img src="onlinethumb.php?nm=images/noimage.jpg&mwidth=52&mheight=52" border="0" >';
						}
						
						$Data.=
							'<td valign="top" width="60px"	 ><table cellpadding="0" cellspacing="0" width="60px;" ><tr>
							  <td align="center" valign="top" height="54"><a href="'.PublicProfilePageUrl($seluserdetailRow->id).'" class="link_tom">'.$IMG.'</a></td>
							 </tr>
							<tr>
							  <td align="center" height="30" valign="middle" class="textblack14"><a href="'.PublicProfilePageUrl($seluserdetailRow->id).'" class="textblack14">'.stripslashes($seluserdetailRow->fname).'</a></td>
							  </tr>
							</table></td>';
						
					}
				}
		  }
		  else
		  {
		  		$Data.='<table cellpadding="0" cellspacing="0" width="100px;" ><tr>
							  <td align="center" valign="middle" height="70" >No Collaborators.</td></tr></table>';
		  }			
	  $Data.="</td></tr></table>";				  
	  return $Data;
	}
	echo validate22($_REQUEST['uid']);
}

if($_REQUEST["Type"]=="Load_Index_Fellowpatron")
{
	function validate22()
	{	
		$Data='<table  border="0" align="left" cellpadding="2" cellspacing="0" style="padding-top:0px;" ><tr><td align="left" valign="top" width="52px">';
		$SelFrndListQry="SELECT friends.* FROM friends 
							left outer join users on users.id=friends.friendid
							where userid='".$_SESSION['UsErIdAdMiN']."'  and status='APPROVED'  and users.usertype='PATRONS' limit 0,12";
		$SelFrndListQryRs=mysql_query($SelFrndListQry);
		$TotSelFrndList=mysql_num_rows($SelFrndListQryRs);
		if($TotSelFrndList>0)
		{
				for($MK=0;$MK<$TotSelFrndList;$MK++)
				{
					$SelFrndListQryRow=mysql_fetch_object($SelFrndListQryRs);				
					$FRNDID=$SelFrndListQryRow->friendid;
					if($MK%6==0)
					{
						$Data.="</tr><tr>";
					}
					
					////////////get user detail
					$seluserdetailRs=mysql_query("select fname,lname,id,photo from users where id='".$FRNDID."'");
					$Totseluserdetail=mysql_affected_rows();
					if($Totseluserdetail>0) 
					{
						$seluserdetailRow=mysql_fetch_object($seluserdetailRs);
						if($seluserdetailRow->photo!="")
						{
							$IMG="<img src='onlinethumb.php?nm=User_Photo/".$seluserdetailRow->photo."&mwidth=52&mheight=52' border='0'>";
						} 
						else 
						{
							$IMG='<img src="onlinethumb.php?nm=images/noimage.jpg&mwidth=52&mheight=52" border="0" >';
						}
						
						$Data.=
							'<td valign="top" width="60px"	 ><table cellpadding="0" cellspacing="0" width="60px;" ><tr>
							  <td align="center" valign="top" height="54"><a href="'.PublicProfilePageUrl($seluserdetailRow->id).'" class="link_tom">'.$IMG.'</a></td>
							 </tr>
							<tr>
							  <td align="center" height="30" valign="middle" class="textblack14"><a href="'.PublicProfilePageUrl($seluserdetailRow->id).'" class="textblack14">'.stripslashes($seluserdetailRow->fname).'</a></td>
							  </tr>
							</table></td>';
						
					}
				}
		  }
		  else
		  {
		  		$Data.='<table cellpadding="0" cellspacing="0" width="100px;" ><tr>
							  <td align="center" valign="middle" height="70" >No Fellow Patrons.</td></tr></table>';
		  }			
	  $Data.="</td></tr></table>";				  
	  return $Data;
	}
	echo validate22();
}
///////////////////End Load index  Collaborators
///////////////////Load index  Upcoming Event
if($_REQUEST["Type"]=="Load_Index_UpcomingEvent")
{
	function validate()
	{	
		$Data='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		
		$TotEventQry="SELECT userid,starttime,id,name from events where userid='".$_SESSION['UsErIdAdMiN']."' and approved='Y' and starttime>=now() order by starttime asc limit 0,6";
		$TotEventQryRs=mysql_query($TotEventQry);
		$TotEvent=mysql_num_rows($TotEventQryRs);
		if($TotEvent>0)
		{
			for($MK=0;$MK<$TotEvent;$MK++)
			{
				$TotEventQryRow=mysql_fetch_object($TotEventQryRs);
				if($_SESSION['UsErIdAdMiN']==$TotEventQryRow->userid)
					$imgnam='<img src="images/bluebul.jpg" alt="bullet" width="7" height="10" />';
				else
					$imgnam='<img src="images/redbul.jpg" alt="bullet" width="7" height="10" />';	
				//if(12>0)
				{
					$Data.=
							' <tr>
								<td width="15" height="45" align="left" valign="top">'.$imgnam.'&nbsp;</td>
								<td align="left" valign="top"><span class="text11">'.date("m/d/Y",strtotime(stripslashes($TotEventQryRow->starttime))).' at '.stripslashes($TotEventQryRow->starttime_time).'</span><br /><a href="event-detail.php?Eid='.mysql_real_escape_string($TotEventQryRow->id).'" class="link_tom">'.stripslashes($TotEventQryRow->name).'</a></td>
							  </tr>
							 ';
				}		
				
			}	
		}
		else
		{
				$Data.=
						' <tr>
							<td height="70" align="center" class="text11" valign="middle">There are no events.</td>
						  </tr>
						 ';
		}	
	  $Data.="</table>";				  
	  return $Data;
	}
	echo validate();
}
///////////////////End Load Upcoming Event

///////////Guild Nmae Validation//////////
if($_REQUEST["Type"]=="IsGuildAvailable")
{
	function validate($name)
	{
		$SE="SELECT * FROM guilds where name='".addslashes($name)."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($name == '')
		{
			return 'Please Enter Guild Name';
		} 
		else if($TOT>0)
		{
			return 'Guild Name already exists. Please try another Guild Name.';
		} 
		else
		{
			return "";	
		}
	}
	echo validate(trim($_REQUEST['name']));
}
///////////End of Username Validation//////////
///////////////////Artist Signup User Name Checking
if($_REQUEST["Type"]=="IsUserNameAvailable")
{
	function validate($name)
	{
		$SE="SELECT id FROM users where username='".addslashes($name)."' and id!='".$_SESSION['UsErIdAdMiN']."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($name == '')
		{
			return 'Please Enter User Name';
		} 
		else if($TOT>0)
		{
			return 'User Name already exists. Please try another User Name.';
		} 
		else if(!preg_match('/^[A-Za-z0-9]*$/',$name))	
		{
			return 'Your custom URL may only contain letters and numbers.';	
		}
		else
		{
			return "";	
		}
	}
	echo validate(trim($_REQUEST['name']));
}
///////////End of Username Validation//////////

///////////////////Artist Signup Email Checking
if($_REQUEST["Type"]=="IsEmailNameAvailable")
{
	function validate($name)
	{
		$SE="SELECT id FROM users where email='".addslashes($name)."' and id!='".$_SESSION['UsErIdAdMiN']."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($name == '')
		{
			return 'Please Enter Email Address.';
		} 
		else if($TOT>0)
		{
			return 'Email address already exists. Please try another email address.';
		} 
		else
		{
			return "";	
		}
	}
	echo validate(trim($_REQUEST['name']));
}
///////////End of Username Validation//////////
///////////////////Artist Signup User Name Checking
if($_REQUEST["Type"]=="CheckLoginDetail")
{
	function validate($name,$password,$pagename)
	{
		$SE="SELECT id,usertype FROM users where email='".addslashes($name)."' and password='".$password."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		$SERow=mysql_fetch_object($SERs);
		if($name == '')
		{
			return 'Please Enter Email Address.';
		} 
		else if($password == '')
		{
			return 'Please Enter Passsword.';
		}
		else if($TOT<=0)
		{
			return 'Invalied Email or Password.';
		} 
		else
		{
			$_SESSION['UsErIdAdMiN']=$SERow->id;
			$_SESSION['UsErTyPe']=$SERow->usertype;
			return "";	
		}
	}
	echo validate(trim($_REQUEST['name']),trim($_REQUEST['password']),trim($_REQUEST['pagename']));
}

///////////////////LoadAnotherViewImages
if($_REQUEST["Type"]=="LoadAnotherViewImages")
{
	function validate()
	{	
		$Data='<table width="100%" border="0" cellspacing="3" cellpadding="1">';
		
		$gettempcountitemQry="select * from projects_images_set_temp where	main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."'";	 
		$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
		$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
		if($Totgettempcountitem>0)
		{
			$clsnm=" class='Buttonadd_new_itemWithImage'";
		}
		else
		{
			$clsnm=" class='Buttonadd_first_itemWithImage'";
		}
		
		
		$gettempcountitemQry2="select * from projects_images_temp where		sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."'";	 
		$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2	);
		$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
		if($Totgettempcountitem2>0)
		{
			$clsnm2=" class='Buttonadd_add_another_viewWithImage'";
		}
		else
		{
			$clsnm2=" class='Buttonadd_UploadimageWithImage'";
		}
		
		$TotProjectQry="SELECT picture from projects_images_temp where sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject>0)
		{
			for($PJ=0;$PJ<$TotProject;$PJ++)
			{
				$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
				if($PJ%4==0)
				{
					$Data.="</tr><tr>";
				}
					$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122>';
							if($TotProjectQryRow->picture!=""){
								$Data.="<img src='onlinethumb.php?nm=ProjectViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
								//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
							} else {
								$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
							}
					$Data.="</td>";
					if($PJ==($TotProject-1))
					{
						if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
					$rrrr="addprojectview.php";
					$Data.="<td colspan='2' valign='top'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
										<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
									</td>
								  </tr>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
									</td>
								  </tr>
								</table>
							</td>";
						 } 	  
					 }   
				 }else{  	
				 	$Data.="<tr><td colspan='2' valign='top'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
										<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
									</td>
								  </tr>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
									</td>
								  </tr>
								</table>
							</td></tr>";
					 }		
	  $Data.="</table>";				  
	  return $Data;
	}
	echo validate();
}

if($_REQUEST["Type"]=="LoadAnotherViewImages_Edit")
{
	function validate($eid,$Iid)
	{	
		$Data='<table width="100%" border="0" cellspacing="3" cellpadding="1">';
		if($Iid!="")
		{
						$AndQry="and projects_images_set.id='".mysql_real_escape_string($Iid)."'";
		
						$gettempcountitemQry="select * from projects_images_set where	projectid='".$eid."' $AndQry";	 
						$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
						$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
						if($Totgettempcountitem>0)
						{
							$clsnm=" class='ButtonSaveWithImage'";
						}
						else
						{
							$clsnm=" class='Buttonadd_first_itemWithImage'";
						}
						$gettempcountitemQryRow=mysql_fetch_object($gettempcountitemQryRs);
						
						$gettempcountitemQry2="select * from projects_images where	imagesetid='".$gettempcountitemQryRow->imagesetid."'";	 
						$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2);
						$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
						if($Totgettempcountitem2>0)
						{
							$clsnm2=" class='Buttonadd_add_another_viewWithImage'";
						}
						else
						{
							$clsnm2=" class='Buttonadd_UploadimageWithImage'";
						}
						
						$TotProjectQry="SELECT picture,id from projects_images where imagesetid='".$gettempcountitemQryRow->imagesetid."' order by id desc";
						$TotProjectQryRs=mysql_query($TotProjectQry);
						$TotProject=mysql_num_rows($TotProjectQryRs);
						if($TotProject>0)
						{
							for($PJ=0;$PJ<$TotProject;$PJ++)
							{
								$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
								if($PJ%4==0)
								{
									$Data.="</tr><tr>";
								}
									$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122 onmouseover="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'inline\'" onmouseout="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'none\'" ><span id="DELETE_'.$PJ.'" style=\'display:none;position:absolute\' ><a href="#" onclick="LoadAnotherViewImages_Del(\'LoadAnotherViewImages_ID\','.$eid.','.$Iid.','.$TotProjectQryRow->id.');return false;";><img src="images/delete1.gif" border=0/></a></span>';
											if($TotProjectQryRow->picture!=""){
												$Data.="<img src='onlinethumb.php?nm=ProjectViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
												//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
											} else {
												$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
											}
									$Data.="</td>";
									if($PJ==($TotProject-1))
									{
										if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
									$rrrr="addprojectview.php";
									$Data.="<td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												  </tr>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet_Edit(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value,$Iid);' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td>";
										 } 	  
									 }   
								 }else{  	
									$Data.="<tr><td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												  </tr>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td></tr>";
									 }		
					  $Data.="</table>";				  
					  return $Data;
		}
		else
		{
					   $gettempcountitemQry="select * from projects_images_set where	projectid='".$eid."'";	 
						$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
						$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
						if($Totgettempcountitem>0)
						{
							$clsnm=" class='Buttonadd_new_itemWithImage'";
						}
						else
						{
							$clsnm=" class='Buttonadd_first_itemWithImage'";
						}
						
						
						$gettempcountitemQry2="select * from  projects_images where		imagesetid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."'";	 
						$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2	);
						$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
						if($Totgettempcountitem2>0)
						{
							$clsnm2=" class='Buttonadd_add_another_viewWithImage'";
						}
						else
						{
							$clsnm2=" class='Buttonadd_UploadimageWithImage'";
						}
						
						$TotProjectQry="SELECT picture from projects_images where imagesetid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
						$TotProjectQryRs=mysql_query($TotProjectQry);
						$TotProject=mysql_num_rows($TotProjectQryRs);
						if($TotProject>0)
						{
							for($PJ=0;$PJ<$TotProject;$PJ++)
							{
								$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
								if($PJ%4==0)
								{
									$Data.="</tr><tr>";
								}
									$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122 onmouseover="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'inline\'" onmouseout="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'none\'" ><span id="DELETE_'.$PJ.'" style=\'display:none;position:absolute\' ><a href="#" onclick="LoadAnotherViewImages_Del(\'LoadAnotherViewImages_ID\','.$eid.','.$Iid.','.$TotProjectQryRow->id.');return false;";>DELETE</a></span>';
											if($TotProjectQryRow->picture!=""){
												$Data.="<img src='onlinethumb.php?nm=ProjectViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
												//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
											} else {
												$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
											}
									$Data.="</td>";
									if($PJ==($TotProject-1))
									{
										if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
									$rrrr="addprojectview.php";
									$Data.="<td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												   <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												   </tr>
												   <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet_Edit2(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value,".$eid.",".$_SESSION['SESSION_CURRENTPROJECT_SET'].");' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td>";
										 } 	  
									 }   
								 }else{  	
									$Data.="<tr><td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												  </tr>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td></tr>";
									 }		
					  $Data.="</table>";				  
					  return $Data;
		}		  
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}


if($_REQUEST["Type"]=="LoadAnotherViewImages_Del")
{
	function validate($eid,$Iid,$Did)
	{	
		  $Del=mysql_query("DELETE FROM projects_images where id='".$Did."'");
		  return "Done";
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']),trim($_REQUEST['Did']));
}
if($_REQUEST["Type"]=="LoadAnotherViewImages_Del_SHOP")
{
	function validate($eid,$Iid,$Did)
	{	
		  $Del=mysql_query("DELETE FROM shop_images where id='".$Did."'");
		  return "Done";
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']),trim($_REQUEST['Did']));
}
///////////////////End LoadAnotherViewImages

///////////////////LoadAnotherViewMainImage
if($_REQUEST["Type"]=="LoadAnotherViewMainImage")
{
	function validate()
	{	
		$TotProjectQry_main="SELECT picture from projects_images_temp where 	sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
		$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
		if($TotProject_main>0)
		{
			$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
			$Data.="<img src='onlinethumb.php?nm=ProjectViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
		}
		else
		{
			$Data.='<img src="images/images.jpg" width="548" height="330" />';
		}
	  return $Data;
	}
	echo validate();
}
///////////////////End LoadAnotherViewMainImage
///////////////////LoadAnotherViewMainImage
if($_REQUEST["Type"]=="LoadAnotherViewMainImage_Edit")
{
	function validate($eid,$Iid)
	{	
		
		if($Iid!="")
		{
			$AndQry="and projects_images_set.id='".mysql_real_escape_string($Iid)."'";
			$gettempcountitemQry="select * from projects_images_set where	projectid='".$eid."' $AndQry";	 
			$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
			$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
			$gettempcountitemQryRow=mysql_fetch_object($gettempcountitemQryRs);
			
			$TotProjectQry_main="SELECT picture from projects_images where 	imagesetid='".$gettempcountitemQryRow->imagesetid."' order by id desc";
			$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
			$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
			if($TotProject_main>0)
			{
				$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
				$Data.="<img src='onlinethumb.php?nm=ProjectViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
			}
			else
			{
				$Data.='<img src="images/images.jpg" width="548" height="330" />';
			}
		   return $Data;
		}
		else
		{
			$TotProjectQry_main="SELECT picture from projects_images where 		imagesetid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
			$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
			$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
			if($TotProject_main>0)
			{
				$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
				$Data.="<img src='onlinethumb.php?nm=ProjectViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
			}
			else
			{
				$Data.='<img src="images/images.jpg" width="548" height="330" />';
			}
		    return $Data;
		}  
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}
///////////////////End LoadAnotherViewMainImage
if($_REQUEST["Type"]=="LoadCountry_States")
{
	function validate($CountryName,$statefieldname)
	{
		$sql1="select id_country from country where country_name='".$CountryName."'";
		$rs1=mysql_query($sql1);
		$rrow=mysql_fetch_array($rs1);
		
		
		$sql="select * from state where id_country='".$rrow['id_country']."' order by 	state_name";
		$rs=mysql_query($sql);
		$tot=mysql_affected_rows();
		
		$Data='<select name="'.$statefieldname.'" id="'.$statefieldname.'" style="width:296px;">';
		if($tot)
		{
			$Data.="<option value=''>Select</option>";
			for($w=0;$w<$tot;$w++)
			{
				$aj=mysql_fetch_object($rs);
				$id=$aj->state_name;
				$name=stripslashes(htmlentities($aj->state_name));
				$Data.="<option value='".$id."'>".$name."</option>";
			}
		}
		else
		{
				$Data.="<option>No Record</option>";
		}
		return $Data;
	}
	echo validate(trim($_REQUEST['CountryName']),trim($_REQUEST['statefieldname']));
}

///////////////////
if($_REQUEST["Type"]=="LoadClassifiedImage")
{
	function validate()
	{	
		$Data='<table width="20" border="0" cellspacing="2" cellpadding="2">';
		
		$TotProjectQry="SELECT * from classifieds_picture_temp where sessionid='".$_SESSION['SESSION_CURRENTCLASSIFIED']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject>0)
		{
			for($PJ=0;$PJ<$TotProject;$PJ++)
			{
				$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
				if($PJ%5==0)
				{
					$Data.="</tr><tr>";
				}
				$Data.=' <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">';
						if($TotProjectQryRow->picture!=""){
							$Data.="<tr><td><img src='onlinethumb.php?nm=../ClassifiedImages/".$TotProjectQryRow->picture."&mwidth=150&mheight=150' border='0'></td></tr>";
						} else {
							$Data.='<tr><td><img src="../images/noimage.jpg" border="0"  width="150" height="150"></td></tr>';
						}
						if($TotProjectQryRow->caption!="")
						{
							$Data.='<tr><td align="center">'.stripslashes($TotProjectQryRow->caption).'</td></tr>';
						}
				$Data.="</table></td>";
			}	
		}		
	  $Data.="</table>";				  
	  return $Data;
	}
	echo validate();
}
///////////////////LoadAnotherViewImages
if($_REQUEST["Type"]=="LoadClassifiedImage_EDIT")
{
	function validate($cid)
	{	
		$Data='<table width="20" border="0" cellspacing="2" cellpadding="2">';
		
		 $TotProjectQry="SELECT * from classifieds_picture where cid='".$cid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject>0)
		{
			for($PJ=0;$PJ<$TotProject;$PJ++)
			{
				$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
				if($PJ%7==0)
				{
					$Data.="</tr><tr>";
				}
				$Data.=' <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">';
						if($TotProjectQryRow->picture!=""){
							$Data.="<tr><td><img src='onlinethumb.php?nm=../ClassifiedImages/".$TotProjectQryRow->picture."&mwidth=150&mheight=150' border='0'></td></tr>";
						} else {
							$Data.='<tr><td><img src="../images/noimage.jpg" border="0"  width="150" height="150"></td></tr>';
						}
						if($TotProjectQryRow->caption!="")
						{
							$Data.='<tr><td align="center">'.stripslashes($TotProjectQryRow->caption).'</td></tr>';
						}
				$Data.="</table></td>";
			}	
		}		
	  $Data.="</table>";				  
	  return $Data;
	}
	echo validate(trim($_REQUEST['cid']));
}

//////////////////Artist Signup User Name Checking
if($_REQUEST["Type"]=="SaveProjectImageSet")
{
	function validate($imagetitle,$description,$size,$price,$backgroundcolor,$fonts,$comments)
	{
		$SE="SELECT id FROM users where email='".addslashes($name)."' and password='".$password."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		$SERow=mysql_fetch_object($SERs);
		
		$TotProjectQry="SELECT picture from projects_images_temp where sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Image Title")
		{
			return 'Please Enter Image Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="INSERT INTO projects_images_set_temp SET
						main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."',
						sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."',
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						size='".addslashes($size)."',
						price='".addslashes($price)."',
						backgroundcolor='".addslashes($backgroundcolor)."',
						font='".addslashes($fonts)."',
						comments='".addslashes($comments)."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['size']),trim($_REQUEST['price']),trim($_REQUEST['backgroundcolor']),trim($_REQUEST['fonts']),trim($_REQUEST['comments']));
}

//////////////////Artist Signup User Name Checking
if($_REQUEST["Type"]=="SaveProjectImageSet_Edit")
{
	function validate($imagetitle,$description,$size,$price,$backgroundcolor,$fonts,$comments,$Iid)
	{
		$Iid=GetName1("projects_images_set","imagesetid","id",$Iid);	
		$TotProjectQry="SELECT picture from projects_images where imagesetid='".$Iid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Image Title")
		{
			return 'Please Enter Image Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="UPDATE projects_images_set SET
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						size='".addslashes($size)."',
						price='".addslashes($price)."',
						backgroundcolor='".addslashes($backgroundcolor)."',
						font='".addslashes($fonts)."',
						comments='".addslashes($comments)."' where imagesetid=".$Iid."";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			//$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['size']),trim($_REQUEST['price']),trim($_REQUEST['backgroundcolor']),trim($_REQUEST['fonts']),trim($_REQUEST['comments']),trim($_REQUEST['Iid']));
}

//////////////////Artist Signup User Name Checking
if($_REQUEST["Type"]=="SaveProjectImageSet_Edit2")
{
	function validate($imagetitle,$description,$size,$price,$backgroundcolor,$fonts,$comments,$eid,$Iid)
	{
		$TotProjectQry="SELECT picture from projects_images where imagesetid='".$Iid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Image Title")
		{
			return 'Please Enter Image Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="INSERT INTO projects_images_set SET
						projectid='".addslashes($eid)."',
						imagesetid='".addslashes($Iid)."',
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						size='".addslashes($size)."',
						price='".addslashes($price)."',
						backgroundcolor='".addslashes($backgroundcolor)."',
						font='".addslashes($fonts)."',
						comments='".addslashes($comments)."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['size']),trim($_REQUEST['price']),trim($_REQUEST['backgroundcolor']),trim($_REQUEST['fonts']),trim($_REQUEST['comments']),trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}

///////////SendToFriend Validation//////////
if($_REQUEST["Type"]=="SendToFriend")
{
	function validate($fname,$femail,$yname,$yemail,$message,$pid)
	{
		global $SITE_URL;
		global $SITENAME;
		if($femail == '')
		{
			return 'Please Enter Friend\'s email address';
		} 
		else
		{
			$subject_mail="$yname has recommended about project on localguild.com.";
			if ($message<>'')
			{
				$message=stripslashes($message);
				$GetMessage="<strong>$yname added the following message:</strong><br>$message";
			}
			$mailcontent="<html>
	  					   <head>
							</head>
							  <body><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr> <td height=\"40\" colspan=2 align=\"left\" valign=\"top\"> <a href='$SITE_URL'  target='_blank'><img src='$SITE_URL/images/logo.jpg' border='0'></a></td></tr>
							  <tr><td>&nbsp; <Br></td></tr>
									<tr><td>Hi $fname,<Br></td></tr>
									<tr><td>$yname visited the $SITENAME web site ($SITE_URL) and wanted you to have a look at the project.<Br><Br></td></tr>
									<tr><td>You can check out this project yourself by clicking on the following link:<Br></td></tr>
									<tr><td><a href='$SITE_URL/project-detail.php?pid=$pid'>$SITE_URL/project-detail.php?pid=$pid</a><Br><Br><Br></td></tr>
									
									<tr><td>$GetMessage<Br></td></tr>
									<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
									<tr><td>
								 </td></tr>
								</table></body></html>";
								//echo $mailcontent; 
								HtmlMailSend($femail,$subject_mail,$mailcontent,$yemail);
								
			return 	"Sent";			
		}
	}
	echo validate(trim($_REQUEST['fname']),trim($_REQUEST['femail']),trim($_REQUEST['yname']),trim($_REQUEST['yemail']),trim($_REQUEST['message']),trim($_REQUEST['pid']));
}
///////////End of SendToFriend Validation//////////

if($_REQUEST["Type"]=="AddToFavourite")
{
	function validate($pid,$userid)
	{	
		if($userid=="")
		{
			return "NotLoggedin";	
		}
		else
		{
			$TotProjectQry_main1="SELECT  id from projects where id='".$pid."' and userid='".$userid."'";
			$TotProjectQryRs_main1=mysql_query($TotProjectQry_main1);
			$TotProject_main1=mysql_num_rows($TotProjectQryRs_main1);
			
			if($TotProject_main1>0)
			{
				return "OWN";
			}
			else
			{
				$SE="SELECT * FROM favouritelist where pid='".$pid."' and userid='".$userid."'";
				$SERs=mysql_query($SE);
				$TOT=mysql_num_rows($SERs);
				if($TOT>0)
				{
					return "Alreadyadded";
				} 
				else
				{
					$InsertNewsletterQry="INSERT INTO favouritelist set pid='".$pid."',userid='".$userid."'";
					$InsertNewsletterQryRs=mysql_query($InsertNewsletterQry);
					return "Added";
				}
			}	
		}		
	}
	echo validate(trim($_REQUEST['pid']),trim($_REQUEST['userid']));
}

if($_REQUEST["Type"]=="SendMessage")
{
	function validate($emailto,$subject,$message,$userid)
	{	
		global $INFO_MAIL;
		if($userid=="")
		{
			return "NotLoggedin";	
		}
		else
		{
				$Error="NO";
				$emailto_arr=explode(",",$emailto);
				for($i=0;$i<count($emailto_arr);$i++)
				{
					$emailto_arr[$i]=trim($emailto_arr[$i]);
					if ($emailto_arr[$i]<>'')
					{
						$select_email=mysql_query("select id,email from users where email='".$emailto_arr[$i]."'");
						$tot_rec=mysql_num_rows($select_email);	
						$fetch_user=mysql_fetch_object($select_email);
						$hide_user=$fetch_user->id;
						if ($hide_user==$userid)
						{
							$Error="YES";
							return 'OWN';	
						}	
						if($tot_rec<=0 && $emailto<>'')
						{
							$Error="YES";
							return "You can't send mail to this user. This user, $emailto_arr[$i], is not a member.";	
						}	
					}	
				}	
				 $userid=$_SESSION['UsErIdAdMiN'];
				 if($Error=="NO")
				 {
					$dt=date("Y-m-d H:i:s");		
					for($i1=0;$i1<count($emailto_arr);$i1++)
					{	
						$email_chk=$emailto_arr[$i1];	
						if ($email_chk<>'')	
						{		
							$select_email1=mysql_query("select id,email,fname,notification from users where email='$email_chk'");
							$tot_rec1=mysql_num_rows($select_email1);	
							if($tot_rec1>0)
							{
									$fetch_user1=mysql_fetch_object($select_email1);
									$hide_user1=$fetch_user1->id;
									$insert_trade=mysql_query("INSERT INTO dcmail (userid,senderid,subject,message,senddate) VALUES
										('$hide_user1','$userid','".addslashes($subject)."','".addslashes($message)."','$dt')");
											
											if(in_array(3,explode(",",$fetch_user1->notification))==3)
											{
												//////Email notification options//
												//////////////////MAIL SENDING
												$select_email13=mysql_query("select fname from users where id='$userid'");
												$tot_rec13=mysql_num_rows($select_email13);	
												$fetch_user13=mysql_fetch_object($select_email13);
												$SENDERNAME=stripslashes($fetch_user13->fname);
												
												$subject1="Local Guild - ".$SENDERNAME." left a new message!";
												$from1=$INFO_MAIL;
												$to1=$fetch_user1->email;
												$mailcontent1="
												<html>
													<body>
														<table cellpadding=\"1\" cellspacing=\"1\">
															<tr>
																<Td align=\"left\" colspan=\"2\">Dear ".stripslashes($fetch_user1->fname).",</td>
															</tr>
															<tr>
																<Td align=\"left\" colspan=\"2\">&nbsp;</td>
															</tr>
															<tr>
																<Td align=\"left\" colspan=\"2\">Message:<br>".$message."</td>
															</tr>
															<tr>
																<Td align=\"left\" colspan=\"2\">&nbsp;</td>
															</tr>
															<tr>
																<Td align=\"left\" colspan=\"2\">Best,<br>The Local Guild Team,<br><a href='$SITE_URL'>$SITE_URL</a><br>Quality, Creativity, Materials. Right Next Door.</td>
															</tr>
													</table>
													</body>
												</html>";
												//echo $mailcontent1;
												//exit;
												if($_SERVER['HTTP_HOST']!="plus")
												{
													HtmlMailSend($to1,$subject1,$mailcontent1,$from1);
												}	
												///////////////////////////////
												//////Email notification options//	
											}	
								}				
						}
					}
					return "SENT";
				 }
				
		}		
	}
	echo validate(trim($_REQUEST['emailto']),$_REQUEST['subject'],$_REQUEST['message'],trim($_REQUEST['userid']));
}

///////////////////Load Event Drpdown
if($_REQUEST["Type"]=="SLoadEventDrpdown_Month")
{
	function validate22($day,$month,$year)
	{	
		$Data='<select name="startmonth" id="startmonth" class="input_text">'.getMonth_new($month).'</select>';				  
		 return $Data;
	}
	echo validate22(trim($_REQUEST['day']),trim($_REQUEST['month']),trim($_REQUEST['year']));
}
if($_REQUEST["Type"]=="SLoadEventDrpdown_Day")
{
	function validate222($day,$month,$year)
	{	
		$Data='<select name="startday" id="startday" class="input_text">'.getDay_new($day).'</select>';				  
		 return $Data;
	}
	echo validate222(trim($_REQUEST['day']),trim($_REQUEST['month']),trim($_REQUEST['year']));
}
if($_REQUEST["Type"]=="ELoadEventDrpdown_Month")
{
	function validate2222($day,$month,$year)
	{	
		$curdate1111=$year."-".$month."-".$day;//gmdate("Y-m-d");
		$mmonths=1;
		$SelectExpiredDate1="SELECT DATE_ADD(\"$curdate1111\", INTERVAL \"$mmonths\" DAY) as uppdate";
		$SelectExpiredDate1Rs=mysql_query($SelectExpiredDate1);
		$srow=mysql_fetch_object($SelectExpiredDate1Rs);
		$Nextdate=explode("-",$srow->uppdate);
		
		$Data='<select name="endmonth" id="endmonth" class="input_text">'.getMonth_new($Nextdate[1]).'</select>';				  
		 return $Data;
	}
	echo validate2222(trim($_REQUEST['day']),trim($_REQUEST['month']),trim($_REQUEST['year']));
}
if($_REQUEST["Type"]=="ELoadEventDrpdown_Day")
{
	function validate22222($day,$month,$year)
	{	
		$curdate1111=$year."-".$month."-".$day;//gmdate("Y-m-d");
		$mmonths=1;
		$SelectExpiredDate1="SELECT DATE_ADD(\"$curdate1111\", INTERVAL \"$mmonths\" DAY) as uppdate";
		$SelectExpiredDate1Rs=mysql_query($SelectExpiredDate1);
		$srow=mysql_fetch_object($SelectExpiredDate1Rs);
		$Nextdate=explode("-",$srow->uppdate);
		
		$Data='<select name="endday" id="endday" class="input_text">'.getDay_new($Nextdate[2]).'</select>';				  
		 return $Data;
	}
	echo validate22222(trim($_REQUEST['day']),trim($_REQUEST['month']),trim($_REQUEST['year']));
}

///////////////////LoadAnotherViewMainImage
if($_REQUEST["Type"]=="LoadProfilePicture")
{
	function validate()
	{	
		$TotProjectQry_main="SELECT  photo from users where id='".$_SESSION['UsErIdAdMiN']."'";
		$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
		$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
		if($TotProject_main>0)
		{
			$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
			if($TotProjectQryRow_main->photo!='' && file_exists("User_Photo/".$TotProjectQryRow_main->photo.""))
			{
				$Data.="<img src='onlinethumb.php?nm=User_Photo/".$TotProjectQryRow_main->photo."&mwidth=185&mheight=185' border='0'  style='cursor:pointer;'>";
			}	
			else
			{
				$Data.='<img src="images/images.jpg" width="185" height="185" />';
			}
		}
		else
		{
			$Data.='<img src="images/images.jpg" width="185" height="185" />';
		}
	  return $Data;
	}
	echo validate();
}
///////////////////LoadAnotherViewMainImage
if($_REQUEST["Type"]=="LoadProfileVideo")
{
	function validate()
	{	
		$GetUserQryRs=mysql_query("select video from users where id='".$_SESSION['UsErIdAdMiN']."'");
		$TotGetUserQry=mysql_num_rows($GetUserQryRs);
		$GetUserQryRow=mysql_fetch_object($GetUserQryRs); 
		if($GetUserQryRow->video!='')
		{
	  		
			$ExtArry=explode(".",$GetUserQryRow->video);
			$TotExtArry=count($ExtArry);
			$OnlyFileName="";
			for($fff=0;$fff<($TotExtArry-1);$fff++)
			{
				$OnlyFileName.=$ExtArry[$fff];
			}	
		   if(file_exists("User_Video/".$OnlyFileName.".flv")) 
		   {
				$Data.='<embed type="application/x-shockwave-flash" src="Flashfiles/mediaplayer.swf" id="mediaplayer" name="mediaplayer" quality="high" allowfullscreen="true" flashvars="width=185&amp;height=185&amp;file=../User_Video/'.$OnlyFileName.".flv".'&amp;image=../User_Video/'.$OnlyFileName.".flv".'&amp;autostart=true" height="185" width="185">

					<script type="text/javascript">
						var s1 = new SWFObject("Flashfiles/mediaplayer.swf","mediaplayer","185","185","7");
						s1.addParam("allowfullscreen","true");
						s1.addVariable("width","185");
						s1.addVariable("height","185");
						s1.addVariable("file","User_Video/'.$OnlyFileName.".flv".'");
						s1.addVariable("image","User_Video/'.$OnlyFileName.".flv".'");
						s1.addVariable("autostart","true");
						s1.write("player99");
					</script>';	
			}
			else if($ExtArry[$TotExtArry-1]=="flv")
			{
				if(file_exists("User_Video/".$GetUserQryRow->video) && $GetUserQryRow->video!="") 
				{
					$Data.='<embed type="application/x-shockwave-flash" src="Flashfiles/mediaplayer.swf" id="mediaplayer" name="mediaplayer" quality="high" allowfullscreen="true" flashvars="width=185&amp;height=185&amp;file=../User_Video/'.$GetUserQryRow->video.'&amp;image=../User_Video/'.$GetUserQryRow->video.'&amp;autostart=true" height="185" width="185">
	
							<script type="text/javascript">
								var s1 = new SWFObject("Flashfiles/mediaplayer.swf","mediaplayer","185","185","7");
								s1.addParam("allowfullscreen","true");
								s1.addVariable("width","185");
								s1.addVariable("height","185");
								s1.addVariable("file","User_Video/'.$GetUserQryRow->video.'");
								s1.addVariable("image","User_Video/'.$GetUserQryRow->video.'");
								s1.addVariable("autostart","true");
								s1.write("player99");
							</script>';	
				}
				else
				{
					 $Data.='Video not available';
				}
			}
			else
			{ 
					$Data.='<embed src="User_Video/'.$GetUserQryRow->video.'" autostart="true" width="185" height="185" />';
			}
		}	
		else
		{
			$Data="";
		}		
	    return $Data;
	}
	echo validate();
}
///////////////////SaveRating
if($_REQUEST["Type"]=="SaveRating")
{
	function validate($pid,$userid,$rateid)
	{	
		$TotProjectQry_main1="SELECT  id from projects where userid='$userid' and id='".$pid."'";
		$TotProjectQryRs_main1=mysql_query($TotProjectQry_main1);
		$TotProject_main1=mysql_num_rows($TotProjectQryRs_main1);
		
		$TotProjectQry_main="SELECT  * from rating where userid='$userid' and pid='".$pid."'";
		$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
		$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
		
		if($TotProject_main1>0)
		{
			$Data.='You can\'t rate your own project';
		}
		else if($TotProject_main>0)
		{
			$Data.='You have already rated';
		}
		else
		{
			$AddUserQry="INSERT INTO rating SET
						userid ='".$userid."',
						rateid='".$rateid."',
						pid='".$pid."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			
			 if($_SESSION['UsErIdAdMiN']!='')
			  {
					$TotProjectQry_main="SELECT  * from rating where userid='".$_SESSION['UsErIdAdMiN']."' and pid='".$_REQUEST['pid']."'";
					$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
					$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
					if($TotProject_main>0)
					{
						
								$Data.='<div id="rateMe">';
								   $cntres=mysql_query("SELECT avg(rateid) as average from rating where pid='".$_REQUEST['pid']."'");
								   $cntrow=mysql_fetch_array($cntres);
								   $average=ceil($cntrow['average']);
								   for($a=1;$a<=5;$a++) 
								   { 
								   		 if($average>=$a) 
										   {
										
												$Data.="<a onClick=\"document.getElementById('Ratemessageid').innerHTML='&nbsp;&nbsp;You have already rated';\" onmouseover=\"document.getElementById('Ratemessageid').innerHTML='&nbsp;&nbsp;You have already rated';\" onmouseout=\"document.getElementById('Ratemessageid').innerHTML='&nbsp;';\" class='on' id='_".$a."'  style='cursor:pointer;' ></a>";
										 } 
										   else
										   {
										
												$Data.="<a onClick=\"document.getElementById('Ratemessageid').innerHTML='&nbsp;&nbsp;You have already rated';\" onmouseover=\"document.getElementById('Ratemessageid').innerHTML='&nbsp;&nbsp;You have already rated';\" onmouseout=\"document.getElementById('Ratemessageid').innerHTML='&nbsp;';\"  id='_".$a."'  style='cursor:pointer;' ></a>";
										 } 
								 } 
								$Data.='</div>
								<span id="Ratemessageid" class="redmessagetext"><span id="Ratemessageid2" class="redmessagetext"></span></span>';
						
					}
					else
					{
			  
						$Data.='<span id="rateStatus" style="display:none">Rate Me : </span>
						<form name="frmReview" action="" method="post">
						<input type="hidden" name="pid" id="pid" value="'.$_REQUEST['pid'].'" />
						<input type="hidden" name="userid" id="userid" value="'.$_SESSION['UsErIdAdMiN'].'" />
							<div id="rateMe">';
							 $cntres=mysql_query("SELECT avg(rateid) as average from rating where pid='".$_REQUEST['pid']."'");
							   $cntrow=mysql_fetch_array($cntres);
							   $average=ceil($cntrow['average']);
							 for($a=1;$a<=5;$a++) 
							   { 
							   			 if($average>=$a) 
									   {
									
											$Data.="<a onClick=\"rateIt(".$a.");SaveRating('SaveRating_ID',document.getElementById('pid').value,document.getElementById('userid').value,document.getElementById('txtrating').value);\" class=\"on\" id=\"_".$a."\" onMouseOver=\"rating(".$a.")\" onMouseOut=\"off(this)\"  style=\"cursor:pointer;\" ></a>";
									 } 
									   else
									   {
									
											$Data.="<a onClick=\"rateIt(".$a.");SaveRating('SaveRating_ID',document.getElementById('pid').value,document.getElementById('userid').value,document.getElementById('txtrating').value);\"  id=\"_".$a."\" onMouseOver=\"rating(".$a.")\" onMouseOut=\"off(this)\"  style=\"cursor:pointer;\" ></a>";
									  } 
							 } 
							$Data.='</div>
							<input type="hidden" name="txtrating" id="txtrating" />
							<span id="SaveRating_ID" class="redmessagetext"></span>
						</form>';	
					 }
			 }else{ 
				$Data.='<div id="rateMe">
				<a onClick="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseover="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';"  onmouseout="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;\';" id="_1" style="cursor:pointer;" ></a>
				<a onClick="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseover="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseout="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;\';"  id="_2"  style="cursor:pointer;" ></a>
				<a onClick="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseover="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';"  onmouseout="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;\';" id="_3" style="cursor:pointer;"  ></a>
				<a onClick="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseover="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseout="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;\';"  id="_4" style="cursor:pointer;"  ></a>
				<a onClick="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';" onmouseover="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;&nbsp;Login to rate\';"  onmouseout="document.getElementById(\'Ratemessageid\').innerHTML=\'&nbsp;\';" id="_5"  style="cursor:pointer;" ></a>
				<span id="Ratemessageid" class="redmessagetext"></span><span id="Ratemessageid2" class="redmessagetext"></span></div>';
				
			 }
		}
	  return $Data;
	}
	echo validate(trim($_REQUEST['pid']),trim($_REQUEST['userid']),trim($_REQUEST['rateid']));
}

///////////SendToFriend Validation//////////
if($_REQUEST["Type"]=="SendComment")
{
	function validate($comment,$pid,$ProjectUserId)
	{
		global $SITE_URL;
		global $SITENAME;
		global $INFO_MAIL;
		if($_SESSION['UsErIdAdMiN']=="")
		{
			return "NotLoggedin";
		}
		else if($_SESSION['UsErIdAdMiN']==$ProjectUserId)
		{
			return "OWN";
		}
		else if($comment == '')
		{
			return 'Please enter comment';
		} 
		else
		{
			$AddUserQry="INSERT INTO comments SET
						userid ='".$_SESSION['UsErIdAdMiN']."',
						comment='".addslashes($comment)."',
						pid='".addslashes($pid)."',
						commenton=now()";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			///session user
			$select_email5=mysql_query("select id,email,fname from users where id='".$_SESSION['UsErIdAdMiN']."'");
			$tot_rec5=mysql_num_rows($select_email5);	
			$fetch_user5=mysql_fetch_object($select_email5);
			
			//project user
			$select_email=mysql_query("select id,email,fname,notification from users where id='".$ProjectUserId."'");
			$tot_rec=mysql_num_rows($select_email);	
			$fetch_user=mysql_fetch_object($select_email);
			
			//project detail
			$select_email6=mysql_query("select projecttitle from projects where id='".$pid."'");
			$tot_rec6=mysql_num_rows($select_email6);	
			$fetch_user6=mysql_fetch_object($select_email6);
			if($fetch_user6->projecttitle!=""){$projecttitle=stripslashes($fetch_user6->projecttitle);}
			
			if(in_array(5,explode(",",$fetch_user->notification))==5)
			{
				//////Email notification options//
				//////////////////MAIL SENDING
				$subject1="Local Guild - ".$fetch_user5->fname." left a comment on project titled ".$projecttitle."!";
				$from1=$INFO_MAIL;
				$to1=$fetch_user->email;
				$mailcontent1="
				<html>
					<body>
						<table cellpadding=\"1\" cellspacing=\"1\">
							<tr>
								<Td align=\"left\" colspan=\"2\">Dear ".stripslashes($fetch_user->fname).",</td>
							</tr>
							<tr>
								<Td align=\"left\" colspan=\"2\">&nbsp;</td>
							</tr>
							<tr>
								<Td align=\"left\" colspan=\"2\">A new comment has been sent by ".$fetch_user5->fname." on project titled ".$projecttitle."</td>
							</tr>
							<tr>
								<Td align=\"left\" colspan=\"2\">Comment:<br>".$comment."</td>
							</tr>
							<tr>
								<Td align=\"left\" colspan=\"2\">&nbsp;</td>
							</tr>
							<tr>
								<Td align=\"left\" colspan=\"2\">Best,<br>The Local Guild Team,<br><a href='$SITE_URL'>$SITE_URL</a><br>Quality, Creativity, Materials. Right Next Door.</td>
							</tr>
					</table>
					</body>
				</html>";
				//echo $mailcontent1;
				//exit;
				if($_SERVER['HTTP_HOST']!="plus")
				{
					HtmlMailSend($to1,$subject1,$mailcontent1,$from1);
				}	
				///////////////////////////////
				//////Email notification options//	
			}
								
			return 	"Sent";			
		}
	}
	echo validate(trim($_REQUEST['comment']),trim($_REQUEST['pid']),trim($_REQUEST['ProjectUserId']));
}

if($_REQUEST["Type"]=="SendProjectNote")
{
	function validate($notes,$pid,$sentby)
	{
		global $SITE_URL;
		global $SITENAME;
		global $INFO_MAIL;
		if($_SESSION['UsErIdAdMiN']=="")
		{
			return "NotLoggedin";
		}
		else if($_SESSION['UsErIdAdMiN']==$sentby)
		{
			return "OWN";
		}
		else if($notes == '')
		{
			return 'Please enter note';
		} 
		else
		{
			$SE="SELECT * FROM favouritelist where pid='".$pid."' and userid='".$_SESSION['UsErIdAdMiN']."'";
			$SERs=mysql_query($SE);
			$TOT=mysql_num_rows($SERs);
			if($TOT>0)
			{
				return "Alreadyadded";
			} 
			else
			{
				$InsertNewsletterQry="INSERT INTO favouritelist set pid='".$pid."',userid='".$_SESSION['UsErIdAdMiN']."'";
				$InsertNewsletterQryRs=mysql_query($InsertNewsletterQry);
				
				$AddUserQry="INSERT INTO projects_notes SET
						sentby ='".$_SESSION['UsErIdAdMiN']."',
						notes='".addslashes($notes)."',
						pid='".addslashes($pid)."',
						notedate=now()";	 
				$AddUserQryRs=mysql_query($AddUserQry);
				
				return "Added";
			}
		}
	}
	echo validate(trim($_REQUEST['notes']),trim($_REQUEST['pid']),trim($_REQUEST['sentby']));
}

if($_REQUEST["Type"]=="LoadUsersComments")
{
	function validate($userid)
	{
		$SE="SELECT  users.fname,users.lname,comments.id,comments.comment,comments.commenton,comments.userid as commentbyuserid FROM `projects`
				inner join comments on projects.id=comments.pid
				left outer join users on users.id=comments.userid
				WHERE  projects.userid='".$userid."' order by commenton desc";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($TOT>0)
		{
			$Data.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			for($T=0;$T<$TOT;$T++)
			{
				$FOBJ=mysql_fetch_object($SERs);
				$Data.='<tr>
							<td align="left" valign="top" class="textblack14">'.nl2br(stripslashes($FOBJ->comment)).'</td>
						</tr>
						<tr>
							<td align="left" valign="top"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.stripslashes($FOBJ->fname).' '.stripslashes($FOBJ->lname).'</a>&nbsp;&nbsp;(<a href="#" onclick="DelLoadUsersComments('.stripslashes($FOBJ->id).','.stripslashes($userid).')" class="link_tom">remove</a>)</td>
						</tr>
						<tr>
						  <td style="height:15px;" class="bottom-bdrgrey"></td>
						</tr>
						<tr>
							<td style="height:10px;" align="left" valign="top" ></td>
						</tr>';
						
			}  
			$Data.='</table>';
		}
		else
		{
			$Data.='<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center" valign="middle" height="150" class="redmessagetext">No Comments.</td>
					  </tr>
					</table>';
		}
		return $Data;
	}
	echo validate(trim($_REQUEST['userid']));
}

if($_REQUEST["Type"]=="DelLoadUsersComments")
{
	function validate($delid)
	{
		$del=mysql_query("DELETE FROM comments where id='".$delid."'");
		return "true";
	}
	echo validate(trim($_REQUEST['delid']));
}


if($_REQUEST["Type"]=="LoadUsersCommentsPublic")
{
	function validate($userid)
	{
		$SE="SELECT  users.fname,users.lname,comments.id,comments.comment,comments.commenton,comments.userid as commentbyuserid,projects.projecttitle,projects.id as Projectid,users.photo  FROM `projects`
				inner join comments on projects.id=comments.pid
				left outer join users on users.id=comments.userid
				WHERE  projects.userid='".$userid."' order by commenton desc";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($TOT>0)
		{
			$Data.=' <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">';
			for($T=0;$T<$TOT;$T++)
			{
				$FOBJ=mysql_fetch_object($SERs);
				if($FOBJ->photo!=""){
					$IMG="<img src='onlinethumb.php?nm=User_Photo/".$FOBJ->photo."&mwidth=52&mheight=52' border='0'>";
				} else {
					$IMG='<img src="images/noimage.jpg" border="0"  width="52" height="52">';
				}
				$date_show        = date('l, F d', strtotime($FOBJ->commenton));
				$date_compare    = date('Y-m-d', strtotime($FOBJ->commenton));
				$date_today       = date("Y-m-d");
				$date_yesterday = date("Y-m-d", strtotime("-1 day"));
				if ($date_compare == $date_today) {
					$DTT='Today';
				}else if ($date_compare == $date_yesterday) {
					$DTT= 'Yesterday';
				}else {
					$DTT= $date_show;
				}
				if($TMPP!=$DTT)
				{
				$Data.='<tr>
						  <td height="35" class="txt-grey11" align="left">'.strtoupper($DTT).'</td>
						</tr>';
				}		
				$Data.='<tr>
						  <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
							  <tr>
								  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="18%" align="left" valign="top"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.$IMG.'</a></td>
										<td width="82%" align="left" valign="top" class="textblack14"><span class="textgreen14"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.stripslashes($FOBJ->fname).' , '.stripslashes($FOBJ->lname).'</a></span> commented on <span class="link_tom"><a href="project-detail.php?pid='.stripslashes($FOBJ->Projectid).'" class="link_tom">your portfolio '.stripslashes($FOBJ->projecttitle).' :</a></span>&nbsp;'.nl2br(stripslashes($FOBJ->comment)).' <span class="textgreen14"></span></td>
									  </tr>
									</table></td>
								</tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table></td>
						</tr>';
				$TMPP=$DTT;		
			}  
			$Data.='</table>';
		}
		else
		{
			$Data.='<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center" valign="middle" height="150" class="redmessagetext">No New Updates.</td>
					  </tr>
					</table>';
		}
		return $Data;
	}
	echo validate(trim($_REQUEST['userid']));
}

if($_REQUEST["Type"]=="LoadProjectItemdetail")
{
	function validate($id,$imagesetid)
	{
		$isql = " SELECT * from projects_images_set 
					where projects_images_set.imagesetid='".$imagesetid."'";
		$ires = mysql_query($isql);
		$Tottttt=mysql_affected_rows();
		if($Tottttt>0)
		{
			$iresrow=mysql_fetch_object($ires); 
			$FinalText.=stripslashes($iresrow->imagetitle)."##########";
			$FinalText.=stripslashes($iresrow->description)."##########";
			$FinalText.=stripslashes($iresrow->size)."##########";
			$FinalText.=stripslashes($iresrow->price)."##########";
			$FinalText.=stripslashes($iresrow->comments)."##########";
		}
		
		$isql1 = " SELECT picture from projects_images 
					where projects_images.id='".$id."'";
		$ires1 = mysql_query($isql1);
		$Tottttt1=mysql_affected_rows();
		if($Tottttt1>0)
		{
			$iresrow1=mysql_fetch_object($ires1); 
			$FinalText.=stripslashes($iresrow1->picture)."##########";
		}
		
	   $cntres2=mysql_query("SELECT count(*) as totvote from  likeit where  iid='".$iresrow->id."'");
	   $cntrow2=mysql_fetch_array($cntres2);
	   $totvote=$cntrow2['totvote'];
	   $FinalText.=$totvote."##########";
		
		return $FinalText;
	}
	echo validate(trim($_REQUEST['id']),trim($_REQUEST['imagesetid']));
}


if($_REQUEST["Type"]=="SendConnectRequest")
{
	function validate($to,$from)
	{	
		global $INFO_MAIL;
		if($from=="")
		{
			return "NotLoggedin";	
		}
		else
		{
			$getqryrs=mysql_query("select * from friends where (userid=".$from." and friendid =".$to.") and status!='REJECT'");
			$tot=mysql_affected_rows();
			if($tot>0)
			{
				return "Already";	
			}
			else
			{
				$getqryrs=mysql_query("select * from friends where (userid=".$from." and friendid =".$to.") and status!='APPROVED'");
				$tot=mysql_affected_rows();
				if($tot>0)
				{
					$insert_trade2=mysql_query("UPDATE friends set status='PENDING' where userid=".$from." and friendid =".$to." ");	
					return "SENT";	
				}
				else
				{
					$dt=date("Y-m-d H:i:s");		
				
					$select_email=mysql_query("select id,fname from users where id='".$from."'");
					$tot_rec=mysql_num_rows($select_email);	
					$fetch_user=mysql_fetch_object($select_email);
					$fname=stripslashes($fetch_user->fname);
					
					
					$select_email5=mysql_query("select id,fname,email,notification from users where id='".$to."'");
					$tot_rec5=mysql_num_rows($select_email5);	
					$fetch_user5=mysql_fetch_object($select_email5);
					
					$insert_trade=mysql_query("INSERT INTO dcmail (userid,senderid,subject,message,senddate,isfriendrequest,friendrequeststatus) VALUES
						('$to','$from','Connection Request','A new connection request from $fname','$dt','Y','PENDING')");	
						
					$insert_trade2=mysql_query("INSERT INTO friends (userid,friendid,status,senddate) VALUES
						('$from','$to','PENDING','$dt')");		
					
							if(in_array(4,explode(",",$fetch_user5->notification))==4)
							{
								//////Email notification options//
								//////////////////MAIL SENDING
								$subject1="Local Guild - ".$fname." left a connection request!";
								$from1=$INFO_MAIL;
								$to1=$fetch_user5->email;
								$mailcontent1="
								<html>
									<body>
										<table cellpadding=\"1\" cellspacing=\"1\">
											<tr>
												<Td align=\"left\" colspan=\"2\">Dear ".stripslashes($fetch_user5->fname).",</td>
											</tr>
											<tr>
												<Td align=\"left\" colspan=\"2\">&nbsp;</td>
											</tr>
											<tr>
												<Td align=\"left\" colspan=\"2\">A new connction request has been sent by ".$fname."</td>
											</tr>
											<tr>
												<Td align=\"left\" colspan=\"2\">&nbsp;</td>
											</tr>
											<tr>
												<Td align=\"left\" colspan=\"2\">Best,<br>The Local Guild Team,<br><a href='$SITE_URL'>$SITE_URL</a><br>Quality, Creativity, Materials. Right Next Door.</td>
											</tr>
									</table>
									</body>
								</html>";
								//echo $mailcontent1;
								//exit;
								if($_SERVER['HTTP_HOST']!="plus")
								{
									HtmlMailSend($to1,$subject1,$mailcontent1,$from1);
								}	
								///////////////////////////////
								//////Email notification options//	
							}		
									
					return "SENT";
				}
			}	
		}		
	}
	echo validate(trim($_REQUEST['to']),$_REQUEST['from']);
}

if($_REQUEST["Type"]=="LoadAnotherViewImages_SHOP")
{
	function validate()
	{	
		$Data='<table width="100%" border="0" cellspacing="3" cellpadding="1">';
		
		$gettempcountitemQry="select * from shop_images_set_temp where	main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."'";	 
		$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
		$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
		if($Totgettempcountitem>0)
		{
			$clsnm=" class='Buttonadd_new_itemWithImage'";
		}
		else
		{
			$clsnm=" class='Buttonadd_first_itemWithImage'";
		}
		
		
		$gettempcountitemQry2="select * from shop_images_temp where		sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."'";	 
		$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2	);
		$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
		if($Totgettempcountitem2>0)
		{
			$clsnm2=" class='Buttonadd_add_another_viewWithImage'";
		}
		else
		{
			$clsnm2=" class='Buttonadd_UploadimageWithImage'";
		}
		
		$TotProjectQry="SELECT picture from shop_images_temp where sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject>0)
		{
			for($PJ=0;$PJ<$TotProject;$PJ++)
			{
				$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
				if($PJ%4==0)
				{
					$Data.="</tr><tr>";
				}
					$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122>';
							if($TotProjectQryRow->picture!=""){
								$Data.="<img src='onlinethumb.php?nm=ShopViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
								//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
							} else {
								$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
							}
					$Data.="</td>";
					if($PJ==($TotProject-1))
					{
						if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
					$rrrr="addprojectview.php";
					$Data.="<td colspan='2' valign='top'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
										<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
									</td>
								  </tr>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet_SHOP(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
									</td>
								  </tr>
								</table>
							</td>";
						 } 	  
					 }   
				 }else{  	
				 	$Data.="<tr><td colspan='2' valign='top'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
										<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
									</td>
								  </tr>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet_SHOP(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
									</td>
								  </tr>
								</table>
							</td></tr>";
					 }		
	  $Data.="</table>";				  
	  return $Data;
	}
	echo validate();
}
if($_REQUEST["Type"]=="LoadAnotherViewMainImage_SHOP")
{
	function validate()
	{	
		$TotProjectQry_main="SELECT picture from shop_images_temp where 	sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
		$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
		if($TotProject_main>0)
		{
			$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
			$Data.="<img src='onlinethumb.php?nm=ShopViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
		}
		else
		{
			$Data.='<img src="images/images.jpg" width="548" height="330" />';
		}
	  return $Data;
	}
	echo validate();
}

if($_REQUEST["Type"]=="SaveProjectImageSet_SHOP")
{
	function validate($imagetitle,$description,$size,$price,$backgroundcolor,$fonts,$comments)
	{
		$SE="SELECT id FROM users where email='".addslashes($name)."' and password='".$password."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		$SERow=mysql_fetch_object($SERs);
		
		$TotProjectQry="SELECT picture from shop_images_temp where sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Image Title")
		{
			return 'Please Enter Image Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="INSERT INTO shop_images_set_temp SET
						main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."',
						sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."',
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						size='".addslashes($size)."',
						price='".addslashes($price)."',
						backgroundcolor='".addslashes($backgroundcolor)."',
						font='".addslashes($fonts)."',
						comments='".addslashes($comments)."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['size']),trim($_REQUEST['price']),trim($_REQUEST['backgroundcolor']),trim($_REQUEST['fonts']),trim($_REQUEST['comments']));
}

if($_REQUEST["Type"]=="IsShopcatAvailable")
{
	function validate($name)
	{
		$SE="SELECT * FROM shop_category where name='".addslashes($name)."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($name == '')
		{
			return 'Please Enter Shop Category Name';
		} 
		else if($TOT>0)
		{
			return 'Category Name already exists.';
		} 
		else
		{
			return "";	
		}
	}
	echo validate(trim($_REQUEST['name']));
}

if($_REQUEST["Type"]=="LoadShopItemdetail")
{
	function validate($id,$imagesetid)
	{
		$isql = " SELECT * from shop_images_set 
					where shop_images_set.imagesetid='".$imagesetid."'";
		$ires = mysql_query($isql);
		$Tottttt=mysql_affected_rows();
		if($Tottttt>0)
		{
			$iresrow=mysql_fetch_object($ires); 
			$FinalText.=stripslashes($iresrow->imagetitle)."##########";
			$FinalText.=stripslashes($iresrow->description)."##########";
			$FinalText.=stripslashes($iresrow->size)."##########";
			$FinalText.=stripslashes($iresrow->price)."##########";
			$FinalText.=stripslashes($iresrow->comments)."##########";
		}
		
		$isql1 = " SELECT picture from shop_images 
					where shop_images.id='".$id."'";
		$ires1 = mysql_query($isql1);
		$Tottttt1=mysql_affected_rows();
		if($Tottttt1>0)
		{
			$iresrow1=mysql_fetch_object($ires1); 
			$FinalText.=stripslashes($iresrow1->picture)."##########";
		}
		return $FinalText;
	}
	echo validate(trim($_REQUEST['id']),trim($_REQUEST['imagesetid']));
}

if($_REQUEST["Type"]=="LoadProjectAddDoneButton")
{
	function validate22()
	{	
		$gettempcountitemQry="select * from projects_images_set_temp where	main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."'";	 
		$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
		$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
		if($Totgettempcountitem>0)
		{
			$Data.="<tr>
						<td valign='top' style='padding-left:10px;' ><input type='button' name='SubmitFinish' id='SubmitFinish' class='ButtonDoneWithImage' value=''  onclick='return FrmChkProject();' style='cursor:pointer;'  title='Add Project'/></td>
					</tr>";
		}	
		else
		{
			$Data.="<tr>
						<td valign='top' style='padding-left:10px;' ></td>
					</tr>";
		}
	  return $Data;
	}
	echo validate22();
}
if($_REQUEST["Type"]=="LoadShopAddDoneButton")
{
	function validate22()
	{	
		$gettempcountitemQry="select * from shop_images_set_temp where	main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."'";	 
		$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
		$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
		if($Totgettempcountitem>0)
		{
			$Data.="<tr>
						<td valign='top' style='padding-left:10px;' ><input type='button' name='SubmitFinish' id='SubmitFinish' class='ButtonDoneWithImage' value=''  onclick='return FrmChkProject();' style='cursor:pointer;'  title='Add Project'/></td>
					</tr>";
		}	
		else
		{
			$Data.="<tr>
						<td valign='top' style='padding-left:10px;' ></td>
					</tr>";
		}
	  return $Data;
	}
	echo validate22();
}

if($_REQUEST["Type"]=="LoadAnotherViewImages_Edit_SHOP")
{
	function validate($eid,$Iid)
	{	
		$Data='<table width="100%" border="0" cellspacing="3" cellpadding="1">';
		if($Iid!="")
		{
						$AndQry="and shop_images_set.id='".mysql_real_escape_string($Iid)."'";
		
						$gettempcountitemQry="select * from shop_images_set where	projectid='".$eid."' $AndQry";	 
						$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
						$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
						if($Totgettempcountitem>0)
						{
							$clsnm=" class='ButtonSaveWithImage'";
						}
						else
						{
							$clsnm=" class='Buttonadd_first_itemWithImage'";
						}
						$gettempcountitemQryRow=mysql_fetch_object($gettempcountitemQryRs);
						
						$gettempcountitemQry2="select * from shop_images where	imagesetid='".$gettempcountitemQryRow->imagesetid."'";	 
						$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2);
						$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
						if($Totgettempcountitem2>0)
						{
							$clsnm2=" class='Buttonadd_add_another_viewWithImage'";
						}
						else
						{
							$clsnm2=" class='Buttonadd_UploadimageWithImage'";
						}
						
						$TotProjectQry="SELECT picture,id from shop_images where imagesetid='".$gettempcountitemQryRow->imagesetid."' order by id desc";
						$TotProjectQryRs=mysql_query($TotProjectQry);
						$TotProject=mysql_num_rows($TotProjectQryRs);
						if($TotProject>0)
						{
							for($PJ=0;$PJ<$TotProject;$PJ++)
							{
								$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
								if($PJ%4==0)
								{
									$Data.="</tr><tr>";
								}
									$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122 onmouseover="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'inline\'" onmouseout="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'none\'" ><span id="DELETE_'.$PJ.'" style=\'display:none;position:absolute\' ><a href="#" onclick="LoadAnotherViewImages_Del_SHOP(\'LoadAnotherViewImages_ID\','.$eid.','.$Iid.','.$TotProjectQryRow->id.');return false;";><img src="images/delete1.gif" border=0/></a></span>';
											if($TotProjectQryRow->picture!=""){
												$Data.="<img src='onlinethumb.php?nm=ShopViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
												//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
											} else {
												$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
											}
									$Data.="</td>";
									if($PJ==($TotProject-1))
									{
										if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
									$rrrr="addprojectview.php";
									$Data.="<td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												  </tr>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet_Edit_SHOP(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value,$Iid);' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td>";
										 } 	  
									 }   
								 }else{  	
									$Data.="<tr><td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												  </tr>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td></tr>";
									 }		
					  $Data.="</table>";				  
					  return $Data;
		}
		else
		{
					   $gettempcountitemQry="select * from shop_images_set where	projectid='".$eid."'";	 
						$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
						$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
						if($Totgettempcountitem>0)
						{
							$clsnm=" class='Buttonadd_new_itemWithImage'";
						}
						else
						{
							$clsnm=" class='Buttonadd_first_itemWithImage'";
						}
						
						
						$gettempcountitemQry2="select * from  shop_images where		imagesetid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."'";	 
						$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2	);
						$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
						if($Totgettempcountitem2>0)
						{
							$clsnm2=" class='Buttonadd_add_another_viewWithImage'";
						}
						else
						{
							$clsnm2=" class='Buttonadd_UploadimageWithImage'";
						}
						
						$TotProjectQry="SELECT picture from shop_images where imagesetid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
						$TotProjectQryRs=mysql_query($TotProjectQry);
						$TotProject=mysql_num_rows($TotProjectQryRs);
						if($TotProject>0)
						{
							for($PJ=0;$PJ<$TotProject;$PJ++)
							{
								$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
								if($PJ%4==0)
								{
									$Data.="</tr><tr>";
								}
									$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122 onmouseover="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'inline\'" onmouseout="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'none\'" ><span id="DELETE_'.$PJ.'" style=\'display:none;position:absolute\' ><a href="#" onclick="LoadAnotherViewImages_Del(\'LoadAnotherViewImages_ID\','.$eid.','.$Iid.','.$TotProjectQryRow->id.');return false;";><img src="images/delete1.gif" border=0/></a></span>';
											if($TotProjectQryRow->picture!=""){
												$Data.="<img src='onlinethumb.php?nm=ShopViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
												//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
											} else {
												$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
											}
									$Data.="</td>";
									if($PJ==($TotProject-1))
									{
										if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
									$rrrr="addprojectview.php";
									$Data.="<td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												   <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												   </tr>
												   <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet_Edit2_SHOP(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value,".$eid.",".$_SESSION['SESSION_CURRENTPROJECT_SET'].");' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td>";
										 } 	  
									 }   
								 }else{  	
									$Data.="<tr><td colspan='2' valign='top'>
												<table width='100%' border='0' cellspacing='0' cellpadding='0'>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
														<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
													</td>
												  </tr>
												  <tr>
													<td align='left' valign='top' style='padding-top:3px;'>
														<input type='button' name='SubmitAddProject' id='SubmitAddProject' $clsnm value=''  onclick='SaveProjectImageSet(\"SaveProjectImageSet_ID\",document.getElementById(\"imagetitle\").value,document.getElementById(\"description\").value,document.getElementById(\"size\").value,document.getElementById(\"price\").value,document.getElementById(\"backgroundcolor\").value,document.getElementById(\"fonts\").value,document.getElementById(\"comments\").value);' style='cursor:pointer;'  title='Add New Item'/>
													</td>
												  </tr>
												</table>
											</td></tr>";
									 }		
					  $Data.="</table>";				  
					  return $Data;
		}		  
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}

if($_REQUEST["Type"]=="LoadAnotherViewMainImage_Edit_SHOP")
{
	function validate($eid,$Iid)
	{	
		
		if($Iid!="")
		{
			$AndQry="and shop_images_set.id='".mysql_real_escape_string($Iid)."'";
			$gettempcountitemQry="select * from shop_images_set where	projectid='".$eid."' $AndQry";	 
			$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
			$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
			$gettempcountitemQryRow=mysql_fetch_object($gettempcountitemQryRs);
			
			$TotProjectQry_main="SELECT picture from shop_images where 	imagesetid='".$gettempcountitemQryRow->imagesetid."' order by id desc";
			$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
			$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
			if($TotProject_main>0)
			{
				$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
				$Data.="<img src='onlinethumb.php?nm=ShopViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
			}
			else
			{
				$Data.='<img src="images/images.jpg" width="548" height="330" />';
			}
		   return $Data;
		}
		else
		{
			$TotProjectQry_main="SELECT picture from shop_images where 		imagesetid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
			$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
			$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
			if($TotProject_main>0)
			{
				$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
				$Data.="<img src='onlinethumb.php?nm=ShopViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
			}
			else
			{
				$Data.='<img src="images/images.jpg" width="548" height="330" />';
			}
		    return $Data;
		}  
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}

if($_REQUEST["Type"]=="SaveProjectImageSet_Edit2_SHOP")
{
	function validate($imagetitle,$description,$size,$price,$backgroundcolor,$fonts,$comments,$eid,$Iid)
	{
		$TotProjectQry="SELECT picture from shop_images where imagesetid='".$Iid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Image Title")
		{
			return 'Please Enter Image Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="INSERT INTO shop_images_set SET
						projectid='".addslashes($eid)."',
						imagesetid='".addslashes($Iid)."',
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						size='".addslashes($size)."',
						price='".addslashes($price)."',
						backgroundcolor='".addslashes($backgroundcolor)."',
						font='".addslashes($fonts)."',
						comments='".addslashes($comments)."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['size']),trim($_REQUEST['price']),trim($_REQUEST['backgroundcolor']),trim($_REQUEST['fonts']),trim($_REQUEST['comments']),trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}

if($_REQUEST["Type"]=="SaveProjectImageSet_Edit_SHOP")
{
	function validate($imagetitle,$description,$size,$price,$backgroundcolor,$fonts,$comments,$Iid)
	{
		$Iid=GetName1("shop_images_set","imagesetid","id",$Iid);	
		$TotProjectQry="SELECT picture from shop_images where imagesetid='".$Iid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Image Title")
		{
			return 'Please Enter Image Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="UPDATE shop_images_set SET
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						size='".addslashes($size)."',
						price='".addslashes($price)."',
						backgroundcolor='".addslashes($backgroundcolor)."',
						font='".addslashes($fonts)."',
						comments='".addslashes($comments)."' where imagesetid=".$Iid."";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			//$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['size']),trim($_REQUEST['price']),trim($_REQUEST['backgroundcolor']),trim($_REQUEST['fonts']),trim($_REQUEST['comments']),trim($_REQUEST['Iid']));
}

if($_REQUEST["Type"]=="LoadLocalActivity")
{
	function validate($userid)
	{
		$SE="SELECT  users.fname,users.lname,comments.id,comments.comment,comments.commenton,comments.userid as commentbyuserid,projects.projecttitle,projects.id as Projectid,users.photo  FROM `projects`
				inner join comments on projects.id=comments.pid
				left outer join users on users.id=comments.userid
				WHERE  projects.userid='".$userid."' order by commenton desc";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		if($TOT>0)
		{
			$Data.=' <table width="100%" border="0" cellpadding="0" cellspacing="0">';
			for($T=0;$T<$TOT;$T++)
			{
				$FOBJ=mysql_fetch_object($SERs);
				if($FOBJ->photo!=""){
					$IMG="<img src='onlinethumb.php?nm=User_Photo/".$FOBJ->photo."&mwidth=52&mheight=52' border='0'>";
				} else {
					$IMG='<img src="images/noimage.jpg" border="0"  width="52" height="52">';
				}
				$date_show        = date('l, F d', strtotime($FOBJ->commenton));
				$date_compare    = date('Y-m-d', strtotime($FOBJ->commenton));
				$date_today       = date("Y-m-d");
				$date_yesterday = date("Y-m-d", strtotime("-1 day"));
				if ($date_compare == $date_today) {
					$DTT='Today';
				}else if ($date_compare == $date_yesterday) {
					$DTT= 'Yesterday';
				}else {
					$DTT= $date_show;
				}
				if($TMPP!=$DTT)
				{
				$Data.='<tr>
						  <td height="35" class="txt-grey11" align="left">'.strtoupper($DTT).'</td>
						</tr>';
				}
				$Data.='<tr>
						  <td><table width="96%" border="0" align="right" cellpadding="0" cellspacing="0">
								  <tr>
									<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td width="11%" align="left" valign="top"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.$IMG.'</a></td>
										  <td width="89%" align="left" valign="top" class="textblack14"><span class="textgreen14"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.stripslashes($FOBJ->fname).' , '.stripslashes($FOBJ->lname).'</a></span> commented on <span class="link_tom"><a href="project-detail.php?pid='.stripslashes($FOBJ->Projectid).'" class="link_tom">your portfolio '.stripslashes($FOBJ->projecttitle).' :</a></span>&nbsp;'.nl2br(stripslashes($FOBJ->comment)).' <span class="textgreen14"></span></td>
										</tr>
									  </table></td>
								  </tr>
								  <tr>
									<td class="bottom-bdrgrey">&nbsp;</td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
								  </tr>
							</table></td>
						</tr>';		
				/*$Data.='<tr>
						  <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
							  <tr>
								  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td width="18%" align="left" valign="top"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.$IMG.'</a></td>
										<td width="82%" align="left" valign="top" class="textblack14"><span class="textgreen14"><a href="'.PublicProfilePageUrl($FOBJ->commentbyuserid).'" class="link_tom">'.stripslashes($FOBJ->fname).' , '.stripslashes($FOBJ->lname).'</a></span> commented on <span class="link_tom"><a href="project-detail.php?pid='.stripslashes($FOBJ->Projectid).'" class="link_tom">your portfolio '.stripslashes($FOBJ->projecttitle).' :</a></span>&nbsp;'.nl2br(stripslashes($FOBJ->comment)).' <span class="textgreen14"></span></td>
									  </tr>
									</table></td>
								</tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table></td>
						</tr>';*/
				$TMPP=$DTT;		
			}  
			$Data.='</table>';
		}
		else
		{
			$Data.='<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center" valign="middle" height="150" >No Local Activities.</td>
					  </tr>
					</table>';
		}
		return $Data;
	}
	echo validate(trim($_REQUEST['userid']));
}

if($_REQUEST["Type"]=="IlikeIt")
{
	function validate($pid,$iid,$userid)
	{	
		if($userid=="")
		{
			return "NotLoggedin";	
		}
		else
		{
			$TotProjectQry_main1="SELECT  id from projects where id='".$pid."' and userid='".$userid."'";
			$TotProjectQryRs_main1=mysql_query($TotProjectQry_main1);
			$TotProject_main1=mysql_num_rows($TotProjectQryRs_main1);
			
			if($TotProject_main1>0)
			{
				return "OWN";
			}
			else
			{
				$SE="SELECT * FROM likeit where pid='".$pid."'and iid='".$iid."' and userid='".$userid."'";
				$SERs=mysql_query($SE);
				$TOT=mysql_num_rows($SERs);
				if($TOT>0)
				{
					return "Alreadyadded";
				} 
				else
				{
					$InsertNewsletterQry="INSERT INTO likeit set pid='".$pid."',iid='".$iid."',userid='".$userid."'";
					$InsertNewsletterQryRs=mysql_query($InsertNewsletterQry);
					
					$cntres2=mysql_query("SELECT count(*) as totvote from  likeit where  iid='".$iid."'");
				    $cntrow2=mysql_fetch_array($cntres2);
				    $totvote=$cntrow2['totvote'];
				    return $totvote;
				}
			}	
		}		
	}
	echo validate(trim($_REQUEST['pid']),trim($_REQUEST['iid']),trim($_REQUEST['userid']));
}

if($_REQUEST["Type"]=="SaveRatingEducation")
{
	function validate($pid,$userid,$rateid)
	{	
		$TotProjectQry_main="SELECT  * from rating_class where userid='$userid' and pid='".$pid."'";
		$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
		$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
		
		if($TotProject_main>0)
		{
			$Data.="Already";
			//$Data.='You have already rated';
		}
		else
		{
			$AddUserQry="INSERT INTO rating_class SET
						userid ='".$userid."',
						rateid='".$rateid."',
						pid='".$pid."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			$Data.="Rated";
		}
	  	return $Data;
	}
	echo validate(trim($_REQUEST['pid']),trim($_REQUEST['userid']),trim($_REQUEST['rateid']));
}

if($_REQUEST["Type"]=="LoadAnotherViewImages_PRESS")
{
	function validate()
	{	
		$Data='<table width="100%" border="0" cellspacing="3" cellpadding="1">';
		
		
		$gettempcountitemQry2="select * from press_images_temp where		sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."'";	 
		$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2	);
		$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
		if($Totgettempcountitem2>0)
		{
			$clsnm2=" class='Buttonadd_UploadArticleWithImage'";
		}
		else
		{
			$clsnm2=" class='Buttonadd_UploadcoverWithImage'";
		}
		
		$TotProjectQry="SELECT picture from press_images_temp where sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject>0)
		{
			for($PJ=0;$PJ<$TotProject;$PJ++)
			{
				$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
				if($PJ%4==0)
				{
					$Data.="</tr><tr>";
				}
					$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122>';
							if($TotProjectQryRow->picture!=""){
								$Data.="<img src='onlinethumb.php?nm=PressViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
								//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
							} else {
								$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
							}
					$Data.="</td>";
					if($PJ==($TotProject-1))
					{
						if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
					$rrrr="addprojectview.php";
					$Data.="<td colspan='2' valign='top'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
										<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
									</td>
								  </tr>
								</table>
							</td>";
						 } 	  
					 }   
				 }else{  	
				 	$Data.="<tr><td colspan='2' valign='top'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td align='left' valign='top' style='padding-top:3px;'>
										<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
										<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
									</td>
								  </tr>
								</table>
							</td></tr>";
					 }		
	  $Data.="</table>";				  
	  return $Data;
	}
	echo validate();
}

//////////////////Artist Signup User Name Checking
if($_REQUEST["Type"]=="SaveProjectImageSet_PRESS")
{
	function validate($imagetitle,$description)
	{
		$SE="SELECT id FROM users where email='".addslashes($name)."' and password='".$password."'";
		$SERs=mysql_query($SE);
		$TOT=mysql_num_rows($SERs);
		$SERow=mysql_fetch_object($SERs);
		
		$TotProjectQry="SELECT picture from press_images_temp where sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Item Title")
		{
			return 'Please Enter Item Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="INSERT INTO press_images_set_temp SET
						main_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."',
						sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT_SET']."',
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						comments='".addslashes($comments)."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']));
}

if($_REQUEST["Type"]=="LoadAnotherViewMainImage_PRESS")
{
	function validate()
	{	
		$TotProjectQry_main="SELECT picture from press_images_temp where 	sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."' order by id desc";
		$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
		$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
		if($TotProject_main>0)
		{
			$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
			$Data.="<img src='onlinethumb.php?nm=PressViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
		}
		else
		{
			$Data.='<img src="images/images.jpg" width="548" height="330" />';
		}
	  return $Data;
	}
	echo validate();
}

if($_REQUEST["Type"]=="LoadProjectAddDoneButton_PRESS")
{
	function validate22()
	{	
		$gettempcountitemQry="select * from press_images_temp where	sub_sessionid='".$_SESSION['SESSION_CURRENTPROJECT']."'";	 
		$gettempcountitemQryRs=mysql_query($gettempcountitemQry);
		$Totgettempcountitem=mysql_num_rows($gettempcountitemQryRs);
		if($Totgettempcountitem>0)
		{
			$Data.="<tr>
						<td valign='top' style='padding-left:10px;' ><input type='button' name='SubmitFinish' id='SubmitFinish' class='ButtonFinishWithImage' value=''  onclick='return FrmChkProject();' style='cursor:pointer;'  title='Add Press'/></td>
					</tr>";
		}	
		else
		{
			$Data.="<tr>
						<td valign='top' style='padding-left:10px;' ></td>
					</tr>";
		}
	  return $Data;
	}
	echo validate22();
}


if($_REQUEST["Type"]=="LoadAnotherViewImages_Edit_PRESS")
{
	function validate($eid,$Iid)
	{	
		$Data='<table width="100%" border="0" cellspacing="3" cellpadding="1">';
		if($eid!="")
		{
				$gettempcountitemQry2="select * from press_images where		pressid='".$eid."'";	 
				$gettempcountitemQryRs2=mysql_query($gettempcountitemQry2);
				$Totgettempcountitem2=mysql_num_rows($gettempcountitemQryRs2);
				if($Totgettempcountitem2>0)
				{
					$clsnm2=" class='Buttonadd_UploadArticleWithImage'";
				}
				else
				{
					$clsnm2=" class='Buttonadd_UploadcoverWithImage'";
				}
				
				$TotProjectQry="SELECT picture,id from press_images where 	pressid='".$eid."' order by 	iscover desc";
				$TotProjectQryRs=mysql_query($TotProjectQry);
				$TotProject=mysql_num_rows($TotProjectQryRs);
				if($TotProject>0)
				{
					for($PJ=0;$PJ<$TotProject;$PJ++)
					{
						$TotProjectQryRow=mysql_fetch_object($TotProjectQryRs);
						if($PJ%4==0)
						{
							$Data.="</tr><tr>";
						}
							$Data.=' <td bgcolor=#DCDDDE height=72  align=center valign=middle width=122 onmouseover="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'inline\'" onmouseout="document.getElementById(\'DELETE_'.$PJ.'\').style.display=\'none\'" ><span id="DELETE_'.$PJ.'" style=\'display:none;position:absolute\' ><a href="#" onclick="LoadAnotherViewImages_Del_PRESS(\'LoadAnotherViewImages_ID\','.$eid.','.$TotProjectQryRow->id.');return false;";><img src="images/delete1.gif" border=0/></a></span>';
									if($TotProjectQryRow->picture!=""){
										$Data.="<img src='onlinethumb.php?nm=PressViews/".$TotProjectQryRow->picture."&mwidth=127&mheight=60' border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
										//$Data.="<img src='ProjectViews/".$TotProjectQryRow->picture."' width=127 height=60 border='0' onclick='ChangeIamge(\"".$TotProjectQryRow->picture."\");' style='cursor:pointer;'>";
									} else {
										$Data.='<img src="images/noimage.jpg" border="0"  width="127" height="60">';
									}
							$Data.="</td>";
							if($PJ==($TotProject-1))
							{
								if($TotProject%4==3 || $TotProject%4==0){$Data.= "</tr><tr>";}			
							$rrrr="addprojectview.php";
							$Data.="<td colspan='2' valign='top'>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
										  <tr>
											<td align='left' valign='top' style='padding-top:3px;'>
												<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
												<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
											</td>
										  </tr>
										</table>
									</td>";
								 } 	  
							 }   
						 }else{  	
							$Data.="<tr><td colspan='2' valign='top'>
										<table width='100%' border='0' cellspacing='0' cellpadding='0'>
										  <tr>
											<td align='left' valign='top' style='padding-top:3px;'>
												<input type='button' name='SubmitAddProject2' id='SubmitAddProject2' $clsnm2 value=''  onClick='MM_showHideLayers(\"AddFriendBox\",\"\",\"show\");MM_showHideLayers(\"AddFriendBox_div\",\"\",\"show\");return false;' style='cursor:pointer;'  title='Add Picture View'/>
												<input type='hidden' name='HidAddProject' id='HidAddProject' value='' />
											</td>
										  </tr>
										</table>
									</td></tr>";
							 }		
			  $Data.="</table>";				  
			  return $Data;
		}
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}
if($_REQUEST["Type"]=="LoadAnotherViewImages_Del_PRESS")
{
	function validate($eid,$Did)
	{	
		  $Del=mysql_query("DELETE FROM press_images where id='".$Did."'");
		  return "Done";
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Did']));
}

if($_REQUEST["Type"]=="SaveProjectImageSet_Edit_PRESS")
{
	function validate($imagetitle,$description,$Iid)
	{
		$Iid=GetName1("press_images_set","imagesetid","id",$Iid);	
		$TotProjectQry="SELECT picture from press_images where imagesetid='".$Iid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Item Title")
		{
			return 'Please Enter Item Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="UPDATE press_images_set SET
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						comments='".addslashes($comments)."' where imagesetid=".$Iid."";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			//$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['Iid']));
}

if($_REQUEST["Type"]=="LoadAnotherViewMainImage_Edit_PRESS")
{
	function validate($eid,$Iid)
	{	
		
		if($eid!="")
		{
			$TotProjectQry_main="SELECT picture from press_images where 	pressid='".$eid."' order by 	iscover desc";
			$TotProjectQryRs_main=mysql_query($TotProjectQry_main);
			$TotProject_main=mysql_num_rows($TotProjectQryRs_main);
			if($TotProject_main>0)
			{
				$TotProjectQryRow_main=mysql_fetch_object($TotProjectQryRs_main);
				$Data.="<img src='onlinethumb.php?nm=PressViews/".$TotProjectQryRow_main->picture."&mwidth=548&mheight=330' border='0'  style='cursor:pointer;'>";
			}
			else
			{
				$Data.='<img src="images/images.jpg" width="548" height="330" />';
			}
		   return $Data;
		}
		
	}
	echo validate(trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}
if($_REQUEST["Type"]=="SaveProjectImageSet_Edit2_PRESS")
{
	function validate($imagetitle,$description,$eid,$Iid)
	{
		$TotProjectQry="SELECT picture from press_images where imagesetid='".$Iid."' order by id desc";
		$TotProjectQryRs=mysql_query($TotProjectQry);
		$TotProject=mysql_num_rows($TotProjectQryRs);
		if($TotProject<=0)
		{
			return 'Please upload the picture';
		}
		else if($imagetitle == '' || $imagetitle=="Item Title")
		{
			return 'Please Enter Item Title';
		} 
		else 
		{
			$backgroundcolor="#".$backgroundcolor;
			$AddUserQry="INSERT INTO press_images_set SET
						projectid='".addslashes($eid)."',
						imagesetid='".addslashes($Iid)."',
						imagetitle='".addslashes($imagetitle)."',
						description='".addslashes($description)."',
						comments='".addslashes($comments)."'";	 
			$AddUserQryRs=mysql_query($AddUserQry);
			
			$_SESSION['SESSION_CURRENTPROJECT_SET']=rand(1,500000000000);
			return "DONE";	
		}
	}
	echo validate(trim($_REQUEST['imagetitle']),trim($_REQUEST['description']),trim($_REQUEST['eid']),trim($_REQUEST['Iid']));
}
if($_REQUEST["Type"]=="LoadPressItemdetail")
{
	function validate($id,$imagesetid)
	{
		$isql = " SELECT * from press_images_set 
					where press_images_set.imagesetid='".$imagesetid."'";
		$ires = mysql_query($isql);
		$Tottttt=mysql_affected_rows();
		if($Tottttt>0)
		{
			$iresrow=mysql_fetch_object($ires); 
			$FinalText.=stripslashes($iresrow->imagetitle)."##########";
			$FinalText.=stripslashes($iresrow->description)."##########";
			//$FinalText.=stripslashes($iresrow->comments)."##########";
		}
		
		$isql1 = " SELECT picture from press_images 
					where press_images.id='".$id."'";
		$ires1 = mysql_query($isql1);
		$Tottttt1=mysql_affected_rows();
		if($Tottttt1>0)
		{
			$iresrow1=mysql_fetch_object($ires1); 
			$FinalText.=stripslashes($iresrow1->picture)."##########";
		}
	
		
		return $FinalText;
	}
	echo validate(trim($_REQUEST['id']),trim($_REQUEST['imagesetid']));
}

if($_REQUEST["Type"]=="SendComment_PRESS")
{
	function validate($comment,$pid,$ProjectUserId)
	{
		global $SITE_URL;
		global $SITENAME;
		if($_SESSION['UsErIdAdMiN']=="")
		{
			return "NotLoggedin";
		}
		else if($_SESSION['UsErIdAdMiN']==$ProjectUserId)
		{
			return "OWN";
		}
		else if($comment == '')
		{
			return 'Please enter comment';
		} 
		else
		{
			$AddUserQry="INSERT INTO comments_press SET
						userid ='".$_SESSION['UsErIdAdMiN']."',
						comment='".addslashes($comment)."',
						pid='".addslashes($pid)."',
						commenton=now()";	 
			$AddUserQryRs=mysql_query($AddUserQry);
								
			return 	"Sent";			
		}
	}
	echo validate(trim($_REQUEST['comment']),trim($_REQUEST['pid']),trim($_REQUEST['ProjectUserId']));
}
else if($_REQUEST["Type"]=="venuedropdown")
{
	function validate12()
	{	
		$RightTop20BestSelllerQry2="SELECT *  from event_venues order by id desc";
		$RightTop20BestSelllerQryRs2=mysql_query($RightTop20BestSelllerQry2);
		$RightTop20BestSelllerQryRow2=mysql_fetch_object($RightTop20BestSelllerQryRs2);	
		$lastid=$RightTop20BestSelllerQryRow2->id;
		
		$RightTop20BestSelllerQry="SELECT *  from event_venues order by name asc ";
		$RightTop20BestSelllerQryRs1=mysql_query($RightTop20BestSelllerQry);
		$TotRightTop20BestSelller=mysql_num_rows($RightTop20BestSelllerQryRs1);
		$Data.='<select name="venueid" id="venueid" style="width:260px;padding:1px 2px;font:11px;height:20px"><option value="">Select a venue</option>';
		if($TotRightTop20BestSelller>0)
		{
			for($RBSD1=0;$RBSD1<$TotRightTop20BestSelller;$RBSD1++)
			{
				$RightTop20BestSelllerQryRow1=mysql_fetch_object($RightTop20BestSelllerQryRs1);	
				
				
				
				if($lastid==$RightTop20BestSelllerQryRow1->id){$sel='selected';}else{$sel='';}
				
				$Data.="<option value='".$RightTop20BestSelllerQryRow1->id."'  ".$sel." >".stripslashes($RightTop20BestSelllerQryRow1->name)." in ".stripslashes($RightTop20BestSelllerQryRow1->city).", ".stripslashes($RightTop20BestSelllerQryRow1->state)."</option>";
			}
		}
		$Data.='</select>';		
		return $Data;
	}
	echo validate12();
}
else if($_REQUEST["Type"]=="LoadCountry_States")
{
	function validate($CountryName,$statefieldname,$totalwidth)
	{
		$sql1="select id_country from country where country_name='".$CountryName."'";
		$rs1=mysql_query($sql1);
		$rrow=mysql_fetch_array($rs1);
		
		
		$sql="select * from state where id_country='".$rrow['id_country']."' order by 	state_name";
		$rs=mysql_query($sql);
		$tot=mysql_affected_rows();
		
		$Data='<select name="'.$statefieldname.'" id="'.$statefieldname.'" class="register_textfield2" style="width:153px;">';
		if($tot)
		{
			$Data.="<option value=''>Select</option>";
			for($w=0;$w<$tot;$w++)
			{
				$aj=mysql_fetch_object($rs);
				$id=$aj->state_name;
				$name=stripslashes(htmlentities($aj->state_name));
				$Data.="<option value='".$id."'>".$name."</option>";
			}
		}
		else
		{
				$Data.="<option value=''>No Record</option>";
		}
		return $Data;
	}
	echo validate(trim($_REQUEST['CountryName']),trim($_REQUEST['statefieldname']),trim($_REQUEST['totalwidth']));
}
?>
