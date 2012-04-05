<?
    include("../../connect.php");
    $userQuery="SELECT id,approve FROM users WHERE email='".trim(addslashes($_POST['email']))."' and password='".trim($_POST['password'])."'";
    $userResult=mysql_query($userQuery);
    $totalRows=mysql_affected_rows();
    
    if($totalRows>0) {
        $userRow=mysql_fetch_object($userResult);
        if($userRow->approve=="Y") {
            $_SESSION['UsErId']=$userRow->id;
            header('Content-type: application/json');
            echo '{"status": "SUCCESS"}';
            exit;
        }    
        else {
            header('Content-type: application/json');
            echo '{"status": "ERROR_CONFIRM"}';
            exit;
        }
    } else {
        header('Content-type: application/json');
        echo '{"status": "ERROR_INVALID"}';
        exit;
    }
?>