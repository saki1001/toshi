<?php
	## 1 ##
	function GTG_is_dup_add($table,$field,$value)
	{
		$q = "select ".$field." from ".$table." where ".$field." = '".$value."'";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 2 ##
	function GTG_is_dup_add_id($table,$field,$value)
	{
		$q = "select ".$field." from ".$table." where ".$field." = ".$value.""; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 3 ##
	function GTG_is_dup_edit($table,$field,$value,$id)
	{
		$q = "select ".$field." from ".$table." where ".$field." = '".$value."' and id != ".$id; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 4 ##
	function GTG_is_dup_edit_id($table,$field,$value,$id)
	{
		$q = "select ".$field." from ".$table." where ".$field." = ".$value." and id != ".$id; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 5 ##
	function GTG_maxid($table)
	{
		$q = "select max(id) as mid from ".$table; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
		{
			while($r1 = mysql_num_rows($r))
			{
				print $r1['mid']; exit;
				return $r1['mid'];
			}
		}
		else
		{
			return 0;
		}
	}
	
	## 6 ##
	function GTG_checkfordelete($targettable,$targetfield,$searchvalue)
	{
		$q = "select ".$targetfield." from ".$targettable." where ".$targetfield." = ".$searchvalue; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 7 ##
	function GTG_check_category_for_delete($searchvalue)
	{
		$q = "SELECT categoryid FROM product WHERE categoryid LIKE '%".$searchvalue."%'";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 8 ##
	function GTG_arraytostr($array)
	{
		for($i=0;$i<count($array);$i++)
		{
			if($i == count($array)-1)
			{
				$str = $str.$array[$i];
			}
			else
			{
				$str = $str.$array[$i].",";
			}
		}
		return $str;
	}
	
	## 9 ##
	function GTG_strtoarray($str)
	{
		return explode(",",$str);
	}
	
	## 10 ##
	function GTG_valueinarray($array,$value)
	{
		for($i=0;$i<count($array);$i++)
		{
			if($array[$i]==$value)
			{
				return true;
			}
		}
		return false;
	}
	
	## 11 ##
	function GTG_addzero($n)
	{
		if($n < 10)
			return "0".$n;
		else
			return $n;
	}
	
	## 12 ##
	function GTG_addzero1($n)
	{
		if(strlen($n) == 1)
			return "0".$n;
		else
			return $n;
	}
	
	## 13 ##
	function GTG_is_dup_special_add($id)
	{
		$q = "select isspecial from product where isspecial=1 and id=".$id; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;	
	}
	
	## 14 ##
	function GTG_checkbookdate($start,$end)
	{
		$start = '2007-3-1';
		$end = '2007-4-25';
		
		$a1 = explode("-",$start);
		$a2 = explode("-",$end);
		
		$sy = $a1[0];
		$ey = $a2[0];
		
		$sm = addzero1($a1[1]);
		$em = addzero1($a2[1]);
		
		$sd = addzero1($a1[2]);
		$ed = addzero1($a2[2]);
		
		$compare_end = $ey."-".$em."-".$ed;
		while($comparedate != $compare_end)
		{
			if($sd > 31)
			{
				$sd=1;
				$sm++;
			}
			if($sm > 13)
			{
				$sm=1;
				$sy++;
			}
			$comparedate = $sy."-".addzero1($sm)."-".addzero1($sd);
			$sd++;
			$datelist = $datelist.$comparedate.",";
		}
		$datelist = substr($datelist,0,strlen($datelist));
	}
	
	## 15 ##
	function GTG_isdate_in_bookingtable($d)
	{
		$q = "select id from bookingdate where date1 in ('".$d."')";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 16 ##
	function GTG_is_dup_bestproduct_add($id)
	{
		$q = "select isbest from product where isbest=1 and id=".$id; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;	
	}
	
	## 17 ##
	function GTG_is_dup_topproduct_add($id)
	{
		$q = "select istop from product where istop=1 and id=".$id; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;	
	}
	
	## 18 ##
	function GTG_top_product_count()
	{
		$q = "select istop from product where istop=1"; 
		$r = mysql_query($q);
		return mysql_num_rows($r);
	}
	
	## 19 ##
	function GTG_is_dup_user_basket_add($basketname,$userid)
	{
		$q = "select linkbasket.id from linkbasket inner join userbasket on linkbasket.basketid=userbasket.id where userbasket.basketname='".$basketname."' and linkbasket.userid=".$userid; 
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 20 ##
	function GTG_add_to_cart($id,$q,$wprice,$c)
	{
		if($_SESSION['SESSION_PRODUCTID']!="")
		{
			$SESSION_PRODUCTID = $_SESSION['SESSION_PRODUCTID'];
			$SESSION_QUANTITY = $_SESSION['SESSION_QUANTITY'];
			$SESSION_CUSTOMIZE = $_SESSION['SESSION_CUSTOMIZE'];
			$SESSION_PRICE = $_SESSION['SESSION_PRICE'];
			$flag = 0;
			
			for($i=0;$i<count($SESSION_PRODUCTID);$i++)
			{
				if($SESSION_PRODUCTID[$i] == $id && $SESSION_CUSTOMIZE[$i] == $c)
				{
					$SESSION_QUANTITY[$i] = $SESSION_QUANTITY[$i] + $q;
					$flag = 1;
				}
			}
			if($flag == 0)
			{
				$SESSION_PRODUCTID[count($_SESSION['SESSION_PRODUCTID'])]	= $id;
				$SESSION_CUSTOMIZE[count($_SESSION['SESSION_CUSTOMIZE'])]	= $c;				
				$SESSION_QUANTITY[count($_SESSION['SESSION_QUANTITY'])] = $q;				
				$SESSION_PRICE[count($_SESSION['SESSION_PRICE'])] = $wprice;
			}
			$_SESSION['SESSION_PRODUCTID'] = $SESSION_PRODUCTID;
			$_SESSION['SESSION_QUANTITY'] = $SESSION_QUANTITY;
			$_SESSION['SESSION_CUSTOMIZE'] = $SESSION_CUSTOMIZE;				
			$_SESSION['SESSION_PRICE'] = $SESSION_PRICE;
		}
		else
		{
			$SESSION_PRODUCTID[0] = $id;
			$SESSION_QUANTITY[0] = $q;
			$SESSION_CUSTOMIZE[0] = $c;			
			$SESSION_PRICE[0] = $wprice;
			$_SESSION['SESSION_PRODUCTID'] = $SESSION_PRODUCTID;
			$_SESSION['SESSION_QUANTITY'] = $SESSION_QUANTITY;
			$_SESSION['SESSION_CUSTOMIZE'] = $SESSION_CUSTOMIZE;			
			$_SESSION['SESSION_PRICE'] = $SESSION_PRICE;
		}
	}
	
	## 21 ##
	function GTG_remove_from_cart($id,$c)
	{
		if($_SESSION['SESSION_PRODUCTID']!="")
		{
			$SESSION_PRODUCTID = $_SESSION['SESSION_PRODUCTID'];
			$SESSION_QUANTITY = $_SESSION['SESSION_QUANTITY'];
			$SESSION_CUSTOMIZE = $_SESSION['SESSION_CUSTOMIZE'];
			$SESSION_PRICE = $_SESSION['SESSION_PRICE'];
			
			$SESSION_PRODUCTID_temp;
			$SESSION_QUANTITY_temp;
			$SESSION_CUSTOMIZE_temp;
			$SESSION_PRICE_temp;
			
			$count = 0;
			
			if(1==2)
			{
				session_unregister('SESSION_PRODUCTID');
				session_unregister('SESSION_QUANTITY');
				session_unregister('SESSION_CUSTOMIZE');
				session_unregister('SESSION_PRICE');
			}
			else
			{
				for($i=0;$i<count($SESSION_PRODUCTID);$i++)
				{
					//echo $P[$i]."    ". $id ."    ". $COLOR[$i]."    ".$rem_color ."    ". $SIZE[$i]."    ".$rem_size."<br>";	
					if((trim($SESSION_PRODUCTID[$i]) != trim($id)) || (trim($SESSION_CUSTOMIZE[$i]) != trim($c)))
					{
						//echo $P[$i] ."    ". $id ."    ". $COLOR[$i]."    ".$rem_color ."    ". $SIZE[$i]."    ".$rem_size."<br>";	
						$SESSION_PRODUCTID_temp[$count] = $SESSION_PRODUCTID[$i];
						$SESSION_QUANTITY_temp[$count] = $SESSION_QUANTITY[$i];
						$SESSION_CUSTOMIZE_temp[$count] = $SESSION_CUSTOMIZE[$i];
						$SESSION_PRICE_temp[$count] = $SESSION_PRICE[$i];
						$count++;
					}
				}
				//exit;
				$_SESSION['SESSION_PRODUCTID'] = $SESSION_PRODUCTID_temp;
				$_SESSION['SESSION_QUANTITY'] = $SESSION_QUANTITY_temp;
				$_SESSION['SESSION_CUSTOMIZE'] = $SESSION_CUSTOMIZE_temp;
				$_SESSION['SESSION_PRICE'] = $SESSION_PRICE_temp;
			}
			
		}
	}
	
	## 22 ##
	function GTG_add_to_cart_individual($id,$q,$s)
	{
		
		if($_SESSION['SESSION_PRODUCTID']!="")
		{
			$SESSION_PRODUCTID = $_SESSION['SESSION_PRODUCTID'];
			$SESSION_QUANTITY = $_SESSION['SESSION_QUANTITY'];
			$SESSION_CUSTOMIZE = $_SESSION['SESSION_CUSTOMIZE'];
			
			$flag = 0;
			for($i=0;$i<count($SESSION_PRODUCTID);$i++)
			{
				if($SESSION_PRODUCTID[$i] == $id && $SESSION_CUSTOMIZE[$i] == $s)
				{
					$SESSION_QUANTITY[$i] = $q;
					$flag = 1;
				}
			}
			if($flag == 0)
			{
				$SESSION_PRODUCTID[count($_SESSION['SESSION_PRODUCTID'])]	= $id;
				$SESSION_QUANTITY[count($_SESSION['SESSION_QUANTITY'])] = $q;
			}
			$_SESSION['SESSION_PRODUCTID'] = $SESSION_PRODUCTID;
			$_SESSION['SESSION_QUANTITY'] = $SESSION_QUANTITY;
		}
		else
		{
			$SESSION_PRODUCTID[0] = $id;
			$SESSION_QUANTITY[0] = $q;
			$_SESSION['SESSION_PRODUCTID'] = $SESSION_PRODUCTID;
			$_SESSION['SESSION_QUANTITY'] = $SESSION_QUANTITY;
		}
	}
	
	## 23 ##
	
	function location($path)
	{
		header("Location: ".$path."");
	}
	
	## 24 ##
	function GTG_emptycart()
	{
		session_unregister('P');
		session_unregister('Q');
		session_unregister('COLOR');
		session_unregister('SIZE');	
	}
	
	## 25 ##
	function getpid($cid)
	{
		$pid = "";
		$q = "select id,categoryid from product";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
		{
			while($row = mysql_fetch_array($r))
			{
				$cat = $row['categoryid'];
				$p = $row['id'];
				$q1 = "select id from product where id=".$p." and ".$cid." in(".$cat.")";
				$r1 = mysql_query($q1);
				if(mysql_num_rows($r1) > 0)
				{
					$pid = $pid.$p.",";
				}
			}
			$pid = substr($pid,0,(strlen($pid)-1));
			if($pid != "")
				return $pid;
			else
				return 0;
		}
	}
	## 26 ##
	function insizeproduct($pid,$sid)
	{
		$q = "select id from sizeproduct where sid=".$sid." and pid=".$pid."";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	## 27 ##
	function incolorproduct($pid,$cid)
	{
		$q = "select id from colorproduct where cid=".$cid." and pid=".$pid."";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	## 28 ##
	function getsize($s)
	{
		if($s == "size_infant")
			return "Infant";
		if($s == "size_toddler")
			return "Toddler";
		if($s == "size_small")
			return "Small";
		if($s == "size_medium")
			return "Medium";
		if($s == "size_large")
			return "Large";
		if($s == "size_x_large")
			return "Extra Large";
		if($s == "size_one_size")
			return "One Size";
	}
	## 29 ##
	function getskusize($sku)
	{
		$q = "select * from product where sku like '".$sku."'";
		$r = mysql_query($q);
		while($r1 = mysql_fetch_array($r))
		{
			if($r1['size_infant'] == "Yes")
				return "size_infant";
			if($r1['size_toddler'] == "Yes")
				return "size_toddler";
			if($r1['size_small'] == "Yes")
				return "size_small";
			if($r1['size_medium'] == "Yes")
				return "size_medium";
			if($r1['size_large'] == "Yes")
				return "size_large";
			if($r1['size_x_large'] == "Yes")
				return "size_x_large";
			if($r1['size_one_size'] == "Yes")
				return "size_one_size";
		}
	}
	## 30 ##
	function getskucolor($sku)
	{
		$q = "select * from product where sku like '".$sku."'";
		$r = mysql_query($q);
		while($r1 = mysql_fetch_array($r))
		{
			if($r1['color_baby_blue'] == "Yes")
				return "color_baby_blue";
			if($r1['color_baby_pink'] == "Yes")
				return "color_baby_pink";
			if($r1['color_blue'] == "Yes")
				return "color_blue";
			if($r1['color_green'] == "Yes")
				return "color_green";
			if($r1['color_pink'] == "Yes")
				return "color_pink";
			if($r1['color_red'] == "Yes")
				return "color_red";
			if($r1['color_orange'] == "Yes")
				return "color_orange";
			if($r1['color_black'] == "Yes")
				return "color_black";
			if($r1['color_yellow'] == "Yes")
				return "color_yellow";
			if($r1['color_white'] == "Yes")
				return "color_white";
		}
	}
	
	## 31 ##
	function GTG_getstate($id)
	{
		$q = "select * from state where id=".$id;
		$r = mysql_query($q);
		while($r1 = mysql_fetch_array($r))
		{
			return $r1['name'];
		}
	}
	
	## 32 ##
	function GTG_add_to_cart1($id,$q,$c,$s,$cflag)
	{
		
		if(isset($_SESSION['P1']))
		{
			$P = $_SESSION['P1'];
			$Q = $_SESSION['Q1'];
			$COLOR = $_SESSION['COLOR1'];
			$SIZE = $_SESSION['SIZE1'];
			$CFLAG = $_SESSION['CFLAG1'];
			$flag = 0;
			
			for($i=0;$i<count($P);$i++)
			{
				if($P[$i] == $id && $COLOR[$i] == $c && $SIZE[$i] == $s)
				{
					$Q[$i] = $Q[$i] + $q;
					$flag = 1;
				}
			}
			if($flag == 0)
			{
				$P[count($_SESSION['P1'])]	= $id;
				$COLOR[count($_SESSION['COLOR1'])]	= $c;
				$SIZE[count($_SESSION['SIZE1'])]	= $s;
				$Q[count($_SESSION['Q1'])] = $q;
				$CFLAG[count($_SESSION['CFLAG1'])] = $cflag;
			}
			$_SESSION['P1'] = $P;
			$_SESSION['Q1'] = $Q;
			$_SESSION['COLOR1'] = $COLOR;
			$_SESSION['SIZE1'] = $SIZE;
			$_SESSION['CFLAG1'] = $CFLAG;
		}
		else
		{
			$P[0] = $id;
			$Q[0] = $q;
			$COLOR[0] = $c;
			$SIZE[0] = $s;
			$CFLAG[0] = $cflag;
			$_SESSION['P1'] = $P;
			$_SESSION['Q1'] = $Q;
			$_SESSION['COLOR1'] = $COLOR;
			$_SESSION['SIZE1'] = $SIZE;
			$_SESSION['CFLAG1'] = $CFLAG;
		}
	}
	
	## 33 ##
	function GTG_remove_from_cart1($id)
	{
		
		if(isset($_SESSION['P1']))
		{
			$P = $_SESSION['P1'];
			$Q = $_SESSION['Q1'];
			$COLOR = $_SESSION['COLOR1'];
			$SIZE = $_SESSION['SIZE1'];
			
			$P_temp;
			$Q_temp;
			$COLOR_temp;
			$SIZE_temp;
			
			$count = 0;
			
			if(count($P) == 1)
			{
				session_unregister('P1');
				session_unregister('Q1');
				session_unregister('COLOR1');
				session_unregister('SIZE1');
			}
			else
			{
				for($i=0;$i<count($P);$i++)
				{
					if($P[$i] != $id)
					{
						$P_temp[$count] = $P[$i];
						$Q_temp[$count] = $Q[$i];
						$COLOR_temp[$count] = $COLOR[$i];
						$SIZE_temp[$count] = $SIZE[$i];
						$count++;
					}
				}
				$_SESSION['P1'] = $P_temp;
				$_SESSION['Q1'] = $Q_temp;
				$_SESSION['COLOR1'] = $COLOR_temp;
				$_SESSION['SIZE1'] = $SIZE_temp;
			}
			
		}
	}
	
	## 34 ##
	function remove_dup($pagename)
	{
		$p = isset($_SESSION['P1']) ? $_SESSION['P1'] : 0;
		if($p > 0)
		{ 
			for($i=0;$i<count($p);$i++)
			{	
				$sku = trim($p[$i]);
				$q = "select pname from product where sku like '".$sku."'";
				$r = mysql_query($q);
				if(mysql_num_rows($r) > 0)
				{
					while($r1 = mysql_fetch_array($r))
					{
						$pname = trim($r1['pname']);
						if($pname == $pagename)
						{
							GTG_remove_from_cart1($sku);
						}
					}
				}
			}
		}
	}
	
	## 35 ##
	function check_more($id)
	{
		$q = "select * from stepimage where sid=".$id;
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 36 ##
	function GTG_get_galleryname($id)
	{
		$q = "select title from gallery where id=".$id;
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
		{
			while($r1 = mysql_fetch_array($r))
			{
				return trim($r1['title']);
			}
		}
	}
	
	## 37 ##
	function GTG_check_date($date)
	{
		$q = "select * from event where date='".$date."'";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
			return true;
		else
			return false;
	}
	
	## 38 ##
	function GTG_get_username($id)
	{
		$q = "select `fname` from `users` WHERE `id`='".$id."'";
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
		{
			while($r1 = mysql_fetch_array($r))
			{
				return trim($r1['fname']);
			}
		}
	}
	
	## 39 ##
	function GTG_get_gallerydesc($id)
	{
		$q = "select desc1 from gallery where id=".$id;
		$r = mysql_query($q);
		if(mysql_num_rows($r) > 0)
		{
			while($r1 = mysql_fetch_array($r))
			{
				return trim(stripslashes($r1['desc1']));
			}
		}
	}
	?>