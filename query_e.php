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

$sql = "CREATE TABLE TEMP (sale_number varchar(10), date_sold datetime, cust_email varchar(25), emp_id varchar(10));";
$result = $conn->query($sql);

$sql1 = "INSERT INTO TEMP SELECT * FROM Sale WHERE emp_id = '".$_POST['eid']."' AND DATE(date_sold) = '".$_POST['current_date']."';";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM TEMP;";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    echo "<table><tr><th>Sale#</th><th>Date</th><th>Employee ID</th><th>Customer Email</th></tr>";
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "<tr><td>".$row["sale_number"]."</td><td>".$row["date_sold"]."</td><td>".$row["emp_id"]."</td><td>".$row["cust_email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
    }

$sql_3 ="SELECT * FROM TEMP as t, Saleitem as item WHERE t.sale_number=item.sale_number";
$result_3 = $conn->query($sql_3);

if($result_3->num_rows>0){
    echo "<table><tr><th>Sale#</th><th>ISBN</th><th>Quantity</th><th>Price</th></tr>";

    while($row = $result_3->fetch_assoc()){
        echo "<tr><td>".$row["sale_number"]."</td><td>".$row["isbn"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td></tr>";
    }
    echo "</table>";
} else{
    echo "0 results";
}

$sql_4 = "DROP TABLE TEMP";
$conn->query($sql_4);

$conn->close();
?>

