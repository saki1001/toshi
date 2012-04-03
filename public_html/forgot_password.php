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
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="section_title"><? echo $PAGETITLE; ?></h2>
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
<!-- FOOTER -->
    <? include("templates/footer.php");?>
<!-- SCRIPT -->
<script language="javascript" type="text/javascript">
    $(document).ready( function() {
        
        var submitForm = function() {
            var email = $('form #email');
            var emailVal = email.val();
            
            // unbind to prevent multiple submits
            $('#submit').unbind('click', submitForm);
            
            if(emailVal === '') {
                $('#msg').addClass('active')
                    .html('Please enter your email address.');
                email.focus();
                // rebind
                $('#submit').bind('click', submitForm);
                return false;
            }
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val()))) {
                $('#msg').addClass('active')
                    .html('Please enter a proper email address.');
                email.focus();
                // rebind
                $('#submit').bind('click', submitForm);
                return false;
            }
            
            $.ajax({
                url: '../ajax_forgot.php',
                type: "POST",
                data: {
                  email: emailVal
                },
                dataType: 'json',
                success: function(data) {
                    if(data['status'] === 'NOT_FOUND') {
                        $('#msg').addClass('active')
                            .html('Sorry, we can\'t find that email in our records.');
                        // rebind submit
                        $('#submit').bind('click', submitForm);
                        
                    } else if(data['status'] === 'SUCCESS') {
                        // send to account page
                        $('#msg').addClass('active')
                            .html('Your password has been emailed to ' + emailVal + ".");
                        
                    } else {
                        $('#msg').addClass('active')
                            .html('Unknown error. Please contact us.');
                        // rebind submit
                        $('#submit').bind('click', submitForm);
                        
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.statusText);
                      alert(xhr.responseText);
                      alert(xhr.status);
                      alert(thrownError);
                  }
            });
            
            return false;
        };
        
        $('#submit').bind('click', submitForm);
    });
</script>
</body>
</html>