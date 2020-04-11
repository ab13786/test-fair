<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiawanis Fair - Applications</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/stylesheets/applications.css">
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

        <div class="tab">
            <button class="tablinks" onclick="opentab(event,'lego')">Lego Competition</button>
            <button class="tablinks" onclick="opentab(event,'parade')">Parade</button>
        </div>

        <script>
            function opentab(evt, tabName) {

              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(tabName).style.display = "block";
              evt.currentTarget.className += " active";
            }
        </script>

        <div id="lego" class="tabcontent">
            <button class="btn"><i class="fa fa-download"></i> Download</button>
            <section style="clear:both;">
                <h1>Query for all lego applications in database</h1>
                <?php
                    $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                    $port = "3306";
                    $user = "fair_admin";
                    $password = "KiwanisClub";
                    $db = "applications";

                    $con = new mysqli($host, $user, $password, $db);
                    $sql = "SELECT * From applications.LegoApp";
                    $results = $con->query($sql);

                    if($results->num_rows>0){
                        echo "<table><tr><th>LegoAppID</th><th>Builder 1 Name</th><th>Builder 2 Name</th><th>DOB Builder 1</th><th>Address</th><th>Phone Number</th><th>Email</th></tr>";
                        while($row = $results->fetch_assoc()){
                            echo "<tr><td>". $row['LegoAppID']. "</td><td>". $row['Builder1FN']. " ". $row['Builder1LN']. "</td><td>". $row['Builder2FN']. " ". $row['Builder2LN']. "</td><td>". $row['DOBuilder1']. "</td><td>". $row['Address']. "</td><td>". $row['PhoneNumber']. "</td><td>". $row['Email']. "</td></tr>";
                        }
                        echo "</table>";
                    }

                    $con->close();
                ?>
            </section>
        </div>

        <div id="parade" class="tabcontent">
            <button class="btn"><i class="fa fa-download"></i> Download</button>
            <section style="clear:both;">
                <h1>Query for all parade applications in database</h1>
            </section>
        </div>
    </body>
</html>