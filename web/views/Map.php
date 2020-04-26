<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiawanis Fair - Map</title>

        <link rel="stylesheet" type="text/css" href="/stylesheets/map.css">

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

					<!--div to hold the map. -->
					<div id="map" style="width:100%;height:500px;"></div>
					<!--uses google api key to show map.-->
					<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC17KFQoZPMaWr1Fc3A81nTm9k3TpJ5FEY&callback=initMap"
							  type="text/javascript"></script>

                    <!--script for map. -->
                    <script>
                         var title = [
                            <?php
                                $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                                $port = "3306";
                                $user = "fair_admin";
                                $password = "KiwanisClub";
                                $db = "applications";

                                $con = new mysqli($host, $user, $password, $db);
                                $sql = "SELECT * From applications.mapInfo;";
                                $results = $con->query($sql);
                                $name = "";

                                if($results->num_rows>0){
                                    while($row = $results->fetch_assoc()){
                                        $name .= "'". $row['name']  . "',";
                                    }
                                }
                                echo $name;
                                $con->close();
                            ?>
                        'ignore'];

                        var lat = [
                            <?php
                                $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                                $port = "3306";
                                $user = "fair_admin";
                                $password = "KiwanisClub";
                                $db = "applications";

                                $con = new mysqli($host, $user, $password, $db);
                                $sql = "SELECT * From applications.mapInfo;";
                                $results = $con->query($sql);
                                $name = "";

                                if($results->num_rows>0){
                                    while($row = $results->fetch_assoc()){
                                        $lat.= "'". $row['lat'] . "',";
                                    }
                                }
                                echo $lat;
                                $con->close();
                            ?>
                        '00.000000'];

                        var lng = [
                            <?php
                                $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                                $port = "3306";
                                $user = "fair_admin";
                                $password = "KiwanisClub";
                                $db = "applications";

                                $con = new mysqli($host, $user, $password, $db);
                                $sql = "SELECT * From applications.mapInfo;";
                                $results = $con->query($sql);
                                $name = "";

                                if($results->num_rows>0){
                                    while($row = $results->fetch_assoc()){
                                        $lng.= "'". $row['lng'] . "',";
                                    }
                                }
                                echo $lng;
                                $con->close();
                            ?>
                        '00.000000'];

                        // function to initiallize map.(
                        function initMap() {
                            //location for the map to open. fair for center.
                            var fairLoc = {lat: 32.395958,lng: -81.753546};
                            //creates a google map with fair location.
                            var map = new google.maps.Map(document.getElementById("map"), {zoom: 17, center: fairLoc,  mapTypeId: 'satellite'});

                            for (var count = 0; count < title.length - 1; count++){
                                addMarker({lat:parseFloat(lat[count]),lng:parseFloat(lng[count])}, map, title[count]);
                            }

                            //gives the map a listener to when someone clicks to add a marker.
                            map.addListener('click', function(e) {
                            //prompts the user to enter a name for the location.
                            var name = prompt('Location name:');
                            //this calls the function that add Marker to the map.
                            addMarker(e.latLng, map, name);
                            });

                            //will need code to get position and name from database.
                            //addMarker(latLng, map, name); --this is the function you will need ones information is pulled.
                        }

                        //function to add markers to map.(latLng needs to be saved to the database with name)
                        function addMarker(latLng, map, name) {

                            //places a marker with location fom click.
                            var marker = new google.maps.Marker({
                            position: latLng,
                            map: map,
                            draggable: true
                        });
                            //moves center of map to the new marker.
                            //map.panTo(latLng);
                            //adds an info window to the marker. gives the location a name.
                            marker.info = new google.maps.InfoWindow({
                            content: '<h2>' + name + '\n' + JSON.stringify(latLng) + '</h2>'
                            }); //added latLng for testing purposes

                            //this is an event listener for double clicking a marker.
                            google.maps.event.addListener(marker, 'dblclick', function() {
                            //prompts user to change name of marker. (this will need to be saved when changed.)
                            name = prompt('Location Name:')
                            marker.info.setContent('<h2>' + name + '</h2>');
                            });

                            //event listener to right click to delete marker.
                            google.maps.event.addListener(marker, 'rightclick', function() {
                            //if user says okay to prompt, marker will be deleted.
                            if(confirm("Do you want to delete marker?"))
                                marker.setMap(null);
                                //code to remove marker form database.
                            });

                            //mouseover marker info window pops up.
                            google.maps.event.addListener(marker, 'mouseover', function() {
                            marker.info.open(map, marker);
                            });

                            //moveout marker to close info window.
                            google.maps.event.addListener(marker, 'mouseout', function() {
                            marker.info.close(map, marker);
                            });
                        }
                 </script>
                <p>Note: if map does not appear reload page.</p>
                </fieldset>

                <fieldset>
                <legend>Add Point</legend>
                    <form action="" method="POST">
                        <label for = "namePoint"> Point Name: </label>
                        <input type="text" id="namePoint" name="namePoint" placeholder="Enter Point Name">

                        <label for = "lat"> Latitude: </label>
                        <input type="text" id="lat" name="lat" placeholder="numbers only">

                        <label for = "long"> Longitude: </label>
                        <input type="text" id="long" name="long" placeholder="numbers only">

                        <section id="submitButtons">
                            <input  name="submit" id="submit" value ="Add Point" type="submit" class="submission">
                        </section>
                    </form>
                </fieldset>

                    <?php
                        $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                        $port = "3306";
                        $user = "fair_admin";
                        $password = "KiwanisClub";
                        $db = "applications";

                        if(isset($_POST['submit'])){
                            $name = $_POST['namePoint'];
                            $lat = $_POST['lat'];
                            $long = $_POST['long'];

                            $con = new mysqli($host, $user, $password, $db);
                            $sql = "INSERT INTO `applications`.`mapInfo` (`name`, `lat`, `lng`) VALUES (" ."'". $name ."', '" .$lat ."' ,'" .$long ."');";
                            $results = $con->query($sql);

                            header("location: /views/Map.php");
                        }
                    ?>

                <fieldset>
                    <legend>Delete Point</legend>
                    <form action="" method="POST">
                        <label for = "del" id="none"> Point Name: </label>
                        <input type="text" id="del" name="del" placeholder="Enter Point Name">

                        <section id="submitButtons">
                            <input type="submit" value="Delete Point" id="delete" name="delete" class="deletion">
                        </section>
                    </form>
                </fieldset>

                <?php
                    $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                    $port = "3306";
                    $user = "fair_admin";
                    $password = "KiwanisClub";
                    $db = "applications";

                    if(isset($_POST['delete'])){
                        $namePoint = $_POST['del'];

                        $con = new mysqli($host, $user, $password, $db);
                        $sql = "SET SQL_SAFE_UPDATES=0;DELETE FROM applications.mapInfo WHERE (`name` = $namePoint);";
                        $results = $con->query($sql);

                        header("location: /views/Map.php");
                    }
                ?>
        </section>
    </body>
</html>