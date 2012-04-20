<header>
    <div class="branding">
        <a href="index.php" id="logo">
            <img src="images/toshi-logo-ticket.png" width="158" height"72" alt="Toshi's PlayHouse" />
        </a>
    </div>
    <div class="newsletter_signup">
        <a href="#" id="close_newsletter">
            <img src="images/close_x.png" />
        </a>
        <div id="newsletter_form" class="form">
            <h3>Get Our Newsletter</h3>
            <div id="msg"></div>
            <div class="field">
                <input type="email" name="newsletter_email" id="newsletter_email" value="Enter Your Email" />
            </div>
            <div class="field">
                <a href="#" id="newsletter_submit" class="button red">Submit</a>
            </div>
        </div>
    </div>
    <nav id="top_nav">
        <ul>
            <? if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0){?><!-- No Welcome -->
            <? }else{?><li>Welcome <a href="my_account.php" >       <?=ucfirst(stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId'])));?> <?=ucfirst(stripslashes(GetName1("users","lastname","id",$_SESSION['UsErId'])));?>
                </a></li><? } ?>
            <li><a href="#" id="newsletter_signup_link">Get Our Newsletter</a></li>
            <li <? if($ACTIVEPAGE=='cart'){?>class="active"<? }?> ><a href="cart.php">Cart</a></li>
            <li <? if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0){?>
                <? if($ACTIVEPAGE=='login'){?>class="active"<? }?>><a href="login.php">Sign In</a>
                <? }else{?>><a href="php/logout.php">Logout</a><? }?>
            </li>
            <li class="social">
                <a href="https://www.facebook.com/pages/Toshis-Living-Room/380277968659709" title="Facebook">
                    <img src="images/icon-facebook.gif" width="18" height="18" alt="f" />
                </a>
            </li>
            <li class="social">
                <a href="http://twitter.com/#!/toshislivingrm" title="Twitter">
                    <img src="images/icon-twitter.gif" width="18" height="18" alt="t" />
                </a>
            </li>
        </ul>
    </nav>
    <nav id="menu">
        <ul>
            <li <? if($ACTIVEPAGE=='home'){?>class="active"<? }?> ><a href="index.php">Home</a></li>
            <li <? if($ACTIVEPAGE=='events'){?>class="active"<? }?>><a href="events.php">Events</a></li>
            <li <? if($ACTIVEPAGE=='gallery'){?>class="active"<? }?>><a href="gallery.php">Gallery</a></li>
            <li <? if($ACTIVEPAGE=='news'){?>class="active"<? }?>><a href="news.php">News</a></li>
            <li <? if($ACTIVEPAGE=='about'){?>class="active"<? }?>><a href="about.php">About</a></li>
            <li <? if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0){?>
                    <? if($ACTIVEPAGE=='register'){ ?>class="active"<? }?>><a href="register.php">Auditions</a>
                <? } else{ if($ACTIVEPAGE=='my_account'){?>class="active"<? }?>><a href="my_account.php">My Account</a><? }?>
            </li>
        </ul>
    </nav>
</header>
