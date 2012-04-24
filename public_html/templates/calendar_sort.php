<?
    if($_REQUEST['cdate']!='' || $_REQUEST['viewtype']!='') {
        if($_REQUEST['viewtype']=="week") {
            $curdate = $_REQUEST['cdate'];
            $newdate = strtotime('+6 days', strtotime($curdate));
            $afterweekdate = date('Y-m-d' , $newdate);
            $andqry = " and ( (startdate BETWEEN '".$_REQUEST['cdate']."' and '".$afterweekdate."' ) or ( (startdate<='".$_REQUEST['cdate']."' and enddate='0000-00-00') or (enddate!='0000-00-00' and (enddate BETWEEN '".$_REQUEST['cdate']."' and '".$afterweekdate."')) ))  ";
        
        } else if($_REQUEST['viewtype']=="month") {
            $curdate = $_REQUEST['cdate'];
            $newdate = strtotime('+1 month', strtotime($curdate));
            $afterweekdate = date ('Y-m-d' , $newdate );
            $andqry=" and ( (startdate BETWEEN '".$_REQUEST['cdate']."' and '".$afterweekdate."' ) or ( (startdate<='".$_REQUEST['cdate']."' and enddate='0000-00-00') or (enddate!='0000-00-00' and (enddate BETWEEN '".$_REQUEST['cdate']."' and '".$afterweekdate."')  ) ))  ";
        } else if($_REQUEST['viewtype']=="day") {
            $andqry=" and ( (startdate='".$_REQUEST['cdate']."' ) or (enddate!='0000-00-00' and (startdate<='".$_REQUEST['cdate']."' and enddate>='".$_REQUEST['cdate']."')   ))  ";
        } else {
            $andqry=" and ( (startdate BETWEEN '".$_REQUEST['cdate']."' and '".$afterweekdate."' ) or ( (startdate<='".$_REQUEST['cdate']."' and enddate='0000-00-00') or (enddate!='0000-00-00' and (enddate BETWEEN '".$_REQUEST['cdate']."' and '".$afterweekdate."')) ))  ";
        }
    } else {
        $curdate = date("Y-m-d");
        $newdate = strtotime('+6 days', strtotime($curdate));
        $afterweekdate = date('Y-m-d' , $newdate);
        $andqry = " and ( (startdate BETWEEN '" . $curdate . "' and '" . $afterweekdate . "' ) or ( (startdate<='" . $curdate . "' and enddate='0000-00-00') or (enddate!='0000-00-00' and (enddate BETWEEN '" . $curdate . "' and '" . $afterweekdate . "')) ))  ";
    }
?>