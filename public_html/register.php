<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='register';
        $PAGETITLE='Register for Auditions';
    ?>
<!-- HEAD -->
    <? include("templates/head.php");?>
    
    <script src="js/register.js" type="text/javascript"></script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>
        <link rel="stylesheet" href="css/register.css" type="text/css" media="all">

    <!-- CONTENT -->
        <div id="content">
            <section class="instructions">
                <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
                <p><strong>toshi's Living Room</strong> invites performance artists of all genres to come in and showcase their talent on the magnetic stage in the lounge of the Flatiron Hotel.  We are currently looking for musicians with a flare to engage the crowd and keep the dance floor full all night long.  This beautiful venue is open to a hip, modish crowd who knows how to party!</p>
                <p>Do you have a flare for playing funk, pop covers, and current mainstream music? Well, we are looking just for you! Full bands, solo singers, contemporary dancers, and all original acts are welcome!</p>
                <p>Auditions take place every (fill in day), and we invite you to take the stage to perform your most lively dance and modern musical acts.</p>
                <p><strong>toshi's Living Room</strong>...Will you be the next star?</p>
                </p>
            </section>
            <section id="sign_in_box">
                <div class="wrapper">
                    <h3>Already a Member?</h3>
                    <a class="button red" href="login.php">Sign In</a>
                </div>
            </section>
            <section id="register_form_wrapper">
                <form id="register_form" name="register_form" enctype="multipart/form-data" method="post">
                    <div class="form_section">
                        <h3>Account Info</h3>
                        <div class="form_standard field">
                            <label>Account Type</label>
                            <select id="accounttype" name="accounttype">
                                <option value="">Select Your Account</option>
                                <?=GetDropdown(name,name,accounttype,"  order by name='other' asc,name asc",stripslashes($_REQUEST['accounttype']));?>
                            </select>
                        </div>
                        <div class="form_other field other">
                            <label>Please specify account type:</label>
                            <input type="text" name="accounttype_other" id="accounttype_other" />
                        </div>
                        <div class="form_standard field">
                            <label>Email</label>
                            <input type="text" name="email" id="email" />
                        </div>
                        <div class="form_standard field">
                            <label>Password</label>
                            <input type="password" name="password" id="password" />
                        </div>
                    </div>
                    <div class="form_section">
                        <h3>Personal Info</h3>
                        <div class="form_standard field">
                            <label>Birthday</label>
                            <select class="date" name="dob_month" id="dob_month">
                                <option value="">MM</option>
                                <? echo getMonth($dobmonth);?>
                            </select>
                            <select class="date" name="dob_day" id="dob_day">
                                <option value="">DD</option>
                                <? echo getDayValue($dobday);?>
                            </select>
                            <select class="date" name="dob_year" id="dob_year">
                                <option value="">YYYY</option>
                                <? echo getYear($dobyear,2,'styear',1900);?>
                            </select>
                        </div>
                        <div class="form_standard field">
                            <label>First Name</label>
                            <input type="text" name="firstname" id="firstname" />
                        </div>
                        <div class="form_standard field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" id="lastname" />
                        </div>
                        <div class="form_standard field gender">
                            <label>Gender</label>
                            <label class="male">Male</label>
                            <input type="radio" name="gender" id="gender1" value="Male" checked="checked"/>
                            <label class="female">Female</label>
                            <input type="radio" name="gender" id="gender2" value="Female"/>
                        </div>
                    </div>
                    <div class="form_section last">
                        <h3>Measurements</h3>
                        <div class="form_standard field">
                            <label>Height</label>
                            <select name="height" id="height">
                                <option value="">Choose Your Height</option>
                                <?
                                for($i="124";$i<220;$i++){
                                    echo '<option value="'.$i.'">'.$i.'cm / '.get_height($i).'';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form_standard field">
                            <label>Weight</label>
                            <input type="text" name="weight" id="weight" />
                        </div>
                        <div class="form_long field">
                            <label>Bust</label>
                            <input type="text" name="bust" id="bust" />
                        </div>
                        <div class="form_long field">
                            <label>Hips</label>
                            <input type="text" name="hips" id="hips" />
                        </div>
                        <div class="form_long field">
                            <label>Inseam</label>
                            <input type="text" name="inseam" id="inseam" />
                        </div>
                        <div class="form_long field">
                            <label>Shoe Size</label>
                            <input type="text" name="shoe_size" id="shoesize" />
                        </div>
                        <div class="form_long field">
                            <label>Neck</label>
                            <input type="text" name="neck" id="neck" />
                        </div>
                        <div class="form_long field">
                            <label>Sleeve</label>
                            <input type="text" name="sleeve" id="sleeve" />
                        </div>
                        <div class="form_standard field captcha">
                            <label>Enter the Code:</label>
                            <img src="../CaptchaSecurityImages.php" />
                            <input type="text" name="recaptcha_response_field2" id="recaptcha_response_field2" />
                        </div>
                        <div class="form_standard field checkbox">
                            <input type="checkbox" name="newsletter" value="Y"  checked="checked"/>
                            <label>I'm happy to receive newsletters from <? echo $SITE_NAME;?>.</label>
                        </div>
                        <div class="field msg">
                            <p id="msg"></p>
                        </div>
                        <div class="field submit">
                            <input type="hidden" name="HidRegUser" id="HidRegUser" value="0">
                            <a href="#" id="submit" class="button red">Register</a>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>
</body>
</html>