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

        $flag = false;
        while ($row = mysql_fetch_assoc($user_query)) {
            if (!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
            }
            echo implode("\t", array_values($row)) . "\r\n";
        }
?>