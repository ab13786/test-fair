<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiwanis Fair - Vendors</title>
        <link rel="stylesheet" type="text/css" href="/stylesheets/vendors.css">
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
            <button class="tablinks" onclick="opentab(event,'allFood')">All Food</button>
            <button class="tablinks" onclick="opentab(event,'addFood')">Add Food</button>
            <button class="tablinks" onclick="opentab(event,'allRides')">All Rides</button>
            <button class="tablinks" onclick="opentab(event,'addRides')">Add Rides</button>
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

        <div id="allFood" class="tabcontent">
            <h1>Query for all Food Vendors in database</h1>
            <form action="" method="POST">
                <label for = "del" id="none"> Delete Row: </label>
                <input type="text" id="del" name="del2" placeholder="Enter ID">

                <input type="submit" value="Delete" id="delete" name="delete2" class="deletion">
            </form>
            <?php
                $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                $port = "3306";
                $user = "fair_admin";
                $password = "KiwanisClub";
                $db = "applications";

                $con = new mysqli($host, $user, $password, $db);
                $sql = "SELECT * From applications.foodstalls";
                $results = $con->query($sql);

                if($results->num_rows>0){
                    echo "<table><tr><th>foodstallID</th><th>Name</th><th>Description</th></tr>";
                    while($row = $results->fetch_assoc()){
                        echo "<tr class='notfirst'><td>". $row['foodstallID']. "</td><td>". $row['Name']. "</td><td>". $row['description']. "</td></tr>";
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

            if(isset($_POST['delete2'])){
                $id = $_POST['del2'];

                $con = new mysqli($host, $user, $password, $db);
                $sql = "DELETE FROM applications.foodstalls WHERE (`foodstallID` = $id);";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>

        <div id="addFood" class="tabcontent">
            <h1>Add Food</h1>
            <form action="" method="POST">
                <fieldset>
                    <legend> Add Ride </legend>

                    <label for = "name"> Name: </label>
                    <input type="text" id="name" name="name" placeholder="Enter Name">
                    <br>

                    <textarea  id="text" name="description" placeholder="Enter description here"></textarea>
                    <br>
                    <section id="submitButtons">
                        <input  name="submit2" id="submit" value ="Send" type="submit" class="submission">
                    </section>
                </fieldset>
            </form>
        </div>

        <?php
            $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
            $port = "3306";
            $user = "fair_admin";
            $password = "KiwanisClub";
            $db = "applications";

            if(isset($_POST['submit2'])){
                $name = $_POST['name'];
                $description = $_POST['description'];

                $con = new mysqli($host, $user, $password, $db);
                $sql = "INSERT INTO `applications`.`foodstalls` (`name`, `description`) VALUES (" ."'". $name ."', '" .$description ."');";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>

        <div id="allRides" class="tabcontent">
            <h1>All Rides</h1>
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
                    $sql = "SELECT * From applications.rides";
                    $results = $con->query($sql);

                    if($results->num_rows>0){
                        echo "<table><tr><th>rideID</th><th>Name</th><th>Description</th><th>Height Requirement</th><th>Tickets</th></tr>";
                        while($row = $results->fetch_assoc()){
                            echo "<tr class='notfirst'><td>". $row['rideID']. "</td><td>". $row['name']. "</td><td>". $row['description']. "</td><td>". $row['requirements']. "</td><td>". $row['tickets']. "</td></tr>";
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
                $sql = "DELETE FROM applications.rides WHERE (`rideID` = $id);";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>

        <div id="addRides" class="tabcontent">
            <form action="" method="POST">
                <fieldset>
                    <legend> Add Ride </legend>

                    <label for = "name"> Name: </label>
                    <input type="text" id="name" name="name" placeholder="Enter Name">
                    <br>

                    <textarea  id="text" name="description" placeholder="Enter description here"></textarea>
                    <br>

                    <label for = "requirements"> Height Requirement (inches): </label>
                    <input type="number" id="requirements" name="requirements">
                    <br>

                    <label for = "tickets"> Ticket Cost: </label>
                    <input type="number" id="tickets" name="tickets">
                    <br>

                    <section id="submitButtons">
                        <input  name="submit" id="submit" value ="Send" type="submit" class="submission">
                    </section>
                </fieldset>
            </form>
        </div>

        <?php
            $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
            $port = "3306";
            $user = "fair_admin";
            $password = "KiwanisClub";
            $db = "applications";

            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $req = $_POST['requirements'];
                $tickets = $_POST['tickets'];

                $con = new mysqli($host, $user, $password, $db);
                $sql = "INSERT INTO `applications`.`rides` (`name`, `description`, `requirements`, `tickets`) VALUES (" ."'". $name ."', '" .$description ."', '" .$req ."', '" .$tickets ."');";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>
    </body>
</html>