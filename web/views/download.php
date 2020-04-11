 <?php
        $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
        $port = "3306";
        $user = "fair_admin";
        $password = "KiwanisClub";
        $db = "applications";

        $conn = new mysqli($host, $user, $password, $db);
        $filename = "LegoApplications.xls"; // File Name
        // Download file
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        $user_query = "SELECT * From applications.LegoApp";

/*         $flag = false;
        while ($row = mysql_fetch_assoc($user_query)) {
            if (!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
            }
            echo implode("\t", array_values($row)) . "\r\n";
        } */

        $results = $conn->query($user_query);

        if($results->num_rows>0){
            echo "<table><tr><th>LegoAppID</th><th>Builder 1 Name</th><th>Builder 2 Name</th><th>DOB Builder 1</th><th>Address</th><th>Phone Number</th><th>Email</th></tr>";
            while($row = $results->fetch_assoc()){
                echo "<tr><td>". $row['LegoAppID']. "</td><td>". $row['Builder1FN']. " ". $row['Builder1LN']. "</td><td>". $row['Builder2FN']. " ". $row['Builder2LN']. "</td><td>". $row['DOBuilder1']. "</td><td>". $row['Address']. "</td><td>". $row['PhoneNumber']. "</td><td>". $row['Email']. "</td></tr>";
            }
            echo "</table>";
        }
?>