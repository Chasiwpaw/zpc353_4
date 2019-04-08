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
$sql1 = "create table purchase_table(order_number varchar(10), date_placed datetime, emp_id varchar(10), isbn varchar(10),  title varchar(20), quantity int, price double, cust_email varchar(25))";
$result1 = $conn->query($sql1);

$sql2 = "insert into purchase_table
select Orders.order_number, date_placed, Orders.emp_id, Book.isbn,  title, quantity, price, cust_email from Orders, Orderitem, Book where Orders.order_number = Orderitem.order_number and Orderitem.isbn = Book.isbn order by Orders.cust_email";
$result2 = $conn->query($sql2);

$sql3 = "select * from purchase_table";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    echo "<table><tr><th>Order Number</th></tr><tr><th>Customer email</th></tr><tr><th>Date</th></tr><tr><th>Book title</th></tr><tr><th>Book price</th></tr><tr><th>Quantity</th></tr><tr><th>Employee</th></tr></table>";
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        echo "<tr><td>".$row["order_number"]."</td><td>".$row["cust_email"]."</td></tr>".$row["date_placed"]."</td></tr>".$row["title"]."</td></tr>".$row["price"]."</td></tr>".$row["quantity"]."</td></tr>".$row["emp_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql4 = "create table purchase_table_after_date(cust_email varchar(25) , price double, quantity int)";
$result4 = $conn->query($sql4);

$sql5 = "insert into purchase_table_after_date
select cust_email, price, quantity from purchase_table where date_placed >= '2019-01-01 00:00:00'";
$result5 = $conn->query($sql5);

$sql6 = "select cust_email, SUM(price*quantity) as total_amount from purchase_table_after_date group by cust_email";
$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    echo "<table><tr><th>Customer email</th></tr><tr><th>Total amount</th></tr></table>";
    // output data of each row
    while($row = $result6->fetch_assoc()) {
        echo "</td><td>".$row["cust_email"]."</td></tr>".$row["total_amount"].;
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql7 = "drop table purchase_table";
$result7 = $conn->query($sql7);

$sql8 = "drop table purchase_table_after_date";
$result8 = $conn->query($sql8);

$conn->close();
?>


