<?php
$servername = "zpc353.encs.concordia.ca";
$username = "zpc353_4";
$password = "TKASA353";
$dbname = "zpc353_4";

// Create Connection
$conn=new mysqli($servername, $username, $password, $dbname);
// Check Connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Email</th><th>Name</th><th>Phone number</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["email"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
    }

$conn->close();
?>

