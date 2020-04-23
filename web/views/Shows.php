<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiawanis Fair - Show</title>

        <link rel="stylesheet" href="/stylesheets/shows.css" type="text/css">
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
            <button class="tablinks" onclick="opentab(event,'all')">All Shows</button>
            <button class="tablinks" onclick="opentab(event,'add')">Add Shows</button>
             <!-- <button class="tablinks" onclick="opentab(event,'attendance')">Attendance</button> -->
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

        <div id="all" class="tabcontent">
            <h1>All Shows</h1>
            <form action="" method="POST">
                <label for = "del" id="none"> Delete Row: </label>
                <input type="text" id="del" name="del" placeholder="Enter ID">

                <input type="submit" value="Delete" id="delete" name="delete" class="deletion">
            </form>
            <?php
                    $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                    $port = "3306";
                    $user = "fair_admin";
                    $password = "KiwanisClub";
                    $db = "applications";

                    $con = new mysqli($host, $user, $password, $db);
                    $sql = "SELECT * From applications.Live_Entertainment";
                    $results = $con->query($sql);

                    if($results->num_rows>0){
                        echo "<table><tr><th>EventID</th><th>Event Name</th><th>Event Time</th><th>Event Date</th><th>Description</th></tr>";
                        while($row = $results->fetch_assoc()){
                            echo "<tr><td>". $row['EventID']. "</td><td>". $row['Event Name'].  "</td><td>". $row['Event Time']. "</td><td>". $row['EventDate']. "</td><td>". $row['Description']. "</td></tr>";
                        }
                        echo "</table>";
                    }

                    $con->close();
                ?>
        </div>
        <?php
            $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
            $port = "3306";
            $user = "fair_admin";
            $password = "KiwanisClub";
            $db = "applications";

            if(isset($_POST['delete'])){
                $id = $_POST['del'];

                $con = new mysqli($host, $user, $password, $db);
                $sql = "DELETE FROM applications.Live_Entertainment WHERE (`EventID` = $id);";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>

        <div id="add" class="tabcontent">
            <section>
                <form action="" method="POST">
                    <fieldset>
                        <legend> Shows Update</legend>

                        <label for = "Title"> Title: </label>
                        <input type="text" id="Title" name="showTitle" placeholder="Enter Title">

                        <label for="date">Date: </label>
                        <input type="date" id="date" name="showDate" placeholder="yyyy-mm-dd">

                        <label for="time">Time: </label>
                        <input id="time" name="showTime" type="time" placeholder="hh:mm:ss">

                        <label for="description">Description: </label>
                        <textarea  id="description" name="showDescription" placeholder="Enter Description here"></textarea>

                        <section id="submitButtons">
                            <input  id="submit" value ="Submit" type="submit" name="submit" class="submission">
                        </section>
                    </fieldset>
                </form>
                <br>
		    </section>
        </div>

        <?php
            $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
            $port = "3306";
            $user = "fair_admin";
            $password = "KiwanisClub";
            $db = "applications";

            if(isset($_POST['submit'])){
                $name = $_POST['showTitle'];
                $date = $_POST['showDate'];
                $time = $_POST['showTime'];
                $description = $_POST['showDescription'];

                $con = new mysqli($host, $user, $password, $db);
                $sql = "INSERT INTO `applications`.`Live_Entertainment` (`Event Name`, `Event Time`, `Description`, `EventDate`) VALUES (" ."'". $name ."', '" .$time ."', '" .$description ."', '" .$date ."');";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>

        <div id="attendance" class="tabcontent">
            <h1>Query database for planned show attendance</h1>
        </div>
    </body>
</html>