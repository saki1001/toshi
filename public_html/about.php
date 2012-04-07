<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='about';
        $PAGETITLE='About Us';
    ?>
    
<!-- GOOGLE MAP -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
<!-- HEAD -->
    <? include("templates/head.php");?>
    
    <script type="text/javascript">
        function initialize() {
            // coordinates: 200,8,40.7438656,-73.9894537
            var latlng = new google.maps.LatLng(40.7438,-73.9894);
            var settings = {
                zoom: 15,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };
            var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
            var companyPos = new google.maps.LatLng(40.7438,-73.9894);
              var companyMarker = new google.maps.Marker({
                  position: companyPos,
                  map: map,
                  title:"Toshi's Living Room"
              });
            
        }
        
        $(document).ready( function() {
            initialize();
        });
    </script>
    
</head>

<body id="<? echo $ACTIVEPAGE; ?>">
<!-- HEADER -->
    <? include("templates/header.php");?>

<!-- CONTENT -->
    <div id="content">
        <section class="location">
            <h2 class="section_title">Location</h2>
            <div class="map_wrapper">
                <div id="map_canvas">
                    <!-- map inserted dynamically -->
                </div>
            </div>
        </section>
        <section class="about_us">
            <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec elit ac neque convallis aliquam. Aliquam risus massa, scelerisque a volutpat sit amet, fermentum ut lacus. Integer ut erat neque, eget dictum lacus. Suspendisse pulvinar pulvinar ante, egestas ultrices diam vulputate et. Nunc euismod quam a sapien euismod sollicitudin. Sed arcu justo, fringilla ut malesuada sed, bibendum eleifend nunc.</p>
            <p>Quisque sapien orci, molestie vel tempor quis, rutrum nec ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum imperdiet convallis ipsum, ac tempus arcu ornare non. Proin id elit tellus. Integer sed ullamcorper nunc. Aenean ut rutrum dolor. In cursus eros nibh. Cras lacinia venenatis risus blandit feugiat.</p>
        </section>
        <section class="contact_us">
            <h2 class="section_title">Contact Us</h2>
            <ul>
                <li><strong>Toshi's Living Room</strong></li>
                <li>9 W. 26th Street</li>
                <li>New York, NY 10010</li>
            </ul>
            <ul>
                <li>212.839.8000</li>
                <li>toshi@toshislivingroom.com</li>
            </ul>
        </section>
        <!-- <section class="contact_us">
            <h2 class="section_title">Contact Us</h2>
            <form id="contact_form">
                <div class="field">
                    <label>Your Name</label>
                    <input type="text" class="input">
                </div>
                <div class="field">
                    <label>Your E-mail</label>
                    <input type="text" class="input">
                </div>
                <div class="field">
                    <label>Your Website</label>
                    <input type="text" class="input">
                </div>
                <div class="field">
                    <label>Your Message</label>
                    <textarea name="textarea" cols="1" rows="1"></textarea>
                </div>
                <a href="#" class="button red" onClick="document.getElementById('contact_form').submit()">Send</a>
                <a href="#" class="button red" onClick="document.getElementById('contact_form').reset()">Clear</a>
            </form>
        </section> -->
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>