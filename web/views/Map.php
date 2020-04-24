<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiawanis Fair - Map</title>

        <link rel="stylesheet" type="text/css" href="/stylesheets/map.css">

        <script src="/views/map.js"></script>
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


                    <?php
                        $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                        $port = "3306";
                        $user = "fair_admin";
                        $password = "KiwanisClub";
                        $db = "applications";

                        $con = new mysqli($host, $user, $password, $db);
                        $sql = "SELECT * From applications.mapInfo;";
                        $results = $con->query($sql);


                        if($results->num_rows>0){
                            while($row = $results->fetch_assoc()){
                                $name = $row['name'];
                                $spot = $row['latLng'];
                                $map = $row['map'];
                                $m1 = $row['mapP1'];
                                $m2 = $row['mapP2'];
                                $m3 = $row['mapP3'];
                                    //echo "<script>alert('name: " .$name." spot: ".$spot." map: ".$m1."\"map\"".$m2."\"satellite\"".$m3."');</script>";
                                    //echo "<script>addMarker(" .$spot . ", " .$m1."\"map\"".$m2."\"satellite\"".$m3 .", '". $name."');</script>";
                                    echo "<script>addMarker(" .$spot . ", '" . $name."');</script>";

                            }
                        }
                        $con->close();
                    ?>

                    <script>
                        initMap();
                     </script>

                </fieldset>
        </section>
    </body>
</html>