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
                    <li><a href="/views/Vendors.html">Vendors</a></li>
                    <li><a href="/views/News.html">News</a></li>
                    <li><a href="/views/Applications.php">Applications</a></li>
                    <li><a href="/views/Shows.html">Shows</a></li>
                    <li><a href="/views/Map.html">Map</a></li>
                    <li><a href="/views/Sponsors.html">Sponsors</a></li>
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

                    $conn = mysqli_connect($host, $user, $password);

                    if(!$conn)
                        die("Connection failed: " . mysqli_connect_error());

                    echo "Connected succesfully";
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