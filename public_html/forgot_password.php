<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
    $ACTIVEPAGE='forgot_password';
    $PAGETITLE='Forgot Your Password?';
    ?>
    
<!-- HEAD -->
     <? include("templates/head.php");?>
     
     <script src="js/forgot_password.js" type="text/javascript"></script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <section class="sign_in">
                <form id="forgot_password_form">
                    <div class="field msg">
                        <p id="msg"></p>
                    </div>
                    <div class="field">
                        <label>Enter Your Email</label>
                        <input type="text" name="email" id="email" />
                    </div>
                    <div class="field">
                        <!-- <input type="hidden" name="HidRegUser" id="HidRegUser" value="0" /> -->
                        <!-- <input type="submit" name="submit" id="submit" class="button red" value="Sign In" /> -->
                        <a href="#" id="submit" class="button red">Submit</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
</body>
</html>