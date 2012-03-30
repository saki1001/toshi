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
    
    <script type="text/javascript">
        $(document).ready( function() {
            
            $('#account_type').change( function(val) {
                console.log($(this).val());
                var val = $(this).val();
                if(val=="Other") {
                    $('#register_form').addClass('other');
                } else {
                    
                }
                
                if(val=="Actors" || val=="tosh-ette" || val=="tosh-hunk" ) {
                    console.log('accept');
                    $('#register_form').addClass('extended');
                } else {
                    if($('#register_form').hasClass('extended')) {
                        $('#register_form').removeClass('extended');
                    }
                }
                
            });
            
        });
    </script>
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <section class="instructions">
            <h2 class="section_title"><? echo $PAGETITLE; ?></h2>
            <p>Suspendisse euismod mollis posuere. Aliquam elementum diam eu ligula volutpat porta tincidunt purus commodo. In hac habitasse platea dictumst. Phasellus iaculis dictum urna, eget elementum justo posuere in. Maecenas non lectus dui, convallis interdum metus.</p>
        </section>
        <section id="sign_in_box">
            <div class="wrapper">
                <h3>Already a Member?</h3>
                <a class="button red" href="#">Sign In</a>
            </div>
        </section>
        <section id="register_form">
            <form>
                <div class="form_section">
                    <h3>General Info</h3>
                    <div class="field">
                        <label>Account Type</label>
                        <select id="account_type">
                            <option value="default">Select Your Account</option>
                            <?=GetDropdown(name,name,accounttype,"  order by name='other' asc,name asc",stripslashes($_REQUEST['accounttype']));?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Birthday</label>
                        <select class="date" name="dob_month">
                            <option value="default">MM</option>
                            <? echo getMonth($dobmonth);?>
                        </select>
                        <select class="date" name="dob_day">
                            <option value="default">DD</option>
                            <? echo getDayValue($dobday);?>
                        </select>
                        <select class="date" name="dob_year">
                            <option value="default">YYYY</option>
                            <? echo getYear($dobyear,2,'styear',1900);?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Gender</label>
                        <label class="gender male">Male</label>
                        <input type="radio" name="gender" value="male" checked="checked"/>
                        <label class="gender female">Female</label>
                        <input type="radio" name="gender" value="female"/>
                    </div>
                    <div class="field">
                        <label>First Name</label>
                        <input type="text" name="firstname" />
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input type="text" name="lastname" />
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="text" name="email" />
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="text" name="password" />
                    </div>
                </div>
                <div class="form_section">
                    <h3>Measurements</h3>
                    <div class="field">
                        <label>Height</label>
                        <select>
                            <option value="default">Choose Your Height</option>
                            <?
                            for($i="124";$i<220;$i++){
                                echo '<option value="'.$i.'">'.$i.'cm / '.get_height($i).'';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Weight</label>
                        <input type="text" name="weight" />
                    </div>
                    <div class="form_long field">
                        <label>Bust</label>
                        <input type="text" name="bust" />
                    </div>
                    <div class="form_long field">
                        <label>Hips</label>
                        <input type="text" name="hips" />
                    </div>
                    <div class="form_long field">
                        <label>Inseam</label>
                        <input type="text" name="inseam" />
                    </div>
                    <div class="form_long field">
                        <label>Shoe Size</label>
                        <input type="text" name="shoe_size" />
                    </div>
                    <div class="form_long field">
                        <label>Neck</label>
                        <input type="text" name="neck" />
                    </div>
                    <div class="form_long field">
                        <label>Sleeve</label>
                        <input type="text" name="sleeve" />
                    </div>
                </div>
                <div class="field full">
                    <a href="#" class="button red">Register</a>
                </div>
            </form>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>