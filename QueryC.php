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
$sql= "select Orders.order_number, tracking_number, confirmation_number, date_placed, date_received, company_name, branch, emp_id, sum(price*quantity) from Orders, Orderitem, Publisher, Book where cust_email='".$_POST['cid']."' and Orders.order_number=Orderitem.order_number and Orders.publisher_num=Publisher.publisher_num and Orderitem.isbn=Book.isbn";
$result= $conn->query($sql);



if ($result->num_rows > 0) {
    echo "<table><tr><th>Order Number</th><th>Tracking number</th><th>Confirmation number</th><th>Date placed</th><th>Date received</th><th>Publisher company</th><th>Publisher branch</th><th>Employee ID</th><th>Total amount paid</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["order_number"]."</td><td>".$row["tracking_number"]."</td><td>".$row["confirmation_number"]."</td><td>".$row["date_placed"]."</td><td>".$row["date_received"]."</td><td>".$row["company_name"]."</td><td>".$row["branch"]."</td><td>".$row["emp_id"]."</td><td>".$row["sum(price*quantity)"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
