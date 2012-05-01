<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
    $ACTIVEPAGE='login';
    $PAGETITLE='Sign In';
    ?>
    
<!-- HEAD -->
     <? include("templates/head.php");?>
     
     <script src="js/login.js" type="text/javascript"></script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <section class="sign_in">
                <form id="login_form">
                    <div class="field msg">
                        <p id="msg"></p>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="text" name="email" id="email" />
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" name="password" id="password" />
                    </div>
                    <div class="field">
                        <a href="forgot_password.php">Forgot Password?</a>
                    </div>
                    <div class="field">
                        <!-- <input type="hidden" name="HidRegUser" id="HidRegUser" value="0" /> -->
                        <a href="#" id="submit" class="button red">Sign In</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
</body>
</html>