<header>
    <div class="branding">
        <a href="index.php" id="logo">
            <img src="images/toshi-logo.png" width="141" height"72" alt="Toshi's PlayHouse" />
        </a>
    </div>
    <nav id="top_nav">
        <ul>
            <? if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0){?><!-- No Welcome -->
            <? }else{?><li>Welcome <a href="myaccount.php" style="color:#CCCCCC;"><?=ucfirst(stripslashes(GetName1("users","firstname","id",$_SESSION['UsErId'])));?> <?=ucfirst(stripslashes(GetName1("users","lastname","id",$_SESSION['UsErId'])));?></a></li><? } ?>
            <li><a href="#">Get Our Newsletter</a></li>
            <li <? if($ACTIVEPAGE=='cart'){?>class="active"<? }?> ><a href="viewcart.php">Cart</a></li>
            <li <? if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0){?>
                <? if($ACTIVEPAGE=='login'){?>class="active"<? }?>><a href="login.php">Sign In</a>
                <? }else{?>><a href="php/logout.php">Logout</a><? }?></li>
        </ul>
    </nav>
    <nav id="menu">
        <ul>
            <li <? if($ACTIVEPAGE=='home'){?>class="active"<? }?> ><a href="index.php">Home</a></li>
            <li <? if($ACTIVEPAGE=='events'){?>class="active"<? }?>><a href="events.php">Events</a></li>
            <li <? if($ACTIVEPAGE=='gallery'){?>class="active"<? }?>><a href="gallery.php">Gallery</a></li>
            <li <? if($ACTIVEPAGE=='news'){?>class="active"<? }?>><a href="news.php">News</a></li>
            <li <? if(!$_SESSION['UsErId'] || $_SESSION['UsErId']<0){?>
                    <? if($ACTIVEPAGE=='register'){ ?>class="active"<? }?>><a href="register.php">Auditions</a>
                <? } else{ if($ACTIVEPAGE=='myaccount'){?>class="active"<? }?>><a href="myaccount.php">Account</a><? }?>
            </li>
            <li <? if($ACTIVEPAGE=='about'){?>class="active"<? }?>><a href="about.php">About</a></li>
        </ul>
    </nav>
</header>
