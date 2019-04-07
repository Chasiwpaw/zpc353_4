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


$sql = "SELECT * FROM Book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Author</th><th>Edition</th><th>Price</th><th>Quantity</th><th>Sold</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["isbn"]."</td><td>".$row["title"]."</td><td>".$row["publisher"]."</td><td>".$row["author"]."</td><td>".$row["edition"]."</td><td>".$row["price"]."</td><td>".$row["quantity_on_hand"]."</td><td>".$row["quantity_sold"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
    }

$conn->close();
?>

