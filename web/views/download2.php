 <?php
        $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
        $port = "3306";
        $user = "fair_admin";
        $password = "KiwanisClub";
        $db = "applications";

        $conn = new mysqli($host, $user, $password, $db);
        $filename = "ParadeApplications.xls"; // File Name
        // Download file
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        $user_query = "SELECT * From applications.ParadeApp";

        $results = $conn->query($user_query);

        if($results->num_rows>0){
            echo "<table><tr><th>Parade ID</th><th>Contact Name</th><th>Phone Number</th><th>Email</th><th>Contact Address</th><th>Contact City</th><th>Contact State</th><th>Contact Zip</th><th>Group Name</th><th>Sponsor Name</th><th>Sponsor Address</th><th>Sponsor City</th><th>Sponsor State</th><th>Sponsor Zip</th><th>Num. Participants</th><th>Description</th><th>Float</th><th>Vehicle</th><th>Band</th><th>Theme</th></tr>";
            while($row = $results->fetch_assoc()){
                echo "<tr><td>". $row['ParadeAppID']. "</td><td>". $row['ContactFN'] ." ". $row['ContactLN'] ."</td><td>". $row['PhoneNumber'] . "</td><td>". $row['Email'] . "</td><td>". $row['Address'] . "</td><td>". $row['City'] . "</td><td>". $row['State'] . "</td><td>". $row['Zip'] . "</td><td>". $row['GroupName'] . "</td><td>". $row['SponsorFN'] ." ". $row['SponsorLN'] . "</td><td>". $row['SponsorAdress'] . "</td><td>". $row['SponsorCity'] . "</td><td>". $row['SponsorState'] . "</td><td>". $row['SponsorZip'] . "</td><td>". $row['NumParticipant'] . "</td><td>". $row['Desciption'] . "</td><td>". $row['float'] . "</td><td>". $row['vehicle'] . "</td><td>". $row['band'] . "</td><td>". $row['theme'] . "</td></tr>";
            }
            echo "</table>";
        }
?>