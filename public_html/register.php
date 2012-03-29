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
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
        <section id="register_form">
            <form>
                <h3>General Info</h3>
                <div class="field full">
                    <label>Account Type</label>
                    <select class="account_type">
                        <?=GetDropdown(name,name,accounttype,"  order by name='other' asc,name asc",stripslashes($_REQUEST['accounttype']));?>
                    </select>
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
                <div class="field half">
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
                <div class="field half">
                    <label>Gender</label>
                    <label class="gender male">Male</label>
                    <input type="radio" name="gender" value="male" />
                    <label class="gender female">Female</label>
                    <input type="radio" name="gender" value="female"/>
                </div>
                <h3>Measurements</h3>
                <div class="field half">
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
                <div class="field half">
                    <label>Weight</label>
                    <input type="text" name="weight" />
                </div>
                <div class="field half">
                    <label>Bust</label>
                    <input type="text" name="bust" />
                </div>
                <div class="field half">
                    <label>Hips</label>
                    <input type="text" name="hips" />
                </div>
                <div class="field half">
                    <label>Inseam</label>
                    <input type="text" name="inseam" />
                </div>
                <div class="field half">
                    <label>Shoe Size</label>
                    <input type="text" name="shoe_size" />
                </div>
                <div class="field half">
                    <label>Neck</label>
                    <input type="text" name="neck" />
                </div>
                <div class="field half">
                    <label>Sleeve</label>
                    <input type="text" name="sleeve" />
                </div>
                <div class="field full">
                    <a href="#" class="button red">Register</a>
                </div>
            </form>
        </section>
        <section id="sign_in_box">
            <div class="wrapper">
                <h3>Already a Member?</h3>
                <a class="button red" href="#">Sign In</a>
            </div>
        </section>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>