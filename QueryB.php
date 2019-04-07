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
$sql = "select title from Book where isbn in (select isbn from Orderitem where order_number in (select Orders.order_number from Orders left join satisfied_by on Orders.order_number=satisfied_by.order_number where satisfied_by.order_number is null))";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Book Title</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>


