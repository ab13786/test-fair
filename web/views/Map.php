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
                    <script>
                        initMap();
                    </script>

                </fieldset>
        </section>
    </body>
</html>