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
    <link rel="stylesheet" href="css/about.css" type="text/css" media="all">
    
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
    <div id="wrap">
    <!-- HEADER -->
        <? include("templates/header.php");?>

    <!-- CONTENT -->
        <div id="content">
            <div id="wrap">
                <section class="about_us">
                    <h2 class="page_title"><? echo $PAGETITLE; ?></h2>
                    <p><strong>toshi's Living Room</strong> is committed to bringing arts, entertainment, and flair to all those who seek opportunities to showcase and improve their talents. We believe that art should be accessible to all. That's why we provide a great venue for talents of all kinds. Whether you sing, dance, act or have any other valuable skills that you want to perform and share with us, at <strong>toshi's Living Room</strong> we will give you your chance! Our young, creative, and dynamic team provides not only venues but also offers you a merit-based and competitive wage.</p>
                    <p>All of our events will take place in <strong>toshi's Living Room</strong>, located in New York's exclusive Flatiron Hotel on 26th Street and Broadway. The hotel offers a spacious place to allow you what it takes to be a successful artist and maybe even get discovered.</p>
                    <p>We are seeking to produce original plays, manuscripts, and live TV shows: light entertainment by day and amusing dinner‐theater by night.</p>
                    <p>To learn more about our mission and shows, visit our <a href="https://www.facebook.com/pages/Toshis-Living-Room/380277968659709" target="_blank">Facebook page</a> and write us with inquiries, feedback, or for assistance applying to <strong>toshi's Living Room</strong>. Don't forget to check out our special offers and post videos or pictures that display your talents.</p>
                    <p>We are looking forward for your questions and comments.</p>
                </section>
                <section class="location">
                    <h2 class="section_title">Location</h2>
                    <div class="map_wrapper">
                        <div id="map_canvas">
                            <!-- map inserted dynamically -->
                        </div>
                    </div>
                    <ul>
                        <li><strong>toshi's Living Room</strong></li>
                        <li>9 W. 26th Street</li>
                        <li>New York, NY 10010</li>
                    </ul>
                    <ul>
                        <li>212.839.8000</li>
                        <li>
                            <a href="mailto:<? echo $REPRESENTATIVE_MAIL; ?>"><? echo $REPRESENTATIVE_MAIL; ?></a>
                        </li>
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
        </div>
    </div>
<!-- FOOTER -->
    <? include("templates/footer.php");?>

</body>
</html>