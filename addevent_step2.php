<? include("connect.php"); 
include("getsess.php");
if($_SESSION['SESSION_STEP1']==""){header("location:addevent_step1.php");exit;}

if($_REQUEST['Did']>0)
{
	$query1="Delete from events_pricelevel where id='".trim($_REQUEST['Did'])."' and eventid='".$_SESSION['SESSION_STEP1']."' and userid='".$_SESSION['UsErId']."'";
	$res=mysql_query($query1);
}
if($_POST['HidRegUser']=="1")
{
		$_SESSION['SESSION_STEP2']="Yes";
		header("location:addevent_step3.php");			
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
<title>My Account | <? echo $SITE_NAME;?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="ajax_validation.js"></script>

</head>
<script language="javascript">
function closeshadow()
{
	venuedropdown('venuedropdown_ID');
}
</script>
<body id="page5">
<div class="body1">
	<div class="main">
<!-- header -->
		<? include("top.php");?>
		<div class="ic"><div class="inner_copy">All <a href="http://www.magentothemesworld.com" title="Best Magento Templates">premium Magento themes</a> at magentothemesworld.com!</div></div>
<!-- / header -->
<!-- content -->
		<article id="content">
			
			<div class="wrapper">
				<div class="pad_left2 relative">
					<h4 class="color3"><span>Welcome <? echo ucfirst(stripslashes($Row['firstname']));?> <? echo ucfirst(stripslashes($Row['lastname']));?></span></h4>
					<? if($_REQUEST['msg']){?><div align="center" style="color:#FF0000;"><? echo $_REQUEST['msg'];?></div><? } ?>
					<div class="wrapper">
					<div class="box1" >
						<div class="" ><div class="wrapper" >
							<section class="col1_1" style="width:830px;">
								<h2><strong style="width:90px;">Price</strong> Levels</h2>
								<div class="pad_bot1">
									<figure>
										<table width="100%" border="0" cellspacing="3" cellpadding="2">
										  <tr><td colspan="5"><a href="#" class="button1"  onClick="javascript:window.open('addpricelevel.php','','width=600,height=450');return false;" >Add a price level</a></td></tr>
										  <?
										  	$SelPricelevelQry="SELECT * FROM events_pricelevel WHERE eventid='".$_SESSION['SESSION_STEP1']."'";
											$SelPricelevelQryRs=mysql_query($SelPricelevelQry);
											$TOtSelPricelevel=mysql_affected_rows();
											if($TOtSelPricelevel>0)
											{
												for($VV=0;$VV<$TOtSelPricelevel;$VV++)
												{
													$SelPricelevelQryRow=mysql_fetch_array($SelPricelevelQryRs);
													if($VV==0)
													{
										  ?>
														  <tr>
															<td style="padding:5px;"><strong>Name</strong></td>
															<td style="padding:5px;"><strong>Price</strong></td>
															<td style="padding:5px;"><strong>BO Price</strong></td>
															<td style="padding:5px;"><strong>Limit</strong></td>
															<td style="padding:5px;"><strong>Manage</strong></td>
														  </tr>
												 <? } ?>
												 		<tr>
															<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['pricelevelname']);?></td>
															<td style="padding:5px;">$<? echo stripslashes($SelPricelevelQryRow['onlineprice']);?></td>
															<td style="padding:5px;">$<? echo stripslashes($SelPricelevelQryRow['boxofficeprice']);?></td>
															<td style="padding:5px;"><? echo stripslashes($SelPricelevelQryRow['perorderlimit']);?></td>
															<td style="padding:5px;"><a href="addevent_step2.php?Did=<? echo stripslashes($SelPricelevelQryRow['id']);?>">Delete</a></td>
														  </tr>		  
											<? } ?>  
										 <? } else{?>	  
										 	<tr>
												<td style="padding:5px;">
													You haven't added any price level yet. <a href="#" style="float:none;" class="button1"  onClick="javascript:window.open('addpricelevel.php','','width=600,height=450');return false;" >Add a price level</a>
												</td>
											  </tr>
										 <? } ?>
										 <? if($TOtSelPricelevel>0){?>
										 	<tr>
												<td style="padding:5px;" colspan="5">
												<form name="AddeventForm2" id="AddeventForm2" enctype="multipart/form-data" method="post">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td>
													<input type="hidden" name="HidRegUser" id="HidRegUser" value="" />
													<a href="#"  class="button1"  onClick="return valid();" >Continue</a></td>
												  </tr>
												</table>
												</form>
												</td>
											  </tr>
										 <? } ?>
										</table>
									</figure>
								</div>
							</section>
							
						</div></div>
					</div>	
					
					
					<div style="height:30px;"></div>
				</div>					
				</div>
			</div>
		</article>
<!-- / content -->
<!-- footer -->
		<? include("footer.php");?>
<!-- / footer -->
	</div>
</div>
<script language="javascript" type="text/javascript">
function valid()
{
	form=document.AddeventForm2;
	document.AddeventForm2.HidRegUser.value='1';
	document.AddeventForm2.submit();
	return  true;    
}
</script>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>