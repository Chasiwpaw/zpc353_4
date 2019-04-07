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
$sql = "select title, author, edition, publisher, date_placed from Orders, Orderitem, Book where Orders.order_number=Orderitem.order_number and Orderitem.isbn=Book.isbn and ((date_received is not null and DATEDIFF( Orders.date_received, Orders.date_placed) > 21) or (date_received is null and DATEDIFF(  NOW(), Orders.date_placed) > 21))";
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


