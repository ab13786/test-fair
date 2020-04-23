<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiawanis Fair - Map</title>

        <link rel="stylesheet" type="text/css" href="/stylesheets/map.css">

       <!-- <script src="/views/map.js"></script> -->
    </head>
    <body>
        <header>
                <nav>
                    <ul>
                        <li><a href="/views/main.html" >Home</a></li>
                        <li><a href="/views/Vendors.php">Vendors</a></li>
                        <li><a href="/views/News.php">News</a></li>
                        <li><a href="/views/Applications.php">Applications</a></li>
                        <li><a href="/views/Shows.php">Shows</a></li>
                        <li><a href="/views/Map.php">Map</a></li>
                        <li><a href="/views/Sponsors.php">Sponsors</a></li>
                    </ul>
                </nav>
            </header>

        <section>

                <fieldset>
                    <legend>Fair Ground map</legend>

                    <center><p style="text-align:center;"><h2>Fairgrounds Map</h2></p></center>



					<!--div to hold the map. -->
					<div id="map" style="width:100%;height:500px;"></div>
					<!--uses google api key to show map.-->
					<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC17KFQoZPMaWr1Fc3A81nTm9k3TpJ5FEY&callback=initMap"
							  type="text/javascript"></script>

                    <!--script for map. -->
                    <!-- <script> -->
                     //   initMap();
                    <!--</script> -->

                    <?php
                        $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                        $port = "3306";
                        $user = "fair_admin";
                        $password = "KiwanisClub";
                        $db = "applications";

                        $con = new mysqli($host, $user, $password, $db);
                        $sql = "SELECT * From applications.mapInfo";
                        $results = $con->query($sql);

                        echo "<script>";
                            echo "function initMap() {";
                                //location for the map to open. fair for center.
                                 echo "var fairLoc = {lat: 32.395958,lng: -81.753546};";
                                //creates a google map with fair location.
                                echo "var map = new google.maps.Map(document.getElementById("map"), {zoom: 17, center: fairLoc,  mapTypeId: 'satellite'});";
                                //gives the map a listener to when someone clicks to add a marker.
                                echo "map.addListener('click', function(e) {";
                                //prompts the user to enter a name for the location.
                                echo "var name = prompt('Location name:');";

                        if($results->num_rows>0){
                            while($row = $results->fetch_assoc()){
                                $name = $row['name'];
                                $spot = $row['latLng'];
                                    echo "addMarker(" .$spot . ", map, ". $name.");";
                            }
                        }
                            echo "addMarker(e.latLng, map, name);";
                            echo "});";

                             echo "function addMarker(latLng, map, name) {";

                            //places a marker with location fom click.
                             echo "var marker = new google.maps.Marker({";
                             echo "position: latLng,";
                             echo "map: map,";
                             echo "draggable: true";
                         echo "});";
                            //moves center of map to the new marker.
                             echo "map.panTo(latLng);";
                            //adds an info window to the marker. gives the location a name.
                             echo "marker.info = new google.maps.InfoWindow({";
                             echo "content: '<h2>' + name + '</h2>'";
                             echo "});";

                            //this is an event listener for double clicking a marker.
                             echo "google.maps.event.addListener(marker, 'dblclick', function() {";
                            //prompts user to change name of marker. (this will need to be saved when changed.)
                             echo "name = prompt('Location Name:')";
                             echo "marker.info.setContent('<h2>' + name + '</h2>');";
                             echo "});";

                            //event listener to right click to delete marker.
                             echo "google.maps.event.addListener(marker, 'rightclick', function() {";
                            //if user says okay to prompt, marker will be deleted.
                             echo "if(confirm("Do you want to delete marker?"))";
                                 echo "marker.setMap(null);";
                                //code to remove marker form database.
                             echo "});";

                            //mouseover marker info window pops up.
                             echo "google.maps.event.addListener(marker, 'mouseover', function() {";
                             echo "marker.info.open(map, marker);";
                             echo "});";

                            //moveout marker to close info window.
                             echo "google.maps.event.addListener(marker, 'mouseout', function() {";
                             echo "marker.info.close(map, marker);";
                             echo "});";
                        }
                        echo "</script>";
                        $con->close();
                    ?>

                </fieldset>
        </section>
    </body>
</html>