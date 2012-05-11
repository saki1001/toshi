<? include("../connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- VARIBLES -->
    <?
        $ACTIVEPAGE='about';
        $PAGETITLE='About Us';
        
        $staticPageId = '1';
        $staticPageQuery = "SELECT * FROM staticpage WHERE id='$staticPageId' ";
        $staticPageResult = mysql_query($staticPageQuery);
        $staticPageRow = mysql_fetch_array($staticPageResult);
        
        $staticPageName = stripslashes($staticPageRow['name']);
        $staticPageContent = stripslashes($staticPageRow['content']);
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
                  title:"toshi's Living Room and Penthouse"
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
                    <!-- TITLE SET IN SITEADMIN -->
                    <h2 class="page_title"><? echo $staticPageName; ?></h2>
                    <!-- CONTENTS SET IN SITEADMIN -->
                    <? echo $staticPageContent; ?>
                </section>
                <section class="location">
                    <h2 class="section_title">Location</h2>
                    <div class="map_wrapper">
                        <div id="map_canvas">
                            <!-- map inserted dynamically -->
                        </div>
                    </div>
                    <ul>
                        <li><strong>toshi's Living Room and Penthouse</strong></li>
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