<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
    $ACTIVEPAGE='login';
    $PAGETITLE='Sign In';
    
    if($_POST['HidRegUser']=="1")
    {
        $query1="select id,approve from users where email='".trim(addslashes($_POST['email']))."' and password='".trim($_POST['password'])."'";
        $res=mysql_query($query1);
        $tot=mysql_affected_rows();
        if($tot>0)
        {
            $Row=mysql_fetch_object($res);
            if($Row->approve=="Y")
            {
                $_SESSION['UsErId']=$Row->id;
                // header("location:$SITE_URL/myaccount.php");
                header("location:myaccount.php");
                exit;
            }    
            else
            {
                // header("location:$SITE_URL/login.php?msg=Please check your email and confirm your account.");
                header("location:login.php?msg=Please check your email and confirm your account.");
                exit;
            }
        }
        else
        {
            // header("location:$SITE_URL/login.php?msg=Invalid email or password.&From=".$_GET['From']."");
            header("location:login.php?msg=Invalid email or password.&From=".$_GET['From']."");
            exit;
        }
    }
    ?>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="section_title"><? echo $PAGETITLE; ?></h2>
        <section class="contact_us">
            <form id="login_form">
                <? if($_REQUEST['msg']!=''){?>
                    <div class="field">
                        <p><? echo $_REQUEST['msg'];?></p>
                    </div>
                <? } ?>
                <div class="field">
                    <label>Email</label>
                    <input type="text" class="input" name="email" id="email">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" id="password">
                </div>
                <div class="field">
                    <a href="forgotpass.php" style="width:200px;text-align:left;">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
                    <input type="submit" name="sbmit" class="button red" value="Sign In" onClick="return valid();" >
                </div>
            </form>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
<!-- SCRIPT -->
    <script language="javascript" type="text/javascript">
    function valid()
    {
        form=document.RegisterForm;
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
        document.RegisterForm.HidRegUser.value='1';
        document.RegisterForm.submit();
        return  true;
    }
    </script>
</body>
</html>