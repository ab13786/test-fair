<?php
                    $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                    $port = "3306";
                    $user = "fair_admin";
                    $password = "KiwanisClub";
                    $db = "applications";

                    $id = $_GET['id'];

                    $con = new mysqli($host, $user, $password, $db);
                    $sql = "SELECT Sponsors.SponsorLogo From applications.Sponsors WHERE Sponsors.SponsorID=$id";
                    $results = $con->query($sql);

                    $row = mysql_fetch_assoc($results);

                    $con->close();

                    header=("Content-type: image/png");
                    echo $row['SponsorLogo'];
                ?>