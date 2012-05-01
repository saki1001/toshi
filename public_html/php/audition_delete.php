<?
    include("../../connect.php");
    if($_REQUEST['Did']>0) {
        $Did=trim(mysql_real_escape_string($_REQUEST['Did']));
        $Tid=trim(mysql_real_escape_string($_REQUEST['Tid']));
        
        $deleteSelectedQuery = "DELETE FROM events_timeslots_selected WHERE id='$Did' AND userid='".$_SESSION['UsErId']."'";
        $deleteSelectedResult = mysql_query($deleteSelectedQuery);
        
        $updateSlotQuery = "UPDATE events_timeslots SET status='Available', userid='0' WHERE id='$Tid' ";
        $updateSlotResult=mysql_query($updateSlotQuery);
        
        header("location:../my_account.php?msg=Your audition has been deleted successfully.");
        exit;
    }
?>