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

$sql_subq1 = "CREATE TABLE SUBQ1 SELECT Orders.order_number FROM Orders LEFT JOIN satisfied_by ON Orders.order_number=satisfied_by.order_number WHERE satisfied_by.order_number is null";
$result_subq1= $conn->query($sql_subq1);

$sql_subq2 = "CREATE TABLE SUBQ2 SELECT isbn FROM Orderitem, SUBQ1 WHERE Orderitem.order_number=SUBQ1.order_number";
$result_subq2= $conn->query($sql_subq2);

$sql = "SELECT title, publisher, author, edition, date_placed FROM Book, SUBQ1, SUBQ2, Orders WHERE Book.isbn=SUBQ2.isbn AND Orders.order_number=SUBQ1.order_number AND Orders.publisher_num=Book.publisher";
$result = $conn->query($sql);

echo "Books on back orders";
echo "<br>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>Book Title</th><th>Publisher</th><th>Author</th><th>Edition</th><th>Order Date</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["title"]."</td><td>".$row["publisher"]."</td><td>".$row["author"]."</td><td>".$row["edition"]."</td><td>".$row["date_placed"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql_subq3 = "DROP TABLE SUBQ1, SUBQ2";
$result_subq3= $conn->query($sql_subq3);


$conn->close();
?>
