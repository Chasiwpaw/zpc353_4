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
$sql1 = "create table order_table (order_number varchar(10), date_placed datetime, emp_id varchar(10), isbn varchar(10), quantity int, title varchar(20), price double)";
$result1 = $conn->query($sql1);
$sql2 = "insert into order_table 
select Orders.order_number, date_placed, emp_id, Book.isbn, quantity, title, price from Orders, Orderitem,Book where cust_email = '".$_POST['cid']."' and Orders.order_number = Orderitem.order_number and Orderitem.isbn=Book.isbn";
$result2 = $conn->query($sql2);
$sql3 = "select * from order_table";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    echo "<table><tr><th>Order Number</th><th>Date</th><th>Book title</th><th>Book price</th><th>Quantity</th><th>Employee</th></tr>";
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        echo "<tr><td>".$row["order_number"]."</td><td>".$row["date_placed"]."</td><td>".$row["title"]."</td><td>".$row["price"]."</td><td>".$row["quantity"]."</td><td>".$row["emp_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$sql4 = "drop table order_table";
$result4 = $conn->query($sql4);
$conn->close();
?>
