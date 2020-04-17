<!DOCTYPE html>
<html>
	<head>
		<title>Kiwanis Fair - News</title>
		<meta charset="UTF-8">
		<link href= "/stylesheets/news.css" type="text/css" rel = "stylesheet">
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
            <button class="tablinks" onclick="opentab(event,'all')">All News</button>
            <button class="tablinks" onclick="opentab(event,'update')">Update News</button>
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

        <div id="update" class="tabcontent">
            <section>
                <form action="" method="POST">
                    <fieldset>
                        <legend> News Update</legend>

                        <label for = "Subject"> Subject: </label>
                        <input type="text" id="Subject" name="Subject" placeholder="Enter Subject">

                        <textarea  id="text" name="message" placeholder="Enter message here"></textarea>

                        <section id="submitButtons">
                            <input  name="submit" id="submit" value ="Send" type="submit" class="submission">
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
                $subject = $_POST['Subject'];
                $message = $_POST['message'];

                $con = new mysqli($host, $user, $password, $db);
                $sql = "INSERT INTO `applications`.`News` (`subject`, `message`) VALUES (" ."'". $subject ."', '" .$message ."');";
                $results = $con->query($sql);

                header("Refresh:0");
            }
        ?>

		<div id="all" class="tabcontent">
            <h1>Query for all news in database</h1>
            <?php
                    $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                    $port = "3306";
                    $user = "fair_admin";
                    $password = "KiwanisClub";
                    $db = "applications";

                    $con = new mysqli($host, $user, $password, $db);
                    $sql = "SELECT * From applications.News";
                    $results = $con->query($sql);

                    if($results->num_rows>0){
                        echo "<table><tr><th>newsID</th><th>subject</th><th>message</th></tr>";
                        while($row = $results->fetch_assoc()){
                            echo "<tr><td>". $row['newsID']. "</td><td>". $row['subject']. "</td><td>". $row['message']. "</td><td><button type='button' value='Delete'>Delete</button></td></tr>";
                        }
                        echo "</table>";
                    }
                    $con->close();
                ?>
        </div>
    </body>
</html>