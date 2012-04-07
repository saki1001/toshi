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
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
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
<!-- FOOTER -->
    <? include("templates/footer.php");?>
<!-- SCRIPT -->
    <script language="javascript" type="text/javascript">
        $(document).ready( function() {            
            
            var submitForm = function() {
                var email = $('form #email');
                var password = $('form #password');
                var emailVal = email.val();
                var passwordVal = password.val();
                
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
                if(passwordVal === '') {
                    $('#msg').addClass('active')
                        .html("Please enter your password.");
                    password.focus();
                    // rebind
                    $('#submit').bind('click', submitForm);
                    return false;
                }
                
                $.ajax({
                    url: 'php/login_submit.php',
                    type: "POST",
                    data: {
                      email: emailVal,
                      password: passwordVal
                      },
                    dataType: 'json',
                    success: function(data) {
                        if(data['status'] === 'ERROR_INVALID') {
                            $('#msg').addClass('active')
                                .html('Invalid email or password.');
                            // rebind submit
                            $('#submit').bind('click', submitForm);
                            
                        } else if(data['status'] === 'ERROR_CONFIRM') {
                            $('#msg').addClass('active')
                                .html('Please check your email and confirm your account.');
                            // rebind submit
                            $('#submit').bind('click', submitForm);
                                
                        } else if(data['status'] === 'SUCCESS') {
                            // send to account page
                            document.location = 'my_account.php';
                            
                        } else {
                            $('#msg').addClass('active')
                                .html('Unable to sign in. Please contact us.');
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