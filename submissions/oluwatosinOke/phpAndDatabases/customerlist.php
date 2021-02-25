<?php
require_once("cookie.php");
$queryDb = new QueryDb();
$results = isset($_COOKIE['view'])? unserialize($_COOKIE['view']) : $queryDb->getAllCustomers();
   
    if ($result->rowCount()>0){
        echo "<table style='border: solid 1px black'>";
        	echo "<tr>";
            	echo "<th> S/N </th>";
            	echo "<th> Full Name </th>";
            	echo "<th> Email Address </th>";
            	echo "<th> Created At</th>";
            	echo "<th> Actions </th>";
        	echo "</tr>";
        	while ($row=$result->fetch()){
            	echo "<tr>";
            		echo "<td style='border: solid 1px black'>" . $row['id'] . "</td>";
            		echo "<td style='border: solid 1px black'>" . $row['first_name'] . ' ' . $row['last_name'] . "</td>";
            		echo "<td style='border: solid 1px black'>" . $row['email_address'] . "</td>";
            		echo "<td style='border: solid 1px black'>" . $row['created_at'] . "</td>";
            		echo "<td style='border: solid 1px black'>" . '<button><a href="#">View</a></button>' . "</td>";
            	echo "</tr>";
        	}
        echo "</table>";
        unset($result);
    }else{
        echo "No Records matching your Query were found";
    }
// close connection
unset($pdo);
?>