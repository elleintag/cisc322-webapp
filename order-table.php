<?php   
    $servername = "localhost";
    $username = "root";
    $dbname = "restaurantdb";
    $conn = mysqli_connect($servername, $username, '', $dbname);
    if (!$conn) {
        die("Connection to database failed." . mysqli_connect_error());
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the date from the form submission
        $date = $_POST['date'];
  
    // Check the sql query to match the database
        $sql = "SELECT customers.first_name, customers.last_name, orders.items_ordered, orders.total_amount, orders.tip, delivery_persons.name
                FROM orders
                JOIN customers ON orders.customer_id = customers.id
                JOIN delivery_persons ON orders.delivery_person_id = delivery_persons.id
                WHERE DATE(orders.order_date) = '$date'";
        $result = mysqli_query($conn, $sql);
  
        // Check if any orders were found
        if (mysqli_num_rows($result) > 0) {
        // Output the results as an HTML table
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Items Ordered</th><th>Total Amount</th><th>Tip</th><th>Delivery Person</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['items_ordered'] . "</td><td>" . $row['total_amount'] . "</td><td>" . $row['tip'] . "</td><td>" . $row['name'] . "</td></tr>";
        }
        echo "</table>";
        } else {
            echo "No orders found for the selected date.";
        }
  
    // Free result set
    mysqli_free_result($result);
    }
  
    // Close the database connection
    mysqli_close($conn);
?>